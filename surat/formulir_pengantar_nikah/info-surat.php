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

								<style>
									#list_nik_ayah {
										max-height: 350px; /* Tinggi maksimal */
										overflow-y: auto;  /* Scroll vertikal */
										border: 1px solid #ced4da;
										background: white;
										border-radius: 4px;
									}

									#list_nik_ayah .list-group-item {
										cursor: pointer;
										padding: 8px 12px;
									}

									#list_nik_ayah .list-group-item:hover {
										background: #007bff;
										color: white;
									}

										#list_nik_ibu {
										max-height: 350px; /* Tinggi maksimal */
										overflow-y: auto;  /* Scroll vertikal */
										border: 1px solid #ced4da;
										background: white;
										border-radius: 4px;
									}

									#list_nik_ibu .list-group-item {
										cursor: pointer;
										padding: 8px 12px;
									}

									#list_nik_ibu .list-group-item:hover {
										background: #007bff;
										color: white;
									}
								</style>

						<div class="row">
							<!-- Kolom Kiri: Ayah -->
							<div class="col-sm-6">
								<script src="../../helper/helper-validasi-nik.js"></script>

								<div class="form-group mb-3 position-relative">
									<div class="col-sm-12">
										<input type="text" name="fnik_ayah" id="fnik_ayah"
										class="form-control"
										placeholder="Ketik NIK atau Nama..."
										autocomplete="off"
										required>

										<!-- LIST HASIL PENCARIAN -->
										<div id="list_nik_ayah" class="list-group" 
											style="position:absolute; width:100%; z-index:999; display:none;"></div>

										<small class="form-text text-info mt-1">
											<i class="fa fa-info-circle mr-2 text-primary"></i>
											Ketik NIK atau Nama untuk mencari data penduduk.
										</small>
									</div>
								</div>


								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fnama_ayah" id="fnama_ayah" class="form-control" placeholder="Nama Ayah / Orang Tua / Wali" style="text-transform: capitalize;" required>
								</div>

								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="ftempat_tgl_lahir_ayah" id="ftempat_tgl_lahir_ayah" class="form-control" placeholder="Tempat / Tgl Lahir" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fkewarganegaraan_ayah" id="fkewarganegaraan_ayah" class="form-control" placeholder="Kewarganegaraan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fagama_ayah" id="fagama_ayah" class="form-control" placeholder="Agama" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fpekerjaan_ayah" id="fpekerjaan_ayah" class="form-control" placeholder="Pekerjaan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="falamat_ayah" id="falamat_ayah" class="form-control" placeholder="Alamat" style="text-transform: capitalize;" required>
								</div>
							</div>

							<!-- jQuery wajib -->
							<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

							<script>
							$(document).ready(function(){

									// Autocomplete berjalan saat mengetik
									$('#fnik_ayah').keyup(function(){
										let q = $(this).val().trim();
										if(q.length < 1){
											$('#list_nik_ayah').hide();
											return;
										}

										$.get('../helper/search_penduduk.php?q=' + q, function(res){
											let data = JSON.parse(res);
											let html = "";

											data.forEach(function(item){
												html += `<a href="#" class="list-group-item list-group-item-action pilih-nik-ayah"
															data-nik="${item.nik}">
															${item.text}
														</a>`;
											});

											$('#list_nik_ayah').html(html).show();
										});
									});

									// Klik salah satu pilihan
									$(document).on('click', '.pilih-nik-ayah', function(e){
										e.preventDefault();
										let nik = $(this).data('nik');
										$('#fnik_ayah').val(nik);
										$('#list_nik_ayah').hide();

										// Panggil file check_nik.php yang lama
										$.post('../helper/check_nik.php', { nik: nik }, function(res){
											if(res.success){
												$('#fnama_ayah').val(res.data.nama);
												$('#ftempat_tgl_lahir_ayah').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
												$('#fkewarganegaraan_ayah').val(res.data.kewarganegaraan);
												$('#fagama_ayah').val(res.data.agama);
												$('#fpekerjaan_ayah').val(res.data.pekerjaan);
												$('#falamat_ayah').val(res.data.alamat);
											} else {
												Swal.fire('NIK Tidak Ditemukan', '', 'warning');
											}
										}, 'json');
									});

									$('#fnik_ayah').on('input', function () {
									var nik = $(this).val().trim();

									// Jika NIK dikosongkan, kosongkan juga semua isian terkait
									if (nik === '') {
										$('#fnama_ayah').val('');
										$('#ftempat_tgl_lahir_ayah').val('');
										$('#fkewarganegaraan_ayah').val('');
										$('#fagama_ayah').val('');
										$('#fpekerjaan_ayah').val('');
										$('#falamat_ayah').val('');
									}
									});
								});
							</script>


							<!-- Kolom Kanan: Ibu -->
							<div class="col-sm-6">

								<div class="form-group mb-3">
								<div class="col-sm-12">
									<input type="text" name="fnik_ibu" id="fnik_ibu"
										class="form-control"
										placeholder="Ketik NIK atau Nama..."
										autocomplete="off"
										required>

										<!-- LIST HASIL PENCARIAN -->
										<div id="list_nik_ibu" class="list-group" 
											style="position:absolute; width:100%; z-index:999; display:none;"></div>
									
									<!-- Tambahkan alert info di bawah input -->
									<small class="form-text text-info mt-1" style="display: flex; align-items: center;">
									<i class="fa fa-info-circle mr-2 text-primary"></i>
									Ketik NIK atau Nama untuk mencari data penduduk.
									</small>
								</div>
								</div>

								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fnama_ibu" id="fnama_ibu" class="form-control" placeholder="Nama Ibu / Orang Tua / Wali" style="text-transform: capitalize;" required>
								</div>

								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="ftempat_tgl_lahir_ibu" id="ftempat_tgl_lahir_ibu" class="form-control" placeholder="Tempat / Tgl Lahir" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fkewarganegaraan_ibu" id="fkewarganegaraan_ibu" class="form-control" placeholder="Kewarganegaraan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fagama_ibu" id="fagama_ibu" class="form-control" placeholder="Agama" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="fpekerjaan_ibu" id="fpekerjaan_ibu" class="form-control" placeholder="Pekerjaan" style="text-transform: capitalize;" required>
								</div>
								<div class="form-group col-sm-12" style="font-weight: 500;">
									<input type="text" name="falamat_ibu" id="falamat_ibu" class="form-control" placeholder="Alamat" style="text-transform: capitalize;" required>
								</div>
							</div>

							<script>
							$(document).ready(function(){

									// Autocomplete berjalan saat mengetik
									$('#fnik_ibu').keyup(function(){
										let q = $(this).val().trim();
										if(q.length < 1){
											$('#list_nik_ibu').hide();
											return;
										}

										$.get('../helper/search_penduduk.php?q=' + q, function(res){
											let data = JSON.parse(res);
											let html = "";

											data.forEach(function(item){
												html += `<a href="#" class="list-group-item list-group-item-action pilih-nik-ibu"
															data-nik="${item.nik}">
															${item.text}
														</a>`;
											});

											$('#list_nik_ibu').html(html).show();
										});
									});

									// Klik salah satu pilihan
									$(document).on('click', '.pilih-nik-ibu', function(e){
										e.preventDefault();
										let nik = $(this).data('nik');
										$('#fnik_ibu').val(nik);
										$('#list_nik_ibu').hide();

										// Panggil file check_nik.php yang lama
										$.post('../helper/check_nik.php', { nik: nik }, function(res){
											if(res.success){
												$('#fnama_ibu').val(res.data.nama);
												$('#ftempat_tgl_lahir_ibu').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
												$('#fkewarganegaraan_ibu').val(res.data.kewarganegaraan);
												$('#fagama_ibu').val(res.data.agama);
												$('#fpekerjaan_ibu').val(res.data.pekerjaan);
												$('#falamat_ibu').val(res.data.alamat);
											} else {
												Swal.fire('NIK Tidak Ditemukan', '', 'warning');
											}
										}, 'json');
									});

									$('#fnik_ibu').on('input', function () {
									var nik = $(this).val().trim();

									// Jika NIK dikosongkan, kosongkan juga semua isian terkait
									if (nik === '') {
										$('#fnama_ibu').val('');
										$('#ftempat_tgl_lahir_ibu').val('');
										$('#fkewarganegaraan_ibu').val('');
										$('#fagama_ibu').val('');
										$('#fpekerjaan_ibu').val('');
										$('#falamat_ibu').val('');
									}
									});
								});
							</script>

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