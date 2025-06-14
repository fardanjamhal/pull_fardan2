<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Kematian";
        $nik = $_POST['fnik'];
        $tanggal_meninggal = addslashes($_POST['ftanggal_meninggal']);
        $bertempat_di = addslashes($_POST['fbertempat_di']);
        $penyebab_kematian = addslashes($_POST['fpenyebab_kematian']);
        $nama_pelapor = addslashes($_POST['fnama_pelapor']);
        $nik_pelapor = addslashes($_POST['fnik_pelapor']);
        $tanggal_lahir_pelapor = addslashes($_POST['ftanggal_lahir_pelapor']);
        $pekerjaan_pelapor = addslashes($_POST['fpekerjaan_pelapor']);
        $alamat_pelapor = addslashes($_POST['falamat_pelapor']);
        $hubungan_pelapor = addslashes($_POST['fhubungan_pelapor']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_kematian (
        jenis_surat,
        nik,
        tanggal_meninggal,
        bertempat_di,
        penyebab_kematian,
        nama_pelapor,
        nik_pelapor,
        tanggal_lahir_pelapor,
        pekerjaan_pelapor,
        alamat_pelapor,
        hubungan_pelapor,
        status_surat,
        id_profil_desa
        ) 
        VALUES(
        '$jenis_surat',
        '$nik', 
        '$tanggal_meninggal', 
        '$bertempat_di', 
        '$penyebab_kematian', 
        '$nama_pelapor', 
        '$nik_pelapor', 
        '$tanggal_lahir_pelapor', 
        '$pekerjaan_pelapor', 
        '$alamat_pelapor',
        '$hubungan_pelapor', 
        '$status_surat', 
        '$id_profil_desa'
        )";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>