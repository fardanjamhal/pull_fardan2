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
							<h6 class="container-fluid" align="right"><i class="fas fa-edit"></i>Formulir Surat&nbsp;&nbsp;&nbsp;</h6><hr width="97%">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">KEPERLUAN</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkeperluan" class="form-control" style="text-transform: capitalize;" placeholder="Keperluan" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NO. KARTU KIS</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno_kartu" class="form-control" style="text-transform: capitalize;" placeholder="No. Kartu KIS" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">NAMA DI KARTU</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama_di_kartu" class="form-control" style="text-transform: capitalize;" placeholder="Nama" required>
						           	</div>
						        </div>
							</div>

							<style>
							input.is-valid {
								border: 2px solid #28a745;
							}

							input.is-invalid {
								border: 2px solid #dc3545;
							}

							.shake {
								animation: shake 0.3s;
							}

							@keyframes shake {
								0%   { transform: translateX(0); }
								25%  { transform: translateX(-4px); }
								50%  { transform: translateX(4px); }
								75%  { transform: translateX(-4px); }
								100% { transform: translateX(0); }
							}
							</style>

						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">NIK</label>
							<div class="col-sm-12">
							<input type="text" name="fnik2" id="fnik2"
								class="form-control nik-input"
								placeholder="NIK"
								maxlength="16"
								oninput="validasiNIK(this)"
								onkeypress="return hanyaAngka(event)" required>
							</div>
						</div>
						</div>


						<script>
						const nikShakeFlags = {};

						function hanyaAngka(evt) {
							const charCode = evt.which ? evt.which : event.keyCode;
							return !(charCode > 31 && (charCode < 48 || charCode > 57));
						}

						function validasiNIK(input) {
							const id = input.id;
							const nik = input.value.trim();

							if (nik.length === 16) {
							input.classList.remove('is-invalid');
							input.classList.add('is-valid');
							} else {
							input.classList.remove('is-valid');
							input.classList.add('is-invalid');

							// Hanya shake saat input baru mulai diketik (panjang 1 digit)
							if (nik.length === 1 && !nikShakeFlags[id]) {
								input.classList.add('shake');
								nikShakeFlags[id] = true; // Tandai sudah shake
								setTimeout(() => input.classList.remove('shake'), 300);
							}
							}
						}
						</script>




							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat di Kartu</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Alamat" required>
						           	</div>
						        </div>
							</div>
						
							<div class="col-sm-6">
							<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Tanggal Lahir</label>
							<div class="col-sm-12">
								<input type="date" id="tanggal_lahir" name="ftanggal_lahir" class="form-control" required>
							</div>
							</div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">FASKES TINGKAT I</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ffaskes_tingkat" class="form-control" style="text-transform: capitalize;" placeholder="Faskes Tingkat I" required>
						           	</div>
						        </div>
							</div>
						</div>
						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/surat_keterangan_beda_identitas/'">
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