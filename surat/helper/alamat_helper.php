<?php
include('../../config/koneksi.php'); // Pastikan koneksi tersedia

$alamat = [];

function isValidRtRw($value) {
    return preg_match('/^[0-9]+$/', $value);
}

// Ambil tipe wilayah (desa / kelurahan)
$query = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
$profil = mysqli_fetch_assoc($query);
$tipeWilayah = (strpos(strtolower($profil['nama_desa']), 'kelurahan') !== false) ? 'Kelurahan' : 'Desa';

// Jalan
if (!empty($data['jalan'])) {
    $alamat[] = ucwords(strtolower($data['jalan']));
}

// RT/RW (tampilkan keduanya, isi default 000 jika kosong)
$rt = trim($data['rt'] ?? '');
$rw = trim($data['rw'] ?? '');
$rt_valid = isValidRtRw($rt) ? str_pad($rt, 3, '0', STR_PAD_LEFT) : '000';
$rw_valid = isValidRtRw($rw) ? str_pad($rw, 3, '0', STR_PAD_LEFT) : '000';
if ($rt || $rw) {
    $alamat[] = "RT$rt_valid/RW$rw_valid";
}

// Dusun atau Lingkungan
if (!empty($data['dusun'])) {
    $labelDusun = ($tipeWilayah === 'Kelurahan') ? 'Lingkungan' : 'Dusun';
    $namaDusun = ucwords(strtolower($data['dusun']));

    // Cek apakah sudah ada kata "Lingkungan" atau "Dusun" di awal
    $namaDusunLower = strtolower($namaDusun);
    if (!preg_match('/^(lingkungan|dusun)/i', $namaDusunLower)) {
        $alamat[] = "$labelDusun $namaDusun";
    } else {
        $alamat[] = $namaDusun; // Sudah mengandung label, langsung pakai
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

// Kota / Kabupaten
if (!empty($data['kota'])) {
    $alamat[] = ucwords(strtolower($data['kota']));
}

// Gabungkan
$alamatLengkap = implode(" ", $alamat);
?>

<textarea name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?= htmlspecialchars($alamatLengkap); ?></textarea>
