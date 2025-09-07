<?php
  include ('../../../config/koneksi.php');
  include ('../part/akses.php');
  include ('../part/header.php');
?>

<style>
  /* Gaya dasar sidebar */
.sidebar-menu li a {
  color: #333;
  padding: 10px 15px;
  display: block;
}

.sidebar-menu li.active > a {
  background-color: #007bff !important;
  color: #fff !important;
}

.sidebar-menu li a {
  color: #333;
  display: block;
  padding: 10px 15px;
  transition: background-color 0.3s, color 0.3s;
  border-radius: 8px;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 10px;
}

/* Efek hover */
.sidebar-menu li a:hover {
  background-color: #e6f0ff;
  color: #007bff;
}

/* Menu aktif */
.sidebar-menu li.active > a {
  background-color: #007bff; /* biru keren */
  color: #fff; /* teks putih */
  font-weight: bold;
}

/* Ikon dalam menu */
.sidebar-menu li a i {
  font-size: 16px; /* ikon diperbesar */
  color: #fff; /* ikon putih */
  transition: color 0.3s;
}

/* Hover dan aktif ikon */
.sidebar-menu li a:hover i {
  color: #007bff;
}

.sidebar-menu li.active i {
  color: #fff;
}
</style>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../assets/img/' . htmlspecialchars($data['logo_desa']) . '" alt="Logo Desa">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../assets/img/' . htmlspecialchars($data['logo_desa']) . '" alt="Logo Desa">';
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
            <a href="../../dashboard/">
              <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'profil_desa') ? 'active' : '' ?>">
            <a href="../../profil_desa/">
              <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'data_kades_kel') ? 'active' : '' ?>">
            <a href="../../data_kades_kel/">
              <i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'penduduk') ? 'active' : '' ?>">
            <a href="../../penduduk/">
              <i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'kirim_email') ? 'active' : '' ?>">
            <a href="../../kirim_email/">
              <i class="fas fa-envelope"></i> <span>&nbsp;&nbsp;&nbsp;Kirim Email</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'permintaan_surat') ? 'active' : '' ?>">
            <a href="../../surat/permintaan_surat/">
              <i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'surat_selesai') ? 'active' : '' ?>">
            <a href="../../surat/surat_selesai/">
              <i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'laporan') ? 'active' : '' ?>">
            <a href="../../laporan/">
              <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
            </a>
          </li>
        </ul>
  </section>
