<?php
include('../part/akses.php');
include('../part/header.php');
include('../../../config/koneksi.php');

// Daftar jenis surat
$jenisSuratList = [
  'surat_keterangan' => ['id' => 'id_sk', 'folder' => 'surat_keterangan'],
  'surat_keterangan_berkelakuan_baik' => ['id' => 'id_skbb', 'folder' => 'surat_keterangan_berkelakuan_baik'],
  'surat_keterangan_domisili' => ['id' => 'id_skd', 'folder' => 'surat_keterangan_domisili'],
  'surat_keterangan_kepemilikan_kendaraan_bermotor' => ['id' => 'id_skkkb', 'folder' => 'surat_keterangan_kepemilikan_kendaraan_bermotor'],
  'surat_keterangan_perhiasan' => ['id' => 'id_skp', 'folder' => 'surat_keterangan_perhiasan'],
  'surat_keterangan_usaha' => ['id' => 'id_sku', 'folder' => 'surat_keterangan_usaha'],
  'surat_lapor_hajatan' => ['id' => 'id_slh', 'folder' => 'surat_lapor_hajatan'],
  'surat_pengantar_skck' => ['id' => 'id_sps', 'folder' => 'surat_pengantar_skck'],
  'surat_keterangan_tidak_mampu' => ['id' => 'id_sktm', 'folder' => 'surat_keterangan_tidak_mampu'],
  'formulir_pengantar_nikah' => ['id' => 'id_fpn', 'folder' => 'formulir_pengantar_nikah'],
  'formulir_permohonan_kehendak_nikah' => ['id' => 'id_fpkn', 'folder' => 'formulir_permohonan_kehendak_nikah'],
  'formulir_persetujuan_calon_pengantin' => ['id' => 'id_fpcp', 'folder' => 'formulir_persetujuan_calon_pengantin'],
  'formulir_persetujuan_calon_pengantin_istri' => ['id' => 'id_fpcp2', 'folder' => 'formulir_persetujuan_calon_pengantin_istri'],
  'formulir_surat_izin_orang_tua' => ['id' => 'id_fsiot', 'folder' => 'formulir_surat_izin_orang_tua'],
  'surat_keterangan_kematian' => ['id' => 'id_skk', 'folder' => 'surat_keterangan_kematian'],
  'surat_keterangan_domisili_usaha' => ['id' => 'id_skdu', 'folder' => 'surat_keterangan_domisili_usaha'],
  'surat_keterangan_pengantar' => ['id' => 'id_skp', 'folder' => 'surat_keterangan_pengantar'],
  'surat_keterangan_beda_identitas' => ['id' => 'id_skbi', 'folder' => 'surat_keterangan_beda_identitas'],
  'surat_keterangan_beda_identitas_kis' => ['id' => 'id_skbis', 'folder' => 'surat_keterangan_beda_identitas_kis']
];

// Tambahkan kode ini DI SINI:
uksort($jenisSuratList, function($a, $b) {
    return strcmp(
        ucwords(str_replace('_', ' ', $a)),
        ucwords(str_replace('_', ' ', $b))
    );
});

// Ambil filter dari URL
$filter_jenis = $_GET['jenis_surat'] ?? '';

// Ambil filter dari URL
$filter_jenis = $_GET['jenis_surat'] ?? '';
$keyword = $_GET['keyword'] ?? '';
$page = $_GET['page'] ?? 1;
$limit = $_GET['limit'] ?? 10;
$page = max(1, intval($page));
$limit = max(1, intval($limit));
$offset = ($page - 1) * $limit;

$queries = [];
foreach ($jenisSuratList as $table => $info) {
  if ($filter_jenis && $table != $filter_jenis) continue;

  $conditions = ["s.status_surat='selesai'"];
  if ($keyword) {
    $escapedKeyword = mysqli_real_escape_string($connect, $keyword);
    $conditions[] = "(p.nama LIKE '%$escapedKeyword%' OR s.nik LIKE '%$escapedKeyword%' OR s.no_surat LIKE '%$escapedKeyword%')";
  }

  $whereStr = implode(' AND ', $conditions);
  $queries[] = "SELECT p.nama, s.{$info['id']} AS id_surat, s.no_surat, s.nik, s.jenis_surat, s.status_surat, s.tanggal_surat, '{$table}' AS table_name
                FROM penduduk p
                LEFT JOIN {$table} s ON s.nik = p.nik
                WHERE $whereStr";
}

$sql_all = implode(' UNION ', $queries);
$sql = "$sql_all ORDER BY tanggal_surat DESC LIMIT $limit OFFSET $offset";

$total_result = mysqli_query($connect, $sql_all);
$total_rows = mysqli_num_rows($total_result);
$total_pages = ceil($total_rows / $limit);

$result = mysqli_query($connect, $sql);
?>

