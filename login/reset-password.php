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
    <html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h4 class="card-title text-center">Reset Password</h4>
                <form method="POST" action="reset-password-process.php">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="password" class="form-control" required minlength="6">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Simpan Password</button>
                </form>
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
    exit;
}

// Jika tidak POST atau GET valid
header("Location: index.php");
exit;
?>
