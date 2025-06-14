<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Domisili Usaha";
        $nik = $_POST['fnik'];
        $jenis_usaha = addslashes($_POST['fjenis_usaha']);
        $alamat_usaha = addslashes($_POST['falamat_usaha']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_domisili_usaha (jenis_surat, nik, jenis_usaha, alamat_usaha, status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik', '$jenis_usaha', '$alamat_usaha', '$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>