<?php
// Pastikan file koneksi dan akses sudah benar
include('../part/akses.php');
include('../part/header.php');
include('../../../config/koneksi.php'); // Sesuaikan path ini jika perlu

// Daftar jenis surat beserta ID unik dan nama foldernya
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
    'formulir_persetujuan_calon_pengantin_istri' => ['id' => 'id_fpcpi', 'folder' => 'formulir_persetujuan_calon_pengantin_istri'],
    'formulir_surat_izin_orang_tua' => ['id' => 'id_fsiot', 'folder' => 'formulir_surat_izin_orang_tua'],
    'surat_keterangan_kematian' => ['id' => 'id_skk', 'folder' => 'surat_keterangan_kematian'],
    'surat_keterangan_domisili_usaha' => ['id' => 'id_skdu', 'folder' => 'surat_keterangan_domisili_usaha'],
    'surat_keterangan_pengantar' => ['id' => 'id_skp', 'folder' => 'surat_keterangan_pengantar'],
    'surat_keterangan_beda_identitas' => ['id' => 'id_skbi', 'folder' => 'surat_keterangan_beda_identitas'],
    'surat_keterangan_beda_identitas_kis' => ['id' => 'id_skbis', 'folder' => 'surat_keterangan_beda_identitas_kis'],
    'surat_keterangan_penghasilan_orang_tua' => ['id' => 'id_skpot', 'folder' => 'surat_keterangan_penghasilan_orang_tua'],
    'surat_pengantar_hewan' => ['id' => 'id_sph', 'folder' => 'surat_pengantar_hewan'],
    'surat_keterangan_kematian_dan_penguburan' => ['id' => 'id_skkp', 'folder' => 'surat_keterangan_kematian_dan_penguburan'],
    'surat_keterangan_pindah_penduduk' => ['id' => 'id_skpp', 'folder' => 'surat_keterangan_pindah_penduduk'],
    'surat_keterangan_pengantar_rujuk_atau_cerai' => ['id' => 'id_skrc', 'folder' => 'surat_keterangan_pengantar_rujuk_atau_cerai'],
    'surat_keterangan_wali_hakim' => ['id' => 'id_skwh', 'folder' => 'surat_keterangan_wali_hakim'],
    'surat_keterangan_mahar_sunrang' => ['id' => 'id_skm', 'folder' => 'surat_keterangan_mahar_sunrang'],
    'surat_keterangan_jual_beli' => ['id' => 'id_skjb', 'folder' => 'surat_keterangan_jual_beli'],
    'surat_keterangan_belum_terbit_sppt_pbb' => ['id' => 'id_skbtsp', 'folder' => 'surat_keterangan_belum_terbit_sppt_pbb'],
    'surat_perintah_perjalanan_dinas' => ['id' => 'id_sppd', 'folder' => 'surat_perintah_perjalanan_dinas'],
    'surat_tugas' => ['id' => 'id_st', 'folder' => 'surat_tugas'],
    'surat_keterangan_hibah' => ['id' => 'id_skh', 'folder' => 'surat_keterangan_hibah']
];

// Mengurutkan jenis surat berdasarkan nama yang lebih mudah dibaca (opsional, untuk tampilan dropdown)
uksort($jenisSuratList, function($a, $b) {
    return strcmp(
        ucwords(str_replace('_', ' ', $a)),
        ucwords(str_replace('_', ' ', $b))
    );
});



// Mengambil parameter filter dari URL
$filter_jenis = $_GET['jenis_surat'] ?? '';
$keyword = $_GET['keyword'] ?? '';
$page = $_GET['page'] ?? 1;
$limit = $_GET['limit'] ?? 10;

// Validasi dan sanitasi parameter paginasi
$page = max(1, intval($page));
$limit = max(1, intval($limit));
$offset = ($page - 1) * $limit;

