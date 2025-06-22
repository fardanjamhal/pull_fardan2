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

	<title>e-SuratDesa</title>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg py-1" style="background: linear-gradient(90deg, #0d47a1, #1976d2); box-shadow: 0 4px 12px rgba(0,174,255,0.4);">
  <a class="navbar-brand d-flex align-items-center ml-3" href="#">
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
        <a class="nav-link text-light" href="#"><i class="fas fa-envelope-open-text"></i> Buat Surat</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../tentang/"><i class="fas fa-info-circle"></i> Tentang Kami</a>
      </li>
      <li class="nav-item mx-2 mt-1">
        <?php
        session_start();
        if (empty($_SESSION['username'])) {
          echo '<a class="btn btn-outline-light btn-sm" href="../login/"><i class="fas fa-sign-in-alt"></i> Login</a>';
        } else if (isset($_SESSION['lvl'])) {
          echo '<a class="btn btn-outline-light btn-sm mr-2" href="admin/"><i class="fas fa-user-shield"></i> ' . $_SESSION['lvl'] . '</a>';
          echo '<a class="btn btn-danger btn-sm" href="login/logout.php"><i class="fas fa-sign-out-alt"></i></a>';
        }
        ?>
      </li>
    </ul>
  </div>
</nav>

<style>
.running-text-wrapper {
  width: 98.5%;
  max-width: 100%;
  margin: 0 auto;
  overflow: hidden;
  background: whitesmoke;
  color: #00acc1;
  padding: 10px 0;
  position: relative;
  border-radius: 12px;
  border: 0.2px solid #00acc1; /* Garis berwarna aqua */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  text-align: center;
}


.running-text {
  display: inline-block;
  white-space: nowrap;
  padding-left: 100%;
  animation: marquee 35s linear infinite;
  font-weight: bold;
  font-size: 1.05rem;
}

@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-100%); }
}

@media screen and (max-width: 576px) {
  .running-text-wrapper {
    width: 93%;
  }

  .running-text {
    font-size: 0.9rem;
  }
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
			Selamat Datang di Aplikasi Pelayanan Surat Administrasi <?php echo $nama_desa; ?> <?php echo $kota; ?>
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
				color: #006064;
				}

				.card.surat-card .btn-info {
				background-color: #00acc1;
				border-color: #00acc1;
				font-weight: 500;
				}

				.card.surat-card .btn-info:hover {
				background-color: #00838f;
				border-color: #00838f;
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
				"surat_keterangan_kematian_dan_penguburan"
				];

				// Siapkan array baru berisi folder + judul
				$daftarSurat = [];
				foreach ($suratFolders as $folder) {
				$judul = strtoupper(str_replace("_", " ", $folder));
				$daftarSurat[] = ['folder' => $folder, 'judul' => $judul];
				}

				// Urutkan berdasarkan abjad judul
				usort($daftarSurat, function($a, $b) {
				return strcmp($a['judul'], $b['judul']);
				});
				?>

				<div class="row">
				<?php $no = 1; foreach ($daftarSurat as $surat): ?>
					<div class="col-sm-3 mt-4">
					<div class="card surat-card text-center">
						<div class="card-body">
						<h5 class="card-title"><?= $no++ . ". " . $surat['judul']; ?></h5>
						<a href="<?= $surat['folder']; ?>/" class="btn btn-info mt-3">BUAT SURAT</a>
						</div>
					</div>
					</div>
				<?php endforeach; ?>
				</div>


		</div>
	</div>
</div>

	<div class="card-footer py-2 text-center">
			<div class="footer text-center">
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

<!-- Tambahkan file JS Bootstrap agar navbar toggle berfungsi -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
