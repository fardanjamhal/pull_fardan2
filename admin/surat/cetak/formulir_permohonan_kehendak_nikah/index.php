<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, formulir_permohonan_kehendak_nikah.*, formulir_permohonan_kehendak_nikah.id_arsip 
		FROM formulir_permohonan_kehendak_nikah 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = formulir_permohonan_kehendak_nikah.id_arsip 
		WHERE formulir_permohonan_kehendak_nikah.id_fpkn = '$id'
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
	<div align="left">
	<h4 style="font-weight:normal; margin:0; font-size: 8px; text-align: left;">
		<b>LAMPIRAN VI <br>KEPDIRJEN BIMAS ISLAM No. 473 TAHUN 2020 <br>
		TENTANG PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN</b>
	</h4>
	</div>
	<br>
		<div align="center">
		<h4 style="margin: 0; text-transform: uppercase;"><b><?php echo $row['jenis_surat']; ?></b></h4>
		<h4 style="font-weight:normal; margin:0; text-align: right;"><b>Model N2</b></h4>
		</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			Perihal&nbsp;&nbsp;&nbsp;&nbsp; : Permohonan Kehendak Nikah
			</td>
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
		</table>
		<br>
		<div>
			Kepada yth, <br>
			Kepala KUA/PPN LN <br>
			di <td><?php echo $row['kepada_yth']; ?></td>

		</div><br>
		<table width="100%" style="text-transform: capitalize;">
			<div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dengan hormat, kami mengajukan permohonan kehendak nikah untuk atas nama:
			</div>
			<tr>
				<td width="16%" class="indentasi">Nama</td>
				<td width="2%">:</td>
				<td width="50%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Calon Suami</td>
				<td>:</td>
				<td><?php echo $row['calon_suami']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Calon Istri</td>
				<td>:</td>
				<td><?php echo $row['calon_istri']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Hari/Tanggal/Jam</td>
				<td>:</td>
				<td><?php echo $row['hari_tanggal']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Tempat akad nikah</td>
				<td>:</td>
				<td><?php echo $row['tempat_akad']; ?></td>
			</tr>
		</table>


		<br>
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
				Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut:
			</td>
		</tr>
		</table>
		<table width="100%">
			<tr>
				<td ></td>
				<td style="vertical-align: top;">1. </td>
				<td width="98%" style="text-align: justify;">
					Surat pengantar nikah dari Desa/Kelurahan
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">2. </td>
				<td width="98%" style="text-align: justify;">
					Persetujuan calon mempelai
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">3. </td>
				<td width="98%" style="text-align: justify;">
					Fotokopi KTP
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">4. </td>
				<td width="98%" style="text-align: justify;">
					Fotokopi akte kelahiran
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">5. </td>
				<td width="98%" style="text-align: justify;">
					Fotokopi kartu keluarga
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">6. </td>
				<td width="98%" style="text-align: justify;">
				Paspoto 2x3 = 3 lembar, 3x4 = 2 lembar, 4x6 = 2 lembar berlatar belakang biru
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">7. </td>
				<td width="98%" style="text-align: justify;">
				Fotokopi Ijazah Terakhir
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">8. </td>
				<td width="98%" style="text-align: justify;">
				<?php echo $row['delapan']; ?>
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">9. </td>
				<td width="98%" style="text-align: justify;">
				<?php echo $row['sembilan']; ?>
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">10. </td>
				<td width="98%" style="text-align: justify;">
				<?php echo $row['sepuluh']; ?>
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">11. </td>
				<td width="98%" style="text-align: justify;">
				<?php echo $row['sebelas']; ?>
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">12. </td>
				<td width="98%" style="text-align: justify;">
				<?php echo $row['dua_belas']; ?>
				</td>
			</tr>
			<tr>
				<td ></td>
				<td style="vertical-align: top;">13. </td>
				<td width="98%" style="text-align: justify;">
				<?php echo $row['tiga_belas']; ?>
				</td>
			</tr>
			
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri dan dicatat sesuai dengan ketentuan peraturan perundang-undangan.
				</td>
			</tr>
		</table>
	</div>
	<br>
	
	<table class="ttd-table" style="width: 100%; text-transform: capitalize;">
	<tr>
		<td class="ttd-left" style="width: 50%; vertical-align: top; padding: 10px;">
		Diterima tanggal …………………. <br>
		Yang menerima, <br>
		Kepala KUA/PPN LN
		<div style="height: 60px;"></div><br>
		<span style="text-transform: uppercase; font-weight: bold;"><?php echo $row['kepala_kua']; ?></span>
		</td>
		<td class="ttd-right" style="width: 50%; text-align: center; vertical-align: top; padding: 10px; padding-left: 40px;">
		<br>Wassalam,<br>
		Pemohon<br><br>
		<div style="height: 60px;"></div>
		<span style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></span>
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