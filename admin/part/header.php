<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<?php
	include('../../config/koneksi.php');

	// Ambil data dari profil_desa
	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Cek apakah ada favicon tersimpan, jika tidak pakai default
	$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
	?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../../assets/img/<?php echo $favicon; ?>">


 	<title>ADMIN | e-SuratDesa</title>
 	<!-- Tell the browser to be responsive to screen width -->
 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 	<!-- Bootstrap 3.3.7 -->
 	<link rel="stylesheet" href="../../assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
 	<!-- Font Awesome -->
 	<link rel="stylesheet" href="../../assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
 	<!-- Ionicons -->
 	<link rel="stylesheet" href="../../assets/AdminLTE/bower_components/Ionicons/css/ionicons.css">
 	<!-- Theme style -->
 	<link rel="stylesheet" href="../../assets/AdminLTE/dist/css/AdminLTE.css">
 	<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
 	<link rel="stylesheet" href="../../assets/AdminLTE/dist/css/skins/_all-skins.css">
 	<!-- bootstrap wysihtml5 - text editor -->
 	<link rel="stylesheet" href="../../assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 	<!-- Font Awesome v5.8.2 -->
 	<link rel="stylesheet" href="../../assets/fontawesome-free-5.10.2-web/css/all.css">
 	<!-- CSS DataTable -->
 	<link rel="stylesheet" href="../../assets/datatables/jquery.dataTables.css" />
 	<link rel="stylesheet" href="../../assets/datatables/dataTables.bootstrap.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">

<script>
                        function salinTeks(teks) {
                        navigator.clipboard.writeText(teks).then(function () {
                            tampilkanToast("✅ Berhasil disalin: " + teks);
                        }, function (err) {
                            tampilkanToast("❌ Gagal menyalin");
                        });
                        }

                        function tampilkanToast(pesan) {
                        const toast = document.getElementById("toast-salin");
                        toast.innerText = pesan;
                        toast.classList.add("show");

                        // Hilangkan setelah 3 detik
                        setTimeout(() => {
                            toast.classList.remove("show");
                        }, 3000);
                        }
                        </script>

                        <style>
                        #toast-salin {
                        position: fixed;
                        bottom: 40px;
                        left: 50%;
                        transform: translateX(-50%);
                        background: linear-gradient(135deg, #4CAF50, #2E7D32);
                        color: #fff;
                        padding: 12px 20px;
                        border-radius: 8px;
                        font-size: 14px;
                        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
                        z-index: 9999;
                        opacity: 0;
                        pointer-events: none;
                        transition: opacity 0.5s ease, transform 0.5s ease;
                        }

                        #toast-salin.show {
                        opacity: 1;
                        transform: translateX(-50%) translateY(-10px);
                        pointer-events: auto;
                        }
                        </style>

                        <div id="toast-salin"></div>

<div class="wrapper">
	<header class="main-header">

  	<nav class="navbar navbar-static-top">
  		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
   			<span class="sr-only">Toggle navigation</span>
  		</a>
  		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
   				<li class="user user-menu">
     				<a href="../profil_desa/password.php">
     					<i class="fas fa-key"></i><span class="hidden-xs"> Ganti Password</span>
     				</a>
   				</li>
  			</ul>
  			<ul class="nav navbar-nav">
   				<li class="user user-menu">
     				<a href="../../login/logout.php">
     					<i class="fas fa-sign-out-alt"></i><span class="hidden-xs"> Logout</span>
     				</a>
   				</li>
  			</ul>
  		</div>
  	</nav>
	</header>