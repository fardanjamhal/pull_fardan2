<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Formulir Permohonan Kehendak Nikah";
        $nik = $_POST['fnik'];
        $kepada_yth = addslashes($_POST['fkepada_yth']);
        $hari_tanggal = addslashes($_POST['fhari_tanggal']);
        $delapan = addslashes($_POST['fdelapan']);
        $sembilan = addslashes($_POST['fsembilan']);
        $sepuluh = addslashes($_POST['fsepuluh']);
        $sebelas = addslashes($_POST['fsebelas']);
        $dua_belas = addslashes($_POST['fdua_belas']);
        $tiga_belas = addslashes($_POST['ftiga_belas']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO formulir_permohonan_kehendak_nikah (jenis_surat, nik, kepada_yth, hari_tanggal, delapan, sembilan, sepuluh, sebelas, dua_belas, tiga_belas, status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik', '$kepada_yth', '$hari_tanggal', '$delapan', '$sembilan', '$sepuluh', '$sebelas', '$dua_belas', '$tiga_belas', '$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>