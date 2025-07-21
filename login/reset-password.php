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

// Ambil nama desa dari tabel profil_desa
$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
$profil = mysqli_fetch_assoc($query);

// Ambil nama desa dan favicon/logo
$namaDesa = $profil['nama_desa'] ?? 'Desa';
$favicon  = !empty($profil['logo_desa']) ? $profil['logo_desa'] : 'mini-logo.png';


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
            $mail->Password = '@Gowa151121';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            // Set From dengan nama desa
            $mail->setFrom('dontreply@dedig.id', 'Aplikasi Surat | ' . $namaDesa);
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password Akun Anda';
            $mail->Body = '
              <div style="font-family: Arial, sans-serif; background-color: #f4f6f8; padding: 0; max-width: 600px; margin: auto; border-radius: 8px; overflow: hidden; color: #333;">
                
                <!-- Header -->
                <div style="background-color: #000; color: #fff; padding: 20px; text-align: center;">
                  <img src="https://dedig.id/assets/img/' . htmlspecialchars($favicon) . '" alt="Logo Desa" style="max-height: 70px; margin-bottom: 10px;">
                  <h2 style="margin: 0; font-size: 22px;">' . htmlspecialchars($namaDesa) . '</h2>
                </div>

                <!-- Body -->
                <div style="padding: 30px;">
                  <p style="font-size: 16px;">Halo,</p>
                  <p style="font-size: 15px;">Kami menerima permintaan untuk mengatur ulang password Anda. Klik tombol di bawah ini untuk melanjutkan:</p>

                  <div style="text-align: center; margin: 30px 0;">
                    <a href="' . htmlspecialchars($resetLink) . '" style="background-color: #007bff; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold;">
                      Reset Password
                    </a>
                  </div>

                  <p style="font-size: 14px;">Atau salin dan tempel link berikut di browser Anda:</p>
                  <p style="word-break: break-all;">
                    <a href="' . htmlspecialchars($resetLink) . '" style="color: #007bff;">' . htmlspecialchars($resetLink) . '</a>
                  </p>

                  <p style="font-size: 13px; color: #555;"><strong>Catatan:</strong> Link berlaku sampai <strong>' . htmlspecialchars($expire) . '</strong>.</p>
                  <p style="font-size: 13px; color: #888;">Jika Anda tidak meminta pengaturan ulang, abaikan email ini. Tidak ada perubahan yang dilakukan.</p>
                </div>

                <!-- Footer -->
                <div style="background-color: #000; color: #fff; text-align: center; padding: 15px; font-size: 12px;">
                  &copy; ' . date('Y') . ' ' . htmlspecialchars($namaDesa) . '. All rights reserved.
                </div>
              </div>
            ';

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
    header("Location: index.php?msg=token_not_found");
    exit;
    }

    if (strtotime($data['reset_expired']) < time()) {
        header("Location: index.php?msg=link_expired");
        exit;
    }

    // Tampilkan form reset password
    ?>
    <!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>Reset Password | <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>
	<link rel="shortcut icon" href="../assets/img/<?php echo $favicon; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    <div class="card-header text-center">
      <a href="../">
        <img src="../assets/img/<?php echo htmlspecialchars($profil['logo_desa'] ?? 'mini-logo.png'); ?>" alt="Logo Desa" style="max-height: 70px; display: block; margin: 0 auto;">
      </a>
      <h3 class="mt-2" style="font-size: 20px; font-weight: 600; color: #333;">Reset Password</h3>
    </div>
    <div class="card-body p-4">

      <form method="POST" action="reset-password-process.php" id="resetForm">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <!-- Username Baru -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username Baru" required minlength="3">
          </div>
          <div class="invalid-feedback">Username minimal 3 karakter</div>
        </div>

        <!-- Password Baru -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password Baru" required minlength="5">
            <div class="input-group-append">
              <span class="input-group-text" onclick="toggleVisibility('password', 'eyeIcon1')" style="cursor: pointer;">
                <i class="fas fa-eye" id="eyeIcon1"></i>
              </span>
            </div>
          </div>
          <div class="invalid-feedback">Password minimal 5 karakter</div>
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
            <div class="input-group-append">
              <span class="input-group-text" onclick="toggleVisibility('confirm_password', 'eyeIcon2')" style="cursor: pointer;">
                <i class="fas fa-eye" id="eyeIcon2"></i>
              </span>
            </div>
          </div>
          <div class="invalid-feedback">Konfirmasi password tidak cocok</div>
        </div>

        <button type="submit" class="btn login_btn btn-block">Simpan</button>
      </form>

    </div>
  </div>
</div>

<script>
  // Ganti nama fungsi agar cocok dengan HTML
  function toggleVisibility(fieldId, iconId) {
    const input = document.getElementById(fieldId);
    const icon = document.getElementById(iconId);
    if (input.type === "password") {
      input.type = "text";
      icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.replace("fa-eye-slash", "fa-eye");
    }
  }

  // Validasi form saat submit
  document.getElementById('resetForm').addEventListener('submit', function(e) {
    const password = document.getElementById('password');
    const confirm = document.getElementById('confirm_password');
    let valid = true;

    if (password.value.length < 5) {
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

  // Tahun otomatis di footer (jika digunakan)
  const yearEl = document.getElementById("year");
  if (yearEl) {
    yearEl.textContent = new Date().getFullYear();
  }
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
