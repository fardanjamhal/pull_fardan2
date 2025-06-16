<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Beda Identitas KIS";
        $nik = $_POST['fnik'];
        $keperluan = addslashes($_POST['fkeperluan']);
        $no_kartu = addslashes($_POST['fno_kartu']);
        $nama_di_kartu = addslashes($_POST['fnama_di_kartu']);
        $nik2 = addslashes($_POST['fnik2']);
        $alamat2 = addslashes($_POST['falamat2']);
        $tanggal_lahir = addslashes($_POST['ftanggal_lahir']);
        $faskes_tingkat = addslashes($_POST['ffaskes_tingkat']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_beda_identitas_kis 
        (
        jenis_surat, 
        nik,
        keperluan,
        no_kartu,
        nama_di_kartu,
        nik2,
        alamat2,
        tanggal_lahir,
        faskes_tingkat,
        status_surat, 
        id_profil_desa
        ) VALUES(
        '$jenis_surat', 
        '$nik', 
        '$keperluan',
        '$no_kartu',
        '$nama_di_kartu',
        '$nik2',
        '$alamat2',
        '$tanggal_lahir',
        '$faskes_tingkat',
        '$status_surat', 
        '$id_profil_desa'
        )";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>