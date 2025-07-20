<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_kepemilikan_kendaraan_bermotor.*, surat_keterangan_kepemilikan_kendaraan_bermotor.id_arsip 
		FROM surat_keterangan_kepemilikan_kendaraan_bermotor 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_kepemilikan_kendaraan_bermotor.id_arsip 
		WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb = '$id'
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

	<style>
		td {
			vertical-align: top;
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
				<td>
					<?php
					include_once '../../../surat/cetak/helper/alamat_helper.php';

					// Pastikan $row sudah berisi data dari database sebelumnya
					echo formatAlamatLengkap($row, $connect); // ✅ benar
					?>
				</td>
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
				<td width="30%" class="indentasi">Merk / Type</td>
				<td width="2%">:</td>
				<td width="70%" style="text-transform: uppercase;"><?php echo $row['merk_type']; ?></td>
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
				<td width="30%">Surat ini dipergunakan untuk</td>
				<td width="2%">:</td>
				<td>Menerangkan kebenaran nama diatas sesuai pengakuannya yang saat ini menguasai kendaraan bermotor dengan ciri-ciri tersebut diatas.</td>
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
			</td>
		</tr>
		<tr>
			<td></td>
			<td align="center">TTD Bersangkutan</td>
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
			<td align="center" style="text-transform: uppercase"><b><u><?php echo $row['nama']; ?></u></b></td>
			<td></td>

			
			<table width="100%" style="text-transform: capitalize; border-collapse: collapse; margin-top: -20px;">
			<tr>
			<td style="vertical-align: top; padding-top: -20px; text-align: center; padding-left: 325px;">
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