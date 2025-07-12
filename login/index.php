<?php
session_start();
if (isset($_SESSION['admin']) || isset($_SESSION['kades'])) {
    header('location:../admin/dashboard/');
    exit;
}

include('../config/koneksi.php');
$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
$data = mysqli_fetch_assoc($query);
$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Sistem | <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>
	<link rel="shortcut icon" href="../assets/img/<?php echo $favicon; ?>">
	<link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/fontawesome-free-5.10.2-web/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
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
		.card-header img {
			width: 100px;
			margin-bottom: 10px;
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
	</style>
</head>
<body>


<div class="wrapper">
	<div class="w-100">
		<?php if (isset($_GET['pesan']) && $_GET['pesan'] == "login-gagal"): ?>
			<div class="alert alert-danger text-center">Username atau Password Anda salah!</div>
		<?php elseif (isset($_GET['pesan']) && $_GET['pesan'] == "password_diubah"): ?>
			<div class="alert alert-success text-center">Password berhasil diubah. Silakan login kembali.</div>
		<?php endif; ?>

		<?php
		// ALERT dari proses lupa password (via ?reset=...)
		if (isset($_GET['reset'])) {
			$message = '';
			$alertType = '';

			switch ($_GET['reset']) {
				case 'success':
					$message = '✅ Link reset password telah dikirim ke email Anda.';
					$alertType = 'success';
					break;
				case 'fail':
					$message = '❌ Gagal mengirim email. Silakan coba lagi nanti.';
					$alertType = 'danger';
					break;
				case 'notfound':
					$message = '⚠️ Email tidak ditemukan dalam sistem.';
					$alertType = 'warning';
					break;
			}

			if ($message) {
				echo '<div class="container mt-3">
						<div class="alert alert-' . $alertType . ' alert-dismissible fade show" role="alert">
							' . $message . '
							<button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>';
			}
		}

		// ALERT dari hasil reset password (via ?msg=...)
		if (isset($_GET['msg'])) {
			$msg = $_GET['msg'];
			$messages = [
				'reset_success'   => ['✅ Password berhasil diubah. Silakan login.', 'success'],
				'token_not_found' => ['❌ Token tidak ditemukan.', 'danger'],
				'link_expired'    => ['⚠️ Link reset password sudah kadaluarsa.', 'warning'],
				'expired'         => ['⚠️ Token tidak valid atau sudah habis masa berlaku.', 'warning'],
				'invalid'         => ['❌ Permintaan tidak valid.', 'danger']
			];

			if (isset($messages[$msg])) {
				[$text, $type] = $messages[$msg];
				echo '<div class="container mt-3">
						<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert" style="max-width: 400px; margin: 0 auto;">
							' . $text . '
							<button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>';
			}
		}
		?>



		<div class="card mx-auto">
			<div class="card-header">
				<a href="../">
					<img src="../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa">
				</a>
				<h3>Login Sistem</h3>
			</div>
			<div class="card-body p-4">
				<form method="post" action="aksi-login.php">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							<div class="input-group-append">
								<span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
									<i class="fas fa-eye" id="eyeIcon"></i>
								</span>
							</div>
						</div>
					</div>
					<button type="submit" class="btn login_btn btn-block">Login</button>
				</form>

				<!-- Link Forgot Password -->
				<div class="text-right">
				<a href="#" data-toggle="modal" data-target="#modalForgotPassword" style="color: #555;">Lupa Password?</a>
				</div>

			</div>
			<div class="card-footer">
				&copy; <span id="year"></span> Pelayanan Surat Desa
			</div>
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
	document.getElementById("year").textContent = new Date().getFullYear();
</script>


<!-- Modal Forgot Password -->
<!-- Modal -->
<div class="modal fade" id="modalForgotPassword" tabindex="-1" role="dialog" aria-labelledby="modalForgotPasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="reset-password.php" class="modal-content">
      <!-- Header -->
      <div class="modal-header custom-header">
        <h5 class="modal-title" id="modalForgotPasswordLabel">Reset Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- Body -->
      <div class="modal-body">
        <p class="mb-3 text-secondary">Masukkan email Anda, kami akan mengirimkan link reset password.</p>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Alamat Email" required>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button type="submit" class="btn custom-btn btn-block">Kirim Link Reset</button>
      </div>
    </form>
  </div>
</div>

<!-- Kustom CSS -->
<style>
  /* Teks link lupa password */
  .text-muted {
    color: #666 !important;
    font-size: 0.9rem;
  }

  /* Header modal dengan warna netral */
  .custom-header {
    background-color: #f1f1f1; /* Abu terang */
    color: #333;               /* Abu gelap */
    border-bottom: 1px solid #ddd;
  }

  .custom-header .close {
    color: #555;
    opacity: 1;
  }

  .custom-header .close:hover {
    color: #000;
  }

  /* Tombol submit dengan tema biru gelap */
  .custom-btn {
    background-color: #1d3557;
    color: white;
    border-radius: 25px;
    font-weight: 500;
    transition: background-color 0.3s ease;
  }

  .custom-btn:hover {
    background-color: #457b9d;
  }
</style>


<script>
    // Auto hide alert dalam 5 detik
    setTimeout(() => {
        $('.alert').alert('close');
    }, 5000);
</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
