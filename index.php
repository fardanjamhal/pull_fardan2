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

		@media (max-width: 768px) {
			.glow-title {
				font-size: 20pt;
				text-align: center;
			}

			.navbar-nav {
				text-align: right;
			}

			.container {
				padding-top: 10vh !important;
			}

			.navbar-brand img {
				width: 40px;
			}

			.btn {
				font-size: 14px !important;
				padding: 8px 10px;
			}

			.footer {
				font-size: 12px;
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
	<a class="navbar-brand ml-4 mt-1" href="#">
  	<img src="assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 50px; height: auto;">
	</a>
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


			<style>
			/* Efek logo mengambang */
			.logo-box {
			background: rgba(255, 255, 255, 0.05);
			border-radius: 16px;
			padding: 15px 25px;
			box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
			width: fit-content;
			}

			.logo-img {
			width: 100px;
			height: auto;
			}

			/* Teks ketik */
			.glow-title {
			font-family: monospace;
			font-weight: bold;
			font-size: 2.5rem;
			color: white;
			min-height: 3.5rem;
			display: inline-flex;
			align-items: center;
			gap: 6px;
			position: relative;
			}

			.cursor {
			display: inline-block;
			color: white;
			animation: blink 0.7s steps(1) infinite;
			font-size: 2.5rem;
			position: relative;
			top: -4px;
			}

			@keyframes blink {
			0%, 100% { opacity: 1; }
			50% { opacity: 0; }
			}

			/* Tombol modern */
			.btn-surat {
			background: linear-gradient(135deg, #00c6ff, #0072ff);
			color: white;
			padding: 12px 30px;
			font-size: 1.1rem;
			font-weight: bold;
			border-radius: 30px;
			text-decoration: none;
			transition: all 0.3s ease;
			box-shadow: 0 4px 15px rgba(0, 114, 255, 0.4);
			display: inline-flex;
			align-items: center;
			gap: 8px;
			}

			.btn-surat:hover {
			background: linear-gradient(135deg, #0072ff, #00c6ff);
			box-shadow: 0 6px 25px rgba(0, 114, 255, 0.6);
			transform: translateY(-2px);
			}

			@media screen and (max-width: 576px) {
					.container {
						padding-top: 0 !important;
						min-height: 80vh;
						display: flex;
						flex-direction: column;
						justify-content: center;
						align-items: center;
					}

					.logo-box {
						margin-bottom: 20px; /* Jarak antara logo dan teks */
					}

					.glow-title {
						font-size: 1.3rem;
						min-height: 2rem;
						justify-content: center;
						text-align: center;
						margin-bottom: 20px; /* Jarak antara teks dan tombol */
					}

					.cursor {
						font-size: 1.3rem;
						top: -2px;
					}

					.logo-img {
						width: 80px;
					}

					.btn-surat {
						font-size: 1rem;
						padding: 10px 20px;
						text-align: center;
						margin-bottom: -18px; /* Jarak jika ada elemen di bawah tombol */
					}
					}

			</style>


<!-- KONTEN -->
<?php
include('config/koneksi.php');

// Ambil data profil desa
$query = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = 1");
$row = mysqli_fetch_assoc($query);

$nama_desa = isset($row['nama_desa']) ? strtoupper($row['nama_desa']) : 'DESA';
$kota = isset($row['kota']) ? strtoupper($row['kota']) : 'KOTA';
?>

<!-- Tampilan HTML -->
<div class="container text-center" style="padding-top: 18vh; padding-bottom: 100px;">
  <!-- Logo Desa -->
  <div class="logo-box mx-auto mb-4">
    <img src="assets/img/<?php echo $row['logo_desa']; ?>" alt="Logo Desa" class="logo-img">
  </div>
<br><br>
  <!-- Efek Teks -->
  <div class="glow-title mb-5">
    <span id="typewriter"></span><span class="cursor">|</span>
  </div>

  <!-- Tombol Buat Surat -->
  <div>
    <a href="surat/" class="btn-surat">
      <i class="fas fa-envelope me-2"></i> BUAT SURAT
    </a>
  </div>
</div>

<!-- FOOTER -->

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




<?php
$nama_desa = strtoupper($row['nama_desa']);
$kota = strtoupper($row['kota']);
?>

<!-- JavaScript -->
<script>
const textArray = [
  "Sistem Pelayanan Administrasi",
  "<?php echo $nama_desa; ?>",
  "<?php echo $kota; ?>"
];

let typingElement = document.getElementById('typewriter');
let i = 0;
let j = 0;
let isDeleting = false;
let delay = 100;

function typeEffect() {
  let current = textArray[i];
  if (isDeleting) {
    typingElement.textContent = current.substring(0, j--);
  } else {
    typingElement.textContent = current.substring(0, j++);
  }

  if (!isDeleting && j === current.length + 1) {
    isDeleting = true;
    delay = 1500; // waktu jeda sebelum menghapus
  } else if (isDeleting && j === 0) {
    isDeleting = false;
    i = (i + 1) % textArray.length;
    delay = 300;
  } else {
    delay = isDeleting ? 50 : 100;
  }

  setTimeout(typeEffect, delay);
}

typeEffect();
</script>



<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

</body>
</html>