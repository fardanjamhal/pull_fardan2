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

	<title>Buat Surat - <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>
  	<link rel="stylesheet" href="../assets/fontawesome-free-5.10.2-web/css/all.css">
	<link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.css">

	<style>
	html, body {
		max-width: 100%;
		overflow-x: hidden;
	}
	.row {
		padding-left: 15px;
		padding-right: 15px;
		}

	</style>

	<style>
	@media (max-width: 576px) {
		.row {
		padding-left: 15px;
		padding-right: 15px;
		}
	}
	</style>

</head>
	<body class="bg-light">
	
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

		<style>
		/* ====== GLOBAL ====== */
		body {
		background: #f4f7fb;
		font-family: 'Segoe UI', sans-serif;
		color: #333;
		}

		/* ====== NAVBAR ====== */
		.navbar {
		background: rgba(13, 71, 161, 0.85);
		backdrop-filter: blur(12px);
		border-bottom: 1px solid rgba(255,255,255,0.1);
		}
		.navbar-brand img {
		border-radius: 50%;
		box-shadow: 0 3px 8px rgba(0,0,0,0.2);
		}
		.nav-link {
		font-weight: 500;
		transition: 0.3s;
		}
		.nav-link:hover {
		color: #ffeb3b !important;
		}

		/* ====== SEARCH BOX ====== */
		#searchSurat {
		border-radius: 50px;
		padding: 12px 20px;
		border: 1px solid #ddd;
		box-shadow: 0 4px 15px rgba(0,0,0,0.06);
		transition: 0.3s;
		}
		#searchSurat:focus {
		border-color: #1976d2;
		box-shadow: 0 4px 15px rgba(25, 118, 210, 0.3);
		}

		/* ====== RUNNING TEXT ====== */
		.running-text-wrapper {
		width: 95%;
		margin: 15px auto;
		padding: 8px 0;
		border-radius: 30px;
		background: linear-gradient(90deg, #e3f2fd, #bbdefb);
		overflow: hidden;
		box-shadow: 0 3px 10px rgba(25, 118, 210, 0.1);
		}
		.running-text {
		white-space: nowrap;
		animation: marquee 18s linear infinite;
		font-weight: 500;
		color: #0d47a1;
		}
		@keyframes marquee {
		0% { transform: translateX(100%) }
		100% { transform: translateX(-100%) }
		}

		/* ====== CARD SURAT ====== */
		.card.surat-card {
		background: #fff;
		border-radius: 16px;
		border: none;
		padding-top: 80px;
		box-shadow: 0 6px 20px rgba(0,0,0,0.06);
		position: relative;
		overflow: hidden;
		transition: all 0.3s ease;
		}
		.card.surat-card::before {
		content: '';
		position: absolute;
		top: -40px;
		right: -40px;
		width: 120px;
		height: 120px;
		background: rgba(25, 118, 210, 0.08);
		border-radius: 50%;
		}
		.card.surat-card:hover {
		transform: translateY(-5px);
		box-shadow: 0 10px 25px rgba(0,0,0,0.12);
		}
		.card.surat-card h5 {
		font-size: 1.05rem;
		color: #0d47a1;
		}
		.card.surat-card .btn-info {
		border-radius: 50px;
		font-weight: 500;
		padding: 8px 20px;
		background: linear-gradient(90deg, #1976d2, #0d47a1);
		border: none;
		}
		.card.surat-card .btn-info:hover {
		background: linear-gradient(90deg, #1565c0, #0d47a1);
		}
		</style>


<div class="container-fluid">
	<div style="max-height:cover; padding-top:30px; padding-bottom:60px; position:relative; min-height: 100%;">
		<div>
			<?php 
   	        	if(isset($_GET['pesan'])){
                   	if($_GET['pesan']=="berhasil"){
                  		echo "<div class='alert alert-success'><center>Berhasil membuat surat. Silahkan ambil surat di Kantor Desa di hari kerja!</center></div>";
              		}
              	}
           	?>
		</div>


		<?php
		// Ambil data profil desa
		$query = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = 1");
		$row = mysqli_fetch_assoc($query);

		// Ubah ke huruf besar dan beri nilai default jika kosong
		$nama_desa = isset($row['nama_desa']) ? ucwords(strtolower($row['nama_desa'])) : 'Desa';
		$kota = isset($row['kota']) ? ucwords(strtolower($row['kota'])) : 'Kota';
		?>

		<div class="running-text-wrapper">
		<div class="running-text">
			Selamat Datang di Aplikasi Pelayanan Surat <?php echo $nama_desa; ?> <?php echo $kota; ?>
		</div>
		</div>

		<div class="row mt-4">
			<div class="col-md-6 offset-md-3">
				<input type="text" id="searchSurat" class="form-control form-control-lg" placeholder="🔍 Cari jenis surat...">
			</div>
		</div>

		<div class="row">

			<style>
				.card.surat-card {
				background: linear-gradient(135deg, #e0f7fa, #ffffff);
				background-image: url('https://cdn-icons-png.flaticon.com/512/84/84380.png');
				background-repeat: no-repeat;
				background-size: 80px;
				background-position: top 20px center;
				border: 1px solid #cce;
				border-radius: 12px;
				padding-top: 100px;
				box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
				transition: transform 0.2s ease;
				min-height: 300px;
				}

				.card.surat-card:hover {
				transform: translateY(-5px);
				box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
				}

				.card.surat-card .card-body h5 {
				font-weight: bold;
				font-size: 1.1rem;
				color: #0d47a1; /* selaras dengan warna navbar/footer */
				}

				.card.surat-card .btn-info {
				background-color: #1976d2; /* biru cerah yang harmonis */
				border-color: #1976d2;
				font-weight: 500;
				color: #fff;
				}

				.card.surat-card .btn-info:hover {
				background-color: #1565c0; /* warna hover lebih gelap tapi tetap biru */
				border-color: #1565c0;
				}

			</style>

				<?php
				$suratFolders = [
				"surat_keterangan",
				"surat_keterangan_berkelakuan_baik",
				"surat_keterangan_domisili",
				"surat_keterangan_kepemilikan_kendaraan_bermotor",
				"surat_keterangan_perhiasan",
				"surat_keterangan_usaha",
				"surat_lapor_hajatan",
				"surat_pengantar_skck",
				"surat_keterangan_tidak_mampu",
				"formulir_pengantar_nikah",
				"formulir_permohonan_kehendak_nikah",
				"formulir_persetujuan_calon_pengantin",
				"formulir_persetujuan_calon_pengantin_istri",
				"formulir_surat_izin_orang_tua",
				"surat_keterangan_kematian",
				"surat_keterangan_domisili_usaha",
				"surat_keterangan_pengantar",
				"surat_keterangan_beda_identitas",
				"surat_keterangan_beda_identitas_kis",
				"surat_keterangan_penghasilan_orang_tua",
				"surat_pengantar_hewan",
				"surat_keterangan_kematian_dan_penguburan",
				"surat_keterangan_pindah_penduduk",
				"surat_keterangan_pengantar_rujuk_atau_cerai",
				"surat_keterangan_wali_hakim",
				"surat_keterangan_mahar_sunrang",
				"surat_keterangan_jual_beli",
				"surat_keterangan_belum_terbit_sppt_pbb",
				"surat_perintah_perjalanan_dinas",
				"surat_tugas",
				"surat_keterangan_hibah",
				"surat_rekomendasi_pembelian_bbm_jenis_tertentu",
				"surat_pengantar",
				"surat_keterangan_ganti_pekerjaan",
				"surat_keterangan_pisah",
				"surat_keterangan_belum_nikah",
				"surat_keterangan_janda",
				"surat_keterangan_sudah_nikah",
				"surat_keterangan_merantau",
				"surat_keterangan_masih_hidup",
				"surat_keterangan_belum_memiliki_rumah",
				"surat_keterangan_belum_memiliki_kwh",
				"surat_keterangan_tidak_berlangganan_pdam",
				"surat_keterangan_kelahiran",
				"surat_keterangan_pengalihan_hak_garap",
				"surat_pernyataan_kesepakatan_bersama",
				"surat_keterangan_pengoperan_hak_garap",
				"surat_keterangan_ahli_waris",
				"surat_keterangan_menikah"
				];

				// Siapkan array baru berisi folder + judul + singkatan
				$daftarSurat = [];

				foreach ($suratFolders as $folder) {
				// Ubah underscore ke spasi, lalu kapitalisasi awal kata
				$judul = ucwords(str_replace("_", " ", $folder));

				// Buat singkatan dari huruf pertama setiap kata
				$kata = explode(" ", $judul);
				$singkatan = '';
				foreach ($kata as $k) {
					$singkatan .= strtoupper(substr($k, 0, 1));
				}

				// Gabungkan ke format: Judul (Singkatan)
				$judulLengkap = $judul . " ($singkatan)";

				// Tambahkan ke array
				$daftarSurat[] = ['folder' => $folder, 'judul' => $judulLengkap];
				}


				// Urutkan berdasarkan abjad judul
				usort($daftarSurat, function($a, $b) {
				return strcmp($a['judul'], $b['judul']);
				});
				?>


			<style>
			.surat-item {
				width: 100%;
				max-width: 360px; /* Lebih lebar dari 320px */
				margin-left: auto;
				margin-right: auto;
			}

			@media (max-width: 576px) {
				.surat-item {
				max-width: 100% !important;
				}
			}
			</style>

			<div class="d-flex flex-wrap justify-content-center" id="daftarSurat">
			<?php $no = 1; foreach ($daftarSurat as $surat): ?>
				<div class="surat-item mt-4 p-2">
				<div class="card surat-card text-center h-100">
					<div class="card-body d-flex flex-column justify-content-between">
					<h5><?= $no++ . ". " . $surat['judul']; ?></h5>
					<a href="<?= $surat['folder']; ?>/" class="btn btn-info mt-3">Buat Surat</a>
					</div>
				</div>
				</div>
			<?php endforeach; ?>
			</div>

		</div>
	</div>
</div>

<?php include '../surat/part/footer.php'; ?>

<!-- Tambahkan file JS Bootstrap agar navbar toggle berfungsi -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function(){
    $('#searchSurat').on('keyup', function() {
      var keyword = $(this).val().toLowerCase();
      $('.surat-item').filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
      });
    });
  });
</script>


</body>
</html>
