<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
  	<?php
	include('../../../config/koneksi.php');

	// Ambil data dari profil_desa
	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Cek apakah ada favicon tersimpan, jika tidak pakai default
	$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
	?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../../../assets/img/<?php echo $favicon; ?>">

 	<title>ADMIN | e-SuratDesa</title>
 	<!-- Tell the browser to be responsive to screen width -->
 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 	<!-- Bootstrap 3.3.7 -->
 	<link rel="stylesheet" href="../../../assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.css">
 	<!-- Font Awesome -->
 	<link rel="stylesheet" href="../../../assets/AdminLTE/bower_components/font-awesome/css/fontawesome.css">
 	<!-- Ionicons -->
 	<link rel="stylesheet" href="../../../assets/AdminLTE/bower_components/Ionicons/css/ionicons.css">
 	<!-- Theme style -->
 	<link rel="stylesheet" href="../../../assets/AdminLTE/dist/css/AdminLTE.css">
 	<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
 	<link rel="stylesheet" href="../../../assets/AdminLTE/dist/css/skins/_all-skins.css">
 	<!-- bootstrap wysihtml5 - text editor -->
 	<link rel="stylesheet" href="../../../assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 	<!-- Font Awesome v5.8.2 -->
 	<link rel="stylesheet" href="../../../assets/fontawesome-free-5.10.2-web/css/all.css">
 	<!-- CSS DataTable -->
 	<link rel="stylesheet" href="../../../assets/datatables/jquery.dataTables.css" />
 	<link rel="stylesheet" href="../../../assets/datatables/dataTables.bootstrap.css" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<header class="main-header">

  	<nav class="navbar navbar-static-top">
  		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
   			<span class="sr-only">Toggle navigation</span>
  		</a>
  		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
   				<li class="user user-menu">
     				<a href="../profil_desa/ganti_akun.php">
     					<i class="fas fa-key"></i><span class="hidden-xs"> Ganti Password</span>
     				</a>
   				</li>
  			</ul>
  			<ul class="nav navbar-nav">
   				<li class="user user-menu">
     				<a href="../../../login/logout.php">
     					<i class="fas fa-sign-out-alt"></i><span class="hidden-xs"> Logout</span>
     				</a>
   				</li>
  			</ul>
  		</div>
  	</nav>
	</header>