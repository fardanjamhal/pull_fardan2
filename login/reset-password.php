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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

	<style>
	* {
		box-sizing: border-box;
	}
	html, body {
		height: 100%;
		margin: 0;
		padding: 0;
		font-family: 'Poppins', sans-serif;
		background: #f8f9fa;
		overflow: hidden;
	}
	.wrapper {
		display: flex;
		align-items: center;
		justify-content: center;
		height: 100%;
		width: 100%;
		padding: 15px;
	}
	.card {
		width: 100%;
		max-width: 400px;
		border-radius: 1rem;
		box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
		background-color: #ffffff;
	}
	.card-header {
		text-align: center;
		padding: 20px 10px 10px;
		background-color: transparent;
	}
	.card-header h3 {
		color: #1d3557;
		font-weight: 600;
		margin-bottom: 0;
	}
	.input-group-text {
		background-color: #1d3557;
		color: #fff;
		border: none;
	}
	.form-control {
		background-color: #f1f1f1;
		border-left: none;
	}
	.login_btn {
		background-color: #1d3557;
		color: white;
		border-radius: 25px;
		font-weight: 500;
		transition: all 0.3s;
		width: 100%;
	}
	.login_btn:hover {
		background-color: #457b9d;
	}
	.card-footer {
		background-color: #f1f1f1;
		text-align: center;
		font-size: 0.8rem;
		color: #555;
		padding: 10px;
		border-top: none;
	}
	.alert {
		width: 100%;
		max-width: 400px;
		margin: 0 auto 10px auto;
		padding: 10px;
		border-radius: 8px;
	}
	/* Style untuk validasi error */
	.is-invalid {
		border-color: #dc3545;
	}
	.invalid-feedback {
		display: none;
		color: #dc3545;
		font-size: 0.85rem;
	}
	.is-invalid ~ .invalid-feedback {
		display: block;
	}
</style>

</head>
<body>

<div class="wrapper">
  <div class="card">
    <div class="card-header">
      <h3>Reset Password</h3>
    </div>
    <div class="card-body p-4">
      <form method="POST" action="reset-password-process.php" id="resetForm">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <!-- Password Baru -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru" required minlength="6">
            <div class="input-group-append">
              <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                <i class="fas fa-eye" id="eyeIcon"></i>
              </span>
            </div>
          </div>
          <div class="invalid-feedback">Password minimal 6 karakter</div>
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
          </div>
          <div class="invalid-feedback">Konfirmasi password tidak cocok</div>
        </div>

        <button type="submit" class="btn login_btn btn-block">Simpan Password</button>
      </form>
    </div>
    <div class="card-footer text-center">
      &copy; <span id="year"></span> Desa Lebang Manai Utara
    </div>
  </div>
</div>


<!-- JS -->
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

  // Validasi form
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

  // Tahun otomatis
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
