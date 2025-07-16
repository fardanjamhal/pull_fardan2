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

<body class="bg-light">
	<div class="container" style="max-height:cover; padding-top:30px;  padding-bottom:60px; position:relative; min-height: 100%;">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<h5 class="card-header"><i class="fas fa-envelope"></i> INFORMASI SURAT</h5>
					<br>
					<div class="container-fluid">
						<div class="row">
							<a class="col-sm-6"><h5><b>FORMULIR SURAT IZIN ORANG TUA<br>(Model N5)</b></h5></a>
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
						</div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Surat</h6><hr width="97%">

						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: bold;">Pemohon (Anak) Bin/Binti*</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin" id="fbin" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama_ayah']; ?>" placeholder="Bin/Binti*" required>
						           	</div>
						        </div>
						  	</div>
						</div><br><br>


						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: bold;">Ayah/wali/pengampu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" id="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="1. Nama lengkap dan alias" required>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin1" id="fbin1" class="form-control" style="text-transform: capitalize;" placeholder="2. Bin" required>
						           	</div>
						        </div>

								<div class="form-group mb-3">
								<div class="col-sm-12">
									<input type="text" name="fnik1" id="fnik1"
									class="form-control nik-input"
									placeholder="3. NIK"
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
								</div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir1" id="ftempat_tgl_lahir1" class="form-control" style="text-transform: capitalize;" placeholder="4. Tempat dan tanggal lahir" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan1" id="fkewarganegaraan1" class="form-control" style="text-transform: capitalize;" placeholder="5. Kewarganegaraan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" id="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="6. Agama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan1" id="fpekerjaan1" class="form-control" style="text-transform: capitalize;" placeholder="7. Pekerjaan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat1" id="falamat1" class="form-control" style="text-transform: capitalize;" placeholder="8. Alamat" required>
						           	</div>
						        </div>
						  	</div>
						</div><br><br>

						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: bold;">Ibu/wali/pengampu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama2" id="fnama2" class="form-control" style="text-transform: capitalize;" placeholder="1. Nama lengkap dan alias" required>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin2" id="fbin2" class="form-control" style="text-transform: capitalize;" placeholder="2. Bin" required>
						           	</div>
						        </div>

								<div class="form-group mb-3">
								<div class="col-sm-12">
									<input type="text" name="fnik2" id="fnik2"
									class="form-control nik-input" placeholder="3. Nomor Induk Kependudukan"
									maxlength="16" oninput="validasiNIK(this)" onkeypress="return hanyaAngka(event)" required>
								</div>
								</div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir2" id="ftempat_tgl_lahir2" class="form-control" style="text-transform: capitalize;" placeholder="4. Tempat dan tanggal lahir" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan2" id="fkewarganegaraan2" class="form-control" style="text-transform: capitalize;" placeholder="5. Kewarganegaraan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama2" id="fagama2" class="form-control" style="text-transform: capitalize;" placeholder="6. Agama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan2" id="fpekerjaan2" class="form-control" style="text-transform: capitalize;" placeholder="7. Pekerjaan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat2" id="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="8. Alamat" required>
						           	</div>
						        </div>
						  	</div>
						</div><br><br>
						

						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: bold;">Ayah dan ibu kandung/wali/pengampu dari</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama3" id="fnama3" class="form-control" style="text-transform: capitalize;" placeholder="1. Nama lengkap dan alias" required>
						           	</div>
						        </div>
						  	</div>
						</div>
						<div class="row">
						  	<div class="col-sm-12">
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin3" id="fbin3" class="form-control" style="text-transform: capitalize;" placeholder="2. Bin" required>
						           	</div>
						        </div>

								<div class="form-group mb-3">
								<div class="col-sm-12">
									<input type="text" name="fnik3" id="fnik3"
									class="form-control nik-input" placeholder="3. Nomor Induk Kependudukan"
									maxlength="16" oninput="validasiNIK(this)" onkeypress="return hanyaAngka(event)" required>
								</div>
								</div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir3" id="ftempat_tgl_lahir3" class="form-control" style="text-transform: capitalize;" placeholder="4. Tempat dan tanggal lahir" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan3" id="fkewarganegaraan3" class="form-control" style="text-transform: capitalize;" placeholder="5. Kewarganegaraan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama3" id="fagama3" class="form-control" style="text-transform: capitalize;" placeholder="6. Agama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan3" id="fpekerjaan3" class="form-control" style="text-transform: capitalize;" placeholder="7. Pekerjaan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat3" id="falamat3" class="form-control" style="text-transform: capitalize;" placeholder="8. Alamat" required>
						           	</div>
						        </div>
						  	</div>
						</div>

						<!-- jQuery wajib -->
						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						<script>
							$('#fnik1').on('blur', function () {
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
									$('#fnama1').val(res.data.nama);
									$('#fbin1').val(res.data.nama_ayah);
									$('#ftempat_tgl_lahir1').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fkewarganegaraan1').val(res.data.kewarganegaraan);
									$('#fagama1').val(res.data.agama);
									$('#fpekerjaan1').val(res.data.pekerjaan);
									$('#falamat1').val(res.data.alamat);
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

							$('#fnik1').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama1').val('');
								$('#fbin1').val('');
								$('#ftempat_tgl_lahir1').val('');
								$('#fkewarganegaraan1').val('');
								$('#fagama1').val('');
								$('#fpekerjaan1').val('');
								$('#falamat1').val('');
							}
							});
							</script>

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
									$('#fbin2').val(res.data.nama_ayah);
									$('#ftempat_tgl_lahir2').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fkewarganegaraan2').val(res.data.kewarganegaraan);
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

							$('#fnik2').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama2').val('');
								$('#fbin2').val('');
								$('#ftempat_tgl_lahir2').val('');
								$('#fkewarganegaraan2').val('');
								$('#fagama2').val('');
								$('#fpekerjaan2').val('');
								$('#falamat2').val('');
							}
							});
							</script>

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
									$('#fnama3').val(res.data.nama);
									$('#fbin3').val(res.data.nama_ayah);
									$('#ftempat_tgl_lahir3').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fkewarganegaraan3').val(res.data.kewarganegaraan);
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

							$('#fnik3').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama3').val('');
								$('#fbin3').val('');
								$('#ftempat_tgl_lahir3').val('');
								$('#fkewarganegaraan3').val('');
								$('#fagama3').val('');
								$('#fpekerjaan3').val('');
								$('#falamat3').val('');
							}
							});
							</script>

						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/formulir_surat_izin_orang_tua/'">
		                	<input type="submit" name="submit" class="btn btn-info" value="Submit">
		              	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

<?php 
		}
	}else{
		header("location:index.php?pesan=gagal");
	}

	include ('../part/footer.php');
?>