<?php
// BARIS PERTAMA FILE, TANPA SPASI ATAU BARIS KOSONG DI ATASNYA
// Pastikan session_start() ada di paling atas dari script yang menggunakan session
// atau di file koneksi.php jika itu selalu di-include pertama kali.

// Include koneksi database terlebih dahulu
include ('../../config/koneksi.php'); // Pastikan file ini tidak menghasilkan output HTML apapun

// --- MULAI LOGIKA PEMROSESAN NIK ---
// Semua validasi, query database, dan kondisi redirect harus ada di sini
// SEBELUM ada output HTML atau include file yang menghasilkan output HTML (seperti header.php)

// Cek apakah data NIK dikirim via POST dan tidak kosong
if (isset($_POST['fnik']) && !empty($_POST['fnik'])) {
    $nik = $_POST['fnik'];

    // Gunakan Prepared Statements untuk mencegah SQL Injection
    $stmt = mysqli_prepare($connect, "SELECT nik, nama, jenis_kelamin, tempat_lahir, tgl_lahir, agama, pekerjaan, kewarganegaraan FROM penduduk WHERE nik = ?");

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $nik); // 's' menandakan tipe data string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); // Penting untuk mysqli_stmt_num_rows()

        // Periksa apakah NIK ditemukan
        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $data_nik, $data_nama, $data_jenis_kelamin, $data_tempat_lahir, $data_tgl_lahir, $data_agama, $data_pekerjaan, $data_kewarganegaraan);
            mysqli_stmt_fetch($stmt);

            // Karena kita sudah query WHERE nik = ?, $data_nik pasti sama dengan $nik
            // Validasi $data['nik'] == $nik menjadi redundant, kita bisa langsung set session
            $_SESSION['nik'] = $data_nik;
            // Kita juga bisa menyimpan data penduduk lainnya di session jika diperlukan
            $_SESSION['penduduk_data'] = [
                'nama' => $data_nama,
                'jenis_kelamin' => $data_jenis_kelamin,
                'tempat_lahir' => $data_tempat_lahir,
                'tgl_lahir' => $data_tgl_lahir,
                'agama' => $data_agama,
                'pekerjaan' => $data_pekerjaan,
                'kewarganegaraan' => $data_kewarganegaraan
            ];

            // Setelah semua pemrosesan PHP selesai, baru lanjutkan ke tampilan HTML.
            // Tidak ada redirect di sini karena NIK ditemukan, dan kita akan menampilkan form.

        } else {
            // NIK tidak ditemukan di database
            header("location:index.php?pesan=gagal");
            exit(); // Penting! Hentikan eksekusi script
        }
        mysqli_stmt_close($stmt); // Tutup statement
    } else {
        // Jika ada error saat mempersiapkan statement (misal: query salah)
        $_SESSION['pesan_error'] = "Terjadi kesalahan sistem. Mohon coba lagi nanti.";
        error_log("MySQLi Prepare Error: " . mysqli_error($connect)); // Log error untuk debugging
        header("Location: index.php");
        exit(); // Penting! Hentikan eksekusi script
    }
} else {
    // Jika NIK tidak dikirim atau kosong dari form (misalnya user langsung akses halaman ini)
    $_SESSION['pesan_error'] = "Mohon masukkan NIK Anda!";
    header("Location: index.php");
    exit(); // Penting! Hentikan eksekusi script
}
// --- AKHIR LOGIKA PEMROSESAN NIK ---

// --- MULAI OUTPUT HTML ---
// HTML baru dimulai di sini, setelah semua kemungkinan redirect ditangani.
?>

