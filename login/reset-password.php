<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload dan koneksi
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php'; // Pastikan path benar
include '../config/koneksi.php';

echo file_exists(__DIR__ . '/../vendor/autoload.php') ? 'Autoload OK' : 'Autoload NOT found';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        $token = bin2hex(random_bytes(32));
        $expire = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Simpan token dan expired ke database
        $update = mysqli_query($connect, "UPDATE login SET reset_token='$token', reset_expired='$expire' WHERE email='$email'");

        if (!$update) {
            header("Location: index.php?reset=fail");
            exit;
        }

        // Buat link reset password
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $domain = $_SERVER['HTTP_HOST'];
        $resetLink = "$protocol://$domain/login/reset-password.php?token=$token"; // Pastikan path sesuai

        // Kirim email menggunakan PHPMailer
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'mail.dedig.id';
            $mail->SMTPAuth = true;
            $mail->Username = 'dontreply@dedig.id'; // Ganti sesuai
            $mail->Password = 'Cx~E[v.KY0s)Ven3';         // Ganti sesuai
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('dontreply@dedig.id', 'Forgot Password');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Akun Anda';
            $mail->Body = "
                <p>Halo,</p>
                <p>Silakan klik link di bawah ini untuk mengatur ulang password Anda:</p>
                <p><a href='$resetLink'>$resetLink</a></p>
                <p>Link ini hanya berlaku sampai <strong>$expire</strong>.</p>
                <br><p>Jika Anda tidak meminta reset, abaikan email ini.</p>
            ";

            $mail->send();
            header("Location: index.php?reset=success");
        } catch (Exception $e) {
            error_log("Email error: " . $mail->ErrorInfo);
            header("Location: index.php?reset=fail");
        }

    } else {
        header("Location: index.php?reset=notfound");
    }
}
?>
