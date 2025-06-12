<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, formulir_permohonan_kehendak_nikah.* FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.id_fpkn='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE formulir_permohonan_kehendak_nikah.id_pejabat_desa = '$id_pejabat_desa' AND formulir_permohonan_kehendak_nikah.id_fpkn='$id'");
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
		<b>KEPDIRJEN BIMAS ISLAM No. 473 TAHUN 2020 <br>
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
				<b>Dengan ini menerangkan bahwa:</b>
			</td>
		</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td width="3%"></td>
				<td width="3%" style="vertical-align: top;">-</td>
				<td width="94%" style="text-align: justify;">
					Orang yang namanya tersebut di atas adalah benar warga Desa kami dan berdomisili sesuai alamat yang telah dicantumkan.
				</td>
			</tr>
			<tr>
				<td></td>
				<td style="vertical-align: top;">-</td>
				<td style="text-align: justify;">
					Yang bersangkutan juga benar memiliki kegiatan usaha yang berlokasi di 
					<span><?php echo ucwords(strtolower(htmlspecialchars($row['alamat_usaha']))); ?></span>.
				</td>
			</tr>
			<tr>
				<td></td>
				<td style="vertical-align: top;">-</td>
				<td style="text-align: justify;">
					Adapun jenis usaha yang dijalankan adalah <span style="text-transform: capitalize;"><?php echo htmlspecialchars($row['usaha']); ?></span>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr></tr>
			<tr></tr>
			<tr></tr>
			<tr>
				<td width="3%"></td>
				<td width="3%">-</td>
				<td>Surat Keterangan ini dipergunakan untuk <span style="text-transform: capitalize;"><?php echo htmlspecialchars($row['keperluan']); ?></span></td> 
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat keterangan ini dibuat dengan sebenar-benarnya dan digunakan sebagaimana mestinya.
				</td>
			</tr>
		</table>
	</div>
	<br>
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
			<td align="center">TTD. bersangkutan</td>
			<td></td>
			<td align="center"><?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?></td>
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
			<td align="center" style="text-transform: uppercase"><b><u><?php echo $row['nama']; ?></u></b></td>
			<td></td>
			
			<table width="100%" style="text-transform: capitalize; border-collapse: collapse; margin-top: -40px;">
			<tr>
			<td style="vertical-align: top; padding-top: 20px; text-align: center; padding-left: 325px; ">
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
					// Termasuk id_pejabat_desa dari tabel formulir_permohonan_kehendak_nikah
					$qCek = mysqli_query($connect, "SELECT penduduk.*, formulir_permohonan_kehendak_nikah.* FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.id_fpkn='$id'");

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

								echo '<span style="text-transform: uppercase; font-weight: bold; text-decoration: underline; ">' . 
								htmlspecialchars($nama_pejabat_terpilih) . 
								'</span>';

							} elseif ($id_pejabat_desa == 2) {
								
								// Panggil nama dan jabatan pejabat dengan ID 1
								if (isset($pejabat_data[1])) {
									// Pastikan ini adalah path gambar yang valid
									$url_gambar = htmlspecialchars($pejabat_data[2]['nama']);
									// Tampilkan gambar dalam tag <img>
									echo '<img src="' . $url_gambar . '" alt="Barcode Pejabat" style="max-width: 80px;  margin-top: -82px">';
									echo "<br>";
								} else {
									echo "Detail Pejabat ID 1 tidak ditemukan dalam data pre-fetched.<br>";
								}
								// Panggil nama dan jabatan pejabat dengan ID 2
								if (isset($pejabat_data[2])) {
									echo '<span style="text-transform: uppercase; font-weight: bold; text-decoration: underline;">' . 
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
						echo "<p>Data Surat Keterangan Domisili dengan ID **{$id}** tidak ditemukan.</p>";
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