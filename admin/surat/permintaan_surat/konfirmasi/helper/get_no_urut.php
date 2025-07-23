<?php
include('../../../../../config/koneksi.php');

$kode_surat = isset($_GET['kode_surat']) ? $_GET['kode_surat'] : '';
$tahun = date('Y');

if ($kode_surat) {
    $query = mysqli_query($connect, "
        SELECT MAX(nomor_urut) AS max_urut
        FROM nomor_surat
        WHERE kode_surat = '$kode_surat' AND tahun = '$tahun'
    ");
    $result = mysqli_fetch_assoc($query);
    $next_urut = ($result && $result['max_urut']) ? $result['max_urut'] + 1 : 1;
    echo $next_urut;
} else {
    echo '';
}
?>
