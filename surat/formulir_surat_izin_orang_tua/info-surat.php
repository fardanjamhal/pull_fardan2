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
  /* Style umum untuk semua list */
  #list_nik1, #list_nik2, #list_nik3 {
    max-height: 350px;  /* Tinggi maksimal */
    overflow-y: auto;   /* Scroll vertikal */
    border: 1px solid #ced4da;
    background: white;
    border-radius: 4px;
  }

  /* Style item list */
  #list_nik1 .list-group-item,
  #list_nik2 .list-group-item,
  #list_nik3 .list-group-item {
    cursor: pointer;
    padding: 8px 12px;
  }

  /* Hover semua list */
  #list_nik1 .list-group-item:hover,
  #list_nik2 .list-group-item:hover,
  #list_nik3 .list-group-item:hover {
    background: #007bff;
    color: white;
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
								<label class="col-sm-12" style="font-weight: bold;">Ayah/wali/pengampu</label>
								
								<div class="form-group mb-3 position-relative">
									<div class="col-sm-12">
										<input type="text" name="fnik1" id="fnik1"
										class="form-control"
										placeholder="Ketik NIK atau Nama..."
										autocomplete="off"
										required>

										<!-- LIST HASIL PENCARIAN -->
										<div id="list_nik1" class="list-group" 
											style="position:absolute; width:100%; z-index:999; display:none;"></div>

										<small class="form-text text-info mt-1">
											<i class="fa fa-info-circle mr-2 text-primary"></i>
											Ketik NIK atau Nama untuk mencari data penduduk.
										</small>
									</div>
								</div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama1" id="fnama1" class="form-control" style="text-transform: capitalize;" placeholder="1. Nama lengkap dan alias" required>
						           	</div>
						        </div>
						  		
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin1" id="fbin1" class="form-control" style="text-transform: capitalize;" placeholder="2. Bin" required>
						           	</div>
						        </div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir1" id="ftempat_tgl_lahir1" class="form-control" style="text-transform: capitalize;" placeholder="3. Tempat dan tanggal lahir" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan1" id="fkewarganegaraan1" class="form-control" style="text-transform: capitalize;" placeholder="4. Kewarganegaraan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama1" id="fagama1" class="form-control" style="text-transform: capitalize;" placeholder="5. Agama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan1" id="fpekerjaan1" class="form-control" style="text-transform: capitalize;" placeholder="6. Pekerjaan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat1" id="falamat1" class="form-control" style="text-transform: capitalize;" placeholder="7. Alamat" required>
						           	</div>
						        </div>
						  	</div>
						</div><br><br>

						<div class="row">
						  	<div class="col-sm-12">
								<label class="col-sm-12" style="font-weight: bold;">Ibu/wali/pengampu</label>

								<div class="form-group mb-3 position-relative">
									<div class="col-sm-12">
										<input type="text" name="fnik2" id="fnik2"
										class="form-control"
										placeholder="Ketik NIK atau Nama..."
										autocomplete="off"
										required>

										<!-- LIST HASIL PENCARIAN -->
										<div id="list_nik2" class="list-group" 
											style="position:absolute; width:100%; z-index:999; display:none;"></div>

										<small class="form-text text-info mt-1">
											<i class="fa fa-info-circle mr-2 text-primary"></i>
											Ketik NIK atau Nama untuk mencari data penduduk.
										</small>
									</div>
								</div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama2" id="fnama2" class="form-control" style="text-transform: capitalize;" placeholder="1. Nama lengkap dan alias" required>
						           	</div>
						        </div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin2" id="fbin2" class="form-control" style="text-transform: capitalize;" placeholder="2. Bin" required>
						           	</div>
						        </div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir2" id="ftempat_tgl_lahir2" class="form-control" style="text-transform: capitalize;" placeholder="3. Tempat dan tanggal lahir" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan2" id="fkewarganegaraan2" class="form-control" style="text-transform: capitalize;" placeholder="4. Kewarganegaraan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama2" id="fagama2" class="form-control" style="text-transform: capitalize;" placeholder="5. Agama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan2" id="fpekerjaan2" class="form-control" style="text-transform: capitalize;" placeholder="6. Pekerjaan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat2" id="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="7. Alamat" required>
						           	</div>
						        </div>
						  	</div>
						</div><br><br>
						

						<div class="row">
						  	<div class="col-sm-12">

								<label class="col-sm-12" style="font-weight: bold;">Ayah dan ibu kandung/wali/pengampu dari</label>

								<div class="form-group mb-3 position-relative">
									<div class="col-sm-12">
										<input type="text" name="fnik3" id="fnik3"
										class="form-control"
										placeholder="Ketik NIK atau Nama..."
										autocomplete="off"
										required>

										<!-- LIST HASIL PENCARIAN -->
										<div id="list_nik3" class="list-group" 
											style="position:absolute; width:100%; z-index:999; display:none;"></div>

										<small class="form-text text-info mt-1">
											<i class="fa fa-info-circle mr-2 text-primary"></i>
											Ketik NIK atau Nama untuk mencari data penduduk.
										</small>
									</div>
								</div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama3" id="fnama3" class="form-control" style="text-transform: capitalize;" placeholder="1. Nama lengkap dan alias" required>
						           	</div>
						        </div>


								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fbin3" id="fbin3" class="form-control" style="text-transform: capitalize;" placeholder="2. Bin" required>
						           	</div>
						        </div>

								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl_lahir3" id="ftempat_tgl_lahir3" class="form-control" style="text-transform: capitalize;" placeholder="3. Tempat dan tanggal lahir" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fkewarganegaraan3" id="fkewarganegaraan3" class="form-control" style="text-transform: capitalize;" placeholder="4. Kewarganegaraan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fagama3" id="fagama3" class="form-control" style="text-transform: capitalize;" placeholder="5. Agama" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan3" id="fpekerjaan3" class="form-control" style="text-transform: capitalize;" placeholder="6. Pekerjaan" required>
						           	</div>
						        </div>
								<div class="form-group">
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat3" id="falamat3" class="form-control" style="text-transform: capitalize;" placeholder="7. Alamat" required>
						           	</div>
						        </div>
						  	</div>
						</div>

						<!-- jQuery wajib -->
						<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
						
						<script>
							$(document).ready(function(){

									// Autocomplete berjalan saat mengetik
									$('#fnik1').keyup(function(){
										let q = $(this).val().trim();
										if(q.length < 1){
											$('#list_nik1').hide();
											return;
										}

										$.get('../helper/search_penduduk.php?q=' + q, function(res){
											let data = JSON.parse(res);
											let html = "";

											data.forEach(function(item){
												html += `<a href="#" class="list-group-item list-group-item-action pilih-nik1"
															data-nik="${item.nik}">
															${item.text}
														</a>`;
											});

											$('#list_nik1').html(html).show();
										});
									});

									// Klik salah satu pilihan
									$(document).on('click', '.pilih-nik1', function(e){
										e.preventDefault();
										let nik = $(this).data('nik');
										$('#fnik1').val(nik);
										$('#list_nik1').hide();

										// Panggil file check_nik.php yang lama
										$.post('../helper/check_nik.php', { nik: nik }, function(res){
											if(res.success){
												$('#fnama1').val(res.data.nama);
												$('#fbin1').val(res.data.nama_ayah);
												$('#ftempat_tgl_lahir1').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
												$('#fkewarganegaraan1').val(res.data.kewarganegaraan);
												$('#fagama1').val(res.data.agama);
												$('#fpekerjaan1').val(res.data.pekerjaan);
												$('#falamat1').val(res.data.alamat);
											} else {
												Swal.fire('NIK Tidak Ditemukan', '', 'warning');
											}
										}, 'json');
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
								});
							</script>

						<script>
							$(document).ready(function(){

									// Autocomplete berjalan saat mengetik
									$('#fnik2').keyup(function(){
										let q = $(this).val().trim();
										if(q.length < 1){
											$('#list_nik2').hide();
											return;
										}

										$.get('../helper/search_penduduk.php?q=' + q, function(res){
											let data = JSON.parse(res);
											let html = "";

											data.forEach(function(item){
												html += `<a href="#" class="list-group-item list-group-item-action pilih-nik2"
															data-nik="${item.nik}">
															${item.text}
														</a>`;
											});

											$('#list_nik2').html(html).show();
										});
									});

									// Klik salah satu pilihan
									$(document).on('click', '.pilih-nik2', function(e){
										e.preventDefault();
										let nik = $(this).data('nik');
										$('#fnik2').val(nik);
										$('#list_nik2').hide();

										// Panggil file check_nik.php yang lama
										$.post('../helper/check_nik.php', { nik: nik }, function(res){
											if(res.success){
												$('#fnama2').val(res.data.nama);
												$('#fbin2').val(res.data.nama_ayah);
												$('#ftempat_tgl_lahir2').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
												$('#fkewarganegaraan2').val(res.data.kewarganegaraan);
												$('#fagama2').val(res.data.agama);
												$('#fpekerjaan2').val(res.data.pekerjaan);
												$('#falamat2').val(res.data.alamat);
											} else {
												Swal.fire('NIK Tidak Ditemukan', '', 'warning');
											}
										}, 'json');
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
								});
							</script>

							<script>
							$(document).ready(function(){

									// Autocomplete berjalan saat mengetik
									$('#fnik3').keyup(function(){
										let q = $(this).val().trim();
										if(q.length < 1){
											$('#list_nik3').hide();
											return;
										}

										$.get('../helper/search_penduduk.php?q=' + q, function(res){
											let data = JSON.parse(res);
											let html = "";

											data.forEach(function(item){
												html += `<a href="#" class="list-group-item list-group-item-action pilih-nik3"
															data-nik="${item.nik}">
															${item.text}
														</a>`;
											});

											$('#list_nik3').html(html).show();
										});
									});

									// Klik salah satu pilihan
									$(document).on('click', '.pilih-nik3', function(e){
										e.preventDefault();
										let nik = $(this).data('nik');
										$('#fnik3').val(nik);
										$('#list_nik3').hide();

										// Panggil file check_nik.php yang lama
										$.post('../helper/check_nik.php', { nik: nik }, function(res){
											if(res.success){
												$('#fnama3').val(res.data.nama);
												$('#fbin3').val(res.data.nama_ayah);
												$('#ftempat_tgl_lahir3').val(res.data.tempat_lahir + ', ' + res.data.tgl_lahir);
												$('#fkewarganegaraan3').val(res.data.kewarganegaraan);
												$('#fagama3').val(res.data.agama);
												$('#fpekerjaan3').val(res.data.pekerjaan);
												$('#falamat3').val(res.data.alamat);
											} else {
												Swal.fire('NIK Tidak Ditemukan', '', 'warning');
											}
										}, 'json');
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