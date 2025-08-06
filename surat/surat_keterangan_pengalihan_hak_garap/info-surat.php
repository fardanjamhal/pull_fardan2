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
		const defaultText = `
		<div style="font-size:10.5pt; margin:0; padding:0;">
		Selaku PIHAK PERTAMA yang menguasai sebidang tanah yang terletak di Lingkungan/Dusun ……………, Kelurahan/Desa……………………, Kecamatan ……………………., Kabupaten Jeneponto, seluas ……………. M2 dengan NOP PBB …………………………………………. dengan batas-batas sebagai berikut :
		</div>
		`;

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

	<script>
		const defaultText2 = `
		<div align="justify" style="font-size:10.5pt; margin:0; padding:0;">
		<strong><u>Selanjutnya disebut PIHAK KEDUA</u></strong> atau pihak menerima penyerahan penguasaan atas sebidang tanah;<br>
		Hal-hal sebagai berikut :<br>
		<ol type="a" style="margin:0;padding-left:18px">
		<li>PIHAK PERTAMA dengan ini mengalihkan hak dan kepentingan atas bidang tanah tersebut, serta benda-benda yang ada di atasnya kepada PIHAK KEDUA dengan cara memberikan/pengalihan hak garap kepada PIHAK PERTAMA;</li>
		<li>Pengalihan penguasaan segala hak dan kepentingan di atas sebidang tanah beserta benda-benda yang ada di atasnya sebagaimana tersebut pada butir (a) yang disepakati dan ditetapkan oleh kedua belah pihak, baik PIHAK PERTAMA maupun PIHAK KEDUA dengan cara memberikan/pengalihan hak garap;</li>
		<li>PIHAK PERTAMA menjamin kepada PIHAK KEDUA bahwa tanah tersebut tidak dalam jaminan dan tidak tersangkut dengan suatu perkara atau sengketa dengan pihak lain;</li>
		<li>Tanda Tangan Para Saksi sekaligus merupakan pernyataan para saksi.</li>
		</ol>
		Demikian Surat Pernyataan ini dibuat untuk dipergunakan sebagaimana mestinya.
		</div>
		`;

		tinymce.init({
			selector: '#isiSurat2',
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
					editor.setContent(defaultText2); // Tampilkan default saat pertama kali load
				});
			}
		});

		// Fungsi reset ke default
		function resetIsiSurat2() {
			tinymce.get('isiSurat2').setContent(defaultText2);
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

				<br>
				<!-- Dasar Hukum -->
                <div class="form-group">
                    <label>ISI SURAT</label>
                    <textarea id="isiSurat" name="fisi_surat" rows="8" class="form-control"></textarea>
                    <button type="button" class="btn btn-warning mt-2" onclick="resetIsiSurat()">🔄 Reset ke Default</button>
                </div>

                <br>

				<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-10 col-lg-8">
									<div class="row form-pembatas-tanah">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_utara">SEBELAH UTARA <br>
												</label>
												<input type="text" name="ftanah_utara" id="ftanah_utara" class="form-control"
													style="text-transform: capitalize;" placeholder="Nama Pemilik" required>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_timur">SEBELAH TIMUR <br>
												</label>
												<input type="text" name="ftanah_timur" id="ftanah_timur" class="form-control"
													style="text-transform: capitalize;" placeholder="Nama Pemilik" required>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_selatan">SEBELAH SELATAN <br>
												</label>
												<input type="text" name="ftanah_selatan" id="ftanah_selatan" class="form-control"
													style="text-transform: capitalize;" placeholder="Nama Pemilik" required>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_barat">SEBELAH BARAT <br>
												</label>
												<input type="text" name="ftanah_barat" id="ftanah_barat" class="form-control"
													style="text-transform: capitalize;" placeholder="Nama Pemilik" required>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


                <!-- Data Informasi -->
                <h6><i class="fas fa-edit"></i> DATA PIHAK KE 2</h6><hr>

				<div class="row">
							<!-- Kolom Kiri: Ayah -->
								<div class="col-sm-12">
								<script src="../../helper/helper-validasi-nik.js"></script>

								<div class="mb-3">
									<input type="text" name="fnik2" id="fnik2"
									class="form-control nik-input"
									placeholder="NIK"
									maxlength="16"
									oninput="validasiNIK(this)"
									onkeypress="return hanyaAngka(event)"
									required>
									
									<!-- Tambahkan alert info di bawah input -->
									<small class="form-text text-info mt-1" style="display: flex; align-items: center;">
									<i class="fa fa-info-circle mr-2 text-primary"></i>
									Isi NIK untuk mengambil data otomatis istri dari database.
									</small>
								</div>

								<div class="mb-3">
									<input type="text" name="fnama2" id="fnama2" class="form-control" placeholder="Nama" style="text-transform: capitalize;" required>
								</div>

								<div class="mb-3">
									<input type="text" name="ftempat_tgl_lahir2" id="ftempat_tgl_lahir2" class="form-control" placeholder="Tempat / Tgl Lahir" style="text-transform: capitalize;" required>
								</div>
								<div class="mb-3">
									<input type="text" name="fpekerjaan2" id="fpekerjaan2" class="form-control" placeholder="Pekerjaan" style="text-transform: capitalize;" required>
								</div>
								<div class="mb-3">
									<input type="text" name="falamat2" id="falamat2" class="form-control" placeholder="Alamat" style="text-transform: capitalize;" required>
								</div>
								</div>

							<!-- jQuery wajib -->
							<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

							<script>
							$('#fnik2').on('blur', function () {
							var nik = $(this).val().trim();
							if (nik.length === 16) {

								// Tampilkan animasi loading
								Swal.fire({
								title: 'Memeriksa NIK...',
								text: 'Mohon tunggu sebentar',
								allowOutsideClick: false,
								didOpen: () => {
									Swal.showLoading();
								}
								});

								$.ajax({
								url: '../helper/check_nik.php',
								type: 'POST',
								data: { nik: nik },
								dataType: 'json',
								success: function (res) {
									Swal.close(); // Tutup loading

									if (res.success) {
									$('#fnama2').val(res.data.nama);
									$('#ftempat_tgl_lahir2').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fpekerjaan2').val(res.data.pekerjaan);
									$('#falamat2').val(res.data.alamat);
									} else {
									Swal.fire({
										icon: 'warning',
										title: 'NIK Tidak Ditemukan',
										text: 'NIK yang Anda masukkan tidak ada dalam data penduduk.',
										confirmButtonText: 'Tutup'
									});
									}
								},
								error: function () {
									Swal.close(); // Tutup loading jika error

									Swal.fire({
									icon: 'error',
									title: 'Kesalahan Server',
									text: 'Gagal mengambil data. Coba beberapa saat lagi.',
									confirmButtonText: 'Tutup'
									});
								}
								});
							}
							});

							$('#fnik2').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama2').val('');
								$('#ftempat_tgl_lahir2').val('');
								$('#fpekerjaan2').val('');
								$('#falamat2').val('');
							}
							});
							</script>
						</div>
						<br>
				
				<br>
				<!-- Dasar Hukum -->
                <div class="form-group">
                    <label>ISI SURAT Ke 2</label>
                    <textarea id="isiSurat2" name="fisi_surat2" rows="8" class="form-control"></textarea>
                    <button type="button" class="btn btn-warning mt-2" onclick="resetIsiSurat2()">🔄 Reset ke Default</button>
                </div>

				<br>

			<table width="100%" border="0" cellspacing="10" cellpadding="0">
				<tr>
					<!-- Kolom Saksi 1 -->
					<td width="50%" valign="top">
					<b>Saksi 1</b>
					<table>
						<tr>
						<td width="2%">Nama</td>
						<td width="48%"><input type="text" name="nama_saksi1" size="35"></td>
						</tr>
						<tr>
						<td>Umur</td>
						<td><input type="number" name="umur_saksi1" size="10"></td>
						</tr>
						<tr>
						<td>Alamat</td>
						<td><textarea name="alamat_saksi1" rows="2" cols="35"></textarea></td>
						</tr>
						<tr>
						<td>Pekerjaan</td>
						<td><input type="text" name="pekerjaan_saksi1" size="35"></td>
						</tr>
					</table>
					</td>

					<!-- Kolom Saksi 2 -->
					<td width="50%" valign="top">
					<b>Saksi 2</b>
					<table>
						<tr>
						<td width="2%">Nama</td>
						<td width="48%"><input type="text" name="nama_saksi2" size="35"></td>
						</tr>
						<tr>
						<td>Umur</td>
						<td><input type="number" name="umur_saksi2" size="10"></td>
						</tr>
						<tr>
						<td>Alamat</td>
						<td><textarea name="alamat_saksi2" rows="2" cols="35"></textarea></td>
						</tr>
						<tr>
						<td>Pekerjaan</td>
						<td><input type="text" name="pekerjaan_saksi2" size="35"></td>
						</tr>
					</table>
					</td>
				</tr>
				</table>

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
