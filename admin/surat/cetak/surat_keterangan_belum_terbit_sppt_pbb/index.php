<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_belum_terbit_sppt_pbb.*, surat_keterangan_belum_terbit_sppt_pbb.id_arsip 
		FROM surat_keterangan_belum_terbit_sppt_pbb 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_belum_terbit_sppt_pbb.id_arsip 
		WHERE surat_keterangan_belum_terbit_sppt_pbb.id_skbtsp = '$id'
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
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b>SURAT KETERANGAN BELUM TERBIT SPPT/PBB</b></h4>
		<h4 style="font-weight:normal; margin:0;">Nomor : <?php echo $row['no_surat']; ?></h4>
		</div>
	<div class="clear"></div>
	<div id="isi3">
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan dibawah ini adalah Pemerintah  
			<span style="text-transform: capitalize;">
				<?php echo $rows['nama_desa']; ?>
			</span> 
			<span style="text-transform: capitalize;">
				<?php echo $rows['kecamatan']; ?>
			</span> 
			<span style="text-transform: capitalize;">
				<?php echo $rows['kota']; ?>
			</span> :
			</td>
		</tr>
		<br>
		</table>

		<style>
		.tabel-print {
			width: 100%;
			border-collapse: collapse;
			font-size: 9pt; /* font lebih kecil */
		}

		.tabel-print th,
		.tabel-print td {
			border: 1px solid #000;
			padding: 4px 6px;
			text-align: left;
			vertical-align: top;
		}

		.tabel-print th {
			background-color: #f0f0f0;
			text-align: center;
		}
		</style>

		<table width="100%" style="text-transform: capitalize;">
			<?php
			include('../../../../config/koneksi.php');

			// Ambil nama pejabat dan jabatannya dari pejabat_desa urutan pertama
			$query = "SELECT nama_pejabat_desa, jabatan, nip, alamat FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1";
			$result = mysqli_query($connect, $query);

			$nama_pejabat = '';
			$jabatan = '';
			$nip = '';
			$alamat = '';
			if ($data = mysqli_fetch_assoc($result)) {
				$nama_pejabat = $data['nama_pejabat_desa'];
				$jabatan = $data['jabatan'];
				$nip = $data['nip'];
				$alamat = $data['alamat'];
			}
			?>
			<tr>
				<td width="30%" style="padding-left: 40px;">Nama</td>
				<td width="2%">:</td>
				<td width="60%"><strong><?php echo htmlspecialchars($nama_pejabat); ?></strong></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Jabatan</td>
				<td>:</td>
				<td style="text-transform: uppercase;;"><?php echo ucwords(strtolower(htmlspecialchars($jabatan))); ?></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px; vertical-align: top;">Alamat</td>
				<td style="vertical-align: top;">:</td>
				<td style="text-transform: uppercase; vertical-align: top;"><?php echo ucwords(strtolower(htmlspecialchars($alamat))); ?></td>
			</tr>

			</table>
			<br>
			<td>Menerangkan bahwa :</td>
			<table width="100%">

			<tr>
				<td width="30%" style="padding-left: 40px;">Nama</td>
				<td width="2%">:</td>
				<td width="60%"><strong><?php echo strtoupper($row['nama']); ?></strong></td>
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
				<td width="30%" style="padding-left: 40px;">Tempat/Tanggal Lahir</td>
				<td>:</td>
				<td>
				<?php 
					// Gabungkan tempat lahir dan tanggal lahir dulu
					$tempat_tgl = $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn;
					// Buat semua jadi lowercase dulu supaya rapi
					$tempat_tgl_lower = strtolower($tempat_tgl);
					// Lalu ubah huruf awal setiap kata jadi kapital
					echo ucwords($tempat_tgl_lower);
				?>
				</td>
			<tr>
				<td width="30%" style="padding-left: 40px;">NIK</td>
				<td>:</td>
				<td><?php echo strtoupper($row['nik']); ?></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo strtoupper($row['jenis_kelamin']); ?></td>
			</tr>
			<tr>
				<td width="30%" style="padding-left: 40px;">Pekerjaan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['pekerjaan']; ?></td>
			</tr>
			</tr>
			<tr>
			<td width="30%" style="padding-left: 40px;" style="vertical-align: top;">Alamat</td>
			<td style="vertical-align: top;">:</td>
			<td style="vertical-align: top;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
			</tr>
			</table>
		
		<table width="100%">
			<?php
		// Fungsi untuk kapitalisasi setiap kata
		function capitalizeEachWord($string) {
			$string = strtolower($string); // ubah semua jadi lowercase dulu
			return ucwords($string);       // kapitalisasi huruf awal setiap kata
		}
		?>

		<br>
		<table width="100%">
		<tr>
			<!-- Kolom nomor -->
			<td style="vertical-align: top; padding-left: 10px; width: 25px;">
				1.
			</td>

			<!-- Kolom isi paragraf -->
			<td style="text-align: justify; padding-right: 5px;">
				Adalah pemilik tanah pertanian/non pertanian yang terletak di <?php echo ucwords(strtolower($row['lokasi'])); ?>
 dengan batas-batas sebagai berikut:
			</td>
		</tr>

		</table>

		<style>
		.batas-tanah {
			width: 100%;
			border-collapse: collapse;
			margin-left: 30px; /* Geser tabel ke kanan */
			margin-top: 10px;
			text-transform: uppercase; /* Ubah semua huruf jadi kapital */
			font-weight: normal; /* Hilangkan bold */
		}

		.batas-tanah td {
			padding: 4px 8px;
			vertical-align: top;
		}

		.batas-tanah td.label {
			width: 80px;
		}

		.batas-tanah td.separator {
			width: 10px;
		}
		</style>

		<table class="batas-tanah">
		<tr>
			<td class="label">Utara</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_utara']; ?></td>
		</tr>
		<tr>
			<td class="label">Timur</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_timur']; ?></td>
		</tr>
		<tr>
			<td class="label">Selatan</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_selatan']; ?></td>
		</tr>
		<tr>
			<td class="label">Barat</td>
			<td class="separator">:</td>
			<td><?php echo $row['tanah_barat']; ?></td>
		</tr>
		</table>

		<br>
		<table width="100%">
		<tr>
			<!-- Kolom nomor -->
			<td style="vertical-align: top; padding-left: 10px; width: 25px;">
				2.
			</td>

			<!-- Kolom isi paragraf -->
			<td style="text-align: justify; padding-right: 5px;">
				Bahwa belum pernah diterbitkan SPPT/PBB atas tanah tersebut diatas sampai dengan sekarang
			</td>
		</tr>

		</table>

		<table width="100%">
		<tr>
			<td style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian Surat Keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dipergunakan seperlunya.  
			</td>
		</tr>
		</table>


		</table>
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

	  <!-- kode barcode FARDAN -->
		<?php
		$id_surat = isset($_GET['id']) ? intval($_GET['id']) : null;

		if (!$id_surat) {
			http_response_code(400);
			exit('ID tidak valid.');
		}

		// Ambil nama folder sebagai jenis surat, contoh: surat_keterangan
		$jenis_surat = basename(dirname(__FILE__));
		?>
		<!-- kode barcode FARDAN -->

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
                 echo "<img src=\"../helper/generate_qr_surat.php?id=$id_surat&jenis=$jenis_surat\" width=\"90\" alt=\"QR Code\" style=\"margin: -75px auto 5px; \">";
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