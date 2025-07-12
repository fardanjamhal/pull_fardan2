<?php
include '../config/koneksi.php';

$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';

if (!$token || !$password) {
    die("Data tidak lengkap.");
}

$query = mysqli_query($connect, "SELECT * FROM login WHERE reset_token='$token' AND reset_expired > NOW()");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    die("Token tidak valid atau sudah kadaluarsa.");
}

$hashed = password_hash($password, PASSWORD_DEFAULT);

// Simpan password dan hapus token
mysqli_query($connect, "UPDATE login SET password='$hashed', reset_token=NULL, reset_expired=NULL WHERE reset_token='$token'");

echo "<script>alert('Password berhasil diubah. Silakan login.');window.location='index.php';</script>";
