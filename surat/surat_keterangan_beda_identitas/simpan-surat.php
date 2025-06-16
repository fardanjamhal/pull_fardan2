<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Beda Identitas";
        $nik = $_POST['fnik'];
        $perbedaan = addslashes($_POST['fperbedaan']);
        $nama_kartu_identitas = addslashes($_POST['fnama_kartu_identitas']);
        $nama_no_identitas = addslashes($_POST['fnama_no_identitas']);
        $nama2 = addslashes($_POST['fnama2']);
        $tgl_lahir2 = addslashes($_POST['ftgl_lahir2']);
        $jenis_kelamin2 = addslashes($_POST['fjenis_kelamin2']);
        $alamat2 = addslashes($_POST['falamat2']);
        $agama2 = addslashes($_POST['fagama2']);
        $pekerjaan2 = addslashes($_POST['fpekerjaan2']);
        $keterangan2 = addslashes($_POST['fketerangan2']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_beda_identitas 
        (
        jenis_surat, 
        nik,
        perbedaan,
        nama_kartu_identitas,
        nama_no_identitas,
        nama2,
        tgl_lahir2,
        jenis_kelamin2,
        alamat2,
        agama2,
        pekerjaan2,
        keterangan2,
        status_surat, 
        id_profil_desa
        ) VALUES(
        '$jenis_surat', 
        '$nik', 
        '$perbedaan',
        '$nama_kartu_identitas',
        '$nama_no_identitas',
        '$nama2',
        '$tgl_lahir2',
        '$jenis_kelamin2',
        '$alamat2',
        '$agama2',
        '$pekerjaan2',
        '$keterangan2',
        '$status_surat', 
        '$id_profil_desa'
        )";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>