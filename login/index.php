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

include_once __DIR__ . '/../admin/surat/cetak/helper/hapus_qr_lama.php';

if (!isset($_SESSION['last_qr_cleanup']) || $_SESSION['last_qr_cleanup'] !== date('Y-m-d')) {
    // Arahkan ke folder QR sesuai lokasi sebenarnya
    hapusQrLama(__DIR__ . '/../admin/surat/qr/', 15); // 15 hari
    $_SESSION['last_qr_cleanup'] = date('Y-m-d');
}

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
html, body {
    height: 100%;
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(#457b9d, #1d3557); 
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Wrapper full center */
.wrapper {
    width: 100%;
    padding: 15px;
}

/* Card Glassmorphism */
.card {
    width: 100%;
    max-width: 420px;
    min-height: 420px;
    border-radius: 1rem;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(12px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.2);
    color: #1d3557;
    animation: fadeInUp 0.9s ease forwards;
    transform: translateY(20px);
    opacity: 0;
}
@keyframes fadeInUp {
    to { transform: translateY(0); opacity: 1; }
}

.card-header {
    text-align: center;
    padding: 25px 15px 10px;
    border-bottom: none;
}
.card-header img {
    width: 80px;
    margin-bottom: 10px;
}
.card-header h5 {
    margin-top: 8px;
    font-weight: 600;
    color: #1d3557;
}

/* Input */
.form-control {
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    border-left: none;
    transition: all 0.3s ease;
}
.form-control:focus {
    background: #fff;
    border-color: #457b9d;
    box-shadow: 0 0 0 0.2rem rgba(69,123,157,0.25);
}

/* Icon input */
.input-group-text {
    background: #1d3557;
    color: #fff;
    border: none;
}

/* Tombol */
.login_btn {
    background: #1d3557;
    border: none;
    color: #fff;
    border-radius: 25px;
    font-weight: 500;
    padding: 10px;
    transition: all 0.3s ease;
}
.login_btn:hover {
    background: #457b9d;
    color: #fff;
    transform: translateY(-2px);
}

/* Link */
a {
    color: #1d3557;
    font-size: 0.9rem;
}
a:hover {
    color: #457b9d;
    text-decoration: none;
}

/* Footer */
.card-footer {
    text-align: center;
    font-size: 0.85rem;
    color: #555;
    background: transparent;
    border-top: none;
}

/* Alert smooth */
.alert {
    animation: fadeIn 0.5s ease;
}
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
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
				<br>
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
					<br>
					<button type="submit" class="btn login_btn btn-block">Login</button>
				</form>

				<!-- Link Forgot Password -->
				<div class="text-right">
				<a href="#" data-toggle="modal" data-target="#modalForgotPassword" style="color: #555;">Lupa Password?</a>
				</div>

			</div>
			<div class="card-footer">
				&copy; <span id="year"></span> Pelayanan Surat
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
