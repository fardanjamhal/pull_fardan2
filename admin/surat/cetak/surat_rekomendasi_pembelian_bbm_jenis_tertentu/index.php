<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_rekomendasi_pembelian_bbm_jenis_tertentu.*, surat_rekomendasi_pembelian_bbm_jenis_tertentu.id_arsip 
		FROM surat_rekomendasi_pembelian_bbm_jenis_tertentu 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_rekomendasi_pembelian_bbm_jenis_tertentu.id_arsip 
		WHERE surat_rekomendasi_pembelian_bbm_jenis_tertentu.id_srpbjt = '$id'
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
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b><?php echo $row['jenis_surat']; ?></b></h4>
		<h4 style="font-weight:normal; margin:0;"><?php echo $row['no_surat']; ?></h4>
		</div>
	<div class="clear"></div>
	<div id="isi3">

			<td style="padding:0; margin:0; line-height:1;">Dasar Hukum :</td>
			<td style="padding:0; margin:0; line-height:1;">
			<?php
			// Tambahkan margin kiri ke <p> agar isi bergeser ke kanan
			$isi = str_replace('<p', '<p style="margin:0 0 0 0; padding:0; line-height:1;"', $row['isi_surat']);
			echo $isi;
			?>
			</td>

			<br>
			<td>Dengan ini memberikan Rekomendasi kepada:</td>

		<style>
		table {
		border-collapse: collapse;
		}

		table tr,
		table td {
		padding-top: 0;
		padding-bottom: 0;
		margin: 0;
		line-height: 1.2;
		}
		</style>

		<table width="100%">
			<tr>
				<td width="35%" style="padding-left: 40px;">Nama</td>
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
			</tr>
			<tr>
				<td style="padding-left: 40px;">Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo strtoupper($row['jenis_kelamin']); ?></td>
			</tr>
			<tr>
				<td style="padding-left: 40px;">Keperluan BBM</td>
				<td>:</td>
				<td><?php echo $row['keperluan_bbm']; ?></td>
			</tr>
			<tr>
				<td style="padding-left: 40px;">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
			<td style="padding-left: 40px;">Alamat pada KTP</td>
			<td>:</td>
			<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
			</tr>
			<tr>
				<td style="padding-left: 40px; vertical-align: top;">Konsumen Pengguna</td>
				<td style="vertical-align: top;"></td>
				<td style="vertical-align: top;">
					1. Usaha Mikro <br>
					2. Pertanian <br>
					3. Perikanan
				</td>
			</tr>
			<tr>
				<td style="padding-left: 40px;">Jenis Usaha / Kegiatan</td>
				<td>:</td>
				<td><?php echo $row['jenis_usaha']; ?></td>
			</tr>
		</table>
		
		<td>1. <?php echo $row['alokasi_volume']; ?></td>

		<table width="100%">
			<tr>
				<td width="35%" style="padding-left: 40px;">Sejumlah</td>
				<td width="2%">:</td>
				<td width="60%"><?php echo $row['sejumlah']; ?></td>
			</tr>
			<tr>
				<td style="padding-left: 40px;">Tempat Pengambilan</td>
				<td>:</td>
				<td><?php echo $row['tempat_pengambilan']; ?></td>
			</tr>
			<tr>
				<td style="padding-left: 40px;">Nomor Lembaga Penyalur</td>
				<td>:</td>
				<td><?php echo $row['nomor_lembaga_penyalur']; ?></td>
			</tr>
			<tr>
				<td style="padding-left: 40px;">Lokasi</td>
				<td>:</td>
				<td><?php echo $row['lokasi']; ?></td>
			</tr>
		</table>

		<td>2. Berdasarkan Hasil Verifikasi Kebutuhan BBM Digunakan Untuk Sarana Sebagai Berikut :</td>
		<br><br>

		<table width="100%">
		<td>
		<div style="text-align: center; width: 100%;">
			<?php echo $row['tabel_bbm']; ?>
		</div>
		</td>
		</table>
		
		<br>
		<?php function formatTanggalIndonesia($tanggal) {
			$bulan = [
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
			];

			$tgl = date('d', strtotime($tanggal));
			$bln = date('F', strtotime($tanggal));
			$thn = date('Y', strtotime($tanggal));

			return $tgl . ' ' . $bulan[$bln] . ' ' . $thn;
		}
		?>
		<td>
		Masa Berlaku Rekomendasi ini sejak dikeluarkan sampai dengan 
		<?php echo formatTanggalIndonesia($row['masa_berlaku']); ?>.
		</td>
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Rekomendasi ini dibuat dan diberikan kepada yang bersangkutan agar dapat di pergunakan sebagaimana mestinya.  
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
					// Termasuk id_pejabat_desa dari tabel surat_rekomendasi_pembelian_bbm_jenis_tertentu
					$qCek = mysqli_query($connect, "SELECT penduduk.*, surat_rekomendasi_pembelian_bbm_jenis_tertentu.* FROM penduduk LEFT JOIN surat_rekomendasi_pembelian_bbm_jenis_tertentu ON surat_rekomendasi_pembelian_bbm_jenis_tertentu.nik = penduduk.nik WHERE surat_rekomendasi_pembelian_bbm_jenis_tertentu.id_srpbjt='$id'");

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
								echo "<br><br><br><br>";
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
									echo '<img src="' . $url_gambar . '?' . time() . '" alt="Barcode Pejabat" style="max-width: 80px;  margin-top: -18px">';
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