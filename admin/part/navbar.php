<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-lg py-1" style="background: linear-gradient(90deg, #0d47a1, #1976d2); box-shadow: 0 4px 12px rgba(0,174,255,0.4);">
  <a class="navbar-brand d-flex align-items-center ml-3" href="#">
    <img src="assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo" style="width: 45px; margin-right: 10px;">
  </a>

  <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
    <ul class="navbar-nav ml-auto text-right">
      <li class="nav-item mx-lg-2 my-1 my-lg-0 active-nav-bg">
        <a class="nav-link text-light" href="#"><i class="fas fa-home"></i> Beranda</a>
      </li>
      <li class="nav-item mx-lg-2 my-1 my-lg-0">
        <a class="nav-link text-light" href="surat"><i class="fas fa-envelope-open-text"></i> Buat Surat</a>
      </li>
      <li class="nav-item mx-lg-2 my-1 my-lg-0">
        <a class="nav-link text-light" href="tentang"><i class="fas fa-info-circle"></i> Tentang Kami</a>
      </li>
      <li class="nav-item mx-2 mt-1">
        <?php if (empty($_SESSION['username'])): ?>
          <a class="btn btn-outline-light btn-sm" href="login/">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
        <?php elseif (isset($_SESSION['lvl'])): ?>
          <a class="btn btn-outline-light btn-sm mr-2" href="admin/">
            <i class="fas fa-user-shield"></i> <?php echo $_SESSION['lvl']; ?>
          </a>
          <a class="btn btn-danger btn-sm" href="login/logout.php">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav>

 	  <style>
		/* Tampilan nav aktif: latar putih, teks biru */
      .active-nav-bg {
        background-color: #ffffff; /* latar putih */
        color: #0d47a1 !important; /* teks biru */
        border-radius: 6px;
        font-weight: 600;
        transition: all 0.3s ease;
      }

      /* Jika link di dalam elemen .active-nav-bg */
      .active-nav-bg i,
      .active-nav-bg span,
      .active-nav-bg a {
        color: #0d47a1 !important; /* pastikan icon/teks juga biru */
      }
		</style>

		<!-- Optional CSS tweak for better mobile spacing -->
		<style>
		@media (max-width: 991.98px) {
			.navbar-nav .nav-item {
			text-align: center;
			}
			.navbar-nav .nav-link {
			font-size: 18px;
			padding: 10px 0;
			}
			.navbar-nav .btn {
			width: 80%;
			margin: 0 auto;
			}
      /* Hapus efek kotak putih saat di HP */
			.active-nav-bg {
			background-color: transparent !important;
			color: #ffffff !important; /* kembali ke putih */
			padding: 0; /* opsional: hilangkan padding ekstra */
			font-weight: normal;
			}

			.active-nav-bg i,
			.active-nav-bg a,
			.active-nav-bg span {
			color: #ffffff !important;
			}
		}
		</style>
