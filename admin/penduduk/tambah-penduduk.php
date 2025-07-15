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

  <style>
    .progress-container {
      margin-top: 20px;
      display: none;
      animation: fadeIn 0.5s ease-in-out;
    }

    #progressText {
      font-weight: 600;
      margin-bottom: 8px;
      color: #333;
    }

    .progress {
      height: 30px;
      border-radius: 15px;
      background-color: #e9ecef;
      overflow: hidden;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .progress-bar {
      font-weight: 600;
      font-size: 14px;
      line-height: 30px;
      transition: width 0.3s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to   { opacity: 1; transform: translateY(0); }
    }
  </style>

   <!-- Form Import Excel -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-upload"></i> Import Data Penduduk</h3>
          </div>
          <div class="box-body">
            <form id="uploadForm" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="file" name="datapenduduk" id="datapenduduk" class="form-control" required
                    accept=".xls,.xlsx,.csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv">
            </div>
            <button type="submit" class="btn btn-primary">Upload & Import</button>
          </form>

           <div class="progress-container">
              <label id="progressText" class="form-label">Memulai import...</label>
              <div class="progress">
                <div id="progressBar" class="progress-bar bg-primary text-white text-center"
                    style="width: 0%">
                  0%
                </div>
              </div>
            </div>

            <div id="result" class="mt-3"></div>

          </div>
        </div>
      </div>
    </div>

   <script>
    let file = '';
    let total = 0;
    let index = 1;
    let batchSize = 1000;
    let berhasil = 0;
    let gagal = 0;

    document.getElementById('uploadForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const formData = new FormData(this);
      formData.append('step', 'upload');

      fetch('proses-import.php?v=' + Date.now(), {
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(res => {
        if (res.success) {
          file = res.file;
          total = res.totalRows;
          index = 1;
          berhasil = 0;
          gagal = 0;
          processBatch();
        } else {
          alert(res.msg);
        }
      });
    });

    function processBatch() {
      if (index > total) {
        document.getElementById('progressBar').style.width = '100%';
        document.getElementById('progressBar').innerText = `100% - Selesai`;
        document.getElementById('progressText').innerText = 'Import selesai.';
        document.getElementById('result').innerHTML = `
          <div class="alert alert-success">
            Import selesai.<br>
            Total data: <b>${total}</b><br>
            Berhasil: <b>${berhasil}</b><br>
            Gagal: <b>${gagal}</b>
          </div>`;
        return;
      }

      fetch('proses-import.php?v=' + Date.now(), {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          step: 'process',
          file: file,
          index: index,
          batch: batchSize
        })
      })
      .then(res => res.json())
      .then(res => {
        if (res.success) {
          berhasil += res.berhasil;
          gagal += res.gagal;
        }

        let current = Math.min(index + batchSize - 1, total);
        let percent = Math.round((current / total) * 100);
        document.getElementById('progressBar').style.width = percent + '%';
        document.getElementById('progressBar').innerText = `${percent}% - ${current} dari ${total}`;
        document.getElementById('progressText').innerText = `Memproses: ${current} dari ${total}...`;

        index += batchSize;
        setTimeout(processBatch, 100); // jeda antar batch
      });
    }
  </script>

  <script>
    document.getElementById('uploadForm').addEventListener('submit', function (e) {
      const fileInput = document.getElementById('datapenduduk');
      const file = fileInput.files[0];

      const allowedTypes = [
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'text/csv'
      ];

      const allowedExtensions = ['xls', 'xlsx', 'csv'];

      if (!file) {
        alert("Silakan pilih file.");
        e.preventDefault();
        return;
      }

      const ext = file.name.split('.').pop().toLowerCase();
      if (!allowedTypes.includes(file.type) && !allowedExtensions.includes(ext)) {
        alert("Format file tidak didukung. Hanya file .xls, .xlsx, atau .csv yang diperbolehkan.");
        e.preventDefault();
        return;
      }
    });
  </script>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $('#uploadForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $('#result').html('');
        $('#progressBar').css('width', '0%').text('0%');
        $('.progress-container').show();

        // Upload file terlebih dahulu
        $.ajax({
            url: 'upload-file.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                var data = JSON.parse(res);
                if(data.success){
                    importData(data.file);
                } else {
                    $('#result').html('<div class="alert alert-danger">'+data.message+'</div>');
                }
            }
        });

        function importData(filePath){
            $.ajax({
                url: 'import-penduduk.php',
                type: 'POST',
                data: {file: filePath},
                success: function(res){
                    $('#result').html(res);
                }
            });

            // Cek progress setiap 500ms
            var interval = setInterval(function(){
                $.get('get-progress.php', function(progress){
                    var p = parseInt(progress);
                    if(p >= 100){
                        clearInterval(interval);
                    }
                    $('#progressBar').css('width', p + '%').text(p + '%');
                });
            }, 500);
        }
    });
    </script>

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