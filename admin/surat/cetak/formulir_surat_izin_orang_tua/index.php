<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, formulir_surat_izin_orang_tua.*, formulir_surat_izin_orang_tua.id_arsip 
		FROM formulir_surat_izin_orang_tua 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = formulir_surat_izin_orang_tua.id_arsip 
		WHERE formulir_surat_izin_orang_tua.id_fsiot = '$id'
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
		<h4 style="font-weight:normal; margin:0; text-align: right;"><b>Model N5</b></h4>
		</div>
	<div class="clear"></div>
	<div id="isi3">
		<!-- Judul diletakkan di luar table -->
		<h4 align="center" style="margin: 0; text-transform: uppercase;"><b>SURAT IZIN ORANG TUA</b></h4>

		<!-- Table pertama -->
		<table width="100%" style="margin-top: 0; border-collapse: collapse;">
		<tr>
			<td style="text-align: justify; padding: 0;">
			Yang bertanda tangan di bawah ini:
			</td>
		</tr>
		</table>

		<!-- Table kedua -->
		<table width="100%" style="margin-top: 0; border-collapse: collapse;">
		<tr>
			<td width="16%" class="indentasi">A. 1. Nama lengkap dan alias</td>
			<td width="2%">:</td>
			<td width="70%" style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['nama1'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Bin</td>
			<td>:</td>
			<td style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['bin1'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Nomor Induk Kependudukan</td>
			<td>:</td>
			<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['nik1'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Tempat dan tanggal lahir</td>
			<td>:</td>
			<td><?php echo strtoupper($row['tempat_tgl_lahir1']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Kewarganegaraan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['kewarganegaraan1']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Agama</td>
			<td>:</td>
			<td><?php echo strtoupper($row['agama1']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. Pekerjaan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['pekerjaan1']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi" style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td><?php echo ucwords(strtolower($row['alamat1'])); ?></td>
		</tr>
		<tr>
			<td width="16%" class="indentasi">B. 1. Nama lengkap dan alias</td>
			<td width="2%">:</td>
			<td width="70%" style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['nama2'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Bin</td>
			<td>:</td>
			<td style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['bin2'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Nomor Induk Kependudukan</td>
			<td>:</td>
			<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['nik2'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Tempat dan tanggal lahir</td>
			<td>:</td>
			<td><?php echo strtoupper($row['tempat_tgl_lahir2']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Kewarganegaraan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['kewarganegaraan2']); ?></td>

		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Agama</td>
			<td>:</td>
			<td><?php echo strtoupper($row['agama2']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. Pekerjaan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['pekerjaan2']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi" style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td><?php echo ucwords(strtolower($row['alamat2'])); ?></td>
		</tr>
		<!-- dst... -->
		</table>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;adalah ayah dan ibu kandung/wali/pengampu dari:</td>
		<!-- Table kedua -->
		<table width="100%" style="margin-top: 0; border-collapse: collapse;">
		<tr>
			<td width="16%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Nama lengkap dan alias</td>
			<td width="2%">:</td>
			<td width="70%" style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['nama3'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Bin</td>
			<td>:</td>
			<td style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['bin3'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Nomor Induk Kependudukan</td>
			<td>:</td>
			<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['nik3'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Tempat dan tanggal lahir</td>
			<td>:</td>
			<td><?php echo strtoupper($row['tempat_tgl_lahir3']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Kewarganegaraan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['kewarganegaraan3']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Agama</td>
			<td>:</td>
			<td><?php echo strtoupper($row['agama3']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. Pekerjaan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['pekerjaan3']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi" style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td><?php echo ucwords(strtolower($row['alamat3'])); ?></td>
		</tr>
		<!-- dst... -->
		</table>
		<td>&nbsp;&nbsp;memberikan izin kepada anak kami untuk melakukan perkawinan dengan</td>
		<!-- Table kedua -->
		<table width="100%" style="text-transform: capitalize; margin-top: 0; border-collapse: collapse;">
		<tr>
			<td width="16%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Nama lengkap dan alias</td>
			<td width="2%">:</td>
			<td width="70%" style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['nama'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Bin</td>
			<td>:</td>
			<td style="text-transform: uppercase; font-weight: bold;"><?php echo ucwords(strtolower($row['bin'])); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Nomor Induk Kependudukan</td>
			<td>:</td>
			<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['nik'])); ?></td>
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
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Tempat dan tanggal lahir</td>
			<td>:</td>
			<td><?php echo strtoupper($row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5. Kewarganegaraan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['kewarganegaraan']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6. Agama</td>
			<td>:</td>
			<td><?php echo strtoupper($row['agama']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. Pekerjaan</td>
			<td>:</td>
			<td><?php echo strtoupper($row['pekerjaan']); ?></td>
		</tr>
		<tr>
			<td width="40%" class="indentasi" style="vertical-align: top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8. Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
		</tr>
		<!-- dst... -->
		</table>
		<table width="100%">
			<tr>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat persetujuan ini di buat untuk digunakan seperlunya.
			</tr>
			
		</table>
	</div>

	
	<table style="width: 80%; margin: 0 auto; text-transform: capitalize; border-collapse: collapse;">
				<tr>
					<!-- Kolom Kiri -->
					<td style="width: 46%; text-align: center; padding-left: 30px; vertical-align: top;">
						<!-- Ganti <br><br> dengan margin -->
						<div style="margin-top: 20px;">
							Ayah/Wali/Pengampu
							<div style="padding-top: 50px;">
								<span style="font-weight: bold; text-transform: uppercase;">
								<br>	<?php echo $row['nama1']; ?>
								</span>
							</div>
						</div>
					</td>

					<!-- Spacer kecil -->
					<td style="width: 4%;"></td>
					<br>
					<!-- Kolom Kanan -->
					<td style="width: 50%; padding-right: 30px; vertical-align: top;">
						<!-- Tanggal di kanan -->
						<div style="text-align: right; margin-bottom: 5px;">
							<?php echo $rows['nama_desa']; ?>,
							<?php
							$tanggalSurat = $row['tanggal_surat'];
							$bulanIndo = [
								'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
								'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
								'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
								'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
							];
							$tanggal = date('d', strtotime($tanggalSurat));
							$bulan = date('F', strtotime($tanggalSurat));
							$tahun = date('Y', strtotime($tanggalSurat));
							echo $tanggal . ' ' . $bulanIndo[$bulan] . ' ' . $tahun;
							?>
						</div>

						<!-- Teks "Ibu/wali/pengampu" dan nama di tengah -->
						<div style="text-align: center;">
							Ibu/wali/pengampu
							<div style="padding-top: 65px;">
								<span style="font-weight: bold; text-transform: uppercase;">
									<?php echo $row['nama2']; ?>
								</span>
							</div>
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