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
		const defaultText = `<p style="text-align: justify;">
		Setelah dilakukan mediasi secara kekeluargaan yang bertempat di Kantor ................  terkait hutang antara Pihak Pertama dan Pihak Kedua, maka disepakati hal-hal sebagai berikut:
		</p>

		<ol style="padding-left: 20px; text-align: justify;">
		<li>
			Pihak Kedua bersedia membayarkan pinjaman pokok paling lambat pada tanggal 30 Oktober 2025 sebesar Rp5.000.000,- (lima juta rupiah).
		</li>
		<li>
			Pihak Kedua berjanji akan membayarkan bunga pinjaman setiap tanggal 1, dimulai pada bulan November 2025, sebesar Rp200.000,- (dua ratus ribu rupiah) per bulan, atas sisa pinjaman sebesar Rp32.236.000,- (tiga puluh dua juta dua ratus tiga puluh enam ribu rupiah).
		</li>
		<li>
			Pihak Kedua berjanji akan menaati seluruh kesepakatan yang telah dibuat, dan apabila melanggarnya, maka bersedia dituntut sesuai dengan hukum dan ketentuan peraturan perundang-undangan yang berlaku di Negara Kesatuan Republik Indonesia.
		</li>
		</ol>

		<p style="text-align: justify;">
		Demikian Surat Pernyataan Kesepakatan Bersama ini dibuat tanpa adanya paksaan atau intimidasi dari pihak manapun. Apabila di kemudian hari isi pernyataan ini tidak benar, maka kami bersedia untuk dituntut sesuai dengan hukum yang berlaku.
		</p>`;


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
                <h6><i class="fas fa-edit"></i> DATA PIHAK KE 2</h6><hr>

				<div class="row">
							<!-- Kolom Kiri: Ayah -->
								<div class="col-sm-12">

								<div class="mb-3">
									<input type="text" name="fnama2" id="fnama2" class="form-control" placeholder="Nama" style="text-transform: capitalize;" required>
								</div>
								<div class="mb-3">
									<input type="text" name="fumur2" id="fumur2" class="form-control" placeholder="Umur" style="text-transform: capitalize;" required>
								</div>
								<div class="mb-3">
									<input type="text" name="fpekerjaan2" id="fpekerjaan2" class="form-control" placeholder="Pekerjaan" style="text-transform: capitalize;" required>
								</div>
								<div class="mb-3">
									<input type="text" name="fagama2" id="fagama2" class="form-control" placeholder="Agama" style="text-transform: capitalize;" required>
								</div>
								<div class="mb-3">
									<input type="text" name="falamat2" id="falamat2" class="form-control" placeholder="Alamat" style="text-transform: capitalize;" required>
								</div>
								</div>
						</div>

				<br>
				<!-- Dasar Hukum -->
				<div class="form-group">
					<label>ISI SURAT</label>
					<small class="form-text text-muted mb-2">*Tahan <strong>SHIFT</strong> dan tekan <strong>ENTER</strong> untuk membuat baris baru.</small>
					<textarea id="isiSurat" name="fisi_surat" rows="8" class="form-control"></textarea>
					<button type="button" class="btn btn-warning mt-2" onclick="resetIsiSurat()">🔄 Reset ke Default</button>
				</div>

                <br>

				<div class="form-group">
					<label>Nama Saksi</label>
					<div id="saksi-container"></div>
					<button type="button" class="btn btn-sm btn-primary mt-2" onclick="tambahSaksi()">➕ Tambah Saksi</button>
					</div>

					<script>
					let jumlahSaksi = 0;
					const maxSaksi = 4;

					function tambahSaksi() {
						if (jumlahSaksi >= maxSaksi) {
						alert("Maksimal 4 saksi.");
						return;
						}

						jumlahSaksi++;

						const container = document.getElementById("saksi-container");

						const div = document.createElement("div");
						div.className = "form-row align-items-center mb-2";
						div.id = `saksi-${jumlahSaksi}`;

						div.innerHTML = `
						<div class="col-auto">
							<span>${jumlahSaksi}.</span>
						</div>
						<div class="col">
							<input type="text" name="saksi[]" class="form-control form-control-sm" placeholder="Nama Saksi ${jumlahSaksi}" required>
						</div>
						<div class="col-auto">
							<button type="button" class="btn btn-sm btn-danger" onclick="hapusSaksi(${jumlahSaksi})">🗑️</button>
						</div>
						`;

						container.appendChild(div);
					}

					function hapusSaksi(no) {
						const el = document.getElementById(`saksi-${no}`);
						if (el) {
						el.remove();
						jumlahSaksi--;
						perbaruiNomorSaksi();
						}
					}

					function perbaruiNomorSaksi() {
						const container = document.getElementById("saksi-container");
						const items = container.querySelectorAll(".form-row");

						jumlahSaksi = items.length;

						items.forEach((item, index) => {
						item.id = `saksi-${index + 1}`;
						item.querySelector("span").textContent = `${index + 1}.`;
						item.querySelector("input").placeholder = `Nama Saksi ${index + 1}`;
						});
					}
					</script>


				<br>
			
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
