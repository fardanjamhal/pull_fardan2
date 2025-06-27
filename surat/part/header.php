<!-- NAVBAR -->
<?php
	include('../../config/koneksi.php');
	$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
	$data = mysqli_fetch_assoc($query);
	?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg py-1" style="background: linear-gradient(90deg, #0d47a1, #1976d2); box-shadow: 0 4px 12px rgba(0,174,255,0.4);">
  <a class="navbar-brand d-flex align-items-center ml-3" href="../../">
    <img src="../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo" style="width: 45px; margin-right: 10px;">
  </a>

  <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarContent">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse justify-content-end text-right" id="navbarContent">
    <ul class="navbar-nav ml-auto text-right ">
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../../"><i class="fas fa-home"></i> Beranda</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../../surat/"><i class="fas fa-envelope-open-text"></i> Buat Surat</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="../../tentang/"><i class="fas fa-info-circle"></i> Tentang Kami</a>
      </li>
      <li class="nav-item mx-2 mt-1">
        <?php
        session_start();
        if (empty($_SESSION['username'])) {
          echo '<a class="btn btn-outline-light btn-sm" href="../../login/"><i class="fas fa-sign-in-alt"></i> Login</a>';
        } else if (isset($_SESSION['lvl'])) {
          echo '<a class="btn btn-outline-light btn-sm mr-2" href="../../admin/"><i class="fas fa-user-shield"></i> ' . $_SESSION['lvl'] . '</a>';
          echo '<a class="btn btn-danger btn-sm" href="../../login/logout.php"><i class="fas fa-sign-out-alt"></i></a>';
        }
        ?>
      </li>
    </ul>
  </div>
</nav>


<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="../../assets/img/mini-logo.png" />
	<title>Buat Surat - <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>

	<!-- Bootstrap 4 CSS -->
	<link
		rel="stylesheet"
		href="../../assets/bootstrap-4.3.1-dist/css/bootstrap.min.css"
	/>
	<!-- FontAwesome -->
	<link
		rel="stylesheet"
		href="../../assets/fontawesome-free-5.10.2-web/css/all.css"
	/>
	<!-- Flatpickr CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body class="bg-light">
	
	<!-- Tambahkan ini sebelum </body> di footer.php untuk fungsi navbar toggle -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="../../assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
