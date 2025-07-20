<?php
function formatTempatTanggalSurat(mysqli $connect, string $no_surat): string
{
    // Ambil nama desa
    $q_desa = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
    $r_desa = mysqli_fetch_assoc($q_desa);
    $nama_desa = $r_desa['nama_desa'] ?? 'Desa/Kelurahan';
    // Hilangkan kata "desa" atau "kelurahan" (tidak peka huruf besar/kecil)
    $nama_desa = str_ireplace(['desa', 'kelurahan'], '', $nama_desa);
    // Hilangkan spasi berlebih di depan/belakang
    $nama_desa = trim($nama_desa);

    $tanggal_surat = null;

    // 1. Coba dari tabel nomor_surat
    $q_nomor = mysqli_query($connect, "SELECT tanggal_surat FROM nomor_surat WHERE nomor_lengkap = '$no_surat' LIMIT 1");
    if ($q_nomor && mysqli_num_rows($q_nomor) > 0) {
        $r_nomor = mysqli_fetch_assoc($q_nomor);
        $tanggal_surat = $r_nomor['tanggal_surat'];
    }

    // 2. Jika belum ditemukan, cek semua tabel jenis surat
    if (!$tanggal_surat || $tanggal_surat === '0000-00-00') {
        $tables = mysqli_query($connect, "SHOW TABLES");
        while ($row = mysqli_fetch_row($tables)) {
            $tabel = $row[0];

            if (stripos($tabel, 'surat_') !== 0 && stripos($tabel, 'formulir_') !== 0) {
                continue;
            }

            // Cek apakah ada kolom no_surat dan tanggal_surat
            $cek1 = mysqli_query($connect, "SHOW COLUMNS FROM `$tabel` LIKE 'no_surat'");
            $cek2 = mysqli_query($connect, "SHOW COLUMNS FROM `$tabel` LIKE 'tanggal_surat'");
            if (mysqli_num_rows($cek1) == 0 || mysqli_num_rows($cek2) == 0) {
                continue;
            }

            $q = mysqli_query($connect, "SELECT tanggal_surat FROM `$tabel` WHERE no_surat = '$no_surat' LIMIT 1");
            if ($q && mysqli_num_rows($q) > 0) {
                $r = mysqli_fetch_assoc($q);
                $tanggal_surat = $r['tanggal_surat'];
                break; // ✅ Stop pencarian jika ketemu
            }
        }
    }

    // 3. Jika tetap tidak ditemukan, pakai tanggal hari ini
    if (!$tanggal_surat || $tanggal_surat === '0000-00-00') {
        $tanggal_surat = date('Y-m-d');
    }

    // 4. Format ke gaya Indonesia
    $bulanIndo = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    $tgl = date('j', strtotime($tanggal_surat));
    $bln = (int)date('n', strtotime($tanggal_surat));
    $thn = date('Y', strtotime($tanggal_surat));

    return "$nama_desa, $tgl {$bulanIndo[$bln]} $thn";
}


function ambilTempatPenandatangan(mysqli $connect): string
{
    $query = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");

    if (!$query || mysqli_num_rows($query) == 0) {
        return '[Data desa tidak ditemukan]';
    }

    $data = mysqli_fetch_assoc($query);
    $nama_desa = trim($data['nama_desa'] ?? '');

    if (stripos($nama_desa, 'Desa ') === 0) {
        // Jika diawali dengan "Desa "
        $nama_bersih = preg_replace('/^Desa\s+/i', '', $nama_desa);
        return 'Kepala Desa ' . $nama_bersih;
    } elseif (stripos($nama_desa, 'Kelurahan ') === 0) {
        // Jika diawali dengan "Kelurahan "
        $nama_bersih = preg_replace('/^Kelurahan\s+/i', '', $nama_desa);
        return 'Lurah ' . $nama_bersih;
    }

    // Jika tidak mengandung awalan yang dikenali
    return $nama_desa;
}

