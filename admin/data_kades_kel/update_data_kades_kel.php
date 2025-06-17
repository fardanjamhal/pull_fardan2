<?php
session_start();
include('../../config/koneksi.php');

// Cek apakah ID ada
if (!isset($_POST['id_pejabat_desa'])) {
    $_SESSION['error'] = "Data tidak lengkap.";
    header("Location: index.php");
    exit();
}

$id                 = $_POST['id_pejabat_desa'];
$nama_pejabat_desa  = $_POST['nama_pejabat_desa'];
$jabatan            = $_POST['jabatan'];
$pangkat            = $_POST['pangkat'];
$nip                = $_POST['nip'];


// Ambil data lama dari database
$queryLama = mysqli_query($connect, "SELECT * FROM pejabat_desa WHERE id_pejabat_desa = '$id'");
$dataLama  = mysqli_fetch_assoc($queryLama);

// --- Update Data
$query = "UPDATE pejabat_desa SET 
            nama_pejabat_desa   = '$nama_pejabat_desa',
            jabatan             = '$jabatan',
            pangkat             = '$pangkat',
            nip                 = '$nip'
          WHERE id_pejabat_desa = '$id'";

if (mysqli_query($connect, $query)) {
    $_SESSION['success'] = "Data Pejabat Desa / Kelurahan Berhasil diperbarui.";
} else {
    $_SESSION['error'] = "Gagal memperbarui profil: " . mysqli_error($connect);
}

header("Location: index.php");
exit();
?>
