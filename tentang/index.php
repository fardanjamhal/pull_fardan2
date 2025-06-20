<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

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

	<title>e-SuratDesa</title>

	<!-- Bootstrap 4 CSS -->
	<link
		rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		/>
	<!-- FontAwesome -->
	<link
		rel="stylesheet"
		href="../assets/fontawesome-free-5.10.2-web/css/all.css"
	/>

	<style type="text/css">
		.img-circle {
			width: 150px;
			height: 150px;
			border-radius: 100%;
		}
	</style>
</head>
<body class="bg-light">
	<div>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand ml-4 mt-1" href="../">

			<?php
			include('../config/koneksi.php');

			$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
			$data = mysqli_fetch_assoc($query);
			?>
			<div style="position: absolute; top: 50%; left: 10%; transform: translate(-50%, -50%);">
			<img src="../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 50px; height: auto;">
			</div>
			<hr>

			</a>
			<button
				class="navbar-toggler mr-4 mt-3"
				type="button"
				data-toggle="collapse"
				data-target="#navbarTogglerDemo02"
				aria-controls="navbarTogglerDemo02"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul
					class="navbar-nav ml-auto mt-lg-3 mr-5 position-relative text-right"
				>
					<li class="nav-item">
						<a class="nav-link" href="../">HOME</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../surat">BUAT SURAT</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#"
							><i class="fas fa-info-circle"></i>&nbsp;TENTANG
							<b>e-SuratDesa</b></a
						>
					</li>
					<li class="nav-item active ml-5">
						<?php
						session_start();

						if (empty($_SESSION['username'])) {
							echo
								'<a class="btn btn-light text-info" href="../login/"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>';
						} else if (isset($_SESSION['lvl'])) {
							echo
								'<a class="btn btn-transparent text-light" href="../admin/"><i class="fa fa-user-cog"></i> ' .
								$_SESSION['lvl'] .
								'</a>';
							echo
								'<a class="btn btn-transparent text-light" href="../login/logout.php"><i class="fas fa-power-off"></i></a>';
						}
						?>
					</li>
				</ul>
			</div>
		</nav>
		
	</div>

	<div class="container-fluid">
		<div class="container shadow p-3 mb-5 mt-lg-5 bg-white rounded">
			<div
				style="
					max-height: cover;
					padding-top: 30px;
					padding-bottom: 60px;
					position: relative;
					min-height: 100%;
				"
			>
				<div class="card-body">
					<div class="card-text">
						<p>
							<label style="font-weight: 700; font-size: 25px"
								><i class="fas fa-info-circle"></i> APA ITU e-SuratDesa?</label
							>
							<hr />
							<blockquote>
								Web Aplikasi untuk pelayanan surat administrasi desa yang
								dikembangkan oleh
								<b
									><a href="#" style="text-decoration: none"
										>Desa Digital</a
									></b
								>
								untuk mempermudah penduduk dalam pembuatan surat administrasi
								desa secara online.
								<br /><br />
							</blockquote>
						</p>
						<br />
					</div>
					<br /><br /><br />
			</div>
		</div>
		<div class="card-footer py-2 bg-transparent text-center">
			<div class="footer bg-transparent text-center">
				<span class="text-dark">
				<strong>&copy; <span id="year"></span> 
					<a href="#" class="text-decoration-none text-dark">Pelayanan Surat Desa</a>
				</strong>
				</span>
			</div>
			<script>
				document.getElementById("year").textContent = new Date().getFullYear();
			</script>
	</div>
	</div>

	

	<!-- Bootstrap JS dependencies agar navbar toggle berfungsi -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
