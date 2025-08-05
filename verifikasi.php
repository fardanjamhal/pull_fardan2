<?php
require_once 'config/koneksi.php';

$kode = $_GET['kode'] ?? '';
if (!$kode) {
    die("<div class='alert alert-danger text-center mt-5'>Kode surat tidak diberikan.</div>");
}

// Ambil nama desa dari profil_desa
$query_desa = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
$profil_desa = mysqli_fetch_assoc($query_desa);
$nama_desa = $profil_desa['nama_desa'] ?? 'Desa';
$favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';

// Ambil data dari tabel nomor_surat
$query = mysqli_query($connect, "SELECT * FROM nomor_surat WHERE nomor_lengkap = '$kode'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("<div class='alert alert-warning text-center mt-5'>Surat tidak ditemukan atau tidak valid.</div>");
}

// Cari id_arsip dan jenis_surat
$tables_result = mysqli_query($connect, "SHOW TABLES");

$jenis_surat = '-';
$found = false;
$data_penduduk = [];

while ($row = mysqli_fetch_array($tables_result)) {
    $table = $row[0];

    if (preg_match('/^(surat_|formulir_)/', $table)) {
        $has_jenis_surat = false;
        $columns_result = mysqli_query($connect, "SHOW COLUMNS FROM $table");
        while ($col = mysqli_fetch_assoc($columns_result)) {
            if ($col['Field'] === 'jenis_surat') {
                $has_jenis_surat = true;
                break;
            }
        }

        $query = $has_jenis_surat ?
            mysqli_query($connect, "SELECT id_arsip, jenis_surat FROM $table WHERE no_surat = '$kode' LIMIT 1") :
            mysqli_query($connect, "SELECT id_arsip FROM $table WHERE no_surat = '$kode' LIMIT 1");

        if ($data_arsip = mysqli_fetch_assoc($query)) {
            $id_arsip = $data_arsip['id_arsip'] ?? null;
            if ($has_jenis_surat) {
                $jenis_surat = $data_arsip['jenis_surat'] ?? '-';
            }

            if ($id_arsip) {
                $q_nama = mysqli_query($connect, "SELECT nik, nama, tempat_lahir, jenis_kelamin FROM arsip_surat WHERE id_arsip = '$id_arsip' LIMIT 1");
                if ($data_penduduk = mysqli_fetch_assoc($q_nama)) {
                    $found = true;
                    break;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="assets/img/<?php echo $favicon; ?>">
  <title>Validasi Surat | <?= htmlspecialchars($nama_desa) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      padding: 40px 15px;
    }

    .card {
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      border: none;
    }

    .header {
      background: linear-gradient(135deg, #198754, #28a745);
      color: white;
      padding: 25px;
      border-radius: 8px 8px 0 0;
      text-align: center;
    }

    .header i {
      font-size: 40px;
    }

    .section-title {
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 6px;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .info-item {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px dashed #ddd;
    }

    .info-item:last-child {
      border-bottom: none;
    }

    .info-label {
      font-weight: 500;
      color: #555;
      min-width: 150px;
    }

    .info-value {
      text-align: right;
      font-weight: 500;
      color: #212529;
    }

    .footer-note {
      font-size: 0.95rem;
      color: #6c757d;
    }

    .info-item {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    padding: 8px 0;
    border-bottom: 1px dashed #ddd;
      }

      .info-label,
      .info-value {
        word-break: break-word;
        overflow-wrap: break-word;
        flex: 1 1 100%;
      }

      @media (min-width: 576px) {
        .info-label {
          flex: 0 0 40%;
        }

        .info-value {
          flex: 0 0 60%;
          text-align: right;
        }
      }
  </style>
</head>
<body>

<div class="container">
  <div class="card mx-auto" style="max-width: 750px;">
    <div class="header">
      <i class="bi bi-patch-check-fill me-2"></i>
      <h3 class="mb-1">Surat Telah Diverifikasi ✅</h3>
      <h6 class="mb-0"><?= htmlspecialchars($nama_desa) ?></h6>
    </div>
    <div class="card-body px-4 py-4">
      <h5 class="section-title">Detail Surat</h5>
      <div class="info-item">
        <div class="info-label">Nomor Surat</div>
        <div class="info-value"><?= htmlspecialchars($data['nomor_lengkap']) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Tanggal Surat</div>
        <div class="info-value"><?= date('d-m-Y', strtotime($data['tanggal_surat'])) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Nama Penandatangan</div>
        <div class="info-value"><?= htmlspecialchars($data['nama_pejabat_desa']) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Jabatan</div>
        <div class="info-value"><?= htmlspecialchars($data['jabatan']) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Jenis Surat</div>
        <div class="info-value"><?= htmlspecialchars($jenis_surat) ?></div>
      </div>

      <?php if ($found): ?>
      <h5 class="section-title mt-4">Data Penduduk</h5>
      <div class="info-item">
        <div class="info-label">NIK</div>
        <div class="info-value"><?= htmlspecialchars($data_penduduk['nik']) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Nama</div>
        <div class="info-value"><?= htmlspecialchars($data_penduduk['nama']) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Tempat Lahir</div>
        <div class="info-value"><?= htmlspecialchars($data_penduduk['tempat_lahir']) ?></div>
      </div>
      <div class="info-item">
        <div class="info-label">Jenis Kelamin</div>
        <div class="info-value"><?= htmlspecialchars($data_penduduk['jenis_kelamin']) ?></div>
      </div>
      <?php else: ?>
      <div class="alert alert-warning mt-4 text-center">Data arsip tidak ditemukan untuk surat ini.</div>
      <?php endif; ?>

      <div class="text-center mt-5">
        <p class="footer-note fst-italic">Data ini valid dan resmi dikeluarkan melalui sistem administrasi <?= htmlspecialchars($nama_desa) ?></p>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>

