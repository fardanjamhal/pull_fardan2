<?php
include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'], $_POST['password'])) {
    $token = mysqli_real_escape_string($connect, $_POST['token']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($connect, "SELECT * FROM login WHERE reset_token='$token' AND reset_expired > NOW()");
    if (mysqli_num_rows($cek) === 0) {
        die("Token tidak valid atau kadaluarsa.");
    }

    mysqli_query($connect, "UPDATE login SET password='$password', reset_token=NULL, reset_expired=NULL WHERE reset_token='$token'");
    echo "Password berhasil diubah. <a href='index.php'>Login sekarang</a>";
} else {
    echo "Permintaan tidak valid.";
}
