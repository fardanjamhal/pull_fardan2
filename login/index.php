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

</body>
</html>
