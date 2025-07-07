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
						           	<label class="col-sm-12" style="font-weight: 500;">NIK</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnik" class="form-control" value="<?php echo $data['nik']; ?>" readonly>
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
						           	<label class="col-sm-12" style="font-weight: 500;">Kewarganegaraan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan" class="form-control" style="text-transform: uppercase;" value="<?php echo $data['kewarganegaraan']; ?>" readonly>
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
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               <?php include ('../../surat/helper/alamat_helper.php'); ?>
						           	</div>
						        </div>
						  	</div>
						</div>
						<br>
						<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i> Formulir Surat</h6><hr width="97%">
						<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Status Nikah <br> ket petunjuk <br>a. Laki-laki : Jejaka, Duda, atau beristri ke … <br>b. Perempuan : Perawan, Janda</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fstatus_nikah1" class="form-control" placeholder="a. Laki-laki : Jejaka, Duda, atau beristri ke …" required>
						           	</div><br>
									<div class="col-sm-12">
						               	<input type="text" name="fstatus_nikah2" class="form-control" placeholder="b. Perempuan : Perawan, Janda" required>
						           	</div>
						        </div>
								<br>


						<div class="row">
							<!-- Kolom Kiri: Ayah -->
							<div class="col-sm-6">
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fnama_ayah" class="form-control" placeholder="Nama Ayah / Orang Tua / Wali" style="text-transform: capitalize;" required>
								</div>
								
								
								<style>
								.form-control.valid {
									border-color: green;
									padding-right: 2.5rem;
									background-image: url("data:image/svg+xml,%3Csvg fill='green' height='20' viewBox='0 0 24 24' width='20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M9 16.17l-3.88-3.88L4 13.41l5 5 10-10-1.41-1.41z'/%3E%3C/svg%3E");
									background-repeat: no-repeat;
									background-position: right 10px center;
									background-size: 20px 20px;
								}

								.form-control.invalid {
									border-color: red;
									animation: shake 0.3s;
								}

								.nik-msg {
									height: 18px;
									font-size: 13px;
									margin-top: 4px;
								}

								.nik-msg.error {
									color: red;
								}

								.nik-msg.success {
									color: green;
								}

								@keyframes shake {
									0% { transform: translateX(0); }
									25% { transform: translateX(-5px); }
									50% { transform: translateX(5px); }
									75% { transform: translateX(-5px); }
									100% { transform: translateX(0); }
								}
								</style>

								<div class="form-group col-sm-12" style="font-weight: 500;">
								<input type="text" name="fnik_ayah" id="fnik_ayah" class="form-control"
										placeholder="NIK" maxlength="16" style="text-transform: capitalize;"
										oninput="cekNIKAyah()" onkeypress="return hanyaAngka(event)" required>
								<div id="notif-nik-ayah" class="nik-msg"></div>
								</div>

								<script>
								function hanyaAngka(evt) {
									var charCode = (evt.which) ? evt.which : event.keyCode;
									return !(charCode > 31 && (charCode < 48 || charCode > 57));
								}

								function cekNIKAyah() {
									const input = document.getElementById("fnik_ayah");
									const msg = document.getElementById("notif-nik-ayah");
									const nik = input.value;

									if (nik.length === 0) {
									input.classList.remove('valid', 'invalid');
									msg.textContent = "";
									msg.className = "nik-msg";
									} else if (nik.length < 16) {
									input.classList.remove('valid');
									input.classList.add('invalid');
									msg.textContent = "NIK harus 16 digit.";
									msg.className = "nik-msg error";
									} else if (!/^\d{16}$/.test(nik)) {
									input.classList.remove('valid');
									input.classList.add('invalid');
									msg.textContent = "NIK hanya boleh angka.";
									msg.className = "nik-msg error";
									} else {
									input.classList.remove('invalid');
									input.classList.add('valid');
									msg.textContent = "✅ NIK valid";
									msg.className = "nik-msg success";
									}
								}
								</script>


								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="ftempat_tgl_lahir_ayah" class="form-control" placeholder="Tempat / Tgl Lahir" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fkewarganegaraan_ayah" class="form-control" placeholder="Kewarganegaraan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fagama_ayah" class="form-control" placeholder="Agama" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fpekerjaan_ayah" class="form-control" placeholder="Pekerjaan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="falamat_ayah" class="form-control" placeholder="Alamat" style="text-transform: capitalize;" required>
								</div>
							</div>

							<!-- Kolom Kanan: Ibu -->
							<div class="col-sm-6">
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fnama_ibu" class="form-control" placeholder="Nama Ibu / Orang Tua / Wali" style="text-transform: capitalize;" required>
								</div>

								<div class="form-group col-sm-12" style="font-weight: 500;">
								<input type="text" name="fnik_ibu" id="fnik_ibu" class="form-control"
										placeholder="NIK" maxlength="16" style="text-transform: capitalize;"
										oninput="cekNIKIbu()" onkeypress="return hanyaAngka(event)" required>
								<div id="notif-nik-ibu" class="nik-msg"></div>
								</div>
								<script>
								function cekNIKIbu() {
									const input = document.getElementById("fnik_ibu");
									const msg = document.getElementById("notif-nik-ibu");
									const nik = input.value;

									if (nik.length === 0) {
									input.classList.remove('valid', 'invalid');
									msg.textContent = "";
									msg.className = "nik-msg";
									} else if (nik.length < 16) {
									input.classList.remove('valid');
									input.classList.add('invalid');
									msg.textContent = "NIK harus 16 digit.";
									msg.className = "nik-msg error";
									} else if (!/^\d{16}$/.test(nik)) {
									input.classList.remove('valid');
									input.classList.add('invalid');
									msg.textContent = "NIK hanya boleh angka.";
									msg.className = "nik-msg error";
									} else {
									input.classList.remove('invalid');
									input.classList.add('valid');
									msg.textContent = "✅ NIK valid";
									msg.className = "nik-msg success";
									}
								}
								</script>

								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="ftempat_tgl_lahir_ibu" class="form-control" placeholder="Tempat / Tgl Lahir" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fkewarganegaraan_ibu" class="form-control" placeholder="Kewarganegaraan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fagama_ibu" class="form-control" placeholder="Agama" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fpekerjaan_ibu" class="form-control" placeholder="Pekerjaan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="falamat_ibu" class="form-control" placeholder="Alamat" style="text-transform: capitalize;" required>
								</div>
							</div>
						</div>

						
						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/surat_keterangan_usaha/'">
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