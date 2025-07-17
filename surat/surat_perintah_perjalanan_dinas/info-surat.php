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
							<h6 class="container-fluid" align="left">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-edit"></i>&nbsp;&nbsp;INFORMASI FORMULIR</h6><hr width="97%">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pejabat Berwenang yang memerintahkan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpejabat" class="form-control" style="text-transform: capitalize;" placeholder="Isi Nama Pejabat" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama / Pegawai yang diperintahkan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" value="<?php echo $data['nama']; ?>" readonly>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Jabatan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fjabatan" class="form-control" style="text-transform: capitalize;" placeholder="Isi Jabatan" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							<label>&nbsp;&nbsp;&nbsp;&nbsp;Perjalanan Dinas yang Diperintahkan</label>
							<!-- Tambahkan padding horizontal di sini -->
							<div class="row px-3">
								
								<!-- Kolom 1: Jabatan -->
								<div class="col-sm-6">
								<div class="form-group">
									<input type="text" name="fdari" id="fdari" class="form-control" style="text-transform: capitalize;" placeholder="Dari" required>
								</div>
								</div>

								<!-- Kolom 2: Nama Lengkap -->
								<div class="col-sm-6">
								<div class="form-group">
									<input type="text" name="fke" id="fke" class="form-control" style="text-transform: capitalize;" placeholder="Ke" required>
								</div>
								</div>

								<div class="col-sm-6">
								<div class="form-group">
									<input type="text" name="fkendaraan" id="fkendaraan" class="form-control" style="text-transform: capitalize;" placeholder="Kendaraan" required>
								</div>
								</div>

							</div>
							</div>
							<div class="col-sm-6">
						<label class="mb-2 ps-2">&nbsp;&nbsp;&nbsp;&nbsp;Perjalanan Dinas yang Direncanakan</label>
						<div class="row px-3">
							<!-- Baris 1: Selama & Ke -->
						<style>
							.input-group-clearable {
								position: relative;
							}

							.input-group-clearable input {
								padding-right: 36px;
							}

							.input-group-clearable .clear-btn {
								position: absolute;
								top: 50%;
								right: 10px;
								transform: translateY(-50%);
								background-color: #f8d7da;
								color: #a94442;
								border-radius: 50%;
								width: 20px;
								height: 20px;
								text-align: center;
								line-height: 18px;
								font-size: 14px;
								cursor: pointer;
								font-weight: bold;
								transition: 0.2s;
								display: none;
							}

							.input-group-clearable .clear-btn:hover {
								background-color: #dc3545;
								color: #fff;
							}

							.input-group-clearable input:not(:placeholder-shown) + .clear-btn {
								display: block;
							}
							</style>

							<div class="col-sm-6 mb-2">
							<div class="form-group input-group-clearable">
								<input type="text" name="fselama" id="fselama" class="form-control"
								placeholder="Tulis angka (Berapa Hari)" required autocomplete="off">
								<span class="clear-btn" id="clearSelama">&times;</span>
							</div>
							</div>

							<script>
							const fselama = document.getElementById('fselama');
							const clearSelama = document.getElementById('clearSelama');

							fselama.addEventListener('input', function () {
							const raw = this.value.replace(/[^\d]/g, '');
							const angka = parseInt(raw);
							if (!isNaN(angka) && angka <= 1000) {
								this.value = `${angka} Hari`;  // bisa juga pakai pluralisasi jika diperlukan
								clearSelama.style.display = 'block';
							} else {
								this.value = '';
								clearSelama.style.display = 'none';
							}
							});

							clearSelama.addEventListener('click', function () {
							fselama.value = '';
							fselama.focus();
							clearSelama.style.display = 'none';
							});
							</script>

							<div class="col-sm-6 mb-2">
							<div class="form-group">
							<input type="text" name="frencanabiaya" id="frencanabiaya" class="form-control" placeholder="Rencana Biaya (Rp)" required onkeyup="formatRupiah(this)">
							</div>
							</div>

							<!-- Baris 2: Tanggal Berangkat -->
							<div class="col-sm-6 mb-2">
							<div class="form-group">
								<input type="date" name="ftgl_berangkat" id="ftgl_berangkat" class="form-control" required>
								<small class="form-text text-muted">Tanggal Berangkat</small>
							</div>
							</div>

							<!-- Baris 3: Tanggal Kembali -->
							<div class="col-sm-6 mb-2">
							<div class="form-group">
								<input type="date" name="ftgl_kembali" id="ftgl_kembali" class="form-control" required>
								<small class="form-text text-muted">Tanggal Kembali</small>
							</div>
							</div>
						</div>
						</div>
						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Maksud Mengadakan Perjalanan</label>
							<div class="col-sm-12">
							<textarea name="fmaksud_mengadakan" class="form-control" rows="4" style="text-transform: capitalize;" placeholder="Isi Alasan atau Maksud Perjalanan" required></textarea>
							</div>
						</div>
						</div>
						
						<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Keterangan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fketerangan" class="form-control" style="text-transform: capitalize;" placeholder="Isi keterangan" required>
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


	<script>
	function formatRupiah(el) {
		let angka = el.value.replace(/[^,\d]/g, "").toString();
		let split = angka.split(",");
		let sisa = split[0].length % 3;
		let rupiah = split[0].substr(0, sisa);
		let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		if (ribuan) {
		let separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
		}

		rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
		el.value = rupiah;
	}
	</script>


</body>

<?php 
		}
	}else{
		header("location:index.php?pesan=gagal");
	}

	include ('../part/footer.php');
?>