$queries_for_union = [];
foreach ($jenisSuratList as $table => $info) {
    // Lewati tabel jika filter jenis surat spesifik diatur dan tidak cocok
    if ($filter_jenis && $table != $filter_jenis) {
        continue;
    }

    $conditions = ["s.status_surat='selesai'"]; // Selalu filter surat yang statusnya 'selesai'

    // Tambahkan kondisi pencarian jika keyword ada
    if ($keyword) {
        $escapedKeyword = mysqli_real_escape_string($connect, $keyword);
        // Mencari di NIK, Nomor Surat, dan nama dari tabel arsip_surat
        // Menggunakan alias 'nama_dari_arsip' untuk menghindari konflik nama kolom
        $conditions[] = "(s.nik LIKE '%$escapedKeyword%' OR s.no_surat LIKE '%$escapedKeyword%' OR s.id_arsip LIKE '%$escapedKeyword%' OR (SELECT ap.nama FROM arsip_surat ap WHERE ap.nik = s.nik LIMIT 1) LIKE '%$escapedKeyword%')";
    }

    $whereStr = implode(' AND ', $conditions);

    // SQL Query untuk setiap tabel surat
    // MENGAMBIL nama DARI TABEL arsip_surat dengan alias 'nama_alias'
    // Nama kolom yang dihasilkan UNION ALL harus konsisten.
    // Kita akan tetap menggunakan 'nama' sebagai alias akhir untuk kompatibilitas.
    $queries_for_union[] = "SELECT
                                s.{$info['id']} AS id_surat,
                                s.no_surat,
                                s.nik,
                                s.id_arsip,  -- ✅ Tambahkan ini
                                s.jenis_surat,
                                s.status_surat,
                                s.tanggal_surat,
                                (SELECT ap.nama FROM arsip_surat ap WHERE ap.nik = s.nik ORDER BY ap.id_arsip DESC LIMIT 1) AS nama, -- DIUBAH MENJADI nama
                                '{$table}' AS table_name
                             FROM {$table} s
                             WHERE $whereStr";
}

// Gabungkan semua query dengan UNION ALL
$sql_union_all = implode(' UNION ALL ', $queries_for_union);

// Bungkus seluruh hasil UNION ALL dengan SELECT DISTINCT untuk memastikan
// keunikan berdasarkan kombinasi id_surat dan table_name
$final_select_query = "SELECT DISTINCT
                            id_surat,
                            no_surat,
                            nik,
                            id_arsip,        -- ✅ Tambahkan ini juga
                            jenis_surat,
                            status_surat,
                            tanggal_surat,
                            nama,
                            table_name
                       FROM ($sql_union_all) AS combined_unique_data";

// Query untuk mendapatkan total baris untuk paginasi dari hasil yang sudah unik
// Karena SELECT DISTINCT sudah menghasilkan kolom 'nama', query COUNT(*) tidak perlu join ulang
$total_result_query = "SELECT COUNT(*) as total FROM ($final_select_query) AS final_combined_data_count";
$total_result = mysqli_query($connect, $total_result_query);

// Handle error jika query total gagal
if (!$total_result) {
    die("Error mengambil total baris: " . mysqli_error($connect));
}
$total_rows = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Query untuk menampilkan data dengan paginasi
$sql = "$final_select_query ORDER BY tanggal_surat DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($connect, $sql);

// Handle error jika query data gagal
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

    <style>
        /* Gaya responsif untuk tombol di HP */
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

        /* --- PENYESUAIAN UNTUK MEMINDAHKAN MENU NAIK SEDIKIT --- */
        /* Mengurangi padding di bagian atas seluruh konten sidebar */
        .main-sidebar .sidebar {
            padding-top: 0px; /* Coba 0px, 5px, atau 10px sampai Anda dapatkan yang pas */
        }

        /* Mengurangi margin di bagian atas panel pengguna (gambar dan nama) */
        .main-sidebar .user-panel {
            margin-top: 0px; /* Ini juga bisa disesuaikan, misalnya 0px jika ingin lebih rapat */
        }
        /* --- AKHIR PENYESUAIAN --- */
    </style>

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

        /* Judul kolom di tengah */
        table#data-table thead th {
            text-align: center;
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
                    <div class="tombol-hp">
                        <a href="../../dashboard/">
                            <div>Kembali Ke Menu</div>
                        </a>
                    </div>

                    <div class="col-md-12">
                        <form method="GET" class="form-inline" style="margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="jenis_surat">Jenis Surat:</label>
                                <select name="jenis_surat" id="jenis_surat" class="form-control">
                                    <option value="">Semua</option>
                                    <?php foreach ($jenisSuratList as $table => $info): ?>
                                        <option value="<?= $table ?>" <?= ($filter_jenis == $table ? 'selected' : '') ?>>
                                            <?= ucwords(str_replace('_', ' ', $table)) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Cari:</label>
                                <input type="text" name="keyword" id="keyword" class="form-control" value="<?= htmlspecialchars($keyword) ?>" placeholder="Ketik Kata Kunci...">
                            </div>
                            <div class="form-group">
                                <label for="limit">Jumlah per halaman:</label>
                                <select name="limit" id="limit" class="form-control">
                                    <?php foreach ([10, 20, 50, 100] as $opt): ?>
                                        <option value="<?= $opt ?>" <?= ($limit == $opt ? 'selected' : '') ?>><?= $opt ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                            <a href="?" class="btn btn-default"><i class="fa fa-refresh"></i> Reset</a>
                        </form>

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