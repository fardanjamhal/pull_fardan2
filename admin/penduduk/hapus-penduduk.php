<?php
include ('../../config/koneksi.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Amankan ID dari URL

    // Ambil NIK berdasarkan ID penduduk
    $queryNik = mysqli_query($connect, "SELECT nik FROM penduduk WHERE id_penduduk = '$id'");
    $dataNik = mysqli_fetch_assoc($queryNik);
    $nik = $dataNik['nik'] ?? null;

    if ($nik) {
        // Hapus data dari tabel surat_keterangan yang berkaitan dengan NIK
        $qHapusSurat = mysqli_query($connect, "DELETE FROM surat_keterangan WHERE nik = '$nik'");

        // Hapus data dari tabel penduduk
        $qHapusPenduduk = mysqli_query($connect, "DELETE FROM penduduk WHERE id_penduduk = '$id'");

        if ($qHapusSurat && $qHapusPenduduk) {
            header('Location: index.php?pesan=sukses');
            exit();
        } else {
            header('Location: index.php?pesan=gagal-menghapus');
            exit();
        }
    } else {
        header('Location: index.php?pesan=nik-tidak-ditemukan');
        exit();
    }
} else {
    header('Location: index.php?pesan=id-tidak-valid');
    exit();
}
?>
