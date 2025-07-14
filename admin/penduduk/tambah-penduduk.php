<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include('../part/sidebar.php');
  include ('../../config/koneksi.php');
?> 

<div class="content-wrapper">
  <!-- HEADER -->
  <section class="content-header">
    <h1>Data Penduduk</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>

  <!-- CONTENT -->
  <section class="content">
    
    <!-- Tombol Download Template -->
    <div class="row">
      <div class="col-md-12 mb-3">
        <a href="download-template.php" class="btn btn-success">
          <i class="fa fa-download"></i> Download Template Excel
        </a>
      </div>
    </div>

    <!-- Form Import Excel -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-upload"></i> Import Data Penduduk</h3>
          </div>
          <div class="box-body">
            <form method="post" enctype="multipart/form-data" action="import-penduduk.php" class="form-inline">
              <div class="form-group">
                <input type="file" name="datapenduduk" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                <i class="fa fa-file-import"></i> Import .XLS
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Tambah Data Penduduk -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fas fa-user-plus"></i> Tambah Data Penduduk</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>

          <div class="box-body">
            <form class="form-horizontal" method="post" action="simpan-penduduk.php">
              <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                  <div class="box-body">
                    <?php
                      $fields_left = [
                        ["fnik", "NIK", "text", true],
                        ["fnama", "Nama", "text", true],
                        ["ftempat_lahir", "Tempat Lahir", "text", true],
                        ["ftgl_lahir", "Tanggal Lahir", "date", false],
                        ["fjenis_kelamin", "Jenis Kelamin", "text", false],
                        ["fagama", "Agama", "text", false],
                        ["fjalan", "Jalan", "text", false],
                        ["fdusun", "Lingk / Dusun", "text", false],
                        ["frt", "RT", "text", false],
                        ["frw", "RW", "text", false],
                        ["fdesa", "Kel / Desa", "text", false],
                        ["fkecamatan", "Kecamatan", "text", false],
                        ["fkota", "Kota", "text", false]
                      ];
                      foreach ($fields_left as $field) {
                        echo '<div class="form-group">
                          <label class="col-sm-4 control-label">' . $field[1] . '</label>
                          <div class="col-sm-8">
                            <input type="' . $field[2] . '" name="' . $field[0] . '" class="form-control" placeholder="' . $field[1] . '" ' . ($field[3] ? 'required' : '') . ' style="text-transform: capitalize;">
                          </div>
                        </div>';
                      }
                    ?>
                  </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                  <div class="box-body">
                    <?php
                      $fields_right = [
                        ["fno_kk", "Nomor KK", "text", false],
                        ["fpend_kk", "Pendidikan di KK", "text", false],
                        ["fpend_terakhir", "Pendidikan Terakhir", "text", false],
                        ["fpend_ditempuh", "Pendidikan Ditempuh", "text", false],
                        ["fpekerjaan", "Pekerjaan", "text", false],
                        ["fstatus_perkawinan", "Status Perkawinan", "text", false],
                        ["fstatus_dlm_keluarga", "Status Dalam Keluarga", "text", false],
                        ["fkewarganegaraan", "Kewarganegaraan", "text", false],
                        ["fnama_ayah", "Nama Ayah", "text", false],
                        ["fnama_ibu", "Nama Ibu", "text", false]
                      ];
                      foreach ($fields_right as $field) {
                        echo '<div class="form-group">
                          <label class="col-sm-4 control-label">' . $field[1] . '</label>
                          <div class="col-sm-8">
                            <input type="' . $field[2] . '" name="' . $field[0] . '" class="form-control" placeholder="' . $field[1] . '" style="text-transform: capitalize;">
                          </div>
                        </div>';
                      }
                    ?>
                  </div>

                  <div class="box-footer text-right">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Batal</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="box-footer"></div>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
  }
</script>



<?php 
  include ('../part/footer.php');
?>