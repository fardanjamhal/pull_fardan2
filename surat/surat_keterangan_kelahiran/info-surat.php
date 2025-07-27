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
						
						<h6><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-edit"></i>&nbsp;Formulir Surat</h6><hr width="97%">
						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Nama Bayi</label>
							<div class="col-sm-12">
							<div class="input-group">
								<input type="text" id="fnama_bayi" name="fnama_bayi" class="form-control" placeholder="Nama Bayi" required>
							</div>
							</div>
						</div>
						</div>

						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Tempat Tanggal Lahir</label>
							<div class="col-sm-12">
							<div class="input-group">
								<input type="text" id="fttl_bayi" name="fttl_bayi" class="form-control" placeholder="Contoh : Jeneponto, 22 Juni 2022" required>
							</div>
							</div>
						</div>
						</div>

						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Jenis Kelamin</label>
							<div class="col-sm-12">
							<select name="fjenis_kelamin_bayi" id="fjenis_kelamin_bayi" class="form-control" required>
								<option value="">-- Pilih Jenis Kelamin --</option>
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
							</div>
						</div>
						</div>

						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Agama</label>
							<div class="col-sm-12">
							<select name="fagama_bayi" id="fagama_bayi" class="form-control" required>
								<option value="">-- Pilih Agama --</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katolik">Katolik</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
								<option value="Konghucu">Konghucu</option>
								<option value="Lainnya">Lainnya</option>
							</select>
							</div>
						</div>
						</div>

						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
							<div class="col-sm-12">
							<div class="input-group">
								<input type="text" id="falamat_bayi" name="falamat_bayi" class="form-control" placeholder="Alamat" required>
							</div>
							</div>
						</div>
						</div>

						<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Nama Ayah</label>
							<div class="col-sm-12">
							<div class="input-group">
								<input type="text" id="fnama_ayah" name="fnama_ayah" class="form-control" placeholder="Nama Ayah" required>
							</div>
							</div>
						</div>
						</div>

						<div class="col-sm-12">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Nama Ibu</label>
							<div class="col-sm-12">
							<div class="input-group">
								<input type="text" id="fnama_ibu" name="fnama_ibu" class="form-control" placeholder="Nama Ibu" required>
							</div>
							</div>
						</div>
						</div>


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

<?php 
		}
	}else{
		header("location:index.php?pesan=gagal");
	}

	include ('../part/footer.php');
?>