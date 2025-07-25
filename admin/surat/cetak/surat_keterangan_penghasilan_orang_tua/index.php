<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_penghasilan_orang_tua.*, surat_keterangan_penghasilan_orang_tua.id_arsip 
		FROM surat_keterangan_penghasilan_orang_tua 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_penghasilan_orang_tua.id_arsip 
		WHERE surat_keterangan_penghasilan_orang_tua.id_skpot = '$id'
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
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini, 
				<span style="text-transform: capitalize;"><?php echo $kalimat; ?></span>, Kecamatan 
				<span style="text-transform: capitalize;"><?php echo ucwords($kecamatan); ?></span>, Kabupaten 
				<span style="text-transform: capitalize;"><?php echo ucwords($kota); ?></span>, menerangkan dengan sebenarnya bahwa :
			</td>
		</tr>
		</table>

		<table>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; height: 22.4px; vertical-align: top;"></td>
				<td style="width: 3.90545%; height: 22.4px; text-align: left; vertical-align: top;">1.</td>
				<td style="width: 30.5242%; text-align: left; height: 22.4px; vertical-align: top;">Nama Lengkap</td>
				<td style="width: 1.2333%; text-align: center; height: 22.4px; vertical-align: top;">:</td>
				<td style="width: 60.0206%; height: 22.4px; text-align: justify; vertical-align: top;"><strong><?php echo strtoupper($row['nama']); ?></strong></td>
				</tr>
				<tr style="height: 22.4px;">
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
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">2.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Tempat / Tanggal Lahir</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo ucwords(strtolower($row['tempat_lahir'])) . ", " . $tgl . ucwords(strtolower($blnIndo[$bln])) . $thn; ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">3.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">NIK</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo strtoupper($row['nik']); ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; height: 22.4px; vertical-align: top;"> </td>
				<td style="width: 3.90545%; height: 22.4px; text-align: left; vertical-align: top;">4.</td>
				<td style="width: 30.5242%; text-align: left; height: 22.4px; vertical-align: top;">Jenis Kelamin</td>
				<td style="width: 1.2333%; text-align: center; height: 22.4px; vertical-align: top;">:</td>
				<td style="width: 60.0206%; height: 22.4px; text-align: justify; vertical-align: top;"><?php echo strtoupper($row['jenis_kelamin']); ?></td>
				</tr>
				<tr style="height: 44.8px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 44.8px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 44.8px;">5.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 44.8px;">Nomor Induk Siswa/Mahasiswa</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 44.8px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 44.8px;"><?php echo strtoupper($row['nomor_induk_siswa']); ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">6.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Jurusan/Fakultas/Prodi</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo strtoupper($row['jurusan_fakultas']); ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">7.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Sekolah/Perguruan Tinggi</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo strtoupper($row['sekolah_perguruan_tinggi']); ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">8.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Kelas/Semester</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo strtoupper($row['kelas_semester']); ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">9.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Agama</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo strtoupper($row['agama']); ?></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">10.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Pekerjaan</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;"><?php echo strtoupper($row['pekerjaan']); ?></td></td>
				</tr>
				<tr style="height: 22.4px;">
				<td style="width: 4.31655%; text-align: center; vertical-align: top; height: 22.4px;"> </td>
				<td style="width: 3.90545%; text-align: left; vertical-align: top; height: 22.4px;">11.</td>
				<td style="width: 30.5242%; text-align: left; vertical-align: top; height: 22.4px;">Alamat</td>
				<td style="width: 1.2333%; text-align: center; vertical-align: top; height: 22.4px;">:</td>
				<td style="width: 60.0206%; text-align: justify; vertical-align: top; height: 22.4px;">
					<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
				</td></td>
				</tr>
				</tbody>
				</table>

				<td style="text-align: justify; text-indent: 30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adalah benar penduduk yang berdomisili di <?php
				$alamat = $row['jalan'] . " rt " . $row['rt'] . " / rw " . $row['rw'] . " dusun " . $row['dusun'] . " desa " . $row['desa'] . " kecamatan " . $row['kecamatan'] . " " . $row['kota'];
				$alamat = ucwords(strtolower($alamat));
				$alamat = str_replace(['Rt', 'Rw'], ['RT', 'RW'], $alamat);
				echo $alamat; ?> dan merupakan <strong>Anak </strong>dari:</td>
				
				<table style="border-collapse: collapse; width: 100%; height: 310px;" border="0" cellspacing="0" cellpadding="0">
				<tbody>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; height: 18px; text-align: left; vertical-align: top;">1.</td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Nama Ayah</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; height: 18px; text-align: justify; vertical-align: top;"><strong><?php echo strtoupper($row['nama_ayah']); ?></strong></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; height: 18px; text-align: left; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Tempat / Tanggal Lahir</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; height: 18px; text-align: justify; vertical-align: top;"><?php echo strtoupper($row['tgl_lahir2']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; height: 18px; text-align: left; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">NIK</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; height: 18px; text-align: justify; vertical-align: top;"><?php echo strtoupper($row['nik2']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Jenis Kelamin</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo strtoupper($row['jenis_kelamin2']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Agama</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo strtoupper($row['agama2']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"></td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"></td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Pekerjaan</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo strtoupper($row['pekerjaan2']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"></td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"></td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Alamat</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo ucwords(strtolower($row['alamat2'])); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"></td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"></td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Penghasilan</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<?php
					// Fungsi konversi angka ke huruf (terbilang)
					function terbilang($angka) {
						$angka = (float)$angka;
						$bilangan = [
							"", "satu", "dua", "tiga", "empat", "lima",
							"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
						];

						if ($angka < 12) {
							return $bilangan[$angka];
						} elseif ($angka < 20) {
							return terbilang($angka - 10) . " belas";
						} elseif ($angka < 100) {
							return terbilang(floor($angka / 10)) . " puluh " . terbilang($angka % 10);
						} elseif ($angka < 200) {
							return "seratus " . terbilang($angka - 100);
						} elseif ($angka < 1000) {
							return terbilang(floor($angka / 100)) . " ratus " . terbilang($angka % 100);
						} elseif ($angka < 2000) {
							return "seribu " . terbilang($angka - 1000);
						} elseif ($angka < 1000000) {
							return terbilang(floor($angka / 1000)) . " ribu " . terbilang($angka % 1000);
						} elseif ($angka < 1000000000) {
							return terbilang(floor($angka / 1000000)) . " juta " . terbilang($angka % 1000000);
						} else {
							return "Angka terlalu besar";
						}
					}

					// Ambil nilai penghasilan ayah dari database
					$penghasilan_raw = $row['penghasilan_ayah'] ?? '0';

					// Bersihkan dari format ribuan (titik, koma, spasi)
					$penghasilan_bersih = preg_replace('/[^\d]/', '', $penghasilan_raw);

					// Konversi ke integer
					$penghasilan_int = (int)$penghasilan_bersih;
					?>

					<!-- Output di tabel -->
					<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;">
						<?php echo number_format($penghasilan_int, 0, ',', '.'); ?><br>
						<em>(<?php echo ucwords(terbilang($penghasilan_int)); ?> Rupiah)</em>
					</td>

				<tr style="height: 22px;">
				<td style="width: 4.33944%; text-align: center; height: 22px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; height: 18px; text-align: left; vertical-align: top;">2.</td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Nama Ibu</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; height: 18px; text-align: justify; vertical-align: top;"><strong><?php echo strtoupper($row['nama_ibu']); ?></strong></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; height: 18px; text-align: left; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Tempat / Tanggal Lahir</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; height: 18px; text-align: justify; vertical-align: top;"><?php echo strtoupper($row['tgl_lahir3']); ?></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; height: 18px; text-align: left; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">NIK</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; height: 18px; text-align: justify; vertical-align: top;"><?php echo strtoupper($row['nik3']); ?></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Jenis Kelamin</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo strtoupper($row['jenis_kelamin3']); ?></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"> </td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Agama</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;"> </td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo strtoupper($row['agama3']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"></td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"></td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Pekerjaan</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo strtoupper($row['pekerjaan3']); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"></td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"></td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Alamat</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;"><?php echo ucwords(strtolower($row['alamat3'])); ?></td></td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 4.33944%; text-align: center; height: 18px; vertical-align: top;"></td>
				<td style="width: 3.9055%; text-align: left; height: 18px; vertical-align: top;"></td>
				<td style="width: 31.0993%; text-align: left; height: 18px; vertical-align: top;">Penghasilan</td>
				<td style="width: 1.44509%; text-align: center; height: 18px; vertical-align: top;">:</td>
				<?php
					// Fungsi konversi angka ke huruf (terbilang)
					function terbilang2($angka) {
						$angka = (float)$angka;
						$bilangan = [
							"", "satu", "dua", "tiga", "empat", "lima",
							"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
						];

						if ($angka < 12) {
							return $bilangan[$angka];
						} elseif ($angka < 20) {
							return terbilang2($angka - 10) . " belas";
						} elseif ($angka < 100) {
							return terbilang2(floor($angka / 10)) . " puluh " . terbilang2($angka % 10);
						} elseif ($angka < 200) {
							return "seratus " . terbilang2($angka - 100);
						} elseif ($angka < 1000) {
							return terbilang2(floor($angka / 100)) . " ratus " . terbilang2($angka % 100);
						} elseif ($angka < 2000) {
							return "seribu " . terbilang2($angka - 1000);
						} elseif ($angka < 1000000) {
							return terbilang2(floor($angka / 1000)) . " ribu " . terbilang2($angka % 1000);
						} elseif ($angka < 1000000000) {
							return terbilang2(floor($angka / 1000000)) . " juta " . terbilang2($angka % 1000000);
						} else {
							return "Angka terlalu besar";
						}
					}

					// Ambil nilai penghasilan ayah dari database
					$penghasilan_raw = $row['penghasilan_ibu'] ?? '0';

					// Bersihkan dari format ribuan (titik, koma, spasi)
					$penghasilan_bersih = preg_replace('/[^\d]/', '', $penghasilan_raw);

					// Konversi ke integer
					$penghasilan_int = (int)$penghasilan_bersih;
					?>

					<!-- Output di tabel -->
					<td style="width: 59.1624%; text-align: justify; height: 18px; vertical-align: top;">
						<?php echo number_format($penghasilan_int, 0, ',', '.'); ?><br>
						<em>(<?php echo ucwords(terbilang2($penghasilan_int)); ?> Rupiah)</em>
					</td>
				</tr>
				</tbody>
				</table>
					
				<?php
				function terbilang_orang_tua($angka) {
					$angka = (float)$angka;
					$bilangan = ["", "satu", "dua", "tiga", "empat", "lima", "enam",
								"tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];

					if ($angka < 12) {
						return $bilangan[$angka];
					} elseif ($angka < 20) {
						return terbilang_orang_tua($angka - 10) . " belas";
					} elseif ($angka < 100) {
						return terbilang_orang_tua(floor($angka / 10)) . " puluh " . terbilang_orang_tua($angka % 10);
					} elseif ($angka < 200) {
						return "seratus " . terbilang_orang_tua($angka - 100);
					} elseif ($angka < 1000) {
						return terbilang_orang_tua(floor($angka / 100)) . " ratus " . terbilang_orang_tua($angka % 100);
					} elseif ($angka < 2000) {
						return "seribu " . terbilang_orang_tua($angka - 1000);
					} elseif ($angka < 1000000) {
						return terbilang_orang_tua(floor($angka / 1000)) . " ribu " . terbilang_orang_tua($angka % 1000);
					} elseif ($angka < 1000000000) {
						return terbilang_orang_tua(floor($angka / 1000000)) . " juta " . terbilang_orang_tua($angka % 1000000);
					} else {
						return "Angka terlalu besar";
					}
				}

				$penghasilan_ayah = isset($row['penghasilan_ayah']) ? preg_replace('/[^\d]/', '', $row['penghasilan_ayah']) : 0;
				$penghasilan_ibu  = isset($row['penghasilan_ibu']) ? preg_replace('/[^\d]/', '', $row['penghasilan_ibu']) : 0;

				$total_penghasilan = (int)$penghasilan_ayah + (int)$penghasilan_ibu;
				?>

				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan penghasilan rata-rata <strong>Orang Tua Rp. <?php echo number_format($total_penghasilan, 0, ',', '.'); ?> <em>(<?php echo ucwords(terbilang_orang_tua($total_penghasilan)); ?> Rupiah)</em></strong> setiap bulannya.
				<br>
				Demikian Surat Keterangan Penghasilan Orangtua ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.

			<?php
		// Fungsi untuk kapitalisasi setiap kata
		function capitalizeEachWord($string) {
			$string = strtolower($string); // ubah semua jadi lowercase dulu
			return ucwords($string);       // kapitalisasi huruf awal setiap kata
		}
		?>
	</div>

	<table width="100%" style="text-transform: capitalize; border-collapse: collapse;">
  	<tr>
    <td style="width: 50%;"></td>
    <td style="vertical-align: top; padding-top: 20px; text-align: center;">
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
		echo formatTempatTanggalSurat($connect, $no_surat) . '<br>';
        ?>
      <?php include_once '../../../surat/cetak/helper/jabatan_tampilkan.php'; ?>
    </td>
  </tr>
</table>

<table width="100%" style="text-transform: capitalize; border-collapse: collapse; margin-top: 62px;">
  <tr>
    <td style="vertical-align: top; padding-top: 20px; text-align: center; padding-left: 325px;">
      <div>
        <?php
        $id = $_GET['id'];

        $nama_pejabat_terpilih = '';
        $jabatan_pejabat_terpilih = '';

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
          echo "<p>Error saat mengambil data pejabat desa: " . mysqli_error($connect) . "</p>";
        }

        $folder = basename(dirname(__FILE__));
        $tabel_surat = $folder;
        $kata = explode('_', $folder);
        $singkatan = '';
        foreach ($kata as $k) {
          $singkatan .= substr($k, 0, 1);
        }
        $kolom_id = 'id_' . $singkatan;

        $id = $_GET['id'] ?? '';
        $qCek = mysqli_query($connect, "
          SELECT penduduk.*, $tabel_surat.*
          FROM penduduk
          LEFT JOIN $tabel_surat ON $tabel_surat.nik = penduduk.nik
          WHERE $tabel_surat.$kolom_id = '$id'
        ");

        if (mysqli_num_rows($qCek) > 0) {
          $row = mysqli_fetch_array($qCek);
          $id_pejabat_desa = $row['id_pejabat_desa'];

          $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
          $rows_desa = mysqli_fetch_array($qTampilDesa);

          if (isset($pejabat_data[$id_pejabat_desa])) {
            $current_pejabat = $pejabat_data[$id_pejabat_desa];
            $nama_pejabat_terpilih = $current_pejabat['nama'];
            $jabatan_pejabat_terpilih = $current_pejabat['jabatan'];

            if ($id_pejabat_desa == 1) {
              echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . 
                htmlspecialchars($nama_pejabat_terpilih) . 
              '</span>';
            } elseif ($id_pejabat_desa == 2) {
              if (isset($pejabat_data[1])) {
                $url_gambar = htmlspecialchars($pejabat_data[2]['nama']);
                echo '<img src="' . $url_gambar . '?' . time() . '" alt="Barcode Pejabat" style="max-width: 80px;  margin-top: -82px">';
                echo "<br>";
              } else {
                echo "Detail Pejabat ID 1 tidak ditemukan dalam data pre-fetched.<br>";
              }

              if (isset($pejabat_data[2])) {
                echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . 
                  htmlspecialchars($pejabat_data[1]['nama']) . 
                '</span>';
              } else {
                echo "Detail Pejabat ID 2 tidak ditemukan dalam data pre-fetched.<br>";
              }
            } else {
              // ID lainnya jika dibutuhkan
            }

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
        $id = 1;
        $query = "SELECT pangkat, nip FROM pejabat_desa WHERE id_pejabat_desa = '$id'";
        $result = mysqli_query($connect, $query);

        if ($data = mysqli_fetch_assoc($result)) {
          $pangkat = trim($data['pangkat']);
          $nip = trim($data['nip']);

          if (!empty($pangkat)) {
            echo '<span style="text-transform: none;">' . htmlspecialchars($pangkat) . '</span><br>';
          }

          echo '<span style="text-transform: none;">' . htmlspecialchars($nip) . '</span><br>';
        } else {
          echo "Data tidak ditemukan.";
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