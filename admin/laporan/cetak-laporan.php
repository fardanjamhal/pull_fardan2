<?php
// cetak-laporan.php
include "../../config/koneksi.php"; // Pastikan file koneksi.php ada dan berfungsi

// Daftar semua tabel surat yang akan digabungkan
$suratTables = [
    'surat_keterangan',
    'surat_keterangan_berkelakuan_baik',
    'surat_keterangan_domisili',
    'surat_keterangan_kepemilikan_kendaraan_bermotor',
    'surat_keterangan_perhiasan',
    'surat_keterangan_usaha',
    'surat_lapor_hajatan',
    'surat_pengantar_skck',
    'surat_keterangan_tidak_mampu',
    'formulir_pengantar_nikah',
    'formulir_permohonan_kehendak_nikah',
    'formulir_persetujuan_calon_pengantin',
    'formulir_persetujuan_calon_pengantin_istri',
    'formulir_surat_izin_orang_tua',
    'surat_keterangan_kematian',
    'surat_keterangan_domisili_usaha',
    'surat_keterangan_pengantar',
    'surat_keterangan_beda_identitas',
    'surat_keterangan_beda_identitas_kis'
];

$query = "";
$reportTitle = 'Laporan Surat Administrasi Desa - Surat Keluar';
$reportSubtitle = '';
$headerFontSize = '14pt';
$headerImage = '';

if (isset($_GET['filter']) && !empty($_GET['filter'])) {
    $filter = $_GET['filter'];
    $queryConditions = [];
    $headerFontSize = '12pt'; // Ukuran font lebih kecil untuk filter tertentu

    foreach ($suratTables as $table) {
        $baseSelect = "SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, T.no_surat, T.tanggal_surat, T.jenis_surat FROM penduduk LEFT JOIN {$table} T ON T.nik = penduduk.nik WHERE T.status_surat='selesai'";
        $condition = '';

        if ($filter == '2' && isset($_GET['tanggal'])) {
            $condition = " AND DATE(T.tanggal_surat)='" . mysqli_real_escape_string($connect, $_GET['tanggal']) . "'";
            $tgl = date('d-m-Y', strtotime($_GET['tanggal']));
            $reportSubtitle = "<div align=\"center\" style=\"font-size: 12pt;\"><b>Tanggal {$tgl}</b></div>";
        } elseif ($filter == '3' && isset($_GET['bulan']) && isset($_GET['tahun'])) {
            $condition = " AND MONTH(T.tanggal_surat)='" . mysqli_real_escape_string($connect, $_GET['bulan']) . "' AND YEAR(T.tanggal_surat)='" . mysqli_real_escape_string($connect, $_GET['tahun']) . "'";
            $nama_bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $reportSubtitle = "<div align=\"center\" style=\"font-size: 12pt;\"><b>Bulan {$nama_bulan[$_GET['bulan']]} {$_GET['tahun']}</b></div>";
        } elseif ($filter == '4' && isset($_GET['tahun'])) {
            $condition = " AND YEAR(T.tanggal_surat)='" . mysqli_real_escape_string($connect, $_GET['tahun']) . "'";
            $reportSubtitle = "<div align=\"center\" style=\"font-size: 12pt;\"><b>Tahun {$_GET['tahun']}</b></div>";
        }
        $queryConditions[] = $baseSelect . $condition;
    }
    $query = implode(" UNION ", $queryConditions) . " ORDER BY tanggal_surat";

} else {
    // Default case (no filter)
    $queryProfil = mysqli_query($connect, "SELECT gambar_kop FROM profil_desa LIMIT 1");
    $dataProfil = mysqli_fetch_assoc($queryProfil);
    $gambar_kop = !empty($dataProfil['gambar_kop']) ? $dataProfil['gambar_kop'] : 'e-SuratDesa.png';
    $headerImage = '<img src="../../assets/img/' . $gambar_kop . '" style="max-width: 120px; height: auto;">';
    $reportTitle = 'Laporan Surat Administrasi Desa'; // Mengubah judul untuk case default
    $headerFontSize = '12pt';

    $queryConditions = [];
    foreach ($suratTables as $table) {
        $baseSelect = "SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, T.no_surat, T.tanggal_surat, T.jenis_surat FROM penduduk LEFT JOIN {$table} T ON T.nik = penduduk.nik WHERE T.status_surat='selesai'";
        $queryConditions[] = $baseSelect;
    }
    $query = implode(" UNION ", $queryConditions) . " ORDER BY tanggal_surat";
}
?>

<html>
<head>
  <link rel="shortcut icon" href="../../assets/img/e-SuratDesa.png">
  <title>CETAK LAPORAN</title>
  <style>
    @page {
      margin: 2cm;
      color: none;
    }
    body {
      font-family: "Times New Roman", Times, serif;
    }
    hr{
      border-bottom: 1px solid #000000;
      height:0px;
    }
    .header {
        text-align: center;
    }
  </style>
</head>
<body>

  <div class="header">
    <?php echo $headerImage; ?>
    <div style="font-size: <?php echo $headerFontSize; ?>; font-weight: bold; margin-top: 8px;">
        <b><?php echo $reportTitle; ?></b>
    </div>
    <?php echo $reportSubtitle; ?>
    <hr style="margin-top: 10px;">
  </div><br>

  <table width="100%" border="1" cellpadding="5" style="border-collapse:collapse;">
    <tr>
      <th>No.</th>
      <th>No. Surat</th>
      <th>Tanggal</th>
      <th>Nama</th>
      <th>Jenis Surat</th>
      <th>Alamat</th>
    </tr>
    <?php
      $sql = mysqli_query($connect, $query);
      $row = mysqli_num_rows($sql);
      $no = 1; // Inisialisasi nomor
      if($row > 0){
        while($data = mysqli_fetch_assoc($sql)){
          $tgl = date('d-m-Y', strtotime($data['tanggal_surat']));
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>".$data['no_surat']."</td>";
          echo "<td>".$tgl."</td>";
          echo "<td>".ucwords(strtolower($data['nama']))."</td>";
          echo "<td>".$data['jenis_surat']."</td>";
          echo "<td> ".ucwords(strtolower($data['dusun']))."</td>";
          echo "</tr>";
        }
      }else{
        echo "<tr><td colspan='6'>Data tidak ditemukan.</td></tr>";
      }
    ?>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>