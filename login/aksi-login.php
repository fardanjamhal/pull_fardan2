<?php
session_start();
include('../config/koneksi.php');

// Aktifkan error log saat testing (nonaktifkan di produksi)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Validasi input
if (!isset($_POST['username'], $_POST['password'])) {
    header("Location: index.php?pesan=login-gagal");
    exit();
}

$username = $_POST['username'];
$password_input = $_POST['password'];

// Ambil data user
$stmt = $connect->prepare("SELECT id, username, password, level FROM login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Ambil hasil
    $stmt->bind_result($id, $db_username, $db_password, $level);
    $stmt->fetch();

    // Cek apakah masih md5
    if (strlen($db_password) === 32 && ctype_xdigit($db_password)) {
        if (md5($password_input) === $db_password) {
            // Migrasi ke password_hash
            $new_hash = password_hash($password_input, PASSWORD_DEFAULT);
            $update = $connect->prepare("UPDATE login SET password = ? WHERE id = ?");
            $update->bind_param("si", $new_hash, $id);
            $update->execute();
        } else {
            header("Location: index.php?pesan=login-gagal");
            exit();
        }
    } else {
        // Verifikasi password hash
        if (!password_verify($password_input, $db_password)) {
            header("Location: index.php?pesan=login-gagal");
            exit();
        }
    }

    // Login berhasil
    session_regenerate_id(true);
    $_SESSION['username'] = $db_username;

    if ($level === "admin") {
        $_SESSION['lvl'] = "Administrator";
    } elseif ($level === "kades") {
        $_SESSION['lvl'] = "Kepala Desa";
    } else {
        header("Location: index.php?pesan=login-gagal");
        exit();
    }

    header("Location: ../admin/");
    exit();
} else {
    header("Location: index.php?pesan=login-gagal");
    exit();
}