function ambilDataPenandatangan(mysqli $connect, int $id): array
{
    if (!$id) {
        return ['nama' => '[ID kosong]', 'pangkat' => '', 'nip' => ''];
    }

    function kolomIdUtama(string $tabel, mysqli $connect): ?string {
        $cols = mysqli_query($connect, "SHOW COLUMNS FROM `$tabel`");
        while ($col = mysqli_fetch_assoc($cols)) {
            if (stripos($col['Field'], 'id_') === 0) {
                return $col['Field'];
            }
        }
        return null;
    }

    $result = mysqli_query($connect, "SHOW TABLES");
    $no_surat_ditemukan = null;

    while ($row = mysqli_fetch_row($result)) {
        $tabel = $row[0];
        if (stripos($tabel, 'surat_') !== 0 && stripos($tabel, 'formulir_') !== 0) {
            continue;
        }

        $cekKolom = mysqli_query($connect, "SHOW COLUMNS FROM `$tabel` LIKE 'no_surat'");
        if (mysqli_num_rows($cekKolom) == 0) {
            continue;
        }

        $kolomId = kolomIdUtama($tabel, $connect);
        if (!$kolomId) {
            continue;
        }

        $q = mysqli_query($connect, "SELECT `$kolomId`, no_surat FROM `$tabel` ORDER BY `$kolomId` DESC LIMIT 20");
        while ($data = mysqli_fetch_assoc($q)) {
            if ((int)$data[$kolomId] === $id) {
                $no_surat_ditemukan = trim($data['no_surat'] ?? '');
                break 2;
            }
        }
    }

    if (!$no_surat_ditemukan) {
        return ['nama' => '[NO SURAT TIDAK DITEMUKAN]', 'pangkat' => '', 'nip' => ''];
    }

    $q = mysqli_query($connect, "
        SELECT nama_pejabat_desa, pangkat, nip, id_pejabat_desa
        FROM nomor_surat
        WHERE nomor_lengkap = '$no_surat_ditemukan'
        ORDER BY id DESC
        LIMIT 1
    ");

    if ($q && mysqli_num_rows($q) > 0) {
        $pejabat = mysqli_fetch_assoc($q);

        $hasil = [
            'nama' => $pejabat['nama_pejabat_desa'] ?? '',
            'pangkat' => $pejabat['pangkat'] ?? '',
            'nip' => $pejabat['nip'] ?? '',
        ];

        // Jika nama kosong, fallback ke default dari tabel pejabat_desa
        if (empty($pejabat['nama_pejabat_desa'])) {
            $q_default = mysqli_query($connect, "
                SELECT nama_pejabat_desa, pangkat, nip 
                FROM pejabat_desa 
                ORDER BY id_pejabat_desa ASC 
                LIMIT 1
            ");
            if ($q_default && mysqli_num_rows($q_default) > 0) {
                $default = mysqli_fetch_assoc($q_default);
                $hasil['nama'] = $default['nama_pejabat_desa'] ?? '[PEJABAT DEFAULT]';
                $hasil['pangkat'] = $default['pangkat'] ?? '';
                $hasil['nip'] = $default['nip'] ?? '';
            }
        }

        // Tambahkan barcode jika id_pejabat_desa = 2
        if (isset($pejabat['id_pejabat_desa']) && (int)$pejabat['id_pejabat_desa'] === 2) {
           $hasil['barcode'] = '../../../../assets/img/barcode.png?v=' . time();
        }

        return $hasil;
    }

    // Jika data tetap tidak ditemukan, fallback ke pejabat_desa
    $q_default = mysqli_query($connect, "
        SELECT nama_pejabat_desa, pangkat, nip 
        FROM pejabat_desa 
        ORDER BY id_pejabat_desa ASC 
        LIMIT 1
    ");
    if ($q_default && mysqli_num_rows($q_default) > 0) {
        $default = mysqli_fetch_assoc($q_default);
        return [
            'nama' => $default['nama_pejabat_desa'] ?? '[PEJABAT DEFAULT]',
            'pangkat' => $default['pangkat'] ?? '',
            'nip' => $default['nip'] ?? '',
        ];
    }

    return ['nama' => '[TIDAK ADA DATA]', 'pangkat' => '', 'nip' => ''];
}






?>
