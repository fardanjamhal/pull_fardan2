<!DOCTYPE html>
<html>
<head>
  <title>Export Data Penduduk</title>
</head>
<body>
<style type="text/css">
  body {
    font-family: sans-serif;
    text-transform: capitalize;
  }
  table {
    margin: 20px auto;
    border-collapse: collapse;
    text-transform: capitalize;
  }
  table th, table td {
    border: 1px solid #3c3c3c;
    padding: 3px 8px;
  }
  a {
    background: blue;
    color: #fff;
    padding: 8px 10px;
    text-decoration: none;
    border-radius: 2px;
  }
  .str {
    mso-number-format:\@;
  }
</style>

<?php
// Koneksi ke database
include '../../config/koneksi.php'; // sesuaikan lokasi file koneksi jika berbeda

// Ambil nama desa dari database
$qProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
$dataProfil = mysqli_fetch_assoc($qProfil);
$nama_desa = $dataProfil['nama_desa'] ?? 'Desa'; // fallback jika kosong

// Judul file
$judul = "Data Penduduk";

// Format nama file (hapus spasi jadi underscore + tambahkan tanggal)
$nama_file = $judul . ' - ' . $nama_desa . ' - ' . date('Ymd_His') . '.xls';
$nama_file = str_replace(' ', '_', $nama_file); // ganti spasi dengan underscore agar aman di semua sistem

// Header untuk ekspor Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$nama_file");
?>

<table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Tempat Lahir</th>
      <th>Tanggal Lahir</th>
      <th>Jenis Kelamin</th>
      <th>Agama</th>
      <th>Jalan</th>
      <th>Dusun</th>
      <th>RT</th>
      <th>RW</th>
      <th>Desa</th>
      <th>Kecamatan</th>
      <th>Kabupaten</th>
      <th>No KK</th>
      <th>Pendidikan KK</th>
      <th>Pendidikan Terakhir</th>
      <th>Pendidikan Ditempuh</th>
      <th>Pekerjaan</th>
      <th>Status Perkawinan</th>
      <th>Status dalam Keluarga</th>
      <th>Kewarganegaraan</th>
      <th>Nama Ayah</th>
      <th>Nama Ibu</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include ('../../config/koneksi.php');
    $no = 1;
    $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
    foreach($qTampil as $row){
      $tanggal = date('d', strtotime($row['tgl_lahir']));
      $bulan = date('F', strtotime($row['tgl_lahir']));
      $tahun = date('Y', strtotime($row['tgl_lahir']));

      $bulanIndo = array(
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
      );

      $tgl_lahir_formatted = $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun;
    ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td class="str"><?php echo $row['nik']; ?></td>
      <td><?php echo $row['nama']; ?></td>
      <td><?php echo $row['tempat_lahir']; ?></td>
      <td><?php echo $tgl_lahir_formatted; ?></td>
      <td><?php echo $row['jenis_kelamin']; ?></td>
      <td><?php echo $row['agama']; ?></td>
      <td><?php echo $row['jalan']; ?></td>
      <td><?php echo $row['dusun']; ?></td>
      <td><?php echo $row['rt']; ?></td>
      <td><?php echo $row['rw']; ?></td>
      <td><?php echo $row['desa']; ?></td>
      <td><?php echo $row['kecamatan']; ?></td>
      <td><?php echo $row['kota']; ?></td>
      <td class="str"><?php echo $row['no_kk']; ?></td>
      <td><?php echo $row['pend_kk']; ?></td>
      <td><?php echo $row['pend_terakhir']; ?></td>
      <td><?php echo $row['pend_ditempuh']; ?></td>
      <td><?php echo $row['pekerjaan']; ?></td>
      <td><?php echo $row['status_perkawinan']; ?></td>
      <td><?php echo $row['status_dlm_keluarga']; ?></td>
      <td><?php echo $row['kewarganegaraan']; ?></td>
      <td><?php echo $row['nama_ayah']; ?></td>
      <td><?php echo $row['nama_ibu']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>


</body>
</html>
