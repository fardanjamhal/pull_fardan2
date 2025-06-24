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
    'surat_keterangan_beda_identitas_kis',
    'surat_keterangan_penghasilan_orang_tua',
    'surat_pengantar_hewan',
    'surat_keterangan_kematian_dan_penguburan',
    'surat_keterangan_pindah_penduduk',
    'surat_keterangan_pengantar_rujuk_atau_cerai'
];

$unionParts = [];
$whereClause = " WHERE status_surat='selesai'"; // Kondisi status_surat untuk setiap tabel surat

$reportTitle = 'Laporan Surat Administrasi Desa - Surat Keluar';
$reportSubtitle = '';
$headerFontSize = '14pt';
$headerImage = '';

// Inisialisasi kondisi filter berdasarkan GET parameters
if (isset($_GET['filter']) && !empty($_GET['filter'])) {
    $filter = $_GET['filter'];
    $headerFontSize = '12pt'; // Ukuran font lebih kecil untuk filter tertentu

    if ($filter == '2' && isset($_GET['tanggal'])) {
        $date = mysqli_real_escape_string($connect, $_GET['tanggal']);
        $whereClause .= " AND DATE(tanggal_surat) = '{$date}'";
        $tgl = date('d-m-Y', strtotime($_GET['tanggal']));
        $reportSubtitle = "<div align=\"center\" style=\"font-size: 12pt;\"><b>Tanggal {$tgl}</b></div>";
    } elseif ($filter == '3' && isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $bulan = mysqli_real_escape_string($connect, $_GET['bulan']);
        $tahun = mysqli_real_escape_string($connect, $_GET['tahun']);
        $whereClause .= " AND MONTH(tanggal_surat) = '{$bulan}' AND YEAR(tanggal_surat) = '{$tahun}'";
        $nama_bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $reportSubtitle = "<div align=\"center\" style=\"font-size: 12pt;\"><b>Bulan {$nama_bulan[$_GET['bulan']]} {$_GET['tahun']}</b></div>";
    } elseif ($filter == '4' && isset($_GET['tahun'])) {
        $tahun = mysqli_real_escape_string($connect, $_GET['tahun']);
        $whereClause .= " AND YEAR(tanggal_surat) = '{$tahun}'";
        $reportSubtitle = "<div align=\"center\" style=\"font-size: 12pt;\"><b>Tahun {$_GET['tahun']}</b></div>";
    }
} else {
    // Default case (no filter)
    $queryProfil = mysqli_query($connect, "SELECT gambar_kop FROM profil_desa LIMIT 1");
    $dataProfil = mysqli_fetch_assoc($queryProfil);
    $gambar_kop = !empty($dataProfil['gambar_kop']) ? $dataProfil['gambar_kop'] : 'e-SuratDesa.png';
    $headerImage = '<img src="../../assets/img/' . $gambar_kop . '" style="max-width: 120px; height: auto;">';
    $reportTitle = 'Laporan Surat Administrasi Desa'; // Mengubah judul untuk case default
    $headerFontSize = '12pt';
}

// Bangun bagian UNION untuk setiap tabel surat
foreach ($suratTables as $table) {
    // *** Perubahan di sini: Menambahkan DISTINCT pada setiap SELECT UNION part ***
    // Ini memastikan bahwa setiap baris dari sumbernya sudah unik sebelum digabungkan
    $unionParts[] = "SELECT DISTINCT nik, no_surat, tanggal_surat, jenis_surat FROM {$table} {$whereClause}";
}

// Gabungkan semua bagian UNION menjadi subquery
// Menggunakan UNION ALL untuk performa, DISTINCT/GROUP BY akan dihandle di query akhir
$unionSubquery = "(" . implode(" UNION ALL ", $unionParts) . ") AS T_UNION";

// Query utama yang akan melakukan JOIN dengan arsip_surat dan kemudian GROUP BY
$query = "
    SELECT
        T_UNION.nik,
        T_UNION.no_surat,
        T_UNION.tanggal_surat,
        T_UNION.jenis_surat,
        arsip_surat.nama,
        arsip_surat.dusun,
        arsip_surat.rt,
        arsip_surat.rw
    FROM
        {$unionSubquery}
    LEFT JOIN
        arsip_surat ON T_UNION.nik = arsip_surat.nik
    WHERE arsip_surat.nama IS NOT NULL -- Pastikan hanya data yang memiliki nama (join berhasil)
    GROUP BY T_UNION.no_surat, T_UNION.jenis_surat -- Menambahkan jenis_surat ke GROUP BY untuk memastikan keunikan jika no_surat bisa sama antar jenis surat
    ORDER BY T_UNION.tanggal_surat ASC, T_UNION.no_surat ASC
";

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
      if (!$sql) {
          die('Query Error: ' . mysqli_error($connect) . '<br>Query: ' . $query);
      }
      $row_count = mysqli_num_rows($sql);
      $no = 1; // Inisialisasi nomor
      if($row_count > 0){
        while($data = mysqli_fetch_assoc($sql)){
          $tgl = date('d-m-Y', strtotime($data['tanggal_surat']));
          echo "<tr>";
          echo "<td>".$no++."</td>";
          echo "<td>".$data['no_surat']."</td>";
          echo "<td>".$tgl."</td>";
          echo "<td>".ucwords(strtolower($data['nama']))."</td>";
          echo "<td>".$data['jenis_surat']."</td>";
          echo "<td>Dusun ".ucwords(strtolower($data['dusun']))." RT ".ucwords(strtolower($data['rt']))." RW ".ucwords(strtolower($data['rw']))."</td>";
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