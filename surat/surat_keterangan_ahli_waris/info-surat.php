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
		tinymce.init({
		selector: '#isiSurat',
		height: 600,
		menubar: true,
		plugins: [
			'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
			'searchreplace', 'visualblocks', 'fullscreen',
			'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount', 'export'
		],
		toolbar: 'undo redo | styles | bold italic underline strikethrough forecolor backcolor | ' +
				'alignleft aligncenter alignright alignjustify | ' +
				'bullist numlist outdent indent | ' +
				'link image media table | removeformat | preview print export | code help',
		style_formats: [
			{ title: 'Judul 1', block: 'h1' },
			{ title: 'Judul 2', block: 'h2' },
			{ title: 'Paragraf', block: 'p' },
			{ title: 'Kode', inline: 'code' }
		],
		content_style: 'body { font-family: Arial, sans-serif; font-size: 14px }',
		branding: false,
		setup: function (editor) {
			editor.on('init', function () {
				const defaultText = `<p style="text-align: justify; text-indent: 30px;">
				Kami yang bertanda tangan di bawah ini, Para ahli waris dari almarhumah <strong>…………</strong> dengan sesungguhnya dan sanggup diangkat sumpah bahwa almarhumah <strong>…………</strong> yang bertempat tinggal terakhir di <strong>…………</strong> Desa/Kel <strong>…………</strong> Kecamatan <strong>…………</strong> Kabupaten <strong>…………</strong> pada tanggal <strong>…………</strong> telah meninggal dunia di <strong>…………</strong>.
				</p>

				<p style="text-align: justify; text-indent: 30px;">
				Dari hasil perkawinan almarhumah <strong>…………</strong> dengan suaminya Almarhum <strong>…………</strong> telah dilahirkan anak-anak, yakni:
				</p>

				<ol style="padding-left: 50px; text-align: justify;">
				<li>…………</li>
				<li>…………</li>
				<li>…………</li>
				<li>…………</li>
				</ol>

				<p style="text-align: justify; text-indent: 30px;">
				Demikian kami sebagai ke <strong>…………</strong> (<strong>..</strong>) orang anak adalah salah satunya ahli waris dari mendiang almarhumah <strong>…………</strong> dan Almarhum <strong>…………</strong> dan menyatakan bahwa tidak ada lagi ahli waris yang tidak dimasukkan dalam daftar ahli waris.
				</p>

				<p style="text-align: justify; text-indent: 30px;">
				Bilamana di kemudian hari surat keterangan ini tidak benar serta ada ahli waris yang disembunyikan/tidak tercantum dalam surat keterangan ini, maka segala risiko dan akibat hukum yang ditimbulkan akan ditanggung oleh para ahli waris yang tersebut dalam Surat Keterangan Ahli Waris ini.
				</p>`;


				editor.setContent(defaultText); // <- ini harus di bawah deklarasi defaultText
			});
			}
		});

		// Fungsi reset ke default
		function resetIsiSurat() {
			tinymce.get('isiSurat').setContent(defaultText);
				}
		</script>


		<script>
			// Pindahkan defaultText ke luar agar global
			const defaultText = `<!-- Awal bagian PARA AHLI WARIS -->
			<p><b>PARA AHLI WARIS TERSEBUT :</b></p>
			<table width="80%" cellspacing="0">
			<tr>
				<td width="40%">1. MARWATI (Istri Almarhum)</td>
				<td width="60%" align="right">(.....................)</td>
			</tr>
			<tr>
				<td width="40%">2. RUDI</td>
				<td width="60%" align="left">(.....................)</td>
			</tr>
			<tr>
				<td width="40%">3. RINA</td>
				<td width="60%" align="right">(.....................)</td>
			</tr>
			<tr>
				<td width="40%">4. RAHMAT</td>
				<td width="60%" align="left">(.....................)</td>
			</tr>
			</table>


			<!-- Awal bagian SAKSI-SAKSI -->
			<p align="center"><b>SAKSI - SAKSI</b></p>
			<table width="100%" cellspacing="0">
			<tr>
				<td width="50%" align="center">Kepala Lingkungan ...........<br><br><br><br></td>
				<td width="50%" align="center">Imam ...........<br><br><br><br></td>
			</tr>
			<tr>
				<td align="center" valign="bottom">...........</td>
				<td align="center" valign="bottom">...........</td>
			</tr>
			</table>
			`;

			tinymce.init({
				selector: '#isiSurat2',
				height: 600,
				menubar: true,
				plugins: [
					'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview', 'anchor',
					'searchreplace', 'visualblocks', 'fullscreen',
					'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount', 'export'
				],
				toolbar: 'undo redo | styles | bold italic underline strikethrough forecolor backcolor | ' +
						'alignleft aligncenter alignright alignjustify | ' +
						'bullist numlist outdent indent | ' +
						'link image media table | removeformat | preview print export | code help',
				style_formats: [
					{ title: 'Judul 1', block: 'h1' },
					{ title: 'Judul 2', block: 'h2' },
					{ title: 'Paragraf', block: 'p' },
					{ title: 'Kode', inline: 'code' }
				],
				content_style: 'body { font-family: Arial, sans-serif; font-size: 14px }',
				branding: false,
				setup: function (editor) {
					editor.on('init', function () {
						editor.setContent(defaultText);
					});
				}
			});

			// Fungsi reset ke default
			function resetIsiSurat2() {
				tinymce.get('isiSurat2').setContent(defaultText);
			}
		</script>


	<!-- SweetAlert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" href="../helper/form-style.css">

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

				<br><br>

				<!-- Data Informasi -->
                <h6><i class="fas fa-edit"></i> ISI SURAT</h6><hr>
				<!-- Isi Surat -->
				<div class="form-group">
					<small class="form-text text-muted mb-2">*Tahan <strong>SHIFT</strong> dan tekan <strong>ENTER</strong> untuk membuat baris baru.</small>
					<textarea id="isiSurat" name="fisi_surat" rows="8" class="form-control"></textarea>
					<button type="button" class="btn btn-warning mt-2" onclick="resetIsiSurat()">🔄 Reset ke Default</button>
				</div>

				<br>

				<!-- Data Informasi -->
                <h6><i class="fas fa-edit"></i> AHLI WARIS & SAKSI</h6><hr>
				<!-- Isi Surat -->
				<div class="form-group">
					<small class="form-text text-muted mb-2">*Tahan <strong>SHIFT</strong> dan tekan <strong>ENTER</strong> untuk membuat baris baru.</small>
					<textarea id="isiSurat2" name="fisi_surat2" rows="8" class="form-control"></textarea>
					<button type="button" class="btn btn-warning mt-2" onclick="resetIsiSurat2()">🔄 Reset ke Default</button>
				</div>


			
                <!-- Tombol -->
                <hr>
                <input type="button" class="btn btn-secondary" value="Batal" onclick="window.location.href='../../surat/surat_keterangan/'">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">

            </form>
        </div>
    </div>
</div>


<?php
    }
} else {
    header("location:index.php?pesan=gagal");
}
include ('../part/footer.php');
?>

</body>
</html>
