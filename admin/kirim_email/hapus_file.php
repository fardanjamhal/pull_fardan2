<?php
include '../../config/koneksi.php'; // Pastikan path sesuai struktur folder kamu

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = (int)$_POST['id'];
  $file = $_POST['file_surat'];

  // Hapus file jika ada
  $path = 'uploads/' . $file;
  if (file_exists($path)) {
    unlink($path); // Hapus file dari server
  }

  // Hapus dari database
  $delete = mysqli_query($connect, "DELETE FROM kirim_email WHERE id = $id");

  if ($delete) {
    header("Location: index.php?status=deleted");
  } else {
    header("Location: index.php?status=delete_failed");
  }
  exit();
}
?>
