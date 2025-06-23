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
							<a class="col-sm-6"><h5><b>SURAT KETERANGAN PINDAH PENDUDUK</b></h5></a>
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
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">Usia</label>
								<div class="col-sm-12">
									<?php
									$tanggal_lahir = $data['tgl_lahir']; // Ganti ini dengan data dari DB, misalnya $row['tanggal_lahir']
									$today = new DateTime();
									$lahir = new DateTime($tanggal_lahir);
									$usia = $today->diff($lahir)->y;
									?>
								<input type="text" class="form-control" value="<?php echo $usia . ' Tahun'; ?>" readonly>
								</div>
							</div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alamat yang dituju</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falamat_yang_dituju" class="form-control" style="text-transform: capitalize;" placeholder="alamat lengkap ( Jl RT / RW DESA / KEL KEC. KAB. PROV. )" required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Alasan Pindah</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="falasan_pindah" class="form-control" style="text-transform: capitalize;" placeholder="Alasan pindah .." required>
						           	</div>
						        </div>
							</div>
							<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-12" style="font-weight: 500;">Tanggal Pindah</label>
								<div class="col-sm-12">
								<input type="date" name="ftanggal_pindah" class="form-control" required>
								</div>
							</div>
							</div>
							<div class="col-sm-12">
							<div class="form-group">
								<div class="col-sm-12">
								<div class="row mb-3">
									<div class="col-12">
									<label class="fw-semibold">Jumlah Pengikut</label>
									<input type="text" name="fjumlah_pengikut_display" class="form-control" placeholder="Jumlah pengikut .." readonly id="jumlah_pengikut_input">
									</div>
								</div>

								<div id="pengikut-wrapper"></div>

								<div class="mb-3">
									<button type="button" class="btn btn-primary" onclick="tambahPengikut()">+ Tambah Pengikut</button>
								</div>

								<input type="hidden" name="jumlah_pengikut" id="jumlah_pengikut" value="0">
								</div>
							</div>
							</div>

							
							
						</div>
						<hr width="97%">
						<div class="container-fluid">
		                	<input type="button" class="btn btn-warning" value="Batal" onclick="window.location.href='../../surat/surat_keterangan_pengantar/'">
		                	<input type="submit" name="submit" class="btn btn-info" value="Submit">
		              	</div>
					</form>
				</div>
			</div>
		</div>
	</div>

			<script>
				let pengikutCount = 0;

				function tambahPengikut() {
				pengikutCount++;
				document.getElementById('jumlah_pengikut').value = pengikutCount;
				document.getElementById('jumlah_pengikut_input').value = pengikutCount;

				const wrapper = document.getElementById('pengikut-wrapper');

				const div = document.createElement('div');
				div.classList.add('row', 'border', 'rounded', 'p-3', 'mb-3', 'position-relative', 'pengikut-item');

				div.innerHTML = `
					<div class="col-12 text-end">
					<button type="button" class="btn btn-danger btn-sm mb-2" onclick="hapusPengikut(this)">Hapus</button>
					</div>

					<div class="col-md-6 mt-2">
					<label class="fw-semibold">NIK Pengikut</label>
					<input type="text" name="fnik_pengikut[]" class="form-control" placeholder="NIK .." required>
					</div>

					<div class="col-md-6 mt-2">
					<label class="fw-semibold">Nama Pengikut</label>
					<input type="text" name="fnama_pengikut[]" class="form-control" placeholder="Nama .." required>
					</div>

					<div class="col-md-6 mt-2">
					<label class="fw-semibold">Masa Berlaku KTP S/D</label>
					<input type="text" name="fmasa_berlaku_ktp[]" class="form-control" placeholder="Contoh: Seumur Hidup" required>
					</div>

					<div class="col-md-6 mt-2">
					<label class="fw-semibold">SHDK</label>
					<input type="text" name="fshdk[]" class="form-control" placeholder="Status Hubungan Dalam Keluarga .." required>
					</div>
				`;

				wrapper.appendChild(div);
				}

				function hapusPengikut(button) {
				const row = button.closest('.pengikut-item');
				row.remove();
				pengikutCount--;
				document.getElementById('jumlah_pengikut').value = pengikutCount;
				document.getElementById('jumlah_pengikut_input').value = pengikutCount;
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