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

	<title>PANDUAN TEKNIS INOVASI SIPALLENGU</title>

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
			<li class="nav-item mx-lg-2 my-1 my-lg-0">
				<a class="nav-link text-light" href="../hubungi">
				<i class="fas fa-headset"></i> Hubungi Kami
				</a>
			</li>
			<li class="nav-item mx-2 <?php echo ($current_page == 'panduan') ? 'active-nav-bg' : ''; ?>">
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

		<style>
		.pdf-container {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
			padding: 15px;
			background: #fff;
			border-radius: 10px;
		}
		</style>
	</div>

<br>
 <!-- PDF Viewer - Pedoman Teknis -->
<div class="container py-5">
  <div class="p-4 shadow-lg rounded-4 bg-white">
    <h1 class="text-primary fw-bold mb-2">
      <i class="fas fa-book-open"></i> Pedoman Teknis Penggunaan Inovasi “SI PALLENGU”
    </h1>
    <p class="text-muted mb-4">
      <strong>Sistem Informasi Pelayanan Elektronik untuk Desa dan Kelurahan</strong>
    </p>
    <hr>

    <!-- Section -->
    <section class="mb-4">
      <h4 class="text-primary"><i class="fas fa-info-circle"></i> 1. Pendahuluan</h4>
      <p>SI PALLENGU adalah sistem pelayanan surat-menyurat digital yang dirancang untuk mempercepat pembuatan surat, pengarsipan, dan pelacakan layanan. Pedoman ini menjadi acuan bagi operator/admin desa.</p>
    </section>

    <section class="mb-4">
      <h4 class="text-primary"><i class="fas fa-desktop"></i> 2. Persyaratan Sistem</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="fas fa-memory text-success"></i> RAM minimal 2 GB</li>
        <li class="list-group-item"><i class="fas fa-globe text-success"></i> Browser modern (Chrome, Firefox, Edge)</li>
        <li class="list-group-item"><i class="fas fa-wifi text-success"></i> Koneksi internet/Wi-Fi</li>
        <li class="list-group-item"><i class="fas fa-database text-success"></i> Hosting PHP & MySQL (jika online)</li>
      </ul>
    </section>

    <section class="mb-4">
      <h4 class="text-primary"><i class="fas fa-sign-in-alt"></i> 3. Akses Login</h4>
      <ol class="ps-3">
        <li>Buka browser dan akses alamat sistem (contoh: <a href="https://pallengu.dedig.id/">pallengu.dedig.id</a>).</li>
        <li>Masukkan username & password operator.</li>
        <li>Klik <b>Login</b> untuk masuk ke dashboard.</li>
      </ol>
    </section>

    <section class="mb-4">
      <h4 class="text-primary"><i class="fas fa-bars"></i> 4. Navigasi Utama</h4>
      <div class="row g-2">
        <div class="col-md-4"><span class="badge bg-primary">Beranda</span></div>
        <div class="col-md-4"><span class="badge bg-primary">Profil Desa</span></div>
        <div class="col-md-4"><span class="badge bg-primary">Data Penduduk</span></div>
        <div class="col-md-4"><span class="badge bg-primary">Permintaan Surat</span></div>
        <div class="col-md-4"><span class="badge bg-primary">Surat Selesai</span></div>
        <div class="col-md-4"><span class="badge bg-primary">Laporan</span></div>
      </div>
    </section>

    <section class="mb-4">
      <h4 class="text-primary"><i class="fas fa-file-alt"></i> 5. Cara Membuat Surat</h4>
      <ol class="ps-3">
        <li>Pilih menu <b>Buat Surat</b> pada halaman awal.</li>
        <li>Pilih jenis surat (misal: Surat Domisili, Surat Keterangan Usaha).</li>
        <li>Isi form lengkap (data bisa otomatis melalui NIK).</li>
        <li>Simpan ID pengajuan.</li>
        <li>Cetak langsung atau konfirmasi untuk finalisasi.</li>
      </ol>
    </section>

    <!-- ...lanjutan section sesuai urutan... -->

  </div>
</div>

<style>
  h1, h4 {
    font-family: 'Segoe UI', sans-serif;
  }
  .list-group-item {
    border: none;
    padding-left: 0;
  }
  section {
    border-left: 4px solid #1976d2;
    padding-left: 15px;
  }
</style>



	<!-- Bootstrap JS dependencies agar navbar toggle berfungsi -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
