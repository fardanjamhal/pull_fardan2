<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skjb dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_jual_beli.*, surat_keterangan_jual_beli.id_arsip 
		FROM surat_keterangan_jual_beli 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_jual_beli.id_arsip 
		WHERE surat_keterangan_jual_beli.id_skjb = '$id'
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
		<div align="center" style="font-size: 11pt;">
			<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase; font-size: 11pt;">
				<b><?php echo $row['jenis_surat']; ?></b>
			</h4>
			<h4 style="font-weight:normal; margin:0; font-size: 11pt;">
				Nomor : <?php echo $row['no_surat']; ?>
			</h4>
		</div>
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

				<?php
				// Cegah echo di file yang di-include
				ob_start();
				include_once '../../../surat/cetak/helper/jabatan.php';
				ob_end_clean();
				?>
				<?php
				// Format teks untuk kecamatan dan kota
				$kecamatan_formatted = 'Kecamatan ' . ucwords(strtolower($kecamatan));
				$kota_formatted = 'Kabupaten ' . ucwords(strtolower($kota));
				?>

				<td style="text-align: justify; font-size: 10pt;">
					Yang bertanda tangan di bawah ini <?php echo $tampilkan; ?> <?php echo $kecamatan_formatted; ?> <?php echo $kota_formatted; ?>, menerangkan dengan sebenarnya bahwa:
				</td>
		</tr>
		</table>

			<td style="text-align: justify;">
				<i style="font-size: 10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pihak pertama I</i>
			</td>

		<table width="100%" style="text-transform: uppercase; font-size: 10pt; font-style: italic; font-weight: bold;">
			<tr>
				<td width="18%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAMA</td>
				<td width="2%">:</td>
				<td width="80%"><?php echo strtoupper($row['nama']); ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK</td>
				<td>:</td>
				<td><?php echo strtoupper($row['nik']); ?></td>
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
			$ttl = strtoupper($row['tempat_lahir']) . ", " . strtoupper($tgl . $blnIndo[$bln] . $thn);
			?>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TTL</td>
				<td>:</td>
				<td><?php echo $ttl; ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PEKERJAAN</td>
				<td>:</td>
				<td><?php echo strtoupper($row['pekerjaan']); ?></td>
			</tr>
			<tr>
				<td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALAMAT</td>
				<td style="vertical-align: top;">:</td>
				<td style="text-align: justify;">
					<?php
					include_once '../../../surat/cetak/helper/alamat_helper.php';
					echo formatAlamatLengkap($row, $connect); // ✅ benar
					?>
				</td>
			</tr>
		</table>

			<td style="text-align: justify;">
				<i style="font-size: 10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selaku PENJUAL yang disebut sebagai pihak pertama.</i>
			</td>
			<br>
			<td style="text-align: justify;">
				<i style="font-size: 10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pihak  Kedua II</i>
			</td>
			<br>
				<table width="100%" style="text-transform: uppercase; font-size: 10pt; font-style: italic; font-weight: bold;">
			<tr>
				<td width="18%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAMA</td>
				<td width="2%">:</td>
				<td width="80%"><?php echo strtoupper($row['nama2']); ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK</td>
				<td>:</td>
				<td><?php echo strtoupper($row['nik2']); ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TTL</td>
				<td>:</td>
				<td><?php echo strtoupper($row['tempat_tgl_lahir2']); ?></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PEKERJAAN</td>
				<td>:</td>
				<td><?php echo strtoupper($row['pekerjaan2']); ?></td>
			</tr>
			<tr>
				<td style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ALAMAT</td>
				<td style="vertical-align: top;">:</td>
				<td><?php echo strtoupper($row['alamat2']); ?></td>
			</tr>
		</table>
		<td style="text-align: justify;">
				<i style="font-size: 10pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Selaku PEMBELI  yang disebut sebagai pihak kedua.</i>
		</td>
		<br>

		<td>
			<?php
			function terbilang($angka) {
				$angka = (float)$angka;
				$bilangan = [
					"", "satu", "dua", "tiga", "empat", "lima",
					"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
				];

				if ($angka < 12) {
					return " " . $bilangan[$angka];
				} elseif ($angka < 20) {
					return terbilang($angka - 10) . " belas";
				} elseif ($angka < 100) {
					return terbilang(floor($angka / 10)) . " puluh" . terbilang(fmod($angka, 10));
				} elseif ($angka < 200) {
					return " seratus" . terbilang($angka - 100);
				} elseif ($angka < 1000) {
					return terbilang(floor($angka / 100)) . " ratus" . terbilang(fmod($angka, 100));
				} elseif ($angka < 2000) {
					return " seribu" . terbilang($angka - 1000);
				} elseif ($angka < 1000000) {
					return terbilang(floor($angka / 1000)) . " ribu" . terbilang(fmod($angka, 1000));
				} elseif ($angka < 1000000000) {
					return terbilang(floor($angka / 1000000)) . " juta" . terbilang(fmod($angka, 1000000));
				} else {
					return " Angka terlalu besar";
				}
			}

			// Ambil harga dan konversi ke angka murni
			$harga_raw = $row['harga'];
			$harga_angka = (float) str_replace(',', '', $harga_raw);
			$harga_terbilang = ucwords(trim(terbilang($harga_angka)));
			$harga_format = number_format($harga_angka, 0, ',', '.');
			?>

			<p style="font-size: 10pt; text-align: justify; margin: 0;">
				Dalam hal ini Pihak pertama telah menjual <?php echo $row['yang_diperjualbelikan']; ?> yang terletak di <?php echo ucwords(strtolower($row['lokasi'])); ?> kepada pihak kedua sesuai dengan <?php echo $row['informasi_objek']; ?> dengan Harga 
				<b><i>Rp. <?php echo $harga_format; ?> (<?php echo $harga_terbilang; ?> Rupiah)</i></b>, 
				jual beli ini dilaksanakan pada tahun <?php echo $row['tahun_jual_beli']; ?>.
				<?php if (!empty($row['tanah_utara'])): ?>
					<span style="font-size: 10pt; text-align: justify; margin: 0;"> Adapun batas-batas sebagai berikut:</span>
				<?php endif; ?>
			</p>
		</td>

				<?php
					$utara   = trim($row['tanah_utara']);
					$timur   = trim($row['tanah_timur']);
					$selatan = trim($row['tanah_selatan']);
					$barat   = trim($row['tanah_barat']);

					// Cek jika setidaknya ada satu yang terisi
					if (!empty($utara) || !empty($timur) || !empty($selatan) || !empty($barat)) :
					?>

					<style>
						.tabel-batas-tanah {
							font-size: 10pt;
							width: 100%;
							border-collapse: collapse;
							margin-top: 5px;
						}
						.tabel-batas-tanah td {
							padding: 3px 5px;
							vertical-align: top;
						}
						.kolom-1 {
							width: 15%;
							white-space: nowrap;
							font-weight: bold;
						}
						.kolom-2 {
							width: 1%;
						}
						.kolom-3 {
							width: 84%;
							text-transform: uppercase;
						}
					</style>

					<table class="tabel-batas-tanah">
						<tr>
							<td class="kolom-1">Sebelah Utara</td>
							<td class="kolom-2">:</td>
							<td class="kolom-3"><?php echo !empty($utara) ? strtoupper($utara) : '-'; ?></td>
						</tr>
						<tr>
							<td class="kolom-1">Sebelah Timur</td>
							<td class="kolom-2">:</td>
							<td class="kolom-3"><?php echo !empty($timur) ? strtoupper($timur) : '-'; ?></td>
						</tr>
						<tr>
							<td class="kolom-1">Sebelah Selatan</td>
							<td class="kolom-2">:</td>
							<td class="kolom-3"><?php echo !empty($selatan) ? strtoupper($selatan) : '-'; ?></td>
						</tr>
						<tr>
							<td class="kolom-1">Sebelah Barat</td>
							<td class="kolom-2">:</td>
							<td class="kolom-3"><?php echo !empty($barat) ? strtoupper($barat) : '-'; ?></td>
						</tr>
					</table>

					<?php endif; ?>

		<table style="width: 100%; font-size: 10pt;">
		<tr>
			<td style="text-align: justify; text-indent: 25px;">
			<?php echo $row['keterangan']; ?>
			</td>
		</tr>
		</table>
		<table style="width: 100%; font-size: 10pt;">
		<tr>
			<td style="text-align: justify; text-indent: 25px;">
			Demikian surat Perjanjian  jual beli ini dibuat atas kesepakatan kedua pihak untuk dijadikan pegangan masing-masing pihak, Dan dapat dipertanggung jawabkan sebagaimana mestinya.
			</td>
		</tr>

			<tr>
				<td style="text-align: right;">
					<?php
				include '../../cetak/helper/tanda_tangan_pejabat.php';

				$table = basename(__DIR__);
				function buatSingkatanID($nama_tabel) {
				$bagian = explode('_', $nama_tabel);
				$singkatan = '';
				foreach ($bagian as $b) {
					$singkatan .= substr($b, 0, 1);
				}
				return 'id_' . strtolower($singkatan);
				}

				$id_column = buatSingkatanID($table);
				$id = $_GET['id'] ?? '';

				if (!$id || !$table) {
				die("ID atau nama tabel tidak valid.");
				}

				$query = mysqli_query($connect, "SELECT * FROM `$table` WHERE `$id_column` = '$id'");
				$data = mysqli_fetch_assoc($query);
				$no_surat = $data['no_surat'] ?? '';
				echo formatTempatTanggalSurat($connect, $no_surat);
				?>
				</td>
			</tr>
			
			<td style="text-align: center;  font-weight: bold;">
			KEDUA BELAH PIHAK
			</td>
			<table style="width: 100%; font-size: 10pt; text-transform: uppercase; font-weight: bold; text-align: center;">
			<tr>
				<td style="width: 50%;">
				PIHAK PERTAMA
				</td>
				<td style="width: 50%;">
				PIHAK KEDUA
				</td>
			</tr>
			<tr>
				<td style="padding-top: 50px;">
				<?php echo strtoupper($row['nama']); ?>
				</td>
				<td style="padding-top: 50px;">
				<?php echo strtoupper($row['nama2']); ?>
				</td>
			</tr>
			</table>
			<table style="width: 100%;">
			<tr>
				<td style="text-align: center; font-weight: bold; font-size: 10pt;">
				SAKSI-SAKSI
				</td>
			</tr>
			</table>
		</table>


		<?php
		$saksi = [];
		if (!empty($row['saksi1'])) $saksi[] = $row['saksi1'];
		if (!empty($row['saksi2'])) $saksi[] = $row['saksi2'];
		if (!empty($row['saksi3'])) $saksi[] = $row['saksi3'];
		if (!empty($row['saksi4'])) $saksi[] = $row['saksi4'];

		$jumlahSaksi = count($saksi);
		$lebarKolom = $jumlahSaksi > 0 ? floor(100 / $jumlahSaksi) : 25;
		?>

		<table style="width: 100%; font-size: 10pt; text-align: center; font-weight: bold;">
			<tr>
				<?php foreach ($saksi as $i => $nama): ?>
					<td style="width:<?= $lebarKolom ?>%;"></td>
				<?php endforeach; ?>
			</tr>
			<tr>
				<?php foreach ($saksi as $nama): ?>
					<td style="padding-top: 50px;"><?= strtoupper($nama) ?></td>
				<?php endforeach; ?>
			</tr>
		</table>

		<td>
		<div style="text-align: center; font-size: 10pt; font-weight: bold;">
			DIKETAHUI,
		</div>
		</td>

		<table style="width: 100%; font-size: 10pt; font-weight: bold; text-align: center;">
		<tr>
			<td style="width: 50%;">
			<?php echo '<strong>' . strtoupper($tampilkan) . '</strong>'; ?>
			</td>
			<td style="width: 50%;">
			<?php
				$nama_dusun = strtoupper($row['nama_dusun']);
				
				// Hilangkan kata duplikat berurutan (contoh: DUSUN DUSUN menjadi DUSUN)
				$nama_dusun = preg_replace('/(\b\w+\b)(\s+\1\b)/i', '$1', $nama_dusun);

				echo "KEPALA " . $nama_dusun;
			?>
			</td>
		</tr>
		<tr><td colspan="2" style="height: 50px;"></td></tr> <!-- Jarak untuk tanda tangan -->
		<tr>
			<td style="text-decoration: underline;">
			<table width="100%" style="text-transform: capitalize; border-collapse: collapse;">
		<tr>
			<td style="text-align: center; padding: 0; font-size: 10pt;">
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
				SELECT penduduk.*, surat_keterangan_jual_beli.* 
				FROM penduduk 
				LEFT JOIN surat_keterangan_jual_beli 
					ON surat_keterangan_jual_beli.nik = penduduk.nik 
				WHERE surat_keterangan_jual_beli.id_skjb = '$id'
			");

			if (mysqli_num_rows($qCek) > 0) {
				$row = mysqli_fetch_array($qCek);
				$id_pejabat_desa = $row['id_pejabat_desa'];

				if (isset($pejabat_data[$id_pejabat_desa])) {
					$nama = htmlspecialchars($pejabat_data[$id_pejabat_desa]['nama_pejabat_desa']);

					if ($id_pejabat_desa == 1) {
						// Hanya nama Kepala Desa
						echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none; display: inline-block;">' . $nama . '</span>';
					} elseif ($id_pejabat_desa == 2) {
						// Barcode (nama pejabat ID 2 diasumsikan adalah path barcode)
						$barcode_path = '../../../../assets/img/barcode.png'; // ganti path sesuai lokasi barcode
						$nama_kades = htmlspecialchars($pejabat_data[1]['nama_pejabat_desa'] ?? '---');

						echo '<br><img src="' . $barcode_path . '?' . time() . '" alt="Barcode" style="max-width: 80px; margin-top: -74px"><br>';
						echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none; display: inline-block;">' . $nama_kades . '</span>';
					}
				} else {
					echo "<p>Pejabat dengan ID {$id_pejabat_desa} tidak ditemukan.</p>";
				}
			} else {
				// Jika tidak ada surat, tampilkan pejabat default ID 1
				echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none; display: inline-block;">' . 
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
			</td>
			<td style="text-decoration: underline; text-decoration-skip-ink: none; display: inline-block;">
				<br>
			<?php echo strtoupper($row['kepala_dusun']); ?>
			</td>
		</tr>
		</table>


	</div>

	<td>
	<tr>
		<?php
		include_once '../../../surat/cetak/helper/jabatan.php';
		?>
		</tr>
	</td>

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