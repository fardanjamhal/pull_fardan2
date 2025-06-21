<?php
function formatAlamatLengkap($row) {
    $alamatParts = [];

    // Jalan
    if (!empty($row['jalan'])) {
        $alamatParts[] = $row['jalan'];
    }

    // RT/RW
    $rt = trim($row['rt']);
    $rw = trim($row['rw']);
    if (!empty($rt) && !empty($rw)) {
        $alamatParts[] = "RT $rt / RW $rw";
    } elseif (!empty($rt)) {
        $alamatParts[] = "RT $rt";
    } elseif (!empty($rw)) {
        $alamatParts[] = "RW $rw";
    }

    // Dusun
    if (!empty($row['dusun'])) {
        $alamatParts[] = "Dusun " . $row['dusun'];
    }

    // Desa
    if (!empty($row['desa'])) {
        $alamatParts[] = "Desa " . $row['desa'];
    }

    // Kota dengan awalan "Kabupaten"
    if (!empty($row['kota'])) {
        $alamatParts[] = "Kab. " . $row['kota'];
    }

    // Gabungkan
    $alamat = implode(" ", $alamatParts);

    // Format kapitalisasi awal kata
    $alamat = ucwords(strtolower($alamat));

    // RT/RW huruf besar
    $alamat = str_replace(['Rt', 'Rw'], ['RT', 'RW'], $alamat);

    return $alamat;
}
?>
