<?php
session_start();
include('../../config/koneksi.php');

// Cek apakah ID ada
if (!isset($_POST['id_profil_desa'])) {
    $_SESSION['error'] = "Data tidak lengkap.";
    header("Location: index.php");
    exit();
}

$id         = $_POST['id_profil_desa'];
$nama_desa  = $_POST['nama_desa'];
$alamat     = $_POST['alamat'];
$no_telpon  = $_POST['no_telpon'];
$kecamatan  = $_POST['kecamatan'];
$kota       = $_POST['kota'];
$provinsi   = $_POST['provinsi'];
$kode_pos   = $_POST['kode_pos'];
$wa_admin   = $_POST['wa_admin'];

// Ambil data lama dari database
$queryLama = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = '$id'");
$dataLama  = mysqli_fetch_assoc($queryLama);

$ttdDigital = $dataLama['ttd_digital'];
$logoLama  = $dataLama['logo_desa'];
$kopLama   = $dataLama['gambar_kop'];
$gambar_home   = $dataLama['gambar_home'];

$targetDir = "../../assets/img/";

// --- Upload Gambar TTD Tangan (dengan nama tetap barcode.png)
$ttd_digital = $ttdDigital; // default pakai lama
if (!empty($_FILES['ttd_digital']['name'])) {
    $filename_ttd = "barcode.png"; // Nama file tetap
    $temp_ttd     = $_FILES['ttd_digital']['tmp_name'];
    $tujuan_ttd   = $targetDir . $filename_ttd;

    // Hapus file lama jika ada
    if (file_exists($tujuan_ttd)) {
        unlink($tujuan_ttd);
    }

    // Upload file baru
    if (move_uploaded_file($temp_ttd, $tujuan_ttd)) {
        $ttd_digital = $filename_ttd; // Simpan nama file tetap
    }
}

// --- Upload Gambar Kop
$gambar_kop = $kopLama; // default pakai lama
if (!empty($_FILES['gambar_kop']['name'])) {
    $filename_kop = basename($_FILES['gambar_kop']['name']);
    $temp_kop     = $_FILES['gambar_kop']['tmp_name'];
    $tujuan_kop   = $targetDir . $filename_kop;

    if (move_uploaded_file($temp_kop, $tujuan_kop)) {
        $gambar_kop = $filename_kop;
    }
}

// --- Upload Logo Desa
$logo_desa = $logoLama; // default pakai lama
if (!empty($_FILES['logo_desa']['name'])) {
    $filename_logo = basename($_FILES['logo_desa']['name']);
    $temp_logo     = $_FILES['logo_desa']['tmp_name'];
    $tujuan_logo   = $targetDir . $filename_logo;

    if (move_uploaded_file($temp_logo, $tujuan_logo)) {
        $logo_desa = $filename_logo;
    }
}

// --- Upload Background Home
$gambar_home = $gambarHomeLama; // default pakai lama dari database
if (!empty($_FILES['gambar_home']['name'])) {
    $temp_file   = $_FILES['gambar_home']['tmp_name'];
    $tujuan_file = $targetDir . "dedig.png"; // pakai nama tetap

    if (move_uploaded_file($temp_file, $tujuan_file)) {
        $gambar_home = "dedig.png"; // simpan nama file ke database
    }
}


// --- Update Data
$query = "UPDATE profil_desa SET 
            nama_desa   = '$nama_desa',
            alamat      = '$alamat',
            no_telpon   = '$no_telpon',
            kecamatan   = '$kecamatan',
            kota        = '$kota',
            provinsi    = '$provinsi',
            kode_pos    = '$kode_pos',
            wa_admin    = '$wa_admin',
            ttd_digital = '$ttd_digital',
            gambar_kop  = '$gambar_kop',
            logo_desa   = '$logo_desa',
            gambar_home = '$gambar_home'
          WHERE id_profil_desa = '$id'";

if (mysqli_query($connect, $query)) {
    $_SESSION['success'] = "Profil desa berhasil diperbarui.";
} else {
    $_SESSION['error'] = "Gagal memperbarui profil: " . mysqli_error($connect);
}

header("Location: index.php");
exit();
?>
