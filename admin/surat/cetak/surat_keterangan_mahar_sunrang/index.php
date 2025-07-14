<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skms dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_mahar_sunrang.*, surat_keterangan_mahar_sunrang.id_arsip 
		FROM surat_keterangan_mahar_sunrang 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_mahar_sunrang.id_arsip 
		WHERE surat_keterangan_mahar_sunrang.id_skms = '$id'
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
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b>SURAT KETERANGAN MAHAR ( SUNRANG )</b></h4>
		<h4 style="font-weight:normal; margin:0;">Nomor : <?php echo $row['no_surat']; ?></h4>
		</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<tr>
			<?php
				// Ambil nilai awal dan ubah ke huruf kecil
				$jabatan = strtolower($rowss['jabatan']);
				$nama_desa = strtolower($rows['nama_desa']);
				$kecamatan = strtolower($rows['kecamatan']);
				$kota = strtolower($rows['kota']); // Asumsikan ini nama kabupaten

				// Bersihkan pengulangan kata "desa" atau "kelurahan" ganda
				$nama_desa = preg_replace('/\b(desa|kelurahan)\s+\1\b/i', '$1', $nama_desa);

				// Atasi "kelurahan"
				if (strpos($nama_desa, 'kelurahan') !== false) {
					$final_jabatan = 'Lurah';
					$nama_desa = trim(str_ireplace('kelurahan', '', $nama_desa));
				} else {
					$final_jabatan = ucwords($rowss['jabatan']);
					$nama_desa = trim(str_ireplace('desa', '', $nama_desa));
				}

				// Hindari "kecamatan kecamatan"
				$kecamatan = trim(preg_replace('/\b(kecamatan)\s+\1\b/i', '$1', $kecamatan));
				$kecamatan = trim(str_ireplace('kecamatan', '', $kecamatan));

				// Hindari "kabupaten kabupaten"
				$kota = trim(preg_replace('/\b(kabupaten)\s+\1\b/i', '$1', $kota));
				$kota = trim(str_ireplace('kabupaten', '', $kota));

				// Gabungkan kalimat
				$kalimat = trim($final_jabatan . ' ' . ucwords($nama_desa));
				?>

			<td style="text-align: justify;">
				Yang bertanda tangan di bawah ini :
			</td>
		</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
				<td width="2%">:</td>
				<td width="60%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['orang_tua']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_tgl_lahir2']; ?></td>
			</tr>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
			<td>:</td>
			<td><?php echo $row['alamat2']; ?></td>
		</table>
		<td style="text-align: justify;">
			Telah menyerahkan <strong><?php echo $row['mahar']; ?></strong> kepada anak laki-lakinya :
		</td>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
				<td width="2%">:</td>
				<td width="60%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
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
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tempat_lahir'])) . ", " . $tgl . ucwords(strtolower($blnIndo[$bln])) . $thn; ?></td>
			</tr>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
			<td>:</td>
			<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
		</table>
		<td style="text-align: justify;">
			Untuk selanjutnya diserahkan kepada Perempuan :
		</td>

		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
				<td width="2%">:</td>
				<td width="60%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['perempuan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_tgl_lahir3']; ?></td>
			</tr>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
			<td>:</td>
			<td><?php echo $row['alamat3']; ?></td>
		</table>
		<br>

		<?php
		$tanah_utara = trim($row['tanah_utara']);
		$tanah_selatan = trim($row['tanah_selatan']);
		$tanah_timur = trim($row['tanah_timur']);
		$tanah_barat = trim($row['tanah_barat']);

		$ada_tanah = !empty($tanah_utara) || !empty($tanah_selatan) || !empty($tanah_timur) || !empty($tanah_barat);
		?>

		<?php if (!$ada_tanah): ?>
			<div name="emas" style="text-align: justify; text-justify: inter-word;">
				&nbsp;&nbsp;&nbsp;&nbsp;Sebagai Mas kawin (SUNRANG) berupa 
				<b><?php echo $row['mahar']; ?></b>  
				di <?php echo $row['tempat_mahar']; ?>.
			</div>
		<?php else: ?>
			<div name="tanah" style="text-align: justify; text-justify: inter-word;">
				&nbsp;&nbsp;&nbsp;&nbsp;Sebagai Mas kawin (SUNRANG) berupa 
				<b><?php echo $row['mahar']; ?></b>  
				yang terletak di <?php echo $row['tempat_mahar']; ?>. Sesuai dengan batas-batas sebagai berikut :
			</div>

			<br>

			<style>
			.tabel-batas-4kolom {
				width: 100%;
				border-collapse: collapse;
				font-family: inherit;
			}

			.tabel-batas-4kolom td {
				vertical-align: top;
				padding: 1px 4px;
			}

			.tabel-batas-4kolom .judul {
				background-color: #f1f1f1;
				white-space: nowrap;
			}
			</style>

			<table class="tabel-batas-4kolom">
				<tr>
					<td class="judul">Sebelah Utara</td>
					<td>: <?php echo ucwords(strtolower($tanah_utara)); ?></td>
					<td class="judul">Sebelah Selatan</td>
					<td>: <?php echo ucwords(strtolower($tanah_selatan)); ?></td>
				</tr>
				<tr>
					<td class="judul">Sebelah Timur</td>
					<td>: <?php echo ucwords(strtolower($tanah_timur)); ?></td>
					<td class="judul">Sebelah Barat</td>
					<td>: <?php echo ucwords(strtolower($tanah_barat)); ?></td>
				</tr>
			</table>
		<?php endif; ?>
		<br>
		<table width="100%">
			<td style="text-align: justify; text-justify: inter-word;">
				&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini dibuat dengan sebenarnya. Apabila di kemudian hari mengingkari, maka kami siap dituntut sesuai dengan hukum yang berlaku. Surat ini dibuat untuk dipergunakan sebagaimana mestinya.
			</td>
		</table>

		<table style="width: 100%;">
			<tr>
				<td style="text-align: right;">
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
		</table>

		
			<style>
				.ttd-3kolom {
					width: 100%;
					table-layout: auto;
					text-align: center;
					font-family: inherit;
					font-size: 0.95rem;
					margin: 0; /* Hapus margin bawah */
					border-spacing: 0; /* Tidak ada jarak antar sel */
				}

				.ttd-3kolom td {
					padding: 0 0; /* Rata atas-bawah saja */
					vertical-align: top;
					word-break: keep-all;
					white-space: nowrap;
				}

				.ttd-3kolom .nama-ttd {
					font-weight: bold;
					text-decoration: underline;
					text-transform: uppercase;
				}
			</style>

			<!-- Tabel tanda tangan -->
			<table class="ttd-3kolom">
				<tr>
					<td>YANG MENYERAHKAN</td>
					<td>YANG MEMBERI</td>
					<td>YANG MENERIMA</td>
				</tr>
				<tr>
					<td class="nama-ttd"><br><br><br><br><?php echo strtoupper($row['nama']); ?></td>
					<td class="nama-ttd"><br><br><br><br><?php echo strtoupper($row['orang_tua']); ?></td>
					<td class="nama-ttd"><br><br><br><br><?php echo strtoupper($row['perempuan']); ?></td>
				</tr>
			</table>
			<br>
			
			<style>
				.tabel-saksi {
					width: 100%;
					margin: 0;
					border-spacing: 0;
					text-align: center; /* Semua isi ke tengah */
				}
			</style>

			<?php
				$saksi1 = strtoupper($row['saksi1']);
				$saksi2 = strtoupper($row['saksi2']);
				$judul_saksi = (!empty($saksi1) && !empty($saksi2)) ? 'Saksi – Saksi' : 'Saksi';
				?>

				<!-- Judul Tabel Saksi -->
				<table class="tabel-saksi" style="width: 100%; margin: 0; border-spacing: 0; text-align: center;">
					<tr>
						<td><?php echo $judul_saksi; ?></td>
					</tr>
				</table>

				<style>
					.ttd-2kolom,
					.ttd-1kolom {
						width: 100%;
						text-align: center;
						font-family: inherit;
						font-size: 0.95rem;
						table-layout: fixed;
					}

					.ttd-2kolom td,
					.ttd-1kolom td {
						padding-top: 0;
						padding-bottom: 0;
						vertical-align: top;
					}

					.ttd-2kolom td {
						width: 50%;
					}

					.ttd-1kolom td {
						width: 100%;
					}

					.nama-ttd {
						font-weight: bold;
						text-decoration: underline;
						text-transform: uppercase;
						white-space: nowrap;
						word-break: keep-all;
					}
				</style>

				<?php if (!empty($saksi1) && !empty($saksi2)) { ?>
					<!-- Dua kolom jika dua saksi tersedia -->
					<table class="ttd-2kolom">
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td class="nama-ttd"><br><br><br><?php echo $saksi1; ?></td>
							<td class="nama-ttd"><br><br><br><?php echo $saksi2; ?></td>
						</tr>
					</table>
				<?php } else { ?>
					<!-- Satu kolom di tengah jika hanya satu saksi tersedia -->
					<table class="ttd-1kolom">
						<tr>
							<td></td>
						</tr>
						<tr>
							<td class="nama-ttd"><br><br><br><?php echo !empty($saksi1) ? $saksi1 : $saksi2; ?></td>
						</tr>
					</table>
				<?php } ?>


	</div>
	<br>

	<table width="100%" style="text-transform: capitalize;">
		<td style="text-align: center; vertical-align: middle;">Mengetahui;</td>

	<td>
		<tr>
		<?php
		include_once '../../../surat/cetak/helper/jabatan.php';
		?>
		</tr>
	</td>

	</table>
		<br><br><br>

	
		<table width="100%" style="text-transform: capitalize; border-collapse: collapse;">
		<tr>
			<td style="text-align: center; padding: 0;">
			<div style="display: inline-block;">
			<?php
			$id = $_GET['id'];

			// Ambil semua data pejabat
			$pejabat_data = [];
			$qAllPejabat = mysqli_query($connect, "SELECT id_pejabat_desa, jabatan, nama_pejabat_desa, pangkat, nip FROM pejabat_desa ORDER BY id_pejabat_desa ASC");
			while ($row_pejabat = mysqli_fetch_assoc($qAllPejabat)) {
				$pejabat_data[$row_pejabat['id_pejabat_desa']] = $row_pejabat;
			}

			// Ambil data surat dan penduduk
			$qCek = mysqli_query($connect, "
				SELECT penduduk.*, surat_keterangan_mahar_sunrang.* 
				FROM penduduk 
				LEFT JOIN surat_keterangan_mahar_sunrang 
					ON surat_keterangan_mahar_sunrang.nik = penduduk.nik 
				WHERE surat_keterangan_mahar_sunrang.id_skms = '$id'
			");

			if (mysqli_num_rows($qCek) > 0) {
				$row = mysqli_fetch_array($qCek);
				$id_pejabat_desa = $row['id_pejabat_desa'];

				if (isset($pejabat_data[$id_pejabat_desa])) {
					$nama = htmlspecialchars($pejabat_data[$id_pejabat_desa]['nama_pejabat_desa']);

					if ($id_pejabat_desa == 1) {
						// Hanya nama Kepala Desa
						echo '<span style="font-weight: bold; text-decoration: underline;">' . $nama . '</span>';
					} elseif ($id_pejabat_desa == 2) {
						// Barcode (nama pejabat ID 2 diasumsikan adalah path barcode)
						$barcode_path = '../../../../assets/img/barcode.png'; // ganti path sesuai lokasi barcode
						$nama_kades = htmlspecialchars($pejabat_data[1]['nama_pejabat_desa'] ?? '---');

						echo '<br><img src="' . $barcode_path . '?' . time() . '" alt="Barcode" style="max-width: 80px; margin-top: -74px"><br>';
						echo '<span style="font-weight: bold; text-decoration: underline;">' . $nama_kades . '</span>';
					}
				} else {
					echo "<p>Pejabat dengan ID {$id_pejabat_desa} tidak ditemukan.</p>";
				}
			} else {
				// Jika tidak ada surat, tampilkan pejabat default ID 1
				echo '<span style="font-weight: bold; text-decoration: underline;">' . 
					htmlspecialchars($pejabat_data[1]['nama_pejabat_desa'] ?? '---') . 
				'</span>';
			}
			?>

			<br>
			<?php
			// Tampilkan pangkat dan NIP pejabat ID 1
			if (isset($pejabat_data[1])) {
				$pangkat = trim($pejabat_data[1]['pangkat']);
				$nip = trim($pejabat_data[1]['nip']);

				if (!empty($pangkat)) {
					echo '<span style="text-transform: none;">' . htmlspecialchars($pangkat) . '</span><br>';
				}
				echo '<span style="text-transform: none;">' . htmlspecialchars($nip) . '</span>';
			} else {
				echo "Data pejabat ID 1 tidak ditemukan.";
			}
			?>
			</div>
			</td>
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