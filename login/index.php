<?php
	session_start();
 
	if(isset($_SESSION['admin'])){
		header('location:../admin/dashboard/');
	}else if(isset($_SESSION['kades'])){
		header('location:../admin/dashboard/');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
	include('../config/koneksi.php');

	// Ambil data dari profil_desa
	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Cek apakah ada favicon tersimpan, jika tidak pakai default
	$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
	?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../assets/img/<?php echo $favicon; ?>">

	<title>Login Page</title>   
	<link rel="stylesheet" href="../assets/fontawesome-free-5.10.2-web/css/all.css">
	<link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.css">
	<style>
		body {
			background: linear-gradient(to right, #1d3557, #457b9d);
			height: 100vh;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}
		.card {
			width: 360px;
			border: none;
			border-radius: 1rem;
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
			background-color: #f8f9fa;
		}
		.card-header h3 {
			font-weight: 600;
			color: #1d3557;
		}
		.input-group-text {
			background-color: #1d3557;
			color: #fff;
			border: none;
		}
		.form-control {
			border-left: none;
			background-color: #f1f1f1;
		}
		.login_btn {
			background-color: #1d3557;
			color: white;
			font-weight: bold;
			border-radius: 30px;
			padding: 8px 20px;
			transition: 0.3s ease;
		}
		.login_btn:hover {
			background-color: #457b9d;
			color: white;
		}
		.card-footer {
			background-color: #1d3557;
			border-top: none;
			border-radius: 0 0 1rem 1rem;
			padding: 10px 15px;
			text-align: center;
			color: #fff;
			font-size: 8pt;
		}
	</style>

<?php
if (isset($_GET['pesan']) && $_GET['pesan'] === 'password_diubah') {
    echo '<div style="padding:10px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:4px; margin-bottom:10px; text-align:center;">
        Password berhasil diubah. Silakan login kembali.
    </div>';
}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg py-1" style="background: linear-gradient(90deg, #0d47a1, #1976d2); box-shadow: 0 4px 12px rgba(0,174,255,0.4);">
  <a class="navbar-brand d-flex align-items-center ml-3" href="">
    <img src="../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo" style="width: 45px; margin-right: 10px;">
  </a>

  <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarContent">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse justify-content-end text-right" id="navbarContent">
    <ul class="navbar-nav ml-auto text-right ">
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../"><i class="fas fa-home"></i> Beranda</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../surat"><i class="fas fa-envelope-open-text"></i> Buat Surat</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../tentang"><i class="fas fa-info-circle"></i> Tentang Kami</a>
      </li>
      <li class="nav-item mx-2 mt-1">
        <?php
        if (empty($_SESSION['username'])) {
          echo '<a class="btn btn-outline-light btn-sm" href=""><i class="fas fa-sign-in-alt"></i> Login</a>';
        } else if (isset($_SESSION['lvl'])) {
          echo '<a class="btn btn-outline-light btn-sm mr-2" href="admin/"><i class="fas fa-user-shield"></i> ' . $_SESSION['lvl'] . '</a>';
          echo '<a class="btn btn-danger btn-sm" href="login/logout.php"><i class="fas fa-sign-out-alt"></i></a>';
        }
        ?>
      </li>
    </ul>
  </div>
</nav>

</head>
<body>
<div class="container">
	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="login-gagal"){
				echo "<div class='alert alert-danger mt-3'><center>Username atau Password Anda salah!</center></div>";
			}
		}
	?>
	<div class="d-flex justify-content-center align-items-center" style="min-height: 90vh;">
		<div class="card p-3">
			<div class="text-center mb-4">

				<?php
				include('../config/koneksi.php');

				$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
				$data = mysqli_fetch_assoc($query);
				?>
				<img src="../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 120px; height: auto;">

			</div>
			<div class="card-header text-center">
				<h3>Login System</h3>
			</div>
			<div class="card-body">
				<form method="post" action="aksi-login.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username" required>			
					</div>
					<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-key"></i></span>
					</div>
					<input type="password" class="form-control" id="password" name="password" placeholder="password" required>
					<div class="input-group-append">
						<span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
						<i class="fas fa-eye" id="eyeIcon"></i>
						</span>
					</div>
					</div>
					<div class="form-group mt-3 d-flex justify-content-center">
						<input type="submit" value="Login" class="btn float-right login_btn w-100">
					</div>
				</form>
			</div>

			<div class="card-footer py-2 bg-transparent text-center">
			<div class="footer bg-transparent text-center">
				<span class="text-dark" style="font-size: 0.9rem;">
				<strong>&copy; <span id="year"></span> 
					<a href="#" class="text-decoration-none text-dark">Pelayanan Surat Desa</a>
				</strong>
				</span>
			</div>

			<script>
				document.getElementById("year").textContent = new Date().getFullYear();
			</script>

			<script>
			function togglePassword() {
				const input = document.getElementById("password");
				const icon = document.getElementById("eyeIcon");

				if (input.type === "password") {
				input.type = "text";
				icon.classList.remove("fa-eye");
				icon.classList.add("fa-eye-slash");
				} else {
				input.type = "password";
				icon.classList.remove("fa-eye-slash");
				icon.classList.add("fa-eye");
				}
			}
			</script>

			</div>


		</div>
	</div>
</div>
</body>
</html>
