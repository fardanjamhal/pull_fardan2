<?php
// Tampilkan error saat debug
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Timezone disamakan dengan database
date_default_timezone_set("Asia/Makassar");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';
include '../../config/koneksi.php';

if (isset($_POST['kirim'])) {
  $judul = $_POST['judul'];
  $email = $_POST['email_tujuan'];
  $file = $_FILES['file_surat'];

  $nama_file = time() . '_' . basename($file['name']);
  $lokasi_simpan = 'uploads/' . $nama_file;

  // Upload file
  if (move_uploaded_file($file['tmp_name'], $lokasi_simpan)) {
    $mail = new PHPMailer(true);

    try {
      

      $mail->isSMTP();
      $mail->Host = 'mail.mentorcpns.id';
      $mail->SMTPAuth = true;
      $mail->Username = '_mainaccount@mentorcpns.id';
      $mail->Password = '@Gowa151121';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port = 465;

      $mail->setFrom('admin@dedig.id', 'Aplikasi Surat Desa');
      $mail->addAddress($email);
      $mail->addAttachment($lokasi_simpan);
      $mail->isHTML(true);
      $mail->Subject = $judul;
      $mail->Body = '
                    <p>Yth. Bapak/Ibu,</p>

                    <p>Berikut ini kami kirimkan surat dengan judul: <b>' . htmlspecialchars($judul) . '</b>.</p>

                    <p>Silakan periksa lampiran untuk melihat isi surat tersebut.</p>

                    <p>Terima kasih atas perhatian dan kerjasamanya.</p>

                    <br>
                    <p>Hormat kami</p>
                  ';


      $mail->send();

      // Simpan ke database
      mysqli_query($connect, "INSERT INTO kirim_email (judul, email_tujuan, file_surat, tanggal_kirim) VALUES ('$judul', '$email', '$nama_file', NOW())");

      echo "<script>alert('Email berhasil dikirim'); window.location='index.php';</script>";
    } catch (Exception $e) {
      echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
    }
  } else {
    echo "Gagal upload file.";
  }
}
?>
