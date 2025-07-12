<?php
include '../config/koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'], $_POST['password'])) {
    $token = mysqli_real_escape_string($connect, $_POST['token']);
    $passwordBaru = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek token masih aktif
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE reset_token='$token' AND reset_expired > NOW()");
    if (mysqli_num_rows($cek) === 0) {
        // Token tidak valid atau kadaluarsa
        header("Location: index.php?msg=expired");
        exit;
    }

    // Update password
    mysqli_query($connect, "UPDATE login SET password='$passwordBaru', reset_token=NULL, reset_expired=NULL WHERE reset_token='$token'");

    header("Location: index.php?msg=reset_success");
    exit;
} else {
    header("Location: index.php?msg=invalid");
    exit;
}
