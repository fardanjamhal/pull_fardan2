<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_belum_terbit_sppt_pbb.*, surat_keterangan_belum_terbit_sppt_pbb.id_arsip 
		FROM surat_keterangan_belum_terbit_sppt_pbb 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_belum_terbit_sppt_pbb.id_arsip 
		WHERE surat_keterangan_belum_terbit_sppt_pbb.id_skbtsp = '$id'
	");

	while($row = mysqli_fetch_array($qCek)){

		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
		foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
			$qCekPejabatDesa = mysqli_query($connect,"
				SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa 
				FROM pejabat_desa 
				WHERE pejabat_desa.id_pejabat_desa = '$id_pejabat_desa'
			");

			while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
				// cetak data di sini
?>

<html>
<head>
	<link rel="shortcut icon" href="../../../../assets/img/mini-logo.png">
	<title><?php echo $row['no_surat']; ?></title>
	<link href="../../../../assets/formsuratCSS/formsurat.css" rel="stylesheet" type="text/css"/>
	<style type="text/css" media="print">
	    @page { margin: 0; }
  		body { 
  			margin: 1cm;
  			margin-left: 2cm;
  			margin-right: 2cm;
  			font-family: "Times New Roman", Times, serif;
  		}
	</style>
</head>
<body>
<div>

	<table width="100%" style="text-align: center; margin: 0 auto;">
	<tr>
		<?php
		// Ambil data profil untuk $rows jika belum ada
		include('../../../../config/koneksi.php');
		$q = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
		$rows = mysqli_fetch_assoc($q);

		// Tampilkan kop surat
		include('../kop_surat.php');
		?>
	</tr>
	</table>

	<hr style="border: 1px solid #000; width: 100%;">
	<br>
		<div align="center">
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b>SURAT KETERANGAN BELUM TERBIT SPPT/PBB</b></h4>
		<h4 style="font-weight:normal; margin:0;">Nomor : <?php echo $row['no_surat']; ?></h4>
		</div>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini adalah Pemerintah  
			<span style="text-transform: capitalize;">
				<?php echo $rows['nama_desa']; ?>
			</span> 
			<span style="text-transform: capitalize;">
				<?php echo $rows['kecamatan']; ?>
			</span> 
			<span style="text-transform: capitalize;">
				<?php echo $rows['kota']; ?>
			</span> :
			</td>
		</tr>
		<br>
		</table>

		<style>
		.tabel-print {
			width: 100%;
			border-collapse: collapse;
			font-size: 9pt; /* font lebih kecil */
		}

		.tabel-print th,
		.tabel-print td {
			border: 1px solid #000;
			padding: 4px 6px;
			text-align: left;
			vertical-align: top;
		}

		.tabel-print th {
			background-color: #f0f0f0;
			text-align: center;
		}
		</style>

		<table width="100%" style="text-transform: capitalize;">
			<?php
			include('../../../../config/koneksi.php');

			// Ambil nama pejabat dan jabatannya dari pejabat_desa urutan pertama
			$query = "SELECT nama_pejabat_desa, jabatan, nip, alamat FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1";
			$result = mysqli_query($connect, $query);

			$nama_pejabat = '';
			$jabatan = '';
			$nip = '';
			$alamat = '';
			if ($data = mysqli_fetch_assoc($result)) {
				$nama_pejabat = $data['nama_pejabat_desa'];
				$jabatan = $data['jabatan'];
				$nip = $data['nip'];
				$alamat = $data['alamat'];
			}
			?>
			<tr>
				<td width="30%" style="padding-left: 40px;">Nama</td>
				<td width="2%">:</td>
				<td width="60%"><strong><?php echo htmlspecialchars($nama_pejabat); ?></strong></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Jabatan</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower(htmlspecialchars($jabatan))); ?></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Alamat</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower(htmlspecialchars($alamat))); ?></td>
			</tr>

			</table>
			<br>
			<td>Menerangkan bahwa :</td>
			<table width="100%" style="text-transform: capitalize;">

			<tr>
				<td width="30%" style="padding-left: 40px;">Nama</td>
				<td width="2%">:</td>
				<td width="60%"><strong><?php echo strtoupper($row['nama']); ?></strong></td>
			</tr>
			<?php
				$tgl_lhr = date($row['tgl_lahir']);
				$tgl = date('d ', strtotime($tgl_lhr));
				$bln = date('F', strtotime($tgl_lhr));
				$thn = date(' Y', strtotime($tgl_lhr));
				$blnIndo = array(
				    'January' => 'Januari',
				    'February' => 'Februari',
				    'March' => 'Maret',
				    'April' => 'April',
				    'May' => 'Mei',
				    'June' => 'Juni',
				    'July' => 'Juli',
				    'August' => 'Agustus',
				    'September' => 'September',
				    'October' => 'Oktober',
				    'November' => 'November',
				    'December' => 'Desember'
				);
			?>
			<tr>
				<td width="30%" style="padding-left: 40px;">Tempat/Tanggal Lahir</td>
				<td>:</td>
				<td>
				<?php 
					// Gabungkan tempat lahir dan tanggal lahir dulu
					$tempat_tgl = $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn;
					// Buat semua jadi lowercase dulu supaya rapi
					$tempat_tgl_lower = strtolower($tempat_tgl);
					// Lalu ubah huruf awal setiap kata jadi kapital
					echo ucwords($tempat_tgl_lower);
				?>
				</td>
			<tr>
				<td width="30%" style="padding-left: 40px;">NIK</td>
				<td>:</td>
				<td><?php echo strtoupper($row['nik']); ?></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo strtoupper($row['jenis_kelamin']); ?></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Pekerjaan</td>
				<td>:</td>
				<td><?php echo strtoupper($row['pekerjaan']); ?></td>
			</tr>
			</tr>
			<tr>
			<td width="30%" style="padding-left: 40px;">Alamat</td>
			<td>:</td>
			<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row);
				?>
			</td>
			</tr>
			</table>
		
		<table width="100%">
			<?php
		// Fungsi untuk kapitalisasi setiap kata
		function capitalizeEachWord($string) {
			$string = strtolower($string); // ubah semua jadi lowercase dulu
			return ucwords($string);       // kapitalisasi huruf awal setiap kata
		}
		?>

		<br>
		<table width="100%">
		<tr>
			<!-- Kolom nomor -->
			<td style="vertical-align: top; padding-left: 10px; width: 25px;">
				1.
			</td>

			<!-- Kolom isi paragraf -->
			<td style="text-align: justify; padding-right: 5px;">
				Adalah pemilik tanah pertanian/non pertanian yang terletak di <?php echo ucwords(strtolower($row['lokasi'])); ?>
 dengan batas-batas sebagai berikut:
			</td>
		</tr>

		</table>

		<style>
		.batas-tanah {
			width: 100%;
			border-collapse: collapse;
			margin-left: 30px; /* Geser tabel ke kanan */
			margin-top: 10px;
			text-transform: uppercase; /* Ubah semua huruf jadi kapital */
			font-weight: normal; /* Hilangkan bold */
			font-size: 14px;
		}

		.batas-tanah td {
			padding: 4px 8px;
			vertical-align: top;
		}

		.batas-tanah td.label {
			width: 80px;
		}

		.batas-tanah td.separator {
			width: 10px;
		}
		</style>

		<table class="batas-tanah">
		<tr>
			<td class="label">Utara</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_utara']; ?></td>
		</tr>
		<tr>
			<td class="label">Timur</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_timur']; ?></td>
		</tr>
		<tr>
			<td class="label">Selatan</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_selatan']; ?></td>
		</tr>
		<tr>
			<td class="label">Barat</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_barat']; ?></td>
		</tr>
		</table>

		<br>
		<table width="100%">
		<tr>
			<!-- Kolom nomor -->
			<td style="vertical-align: top; padding-left: 10px; width: 25px;">
				2.
			</td>

			<!-- Kolom isi paragraf -->
			<td style="text-align: justify; padding-right: 5px;">
				Bahwa belum pernah diterbitkan SPPT/PBB atas tanah tersebut diatas sampai dengan sekarang
			</td>
		</tr>

		</table>

		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dipergunakan seperlunya.  
			</td>
		</tr>
		</table>


		</table>
	</div>
	<table width="100%" style="text-transform: capitalize;">
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td width="10%"></td>
			<td width="30%"></td>
			<td width="10%"></td>
			<td align="center">
				<?php echo $rows['nama_desa']; ?>, 
				<?php
					$tanggalSurat = $row['tanggal_surat'];
					$bulanIndo = array(
						'January' => 'Januari',
						'February' => 'Februari',
						'March' => 'Maret',
						'April' => 'April',
						'May' => 'Mei',
						'June' => 'Juni',
						'July' => 'Juli',
						'August' => 'Agustus',
						'September' => 'September',
						'October' => 'Oktober',
						'November' => 'November',
						'December' => 'Desember'
					);
					$tanggal = date('d', strtotime($tanggalSurat));
					$bulan = date('F', strtotime($tanggalSurat));
					$tahun = date('Y', strtotime($tanggalSurat));
					echo $tanggal . ' ' . $bulanIndo[$bulan] . ' ' . $tahun;
				?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<?php
				include_once '../../../surat/cetak/helper/jabatan.php';
				?>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>




			<table width="100%" style="text-transform: capitalize; border-collapse: collapse;">
			<tr>
			<td style="vertical-align: top; padding-top: -20px; text-align: center; padding-left: 325px;">
			<div>
			<?php
					// Ambil ID Surat Keterangan Domisili dari URL
					$id = $_GET['id'];

					// Variabel untuk menyimpan nama dan jabatan pejabat yang terpilih (dari surat)
					$nama_pejabat_terpilih = '';
					$jabatan_pejabat_terpilih = '';

					// --- PRE-FETCH SEMUA DATA PEJABAT DESA ---
					// Ini untuk mengambil data semua pejabat desa yang mungkin dibutuhkan
					$pejabat_data = [];
					$qAllPejabat = mysqli_query($connect, "SELECT id_pejabat_desa, jabatan, nama_pejabat_desa FROM pejabat_desa ORDER BY id_pejabat_desa ASC");
					if ($qAllPejabat) {
						while ($row_pejabat = mysqli_fetch_assoc($qAllPejabat)) {
							$pejabat_data[$row_pejabat['id_pejabat_desa']] = [
								'jabatan' => $row_pejabat['jabatan'],
								'nama' => $row_pejabat['nama_pejabat_desa']
							];
						}
					} else {
						// Tangani error jika query pejabat desa gagal
						echo "<p>Error saat mengambil data pejabat desa: " . mysqli_error($connect) . "</p>";
					}
					// --- AKHIR PRE-FETCH ---


					// Query utama untuk mengambil data penduduk dan surat keterangan domisili
					// Termasuk id_pejabat_desa dari tabel surat_keterangan_belum_terbit_sppt_pbb
					$qCek = mysqli_query($connect, "SELECT penduduk.*, surat_keterangan_belum_terbit_sppt_pbb.* FROM penduduk LEFT JOIN surat_keterangan_belum_terbit_sppt_pbb ON surat_keterangan_belum_terbit_sppt_pbb.nik = penduduk.nik WHERE surat_keterangan_belum_terbit_sppt_pbb.id_skbtsp='$id'");

					// Periksa apakah query utama berhasil dan ada data surat domisili
					if (mysqli_num_rows($qCek) > 0) {
						$row = mysqli_fetch_array($qCek); // Ambil satu baris data surat domisili
						$id_pejabat_desa = $row['id_pejabat_desa']; // Ini adalah ID pejabat yang akan digunakan dari surat

						// Query untuk mengambil profil desa (asumsi hanya ada 1 profil desa dengan id 1)
						$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
						$rows_desa = mysqli_fetch_array($qTampilDesa); // Ambil satu baris data profil desa

						// Mengisi variabel $nama_pejabat_terpilih dan $jabatan_pejabat_terpilih
						// berdasarkan ID Pejabat Desa dari surat yang sedang diproses
						if (isset($pejabat_data[$id_pejabat_desa])) {
							$current_pejabat = $pejabat_data[$id_pejabat_desa];
							$nama_pejabat_terpilih = $current_pejabat['nama'];
							$jabatan_pejabat_terpilih = $current_pejabat['jabatan'];

							// --- Logika Kondisional berdasarkan id_pejabat_desa ---
							// Variabel $id_pejabat_desa sudah berisi nilai 1 atau 2 (atau lainnya) dari database
							if ($id_pejabat_desa == 1) {

								echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . 
								htmlspecialchars($nama_pejabat_terpilih) . 
								'</span>';

							} elseif ($id_pejabat_desa == 2) {
								
								// Panggil nama dan jabatan pejabat dengan ID 1
								if (isset($pejabat_data[1])) {
									// Pastikan ini adalah path gambar yang valid
									$url_gambar = htmlspecialchars($pejabat_data[2]['nama']);
									// Tampilkan gambar dalam tag <img>
									echo "<br>";
									echo '<img src="' . $url_gambar . '?' . time() . '" alt="Barcode Pejabat" style="max-width: 80px;  margin-top: -94px">';
									echo "<br>";
								} else {
									echo "Detail Pejabat ID 1 tidak ditemukan dalam data pre-fetched.<br>";
								}
								// Panggil nama dan jabatan pejabat dengan ID 2
								if (isset($pejabat_data[2])) {
									echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . 
									htmlspecialchars($pejabat_data[1]['nama']) . 
									'</span>';
								} else {
									echo "Detail Pejabat ID 2 tidak ditemukan dalam data pre-fetched.<br>";
								}
							} else {
								// KODE JIKA ID PEJABAT DESA TIDAK DIKENAL (bukan 1 atau 2)
							
							}
							// --- Akhir Logika Kondisional ---

							// --- Contoh Menampilkan Data dalam Tabel HTML ---
							// Tabel ini akan menampilkan detail pejabat yang *terpilih* dari surat (sesuai id_pejabat_desa dari surat)
					?>
					<?php
							// --- Akhir Contoh Tabel HTML ---

						} else {
							echo "<p>Detail pejabat desa dengan ID **{$id_pejabat_desa}** tidak ditemukan di database (dari data pre-fetched).</p>";
						}

					} else {
						echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . 
									htmlspecialchars($pejabat_data[1]['nama']) . 
									'</span>';
					}
					?>

					<br>
					<?php
						$id = 1; // Misalnya ID = 1
						$query = "SELECT pangkat, nip FROM pejabat_desa WHERE id_pejabat_desa = '$id'";
						$result = mysqli_query($connect, $query);

						if ($data = mysqli_fetch_assoc($result)) {
							// Bersihkan data
							$pangkat = trim($data['pangkat']);
							$nip = trim($data['nip']);

							// Cek apakah pangkat kosong
							if (!empty($pangkat)) {
								echo '<span style="text-transform: none;">' . htmlspecialchars($pangkat) . '</span><br>';
							}

							// NIP akan tetap ditampilkan, dan otomatis "naik" kalau pangkat kosong
							echo '<span style="text-transform: none;">' . htmlspecialchars($nip) . '</span><br>';
						} else {
							echo "Data tidak ditemukan.";
						}
						?>

			</div>
			</td>
			</tr>
			</table>
			



		</tr>
	</table>
</div>
<script>
	window.print();
</script>
</body>
</html>

<?php
			}
		}
  	}
?>