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
							<a class="col-sm-6"><h5><b>FORMULIR PERMOHONAN KEHENDAK NIKAH <br>(Model N2)</b></h5></a>
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
						           	<label class="col-sm-12" style="font-weight: 500;">Calon Suami </label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fcalon_suami" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama']; ?>" placeholder="Nama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Calon Istri </label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fcalon_istri" class="form-control" style="text-transform: capitalize;" placeholder="Nama" required>
						           	</div>
						        </div>
						        <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Hari / Tanggal / Jam</label>
									<small class="text-muted fst-italic d-block mb-2">&nbsp;&nbsp;&nbsp;&nbsp;Contoh : Senin / 09 Juni 2025 / Pukul 10.00 WITA</small>
						           	<div class="col-sm-12">
						               	<input type="text" name="fhari_tanggal" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Hari / Tanggal / Jam" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Akad Nikah </label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_akad" class="form-control" style="text-transform: capitalize;" placeholder="Tempat Akad" required>
						           	</div>
						        </div>
						      	<div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Surat-Surat yang diperlukan <br>
								1. Surat pengantar nikah dari Desa/Kelurahan <br>
								2. Persetujuan calon mempelai <br>
								3. Fotokopi KTP <br>
								4. Fotokopi akte kelahiran <br>
								5. Fotokopi kartu keluarga <br>
								6. Paspoto 2x3 = 3 lembar, 3x4 = 2 lembar, 4x6 = 2 lembar berlatar belakang biru <br>
								7. Fotokopi Ijazah Terakhir
								</label>
						        </div>

								<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="fdelapan" class="form-control" style="text-transform: capitalize;" placeholder="8 ..">
								</div>
								</div>
								<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="fsembilan" class="form-control" style="text-transform: capitalize;" placeholder="9 ..">
								</div>
								</div>
								<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="fsepuluh" class="form-control" style="text-transform: capitalize;" placeholder="10 ..">
								</div>
								</div>
								<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="fsebelas" class="form-control" style="text-transform: capitalize;" placeholder="11 ..">
								</div>
								</div>
								<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="fdua_belas" class="form-control" style="text-transform: capitalize;" placeholder="12 ..">
								</div>
								</div>
								<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="ftiga_belas" class="form-control" style="text-transform: capitalize;" placeholder="13 ..">
								</div>
								</div>

								
						  	</div>
						</div>
						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="history.back();">
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