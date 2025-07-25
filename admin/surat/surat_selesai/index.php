<?php
include('../part/akses.php');
include('../part/header.php');
include('../../../config/koneksi.php');

// Ambil semua tabel surat
$tahunList = [];

$queryTables = mysqli_query($connect, "SHOW TABLES");
while ($row = mysqli_fetch_array($queryTables)) {
    $tableName = $row[0];
    if (strpos($tableName, 'surat_') === 0 || strpos($tableName, 'formulir_') === 0) {
        $sqlTahun = "SELECT DISTINCT YEAR(tanggal_surat) AS tahun 
                     FROM $tableName 
                     WHERE status_surat = 'selesai' AND tanggal_surat IS NOT NULL";
        $result = mysqli_query($connect, $sqlTahun);
        while ($r = mysqli_fetch_assoc($result)) {
            $tahunList[] = $r['tahun'];
        }
    }
}

// Hapus duplikat dan urutkan menurun
$tahunList = array_unique($tahunList);
rsort($tahunList);


// Ambil semua nama tabel
$jenisSuratList = [];
$query = mysqli_query($connect, "SHOW TABLES");
while ($row = mysqli_fetch_row($query)) {
    $namaTabel = $row[0];
    if (preg_match('/^(surat|formulir)_/', $namaTabel)) {
        $kata = explode('_', $namaTabel);
        $prefix = $kata[0];
        $singkatan = '';
        for ($i = 1; $i < count($kata); $i++) {
            $singkatan .= substr($kata[$i], 0, 1);
        }
        $id = 'id_' . strtolower(substr($prefix, 0, 1)) . $singkatan;
        $jenisSuratList[$namaTabel] = [
            'id' => $id,
            'folder' => $namaTabel
        ];
    }
}

// Urutkan berdasarkan nama
uksort($jenisSuratList, function($a, $b) {
    return strcmp(
        ucwords(str_replace('_', ' ', $a)),
        ucwords(str_replace('_', ' ', $b))
    );
});

// Ambil parameter filter dan paginasi
$filter_jenis = $_GET['jenis_surat'] ?? '';
$keyword = $_GET['keyword'] ?? '';
$page = max(1, intval($_GET['page'] ?? 1));
$limit = max(1, intval($_GET['limit'] ?? 10));
$offset = ($page - 1) * $limit;

// Bangun query untuk masing-masing tabel
$queries = [];
foreach ($jenisSuratList as $table => $info) {
    if ($filter_jenis && $table != $filter_jenis) continue;

    $where = "s.status_surat = 'selesai'";
    if ($keyword) {
        $escaped = mysqli_real_escape_string($connect, $keyword);
        $where .= " AND (
            s.nik LIKE '%$escaped%' OR
            s.no_surat LIKE '%$escaped%' OR
            s.id_arsip LIKE '%$escaped%' OR
            (SELECT ap.nama FROM arsip_surat ap WHERE ap.nik = s.nik LIMIT 1) LIKE '%$escaped%'
        )";
    }

    // Ambil nama terbaru dari arsip_surat per NIK
    $queries[] = "
        SELECT
            s.{$info['id']} AS id_surat,
            s.no_surat,
            s.nik,
            s.id_arsip,
            s.jenis_surat,
            s.status_surat,
            s.tanggal_surat,
            ars.nama,
            '$table' AS table_name
        FROM $table s
        LEFT JOIN (
            SELECT nik, nama
            FROM arsip_surat
            WHERE id_arsip IN (
                SELECT MAX(id_arsip) FROM arsip_surat GROUP BY nik
            )
        ) ars ON ars.nik = s.nik
        WHERE $where
    ";
}

if (empty($queries)) {
    echo "Tidak ada data jenis surat ditemukan.";
    exit;
}

// Gabungkan semua query dengan UNION ALL
$sql_union_all = implode(' UNION ALL ', $queries);

