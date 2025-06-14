<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../assets/img/mini-logo.png">
	<title>e-SuratDesa</title>
  	<link rel="stylesheet" href="../assets/fontawesome-free-5.10.2-web/css/all.css">
	<link rel="stylesheet" href="../assets/bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body class="bg-light">
	
	<navbar class="navbar navbar-expand-lg navbar-dark bg-dark">
	  	<a class="navbar-brand ml-4 mt-1" href="../"><img src="../assets/img/e-SuratDesa.png"></a>
	  	<button class="navbar-toggler mr-4 mt-3" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	  	</button>

	  	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
	    	<ul class="navbar-nav ml-auto mt-lg-3 mr-5 position-relative text-right">
	      		<li class="nav-item">
	        		<a class="nav-link" href="../">HOME</a>
	      		</li>
	      		<li class="nav-item active">
	        		<a class="nav-link" href="#"><i class="fas fa-envelope"></i>&nbsp;BUAT SURAT</a>
	      		</li>
	      		<li class="nav-item">
	        		<a class="nav-link" href="../tentang/">TENTANG <b>e-SuratDesa</b></a>
	      		</li>
	      		<li class="nav-item active ml-5">
	      			<?php
						session_start();
						if(empty($_SESSION['username'])){
						    echo '<a class="btn btn-light text-info" href="../login/"><i class="fas fa-sign-in-alt"></i>&nbsp;LOGIN</a>';
						}else if(isset($_SESSION['lvl'])){
							echo '<a class="btn btn-transparent text-light" href="../admin/"><i class="fa fa-user-cog"></i> '; echo $_SESSION['lvl']; echo '</a>';
							echo '<a class="btn btn-transparent text-light" href="../login/logout.php"><i class="fas fa-power-off"></i></a>';
						}
					?>
	      		</li>
	    	</ul>
	  	</div>
	</navbar>

<div class="container-fluid">
	<div style="max-height:cover; padding-top:30px; padding-bottom:60px; position:relative; min-height: 100%;">
		<div>
			<?php 
   	        	if(isset($_GET['pesan'])){
                   	if($_GET['pesan']=="berhasil"){
                  		echo "<div class='alert alert-success'><center>Berhasil membuat surat. Silahkan ambil surat di Kantor Desa di hari kerja!</center></div>";
              		}
              	}
           	?>
		</div>
		<div class="row">
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN USAHA</h5><br>
		        		<a href="surat_keterangan_usaha/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN DOMISILI</h5><br>
		        		<a href="surat_keterangan_domisili/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN DOMISILI USAHA</h5><br>
		        		<a href="surat_keterangan_domisili_usaha/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			

			<!-- CSS untuk Popup -->
				<style>
				.popup-modal {
					display: none;
					position: fixed;
					z-index: 9999;
					left: 0;
					top: 0;
					width: 100%;
					height: 100%;
					background-color: rgba(0,0,0,0.5);
				}

				.popup-content {
					background-color: #fff;
					margin: 10% auto;
					padding: 20px 30px;
					border-radius: 8px;
					width: 400px;
					text-align: center;
					position: relative;
				}

				.popup-content h5 {
					margin-bottom: 20px;
					font-size: 18px;
				}

				.popup-content a {
					display: block;
					margin: 8px 0;
				}

				.popup-note {
					margin-top: 20px;
					font-size: 13px;
					text-align: left;
					background: #f9f9f9;
					padding: 10px;
					border-radius: 6px;
					border: 1px solid #ddd;
				}

				.popup-note b {
					display: block;
					margin-bottom: 5px;
				}

				.close-btn {
					position: absolute;
					top: 10px;
					right: 15px;
					font-size: 18px;
					font-weight: bold;
					cursor: pointer;
				}
				</style>

				<!-- Kartu Surat dengan Button -->
				<div class="col-sm-3 mt-4">
				<div class="card">
					<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
					<div class="card-body text-center">
					<h5 class="card-title">FORMULIR PENGANTAR NIKAH <br>(Model N1-N5)</h5><br>
					<button class="btn btn-info" onclick="openPopup()">BUAT SURAT</button>
					</div>
				</div>
				</div>

				<!-- Popup Modal dengan 5 Link dan Keterangan -->
				<div id="popup" class="popup-modal">
				<div class="popup-content">
					<span class="close-btn" onclick="closePopup()">&times;</span>
					<h5>Pilih Jenis Formulir</h5>
					<a href="formulir_pengantar_nikah/" class="btn btn-primary">Formulir N1</a>
					<a href="formulir_permohonan_kehendak_nikah/" class="btn btn-warning">Formulir N2</a>
					<a href="formulir_persetujuan_calon_pengantin/" class="btn btn-success">Formulir N4 - Pria</a>
					<a href="formulir_persetujuan_calon_pengantin_istri/" class="btn btn-success">Formulir N4 - Wanita</a>
					<a href="formulir_surat_izin_orang_tua/" class="btn btn-danger">Formulir N5</a>

					<!-- Keterangan Formulir -->
					<div class="popup-note">
					<b>Keterangan Formulir :</b>
					<span style="font-weight: bold;">Model N1 :</span> Formulir Pengantar Nikah <br>
					<span style="font-weight: bold;">Model N2 :</span> Formulir Permohonan Kehendak Nikah
					<span style="font-weight: bold;">Model N4 :</span> Formulir Persetujuan Calon Pengantin
					<span style="font-weight: bold;">Model N5 :</span> Formulir Surat Izin Orang Tua
					</div>
				</div>
				</div>

				<!-- Script untuk Popup -->
				<script>
				function openPopup() {
					document.getElementById("popup").style.display = "block";
				}

				function closePopup() {
					document.getElementById("popup").style.display = "none";
				}

				window.onclick = function(event) {
					const popup = document.getElementById("popup");
					if (event.target == popup) {
					popup.style.display = "none";
					}
				}
				</script>




			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN</h5><br>
		        		<a href="surat_keterangan/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN KEMATIAN</h5><br>
		        		<a href="surat_keterangan_kematian/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN BERKELAKUAN BAIK</h5><br>
		        		<a href="surat_keterangan_berkelakuan_baik/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN KEPEMILIKAN KENDARAAN BERMOTOR</h5><br>
		        		<a href="surat_keterangan_kepemilikan_kendaraan_bermotor/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN PERHIASAN</h5><br>
		        		<a href="surat_keterangan_perhiasan/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT LAPOR HAJATAN</h5><br>
		        		<a href="surat_lapor_hajatan/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT PENGANTAR SKCK</h5><br>
		        		<a href="surat_pengantar_skck/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
			<div class="col-sm-3 mt-4">
		    	<div class="card">
		      		<img src="../assets/img/menu-surat.jpg" class="card-img-top" alt="...">
		      		<div class="card-body text-center">
		        		<h5 class="card-title">SURAT KETERANGAN TIDAK MAMPU</h5><br>
		        		<a href="surat_keterangan_tidak_mampu/" class="btn btn-info">BUAT SURAT</a>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>
</div>

	<div class="card-footer py-2 text-center">
			<div class="footer text-center">
				<span class="text-dark">
				<strong>&copy; <span id="year"></span> 
					<a href="#" class="text-decoration-none text-dark">Pelayanan Surat Desa</a>
				</strong>
				</span>
			</div>
			<script>
				document.getElementById("year").textContent = new Date().getFullYear();
			</script>
	</div>

<!-- Tambahkan file JS Bootstrap agar navbar toggle berfungsi -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
