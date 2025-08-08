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

// Ambil nama desa dari tabel profil_desa
$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
$profil = mysqli_fetch_assoc($query);

// Ambil nama desa dan favicon/logo
$namaDesa = $profil['nama_desa'] ?? 'Desa';
$favicon  = !empty($profil['logo_desa']) ? $profil['logo_desa'] : 'mini-logo.png';

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

      // Template email dengan gaya profesional
      $mail->Body = '
      <div style="font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 0; max-width: 600px; margin: auto; border-radius: 8px; overflow: hidden; color: #333;">

        <!-- Header -->
        <div style="background-color: #000; color: #fff; padding: 20px; text-align: center;">
          <img src="https://dedig.id/assets/img/' . htmlspecialchars($favicon) . '" alt="Logo Desa" style="max-height: 70px; margin-bottom: 10px;">
          <h2 style="margin: 0; font-size: 22px;">' . htmlspecialchars($namaDesa) . '</h2>
        </div>

        <!-- Body -->
        <div style="padding: 30px;">
          <p style="font-size: 16px;">Yth. Bapak/Ibu,</p>

          <p style="font-size: 15px;">Dengan hormat, berikut ini kami sampaikan dokumen dari Pemerintah <b>' . htmlspecialchars($namaDesa) . '</b> dengan judul :</p>

          <p style="font-size: 16px; background-color: #e9f3ff; padding: 10px 15px; border-left: 4px solid #007bff; margin: 20px 0;">
            <b>' . htmlspecialchars($judul) . '</b>
          </p>

          <p style="font-size: 14px;">Silakan periksa lampiran untuk melihat isi surat tersebut.</p>

          <p style="font-size: 14px;">Terima kasih atas perhatian dan kerjasamanya.</p>

          <br>
          <p style="font-size: 14px;">Hormat kami,</p>
          <p style="font-size: 15px; font-weight: bold; color: #004085;">Pemerintah ' . htmlspecialchars($namaDesa) . '</p>
        </div>

        <!-- Footer -->
        <div style="background-color: #000; color: #fff; text-align: center; padding: 15px; font-size: 12px;">
          &copy; ' . date('Y') . ' Pemerintah ' . htmlspecialchars($namaDesa) . '. All rights reserved.
        </div>

      </div>
    ';



      $mail->send();

      // Simpan ke database
      mysqli_query($connect, "INSERT INTO kirim_email (judul, email_tujuan, file_surat, tanggal_kirim) VALUES ('$judul', '$email', '$nama_file', NOW())");

      header("Location: index.php?status=success");
      exit();
    } catch (Exception $e) {
      $error = urlencode($mail->ErrorInfo);
      header("Location: index.php?status=error&msg=$error");
      exit();

    }
  } else {
    echo "Gagal upload file.";
  }
}
?>
