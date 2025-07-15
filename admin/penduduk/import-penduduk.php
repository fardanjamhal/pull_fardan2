<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Import Data Penduduk</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <style>
    .progress-container {
      display: none;
      margin-top: 20px;
    }

    .progress-bar {
      transition: width 0.4s ease;
    }

    .progress-text {
      font-weight: bold;
      margin-top: 5px;
      text-align: center;
    }

    .result-log {
      font-size: 14px;
      margin-top: 10px;
      max-height: 300px;
      overflow-y: auto;
      background: #f8f9fa;
      padding: 10px;
      border: 1px solid #ddd;
    }
  </style>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0"><i class="fa fa-upload"></i> Import Data Penduduk</h5>
      </div>
      <div class="card-body">
        <form id="form-import" enctype="multipart/form-data">
          <div class="form-group">
            <label>Pilih File Excel (.xls/.xlsx)</label>
            <input type="file" name="datapenduduk" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-file-import"></i> Upload & Proses
          </button>
        </form>

        <div class="progress-container">
          <div class="progress mt-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 0%"></div>
          </div>
          <div class="progress-text">Menyiapkan...</div>
        </div>

        <div class="result-log mt-3"></div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $('#form-import').on('submit', function(e) {
      e.preventDefault();
      let formData = new FormData(this);

      $('.progress-container').show();
      $('.progress-bar').css('width', '0%');
      $('.progress-text').text('Mengunggah file...');
      $('.result-log').html('');

      // Step 1: upload
      $.ajax({
        url: 'proses-import.php',
        method: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function(response) {
          if (response.success) {
            const total = response.totalRows;
            const file = response.file;
            processBatch(1, total, file);
          } else {
            $('.progress-text').text(response.msg || 'Gagal.');
          }
        },
        error: function() {
          $('.progress-text').text('Gagal mengunggah.');
        }
      });
    });

    function processBatch(index, total, file) {
      if (index > total) {
        $('.progress-bar').css('width', '100%');
        $('.progress-text').text('Import selesai ✅');
        return;
      }

      $.ajax({
        url: 'proses-import.php',
        method: 'POST',
        data: {
          step: 'process',
          index: index,
          file: file
        },
        dataType: 'json',
        success: function(res) {
          let percent = Math.floor((index / total) * 100);
          $('.progress-bar').css('width', percent + '%');
          $('.progress-text').text(`Memproses baris ${index} dari ${total}...`);

          let status = res.success ? '✅' : '❌';
          $('.result-log').prepend(`<div>${status} Baris ${index}: ${res.msg}</div>`);

          setTimeout(() => {
            processBatch(index + 1, total, file);
          }, 20); // batasi 20ms per request
        },
        error: function() {
          $('.result-log').prepend(`<div>❌ Baris ${index}: Gagal koneksi.</div>`);
          processBatch(index + 1, total, file); // lanjutkan meskipun gagal
        }
      });
    }
  </script>
</body>
</html>
