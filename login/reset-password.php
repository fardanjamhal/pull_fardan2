<?php
// Tampilkan error saat debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Timezone disamakan dengan database
date_default_timezone_set("Asia/Makassar");

// Autoload PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';
include '../config/koneksi.php';

// === HANDLE POST: Kirim email reset password ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        $token = bin2hex(random_bytes(32));
        $expire = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Simpan token ke DB
        $update = mysqli_query($connect, "UPDATE login SET reset_token='$token', reset_expired='$expire' WHERE email='$email'");
        if (!$update) die("Gagal menyimpan token reset.");

        // Link reset
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $domain = $_SERVER['HTTP_HOST'];
        $resetLink = "$protocol://$domain/login/reset-password.php?token=$token";

        // Kirim email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'mail.dedig.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'dontreply@dedig.id';
            $mail->Password = 'Cx~E[v.KY0s)Ven3';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('dontreply@dedig.id', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Akun Anda';
            $mail->Body = "
                <p>Halo,</p>
                <p>Klik link di bawah ini untuk mengatur ulang password Anda:</p>
                <p><a href='$resetLink'>$resetLink</a></p>
                <p><small>Link berlaku sampai <strong>$expire</strong>.</small></p>
                <br><p>Abaikan jika Anda tidak meminta reset.</p>
            ";

            $mail->send();
            header("Location: index.php?reset=success");
            exit;
        } catch (Exception $e) {
            error_log("Email error: " . $mail->ErrorInfo);
            header("Location: index.php?reset=fail");
            exit;
        }
    } else {
        header("Location: index.php?reset=notfound");
        exit;
    }
}

// === HANDLE GET: Menampilkan form reset jika token valid ===
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $token = mysqli_real_escape_string($connect, $_GET['token']);
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE reset_token='$token'");
    $data = mysqli_fetch_assoc($cek);

    if (!$data) {
        die("Token tidak ditemukan.");
    }

    if (strtotime($data['reset_expired']) < time()) {
        die("Link sudah kadaluarsa.");
    }

    // Tampilkan form reset password
    ?>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f4f8;
        }
        .card {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
        }
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 38px;
            cursor: pointer;
            color: #aaa;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 420px;">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Reset Password</h4>

            <form method="POST" action="reset-password-process.php" id="resetForm" novalidate>
                <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

                <div class="form-group position-relative">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control" required minlength="6">
                    <span class="password-toggle" onclick="togglePassword()" title="Tampilkan/Sembunyikan Password">
                        👁️
                    </span>
                    <div class="invalid-feedback">
                        Password minimal 6 karakter.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan Password</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS + Validasi + Toggle -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Validasi Bootstrap 4
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            const form = document.getElementById('resetForm');
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();

    // Toggle password visibility
    function togglePassword() {
        const input = document.getElementById("password");
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    }
</script>

</body>
</html>
    <?php
    exit;
}

// Jika tidak POST atau GET valid
header("Location: index.php");
exit;
?>
