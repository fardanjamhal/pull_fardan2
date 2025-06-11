<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])) {
        $jenis_surat = "Formulir Pengantar Nikah";
        $nik = $_POST['fnik'];
        $status_nikah = addslashes($_POST['fstatus_nikah']);
        $nama_ayah = addslashes($_POST['fnama_ayah']);
        $nik_ayah = addslashes($_POST['fnik_ayah']);
        $tempat_tgl_lahir_ayah = addslashes($_POST['ftempat_tgl_lahir_ayah']);
        $kewarganegaraan_ayah = addslashes($_POST['fkewarganegaraan_ayah']);
        $agama_ayah = addslashes($_POST['fagama_ayah']);
        $pekerjaan_ayah = addslashes($_POST['fpekerjaan_ayah']);
        $alamat_ayah = addslashes($_POST['falamat_ayah']);
        $nama_ibu = addslashes($_POST['fnama_ibu']);
        $nik_ibu = addslashes($_POST['fnik_ibu']);
        $tempat_tgl_lahir_ibu = addslashes($_POST['ftempat_tgl_lahir_ibu']);
        $kewarganegaraan_ibu = addslashes($_POST['fkewarganegaraan_ibu']);
        $agama_ibu = addslashes($_POST['fagama_ibu']);
        $pekerjaan_ibu = addslashes($_POST['fpekerjaan_ibu']);
        $alamat_ibu = addslashes($_POST['falamat_ibu']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO formulir_pengantar_nikah (
            jenis_surat, nik, status_nikah, nama_ayah, nik_ayah, tempat_tgl_lahir_ayah, kewarganegaraan_ayah, agama_ayah, pekerjaan_ayah, alamat_ayah,
            nama_ibu, nik_ibu, tempat_tgl_lahir_ibu, kewarganegaraan_ibu, agama_ibu, pekerjaan_ibu, alamat_ibu, status_surat, id_profil_desa
        ) VALUES (
            '$jenis_surat', '$nik', '$status_nikah', '$nama_ayah', '$nik_ayah', '$tempat_tgl_lahir_ayah', '$kewarganegaraan_ayah', '$agama_ayah', '$pekerjaan_ayah', '$alamat_ayah',
            '$nama_ibu', '$nik_ibu', '$tempat_tgl_lahir_ibu', '$kewarganegaraan_ibu', '$agama_ibu', '$pekerjaan_ibu', '$alamat_ibu', '$status_surat', '$id_profil_desa'
        )";

        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>
