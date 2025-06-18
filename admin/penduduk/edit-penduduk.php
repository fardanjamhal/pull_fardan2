<?php 
  include ('../part/akses.php');
  include ('../../config/koneksi.php');
  include ('../part/header.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT * FROM penduduk WHERE id_penduduk='$id'");
  while($row = mysqli_fetch_array($qCek)){
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>



  <li>
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../profil_desa/">
          <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
        </a>
      </li>
      <li>
   			<a href="../data_kades_kel/">
     			<i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
   			</a>
   		</li>
      <li class="active">
        <a href="#"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a>
      </li>
      <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
      <li>
        <a href="../surat/permintaan_surat/">
          <i class="fa fa-file-alt"></i>
          <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>

      <li>
        <a href="../surat/surat_selesai/">
          <i class="fa fa-check-circle"></i>
          <span>&nbsp;Surat Selesai</span>
        </a>
      </li>
      <?php 
        }else{
          
        }
      ?>
      <li>
        <a href="../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
        </a>
      </li>


    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-edit"></i> Edit Data Penduduk</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <form class="form-horizontal" method="post" action="update-penduduk.php">
                <div class="col-md-6">
                  <div class="box-body">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $row['id_penduduk']; ?>">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">NIK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnik" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" value="<?php echo $row['nik']; ?>" required>
                        <script>
                          function hanyaAngka(evt){
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                            return true;
                          }
                        </script>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnama" class="form-control" style="text-transform: capitalize;" placeholder="Nama" value="<?php echo $row['nama']; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Tempat Lahir</label>
                      <div class="col-sm-8">
                        <input type="text" name="ftempat_lahir" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['tempat_lahir']; ?>" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Tanggal Lahir</label>
                      <div class="col-sm-8">
                        <input type="date" name="ftgl_lahir" class="form-control" value="<?php echo $row['tgl_lahir']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Jenis Kelamin</label>
                      <div class="col-sm-8">
                        <select name="fjenis_kelamin" class="form-control">
                          <option value="">-- PILIH JENIS KELAMIN --</option>
                          <option value="LAKI-LAKI" <?php if($row['jenis_kelamin'] == 'LAKI-LAKI') echo 'selected'; ?>>LAKI-LAKI</option>
                          <option value="PEREMPUAN" <?php if($row['jenis_kelamin'] == 'PEREMPUAN') echo 'selected'; ?>>PEREMPUAN</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Agama</label>
                      <div class="col-sm-8">
                        <input type="text" name="fagama" class="form-control" style="text-transform: capitalize;" placeholder="Agama" value="<?php echo $row['agama']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Jalan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fjalan" class="form-control" style="text-transform: capitalize;" placeholder="Jalan" value="<?php echo $row['jalan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Dusun</label>
                      <div class="col-sm-8">
                        <input type="text" name="fdusun" class="form-control" style="text-transform: capitalize;" placeholder="Dusun" value="<?php echo $row['dusun']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">RT</label>
                      <div class="col-sm-8">
                        <input type="text" name="frt" class="form-control" style="text-transform: capitalize;" placeholder="RT" value="<?php echo $row['rt']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">RW</label>
                      <div class="col-sm-8">
                        <input type="text" name="frw" class="form-control" style="text-transform: capitalize;" placeholder="RW" value="<?php echo $row['rw']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Desa</label>
                      <div class="col-sm-8">
                        <input type="text" name="fdesa" class="form-control" style="text-transform: capitalize;" placeholder="Desa" value="<?php echo $row['desa']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kecamatan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fkecamatan" class="form-control" style="text-transform: capitalize;" placeholder="Kecamatan" value="<?php echo $row['kecamatan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kota</label>
                      <div class="col-sm-8">
                        <input type="text" name="fkota" class="form-control" style="text-transform: capitalize;" placeholder="Kota" value="<?php echo $row['kota']; ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nomor KK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fno_kk" maxlength="16" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Nomor KK" value="<?php echo $row['no_kk']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Pendidikan di KK</label>
                      <div class="col-sm-8">
                        <input type="text" name="fpend_kk" class="form-control" style="text-transform: capitalize;" placeholder="Pendidikan di KK" value="<?php echo $row['pend_kk']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Pendidikan Terakhir</label>
                      <div class="col-sm-8">
                        <input type="text" name="fpend_terakhir" class="form-control" style="text-transform: capitalize;" placeholder="Pendidikan Terakhir" value="<?php echo $row['pend_terakhir']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Pendidikan Ditempuh</label>
                      <div class="col-sm-8">
                        <input type="text" name="fpend_ditempuh" class="form-control" style="text-transform: capitalize;" placeholder="Pendidikan Ditempuh" value="<?php echo $row['pend_ditempuh']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Pekerjaan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fpekerjaan" class="form-control" style="text-transform: capitalize;" placeholder="Pekerjaan" value="<?php echo $row['pekerjaan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Perkawinan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fstatus_perkawinan" class="form-control" style="text-transform: capitalize;" placeholder="Status Perkawinan" value="<?php echo $row['status_perkawinan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Status Dalam Keluarga</label>
                      <div class="col-sm-8">
                        <input type="text" name="fstatus_dlm_keluarga" class="form-control" style="text-transform: capitalize;" placeholder="Status Dalam Keluarga" value="<?php echo $row['status_dlm_keluarga']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Kewarganegaraan</label>
                      <div class="col-sm-8">
                        <input type="text" name="fkewarganegaraan" class="form-control" style="text-transform: capitalize;" placeholder="Kewarganegaraan" value="<?php echo $row['kewarganegaraan']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama Ayah</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnama_ayah" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['nama_ayah']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Nama Ibu</label>
                      <div class="col-sm-8">
                        <input type="text" name="fnama_ibu" class="form-control" style="text-transform: capitalize;" value="<?php echo $row['nama_ibu']; ?>">
                      </div>
                    </div>
                  </div>
                 <div class="box-footer" style="text-align: right;">
                  <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
                  <button type="reset" class="btn btn-warning">Reset</button>
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>

                </div>
              </form>
            </div>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
  }

  include ('../part/footer.php');
?>