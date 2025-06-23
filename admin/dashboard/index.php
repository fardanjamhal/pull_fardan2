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
                $qTampil = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan WHERE status_surat='pending' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_berkelakuan_baik WHERE status_surat='pending' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kepemilikan_kendaraan_bermotor WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_perhiasan WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_usaha WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_lapor_hajatan WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_pengantar_skck WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_tidak_mampu WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM formulir_pengantar_nikah WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM formulir_permohonan_kehendak_nikah WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM formulir_persetujuan_calon_pengantin WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM formulir_persetujuan_calon_pengantin_istri WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM formulir_surat_izin_orang_tua WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kematian WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili_usaha WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_pengantar WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_beda_identitas WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_beda_identitas_kis WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_penghasilan_orang_tua WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_pengantar_hewan WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kematian_dan_penguburan WHERE status_surat='pending'
                  UNION SELECT tanggal_surat FROM surat_keterangan_pindah_penduduk WHERE status_surat='pending'
                  ");
                $jumlahPermintaanSurat = mysqli_num_rows($qTampil);
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
                $qTampil = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan WHERE status_surat='selesai' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_berkelakuan_baik WHERE status_surat='selesai' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kepemilikan_kendaraan_bermotor WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_perhiasan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_usaha WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_lapor_hajatan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_pengantar_skck WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_tidak_mampu WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_pengantar_nikah WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_permohonan_kehendak_nikah WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_persetujuan_calon_pengantin WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_persetujuan_calon_pengantin_istri WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_surat_izin_orang_tua WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kematian WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili_usaha WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_pengantar WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_beda_identitas WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_beda_identitas_kis WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_penghasilan_orang_tua WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_pengantar_hewan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kematian_dan_penguburan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_pindah_penduduk WHERE status_surat='selesai'
                  ");
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
                $qTampil = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan WHERE status_surat='selesai' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_berkelakuan_baik WHERE status_surat='selesai' 
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kepemilikan_kendaraan_bermotor WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_perhiasan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_usaha WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_lapor_hajatan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_pengantar_skck WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_tidak_mampu WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_pengantar_nikah WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_permohonan_kehendak_nikah WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_persetujuan_calon_pengantin WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_persetujuan_calon_pengantin_istri WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM formulir_surat_izin_orang_tua WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kematian WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_domisili_usaha WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_pengantar WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_beda_identitas WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_beda_identitas_kis WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_penghasilan_orang_tua WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_pengantar_hewan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_kematian_dan_penguburan WHERE status_surat='selesai'
                  UNION SELECT tanggal_surat FROM surat_keterangan_pindah_penduduk WHERE status_surat='selesai'
                  ");
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
                    <p style="font-size: 20pt; font-weight: 500; text-transform: uppercase;"><strong>DESA <?php echo $row['nama_desa']; ?></strong><hr>
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
                    <div style="font-size: 15pt; font-weight: 500;"><p>Selamat datang di <a href="#" style="text-decoration:none"><strong>Web Aplikasi Pelayanan Surat Administrasi Desa Online.</strong></a></p></div><br><br><br>
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