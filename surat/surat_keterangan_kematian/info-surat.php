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
							<?php
							$url = basename(__DIR__); // contoh: formulir_pengantar_nikah
							$judul = strtoupper(str_replace('_', ' ', $url));
							?>
							<a class="col-sm-6">
							<h5><b><?= $judul; ?></b></h5>
							</a>

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
							<h6 class="container-fluid" align="right" style="padding-right: 25px;"><i class="fas fa-edit"></i>Formulir Surat</h6><hr width="97%">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Telah meninggal dunia pada:</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftanggal_meninggal" class="form-control" style="text-transform: capitalize;" placeholder="Hari / Tanggal / Jam" required>
						           	</div>
									<br>
									<div class="col-sm-12">
						               	<input type="text" name="fbertempat_di" class="form-control" style="text-transform: capitalize;" placeholder="Bertempat di" required>
						           	</div>
									<br>
									<div class="col-sm-12">
						               	<input type="text" name="fpenyebab_kematian" class="form-control" style="text-transform: capitalize;" placeholder="Penyebab Kematian" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
									<label class="col-sm-12" style="font-weight: 500;">Pelapor:</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_pelapor" id="fnama_pelapor" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
						           	</div>
									<br>

									<div class="form-group mb-3">
									<div class="col-sm-12">
										<input type="text" name="fnik_pelapor" id="fnik_pelapor"
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
									</div>

									<br>
									<div class="col-sm-12">
						               	<input type="text" name="ftanggal_lahir_pelapor" id="ftanggal_lahir_pelapor" class="form-control" style="text-transform: capitalize;" placeholder="Tanggal Lahir" required>
						           	</div>
									<br>
									<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan_pelapor" id="fpekerjaan_pelapor" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" required>
						           	</div>
									<br>
									<div class="col-sm-12">
						               	<input type="text" name="falamat_pelapor" id="falamat_pelapor" class="form-control" style="text-transform: capitalize;" placeholder="Alamat / Tempat Tinggal" required>
						           	</div>
									<br>
									<div class="col-sm-12">
						               	<input type="text" name="fhubungan_pelapor" id="fhubungan_pelapor" class="form-control" style="text-transform: capitalize;" placeholder="Hubungan dengan yang mati" required>
						           	</div>
						        </div>
							</div>
						</div>

						<!-- jQuery wajib -->
							<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
							<script>
							$('#fnik_pelapor').on('blur', function () {
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
									$('#fnama_pelapor').val(res.data.nama);
									$('#ftanggal_lahir_pelapor').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
									$('#fpekerjaan_pelapor').val(res.data.pekerjaan);
									$('#falamat_pelapor').val(res.data.alamat);
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

							$('#fnik_pelapor').on('input', function () {
							var nik = $(this).val().trim();

							// Jika NIK dikosongkan, kosongkan juga semua isian terkait
							if (nik === '') {
								$('#fnama_pelapor').val('');
								$('#ftanggal_lahir_pelapor').val('');
								$('#fpekerjaan_pelapor').val('');
								$('#falamat_pelapor').val('');
							}
							});

							</script>


						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/surat_keterangan_kematian/'">
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