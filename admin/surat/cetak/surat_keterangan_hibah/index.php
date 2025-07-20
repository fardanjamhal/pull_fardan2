<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skh dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_hibah.*, surat_keterangan_hibah.id_arsip 
		FROM surat_keterangan_hibah 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_hibah.id_arsip 
		WHERE surat_keterangan_hibah.id_skh = '$id'
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
	
		<div align="center">
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase; font-size: 13pt;">
				<b><?php echo $row['jenis_surat']; ?></b>
		</h4>
		<h4 style="font-weight:normal; margin:0;">Nomor : <?php echo $row['no_surat']; ?></h4>
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

			<td style="text-align: justify;">
				Yang bertanda tangan di bawah ini :
			</td>
		</tr>
		</table>

		<table width="100%">
			<tr>
				<td width="1%">&nbsp;&nbsp;&nbsp;&nbsp;1. </td>
				<td width="30%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
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
				<td></td>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tempat_lahir'])) . ", " . $tgl . ucwords(strtolower($blnIndo[$bln])) . $thn; ?></td>
			</tr>
			<tr>
			<td></td>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
			<td>:</td>
			<td style="text-transform: uppercase;"><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
			<td></td>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
			<td>:</td>
				<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
			</tr>
		</table>

		<div style="font-weight: bold; font-style: italic; margin-left: 75px;">
			Selaku PIHAK PERTAMA ( Pemberi Hibah )
		</div>

		<table width="100%">
			<tr>
				<td width="1%">&nbsp;&nbsp;&nbsp;&nbsp;2. </td>
				<td width="30%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
				<td width="2%">:</td>
				<td width="60%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama2']; ?></td>
			</tr>
			<tr>
				<td></td>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat dan Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tempat_tgl2'])); ?></td>
			</tr>
			<tr>
			<td></td>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
			<td>:</td>
			<td><?php echo ucwords(strtolower($row['pekerjaan2'])); ?></td>
			</tr>
			<tr>
			<td></td>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
			<td>:</td>
			<td><?php echo ucwords(strtolower($row['alamat2'])); ?></td>
			</tr>
		</table>

		<div style="font-weight: bold; font-style: italic; margin-left: 75px;">
			Selaku PIHAK KEDUA ( Penerima Hibah )
		</div>

		<?php
		// Rapikan dan tebal kata kunci dalam isi surat
		$isi_surat = $row['isi_surat'];

		$isi_surat = str_ireplace('Pihak Pertama', '<b>Pihak Pertama</b>', $isi_surat);
		$isi_surat = str_ireplace('Pihak Kedua', '<b>Pihak Kedua</b>', $isi_surat);
		?>

		<style>
			.surat-isi {
				text-align: justify;    /* Rata kiri-kanan agar rapi */
			}
		</style>

		<table width="100%">
			<tr>
				<td class="surat-isi">
					<?php echo $isi_surat; ?>
				</td>
			</tr>
			<tr>
			<td>
			No. SPPT : <?php echo $row['no_sppt']; ?>
		 	</td>
			</tr>
		</table>
		<div>
			Dengan Batas - Batas sebagai berikut :
		</div>
	
		<style>
			.tabel-batas {
				width: 100%;
				border-collapse: collapse;
			}
			.tabel-batas td {
				vertical-align: top;
			}
			.tabel-batas .kolom-no {
				width: 5%;
				text-align: center;
			}
			.tabel-batas .kolom-arah {
				width: 20%;
			}
			.tabel-batas .kolom-titik {
				width: 2%;
				text-align: center;
			}
			.tabel-batas .kolom-ket {
				width: 73%;
				text-align: justify;
			}
		</style>

		<table class="tabel-batas">
			<tr>
				<td class="kolom-no">1.</td>
				<td class="kolom-arah">Sebelah Utara</td>
				<td class="kolom-titik">:</td>
				<td class="kolom-ket"><?php echo $row['tanah_utara']; ?></td>
			</tr>
			<tr>
				<td class="kolom-no">2.</td>
				<td class="kolom-arah">Sebelah Timur</td>
				<td class="kolom-titik">:</td>
				<td class="kolom-ket"><?php echo $row['tanah_timur']; ?></td>
			</tr>
			<tr>
				<td class="kolom-no">3.</td>
				<td class="kolom-arah">Sebelah Selatan</td>
				<td class="kolom-titik">:</td>
				<td class="kolom-ket"><?php echo $row['tanah_selatan']; ?></td>
			</tr>
			<tr>
				<td class="kolom-no">4.</td>
				<td class="kolom-arah">Sebelah Barat</td>
				<td class="kolom-titik">:</td>
				<td class="kolom-ket"><?php echo $row['tanah_barat']; ?></td>
			</tr>
		</table>


		
		<table width="100%">
			<td style="text-align: justify; text-justify: inter-word;">
				&nbsp;&nbsp;Demikian Surat Keterangan Hibah ini dibuat dengan sebenar-benarnya atas persetujuan kedua belah pihak tanpa adanya paksaan dari pihak mana pun. Apabila di kemudian hari terdapat gugatan dari salah satu pihak, maka permasalahan tersebut akan diselesaikan sesuai dengan ketentuan peraturan perundang-undangan yang berlaku.
			</td>
		</table>

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
				echo formatTempatTanggalSurat($connect, $no_surat);
				?>
			</td>
		</tr>
		</table>

		<style>
			.ttd-2kolom {
				width: 100%;
				text-align: center;
			}
			.ttd-2kolom td {
				vertical-align: top;
				width: 50%;
			}
			.nama-ttd {
				margin-top: 33px;
				font-weight: bold;
				text-decoration: underline;
				text-transform: uppercase; /* Ini yang bikin huruf jadi kapital semua */
			}
		</style>

		<table class="ttd-2kolom">
			<tr>
				<td>
					PIHAK PERTAMA<br>
					<span>( Pemberi Hibah )</span><br><br><br>
					<div class="nama-ttd"><?php echo $row['nama']; ?></div>
				</td>
				<td>
					PIHAK KEDUA<br>
					<span>( Penerima Hibah )</span><br><br><br>
					<div class="nama-ttd"><?php echo $row['nama2']; ?></div>
				</td>
			</tr>
		</table>

	<table width="100%">
		<tr>
		<td style="text-align: center; font-style: italic; font-weight: bold;">
			SAKSI - SAKSI
		</td>
		</tr>
	</table>

