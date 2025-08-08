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

      // Ambil nama desa dari tabel profil_desa
      $qProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
      $profil = mysqli_fetch_assoc($qProfil);
      $nama_desa = $profil['nama_desa'];

      $mail->isHTML(true);
      $mail->Subject = $judul;

      // Template email dengan gaya profesional
      $mail->Body = '
        <div style="text-align: center; font-family: Arial, sans-serif; max-width: 600px; border: 1px solid #cce5ff; padding: 20px; background-color: #f4faff; color: #003366;">
          <h2 style="text-align: center; color: #0066cc; border-bottom: 1px solid #cce5ff; padding-bottom: 10px;">Pengiriman Dokumen</h2>

          <p>Yth. Bapak/Ibu,</p>

          <p>Dengan hormat, kami informasikan bahwa telah dikirimkan surat dengan judul:</p>

          <p style="font-size: 16px;"><b>' . htmlspecialchars($judul) . '</b></p>

          <p>Silakan periksa lampiran untuk melihat isi surat tersebut.</p>

          <p>Terima kasih atas perhatian dan kerjasamanya.</p>

          <br><br>
          <p>Hormat kami,</p>
          <p style="font-weight: bold; color: #004085;">Pemerintah Desa ' . htmlspecialchars($nama_desa) . '</p>
        </div>
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
