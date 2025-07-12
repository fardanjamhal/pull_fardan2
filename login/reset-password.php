<?php
// Aktifkan error log dan tampilan error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';
include '../config/koneksi.php';

// Tampilkan konfirmasi autoload
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    die("Autoload NOT found");
}

// === HANDLE POST (kirim email reset password)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        $token = bin2hex(random_bytes(32));
        $expire = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Simpan token
        $update = mysqli_query($connect, "UPDATE login SET reset_token='$token', reset_expired='$expire' WHERE email='$email'");
        if (!$update) die("Gagal update token ke database.");

        // Buat link reset
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
                <p>Silakan klik link di bawah ini untuk mengatur ulang password Anda:</p>
                <p><a href='$resetLink'>$resetLink</a></p>
                <p><small>Link berlaku sampai <strong>$expire</strong>.</small></p>
                <br><p>Jika Anda tidak merasa meminta reset, abaikan email ini.</p>
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

// === HANDLE GET (menampilkan form reset jika token valid)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $token = $_GET['token'];
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE reset_token='$token' AND reset_expired > NOW()");
    if (mysqli_num_rows($cek) === 0) {
        die("Link tidak valid atau sudah kadaluarsa.");
    }
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

<?php } ?>
