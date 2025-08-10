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

	<title>Hubungi Kami- <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>

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

	<!-- NAVBAR -->
	<?php
  	// Ambil folder aktif dari URL, misalnya: "/surat/index.php" → "surat"
		$current_page = basename(dirname($_SERVER['PHP_SELF']));
		?>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg py-1" style="background: linear-gradient(90deg, #0d47a1, #1976d2); box-shadow: 0 4px 12px rgba(0,174,255,0.4);">
		<a class="navbar-brand d-flex align-items-center ml-3" href="../">
			<img src="../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo" style="width: 45px; margin-right: 10px;">
		</a>

		<button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end text-right" id="navbarContent">
			<ul class="navbar-nav ml-auto text-right">
			<li class="nav-item mx-2 <?php echo ($current_page == '' || $current_page == 'index') ? 'active-nav-bg' : ''; ?>">
				<a class="nav-link text-light" href="../">
				<i class="fas fa-home"></i> Beranda
				</a>
			</li>
			<li class="nav-item mx-2 <?php echo ($current_page == 'surat') ? 'active-nav-bg' : ''; ?>">
				<a class="nav-link text-light" href="../surat/">
				<i class="fas fa-envelope-open-text"></i> Buat Surat
				</a>
			</li>
			<li class="nav-item mx-2 <?php echo ($current_page == 'tentang') ? 'active-nav-bg' : ''; ?>">
				<a class="nav-link text-light" href="../tentang/">
				<i class="fas fa-info-circle"></i> Tentang Kami
				</a>
			</li>
			<li class="nav-item mx-2 <?php echo ($current_page == 'hubungi') ? 'active-nav-bg' : ''; ?>">
				<a class="nav-link text-light" href="">
				<i class="fas fa-headset"></i> Hubungi Kami
				</a>
			</li>
			 <li class="nav-item mx-lg-2 my-1 my-lg-0">
				<a class="nav-link text-light" href="../panduan">
				<i class="fas fa-book"></i> Panduan Teknis
				</a>
			</li>
			<li class="nav-item mx-2 mt-1">
				<?php
				session_start();
				if (empty($_SESSION['username'])) {
				echo '<a class="btn btn-outline-light btn-sm" href="../login/"><i class="fas fa-sign-in-alt"></i> Login</a>';
				} else if (isset($_SESSION['lvl'])) {
				echo '<a class="btn btn-outline-light btn-sm mr-2" href="../admin/"><i class="fas fa-user-shield"></i> ' . $_SESSION['lvl'] . '</a>';
				echo '<a class="btn btn-danger btn-sm" href="../login/logout.php"><i class="fas fa-sign-out-alt"></i></a>';
				}
				?>
			</li>
			</ul>
		</div>
		</nav>

	 <style>
		/* Tampilan nav aktif: latar putih, teks biru */
      .active-nav-bg {
        background-color: #ffffff; /* latar putih */
        color: #0d47a1 !important; /* teks biru */
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      /* Jika link di dalam elemen .active-nav-bg */
      .active-nav-bg i,
      .active-nav-bg span,
      .active-nav-bg a {
        color: #0d47a1 !important; /* pastikan icon/teks juga biru */
      }
	  </style>


		<!-- Optional CSS tweak for better mobile spacing -->
		<style>
		@media (max-width: 991.98px) {
			.navbar-nav .nav-item {
			text-align: center;
			}
			.navbar-nav .nav-link {
			font-size: 18px;
			padding: 10px 0;
			}
			.navbar-nav .btn {
			width: 80%;
			margin: 0 auto;
			}
			/* Hapus efek kotak putih saat di HP */
			.active-nav-bg {
			background-color: transparent !important;
			color: #ffffff !important; /* kembali ke putih */
			padding: 0; /* opsional: hilangkan padding ekstra */
			font-weight: normal;
			}

			.active-nav-bg i,
			.active-nav-bg a,
			.active-nav-bg span {
			color: #ffffff !important;
			}
		}
		</style>

	</div>

	<?php
		include '../config/koneksi.php'; // sesuaikan path jika perlu

		// Ambil email dari user login (misalnya user id = 1, atau bisa juga session)
		$queryEmail = mysqli_query($connect, "SELECT email FROM login WHERE id = 1");
		$dataEmail = mysqli_fetch_assoc($queryEmail);
		$email = $dataEmail['email'] ?? '-';

		// Ambil nomor WA dan akun media sosial dari profil desa
		$queryProfil = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
		$dataProfil = mysqli_fetch_assoc($queryProfil);
		$wa = $dataProfil['wa_admin'] ?? '-';
		$instagram = $dataProfil['instagram'] ?? '#';
		$facebook = $dataProfil['facebook'] ?? '#';
		?>

	<div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 91vh;">
  	<div class="contact-card shadow-lg p-4 mb-5 rounded">
    <h3 class="text-center mb-4 text-primary font-weight-bold">
      <i class="fas fa-headset"></i> Hubungi Kami
    </h3>

    <div class="contact-grid">
      <div class="contact-item">
        <div class="icon-circle bg-danger">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="contact-info">
          <strong>Email</strong>
          <span><?= $email ?></span>
        </div>
      </div>

      <div class="contact-item">
        <div class="icon-circle bg-primary">
          <i class="fas fa-phone-alt"></i>
        </div>
        <div class="contact-info">
          <strong>Telepon</strong>
          <span><?= $wa ?></span>
        </div>
      </div>

      <div class="contact-item">
        <div class="icon-circle bg-success">
          <i class="fab fa-whatsapp"></i>
        </div>
        <div class="contact-info">
          <strong>WhatsApp</strong>
          <span><?= $wa ?></span>
        </div>
      </div>

      <div class="contact-item">
        <div class="icon-circle bg-danger">
          <i class="fab fa-instagram"></i>
        </div>
        <div class="contact-info">
          <strong>Instagram</strong>
          <span>@sipallengu</span>
        </div>
      </div>

      <div class="contact-item">
        <div class="icon-circle bg-primary">
          <i class="fab fa-facebook"></i>
        </div>
        <div class="contact-info">
          <strong>Facebook</strong>
          <span>facebook.com/sipallengu</span>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .contact-card {
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);
    width: 100%;              /* Ambil lebar penuh */
  	max-width: 600px;        /* Naik dari 850px ke 1100px */
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
  }

  .contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
  }

  .contact-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    border-radius: 15px;
    background: rgba(255,255,255,0.7);
    transition: background 0.3s ease;
  }

  .contact-item:hover {
    background: rgba(25,118,210,0.05);
  }

  .icon-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
  }

  .contact-info strong {
    display: block;
    font-size: 16px;
    color: #0d47a1;
  }

  .contact-info span {
    font-size: 14px;
    color: #555;
  }
</style>


	<!-- Bootstrap JS dependencies agar navbar toggle berfungsi -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
