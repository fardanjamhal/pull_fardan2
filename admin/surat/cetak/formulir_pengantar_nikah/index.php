<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, formulir_pengantar_nikah.* FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.id_fpn='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE formulir_pengantar_nikah.id_pejabat_desa = '$id_pejabat_desa' AND formulir_pengantar_nikah.id_fpn='$id'");
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
	<table width="100%" style="text-align: center; margin: 0 auto;">
	<div align="left">
	<h4 style="font-weight:normal; margin:0; font-size: 8px; text-align: left;">
		<b>LAMPIRAN V <br>
			KEPDIRJEN BIMAS ISLAM No. 473  TAHUN 2020 <br>
			TENTANG PETUNJUK TEKNIS PELAKSANAAN PENCATATAN PERNIKAHAN
		</b>
	</h4>
	</div>
	<div align="center">
	<h4 style="font-weight:normal; margin:0; text-align: center;">
		<br>
		<b>FORMULIR PENGANTAR NIKAH
		</b>
	</h4>
	<h4 style="font-weight:normal; margin:0; text-align: right;">
	
		<b>Model N1
		</b>
	</h4>
	</div>
	<tr>
		<td style="width: 100px;">
			<img src="../../../../assets/img/Logo-Pangandaran-90x90.png" alt="Logo" style="width: 75px; height: 75px;">
		</td>
		<td>
			<div class="header" style="text-align: center;">
				<h4 class="kop" style="margin: 0; text-transform: uppercase;">PEMERINTAH <?php echo $rows['kota']; ?></h4>
				<h4 class="kop" style="margin: 0; text-transform: uppercase;">KECAMATAN <?php echo $rows['kecamatan']; ?></h4>
				<h4 class="kop" style="margin: 0; text-transform: uppercase;">DESA <?php echo $rows['nama_desa']; ?></h4>
				<h5 class="kop2" style="margin: 0; text-transform: capitalize;"><?php echo $rows['alamat']; ?> Telp. <?php echo $rows['no_telpon']; ?> Kode Pos <?php echo $rows['kode_pos']; ?></h5>
			</div>
		</td>
	</tr>
	</table>
	<hr style="border: 1px solid #000; width: 100%;">
	<br>
		<div align="center">
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b>PENGANTAR NIKAH</b></h4>
		<h4 style="font-weight:normal; margin:0;">Nomor : <?php echo $row['no_surat']; ?></h4>
		</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa:
			</td>
		</tr>
		</table>
		<table width="100%">
			<tr>
				<td width="46%" class="indentasi">1. Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">2. Nomor Induk Kependudukan (NIK)</td>
				<td>:</td>
				<td><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['jenis_kelamin'])); ?></td>
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
				<td class="indentasi">4. Tempat dan tanggal lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tempat_lahir'])) . ", " . $tgl . ucwords(strtolower($blnIndo[$bln])) . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Kewarganegaraan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Agama</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['agama'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['pekerjaan'])); ?></td>
			</tr>
			<td class="indentasi">8. Alamat</td>
			<td>:</td>
			<td style="text-align: justify;">
				<?php
				$alamat = $row['jalan'] . " rt " . $row['rt'] . " / rw " . $row['rw'] . ", dusun " . $row['dusun'] . " desa " . $row['desa'] . " kecamatan " . $row['kecamatan'] . " " . $row['kota'];
				$alamat = ucwords(strtolower($alamat));
				$alamat = str_replace(['Rt', 'Rw'], ['RT', 'RW'], $alamat);
				echo $alamat;
				?>
			</td>
			<tr>
				<td class="indentasi">9. Status pernikahan</td>
				<td>:</td>
				<td> </td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;a. Laki-laki : Jejaka, Duda, atau beristri ke …</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['status_nikah1'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;b. Perempuan : Perawan, Janda</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['status_nikah2'])); ?></td>
			</tr>
		</table>
		<td class="indentasi">Adalah benar anak dari pernikahan seorang pria:</td>

		<table width="100%">
				<tr>
				<td width="46%" class="indentasi">Nama Lengkap dan alias</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['nama_ayah'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Nomor Induk Kependudukan (NIK)</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight:"><?php echo $row['nik_ayah']; ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Tempat dan tanggal lahir</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['tempat_tgl_lahir_ayah'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Kewarganegaraan</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['kewarganegaraan_ayah'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Agama</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['agama_ayah'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Pekerjaan</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['pekerjaan_ayah'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Alamat</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['alamat_ayah'])); ?></td>
				</tr>
		</table>
		
		<td class="indentasi">dengan seorang wanita:</td>
		<table width="100%">
				<tr>
				<td width="46%" class="indentasi">Nama Lengkap dan alias</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['nama_ibu'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Nomor Induk Kependudukan (NIK)</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight:"><?php echo $row['nik_ibu']; ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Tempat dan tanggal lahir</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['tempat_tgl_lahir_ibu'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Kewarganegaraan</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['kewarganegaraan_ibu'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Agama</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['agama_ibu'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Pekerjaan</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['pekerjaan_ibu'])); ?></td>
				</tr>
				<tr>
				<td width="46%" class="indentasi">Alamat</td>
				<td width="2%">:</td>
				<td><?php echo ucwords(strtolower($row['alamat_ibu'])); ?></td>
				</tr>
		</table>

		<table width="100%">
		<tr>
			<td style="text-align: justify;">
				Demikian, surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.
			</td>
		</tr>
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
			<td align="center"></td>
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
			<td></td>
			<td></td>


			<table width="100%" style="text-transform: capitalize; border-collapse: collapse; margin-top: -20px;">
			<tr>
			<td style="vertical-align: top; padding-top: 20px; text-align: center; padding-left: 325px;">
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
					// Termasuk id_pejabat_desa dari tabel formulir_pengantar_nikah
					$qCek = mysqli_query($connect, "SELECT penduduk.*, formulir_pengantar_nikah.* FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.id_fpn='$id'");

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
									echo '<img src="' . $url_gambar . '" alt="Barcode Pejabat" style="max-width: 60px;  margin-top: -75px">';
									echo "<br>";
								} else {
									echo "Detail Pejabat ID 1 tidak ditemukan dalam data pre-fetched.<br>";
								}
								// Panggil nama dan jabatan pejabat dengan ID 2
								if (isset($pejabat_data[2])) {
									echo '<span style="text-transform: uppercase; font-weight: bold;">' . 
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