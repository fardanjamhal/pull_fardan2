<?php
	include ('../../config/koneksi.php');
	include ('../part/header.php');
		 
	$nik = $_POST['fnik'];
	 
	$qCekNik = mysqli_query($connect,"SELECT * FROM penduduk WHERE nik = '$nik'");
	$row = mysqli_num_rows($qCekNik);
	 
	if($row > 0){
		$data = mysqli_fetch_assoc($qCekNik);
		if($data['nik']==$nik){
			$_SESSION['nik'] = $nik;
?>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
	.form-text.text-info {
  background: #e8f4ff;
  padding: 6px 10px;
  border-radius: 6px;
  animation: fadein 0.8s ease;
	}

	@keyframes fadein {
	from { opacity: 0; transform: translateY(-5px); }
	to { opacity: 1; transform: translateY(0); }
	}
</style>

<link rel="stylesheet" href="../helper/form-style.css">

<body class="bg-light">
	<div class="container" style="max-height:cover; padding-top:30px;  padding-bottom:60px; position:relative; min-height: 100%;">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT</h5>
					<br>
					<div class="container-fluid">
						<div class="row">
							<a class="col-sm-6"><h5><b>SURAT KETERANGAN PENGHASILAN ORANG TUA</b></h5></a>
							<a class="col-sm-6"><h5><b>NOMOR SURAT : -</b></h5></a>
						</div>
					</div>
					<hr>
					<form method="post" action="simpan-surat.php">
						<h6 class="container-fluid" align="right"><i class="fas fa-user"></i> Informasi Pribadi</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Lengkap</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjenis_kelamin" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['jenis_kelamin']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat, Tgl Lahir</label>
						           	<div class="col-sm-12">
						           		<?php
											$tgl_lhr = date($data['tgl_lahir']);
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
						               	<input type="text" name="ftempat_tgl_lahir" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['tempat_lahir'], ", ", $tgl . $blnIndo[$bln] . $thn; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['agama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['pekerjaan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik" class="form-control" value="<?php echo $data['nik']; ?>" readonly>
						           	</div>
						        </div>
						  	</div>
						  	<div class="col-sm-6">
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               <?php include ('../../surat/helper/alamat_helper.php'); ?>
						           	</div>
						        </div>
						  	</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan" class="form-control" style="text-transform: uppercase;" value="<?php echo $data['kewarganegaraan']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Informasi Formulir &nbsp;&nbsp;</h6><hr width="97%">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nomor Induk Siswa / Mahasiswa</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnomor_induk_siswa" class="form-control" style="text-transform: capitalize;" placeholder="NIS / NIM" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jurusan / Fakultas / Prodi</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjurusan_fakultas" class="form-control" style="text-transform: capitalize;" placeholder="Jurusan / Fakultas / Prodi" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Sekolah / Perguruan Tinggi</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fsekolah_perguruan_tinggi" class="form-control" style="text-transform: capitalize;" placeholder="Sekolah / Perguruan Tinggi" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kelas / Semester</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkelas_semester" class="form-control" style="text-transform: capitalize;" placeholder="Kelas / Semester" required>
						           	</div>
						        </div>
							</div>
							<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Data Ayah &nbsp;&nbsp;</h6><hr width="97%">

							<script src="../helper/helper-validasi-nik.js"></script>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">NIK Ayah</label>
								<div class="col-sm-12">
								<input type="text" name="fnik2" id="fnik2"
									class="form-control nik-input"
									placeholder="NIK"
									maxlength="16"
									oninput="validasiNIK(this)"
									onkeypress="return hanyaAngka(event)"
									required>
								<small class="form-text text-info mt-1 d-flex align-items-center">
									<i class="fa fa-info-circle mr-2 text-primary"></i>
									Isi NIK untuk mengambil data otomatis istri dari database.
								</small>
								</div>
							</div>
							</div>
							
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Ayah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_ayah" id="fnama_ayah" class="form-control" style="text-transform: capitalize;" placeholder="Nama Ayah" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat / Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftgl_lahir2" id="ftgl_lahir2" class="form-control" style="text-transform: capitalize;" placeholder="Tempat / Tanggal Lahir" required>
						           	</div>
						        </div>
							</div>

							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
								<div class="col-sm-12">
								<select name="fjenis_kelamin2" id="fjenis_kelamin2" class="form-control" required>
									<option value="" disabled selected>Pilih Jenis Kelamin</option>
									<option value="LAKI-LAKI">LAKI-LAKI</option>
									<option value="PEREMPUAN">PEREMPUAN</option>
								</select>
								</div>
							</div>
							</div>

							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama2" id="fagama2" class="form-control" style="text-transform: capitalize;" placeholder="Agama" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan2" id="fpekerjaan2" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat2" id="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Alamat" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">Penghasilan Ayah</label>
								<div class="col-sm-12">
									<input type="text" name="fpenghasilan_ayah" id="penghasilan_ayah" class="form-control" placeholder="Penghasilan Ayah" required>
									<small id="terbilang_ayah" class="form-text text-muted"></small>
								</div>
								</div>
							</div>
							<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Data Ibu &nbsp;&nbsp;</h6><hr width="97%">

							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">NIK Ibu</label>
								<div class="col-sm-12">
								<input type="text" name="fnik3" id="fnik3"
									class="form-control nik-input"
									placeholder="NIK"
									maxlength="16"
									oninput="validasiNIK(this)"
									onkeypress="return hanyaAngka(event)"
									required>
								<small class="form-text text-info mt-1 d-flex align-items-center">
									<i class="fa fa-info-circle mr-2 text-primary"></i>
									Isi NIK untuk mengambil data otomatis istri dari database.
								</small>
								</div>
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
									$('#fnama_ayah').val(res.data.nama);
									$('#ftgl_lahir2').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fjenis_kelamin2').val(res.data.jenis_kelamin);
									$('#fagama2').val(res.data.agama);
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

							$('#fnik_ayah').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama_ayah').val('');
								$('#ftgl_lahir2').val('');
								$('#fjenis_kelamin2').val('');
								$('#fagama2').val('');
								$('#fpekerjaan2').val('');
								$('#falamat2').val('');
							}
							});
							</script>

							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama Ibu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_ibu" id="fnama_ibu" class="form-control" style="text-transform: capitalize;" placeholder="Nama Ayah" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat / Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftgl_lahir3" id="ftgl_lahir3" class="form-control" style="text-transform: capitalize;" placeholder="Tempat / Tanggal Lahir" required>
						           	</div>
						        </div>
							</div>

							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
								<div class="col-sm-12">
								<select name="fjenis_kelamin3" id="fjenis_kelamin3" class="form-control" required>
									<option value="" disabled selected>Pilih Jenis Kelamin</option>
									<option value="LAKI-LAKI">LAKI-LAKI</option>
									<option value="PEREMPUAN">PEREMPUAN</option>
								</select>
								</div>
							</div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Agama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama3" id="fagama3" class="form-control" style="text-transform: capitalize;" placeholder="Agama" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan3" id="fpekerjaan3" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat3" id="falamat3" class="form-control" style="text-transform: capitalize;" placeholder="Alamat" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Penghasilan Ibu</label>
							<div class="col-sm-12">
								<input type="text" name="fpenghasilan_ibu" id="penghasilan_ibu" class="form-control" placeholder="Penghasilan Ibu" required>
								<small id="terbilang_ibu" class="form-text text-muted"></small>
							</div>
							</div>
							</div>

							<script>
							$('#fnik3').on('blur', function () {
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
									$('#fnama_ibu').val(res.data.nama);
									$('#ftgl_lahir3').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fjenis_kelamin3').val(res.data.jenis_kelamin);
									$('#fagama3').val(res.data.agama);
									$('#fpekerjaan3').val(res.data.pekerjaan);
									$('#falamat3').val(res.data.alamat);
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

							$('#fnik_ayah').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama_ibu').val('');
								$('#ftgl_lahir3').val('');
								$('#fjenis_kelamin3').val('');
								$('#fagama3').val('');
								$('#fpekerjaan3').val('');
								$('#falamat3').val('');
							}
							});
							</script>

						</div>
						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/surat_keterangan_domisili_usaha/'">
		                	<input type="submit" name="submit" class="btn btn-info" value="Submit">
		              	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
  function handlePenghasilan(inputId, terbilangId) {
    const input = document.getElementById(inputId);
    const output = document.getElementById(terbilangId);

    // Fokus: hapus format saat user mengetik
    input.addEventListener('focus', function () {
      let val = this.value.replace(/[^0-9]/g, '');
      this.value = val;
    });

    // Blur: format ke Rp dan tampilkan terbilang
    input.addEventListener('blur', function () {
      let angka = this.value.replace(/[^0-9]/g, '');
      if (!angka) {
        this.value = '';
        output.textContent = '';
        return;
      }
      let formatted = new Intl.NumberFormat('id-ID').format(angka);
      this.value = 'Rp. ' + formatted + ',-';
      output.textContent = terbilang(parseInt(angka)) + ' Rupiah';
    });
  }

  // Panggil untuk setiap input
  handlePenghasilan('penghasilan_ayah', 'terbilang_ayah');
  handlePenghasilan('penghasilan_ibu', 'terbilang_ibu');

  function terbilang(n) {
    const angka = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
    if (n < 12) return angka[n];
    else if (n < 20) return angka[n - 10] + " Belas";
    else if (n < 100) return angka[Math.floor(n / 10)] + " Puluh " + terbilang(n % 10);
    else if (n < 200) return "Seratus " + terbilang(n - 100);
    else if (n < 1000) return angka[Math.floor(n / 100)] + " Ratus " + terbilang(n % 100);
    else if (n < 2000) return "Seribu " + terbilang(n - 1000);
    else if (n < 1000000) return terbilang(Math.floor(n / 1000)) + " Ribu " + terbilang(n % 1000);
    else if (n < 1000000000) return terbilang(Math.floor(n / 1000000)) + " Juta " + terbilang(n % 1000000);
    else return "Terlalu besar";
  }
</script>


<?php 
		}
	}else{
		header("location:index.php?pesan=gagal");
	}

	include ('../part/footer.php');
?>