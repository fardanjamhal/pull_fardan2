<?php 
	include ('../../permintaan_surat/konfirmasi/part/akses.php');
	include ('../../../../config/koneksi.php');

	// Ambil nama folder terakhir dari URL path (misalnya: surat_keterangan_usaha)
	$folder = basename(__DIR__); // Lokasi file sekarang (cth: "surat_keterangan_usaha")

	$nama_tabel = $folder;

	// Buat id field (cth: id_sku)
	$pecah = explode('_', $folder);
	$singkatan = implode('', array_map(function($k) {
		return substr($k, 0, 1);
	}, $pecah));
	$id_field = 'id_' . $singkatan; // Contoh: 'id_sku'

	// Ambil ID dari parameter URL
	$id = $_GET['id'];

	// Query utama ambil data dari tabel dinamis
	$qCek = mysqli_query($connect,"
		SELECT arsip_surat.*, $nama_tabel.*, $nama_tabel.id_arsip 
		FROM $nama_tabel 
		LEFT JOIN arsip_surat ON arsip_surat.id_arsip = $nama_tabel.id_arsip 
		WHERE $nama_tabel.$id_field = '$id'
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
		<h4 style="text-decoration: underline; margin: 0; text-transform: uppercase;"><b><?php echo $row['jenis_surat']; ?></b></h4>
		<h4 style="font-weight:normal; margin:0;"><?php echo $row['no_surat']; ?></h4>
		</div>
	<br>
	<div class="clear"></div>
	<div id="isi3">


	<style>
	table.table-tiga-kolom {
		width: 100%;
		border-collapse: collapse;
	}

	table.table-tiga-kolom td {
		vertical-align: middle;
		text-align: left;
	}

	/* Atur lebar kolom */
	table.table-tiga-kolom td:nth-child(1) {
		width: 8%;
	}

	table.table-tiga-kolom td:nth-child(2) {
		width: 2%;
	}

	table.table-tiga-kolom td:nth-child(3) {
		width: 85%;
	}
	</style>


		<table class="table-tiga-kolom">
		<tr>
			<td>Dasar</td>
			<td>:</td>
			<td><?php echo htmlspecialchars($row['dasar']); ?></td>
		</tr>
		</table>

	<table width="100%">
	<tr>
		<td align="center">
		<div style="margin-bottom: 5px;">,dengan ini :</div>
		<div style="font-weight: bold;">MENUGASKAN</div>
		</td>
	</tr>
	</table>
	<table class="table-tiga-kolom">
		<tr>
			<td>Kepada</td>
			<td>:</td>
			<td></td>
		</tr>
	</table>

	<table width="100%" border="0" cellpadding="4" cellspacing="0">
	<?php
	$id = $_GET['id'];
	$query = mysqli_query($connect, "SELECT * FROM surat_tugas WHERE id_st = '$id'");
	$data = mysqli_fetch_assoc($query);

	$no = 1;
	for ($i = 1; $i <= 9; $i++) {
		$namaKey = 'nama_' . $i;
		$jabatanKey = 'jabatan_' . $i;

		$nama = isset($data[$namaKey]) ? $data[$namaKey] : '';
		$jabatan = isset($data[$jabatanKey]) ? $data[$jabatanKey] : '';

		if (!empty($nama) || !empty($jabatan)) {
			echo '<tr>';
			echo '<td width="5%" valign="top">' . $no++ . '.</td>';
			echo '<td width="20%" valign="top">Nama: <br>Jabatan:</td>';
			echo '<td width="2%" valign="top">:<br>:</td>';
			echo '<td>' . htmlspecialchars($nama) . '<br>' . htmlspecialchars($jabatan) . '</td>';
			echo '</tr>';
		}
	}
	?>
	</table>
	<br>
	<table class="table-tiga-kolom">
		<tr>
			<td>Untuk</td>
			<td>:</td>
			<td><?php echo htmlspecialchars($row['untuk']); ?></td>
		</tr>
	</table>
	<br>

<style>
  table.info-table {
    width: 100%;
    border-collapse: collapse;
	 margin-left: 50px; /* geser ke kanan */
  }

  table.info-table td {
    vertical-align: top;
  }

  .label-col {
    width: 20%;
  }

  .colon-col {
    width: 2%;
    text-align: center;
  }

  .value-col {
    width: 78%;
  }


</style>

<table class="info-table">
  <!-- Baris 1–3: Dengan titik dua -->
  <tr>
    <td>1.</td>
    <td class="label-col">Tempat Tujuan</td>
    <td class="colon-col">:</td>
    <td class="value-col"><?php echo htmlspecialchars($row['tempat_tujuan']); ?></td>
  </tr>
  <tr>
    <td>2.</td>
    <td class="label-col">Lama Penugasan</td>
    <td class="colon-col">:</td>
    <td class="value-col"><?php echo htmlspecialchars($row['lama_penugasan']); ?></td>
  </tr>
  <tr>
    <td>3.</td>
    <td class="label-col">Tanggal Penugasan</td>
    <td class="colon-col">:</td>
    <td class="value-col"><?php echo htmlspecialchars($row['tanggal_mulai']); ?> s/d <?php echo htmlspecialchars($row['tanggal_selesai']); ?></td>
  </tr>

  <!-- Baris 4–5: Tanpa titik dua -->
  <tr>
    <td colspan="4" class="full-row">4. Perintah ini dilaksanakan dengan penuh tanggung jawab</td>
  </tr>
  <tr>
    <td colspan="4" class="full-row">5. Apabila terdapat kekeliruan dalam surat perintah tugas ini akan dilakukan perbaikan sebagaimana mestinya</td>
  </tr>
</table>



	</div>
	<br>
	<table width="100%">
		<tr>
		<td colspan="4">
			<div style="display: flex; justify-content: flex-end;">
			<table style="border-collapse: collapse;">
				<tr>
				<td style="white-space: nowrap;">Dikeluarkan di</td>
				<td style="padding: 0 5px;">:</td>
				<td style="white-space: nowrap;">
					<?php echo htmlspecialchars($rows['nama_desa']); ?>
				</td>
				</tr>
				<tr>
				<td style="white-space: nowrap;">Pada Tanggal</td>
				<td style="padding: 0 5px;">:</td>
				<td style="white-space: nowrap;">
					<?php
					$tanggalSurat = $row['tanggal_surat'];
					$bulanIndo = [
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
					];
					$tanggal = date('d', strtotime($tanggalSurat));
					$bulan = date('F', strtotime($tanggalSurat));
					$tahun = date('Y', strtotime($tanggalSurat));
					echo $tanggal . ' ' . $bulanIndo[$bulan] . ' ' . $tahun;
					?>
				</td>
				</tr>
			</table>
			</div>
		</td>
		</tr>
		

<table width="100%" style="text-transform: capitalize; border-collapse: collapse;">
  <tr>
    <td style="width: 50%;"></td>
    <td style="vertical-align: top; padding-top: 20px; text-align: center;">
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