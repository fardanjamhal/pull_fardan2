<?php
session_start();
include('../../config/koneksi.php');

// Ambil ID dari POST
$id_login = isset($_POST['id_login']) ? (int)$_POST['id_login'] : 0;

// Validasi ID
if ($id_login < 1) {
    $_SESSION['error'] = "ID login tidak valid.";
    header("Location: ganti_akun.php");
    exit;
}

// Tangkap data yang dikirim
$username = mysqli_real_escape_string($connect, $_POST['username']);
$password_plain = $_POST['password'];
$password_md5 = md5($password_plain); // Tetap pakai MD5 (meskipun disarankan bcrypt/argon2)

// Update ke database
$query = "UPDATE login SET username = '$username', password = '$password_md5' WHERE id = $id_login";

if (mysqli_query($connect, $query)) {
    $_SESSION['success'] = "Akun ID $id_login berhasil diperbarui.";
} else {
    $_SESSION['error'] = "Gagal memperbarui akun: " . mysqli_error($connect);
}

header("Location: ganti_akun.php?id=$id_login");
exit;
?>
