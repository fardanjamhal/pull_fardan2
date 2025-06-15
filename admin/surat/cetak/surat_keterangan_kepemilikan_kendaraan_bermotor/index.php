<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
  	include ('../../../../config/koneksi.php');

  	$id = $_GET['id'];
  	$qCek = mysqli_query($connect,"SELECT penduduk.*, surat_keterangan_kepemilikan_kendaraan_bermotor.* FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb='$id'");
  	while($row = mysqli_fetch_array($qCek)){

  		$qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
        foreach($qTampilDesa as $rows){

			$id_pejabat_desa = $row['id_pejabat_desa'];
		  	$qCekPejabatDesa = mysqli_query($connect,"SELECT pejabat_desa.jabatan, pejabat_desa.nama_pejabat_desa FROM pejabat_desa LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.id_pejabat_desa = pejabat_desa.id_pejabat_desa WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.id_pejabat_desa = '$id_pejabat_desa' AND surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb='$id'");
		  	while($rowss = mysqli_fetch_array($qCekPejabatDesa)){
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
		<td style="width: 100px;">
			<?php
				include('../../../../config/koneksi.php');

				$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
				$data = mysqli_fetch_assoc($query);
				?>
			<img src="../../../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 75px; height: auto;">
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
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b><?php echo $row['jenis_surat']; ?></b></h4>
		<h4 style="font-weight:normal; margin:0;">Nomor : <?php echo $row['no_surat']; ?></h4>
		</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
			<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini, <a style="text-transform: capitalize;"><?php echo $rowss['jabatan'] . " " . $rows['nama_desa']; ?>, Kecamatan <?php echo $rows['kecamatan']; ?>, <?php echo $rows['kota']; ?></a>, menerangkan dengan sebenarnya bahwa :
				</td>
			</tr>
		</table>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">N&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;M&nbsp;&nbsp;&nbsp;A</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $row['jenis_kelamin']; ?></td>
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
				<td class="indentasi">Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Agama</td>
				<td>:</td>
				<td><?php echo $row['agama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Pekerjaan</td>
				<td>:</td>
				<td><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">NIK</td>
				<td>:</td>
				<td><?php echo $row['nik']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Kewarganegaraan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td class="indentasi">Bahwa sesuai dengan pengakuan orang tersebut diatas serta bukti-bukti yang ditunjukkan kepada kami, adalah benar yang menguasai kendaraan BERMOTOR roda <?php echo $row['roda']; ?> dengan ciri-ciri sebagai berikut :
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td width="35%" class="indentasi">Merk / Type</td>
				<td width="2%">:</td>
				<td width="63%" style="text-transform: uppercase;"><?php echo $row['merk_type']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Jenis Model</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['jenis_model']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Tahun Pembuatan / CC</td>
				<td>:</td>
				<td><?php echo $row['tahun_pembuatan'] . "/" . $row['cc']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Warna Cat</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['warna_cat']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">No. Rangka</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['no_rangka']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">No. Mesin</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['no_mesin']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">No. POLISI</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['no_polisi']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">No. B P K B</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['no_bpkb']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">Atas Nama Pemilik</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><b><?php echo $row['atas_nama_pemilik']; ?></b></td>
			</tr>
			<tr>
				<td class="indentasi">Alamat</td>
				<td>:</td>
				<td style="text-transform: capitalize;"><?php echo $row['alamat_pemilik']; ?></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td width="31%">Surat ini dipergunakan untuk</td>
				<td width="2%">:</td>
				<td width="73%">Menerangkan kebenaran nama diatas sesuai pengakuannya yang saat ini menguasai kendaraan bermotor dengan ciri-ciri tersebut diatas.</td>
			</tr>
			<tr>
				<td>Guna keperluan</td>
				<td>:</td>
				<td style="text-transform: capitalize;"><b><?php echo $row['keperluan']; ?></b></td>
			</tr>
		</table><br>
		<table width="100%">
			<tr>
				<td class="indentasi">Demikian surat keterangan ini dibuat dengan sebenar-benarnya dan digunakan sebagaimana mestinya.
				</td>
			</tr>
		</table>
	</div>
	<br>
	<table width="100%" style="text-transform: capitalize;">
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
			<td align="center">TTD Bersangkutan</td>
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

			
			<table width="100%" style="text-transform: capitalize; border-collapse: collapse; margin-top: -20px;">
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
					// Termasuk id_pejabat_desa dari tabel surat_keterangan_kepemilikan_kendaraan_bermotor
					$qCek = mysqli_query($connect, "SELECT penduduk.*, surat_keterangan_kepemilikan_kendaraan_bermotor.* FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb='$id'");

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

								echo '<span style="text-transform: uppercase; font-weight: bold; text-decoration: underline;">' . 
								htmlspecialchars($nama_pejabat_terpilih) . 
								'</span>';

							} elseif ($id_pejabat_desa == 2) {
								
								// Panggil nama dan jabatan pejabat dengan ID 1
								if (isset($pejabat_data[1])) {
									// Pastikan ini adalah path gambar yang valid
									$url_gambar = htmlspecialchars($pejabat_data[2]['nama']);
									// Tampilkan gambar dalam tag <img>
									echo '<img src="' . $url_gambar . '?' . time() . '" alt="Barcode Pejabat" style="max-width: 80px;  margin-top: -82px">';
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

					<br>
					<?php
						$id = 1; // Misalnya ID = 1
						$query = "SELECT nip FROM pejabat_desa WHERE id_pejabat_desa = '$id'";
						$result = mysqli_query($connect, $query);

						if ($data = mysqli_fetch_assoc($result)) {
							echo "<b>" . strtoupper($data['nip']) . "</b>";
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