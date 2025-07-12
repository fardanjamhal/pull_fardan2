<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // pastikan path ini sesuai

include '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $cek = mysqli_query($connect, "SELECT * FROM login WHERE email='$email'");

    if (mysqli_num_rows($cek) > 0) {
        $token = bin2hex(random_bytes(32));
        $expire = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Simpan token dan kadaluarsa ke DB
        mysqli_query($connect, "UPDATE login SET reset_token='$token', reset_expired='$expire' WHERE email='$email'");
        
        // Buat link reset password
        $host = $_SERVER['HTTP_HOST'];
        $folder = dirname($_SERVER['PHP_SELF']);
        $link = "https://$host$folder/reset-password.php?token=$token";

        // Kirim email pakai PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host = 'mail.dedig.id';                  // Bisa pakai smtp.domainkamu.com jika di hosting sendiri
            $mail->SMTPAuth = true;
            $mail->Username = '_mainaccount@dedig.id';         // Ganti
            $mail->Password = 'C6H]Ct4c4Yu0c]';               // Ganti: gunakan App Password Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('account@dedig.id', 'Forgot Password'); // Ganti
            $mail->addAddress($email); // ke user yang minta reset

            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Akun Anda';
            $mail->Body = "
                <p>Halo,</p>
                <p>Klik link di bawah ini untuk mengatur ulang password Anda:</p>
                <p><a href='$link'>$link</a></p>
                <p><small>Link ini berlaku sampai: $expire</small></p>
            ";

            $mail->send();
            header("Location: index.php?reset=success");
        } catch (Exception $e) {
            // Gagal kirim email
            error_log("Mailer Error: " . $mail->ErrorInfo); // Untuk log error
            header("Location: index.php?reset=fail");
        }
    } else {
        header("Location: index.php?reset=notfound");
    }
}
?>
