<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <?php
	include('../../../../../config/koneksi.php');

	// Ambil data dari profil_desa
	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);

	// Cek apakah ada favicon tersimpan, jika tidak pakai default
	$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
	?>

	<!-- Favicon -->
	<link rel="shortcut icon" href="../../../../../assets/img/<?php echo $favicon; ?>">


 	<title>Admin <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>
 	<!-- Tell the browser to be responsive to screen width -->
 	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 	<!-- Bootstrap 3.3.7 -->
 	<link rel="stylesheet" href="../../../../../assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
 	<!-- Font Awesome -->
 	<link rel="stylesheet" href=".../../../../../assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
 	<!-- Ionicons -->
 	<link rel="stylesheet" href="../../../../../assets/AdminLTE/bower_components/Ionicons/css/ionicons.css">
 	<!-- Theme style -->
 	<link rel="stylesheet" href="../../../../../assets/AdminLTE/dist/css/AdminLTE.css">
 	<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
 	<link rel="stylesheet" href="../../../../../assets/AdminLTE/dist/css/skins/_all-skins.css">
 	<!-- bootstrap wysihtml5 - text editor -->
 	<link rel="stylesheet" href="../../../../../assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
 	<!-- Font Awesome v5.8.2 -->
 	<link rel="stylesheet" href="../../../../../assets/fontawesome-free-5.10.2-web/css/all.css">
 	<!-- CSS DataTable -->
 	<link rel="stylesheet" href="../../../../../assets/datatables/jquery.dataTables.css" />
 	<link rel="stylesheet" href="../../../../../assets/datatables/dataTables.bootstrap.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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
            <a href="../../../../../login/logout.php">
              <i class="fas fa-sign-out-alt"></i><span class="hidden-xs"> Logout</span>
                </a>
            </li>
          </ul>
      </div>
    </nav>
	</header>

  <style>
  /* Gaya dasar sidebar */
.sidebar-menu li a {
  color: #333;
  padding: 10px 15px;
  display: block;
}

.sidebar-menu li.active > a {
  background-color: #007bff !important;
  color: #fff !important;
}

.sidebar-menu li a {
  color: #333;
  display: block;
  padding: 10px 15px;
  transition: background-color 0.3s, color 0.3s;
  border-radius: 8px;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 10px;
}

/* Efek hover */
.sidebar-menu li a:hover {
  background-color: #e6f0ff;
  color: #007bff;
}

/* Menu aktif */
.sidebar-menu li.active > a {
  background-color: #007bff; /* biru keren */
  color: #fff; /* teks putih */
  font-weight: bold;
}

/* Ikon dalam menu */
.sidebar-menu li a i {
  font-size: 16px; /* ikon diperbesar */
  color: #fff; /* ikon putih */
  transition: color 0.3s;
}

/* Hover dan aktif ikon */
.sidebar-menu li a:hover i {
  color: #007bff;
}

.sidebar-menu li.active i {
  color: #fff;
}
</style>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          } else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
   <?php
    $current_path = basename(dirname($_SERVER['PHP_SELF'])); // folder aktif
    ?>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      
      <li class="<?= ($current_path == 'dashboard') ? 'active' : '' ?>">
        <a href="../../../../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'profil_desa') ? 'active' : '' ?>">
        <a href="../../../../profil_desa/">
          <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'data_kades_kel') ? 'active' : '' ?>">
        <a href="../../../../data_kades_kel/">
          <i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'penduduk') ? 'active' : '' ?>">
        <a href="../../../../penduduk/">
          <i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'kirim_email') ? 'active' : '' ?>">
        <a href="../../../../kirim_email/">
          <i class="fas fa-envelope"></i> <span>&nbsp;&nbsp;&nbsp;Kirim Email</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'permintaan_surat') ? 'active' : '' ?>">
        <a href="../../../../surat/permintaan_surat/">
          <i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'surat_selesai') ? 'active' : '' ?>">
        <a href="../../../../surat/surat_selesai/">
          <i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'laporan') ? 'active' : '' ?>">
        <a href="../../../../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>