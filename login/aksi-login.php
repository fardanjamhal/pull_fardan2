<?php
// Aktifkan error reporting untuk diagnosa saat di hosting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('../config/koneksi.php');

// Validasi data input
if (!isset($_POST['username'], $_POST['password'])) {
    header("Location: index.php?pesan=login-gagal");
    exit();
}

$username = $_POST['username'];
$password_input = $_POST['password'];

// Gunakan prepared statement untuk mencegah SQL Injection
$stmt = $connect->prepare("SELECT * FROM login WHERE username = ?");
if (!$stmt) {
    die("Query Error: " . $connect->error); // Debug jika prepare gagal
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah user ditemukan
if ($result->num_rows > 0) {
    $login = $result->fetch_assoc();

    // Cek apakah password masih MD5
    if (strlen($login['password']) === 32 && ctype_xdigit($login['password'])) {
        // Jika cocok dengan MD5
        if (md5($password_input) === $login['password']) {
            // Migrasi otomatis ke password_hash
            $new_hash = password_hash($password_input, PASSWORD_DEFAULT);
            $update = $connect->prepare("UPDATE login SET password = ? WHERE id = ?");
            $update->bind_param("si", $new_hash, $login['id']);
            $update->execute();
        } else {
            header("Location: index.php?pesan=login-gagal");
            exit();
        }
    } else {
        // Verifikasi password hash
        if (!password_verify($password_input, $login['password'])) {
            header("Location: index.php?pesan=login-gagal");
            exit();
        }
    }

    // Jika login berhasil, amankan session
    session_regenerate_id(true); // Mencegah session fixation
    $_SESSION['username'] = $username;

    if ($login['level'] === "admin") {
        $_SESSION['lvl'] = "Administrator";
    } elseif ($login['level'] === "kades") {
        $_SESSION['lvl'] = "Kepala Desa";
    } else {
        header("Location: index.php?pesan=login-gagal");
        exit();
    }

    // Arahkan ke dashboard
    header("Location: ../admin/");
    exit();
} else {
    header("Location: index.php?pesan=login-gagal");
    exit();
}
