<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include ('../part/sidebar.php');
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Kirim Dokumen</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Profil Desa</li>
    </ol>
  </section>
  <section class="content">

 <?php
// Koneksi database
include '../../config/koneksi.php';

// Ambil data pengiriman email sebelumnya
$query = mysqli_query($connect, "SELECT * FROM kirim_email ORDER BY tanggal_kirim DESC");
?>

<h3>Form Kirim Email Surat</h3>
<form action="proses_kirim.php" method="post" enctype="multipart/form-data">
  <label>Judul Surat</label><br>
  <input type="text" name="judul" required><br><br>

  <label>Email Tujuan</label><br>
  <input type="email" name="email_tujuan" required><br><br>

  <label>Upload Dokumen (PDF)</label><br>
  <input type="file" name="file_surat" accept="application/pdf" required><br><br>

  <button type="submit" name="kirim">Kirim Email</button>
</form>

<hr>

<h3>Riwayat Pengiriman Email</h3>
<table border="1" cellpadding="8" cellspacing="0">
  <thead>
    <tr>
      <th>No</th>
      <th>Judul Surat</th>
      <th>Email Tujuan</th>
      <th>File</th>
      <th>Tanggal Kirim</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    while ($data = mysqli_fetch_assoc($query)) {
      echo "<tr>
        <td>{$no}</td>
        <td>{$data['judul']}</td>
        <td>{$data['email_tujuan']}</td>
        <td><a href='uploads/{$data['file_surat']}' target='_blank'>Lihat File</a></td>
        <td>{$data['tanggal_kirim']}</td>
      </tr>";
      $no++;
    }
    ?>
  </tbody>
</table>


  
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>