// Total data (untuk paginasi)
$total_result_query = "SELECT COUNT(*) AS total FROM ($sql_union_all) AS total_table";
$total_result = mysqli_query($connect, $total_result_query);
if (!$total_result) {
    die("Error total data: " . mysqli_error($connect));
}
$total_rows = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Query data dengan LIMIT
$sql = "$sql_union_all ORDER BY tanggal_surat DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $sql);
if (!$result) {
    die("Error mengambil data surat: " . mysqli_error($connect));
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Selesai</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Tom Select CSS -->
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">

<!-- Tom Select JS -->
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>


    <style>
        /* Gunakan font Arial dan tinggi baris lebih kecil */
        table#data-table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        /* Ukuran teks dan padding sel */
        table#data-table th,
        table#data-table td {
            font-size: 14px;
            padding: 6px 10px;
            vertical-align: middle;
            border: 1px solid #ccc;
        }

        /* Warna selang-seling baris */
        table#data-table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        table#data-table tbody tr:nth-child(even) {
            background-color: #eef5ff;
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

        /* Kolom Nomor, NIK, Status, Aksi rata tengah */
        table#data-table td:nth-child(1),
        table#data-table td:nth-child(2),
        table#data-table td:nth-child(3),
        table#data-table td:nth-child(5),
        table#data-table td:nth-child(8),
        table#data-table td:nth-child(9) {
            text-align: center;
        }

        /* Responsif di HP */
        .table-responsive {
            overflow-x: auto;
            max-width: 100%;
        }
        </style>

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

        <style>
        /* Saat opsi dipilih dan tampil di area input TomSelect */
        .ts-control {
        background-color: #e9f4ff; /* Biru muda */
        border: 1px solid #0d6efd; /* Biru Bootstrap */
        color: #0d6efd;
        font-weight: 500;
        }

        /* Saat opsi dipilih di dropdown list */
        .ts-dropdown .active {
        background-color: #0d6efd !important;
        color: white !important;
        }

        /* Hover effect juga biru */
        .ts-dropdown .option:hover {
        background-color: #cce5ff;
        color: #000;
        }
        </style>