<!-- Sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php if ($_SESSION['lvl'] == 'Administrator'): ?>
          <img src="../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">
        <?php elseif ($_SESSION['lvl'] == 'Kepala Desa'): ?>
          <img src="../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">
        <?php endif; ?>
      </div>
      <div class="pull-left info">
        <p><?= $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li><a href="../../dashboard/"><i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span></a></li>
      <li>
        <a href="../../profil_desa/">
          <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
        </a>
      </li>
      <li>
   			<a href="../../data_kades_kel/">
     			<i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
   			</a>
   		</li>
      <li><a href="../../penduduk/"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a></li>
      <li><a href="../../surat/permintaan_surat/"><i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span></a></li>
      <li><a href="../../surat/surat_selesai/"><i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span></a></li>
      <li><a href="../../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span></a></li>
    </ul>
  </section>
</aside>

<!-- Konten -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>Surat Selesai</h1>
    <ol class="breadcrumb">
      <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Surat Selesai</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

    <!-- Tambahkan di <head> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        .tombol-hp {
          display: none; /* Sembunyikan di desktop */
        }

        @media (max-width: 768px) {
          .tombol-hp {
            display: flex;
            justify-content: flex-end;
            padding: 16px;
          }

          .tombol-hp a {
            text-decoration: none;
          }

          .tombol-hp div {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
          }

          .tombol-hp div:hover {
            background-color: #0056b3;
          }
        }
      </style>

      <!-- Tambahkan di <body> -->
      <div class="tombol-hp">
        <a href="../../dashboard/">
          <div>
            Kembali Ke Menu
          </div>
        </a>
      </div>

      <div class="col-md-12">
        <form method="GET" class="form-inline" style="margin-bottom: 20px;">
          <div class="form-group">
            <label>Jenis Surat:</label>
            <select name="jenis_surat" class="form-control">
              <option value="">Semua</option>
              <?php foreach ($jenisSuratList as $table => $info): ?>
                <option value="<?= $table ?>" <?= ($filter_jenis == $table ? 'selected' : '') ?>>
                  <?= ucwords(str_replace('_', ' ', $table)) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Cari:</label>
            <input type="text" name="keyword" class="form-control" value="<?= htmlspecialchars($keyword) ?>" placeholder="Nama / NIK / No. Surat">
          </div>
          <div class="form-group">
            <label>Jumlah per halaman:</label>
            <select name="limit" class="form-control">
              <?php foreach ([10, 20, 50, 100] as $opt): ?>
                <option value="<?= $opt ?>" <?= ($limit == $opt ? 'selected' : '') ?>><?= $opt ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
          <a href="?" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</a>
        </form>

        <div class="table-responsive">
          <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th> <!-- Tambahan -->
                <th>Tanggal</th>
                <th>No. Surat</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jenis Surat</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = $offset + 1; ?> <!-- Nomor Urut Otomatis -->
              <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <?php
                  $tgl = date('d ', strtotime($row['tanggal_surat']));
                  $bln = date('F', strtotime($row['tanggal_surat']));
                  $thn = date(' Y', strtotime($row['tanggal_surat']));
                  $bulanIndo = [
                    'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
                    'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
                    'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
                    'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
                  ];
                  $folder = $jenisSuratList[$row['table_name']]['folder'];
                ?>
                <tr>
                   <td><?= $no++; ?></td> <!-- Tampilkan nomor urut -->
                  <td><?= $tgl . $bulanIndo[$bln] . $thn; ?></td>
                  <td><?= $row['no_surat']; ?></td>
                  <td><?= $row['nik']; ?></td>
                  <td style="text-transform: capitalize;"><?= $row['nama']; ?></td>
                  <td><?= $row['jenis_surat']; ?></td>
                  <td><a class="btn btn-success btn-sm"><i class="fa fa-check"></i> <b><?= $row['status_surat']; ?></b></a></td>
                  <td>
                    <a target="output" class="btn btn-primary btn-sm" href="../cetak/<?= $folder; ?>/index.php?id=<?= $row['id_surat']; ?>">
                      <i class="fa fa-print"></i> <b>CETAK</b>
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>


        <div class="text-center mt-4">
            <nav aria-label="Page navigation">
              <ul class="pagination justify-content-center">
                <!-- Tombol Previous -->
                <?php if ($page > 1): ?>
                  <li class="page-item">
                    <a class="page-link" href="?jenis_surat=<?= $filter_jenis ?>&keyword=<?= $keyword ?>&limit=<?= $limit ?>&page=<?= ($page - 1) ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php
                  $start_page = max(1, $page - 4);
                  $end_page = min($total_pages, $start_page + 9);

                  if ($end_page - $start_page < 9) {
                    $start_page = max(1, $end_page - 9);
                  }

                  for ($i = $start_page; $i <= $end_page; $i++):
                ?>
                  <li class="page-item <?= ($i == $page ? 'active' : '') ?>">
                    <a class="page-link" href="?jenis_surat=<?= $filter_jenis ?>&keyword=<?= $keyword ?>&limit=<?= $limit ?>&page=<?= $i ?>">
                      <?= $i ?>
                    </a>
                  </li>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <?php if ($page < $total_pages): ?>
                  <li class="page-item">
                    <a class="page-link" href="?jenis_surat=<?= $filter_jenis ?>&keyword=<?= $keyword ?>&limit=<?= $limit ?>&page=<?= ($page + 1) ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                <?php endif; ?>

              </ul>
            </nav>
          </div>
          

      </div>
    </div>
  </section>
</div>

<?php include('../part/footer.php'); ?>
