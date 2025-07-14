<?php
include_once '../../../../../config/koneksi.php'; // atau sesuaikan path koneksi

$alamat = [];

// Jalan
if (!empty($row['jalan'])) {
    $alamat[] = ucwords(strtolower($row['jalan']));
}

// RT/RW (3 digit)
$rt_valid = (isset($row['rt']) && preg_match('/^\d+$/', $row['rt'])) ? str_pad($row['rt'], 3, '0', STR_PAD_LEFT) : '000';
$rw_valid = (isset($row['rw']) && preg_match('/^\d+$/', $row['rw'])) ? str_pad($row['rw'], 3, '0', STR_PAD_LEFT) : '000';

if ($rt_valid !== '000' || $rw_valid !== '000') {
    $alamat[] = "RT$rt_valid/RW$rw_valid";
}

// Cek apakah nama_desa di profil_desa mengandung kata kelurahan
$tipeWilayah = 'Desa'; // default
$qProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
if ($profil = mysqli_fetch_assoc($qProfil)) {
    if (stripos($profil['nama_desa'], 'kelurahan') !== false) {
        $tipeWilayah = 'Kelurahan';
    }
}

// Dusun atau Lingkungan
if (!empty($row['dusun'])) {
    $labelDusun = ($tipeWilayah === 'Kelurahan') ? 'Lingkungan' : 'Dusun';
    $namaDusun = ucwords(strtolower($row['dusun']));
    $namaDusunLower = strtolower($namaDusun);

    if (!preg_match('/\b(dusun|lingk\.|lingkungan)\b/i', $namaDusunLower)) {
        $alamat[] = "$labelDusun $namaDusun";
    } else {
        $alamat[] = $namaDusun;
    }
}

// Desa atau Kelurahan
if (!empty($row['desa'])) {
    $namaDesa = ucwords(strtolower($row['desa']));
    if ($tipeWilayah === 'Kelurahan') {
        $alamat[] = "Kelurahan $namaDesa";
    } else {
        $alamat[] = "Desa $namaDesa";
    }
}

// Kecamatan
if (!empty($row['kecamatan'])) {
    $alamat[] = "Kecamatan " . ucwords(strtolower($row['kecamatan']));
}

// Kota/Kabupaten
if (!empty($row['kota'])) {
    $alamat[] = ucwords(strtolower($row['kota']));
}

// Gabungkan semua bagian
$alamatLengkap = implode(" ", $alamat);
?>
<div class="col-sm-9">
  <textarea rows="3" name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?= htmlspecialchars($alamatLengkap) ?></textarea>
</div>
