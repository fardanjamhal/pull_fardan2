<?php
session_start();
include('../../config/koneksi.php');

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
$password_plain = $_POST['password'];
$confirm_password = $_POST['confirm_password'] ?? '';

// Simpan input sementara ke sesi (agar tidak hilang kalau error)
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

// Ambil data lama dari database
$stmt = $connect->prepare("SELECT username FROM login WHERE id = ?");
$stmt->bind_param("i", $id_login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Data login tidak ditemukan.";
    header("Location: password.php");
    exit;
}

$data_lama = $result->fetch_assoc();
$stmt->close();

// Cek apakah username sama dan password tidak diubah
if ($data_lama['username'] === $username && password_verify($password_plain, $data_lama['password'] ?? '')) {
    $_SESSION['error'] = "Tidak ada perubahan pada data.";
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

    // Bersihkan sesi lalu logout
    session_unset();
    session_destroy();
    header("Location: ../../login/index.php?pesan=password_diubah");
    exit;
} else {
    $_SESSION['error'] = "Gagal memperbarui akun: " . $stmt_update->error;
    header("Location: password.php?id=$id_login");
    exit;
}
