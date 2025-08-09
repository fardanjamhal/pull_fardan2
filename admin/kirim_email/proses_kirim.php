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
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'sipallengu@gmail.com';
      $mail->Password = 'cxfi pvck yicu omlk';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      $mail->Port = 465;

      $mail->setFrom('sipallengu@gmail.com', 'Aplikasi Surat');
      $mail->addAddress($email);
      $mail->addAttachment($lokasi_simpan);

      $mail->isHTML(true);
      $mail->Subject = $judul;

      // Template email dengan gaya profesional
      $mail->Body = '
      <!DOCTYPE html>
      <html>
      <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
      </head>
      <body style="margin:0; padding:0; font-family: \'Segoe UI\', Roboto, \'Helvetica Neue\', sans-serif; background-color: #f8fafc;">
          <div style="max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); overflow: hidden;">
              <!-- Header -->
              <div style="background: linear-gradient(135deg, #3b82f6 0%, #6366f1 100%); padding: 30px 20px; text-align: center;">
                  <img src="https://dedig.id/assets/img/'.htmlspecialchars($favicon).'" alt="Logo Desa Digital" style="max-height: 60px; display: block; margin: 0 auto 15px;">
                  <h1 style="margin:0; color: white; font-size: 22px; font-weight: 600; letter-spacing: 0.5px;">'.htmlspecialchars($namaDesa).'</h1>
              </div>

              <!-- Body Content -->
              <div style="padding: 30px;">
                  <div style="color: #64748b; font-size: 15px; margin-bottom: 20px;">
                      <p>Yth. Bapak/Ibu,</p>
                      <p>Dengan hormat, berikut ini kami sampaikan dokumen resmi dari Pemerintah <strong style="color: #1e293b;">'.htmlspecialchars($namaDesa).'</strong>:</p>
                  </div>

                  <div style="background-color: #f1f5f9; border-radius: 8px; padding: 20px; border-left: 4px solid #3b82f6; margin-bottom: 25px;">
                      <h3 style="margin:0; color: #1e40af; font-size: 18px;">'.htmlspecialchars($judul).'</h3>
                  </div>

                  <p style="color: #64748b; font-size: 15px; line-height: 1.6;">
                      Dokumen terlampir dapat Anda buka dan unduh untuk diperiksa. Mohon diperhatikan batas waktu yang telah ditentukan.
                  </p>

                  <div style="margin: 30px 0 25px 0; text-align: right;">
                      <p style="margin:0 0 5px 0; color: #64748b; font-size: 14px;">Hormat kami,</p>
                      <p style="margin:0; color: #1e40af; font-size: 15px; font-weight: 600;">Pemerintah '.htmlspecialchars($namaDesa).'</p>
                  </div>
              </div>

              <!-- Footer -->
              <div style="background-color: #1e293b; padding: 20px; text-align: center; color: #e2e8f0;">
                  <p style="margin:0; font-size: 13px; line-height: 1.5;">
                      &copy; '.date('Y').' Pemerintah '.htmlspecialchars($namaDesa).'<br>
                      <span style="font-size:12px; color: #94a3b8;">Email ini dikirim secara otomatis, harap tidak membalas</span>
                  </p>
              </div>
          </div>
      </body>
      </html>';


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
