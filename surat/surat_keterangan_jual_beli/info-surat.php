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
						<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> INFORMASI PIHAK II</h6><hr width="97%">
						<div class="row px-3">
						<div class="col-sm-6">
							<div class="form-group">
							<label for="fnama2" style="font-weight: 500;">NAMA<br>
							</label>
							<input type="text" name="fnama2" id="fnama2" class="form-control" style="text-transform: capitalize;" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="fnik2" style="font-weight: 500;">NIK<br>
							</label>
							<input type="text" name="fnik2" id="fnik2" class="form-control" style="text-transform: capitalize;" placeholder="Masukkan NIK" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="ftempat_tgl_lahir2" style="font-weight: 500;">Tempat / Tanggal Lahir<br>
							</label>
							<input type="text" name="ftempat_tgl_lahir2" id="ftempat_tgl_lahir2" class="form-control" style="text-transform: capitalize;" placeholder="Tempat / Tanggal Lahir" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="fpekerjaan2" style="font-weight: 500;">Pekerjaan<br>
							</label>
							<input type="text" name="fpekerjaan2" id="fpekerjaan2" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="falamat2" style="font-weight: 500;">Alamat<br>
							</label>
							<input type="text" name="falamat2" id="falamat2" class="form-control" style="text-transform: capitalize;" placeholder="Alamat" required>
							</div>
						</div>

							<h6 class="container-fluid" align="left"><i class="fas fa-edit"></i> RINCIAN OBJEK YANG DIJUAL</h6><hr width="97%">
						<div class="col-sm-6">
							<div class="form-group">
							<label for="fyang_diperjualbelikan" style="font-weight: 500;">Yang diperjualbelikan<br>
							</label>
							<input type="text" name="fyang_diperjualbelikan" id="fyang_diperjualbelikan" class="form-control" style="text-transform: capitalize;" placeholder="Yang diperjualbelikan" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="flokasi" style="font-weight: 500;">Lokasi<br>
							</label>
							<input type="text" name="flokasi" id="flokasi" class="form-control" style="text-transform: capitalize;" placeholder="Lokasi Dusun Desa Kecamatan Kabupaten / Kota" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="finformasi_objek" style="font-weight: 500;">Informasi Mengenai Objek yang Diperjualbelikan<br>
							</label>
							<input type="text" name="finformasi_objek" id="finformasi_objek" class="form-control" style="text-transform: capitalize;" placeholder="Informasi Mengenai Objek yang Diperjualbelikan" required>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="fharga" style="font-weight: 500;">Harga</label>
								<input type="text" name="fharga" id="fharga" class="form-control" 
									placeholder="Contoh: 1,000,000" required>
							</div>
						</div>

						<script>
						// Format angka saat diketik
						document.getElementById('fharga').addEventListener('input', function (e) {
							let value = e.target.value.replace(/[^0-9]/g, ''); // hanya angka
							if (value) {
								value = parseInt(value).toLocaleString('en-US'); // gunakan koma
							}
							e.target.value = value;
						});
						</script>
						<div class="col-sm-6">
							<div class="form-group">
							<label for="ftahun_jual_beli" style="font-weight: 500;">Tahun Jual Beli<br>
							</label>
							<input type="text" name="ftahun_jual_beli" id="ftahun_jual_beli" class="form-control" style="text-transform: capitalize;" placeholder="Tahun Jual Beli" required>
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

					<div class="col-sm-12">
					<div class="form-group">
						<div class="row">
						<!-- Saksi 1 (wajib) -->
						<div class="col-sm-6">
							<div class="form-group">
							<label for="fsaksi1" style="font-weight: 500;">Saksi 1</label>
							<input type="text" name="fsaksi1" id="fsaksi1" class="form-control" style="text-transform: capitalize;" placeholder="Nama saksi 1" required>
							</div>
						</div>

						<!-- Saksi 2 -->
						<div class="col-sm-6 saksi-opsional" id="saksi2" style="display: none;">
							<div class="form-group">
							<label for="fsaksi2" style="font-weight: 500;">Saksi 2</label>
							<div class="input-group">
								<input type="text" name="fsaksi2" id="fsaksi2" class="form-control" style="text-transform: capitalize;" placeholder="Nama saksi 2">
								<button type="button" class="btn btn-danger btn-sm" onclick="hapusSaksi(2)">Hapus</button>
							</div>
							</div>
						</div>

						<!-- Saksi 3 -->
						<div class="col-sm-6 saksi-opsional" id="saksi3" style="display: none;">
							<div class="form-group">
							<label for="fsaksi3" style="font-weight: 500;">Saksi 3</label>
							<div class="input-group">
								<input type="text" name="fsaksi3" id="fsaksi3" class="form-control" style="text-transform: capitalize;" placeholder="Nama saksi 3">
								<button type="button" class="btn btn-danger btn-sm" onclick="hapusSaksi(3)">Hapus</button>
							</div>
							</div>
						</div>

						<!-- Saksi 4 -->
						<div class="col-sm-6 saksi-opsional" id="saksi4" style="display: none;">
							<div class="form-group">
							<label for="fsaksi4" style="font-weight: 500;">Saksi 4</label>
							<div class="input-group">
								<input type="text" name="fsaksi4" id="fsaksi4" class="form-control" style="text-transform: capitalize;" placeholder="Nama saksi 4">
								<button type="button" class="btn btn-danger btn-sm" onclick="hapusSaksi(4)">Hapus</button>
							</div>
							</div>
						</div>
						</div>

						<!-- Tombol Tambah -->
						<div class="mb-3">
						<button type="button" class="btn btn-sm btn-primary" id="btnTambahSaksi" onclick="tambahSaksi()">+ Tambah Saksi</button>
						</div>

						<script>
						let jumlahSaksi = 1;

						function tambahSaksi() {
							if (jumlahSaksi < 4) {
							jumlahSaksi++;
							document.getElementById('saksi' + jumlahSaksi).style.display = 'block';
							if (jumlahSaksi === 4) {
								document.getElementById('btnTambahSaksi').style.display = 'none';
							}
							}
						}

						function hapusSaksi(nomor) {
							// Kosongkan nilai input
							document.getElementById('fsaksi' + nomor).value = '';
							// Sembunyikan field
							document.getElementById('saksi' + nomor).style.display = 'none';
							// Kembalikan tombol tambah jika sebelumnya tersembunyi
							if (jumlahSaksi === 4) {
							document.getElementById('btnTambahSaksi').style.display = 'inline-block';
							}
							// Kurangi jumlah saksi yang aktif
							if (jumlahSaksi > 1) jumlahSaksi--;
						}
						</script>
					</div>
					</div>

					<div class="col-sm-6">
							<div class="form-group">
							<label for="fnama_dusun" style="font-weight: 500;">Nama Dusun</label>
							<input type="text" name="fnama_dusun" id="fnama_dusun" class="form-control" style="text-transform: capitalize;" placeholder="Nama Dusun" required>
							</div>
					</div>

					<div class="col-sm-6">
							<div class="form-group">
							<label for="fkepala_dusun" style="font-weight: 500;">Nama Kepala Dusun</label>
							<input type="text" name="fkepala_dusun" id="fkepala_dusun" class="form-control" style="text-transform: capitalize;" placeholder="Nama Kepala Dusun" required>
							</div>
					</div>

	
					<br>
					<div class="col-sm-12">
					<div class="form-group">
						<label for="fketerangan" style="font-weight: 500;">Keterangan Tambahan</label>

						<!-- Tombol Reset ke Teks Default -->
						<div class="mb-2">
						<button type="button" class="btn btn-sm btn-secondary" onclick="resetTeksDefault()">Reset ke Teks Awal</button>
						</div>

						<!-- Textarea -->
						<textarea name="fketerangan" id="fketerangan" rows="6" class="form-control" required style="text-align: left;"></textarea>
					</div>
					</div>

					<script>
					// Teks default yang akan ditampilkan
					const teksDefault = `Apabila di kemudian hari, ternyata keluarga, anak cucu kami menggugat lokasi hak milik yang sudah kami jual, dan atau ada pihak lain yang menggugat dan atau dalam pemberian keterangan jual beli ini tidak benar maka saya / kami selaku penjual atau pembeli siap mempertanggung jawabkan sesuai peraturan perundang-undangan yang berlaku. Dalam surat keterangan jual beli ini kami kedua belah pihak bersepakat bahwa surat keterangan dapat di pergunakan dalam pengurusan Akte jual Beli / Balik Nama ke notaris atau pejabat pembuat Akte Tanah (PPAT), Tanpa menghadirkan pihak penjual ( Foto copy KTP Pihak penjual terlampir ).`;

					// Saat halaman dimuat, isi textarea dengan teks default
					document.addEventListener("DOMContentLoaded", function () {
					const textarea = document.getElementById("fketerangan");
					if (!textarea.value.trim()) {
						textarea.value = teksDefault;
					}
					});

					// Fungsi untuk reset ke teks default
					function resetTeksDefault() {
					document.getElementById("fketerangan").value = teksDefault;
					}
					</script>




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