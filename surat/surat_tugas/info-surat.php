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
  .container-fluid {
  text-align: center; /* Pusatkan semua isi di tengah horizontal */
	}
  /* Gaya umum semua input */
  input, textarea, select {
    border: 1px solid #ccc;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 14px;
    width: 49%;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    outline: none;
    background-color: #fff;
  }

  /* Input fokus (agar terlihat aktif) */
  input:focus, textarea:focus, select:focus {
    border-color: #7aa7ff;
    box-shadow: 0 0 4px rgba(122, 167, 255, 0.4);
  }

  /* Input invalid (required belum diisi) - soft warning */
  input:required:invalid,
  textarea:required:invalid,
  select:required:invalid {
    border: 1.5px solid #e07c7c; /* merah muda lembut */
    background-color: #fff7f7;
  }

  /* Input valid */
  input:required:valid,
  textarea:required:valid,
  select:required:valid {
    border: 1.5px solid #7acb9a; /* hijau lembut */
    background-color: #f6fef9;
  }

  /* Tambahan: Placeholder biar elegan */
  input::placeholder, textarea::placeholder {
    color: #aaa;
    font-style: italic;
  }
</style>

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
									<label class="col-sm-12" style="font-weight: 500;">Dasar</label>
									<div class="col-sm-12">
									<textarea name="fdasar" class="form-control" rows="4" style="text-transform: capitalize;" placeholder="Isi Dasar" required></textarea>
									</div>
								</div>
							</div>


						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Nama & Jabatan yang diberi tugas</label>

							<div id="input-wrapper">
							<!-- Baris pertama -->
							<div class="col-sm-12 mb-2">
								<div class="d-flex align-items-start justify-content-between" style="gap: 8px;">
								<input type="text" id="idname_1" name="fnama[]" class="form-control" style="text-transform: capitalize; width: 50%;" placeholder="Nama" required>
								<input type="text" id="idjabatan_1" name="fjabatan[]" class="form-control" style="text-transform: capitalize; width: 50%;" placeholder="Jabatan" required>
								<!-- Tempat tombol agar tetap simetris -->
								<div style="width: 70px;"></div>
								</div>
							</div>
							</div>

							<!-- Tombol tambah -->
							<button type="button" class="btn btn-primary btn-sm mt-2" onclick="tambahBaris()">+ Tambah</button>
						</div>
						</div>

						<script>
						const maxBaris = 9;

						function tambahBaris() {
							const wrapper = document.getElementById('input-wrapper');
							const total = wrapper.querySelectorAll('.mb-2').length;

							if (total >= maxBaris) {
							alert('Maksimal 9 orang.');
							return;
							}

							const urutan = total + 1;
							const baris = document.createElement('div');
							baris.className = 'col-sm-12 mb-2';

							baris.innerHTML = `
							<div class="d-flex align-items-start justify-content-between" style="gap: 8px;">
								<input type="text" id="idname_${urutan}" name="fnama[]" class="form-control" style="text-transform: capitalize; width: 45%;" placeholder="Nama" required>
								<input type="text" id="idjabatan_${urutan}" name="fjabatan[]" class="form-control" style="text-transform: capitalize; width: 45%;" placeholder="Jabatan" required>
								<button type="button" class="btn btn-danger btn-sm btn-hapus" onclick="hapusBaris(this)">Hapus</button>
							</div>
							`;

							wrapper.appendChild(baris);
						}

						function hapusBaris(el) {
							const wrapper = document.getElementById('input-wrapper');
							const total = wrapper.querySelectorAll('.mb-2').length;

							if (total <= 1) {
							alert('Minimal 1 orang harus diisi.');
							return;
							}

							el.closest('.mb-2').remove();
							updateIDInputs();
						}

						function updateIDInputs() {
							const rows = document.querySelectorAll('#input-wrapper .mb-2');
							rows.forEach((baris, i) => {
							const index = i + 1;
							const inputs = baris.querySelectorAll('input');
							if (inputs[0]) inputs[0].id = `idname_${index}`;
							if (inputs[1]) inputs[1].id = `idjabatan_${index}`;

							const tombol = baris.querySelector('.btn-hapus');
							const tombolWrapper = baris.querySelector('div:last-child');

							if (i === 0) {
								// Jika baris pertama, pastikan tidak ada tombol hapus
								if (tombol) tombol.remove();
								// Ganti dengan div kosong agar tetap sejajar
								if (!tombolWrapper || tombolWrapper.tagName === 'BUTTON') {
								const last = baris.querySelector('.d-flex');
								last.appendChild(document.createElement('div')).style.width = '70px';
								}
							} else {
								// Jika bukan baris pertama dan belum ada tombol, tambahkan tombol
								if (!tombol) {
								const div = baris.querySelector('.d-flex');
								const btn = document.createElement('button');
								btn.type = 'button';
								btn.className = 'btn btn-danger btn-sm btn-hapus';
								btn.textContent = 'Hapus';
								btn.onclick = function () {
									hapusBaris(btn);
								};
								div.appendChild(btn);
								}
							}
							});
						}

						document.addEventListener("DOMContentLoaded", updateIDInputs);
						</script>

						<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Untuk</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="funtuk" class="form-control" style="text-transform: capitalize;" placeholder="Ketik untuk apa" required>
						           	</div>
						    </div>
						</div>

						<div class="col-sm-6">
							    <div class="form-group">
						           	<label class="col-sm-12" style="font-weight: 500;">Tempat Tujuan</label>
						           	<div class="col-sm-12">
						               	<input type="text" name="ftempat_tujuan" class="form-control" style="text-transform: capitalize;" placeholder="Isi lokasi Tujuan" required>
						           	</div>
						    </div>
						</div>
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
							right: 20px;
							transform: translateY(-50%);
							background-color: #f8d7da;  /* merah muda transparan */
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

						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Lama Penugasan</label>
							<div class="col-sm-12 input-group-clearable">
							<input type="text" id="lamaInput" name="flama_penugasan" class="form-control"
								placeholder="Ketik angka saja..." required autocomplete="off">
							<span class="clear-btn" id="clearBtn">&times;</span>
							</div>
						</div>
						</div>

						<script>
						function angkaKeTeks(n) {
						const satuan = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan"];
						const belasan = ["sepuluh", "sebelas", "dua belas", "tiga belas", "empat belas", "lima belas", "enam belas", "tujuh belas", "delapan belas", "sembilan belas"];
						const puluhan = ["", "", "dua puluh", "tiga puluh", "empat puluh", "lima puluh", "enam puluh", "tujuh puluh", "delapan puluh", "sembilan puluh"];

						if (n === 0) return "nol";
						if (n === 1000) return "seribu";

						let hasil = "";

						if (n >= 100) {
							let ratus = Math.floor(n / 100);
							hasil += ratus === 1 ? "seratus" : satuan[ratus] + " ratus";
							n %= 100;
							if (n > 0) hasil += " ";
						}

						if (n >= 20) {
							let puluh = Math.floor(n / 10);
							hasil += puluhan[puluh];
							n %= 10;
							if (n > 0) hasil += " " + satuan[n];
						} else if (n >= 10) {
							hasil += belasan[n - 10];
						} else if (n > 0) {
							hasil += satuan[n];
						}

						return hasil;
						}

						const lamaInput = document.getElementById('lamaInput');
						const clearBtn = document.getElementById('clearBtn');

						lamaInput.addEventListener('input', function () {
						const raw = this.value.replace(/[^\d]/g, '');
						const angka = parseInt(raw);
						if (!isNaN(angka) && angka <= 1000) {
							const teks = angkaKeTeks(angka);
							this.value = `${angka} (${teks}) hari kerja`;
							clearBtn.style.display = 'block';
						} else {
							this.value = '';
							clearBtn.style.display = 'none';
						}
						});

						clearBtn.addEventListener('click', function () {
						lamaInput.value = '';
						lamaInput.focus();
						clearBtn.style.display = 'none';
						});
						</script>


						<div class="col-sm-6">
						<div class="form-group">
							<label class="col-sm-12" style="font-weight: 500;">Tanggal Penugasan</label>
							<div class="col-sm-12">
							<div class="d-flex justify-content-between" style="gap: 8px;">
								<input type="date" name="ftanggal_mulai" class="form-control" required>
								<input type="date" name="ftanggal_selesai" class="form-control" required>
							</div>
							<small class="form-text text-muted">Isi Tanggal Mulai dan Selesai Penugasan</small>
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