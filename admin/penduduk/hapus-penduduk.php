<?php
include ('../../config/koneksi.php');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        // Ambil data penduduk
        $queryPenduduk = mysqli_query($connect, "SELECT nik, nama FROM penduduk WHERE id_penduduk = '$id'");
        $data = mysqli_fetch_assoc($queryPenduduk);

        $nik = $data['nik'] ?? null;
        $nama = urlencode($data['nama'] ?? ''); // encode agar aman di URL

        if ($nik) {
            // Coba hapus data
            mysqli_query($connect, "DELETE FROM penduduk WHERE id_penduduk = '$id'");

            header('Location: index.php?pesan=sukses');
            exit();
        } else {
            header('Location: index.php?pesan=nik-tidak-ditemukan');
            exit();
        }

    } catch (mysqli_sql_exception $e) {
        $nama = $nama ?? 'Penduduk';

        if (strpos($e->getMessage(), 'a foreign key constraint fails') !== false) {
            header("Location: index.php?pesan=gagal-relasi&nama=" . urlencode($nama) . "&nik=" . urlencode($nik));
            exit();
        } else {
            header('Location: index.php?pesan=gagal-umum');
            exit();
        }
    }

} else {
    header('Location: index.php?pesan=id-tidak-valid');
    exit();
}
?>
