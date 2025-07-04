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
			/* Perkecil kotak aktif di HP */
			.active-nav-bg {
				display: inline-block;
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


<div class="container-fluid">
	<div style="max-height:cover; padding-top:30px; padding-bottom:60px; position:relative; min-height: 100%;">
		
		<br>
    
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ?>


	<?php
    // Ambil data dari URL
    $id_arsip       = $_GET['id_arsip'] ?? '-';
    $jenis          = $_GET['jenis'] ?? '-';
    $waktu_disalin  = $_GET['waktu_disalin'] ?? '-';
    $nama           = $_GET['nama'] ?? '-';
    $nik            = $_GET['nik'] ?? '-';

    // Format jenis surat
    $jenis_surat = ucwords(str_replace('_', ' ', $jenis));

    // Ambil nomor WA admin dari database
    include '../config/koneksi.php'; // pastikan file koneksi dimuat
    $qProfil = mysqli_query($connect, "SELECT wa_admin FROM profil_desa LIMIT 1");
    $dataProfil = mysqli_fetch_assoc($qProfil);

    // Bersihkan dan ubah ke format 62
    $no_wa = preg_replace('/[^0-9]/', '', $dataProfil['wa_admin'] ?? '');

    if (substr($no_wa, 0, 1) === '0') {
        $no_wa = '62' . substr($no_wa, 1); // ubah 08xx jadi 628xx
    } elseif (substr($no_wa, 0, 2) !== '62') {
        $no_wa = '62' . $no_wa; // jika tidak pakai 0 atau 62
    }

    // Susun isi pesan WA
    $pesan = "Halo admin, saya ingin konfirmasi pengajuan surat:\n"
          . "\n"
          . "*ID Arsip:* $id_arsip\n"
          . "*Jenis Surat:* $jenis\n"
          . "*Tanggal:* $waktu_disalin\n"
          . "*Nama:* $nama\n"
          . "*NIK:* $nik\n"
          . "Mohon bantuannya.";
    $pesan_encoded = urlencode($pesan);
    ?>

    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'berhasil'): ?>
      <style>
        .card-center {
          max-width: 700px;
          margin: 40px auto;
          padding: 25px 30px;
          background-color: #e6f4ea;
          border-left: 6px solid #28a745;
          border-radius: 1rem;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.07);
        }

        .card-center h5 {
          color: #218838;
          font-size: 1.25rem;
        }

        .card-center p {
          font-size: 15px;
          color: #333;
        }

        .table-detail th {
          width: 180px;
          font-weight: 500;
          background-color: #f6fff8;
        }

        .table-detail td,
        .table-detail th {
          font-size: 14px;
          padding: 8px 12px;
          vertical-align: middle;
        }

        .table-detail {
          background-color: #fff;
          border-radius: 0.5rem;
          overflow: hidden;
        }

        .btn-outline-primary {
          font-size: 14px;
          padding: 6px 14px;
        }

        @media print {
          html, body {
            height: auto !important;
          }

          .card-center {
            page-break-inside: avoid;
            height: auto !important;
          }

          .no-print {
            display: none !important;
          }
        }
      </style>

      <div id="area-cetak">
        <div class="card-center">
          <div class="d-flex align-items-center mb-3">
            <i class="fas fa-check-circle me-2" style="color: #28a745; font-size: 1.6rem;"></i>
            <h5 class="fw-semibold mb-0">&nbsp;Surat berhasil diajukan!</h5>
          </div>

          <p class="mb-4">
            Terima kasih, surat Anda telah berhasil diajukan dan saat ini sedang dalam proses verifikasi oleh petugas.
            Nomor surat akan diterbitkan setelah proses selesai.
          </p>

          <div class="table-responsive">
            <table class="table table-sm table-bordered align-middle table-detail">
              <tbody>
                <tr>
                  <th>ID Pengajuan</th>
                  <td><?= htmlspecialchars($id_arsip) ?></td>
                </tr>
                <tr>
                  <th>Jenis Surat</th>
                  <td><?= htmlspecialchars($jenis_surat) ?></td>
                </tr>
                <tr>
                  <th>Tanggal Pengajuan</th>
                  <td><?= htmlspecialchars($waktu_disalin) ?></td>
                </tr>
                <tr>
                  <th>Nama</th>
                  <td><?= htmlspecialchars($nama) ?></td>
                </tr>
                <tr>
                  <th>NIK</th>
                  <td><?= htmlspecialchars($nik) ?></td>
                </tr>
                <tr>
                  <th>Nomor Surat</th>
                  <td><em class="text-muted">Menunggu konfirmasi</em></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="mt-4 text-end">
            <a href="../index.php" class="btn btn-outline-primary rounded-pill">
              <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
            <button onclick="printDiv('area-cetak', '<?= htmlspecialchars($id_arsip) ?>')" class="btn btn-outline-success no-print">
              <i class="fas fa-print"></i> Cetak / Simpan PDF
            </button>
            <button onclick="bukaWhatsApp()" class="btn btn-success rounded-pill btn-sm">
              <i class="fab fa-whatsapp"></i> Konfirmasi via WhatsApp
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- ✅ Script di luar blok PHP agar selalu terbaca -->
    <script>
      function printDiv(divId, id_arsip) {
        const originalTitle = document.title;
        document.title = "arsip-" + id_arsip;
        window.print();
        setTimeout(() => {
          document.title = originalTitle;
        }, 1000);
      }

      function bukaWhatsApp() {
        const nomor = "<?= $no_wa ?>";
        const pesan = "<?= $pesan_encoded ?>";
        const isMobile = /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        const link = isMobile
          ? `https://wa.me/${nomor}?text=${pesan}`
          : `https://web.whatsapp.com/send?phone=${nomor}&text=${pesan}`;
        window.open(link, '_blank');
      }
    </script>


<?php include '../surat/part/footer.php'; ?>

<!-- Tambahkan file JS Bootstrap agar navbar toggle berfungsi -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