<!DOCTYPE html>
<html lang="id">
<head>
<?php include ('../part/header.php'); ?>

    <meta charset="UTF-8">
    <script src="../../assets/tinymce/js/tinymce/tinymce.min.js"></script>

	<!-- TinyMCE Offline -->
	<script src="/assets/tinymce/tinymce.min.js"></script>

	<script>
		const defaultText = `1. Undang-Undang Nomor 22 Tahun 2001 Tentang Minyak dan Gas Bumi<br>
	2. Undang-Undang Nomor 32 Tahun 2004 Tentang Pemerintah Daerah<br>
	3. Perpres Nomor 15 Tahun 2012 Tentang Harga Jual Eceran dan Penggunaan Bahan Bakar Tertentu<br>
	4. Peraturan Mentri Energi Dan Sumber Daya Mineral Republik Indonesia No 01 Tahun 2013`;

		tinymce.init({
			selector: '#isiSurat',
			height: 400,
			menubar: true,
			plugins: [
				'advlist autolink lists link image charmap print preview anchor',
				'searchreplace visualblocks code fullscreen',
				'insertdatetime media table paste code help wordcount'
			],
			toolbar: 'undo redo | formatselect | bold italic underline strikethrough | ' +
					'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
					'link image media table | removeformat | help',
			branding: false,
			setup: function (editor) {
				editor.on('init', function () {
					editor.setContent(defaultText); // Tampilkan default saat pertama kali load
				});
			}
		});

		// Fungsi reset ke default
		function resetIsiSurat() {
			tinymce.get('isiSurat').setContent(defaultText);
		}
	</script>

	<!-- Script TinyMCE -->
	<script src="assets/tinymce/tinymce.min.js"></script>
	<script>
	const defaultTable = `
		<table style="width: 100%; border-collapse: collapse;" border="1">
		<thead>
			<tr>
			<th style="width: 3.39%; text-align: center; padding: 8px;">No</th>
			<th style="width: 15.03%; text-align: center;">Jenis Alat</th>
			<th style="width: 7.76%; text-align: center;">Jumlah Alat</th>
			<th style="width: 10.96%; text-align: center;">Fungsi Alat</th>
			<th style="width: 10.86%; text-align: center;">BBM Jenis Tertentu</th>
			<th style="width: 15.91%; text-align: center;">Kebutuhan BBM Jenis Tertentu</th>
			<th style="width: 9.89%; text-align: center;">Jam/Hari Operasi</th>
			<th style="width: 26.19%; text-align: center;">Konsumsi BBM Jenis Tertentu Per (Jam/Hari/Minggu/Bulan)</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td style="text-align: center;">1</td>
			<td style="text-align: center;">Mesin Pompa Air dan Hand Traktor</td>
			<td style="text-align: center;">2 Unit</td>
			<td style="text-align: center;">Menyalakan Mesin</td>
			<td style="text-align: center;">Pertalite / Solar</td>
			<td style="text-align: center;">70 Liter</td>
			<td style="text-align: center;">Setiap hari</td>
			<td style="text-align: center;">2.100 Liter/bln</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
			<td style="text-align: center;" colspan="5"><strong>Jumlah Total Kebutuhan</strong></td>
			<td style="text-align: center;"><strong>70 Liter</strong></td>
			<td style="text-align: center;" colspan="2"><strong>2.100 Ltr/bln</strong></td>
			</tr>
		</tfoot>
		</table>
	`;

	tinymce.init({
		selector: '#tabelBbm',
		height: 400,
		menubar: true,
		plugins: 'lists link table code fullscreen searchreplace visualblocks',
		toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link table | removeformat code fullscreen',
		branding: false,
		setup: function(editor) {
		editor.on('init', function() {
			editor.setContent(defaultTable); // ⬅ isi default saat pertama kali
		});
		},
		content_style: `
		body { font-family:Arial,sans-serif; font-size:14px }
		table { border-collapse: collapse; width: 100%; }
		th, td { border: 1px solid #999; padding: 6px 10px; text-align: center; }
		`
	});

	function resetTabelBbm() {
		tinymce.get('tabelBbm').setContent(defaultTable);
	}
	</script>

	<style>
  .container-fluid {
  text-align: center; /* Pusatkan semua isi di tengah horizontal */
	}
  /* Gaya umum semua input */
  input, textarea, select {
    border: 1px solid #ccc;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 14px;
    width: 49%;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
    background-color: #fff;
  }

  /* Input fokus (agar terlihat aktif) */
  input:focus, textarea:focus, select:focus {
    border-color: #7aa7ff;
    box-shadow: 0 0 4px rgba(122, 167, 255, 0.4);
  }

  /* Input invalid (required belum diisi) - soft warning */
  input:required:invalid,
  textarea:required:invalid,
  select:required:invalid {
    border: 1.5px solid #e07c7c; /* merah muda lembut */
    background-color: #fff7f7;
  }

  /* Input valid */
  input:required:valid,
  textarea:required:valid,
  select:required:valid {
    border: 1.5px solid #7acb9a; /* hijau lembut */
    background-color: #f6fef9;
  }

  /* Tambahan: Placeholder biar elegan */
  input::placeholder, textarea::placeholder {
    color: #aaa;
    font-style: italic;
  }
</style>

</head>
<body class="bg-light">

<?php
include ('../../config/koneksi.php');
$nik = $_POST['fnik'];

$qCekNik = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik'");
$row = mysqli_num_rows($qCekNik);

