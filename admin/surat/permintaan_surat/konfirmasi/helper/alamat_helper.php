<?php
$alamat = [];

// Cek dan tambahkan bagian alamat jika tidak kosong
if (!empty($row['jalan'])) {
    $alamat[] = $row['jalan'];
}

if (!empty($row['rt']) || !empty($row['rw'])) {
    $rt = !empty($row['rt']) ? $row['rt'] : '-';
    $rw = !empty($row['rw']) ? $row['rw'] : '-';
    $alamat[] = "RT$rt/RW$rw";
}

if (!empty($row['dusun'])) {
    $alamat[] = "Dusun " . $row['dusun'];
}

if (!empty($row['desa'])) {
    $alamat[] = "Desa " . $row['desa'];
}

if (!empty($row['kecamatan'])) {
    $alamat[] = "Kecamatan " . $row['kecamatan'];
}

if (!empty($row['kota'])) {
    $alamat[] = $row['kota'];
}

// Gabungkan dengan spasi
$alamatLengkap = implode(" ", $alamat);
?>
<div class="col-sm-9">
  <textarea rows="3" name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?= $alamatLengkap ?></textarea>
</div>
