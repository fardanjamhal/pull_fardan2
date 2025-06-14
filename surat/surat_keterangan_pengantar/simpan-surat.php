<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Pengantar";
        $nik = $_POST['fnik'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $golongan_darah = addslashes($_POST['fgolongan_darah']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_pengantar (jenis_surat, nik, keperluan, golongan_darah, status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik', '$keperluan', '$golongan_darah', '$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>