<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, formulir_persetujuan_calon_pengantin_istri.* FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin_istri.id_fpcp2='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE formulir_persetujuan_calon_pengantin_istri.id_pejabat_desa = '$id_pejabat_desa' AND formulir_persetujuan_calon_pengantin_istri.id_fpcp2='$id'");
		  	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
?>

<html>
<head>
	<link rel="shortcut icon" href="../../../../assets/img/mini-logo.png">
	<title>CETAK SURAT</title>
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
		<h4 style="margin: 0; text-transform: uppercase;"><b>Formulir Persetujuan Calon Pengantin</b></h4>
		<h4 style="font-weight:normal; margin:0; text-align: right;"><b>Model N4</b></h4>
		</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<h4 align="center" style="margin: 0; text-transform: uppercase;"><b><u>SURAT PERSETUJUAN MEMPELAI</u></b></h4><br>
		<td style="text-align: justify;">
			Yang bertanda tangan di bawah ini:
			</td>
		</table>
		<br>

		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="16%" class="indentasi">A. Calon Suami:</td>
				<td width="2%"></td>
				<td width="70%" style="text-transform: uppercase; font-weight: bold;"></td>
			</tr>
			<br>
			<tr>
				<td width="40%" class="indentasi">&nbsp;&nbsp;1. Nama lengkap dan alias</td>
				<td>:</td>
				<td><?php echo strtoupper($row['nama']); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;2. Bin</td>
				<td>:</td>
				<td><?php echo strtoupper($row['bin']); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;3. Nomor Induk Kependudukan</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['nik'])); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;4. Tempat dan tanggal lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tgl_lahir'])); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo strtoupper($row['kewarganegaraan']); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;6. Agama</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['agama'])); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['pekerjaan'])); ?></td>
			</tr>
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;8. Alamat</td>
				<td>:</td>
				<td style="text-align: justify;">
				<?php
				$alamat = $row['jalan'] . " rt " . $row['rt'] . " / rw " . $row['rw'] . ", dusun " . $row['dusun'] ;
				$alamat = ucwords(strtolower($alamat));
				$alamat = str_replace(['Rt', 'Rw'], ['RT', 'RW'], $alamat);
				echo $alamat;
				?>
			</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="16%" class="indentasi">B. Calon Istri:</td>
				<td width="2%"></td>
				<td width="70%" style="text-transform: uppercase; font-weight: bold;"></td>
			</tr>
			
			<tr>
				<td width="40%" class="indentasi">&nbsp;&nbsp;1. Nama lengkap dan alias</td>
				<td>:</td>
				<td><?php echo strtoupper($row['nama_suami']); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;2. Bin</td>
				<td>:</td>
				<td><?php echo strtoupper($row['bin_suami']); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;3. Nomor Induk Kependudukan</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['nik_suami'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;4. Tempat dan tanggal lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tgl_lahir_suami'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;5. Kewarganegaraan</td>
				<td>:</td>
				<td><?php echo strtoupper($row['kewarganegaraan_suami']); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;6. Agama</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['agama_suami'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['pekerjaan_suami'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;8. Alamat</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['alamat_suami'])); ?></td>
			</tr>
		</table>


		<br>
		
		<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri, tanpa ada paksaan dari siapapun juga, setuju untuk melangsungkan pernikahan.
				</td>

		<table width="100%">
			<tr>
			<br>
			<br>
			Demikian surat persetujuan ini di buat untuk digunakan seperlunya.
			</tr>
			
		</table>
	</div>

	
	
<table style="width: 75%; margin: 50px auto 0; text-transform: capitalize; font-size: 14px; border-collapse: collapse;">
  <tr>
    <!-- Kolom Kiri -->
    <td style="width: 50%; padding-left: 30px; vertical-align: top;">
      <br><br>Calon Suami<br><br><br><br><br> <!-- Jarak untuk tanda tangan -->
      <u style="font-weight: bold; text-transform: uppercase;">
        <?php echo $row['nama']; ?>
      </u>
    </td>

    <!-- Kolom Kanan -->
    <td style="width: 50%; padding-right: 30px;  text-align: right; vertical-align: top;">
      <div style="margin-bottom: 10px;">
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
      </div>
      Calon Istri<br><br><br><br><br> <!-- Jarak untuk tanda tangan -->
      <u style="font-weight: bold; text-transform: uppercase;">
        <?php echo $row['nama_suami']; ?>
      </u>
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