<?php
include('../../../../../config/koneksi.php');

$kode_surat = isset($_GET['kode_surat']) ? $_GET['kode_surat'] : '';
$tahun = date('Y');

// Cek apakah pejabat pertama adalah LURAH
$q_jabatan = mysqli_query($connect, "SELECT jabatan FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1");
$r_jabatan = mysqli_fetch_assoc($q_jabatan);
$is_lurah = (isset($r_jabatan['jabatan']) && strtoupper(trim($r_jabatan['jabatan'])) === 'LURAH');

if ($kode_surat) {
    if ($is_lurah) {
        // Jika lurah, urut berdasarkan jenis surat
        $query = mysqli_query($connect, "
            SELECT MAX(nomor_urut) AS max_urut
            FROM nomor_surat
            WHERE kode_surat = '$kode_surat' AND tahun = '$tahun'
        ");
    } else {
        // Jika bukan lurah, urut global semua jenis surat
        $query = mysqli_query($connect, "
            SELECT MAX(nomor_urut) AS max_urut
            FROM nomor_surat
            WHERE tahun = '$tahun'
        ");
    }

    $result = mysqli_fetch_assoc($query);
    $next_urut = ($result && $result['max_urut']) ? $result['max_urut'] + 1 : 1;
    echo $next_urut;
} else {
    echo '';
}
?>