if ($row > 0) {
    $data = mysqli_fetch_assoc($qCekNik);
    if ($data['nik'] == $nik) {
        $_SESSION['nik'] = $nik;
?>

<!-- Konten utama -->
<div class="container" style="padding-top:30px; padding-bottom:60px;">
    <div class="card">
        <h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT</h5>
        <div class="card-body">

            <!-- Judul dan Nomor Surat -->
            <div class="row">
                <?php
                $url = basename(__DIR__);
                $judul = strtoupper(str_replace('_', ' ', $url));
                ?>
                <div class="col-sm-6"><h5><b><?= $judul; ?></b></h5></div>
                <div class="col-sm-6"><h5><b>NOMOR SURAT : -</b></h5></div>
            </div>
            <hr>

            <!-- Form -->
            <form method="post" action="simpan-surat.php">
                <!-- Data pribadi -->
                <h6><i class="fas fa-user"></i> Informasi Pribadi</h6><hr>
                <div class="row">
                    <!-- Nama -->
                    <div class="col-sm-6">
                        <label>Nama Lengkap</label>
                        <input type="text" name="fnama" class="form-control" value="<?= $data['nama']; ?>" readonly>
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="col-sm-6">
                        <label>Jenis Kelamin</label>
                        <input type="text" name="fjenis_kelamin" class="form-control" value="<?= $data['jenis_kelamin']; ?>" readonly>
                    </div>

                    <!-- Tempat Tgl Lahir -->
                    <div class="col-sm-6">
                        <label>Tempat, Tgl Lahir</label>
                        <?php
                        $tgl_lhr = date($data['tgl_lahir']);
                        $tgl = date('d ', strtotime($tgl_lhr));
                        $bln = date('F', strtotime($tgl_lhr));
                        $thn = date(' Y', strtotime($tgl_lhr));
                        $blnIndo = [
                            'January'=>'Januari','February'=>'Februari','March'=>'Maret',
                            'April'=>'April','May'=>'Mei','June'=>'Juni','July'=>'Juli',
                            'August'=>'Agustus','September'=>'September','October'=>'Oktober',
                            'November'=>'November','December'=>'Desember'];
                        ?>
                        <input type="text" name="ftempat_tgl_lahir" class="form-control" 
                            value="<?= $data['tempat_lahir'] . ', ' . $tgl . $blnIndo[$bln] . $thn; ?>" readonly>
                    </div>

                    <!-- Agama -->
                    <div class="col-sm-6">
                        <label>Agama</label>
                        <input type="text" name="fagama" class="form-control" value="<?= $data['agama']; ?>" readonly>
                    </div>

                    <!-- Pekerjaan -->
                    <div class="col-sm-6">
                        <label>Pekerjaan</label>
                        <input type="text" name="fpekerjaan" class="form-control" value="<?= $data['pekerjaan']; ?>" readonly>
                    </div>

                    <!-- NIK -->
                    <div class="col-sm-6">
                        <label>NIK</label>
                        <input type="text" name="fnik" class="form-control" value="<?= $data['nik']; ?>" readonly>
                    </div>

                    <!-- Alamat -->
                    <div class="col-sm-6">
                        <label>Alamat</label>
                        <?php include ('../../surat/helper/alamat_helper.php'); ?>
                    </div>

                    <!-- Kewarganegaraan -->
                    <div class="col-sm-6">
                        <label>Kewarganegaraan</label>
                        <input type="text" name="fkewarganegaraan" class="form-control" value="<?= $data['kewarganegaraan']; ?>" readonly>
                    </div>
                </div>
                <br>

                <!-- Data Informasi -->
                <h6><i class="fas fa-edit"></i> DATA INFORMASI</h6><hr>

                <!-- Dasar Hukum -->
                <div class="form-group">
                    <label>Dasar Hukum</label>
                    <textarea id="isiSurat" name="fisi_surat" rows="8" class="form-control"></textarea>
                    <button type="button" class="btn btn-warning mt-2" onclick="resetIsiSurat()">🔄 Reset ke Default</button>
                </div>

				<!-- Alamat SPBU Pembelian -->
				<div class="form-group">
					<label>Keperluan BBM</label>
					<div class="input-group">
						<input type="text" id="keperluanBbm" name="fkeperluan_bbm" class="form-control" placeholder="Contoh : BBM Jenis Tertentu (Pertalite)" required>
						<div class="input-group-append">
							<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaultBbm()">
							<i class="fas fa-sync-alt"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Jenis Usaha / Kegiatan</label>
					<div class="input-group">
						<input type="text" id="jenisUsaha" name="fjenis_usaha" class="form-control" placeholder="Contoh : Usaha Mikro" required>
					<div class="input-group-append">
						<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaultJenisUsaha()">
						<i class="fas fa-sync-alt"></i>
						</button>
					</div>
				</div>
				</div>
				
				<div class="form-group">
					<div class="input-group">
						<input type="text" id="alokasiVolume" name="falokasi_volume" class="form-control" placeholder="--------" required>
						<div class="input-group-append">
							<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaultalokasiVolume()">
							<i class="fas fa-sync-alt"></i>
							</button>
						</div>
					</div>
				</div>

					<div class="row">
						  <div class="col-sm-6">
						      	<div class="form-group">
									<label>Sejumlah</label>
									<div class="input-group">
										<input type="text" id="sejumlah" name="fsejumlah" class="form-control" placeholder="Contoh : 450 liter/minggu" required>
										<div class="input-group-append">
											<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaultsejumlah()">
											<i class="fas fa-sync-alt"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
									<label>Tempat Pengambilan</label>
									<div class="input-group">
										<input type="text" id="tempatPengambilan" name="ftempat_pengambilan" class="form-control" placeholder="Contoh : Lembaga Penyalur" required>
										<div class="input-group-append">
											<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaulttempatPengambilan()">
											<i class="fas fa-sync-alt"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
									<label>Nomor Lembaga Penyalur</label>
									<div class="input-group">
										<input type="text" id="nomorLembagaPenyalur" name="fnomor_lembaga_penyalur" class="form-control" placeholder="Contoh : 74.923.02" required>
										<div class="input-group-append">
											<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaultnomorLembagaPenyalur()">
											<i class="fas fa-sync-alt"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
									<label>Lokasi</label>
									<div class="input-group">
										<input type="text" id="lokasi" name="flokasi" class="form-control" placeholder="Contoh : SPBU ANDI SOSE Paccelanga" required>
										<div class="input-group-append">
											<button type="button" class="btn btn-outline-secondary" style="width: 40px;" onclick="isiDefaultlokasi()">
											<i class="fas fa-sync-alt"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
					</div>
					<br>

				<!-- Dasar Hukum -->
               	<div class="form-group">
				<label for="tabelBbm">Tabel Data BBM</label>
				<textarea id="tabelBbm" name="ftabel_bbm" rows="8" class="form-control"></textarea>
				<button type="button" class="btn btn-warning mt-2" onclick="resetTabelBbm()">🔄 Gunakan Tabel Default</button>
				</div>

                <!-- Tombol -->
                <hr>
                <input type="button" class="btn btn-secondary" value="Batal" onclick="window.location.href='../../surat/surat_keterangan/'">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">

            </form>
        </div>
    </div>
</div>

<script>
	function isiDefaultJenisUsaha() {
	const defaultText = "Usaha Mikro";
	document.getElementById('jenisUsaha').value = defaultText;
	}
</script>

<script>
	function isiDefaultBbm() {
	const defaultText = "BBM Jenis Tertentu (Pertalite)";
	document.getElementById('keperluanBbm').value = defaultText;
	}
</script>

<script>
    const defaultAlokasiVolume = "Diberikan Alokasi Volume bensin (Pertalite) Ron 88/minyak Solar (Gas Oil)";
    
    // Isi default saat halaman dimuat
    window.addEventListener('DOMContentLoaded', function () {
        document.getElementById('alokasiVolume').value = defaultAlokasiVolume;
    });

    // Fungsi reset ke default
    function isiDefaultalokasiVolume() {
        document.getElementById('alokasiVolume').value = defaultAlokasiVolume;
    }
</script>

<script>
	function isiDefaultsejumlah() {
	const defaultText = "450 liter/minggu";
	document.getElementById('sejumlah').value = defaultText;
	}
</script>

<script>
	function isiDefaulttempatPengambilan() {
	const defaultText = "Lembaga Penyalur";
	document.getElementById('tempatPengambilan').value = defaultText;
	}
</script>

<script>
	function isiDefaultnomorLembagaPenyalur() {
	const defaultText = "74.923.02";
	document.getElementById('nomorLembagaPenyalur').value = defaultText;
	}
</script>

<script>
	function isiDefaultlokasi() {
	const defaultText = "SPBU ANDI SOSE Paccelanga";
	document.getElementById('lokasi').value = defaultText;
	}
</script>

<?php
    }
} else {
    header("location:index.php?pesan=gagal");
}
include ('../part/footer.php');
?>

</body>
</html>
