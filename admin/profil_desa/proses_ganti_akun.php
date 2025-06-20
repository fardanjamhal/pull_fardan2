<?php
session_start();
include('../../config/koneksi.php');

// Cek CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['error'] = "Token CSRF tidak valid.";
    header("Location: password.php");
    exit;
}

$id_login = isset($_POST['id_login']) ? (int)$_POST['id_login'] : 0;
if ($id_login < 1) {
    $_SESSION['error'] = "ID login tidak valid.";
    header("Location: password.php");
    exit;
}

$username = trim($_POST['username']);
$password_plain = $_POST['password'];
$confirm_password = $_POST['confirm_password'] ?? '';

// Simpan input agar ditampilkan lagi jika error
$_SESSION['old_username'] = $username;
$_SESSION['old_password'] = $password_plain;
$_SESSION['old_confirm'] = $confirm_password;

if (strlen($password_plain) < 5) {
    $_SESSION['error'] = "Password minimal 5 karakter.";
    header("Location: password.php?id=$id_login");
    exit;
}

if ($password_plain !== $confirm_password) {
    $_SESSION['error'] = "Konfirmasi password tidak cocok.";
    header("Location: password.php?id=$id_login");
    exit;
}

// Ambil data lama dari database
$query = $connect->prepare("SELECT username, password FROM login WHERE id = ?");
$query->bind_param("i", $id_login);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Data login tidak ditemukan.";
    header("Location: password.php");
    exit;
}

$data_lama = $result->fetch_assoc();
$query->close();

// Cek apakah data sama persis
$password_md5 = md5($password_plain);
if ($data_lama['username'] === $username && $data_lama['password'] === $password_md5) {
    $_SESSION['error'] = "Tidak ada perubahan pada data.";
    header("Location: password.php?id=$id_login");
    exit;
}

// Jika ada perubahan, lanjut update
$stmt = $connect->prepare("UPDATE login SET username = ?, password = ? WHERE id = ?");
$stmt->bind_param("ssi", $username, $password_md5, $id_login);

if ($stmt->execute()) {
    $stmt->close();
    $connect->close();

    // Logout pengguna dan redirect
    session_unset();
    session_destroy();
    header("Location: ../../login/index.php?pesan=password_diubah");
    exit;
} else {
    $_SESSION['error'] = "Gagal memperbarui akun: " . $stmt->error;
    header("Location: password.php?id=$id_login");
    exit;
}
