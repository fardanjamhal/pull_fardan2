<?php
include ('../../config/koneksi.php');

$id = intval($_POST['id']);
$nik = mysqli_real_escape_string($connect, $_POST['fnik']);
$nama = mysqli_real_escape_string($connect, $_POST['fnama']);
$tempat_lahir = mysqli_real_escape_string($connect, $_POST['ftempat_lahir']);
$tgl_lahir = mysqli_real_escape_string($connect, $_POST['ftgl_lahir']);
$jenis_kelamin = mysqli_real_escape_string($connect, $_POST['fjenis_kelamin']);
$agama = mysqli_real_escape_string($connect, $_POST['fagama']);
$jalan = mysqli_real_escape_string($connect, $_POST['fjalan']);
$dusun = mysqli_real_escape_string($connect, $_POST['fdusun']);
$rt = mysqli_real_escape_string($connect, $_POST['frt']);
$rw = mysqli_real_escape_string($connect, $_POST['frw']);
$desa = mysqli_real_escape_string($connect, $_POST['fdesa']);
$kecamatan = mysqli_real_escape_string($connect, $_POST['fkecamatan']);
$kota = mysqli_real_escape_string($connect, $_POST['fkota']);
$no_kk = mysqli_real_escape_string($connect, $_POST['fno_kk']);
$pend_kk = mysqli_real_escape_string($connect, $_POST['fpend_kk']);
$pend_terakhir = mysqli_real_escape_string($connect, $_POST['fpend_terakhir']);
$pend_ditempuh = mysqli_real_escape_string($connect, $_POST['fpend_ditempuh']);
$pekerjaan = mysqli_real_escape_string($connect, $_POST['fpekerjaan']);
$status_perkawinan = mysqli_real_escape_string($connect, $_POST['fstatus_perkawinan']);
$status_dlm_keluarga = mysqli_real_escape_string($connect, $_POST['fstatus_dlm_keluarga']);
$kewarganegaraan = mysqli_real_escape_string($connect, $_POST['fkewarganegaraan']);
$nama_ayah = mysqli_real_escape_string($connect, $_POST['fnama_ayah']);
$nama_ibu = mysqli_real_escape_string($connect, $_POST['fnama_ibu']);

$qUpdate = "UPDATE penduduk SET 
    nik = '$nik',
    nama = '$nama',
    tempat_lahir = '$tempat_lahir',
    tgl_lahir = '$tgl_lahir',
    jenis_kelamin = '$jenis_kelamin',
    agama = '$agama',
    jalan = '$jalan',
    dusun = '$dusun',
    rt = '$rt',
    rw = '$rw',
    desa = '$desa',
    kecamatan = '$kecamatan',
    kota = '$kota',
    no_kk = '$no_kk',
    pend_kk = '$pend_kk',
    pend_terakhir = '$pend_terakhir',
    pend_ditempuh = '$pend_ditempuh',
    pekerjaan = '$pekerjaan',
    status_perkawinan = '$status_perkawinan',
    status_dlm_keluarga = '$status_dlm_keluarga',
    kewarganegaraan = '$kewarganegaraan',
    nama_ayah = '$nama_ayah',
    nama_ibu = '$nama_ibu'
    WHERE id_penduduk = '$id'
";

$update = mysqli_query($connect, $qUpdate);

// Cek apakah data berubah
if ($update && mysqli_affected_rows($connect) > 0) {
    header('Location: ../penduduk/index.php?pesan=edit-sukses&nama=' . urlencode($nama));
    exit();
} else {
    // Tidak berubah, kembali tanpa pesan
    header('Location: ../penduduk/index.php');
    exit();
}
?>