<?php
// Ambil data saksi dari database
$saksi = [
    $row['saksi1'],
    $row['saksi2'],
    $row['saksi3'],
    $row['saksi4']
];

// Buang data kosong
$saksi = array_filter($saksi);
$jumlah_saksi = count($saksi);
?>

<style>
    .tabel-saksi {
        width: 80%; /* atau 100% jika mau penuh */
        margin: 0 auto; /* ini yang membuat tabel ketengah */
        border-collapse: collapse;
    }
    .tabel-saksi td {
        vertical-align: top;
        padding: 4px 6px;
    }
    .kolom-nama {
        width: 50%;
        text-align: left;
    }
    .kolom-ttd-kanan {
        width: 50%;
        text-align: left;
        padding-left: 20px;
    }
    .kolom-ttd-kiri {
        width: 50%;
        text-align: left;
        padding-left: 20px;
    }
</style>

<table class="tabel-saksi">
    <?php for ($i = 0; $i < $jumlah_saksi; $i++): ?>
        <tr>
            <td class="kolom-nama">
                <?= ($i + 1) ?>. <?= strtoupper($saksi[$i]) ?>
            </td>
            <td class="<?= ($i == 0 || $i == 2) ? 'kolom-ttd-kiri' : 'kolom-ttd-kanan' ?>">
                <?= ($i + 1) ?>. (…………………)
            </td>
        </tr>
    <?php endfor; ?>
</table>

<style>
    .ttd-2kolom {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
        text-align: center;
    }
    .ttd-2kolom td {
        width: 50%;
		text-align: center;
    }
    .ttd-2kolom .nama {
        margin-top: 60px; /* Jarak kosong untuk tanda tangan */
        font-weight: bold;
        text-decoration: underline;
		text-transform: uppercase; /* Ini yang bikin huruf jadi kapital semua */
    }
</style>

<table class="ttd-2kolom">
    <tr>
		
		<td>

			<table width="100%" style="text-transform: capitalize; border-collapse: collapse;">
			<tr>
				<td style="text-align: center; vertical-align: middle;">
					Mengetahui,<br>
					<?php
					include_once '../../../surat/cetak/helper/jabatan_tampilkan.php';
					?>
				</td>
			</tr>
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
					SELECT penduduk.*, surat_keterangan_hibah.* 
					FROM penduduk 
					LEFT JOIN surat_keterangan_hibah 
						ON surat_keterangan_hibah.nik = penduduk.nik 
					WHERE surat_keterangan_hibah.id_skh = '$id'
				");

				if (mysqli_num_rows($qCek) > 0) {
					$row = mysqli_fetch_array($qCek);
					$id_pejabat_desa = $row['id_pejabat_desa'];

					if (isset($pejabat_data[$id_pejabat_desa])) {
						$nama = htmlspecialchars($pejabat_data[$id_pejabat_desa]['nama_pejabat_desa']);

						if ($id_pejabat_desa == 1) {
							// Hanya nama Kepala Desa
							echo '<br><span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . $nama . '</span>';
						} elseif ($id_pejabat_desa == 2) {
							// Barcode (nama pejabat ID 2 diasumsikan adalah path barcode)
							$barcode_path = '../../../../assets/img/barcode.png'; // ganti path sesuai lokasi barcode
							$nama_kades = htmlspecialchars($pejabat_data[1]['nama_pejabat_desa'] ?? '---');

							echo '<br><img src="' . $barcode_path . '?' . time() . '" alt="Barcode" style="max-width: 80px; margin-top: -74px"><br>';
							echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . $nama_kades . '</span>';
						}
					} else {
						echo "<p>Pejabat dengan ID {$id_pejabat_desa} tidak ditemukan.</p>";
					}
				} else {
					// Jika tidak ada surat, tampilkan pejabat default ID 1
					echo '<span style="font-weight: bold; text-decoration: underline; text-decoration-skip-ink: none;">' . 
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

			<td><br><br>
				Kepala Dusun
				<div class="nama"><?php echo $row['kepala_dusun']; ?></div>
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