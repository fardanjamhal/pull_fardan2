<?php
session_start();
include('../../config/koneksi.php');

// Cek apakah ID tersedia
if (!isset($_POST['id_pejabat_desa'])) {
    $_SESSION['error'] = "Data tidak lengkap.";
    header("Location: index.php");
    exit();
}

// Tangkap data dari form
$id                 = $_POST['id_pejabat_desa'];
$nama_pejabat_desa  = $_POST['nama_pejabat_desa'];
$jabatan            = $_POST['jabatan'];
$pangkat            = $_POST['pangkat'];
$nip                = $_POST['nip'];
$alamat             = $_POST['alamat'];

// Siapkan query update dengan prepared statement
$stmt = $connect->prepare("
    UPDATE pejabat_desa 
    SET 
        nama_pejabat_desa = ?, 
        jabatan = ?, 
        pangkat = ?, 
        nip = ?, 
        alamat = ?
    WHERE 
        id_pejabat_desa = ?
");

// Bind parameter (5 string + 1 integer)
$stmt->bind_param("sssssi", $nama_pejabat_desa, $jabatan, $pangkat, $nip, $alamat, $id);

// Eksekusi query
if ($stmt->execute()) {
    $_SESSION['success'] = "Data Pejabat Desa / Kelurahan berhasil diperbarui.";
} else {
    $_SESSION['error'] = "Gagal memperbarui data: " . $stmt->error;
}

// Tutup statement dan redirect
$stmt->close();
header("Location: index.php");
exit();
?>
