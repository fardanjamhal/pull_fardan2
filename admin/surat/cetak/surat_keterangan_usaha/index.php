<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_usaha.*, surat_keterangan_usaha.id_arsip 
		FROM surat_keterangan_usaha 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_usaha.id_arsip 
		WHERE surat_keterangan_usaha.id_sku = '$id'
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
		<tr>
				<td class="indentasi">Yang bertanda tangan di bawah ini:
				</td>
			</tr>
	<table width="100%">
		</table>
		<br>
		<table width="100%" style="text-transform: capitalize;">

			<?php
			include('../../../../config/koneksi.php');

			// Ambil nama pejabat dan jabatannya dari pejabat_desa urutan pertama
			$query = "SELECT nama_pejabat_desa, jabatan, nip FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1";
			$result = mysqli_query($connect, $query);

			$nama_pejabat = '';
			$jabatan = '';
			if ($data = mysqli_fetch_assoc($result)) {
				$nama_pejabat = $data['nama_pejabat_desa'];
				$jabatan = $data['jabatan'];
				$nip = $data['nip'];
			}
			?>

			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
				<td width="2%">:</td>
				<td width="68%">
					<strong style="text-transform: uppercase;">
						<?php echo htmlspecialchars($nama_pejabat); ?>
					</strong><br>
				</td>
			</tr>

			<?php if (!empty(trim($nip))) { ?>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nip</td>
				<td>:</td>
				<td style="text-transform: uppercase;">
					<?php echo preg_replace('/[^0-9\s]/', '', $nip); ?>
				</td>
			</tr>
			<?php } ?>

			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo htmlspecialchars($jabatan); ?></td>
			</tr>
		</table>
		<br>
			<tr>
				<td class="indentasi">Dengan ini menerangkan bahwa :
				</td>
			</tr>
		<br><br>
		

		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIK</td>
				<td>:</td>
				<td><?php echo $row['nik']; ?></td>
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
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tempat/Tgl. Lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tempat_lahir'])) . ", " . $tgl . ucwords(strtolower($blnIndo[$bln])) . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['jenis_kelamin'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['pekerjaan'])); ?></td>
			</tr>
			<td class="indentasi">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
			<td>:</td>
			<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
		</table>


		<br>
		<table width="100%">
		<tr>
			<td style="text-align: justify;">
				Bahwa yang tersebut namanya diatas adalah benar-benar mempunyai <b>USAHA :</b>
			</td>
		</tr>
		</table>
		<br>
		<table width="100%">
			<tr>
				<td width="30%" style="text-align: justify; padding-left: 30px;">1. Jenis Usaha</td>
				<td width="3%" style="vertical-align: top;">:</td>
				<td width="80%" style="text-align: justify;"><b><span style="text-transform: capitalize;"><?php echo htmlspecialchars($row['usaha']); ?></span></b>
				</td>
			</tr>
			<tr>
				<td style="text-align: justify; padding-left: 30px;">2. Lama Usaha</td>
				<td style="vertical-align: top;">:</td>
				<td style="text-align: justify;"><?php echo htmlspecialchars($row['alamat_usaha']); ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: justify; padding-left: 30px;">3. Alamat Usaha</td>
				<td style="vertical-align: top;">:</td>
				<td style="text-align: justify;"><?php echo htmlspecialchars($row['keperluan']); ?>
				</td>
			</tr>
		</table>
		<br>
		<table width="100%" style="text-align: justify;">
			<tr>
				<td class="indentasi">Demikian surat keterangan ini dibuat dan diberikan kepada yang bersangkutan untuk dipergunakan seperlunya.
				</td>
			</tr>
		</table>
	</div>


	<table width="100%" style="margin-top: 30px; margin-left: 10%;">
	<tr>
		<td style="width: 30%; text-align: left;">

		</td>

		<td style="width: 70%; text-align: center;">

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
      	<?php include '../../../surat/cetak/helper/jabatan_tampilkan.php'; ?>
		
		<br>
		<b></b><br><br><br><br><br>
		
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