</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <aside class="main-sidebar" style="padding-top: 0;">
            <section class="sidebar">
                <div class="user-panel" style="margin-top: 0px;">
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
                    <li><a href="../../dashboard/"><i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span></a></li>
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
                    <li class="active"><a href="../../surat/surat_selesai/"><i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span></a></li>
                    <li><a href="../../laporan/"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span></a></li>
                </ul>
            </section>
        </aside>


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
                   
                    <div class="col-md-12">

                        <form method="GET" class="mb-3">
                            <div class="row align-items-end">

                                <?php 
                                // Ambil jumlah surat selesai per jenis tabel
                                function kolomAda($koneksi, $tabel, $kolom) {
                                    $cek = mysqli_query($koneksi, "SHOW COLUMNS FROM `$tabel` LIKE '$kolom'");
                                    return mysqli_num_rows($cek) > 0;
                                }

                                $jumlahPerJenis = [];

                                foreach ($jenisSuratList as $table => $info) {
                                    if (kolomAda($connect, $table, 'no_surat')) {
                                        $query = mysqli_query($connect, "SELECT COUNT(*) AS total FROM `$table` WHERE no_surat IS NOT NULL AND no_surat != ''");
                                        $row = mysqli_fetch_assoc($query);
                                        $jumlahPerJenis[$table] = $row['total'];
                                    } else {
                                        $jumlahPerJenis[$table] = 0;
                                    }
                                }

                                ?>
                                <div class="col-md-3">
                                    <label for="jenis_surat" class="form-label">Jenis Surat:</label>
                                    <select name="jenis_surat" id="jenis_surat" class="tom-select">
                                     <option value="">Semua</option>
                                    <?php foreach ($jenisSuratList as $table => $info): ?>
                                        <?php $jumlah = $jumlahPerJenis[$table] ?? 0; ?>
                                        <option value="<?= $table ?>" <?= ($filter_jenis == $table ? 'selected' : '') ?>>
                                            <?= ucwords(str_replace('_', ' ', $table)) ?> (<?= $jumlah ?>)
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                                <script>
                                new TomSelect('#jenis_surat', {
                                    create: false,
                                    sortField: {
                                        field: "text",
                                        direction: "asc"
                                    },
                                    placeholder: "Ketik atau pilih jenis surat..."
                                });
                                </script>


                                <div class="col-md-3">
                                    <label for="keyword">Kata Kunci:</label>
                                    <input type="text" name="keyword" id="keyword" class="form-control" value="<?= htmlspecialchars($keyword) ?>" placeholder="Ketik Kata Kunci...">
                                </div>

                               <div class="col-md-2">
                                    <label for="limit">Jumlah per halaman:</label>
                                    <select name="limit" id="limit" class="form-control" onchange="this.form.submit()">
                                        <?php foreach ([10, 20, 50, 100] as $opt): ?>
                                            <option value="<?= $opt ?>" <?= ($limit == $opt ? 'selected' : '') ?>><?= $opt ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label>&nbsp;</label> <!-- Supaya tingginya sejajar -->
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                        <a href="?" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExport">
                                            <i class="fa fa-file-excel-o"></i> Export Excel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <br>

                        <!-- Modal Pilih Tahun -->
                        <div class="modal fade" id="modalExport" tabindex="-1" aria-labelledby="modalExportLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <form action="export-selesai.php" method="get" target="_blank" class="w-100">
                            <div class="modal-content shadow-lg rounded-3">
                                <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalExportLabel">
                                    <i class="fa fa-file-excel-o mr-2"></i> Export Data Surat Selesai
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <label for="tahun" class="form-label">Pilih Tahun Surat:</label>
                                <select name="tahun" id="tahun" class="form-control form-select" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php foreach ($tahunList as $tahun): ?>
                                    <option value="<?= $tahun ?>"><?= $tahun ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>

                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-download mr-1"></i> Export Excel
                                </button>
                                </div>
                            </div>
                            </form>
                        </div>
                        </div>

                        <script>
                        document.getElementById('jenis_surat').addEventListener('change', function () {
                            this.form.submit();
                        });
                        </script>

                     


                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>ID Pengajuan</th>
                                    <th>No. Surat</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = $offset + 1; ?>
                                <?php if (mysqli_num_rows($result) > 0): ?>
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
                                            $idSurat = $row['id_surat'];

                                            // Hitung sisa waktu hapus 60 menit (3600 detik)
                                            $waktuSurat = strtotime($row['tanggal_surat']);
                                            $waktuSekarang = time();
                                            $sisaDetik = 3600 - ($waktuSekarang - $waktuSurat);
                                            $bolehHapus = $sisaDetik > 0;
                                        ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $tgl . $bulanIndo[$bln] . $thn; ?></td>
                                            <td><?= $row['id_arsip']; ?></td>
                                            <td><?= $row['no_surat']; ?></td>
                                            <td><?= $row['nik']; ?></td>
                                            <td style="text-transform: capitalize;"><?= htmlspecialchars($row['nama']); ?></td>
                                            <td><?= htmlspecialchars($row['jenis_surat']); ?></td>
                                            <td>
                                                <a class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i> <b><?= htmlspecialchars($row['status_surat']); ?></b>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-wrap align-items-center gap-1 mb-1">
                                                    <!-- Tombol CETAK -->
                                                    <a target="_blank" class="btn btn-primary btn-sm"
                                                        href="../cetak/<?= htmlspecialchars($folder); ?>/index.php?id=<?= htmlspecialchars($idSurat); ?>">
                                                        <i class="fa fa-print"></i> <b>CETAK</b>
                                                    </a>

                                                    <!-- Tombol HAPUS (hilang otomatis setelah 60 menit) -->
                                                    <?php if ($bolehHapus): ?>
                                                        <a href="hapus.php?id=<?= $idSurat; ?>&table=<?= $row['table_name']; ?>&no_surat=<?= urlencode($row['no_surat']); ?>"
                                                        class="btn btn-outline-danger btn-sm"
                                                        id="btn-hapus-<?= $idSurat; ?>"
                                                        onclick="return confirm('Yakin ingin menghapus surat ini?')">
                                                        <i class="fa fa-trash"></i> <b>HAPUS</b>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if ($bolehHapus): ?>
                                                    <div id="countdown-<?= $idSurat; ?>" class="text-muted small ps-1 mt-1">
                                                        <i class="fa fa-clock-o"></i> <span>Sisa waktu hapus: </span><b></b>
                                                    </div>

                                                    <script>
                                                        (function () {
                                                            let seconds = <?= $sisaDetik ?>;
                                                            const countdownElem = document.querySelector("#countdown-<?= $idSurat; ?> b");
                                                            const hapusBtn = document.getElementById("btn-hapus-<?= $idSurat; ?>");
                                                            const container = document.getElementById("countdown-<?= $idSurat; ?>");

                                                            function updateCountdown() {
                                                                if (seconds <= 0) {
                                                                    if (hapusBtn) hapusBtn.remove();
                                                                    if (container) container.remove();
                                                                    return;
                                                                }

                                                                const mins = Math.floor(seconds / 60);
                                                                const secs = seconds % 60;
                                                                countdownElem.innerText = `${mins}m ${secs}s`;
                                                                seconds--;
                                                                setTimeout(updateCountdown, 1000);
                                                            }

                                                            updateCountdown();
                                                        })();
                                                    </script>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data surat selesai ditemukan.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                 

                        <div class="text-center mt-4">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?jenis_surat=<?= urlencode($filter_jenis) ?>&keyword=<?= urlencode($keyword) ?>&limit=<?= $limit ?>&page=<?= ($page - 1) ?>" aria-label="Previous">
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
                                            <a class="page-link" href="?jenis_surat=<?= urlencode($filter_jenis) ?>&keyword=<?= urlencode($keyword) ?>&limit=<?= $limit ?>&page=<?= $i ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>

                                    <?php if ($page < $total_pages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="?jenis_surat=<?= urlencode($filter_jenis) ?>&keyword=<?= urlencode($keyword) ?>&limit=<?= $limit ?>&page=<?= ($page + 1) ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                            <p>Menampilkan <?= min($limit, $total_rows - $offset); ?> dari <?= $total_rows; ?> total surat selesai.</p>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <?php include('../part/footer.php'); ?>
    </div>
</body>
</html>