<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg py-1" style="background: linear-gradient(90deg, #0d47a1, #1976d2); box-shadow: 0 4px 12px rgba(0,174,255,0.4);">
  <a class="navbar-brand d-flex align-items-center ml-3" href="#">
    <img src="assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo" style="width: 45px; margin-right: 10px;">
  </a>

  <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarContent">
    <span class="navbar-toggler-icon"></span>
  </button>

    <div class="collapse navbar-collapse justify-content-end text-right" id="navbarContent">
    <ul class="navbar-nav ml-auto text-right ">
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="#"><i class="fas fa-home"></i> Beranda</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="surat"><i class="fas fa-envelope-open-text"></i> Buat Surat</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link text-light" href="tentang"><i class="fas fa-info-circle"></i> Tentang Kami</a>
      </li>
      <li class="nav-item mx-2 mt-1">
        <?php
        session_start();
        if (empty($_SESSION['username'])) {
          echo '<a class="btn btn-outline-light btn-sm" href="login/"><i class="fas fa-sign-in-alt"></i> Login</a>';
        } else if (isset($_SESSION['lvl'])) {
          echo '<a class="btn btn-outline-light btn-sm mr-2" href="admin/"><i class="fas fa-user-shield"></i> ' . $_SESSION['lvl'] . '</a>';
          echo '<a class="btn btn-danger btn-sm" href="login/logout.php"><i class="fas fa-sign-out-alt"></i></a>';
        }
        ?>
      </li>
    </ul>
  </div>
</nav>