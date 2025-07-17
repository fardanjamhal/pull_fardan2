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
						</div>
						<br>
						<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> DATA PIHAK KEDUA</h6><hr width="97%">
						<div class="row">
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Nama</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fnama2" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat / Tanggal Lahir</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tgl2" class="form-control" style="text-transform: capitalize;" placeholder="contoh : Jeneponto, 21-10-2000" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Pekerjaan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fpekerjaan2" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan Pekerjaan Anda" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Jl. RT/RW Dusun / Desa / Kec. / Kab." required>
						           	</div>
						        </div>
							</div>
						</div>

						<div class="col-sm-12">
						<div class="form-group">
							<label style="font-weight: 500;">Isi Surat</label>
							<textarea id="isiSurat" name="fisi_surat" class="form-control" rows="6" required></textarea>
							<button type="button" class="btn btn-sm btn-warning mt-2" onclick="resetIsiSurat()">🔄 Reset ke Default</button>
						</div>
						</div>

						<script>
						const defaultText = `Pihak Pertama benar memiliki Sebidang/Sepetak Tanah (Perumahan) yang hibahkan kepada Pihak Kedua. Tanah (Perumahan) tersebut terletak di Lompodepa, Dusun Kancuna Desa Lebang Manai Utara Kec. Rumbia Kab. Jeneponto dengan luas Lebar depan ± 13 M, Lebar belakang ± 11 M dan Panjang ± 15 M.`;

						const textarea = document.getElementById("isiSurat");

						// Isi default saat halaman dibuka
						textarea.value = defaultText;

						// Fungsi reset
						function resetIsiSurat() {
							textarea.value = defaultText;
						}
						</script>

							<div class="col-sm-12">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">No. SPPT</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fno_sppt" class="form-control" style="text-transform: capitalize;" placeholder="isi tanda (-) jika tidak ada" required>
						           	</div>
						        </div>
							</div>


						<div class="row px-3">
						<div class="col-sm-12 text-center">
							<small class="text-muted"><em>*Batas - Batas</em></small>
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

						<br>
						<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Kepala Dusun</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="fkepala_dusun" class="form-control" style="text-transform: capitalize;" placeholder="Nama Kadus" required>
						           	</div>
						        </div>
							</div>

							<div class="col-sm-12">
						<label style="font-weight: 500;">Data Saksi</label>
						<div id="formSaksiWrapper"></div>
						<button type="button" class="btn btn-sm btn-success mt-2" onclick="tambahSaksi()">➕ Tambah Saksi</button>
						</div>

						<script>
						const maxSaksi = 4;

						function getNomorSaksiTersedia() {
							let tersedia = [];
							for (let i = 1; i <= maxSaksi; i++) {
							if (!document.getElementById(`saksi-${i}`)) {
								tersedia.push(i);
							}
							}
							return tersedia;
						}

						function tambahSaksi() {
							const tersedia = getNomorSaksiTersedia();
							if (tersedia.length === 0) {
							alert("Maksimal hanya 4 saksi.");
							return;
							}

							const no = tersedia[0];
							const wrapper = document.getElementById("formSaksiWrapper");

							const div = document.createElement("div");
							div.className = "input-group mb-2";
							div.id = `saksi-${no}`;

							div.innerHTML = `
							<input type="text" name="fsaksi${no}" class="form-control" placeholder="Nama Saksi ${no}" style="text-transform: capitalize;">
							<div class="input-group-append">
								<button type="button" class="btn btn-danger" onclick="hapusSaksi('${div.id}')">🗑️</button>
							</div>
							`;

							wrapper.appendChild(div);
						}

						function hapusSaksi(id) {
							const elemen = document.getElementById(id);
							if (elemen) elemen.remove();
						}

						// Opsional: tampilkan 1 saksi default
						window.onload = () => tambahSaksi();
						</script>

						<br>

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