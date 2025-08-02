<?php
function formatAlamatLengkap($row, $connect) {
    $alamatParts = [];

    // Ambil status wilayah: apakah 'Desa' atau 'Kelurahan'
    $tipeWilayah = 'Desa'; // Default
    $queryProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
    if ($queryProfil && $profil = mysqli_fetch_assoc($queryProfil)) {
        if (stripos($profil['nama_desa'], 'kelurahan') !== false) {
            $tipeWilayah = 'Kelurahan';
        }
    }

    // Jalan
    if (!empty($row['jalan'])) {
        $alamatParts[] = $row['jalan'];
    }

    // RT/RW
    $rt = trim($row['rt']);
    $rw = trim($row['rw']);

    // Validasi hanya angka
   if (!function_exists('isValidRtRw')) {
    function isValidRtRw($value) {
        // isi fungsi, contoh:
        return preg_match('/^\d{1,3}$/', $value);
    }
    }

    // Default nilai jika kosong
    $rt_valid = isValidRtRw($rt) ? str_pad($rt, 3, '0', STR_PAD_LEFT) : null;
    $rw_valid = isValidRtRw($rw) ? str_pad($rw, 3, '0', STR_PAD_LEFT) : null;

    // Dusun atau Lingkungan
    if (!empty($row['dusun'])) {
        $labelDusun = ($tipeWilayah === 'Kelurahan') ? 'Lingkungan' : 'Dusun';
        $namaDusun = ucwords(strtolower($row['dusun']));
        $namaDusunLower = strtolower($namaDusun);

        // Cek apakah sudah mengandung kata Dusun, Lingk., atau Lingkungan
        if (!preg_match('/\b(dusun|lingk\.|lingkungan)\b/i', $namaDusunLower)) {
            $alamatParts[] = "$labelDusun $namaDusun";
        } else {
            $alamatParts[] = $namaDusun;
        }
    }


    if ($rt_valid || $rw_valid) {
        $rt_display = $rt_valid ?? '000';
        $rw_display = $rw_valid ?? '-';
        $alamatParts[] = "RT$rt_display/RW$rw_display";
    }

    // Desa atau Kelurahan (dinamis)
    if (!empty($row['desa'])) {
        // Ambil data dari tabel profil_desa untuk menentukan apakah "desa" atau "kelurahan"
        $query = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
        $profil = mysqli_fetch_assoc($query);
        $nama_desa_profil = strtolower($profil['nama_desa']);

        if (strpos($nama_desa_profil, 'kelurahan') !== false) {
            $alamatParts[] = "Kelurahan " . $row['desa'];
        } else {
            $alamatParts[] = "Desa " . $row['desa'];
        }
    }
    
     // Kecamatan
    if (!empty($row['kecamatan'])) {
        $alamatParts[] = "Kecamatan " . $row['kecamatan'];
    }

    // Kota
    if (!empty($row['kota'])) {
        $alamatParts[] = "Kabupaten " . $row['kota'];
    }

    // Gabungkan dan format kapitalisasi
    $alamat = implode(" ", $alamatParts);
    $alamat = ucwords(strtolower($alamat));

    // Pastikan RT RW tetap kapital
   $alamat = implode(" ", $alamatParts);

    // Kapitalisasi awal setiap kata tanpa ganggu huruf kapital lainnya
    $alamat = preg_replace_callback('/\b[a-z]/', function($match) {
        return strtoupper($match[0]);
    }, $alamat);

    // Pastikan RT dan RW kapital penuh
    $alamat = preg_replace('/\bRT\s?(\d+)/i', 'RT$1', $alamat);
    $alamat = preg_replace('/\bRW\s?(\d+)/i', 'RW$1', $alamat);

    return $alamat;

}
?>
