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
							<a class="col-sm-6"><h5><b>SURAT KETERANGAN MAHAR (SUNRANG)</b></h5></a>
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
						<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> INFORMASI MAHAR (SUNRANG)</h6><hr width="97%">
						<div class="row px-3">
						<div class="col-sm-12">
							<div class="form-group">
							<label for="fmahar" style="font-weight: 500;">MAHAR <br>
							<h7>Contoh : <br>Emas  dengan Berat 2 Gram <br>Tanah kering seluas ± 5 Are  </h7>
							</label>
							<input type="text" name="fmahar" id="fmahar" class="form-control" style="text-transform: capitalize;" placeholder="Emas / Tanah atau lain lain" required>
							</div>
						</div>
						<div class="col-sm-12">
							<br>
							<div class="form-group">
							<label for="ftempat_mahar" style="font-weight: 500;">TEMPAT / LOKASI TANAH <br>
							<h7>Contoh : <br>Dusun Macciniayo  Desa Bontomanai  Kecamatan Rumbia Kabupaten Jeneponto</h7></label>
							<input type="text" name="ftempat_mahar" id="ftempat_mahar" class="form-control" style="text-transform: capitalize;" placeholder="Dusun Desa Kecamatan Kabupaten" required>
							</div>
						</div>
						
						<div class="col-sm-12 text-center">
							<small class="text-muted"><em>*Isi jika mahar berupa tanah, kosongkan jika bukan tanah</em></small>
						</div>
						<style>
							.form-pembatas-tanah {
								background-color: #f3f9ff;
								border: 1px solid #007bff;
								border-radius: 8px;
								padding: 20px;
							}

							.form-pembatas-tanah label {
								font-weight: 500;
							}

							.form-pembatas-tanah h7 {
								font-style: italic;
								color: #555;
							}
						</style>

						<div class="container">
							<div class="row justify-content-center">
								<div class="col-md-10 col-lg-8">
									<div class="row form-pembatas-tanah">
										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_utara">SEBELAH UTARA <br>
													<h7>Contoh : Tanah Milik NAMA</h7>
												</label>
												<input type="text" name="ftanah_utara" id="ftanah_utara" class="form-control"
													style="text-transform: capitalize;" placeholder="Tanah Milik NAMA">
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_timur">SEBELAH TIMUR <br>
													<h7>Contoh : Tanah Milik NAMA</h7>
												</label>
												<input type="text" name="ftanah_timur" id="ftanah_timur" class="form-control"
													style="text-transform: capitalize;" placeholder="Tanah Milik NAMA">
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_selatan">SEBELAH SELATAN <br>
													<h7>Contoh : Tanah Milik NAMA</h7>
												</label>
												<input type="text" name="ftanah_selatan" id="ftanah_selatan" class="form-control"
													style="text-transform: capitalize;" placeholder="Tanah Milik NAMA">
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label for="ftanah_barat">SEBELAH BARAT <br>
													<h7>Contoh : Tanah Milik NAMA</h7>
												</label>
												<input type="text" name="ftanah_barat" id="ftanah_barat" class="form-control"
													style="text-transform: capitalize;" placeholder="Tanah Milik NAMA">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						</div>

						<br><br>

						<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> INFORMASI DATA ORANG TUA</h6><hr width="97%">

						<div class="col-sm-12">
							<div class="form-group">
							<label for="forang_tua" style="font-weight: 500;">NAMA ORANG TUA yang bertanda tangan <br>
							</label>
							<input type="text" name="forang_tua" id="forang_tua" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
							<label for="ftempat_tgl_lahir2" style="font-weight: 500;">Tempat dan Tanggal Lahir <br>
							</label>
							<input type="text" name="ftempat_tgl_lahir2" id="ftempat_tgl_lahir2" class="form-control" style="text-transform: capitalize;" placeholder="Tempat dan Tanggal Lahir" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
							<label for="falamat2" style="font-weight: 500;">Alamat <br>
							</label>
							<input type="text" name="falamat2" id="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Alamat" required>
							</div>
						</div>

						<br><br>

						<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> INFORMASI DATA PEREMPUAN</h6><hr width="97%">

						<div class="col-sm-12">
							<div class="form-group">
							<label for="fperempuan" style="font-weight: 500;">NAMA PEREMPUAN yang bertanda tangan <br>
							</label>
							<input type="text" name="fperempuan" id="fperempuan" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">
							<label for="ftempat_tgl_lahir3" style="font-weight: 500;">Tempat dan Tanggal Lahir <br>
							</label>
							<input type="text" name="ftempat_tgl_lahir3" id="ftempat_tgl_lahir3" class="form-control" style="text-transform: capitalize;" placeholder="Tempat dan Tanggal Lahir" required>
							</div>
						</div>

							<div class="col-sm-12">
							<div class="form-group">
							<label for="falamat3" style="font-weight: 500;">Alamat <br>
							</label>
							<input type="text" name="falamat3" id="falamat3" class="form-control" style="text-transform: capitalize;" placeholder="Alamat" required>
							</div>
						</div>

						<br><br>

						<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> INFORMASI SAKSI</h6><hr width="97%">

						<div class="col-sm-12">
							<div class="form-group">
							<label for="fsaksi1" style="font-weight: 500;">SAKSI 1<br>
							</label>
							<input type="text" name="fsaksi1" id="fsaksi1" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group">
							<label for="fsaksi2" style="font-weight: 500;">SAKSI 2<br>
							</label>
							<input type="text" name="fsaksi2" id="fsaksi2" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap">
							</div>
						</div>


						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/surat_keterangan/'">
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