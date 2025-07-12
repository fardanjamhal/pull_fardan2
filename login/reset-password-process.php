<?php
include '../config/koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['token'], $_POST['password'], $_POST['confirm_password'])) {
    $token           = mysqli_real_escape_string($connect, $_POST['token']);
    $password        = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    $username        = isset($_POST['username']) ? trim($_POST['username']) : null;

    // Validasi password cocok
    if ($password !== $confirmPassword) {
        header("Location: index.php?msg=confirm_mismatch");
        exit;
    }

    // Validasi panjang password
    if (strlen($password) < 5) {
        header("Location: index.php?msg=weak_password");
        exit;
    }

    // Cek token aktif
    $query = mysqli_query($connect, "SELECT id FROM login WHERE reset_token='$token' AND reset_expired > NOW()");
    if (mysqli_num_rows($query) === 0) {
        header("Location: index.php?msg=expired");
        exit;
    }

    $data = mysqli_fetch_assoc($query);
    $id   = (int)$data['id'];

    // Siapkan update
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Update query dinamis
    if (!empty($username)) {
        $usernameEscaped = mysqli_real_escape_string($connect, $username);
        $sql = "UPDATE login SET username='$usernameEscaped', password='$passwordHash', reset_token=NULL, reset_expired=NULL WHERE id=$id";
    } else {
        $sql = "UPDATE login SET password='$passwordHash', reset_token=NULL, reset_expired=NULL WHERE id=$id";
    }

    if (mysqli_query($connect, $sql)) {
        header("Location: index.php?msg=reset_success");
        exit;
    } else {
        header("Location: index.php?msg=update_error");
        exit;
    }
} else {
    header("Location: index.php?msg=invalid");
    exit;
}
