<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	$id = $_GET['id']; // id_skd dari surat

	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, surat_keterangan_pindah_penduduk.*, surat_keterangan_pindah_penduduk.id_arsip 
		FROM surat_keterangan_pindah_penduduk 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = surat_keterangan_pindah_penduduk.id_arsip 
		WHERE surat_keterangan_pindah_penduduk.id_skpp = '$id'
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
			<td style="text-align: justify;">
			Yang bertanda tangan / cap jempol di bawah ini : 
			</td>
		</tr>
		</table>
		<br><br>
		<table width="100%" style="text-transform: capitalize;">
			<tr>
				<td width="30%" class="indentasi">1. Nama Lengkap</td>
				<td width="2%">:</td>
				<td width="68%" style="text-transform: uppercase; font-weight: bold;"><?php echo $row['nama']; ?></td>
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
				<td class="indentasi">2. Tempat / Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo ucwords(strtolower($row['tempat_lahir'])) . ", " . $tgl . ucwords(strtolower($blnIndo[$bln])) . $thn; ?></td>
			</tr>
			<tr>
				<td class="indentasi">3. Umur</td>
				<td>:</td>
				<td>
					<?php
					$tgl_lahir = $row['tgl_lahir'];
					$lahir = new DateTime($tgl_lahir);
					$hari_ini = new DateTime();
					$umur = $hari_ini->diff($lahir)->y;
					echo $umur . " Tahun";
					?>
				</td>
			</tr>
			<tr>
				<td class="indentasi">4. Kewarganegaraan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['kewarganegaraan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">5. Agama</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['agama'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">6. Jenis Kelamin</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo ucwords(strtolower($row['jenis_kelamin'])); ?></td>
			</tr>
			<tr>
				<td class="indentasi">7. Pekerjaan</td>
				<td>:</td>
				<td style="text-transform: uppercase;"><?php echo $row['pekerjaan']; ?></td>
			</tr>
			<tr>
				<td class="indentasi">8. NIK / No. KTP</td>
				<td>:</td>
				<td><?php echo $row['nik']; ?></td>
			</tr>
			<td class="indentasi">8. Tempat Tinggal</td>
			<td>:</td>
			<td style="text-align: justify;">
				<?php
				include_once '../../../surat/cetak/helper/alamat_helper.php';

				// Pastikan $row sudah berisi data dari database sebelumnya
				echo formatAlamatLengkap($row, $connect); // ✅ benar
				?>
			</td>
			<tr>
				<td class="indentasi">9. Surat bukti diri</td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<br>
		<td>
			Akan pindah dengan keterangan sebagai berikut :
		</td>
		<br>
		<table width="100%" style="text-transform: capitalize;">
		<br>
		<tr>
			<td width="30%" class="indentasi">10. Alamat yang dituju</td>
			<td width="2%">:</td>
			<td width="68%"><?php echo $row['alamat_yang_dituju']; ?></td>
		</tr>
		<tr>
			<td width="30%" class="indentasi">11. Alasan Pindah</td>
			<td width="2%">:</td>
			<td width="68%"><?php echo $row['alasan_pindah']; ?></td>
		</tr>
		<tr>
			<td width="30%" class="indentasi">12. Tanggal Pindah</td>
			<td width="2%">:</td>
			<td width="68%"><?php echo $row['alasan_pindah']; ?></td>
		</tr>
			<?php
			include('../../../../config/koneksi.php');

			$id_skpp = $row['id_skpp'];
			$qPengikut = mysqli_query($connect, "SELECT COUNT(*) AS jumlah FROM pengikut_surat_keterangan_pindah_penduduk WHERE id_surat_pindah = '$id_skpp'");
			$dataPengikut = mysqli_fetch_assoc($qPengikut);
			$jumlah_pengikut = $dataPengikut['jumlah'];
			?>
			<tr>
				<td width="30%" class="indentasi">13. Jumlah Pengikut</td>
				<td width="2%">:</td>
				<td width="68%">
					<?php
					echo ($jumlah_pengikut > 0) ? $jumlah_pengikut . ' orang' : '-';
					?>
				</td>
			</tr>
		</table>


		<?php
			$qDetail = mysqli_query($connect, "SELECT * FROM pengikut_surat_keterangan_pindah_penduduk WHERE id_surat_pindah = '$id_skpp'");

			if (mysqli_num_rows($qDetail) > 0) {
			?>
				<table width="100%" style="text-transform: capitalize; margin-top: 15px;" border="1" cellspacing="0" cellpadding="5">
					<thead style="font-weight: bold; text-align: center;">
						<tr>
							<td width="5%">NO</td>
							<td width="30%">NIK</td>
							<td width="25%">Nama</td>
							<td width="20%">Masa Berlaku KTP S/D</td>
							<td width="20%">SHDK</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						while ($pengikut = mysqli_fetch_assoc($qDetail)) {
							echo "<tr>";
							echo "<td style='text-align: center;'>{$no}</td>";
							echo "<td style='text-align: center;'>{$pengikut['nik_pengikut']}</td>";
							echo "<td style='text-align: center;'>" . ucwords(strtolower($pengikut['nama_pengikut'])) . "</td>";
							echo "<td style='text-align: center;'>" . ucwords(strtolower($pengikut['masa_berlaku_ktp'])) . "</td>";
							echo "<td style='text-align: center;'>" . ucwords(strtolower($pengikut['shdk'])) . "</td>";
							echo "</tr>";
							$no++;
						}
						?>
					</tbody>
				</table>
			<?php
			}
			?>




		<br>
		<table width="100%">
			<?php
		// Fungsi untuk kapitalisasi setiap kata
		function capitalizeEachWord($string) {
			$string = strtolower($string); // ubah semua jadi lowercase dulu
			return ucwords($string);       // kapitalisasi huruf awal setiap kata
		}
		?>

		<table width="100%">
		<tr>
			<td class="indentasi" style="text-align: justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini dibuat, untuk dipergunakan sebagaimana mestinya.
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