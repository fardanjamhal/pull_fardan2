<?php
session_start();
include('../config/koneksi.php');

// Validasi input dasar
if (!isset($_POST['username'], $_POST['password'])) {
    header("Location: index.php?pesan=login-gagal");
    exit();
}

$username = trim($_POST['username']);
$password_input = $_POST['password'];

// Gunakan prepared statement untuk ambil data user
$stmt = $connect->prepare("SELECT * FROM login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah username ditemukan
if ($result->num_rows > 0) {
    $login = $result->fetch_assoc();

    // Cek apakah password masih pakai MD5
    if (strlen($login['password']) === 32 && ctype_xdigit($login['password'])) {
        // Cocokkan password MD5
        if (md5($password_input) === $login['password']) {
            // Auto migrasi ke password_hash
            $new_hash = password_hash($password_input, PASSWORD_DEFAULT);
            $update = $connect->prepare("UPDATE login SET password = ? WHERE id = ?");
            $update->bind_param("si", $new_hash, $login['id']);
            $update->execute();
        } else {
            header("Location: index.php?pesan=login-gagal");
            exit();
        }
    } else {
        // Password sudah menggunakan password_hash
        if (!password_verify($password_input, $login['password'])) {
            header("Location: index.php?pesan=login-gagal");
            exit();
        }
    }

    // Regenerasi ID sesi untuk mencegah session fixation
    session_regenerate_id(true);

    // Simpan sesi login sesuai level
    $_SESSION['username'] = $username;
    if ($login['level'] == "admin") {
        $_SESSION['lvl'] = "Administrator";
        header("Location: ../admin/");
    } elseif ($login['level'] == "kades") {
        $_SESSION['lvl'] = "Kepala Desa";
        header("Location: ../admin/");
    } else {
        header("Location: index.php?pesan=login-gagal");
    }

} else {
    // Username tidak ditemukan
    header("Location: index.php?pesan=login-gagal");
}
exit();
