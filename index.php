<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php
	include('config/koneksi.php');

	// Ambil data dari profil_desa
	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Cek apakah ada favicon tersimpan, jika tidak pakai default
	$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
	?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/img/<?php echo $favicon; ?>">

	<title>e-SuratDesa</title>
	<link rel="stylesheet" href="assets/fontawesome-free-5.10.2-web/css/all.css">
	<link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.css">

	<!-- Particles.js Library -->
	<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

	<style type="text/css">
		body, html {
			margin: 0;
			padding: 0;
			height: 100%;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		#particles-js {
			position: fixed;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			z-index: -1;
			background-color: #000;
		}

		.glow-title {
			font-size: 28pt;
			color: #0ff;
			font-weight: bold;
			text-shadow:
				0 0 5px #0ff,
				0 0 10px #0ff,
				0 0 20px #0ff,
				0 0 40px #0ff;
			animation: neonGlow 2s ease-in-out infinite alternate;
			text-transform: uppercase;
			letter-spacing: 2px;
		}

		@keyframes neonGlow {
			from {
				text-shadow:
					0 0 5px #0ff,
					0 0 10px #0ff,
					0 0 20px #0ff,
					0 0 40px #0ff;
			}
			to {
				text-shadow:
					0 0 10px #0ff,
					0 0 20px #0ff,
					0 0 40px #0ff,
					0 0 80px #0ff;
			}
		}
	</style>
</head>
<body>

<!-- Background Particles -->
<div id="particles-js"></div>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black; box-shadow: 0 0 15px rgba(0, 174, 255, 0.6);">
	<a class="navbar-brand ml-4 mt-1" href="#">

	<?php
	include('config/koneksi.php');

	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);
	?>
	<div style="position: absolute; top: 50%; left: 10%; transform: translate(-50%, -50%);">
  	<img src="assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 50px; height: auto;">
	</div>
	<hr>


		
	</a>
	<button class="navbar-toggler mr-4 mt-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav ml-auto mt-lg-3 mr-5 text-right">
			<li class="nav-item active">
				<a class="nav-link" href="#"><i class="fas fa-home"></i>&nbsp;HOME</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="surat/">BUAT SURAT</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="tentang/">TENTANG <b>e-SuratDesa</b></a>
			</li>
			<li class="nav-item ml-3">
				<?php
					session_start();
					if(empty($_SESSION['username'])){
						echo '<a class="btn btn-dark" href="login/"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>';
					}else if(isset($_SESSION['lvl'])){
						echo '<a class="btn btn-transparent text-light" href="admin/"><i class="fa fa-user-cog"></i> ' . $_SESSION['lvl'] . '</a>';
						echo '<a class="btn btn-transparent text-light" href="login/logout.php"><i class="fas fa-power-off"></i></a>';
					}
				?>
			</li>
		</ul>
	</div>
	
</nav>

<!-- KONTEN -->
<div class="container" style="padding-top:20vh; padding-bottom:120px" align="center">
	<div class="glow-title mb-4">Sistem Pelayanan Administrasi</div>

	<?php
	include('config/koneksi.php');

	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);
	?>
	<img src="assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 120px; height: auto;"><hr>
	
	<?php  
		include('config/koneksi.php');
		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
		foreach($qTampilDesa as $row){
	?>
	
	<a class="text-light" style="font-size:18pt; text-transform: uppercase;"><strong>DESA <?php echo $row['nama_desa']; ?></strong><br>
	<a class="text-light" style="font-size:18pt; text-transform: uppercase;"><strong><?php echo $row['kota']; ?></strong></a><hr>
	<?php } ?>
	<a href="surat/" class="btn btn-outline-light" style="font-size:15pt"><i class="fas fa-envelope"></i> BUAT SURAT</a>
</div>

<!-- FOOTER -->
<div class="footer bg-transparent text-center mb-3">
  <span class="text-light">
    <strong>&copy; <span id="year"></span> 
      <a href="#" class="text-decoration-none text-white">Pelayanan Surat Desa</a>
    </strong>
  </span>
</div>

<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>

<!-- Particles Config -->
<script>
  particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 80,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": { "value": "#00ffff" },
      "shape": { "type": "circle" },
      "opacity": { "value": 0.5 },
      "size": { "value": 3, "random": true },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#00ffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 1,
        "direction": "none",
        "out_mode": "out"
      }
    },
    "interactivity": {
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        }
      },
      "modes": {
        "grab": {
          "distance": 200,
          "line_linked": { "opacity": 0.5 }
        }
      }
    },
    "retina_detect": true
  });
</script>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

</body>
</html>