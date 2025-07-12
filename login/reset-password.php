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
  <!-- Google Font + Bootstrap + FontAwesome -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    * {
      box-sizing: border-box;
    }
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
    }
    .wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
      padding: 15px;
    }
    .card {
      max-width: 400px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .card-header {
      text-align: center;
      background: transparent;
      padding: 20px;
    }
    .card-header h3 {
      margin: 0;
      font-weight: 600;
      color: #1d3557;
    }
    .form-control {
      background-color: #f1f1f1;
    }
    .login_btn {
      background-color: #1d3557;
      color: white;
      border-radius: 25px;
      font-weight: 500;
      transition: all 0.3s;
    }
    .login_btn:hover {
      background-color: #457b9d;
    }
    .position-relative .toggle-password {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #666;
    }
    .card-footer {
      background-color: #f1f1f1;
      font-size: 0.8rem;
      text-align: center;
      padding: 10px;
    }
  </style>
</head>
<body>

<div class="wrapper">
  <div class="card">
    <div class="card-header">
      <h3>Reset Password</h3>
    </div>
    <div class="card-body px-4">
      <form method="POST" action="reset-password-process.php" id="resetForm">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <div class="form-group position-relative">
          <label>Password Baru</label>
          <input type="password" name="password" id="password" class="form-control" required minlength="6">
          <i class="fa-solid fa-eye toggle-password" id="eyeIcon" onclick="togglePassword()"></i>
          <div class="invalid-feedback">Password minimal 6 karakter</div>
        </div>

        <div class="form-group">
          <label>Konfirmasi Password</label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
          <div class="invalid-feedback">Password tidak cocok</div>
        </div>

        <button type="submit" class="btn login_btn btn-block">Simpan Password</button>
      </form>
    </div>
    <div class="card-footer">
      &copy; <span id="year"></span> Desa Lebang Manai Utara
    </div>
  </div>
</div>

<script>
  function togglePassword() {
    const input = document.getElementById("password");
    const icon = document.getElementById("eyeIcon");
    if (input.type === "password") {
      input.type = "text";
      icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.replace("fa-eye-slash", "fa-eye");
    }
  }

  // Validasi saat submit
  document.getElementById('resetForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm_password');
    let valid = true;

    if (password.value.length < 6) {
      password.classList.add('is-invalid');
      valid = false;
    } else {
      password.classList.remove('is-invalid');
    }

    if (password.value !== confirm.value) {
      confirm.classList.add('is-invalid');
      valid = false;
    } else {
      confirm.classList.remove('is-invalid');
    }

    if (!valid) e.preventDefault();
  });

  // Tahun footer otomatis
  document.getElementById("year").textContent = new Date().getFullYear();
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
