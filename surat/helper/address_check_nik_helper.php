<?php
if (!function_exists('formatAlamatLengkap')) {
    function formatAlamatLengkap($data) {
        include_once('../../config/koneksi.php'); // Pastikan koneksi global tersedia

        $alamat = [];

        // Fungsi validasi RT/RW
        function isValidRtRw($value) {
            return preg_match('/^[0-9]+$/', $value);
        }

        // Ambil jenis wilayah dari profil_desa
        $tipeWilayah = 'Desa'; // default
        $query = mysqli_query($GLOBALS['connect'], "SELECT nama_desa FROM profil_desa LIMIT 1");
        if ($profil = mysqli_fetch_assoc($query)) {
            $tipeWilayah = (strpos(strtolower($profil['nama_desa']), 'kelurahan') !== false) ? 'Kelurahan' : 'Desa';
        }

        // Jalan
        if (!empty($data['jalan'])) {
            $alamat[] = ucwords(strtolower($data['jalan']));
        }

        // RT/RW (jika tidak kosong, bukan '-', dan valid angka)
        $rt = trim($data['rt'] ?? '');
        $rw = trim($data['rw'] ?? '');

        $isValidRt = isValidRtRw($rt) && $rt !== '-';
        $isValidRw = isValidRtRw($rw) && $rw !== '-';

        if ($isValidRt || $isValidRw) {
            $rt_valid = $isValidRt ? str_pad($rt, 3, '0', STR_PAD_LEFT) : '000';
            $rw_valid = $isValidRw ? str_pad($rw, 3, '0', STR_PAD_LEFT) : '000';
            $alamat[] = "RT$rt_valid/RW$rw_valid";
        }

        // Dusun/Lingkungan
        if (!empty($data['dusun'])) {
            $labelDusun = ($tipeWilayah === 'Kelurahan') ? 'Lingkungan' : 'Dusun';
            $namaDusun = ucwords(strtolower($data['dusun']));
            if (!preg_match('/^(lingkungan|dusun)/i', strtolower($namaDusun))) {
                $alamat[] = "$labelDusun $namaDusun";
            } else {
                $alamat[] = $namaDusun;
            }
        }

        // Desa / Kelurahan
        if (!empty($data['desa'])) {
            $labelWilayah = ($tipeWilayah === 'Kelurahan') ? 'Kelurahan' : 'Desa';
            $alamat[] = "$labelWilayah " . ucwords(strtolower($data['desa']));
        }

        // Kecamatan
        if (!empty($data['kecamatan'])) {
            $alamat[] = "Kecamatan " . ucwords(strtolower($data['kecamatan']));
        }

        // Kota
        if (!empty($data['kota'])) {
            $alamat[] = ucwords(strtolower($data['kota']));
        }

        // Gabungkan jadi satu baris
        return implode(" ", $alamat);
    }
}