</aside>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Permintaan Surat</h1>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <style>
        /* Gunakan font Arial dan perkecil tinggi baris */
        table#data-table {
          font-family: Arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        /* Tambahan khusus untuk perataan tengah kolom tertentu */
        #data-table td:nth-child(1),  /* Nomor */
        #data-table td:nth-child(2),  /* id arsip */
        #data-table td:nth-child(3),  /* NIK */
        #data-table td:nth-child(4),  /* NIK */
        #data-table td:nth-child(7),
        #data-table td:nth-child(8) { /* Aksi */
          text-align: center;
        }

        /* Ukuran teks dan tinggi sel */
        table#data-table th,
        table#data-table td {
          font-size: 14px;
          padding: 6px 10px;
          vertical-align: middle;
          border: 1px solid #ccc;
        }

        /* Warna selang-seling baris */
        table#data-table tbody tr:nth-child(odd) {
          background-color: #f9f9f9; /* abu terang */
        }

        table#data-table tbody tr:nth-child(even) {
          background-color: #eef5ff; /* biru sangat muda */
        }

         /* Judul kolom di tengah dan tinggi lebih besar */
        table#data-table thead th {
          text-align: center;
          padding: 12px 10px; /* Tambahkan tinggi */
          background-color: #007acc; /* Biru profesional */
          color: white;
          font-weight: bold;
          border: 1px solid #005fa3;
        }

        /* Scroll horizontal jika diperlukan di HP */
        .table-responsive {
          overflow-x: auto;
          max-width: 100%;
        }
      </style>

    <ol class="breadcrumb">
      <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Permintaan Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row" style="overflow-x:auto;">
      <div class="col-md-12">
        <br><br>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <tbody>

          <?php if (isset($_GET['status']) && $_GET['status'] == 'berhasil'): ?>
                  <div id="flash-message" style="
                      background-color: #d4edda;
                      color: #155724;
                      border: 1px solid #c3e6cb;
                      padding: 10px 20px;
                      border-radius: 5px;
                      margin-bottom: 15px;
                      font-weight: bold;
                      animation: fadeOut 3s forwards;
                  ">
                      ✅ Surat berhasil dihapus!
                  </div>
              <?php endif; ?>

          <?php
          include_once '../../../config/koneksi.php'; // pastikan koneksi

          // Ambil semua tabel jenis surat
          $jenisSurat = [];
          $query = mysqli_query($connect, "SHOW TABLES");
          if (!$query) {
              die("Query gagal: " . mysqli_error($connect));
          }

          while ($row = mysqli_fetch_row($query)) {
              $nama_tabel = $row[0];
              if (strpos($nama_tabel, 'surat_') === 0 || strpos($nama_tabel, 'formulir_') === 0) {
                  $parts = explode('_', $nama_tabel);
                  $inisial = '';
                  foreach ($parts as $p) {
                      $inisial .= substr($p, 0, 1);
                  }
                  $id_field = 'id_' . strtolower($inisial);
                  $jenisSurat[$nama_tabel] = $id_field;
              }
          }

          // Buat bagian UNION
          $unionParts = [];
          foreach ($jenisSurat as $table => $idField) {
              $unionParts[] = "SELECT penduduk.nama, {$table}.{$idField} AS id_surat, {$table}.no_surat, {$table}.nik, {$table}.jenis_surat, {$table}.status_surat, {$table}.id_arsip, {$table}.tanggal_surat
                              FROM penduduk
                              LEFT JOIN {$table} ON {$table}.nik = penduduk.nik
                              WHERE {$table}.status_surat='pending'";
          }

          // Handle pagination dan limit
          $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
          $halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
          $offset = ($halaman - 1) * $limit;

          // Ambil total data
          $totalQuery = implode(" UNION ALL ", $unionParts);
          $totalResult = mysqli_query($connect, $totalQuery);
          $totalData = mysqli_num_rows($totalResult);
          $totalHalaman = ceil($totalData / $limit);

          // Query untuk ditampilkan di halaman ini
          $pagedQuery = $totalQuery . " ORDER BY tanggal_surat DESC LIMIT $limit OFFSET $offset";
          $result = mysqli_query($connect, $pagedQuery);
          $no = $offset + 1;
          ?>

        <!-- Filter jumlah data tampil -->
        <form method="get" class="d-flex align-items-center gap-2 mb-3" style="flex-wrap: wrap;">
          <label for="limit" class="mb-0 fw-semibold">Tampilkan :&nbsp;</label>
          <select name="limit" id="limit" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
            <option value="10" <?= ($limit == 10 ? 'selected' : '') ?>>10</option>
            <option value="20" <?= ($limit == 20 ? 'selected' : '') ?>>20</option>
            <option value="50" <?= ($limit == 50 ? 'selected' : '') ?>>50</option>
            <option value="100" <?= ($limit == 100 ? 'selected' : '') ?>>100</option>
          </select>
          <span class="text-muted small"> data per halaman</span>
          <input type="hidden" name="hal" value="1">
        </form>


          <!-- Tabel hasil -->
          <table class="table" id="data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Pengajuan</th>
                <th>Tanggal</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
          <?php
          if ($result && $result->num_rows > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                  $datetime = strtotime($row['tanggal_surat']);
                  $tgl = date('d', $datetime);
                  $bln = date('F', $datetime);
                  $thn = date('Y', $datetime);
                  $jam = date('H:i:s', $datetime);

                  $blnIndo = [
                      'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
                      'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
                      'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
                      'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
                  ];

                  $tanggal = "$tgl {$blnIndo[$bln]} $thn pukul $jam";
                  $jenis = strtolower(str_replace(' ', '_', $row['jenis_surat']));
                  $link = "konfirmasi/{$jenis}/index.php?id={$row['id_surat']}";

                  echo "<tr>
                    <td>{$no}.</td> 
                    <td>{$row['id_arsip']}</td>
                    <td>{$tanggal}</td>
                    <td>{$row['nik']}</td>
                    <td style='text-transform: capitalize;'>{$row['nama']}</td>
                    <td>{$row['jenis_surat']}</td>
                    <td>
                      <a class='btn btn-danger btn-sm' href='#'>
                        <i class='fa fa-spinner'></i> <b>{$row['status_surat']}</b>
                      </a>
                    </td>
                    <td>
                      <a class='btn btn-danger btn-sm' href='hapus_surat.php?id={$row['id_surat']}&jenis={$jenis}' onclick=\"return confirm('Yakin ingin menghapus surat ini?')\">
                        <i class='fa fa-trash'></i> HAPUS
                      </a>
                      <a class='btn btn-success btn-sm' href='{$link}'>
                        <i class='fa fa-check'></i> <b>KONFIRMASI</b>
                      </a>
                    </td>
                  </tr>";
                  $no++;
              }
          } else {
              echo "<tr>
                <td colspan='8' style='text-align: center; color: #999; padding: 30px;'>
                  <i class='fa fa-inbox' style='font-size: 24px; color: #ccc;'></i><br>
                  <span style='font-size: 16px; font-style: italic;'>📭 Permintaan surat saat ini kosong</span>
                </td>
              </tr>";
          }
          ?>
            </tbody>
          </table>

          <?php if ($totalHalaman > 1): ?>
          <div class="text-center mt-4">
            <nav aria-label="Page navigation">
              <ul class="pagination d-flex justify-content-center flex-wrap">
                <?php
                  if ($halaman > 1) {
                    $prev = $halaman - 1;
                    echo "<li class='page-item'><a class='page-link' href='?hal=$prev&limit=$limit'>Previous</a></li>";
                  }

                  $start = max(1, $halaman - 3);
                  $end = min($totalHalaman, $start + 7);

                  if ($start > 1) {
                    echo "<li class='page-item'><a class='page-link' href='?hal=1&limit=$limit'>1</a></li>";
                    if ($start > 2) echo "<li class='page-item disabled'><span class='page-link'>...</span></li>";
                  }

                  for ($i = $start; $i <= $end; $i++) {
                    $active = ($i == $halaman) ? 'active' : '';
                    echo "<li class='page-item $active'><a class='page-link' href='?hal=$i&limit=$limit'>$i</a></li>";
                  }

                  if ($end < $totalHalaman) {
                    if ($end < $totalHalaman - 1) echo "<li class='page-item disabled'><span class='page-link'>...</span></li>";
                    echo "<li class='page-item'><a class='page-link' href='?hal=$totalHalaman&limit=$limit'>$totalHalaman</a></li>";
                  }

                  if ($halaman < $totalHalaman) {
                    $next = $halaman + 1;
                    echo "<li class='page-item'><a class='page-link' href='?hal=$next&limit=$limit'>Next</a></li>";
                  }
                ?>
              </ul>
            </nav>
          </div>
        <?php endif; ?>


          </tbody>


        </table>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>