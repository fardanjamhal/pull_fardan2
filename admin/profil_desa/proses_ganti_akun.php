<?php
session_start();
include('../../config/koneksi.php');

// Tampilkan error saat development (hapus ini di production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Cek CSRF token
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['error'] = "Token CSRF tidak valid.";
    header("Location: password.php");
    exit;
}

// Validasi ID login
$id_login = isset($_POST['id_login']) ? (int)$_POST['id_login'] : 0;
if ($id_login < 1) {
    $_SESSION['error'] = "ID login tidak valid.";
    header("Location: password.php");
    exit;
}

// Ambil input
$username = trim($_POST['username']);
$password_plain = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Simpan input sementara ke sesi (untuk form repopulate jika error)
$_SESSION['old_username'] = $username;
$_SESSION['old_password'] = $password_plain;
$_SESSION['old_confirm'] = $confirm_password;

// Validasi panjang password
if (strlen($password_plain) < 5) {
    $_SESSION['error'] = "Password minimal 5 karakter.";
    header("Location: password.php?id=$id_login");
    exit;
}

// Validasi konfirmasi password
if ($password_plain !== $confirm_password) {
    $_SESSION['error'] = "Konfirmasi password tidak cocok.";
    header("Location: password.php?id=$id_login");
    exit;
}

// Ambil data lama dari database (tanpa get_result())
$stmt = $connect->prepare("SELECT username, password FROM login WHERE id = ?");
$stmt->bind_param("i", $id_login);
$stmt->execute();
$stmt->bind_result($old_username, $old_password);
$found = $stmt->fetch();
$stmt->close();

if (!$found) {
    $_SESSION['error'] = "Data login tidak ditemukan.";
    header("Location: password.php");
    exit;
}

// Cek apakah username sama dan password tidak berubah
if ($old_username === $username && password_verify($password_plain, $old_password)) {
    $_SESSION['error'] = "Tidak ada perubahan yang dilakukan.";
    header("Location: password.php?id=$id_login");
    exit;
}

// Hash password baru
$hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);

// Update ke database
$stmt_update = $connect->prepare("UPDATE login SET username = ?, password = ? WHERE id = ?");
$stmt_update->bind_param("ssi", $username, $hashed_password, $id_login);

if ($stmt_update->execute()) {
    $stmt_update->close();
    $connect->close();

    // Hapus semua session & logout otomatis
    session_unset();
    session_destroy();

    header("Location: ../../login/index.php?pesan=password_diubah");
    exit;
} else {
    $_SESSION['error'] = "Gagal memperbarui akun: " . $stmt_update->error;
    header("Location: password.php?id=$id_login");
    exit;
}
