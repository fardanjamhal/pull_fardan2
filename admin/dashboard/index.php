<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
  include ('../part/akses.php');
	include ('../part/header.php');
  include('../part/sidebar.php');
?>

<div class="content-wrapper">
  <section class="content-header">
  	<h1>Dashboard</h1>
     	<ol class="breadcrumb">
       	<li><a href="#"><i class="fa fa-tachometer-alt"></i>Dashboard</a></li>
     	</ol>
  </section>
  <section class="content">

<style>
.blink-box {
  padding: 14px 24px;
  background: linear-gradient(to right, #e3f2fd, #bbdefb);
  border: 1px solid #64b5f6;
  border-radius: 12px;
  box-shadow: 0 0 12px rgba(100, 181, 246, 0.4);
  animation: softBlink 2s ease-in-out infinite;
  text-align: center;
  font-weight: 600;
  font-size: 18px;
  color: #0d47a1;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin-bottom: 20px;
}

@keyframes softBlink {
  0% {
    box-shadow: 0 0 6px rgba(100, 181, 246, 0.3);
    transform: scale(1);
  }
  50% {
    box-shadow: 0 0 20px rgba(100, 181, 246, 0.7);
    transform: scale(1.02);
  }
  100% {
    box-shadow: 0 0 6px rgba(100, 181, 246, 0.3);
    transform: scale(1);
  }
}
</style>

<?php
$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<div class="blink-box">
  <?php echo strtoupper($data['nama_desa']); ?>
</div>


  <br>
   	<div class="row">
      <?php 
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>

     	<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div style="
            background: linear-gradient(135deg, #007bff, #5fa8ff);
            color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.2);
            position: relative;
            overflow: hidden;
            padding: 24px;
            min-height: 160px;
            margin-top: 5px;
            margin-bottom: 20px;
          ">
          <div style="position: absolute; top: -20px; right: -20px; opacity: 0.1; font-size: 120px;">
            <i class="fas fa-users"></i>
          </div>

          <div style="position: relative; z-index: 1;">
            <h3 style="font-size: 36px; margin: 0; font-weight: bold;">
              <?php
                include ('../../config/koneksi.php');
                $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                echo mysqli_num_rows($qTampil);
              ?>
            </h3>
            <p style="margin: 5px 0 15px; font-size: 16px;">Data Penduduk</p>
            <a href="../penduduk/" style="color: white; text-decoration: underline; font-weight: 500;">
              Lihat detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div style="
            background: linear-gradient(135deg, #28a745, #74db94); /* Hijau */
            color: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(40, 167, 69, 0.2);
            position: relative;
            overflow: hidden;
            padding: 24px;
            min-height: 160px;
            margin-top: 5px;
            margin-bottom: 20px;
          ">
          <div style="position: absolute; top: -20px; right: -20px; opacity: 0.1; font-size: 120px;">
            <i class="fas fa-envelope-open-text"></i>
          </div>

          <div style="position: relative; z-index: 1;">
            <h3 style="font-size: 36px; margin: 0; font-weight: bold;">
              <?php
              $surat_dir = '../../surat';
              $folders = scandir($surat_dir);
              $union_queries = [];

              foreach ($folders as $folder) {
                if (
                  $folder != '.' &&
                  $folder != '..' &&
                  is_dir("$surat_dir/$folder") &&
                  (strpos($folder, 'surat_') === 0 || strpos($folder, 'formulir_') === 0)
                ) {
                  // Asumsikan nama folder == nama tabel
                  $union_queries[] = "SELECT tanggal_surat FROM $folder WHERE status_surat='pending'";
                }
              }

              $jumlahPermintaanSurat = 0;
              if (!empty($union_queries)) {
                include('../../config/koneksi.php');
                $sql_union = implode(" UNION ", $union_queries);
                $qTampil = mysqli_query($connect, $sql_union);
                if ($qTampil) {
                  $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
                }
              }

              echo $jumlahPermintaanSurat;
              ?>
            </h3>
            <p style="margin: 5px 0 15px; font-size: 16px;">Permintaan Surat</p>
            <a href="../surat/permintaan_surat/" style="color: white; text-decoration: underline; font-weight: 500;">
              Lihat detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div style="
            background: linear-gradient(135deg, #ff9800, #ff5722); /* Oranye cerah ke oranye kemerahan */
            color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(255, 87, 34, 0.35);
            position: relative;
            overflow: hidden;
            padding: 24px;
            min-height: 160px;
            margin-top: 5px;
            margin-bottom: 20px;
          ">
          <!-- Icon besar sebagai latar dekoratif -->
          <div style="position: absolute; top: -20px; right: -20px; opacity: 0.15; font-size: 120px;">
            <i class="fas fa-envelope"></i>
          </div>

          <div style="position: relative; z-index: 1;">
            <h3 style="font-size: 36px; margin: 0; font-weight: bold; color: #fff;">
              <?php
              $surat_dir = '../../surat';
              $folders = scandir($surat_dir);
              $union_queries = [];

              foreach ($folders as $folder) {
                if (
                  $folder != '.' &&
                  $folder != '..' &&
                  is_dir("$surat_dir/$folder") &&
                  (strpos($folder, 'surat_') === 0 || strpos($folder, 'formulir_') === 0)
                ) {
                  $union_queries[] = "SELECT tanggal_surat FROM $folder WHERE status_surat='selesai'";
                }
              }

              $jumlahSelesai = 0;
              if (!empty($union_queries)) {
                include('../../config/koneksi.php');
                $sql_union = implode(" UNION ", $union_queries);
                $qTampil = mysqli_query($connect, $sql_union);
                if ($qTampil) {
                  $jumlahSelesai = mysqli_num_rows($qTampil);
                }
              }

              echo $jumlahSelesai;
              ?>
            </h3>
            <p style="margin: 5px 0 15px; font-size: 16px; color: #fff;">Surat Selesai</p>
            <a href="../surat/surat_selesai/" style="color: #fff; text-decoration: underline; font-weight: 500;">
              Lihat detail <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <br>

      <?php 
        } else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
      ?>
      <div class="col-lg-1"></div>
      <div class="col-lg-5 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3>
              <?php
                include ('../../config/koneksi.php');

                $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
                $jumlahPenduduk = mysqli_num_rows($qTampil);
                echo $jumlahPenduduk;
              ?>
            </h3>
            <p>Data Penduduk</p>
          </div>
          <div class="icon">
            <i class="fas fa-users" style="font-size:70px"></i>
          </div>
          <a href="../penduduk/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-5 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>
             <?php
                $surat_dir = '../../surat';
                $folders = scandir($surat_dir);
                $union_queries = [];

                foreach ($folders as $folder) {
                  if (
                    $folder != '.' &&
                    $folder != '..' &&
                    is_dir("$surat_dir/$folder") &&
                    (strpos($folder, 'surat_') === 0 || strpos($folder, 'formulir_') === 0)
                  ) {
                    // Asumsikan nama folder = nama tabel
                    $union_queries[] = "SELECT tanggal_surat FROM $folder WHERE status_surat='selesai'";
                  }
                }

                $sql_union = implode(" UNION ", $union_queries);

                $qTampil = mysqli_query($connect, $sql_union);
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);

                echo $jumlahPermintaanSurat;
                ?>
            </h3>
            <p>Laporan Surat Administrasi Desa - Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-envelope" style="font-size:70px"></i>
          </div>
          <a href="../laporan/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <?php  
        }
      ?>
   	</div>
   	<div class="container-fluid">
   		<div class="row">
   			<div class="box box-default">
     			<div class="box-header with-border">
     				<h3 class="box-title">Welcome Home!</h3>
       			<div class="box-tools pull-right">
         			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
         			<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
       			</div>
      		</div>
      		<div class="box-body">
     				<div class="row">
       				<form class="form-horizontal" method="post" action="simpan-penduduk.php">
       					<div class="col-md-12">
                  <div class="col-md-4" style="text-align: center;">

                   <?php
                    $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
                    $data = mysqli_fetch_assoc($query);
                    ?>
                    <img src="../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 120px; height: auto;">

                    <?php  
                      $qTampilDesa = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '1'");
                      foreach($qTampilDesa as $row){
                    ?>
                    <p style="font-size: 20pt; font-weight: 500; text-transform: uppercase;"><strong><?php echo $row['nama_desa']; ?></strong><hr>
                    <?php  
                      }
                    ?>
                  </div>
                  <div class="col-md-8">
                    <div class="pull-right">
                      <?php
                        $tanggal = date('D d F Y');
                        $hari = date('D', strtotime($tanggal));
                        $bulan = date('F', strtotime($tanggal));
                        $hariIndo = array(
                          'Mon' => 'Senin',
                          'Tue' => 'Selasa',
                          'Wed' => 'Rabu',
                          'Thu' => 'Kamis',
                          'Fri' => 'Jumat',
                          'Sat' => 'Sabtu',
                          'Sun' => 'Minggu',
                        );
                        $bulanIndo = array(
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
                        echo $hariIndo[$hari] . ', ' . date('d ') . $bulanIndo[$bulan] . date(' Y');
                      ?>
                    </div><br>
                    <div style="font-size: 35pt; font-weight: 500;"><p>Halo, <strong><?php echo $_SESSION['lvl']; ?></strong></div>
                    <div style="font-size: 15pt; font-weight: 500;"><p>Selamat datang di Aplikasi Pelayanan Surat Administrasi.</p></div><br><br><br>
                  </div>
        				</div>
              </form>
        		</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>