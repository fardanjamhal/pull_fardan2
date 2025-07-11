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
  padding: 10px;
  background-color: #fff3cd;
  border: 2px solid #ff9900;
  border-radius: 15px;
  box-shadow: 0 0 25px rgba(255, 153, 0, 0.7);
  animation: blinkGlowStrong 1.2s ease-in-out infinite;
  text-align: center;
  font-weight: bold;
  font-size: 18px;
  color: #b35b00;
}

@keyframes blinkGlowStrong {
  0% {
    box-shadow: 0 0 10px rgba(255, 153, 0, 0.3);
    background-color: #fff3cd;
  }
  50% {
    box-shadow: 0 0 40px rgba(255, 153, 0, 1);
    background-color: #ffe8a1;
  }
  100% {
    box-shadow: 0 0 10px rgba(255, 153, 0, 0.3);
    background-color: #fff3cd;
  }
}
</style>
 <?php
  $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
  $data = mysqli_fetch_assoc($query);
  ?>
<div class="blink-box">
  <strong><?php echo strtoupper($data['nama_desa']); ?></strong>
</div>


  
  <br>


   	<div class="row">
      <?php 
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>

     	<div class="col-lg-4 col-xs-6">
        <div class="small-box" style="background-color:#007bff; color:white;">
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
          <a href="../penduduk/" class="small-box-footer" style="color:white;">
            Lihat detail <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-xs-6">
       	<div class="small-box bg-green">
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
                  // Asumsikan nama folder == nama tabel
                  $union_queries[] = "SELECT tanggal_surat FROM $folder WHERE status_surat='pending'";
                }
              }

              // Gabungkan semua query UNION
              $sql_union = implode(" UNION ", $union_queries);

              // Jalankan query
              $qTampil = mysqli_query($connect, $sql_union);
              $jumlahPermintaanSurat = mysqli_num_rows($qTampil);

              // Tampilkan hasil
              echo $jumlahPermintaanSurat;
              ?>
            </h3>
         		<p>Permintaan Surat</p>
         	</div>
         	<div class="icon">
         		<i class="fas fa-envelope-open-text" style="font-size:70px"></i>
         	</div>
         	<a href="../surat/permintaan_surat/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
       	</div>
      </div>
      <div class="col-lg-4 col-xs-6">
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
         		<p>Surat Selesai</p>
         	</div>
         	<div class="icon">
         		<i class="fas fa-envelope" style="font-size:70px"></i>
         	</div>
         	<a href="../surat/surat_selesai/" class="small-box-footer">Lihat detail <i class="fa fa-arrow-circle-right"></i></a>
       	</div>
      </div>
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