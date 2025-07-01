<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          } else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'profil_desa') ? 'active' : '' ?>">
        <a href="../profil_desa/">
          <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'data_kades_kel') ? 'active' : '' ?>">
        <a href="../data_kades_kel/">
          <i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'penduduk') ? 'active' : '' ?>">
        <a href="../penduduk/">
          <i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'permintaan_surat') ? 'active' : '' ?>">
        <a href="../surat/permintaan_surat/">
          <i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'surat_selesai') ? 'active' : '' ?>">
        <a href="../surat/surat_selesai/">
          <i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span>
        </a>
      </li>

      <li class="<?= ($current_path == 'laporan') ? 'active' : '' ?>">
        <a href="../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
