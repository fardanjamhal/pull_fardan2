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

    // Fungsi untuk validasi angka saja
    function isValidRtRw($value) {
        return preg_match('/^[0-9]+$/', $value);
    }

    if (!empty($rt) && !empty($rw) && isValidRtRw($rt) && isValidRtRw($rw)) {
        $alamatParts[] = "RT $rt / RW $rw";
    } elseif (!empty($rt) && isValidRtRw($rt)) {
        $alamatParts[] = "RT $rt";
    } elseif (!empty($rw) && isValidRtRw($rw)) {
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
