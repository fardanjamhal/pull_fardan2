<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Penghasilan Orang Tua";
        $nik = $_POST['fnik'];
        $nomor_induk_siswa = addslashes($_POST['fnomor_induk_siswa']);
        $jurusan_fakultas = addslashes($_POST['fjurusan_fakultas']);
        $sekolah_perguruan_tinggi = addslashes($_POST['fsekolah_perguruan_tinggi']);
        $kelas_semester = addslashes($_POST['fkelas_semester']);
        $nama_ayah = addslashes($_POST['fnama_ayah']);
        $tgl_lahir2 = addslashes($_POST['ftgl_lahir2']);
        $nik2 = addslashes($_POST['fnik2']);
        $jenis_kelamin2 = addslashes($_POST['fjenis_kelamin2']);
        $agama2 = addslashes($_POST['fagama2']);
        $pekerjaan2 = addslashes($_POST['fpekerjaan2']);
        $alamat2 = addslashes($_POST['falamat2']);
        $penghasilan_ayah = addslashes($_POST['fpenghasilan_ayah']);
        $nama_ibu = addslashes($_POST['fnama_ibu']);
        $tgl_lahir3 = addslashes($_POST['ftgl_lahir3']);
        $nik3 = addslashes($_POST['fnik3']);
        $jenis_kelamin3 = addslashes($_POST['fjenis_kelamin3']);
        $agama3 = addslashes($_POST['fagama3']);
        $pekerjaan3 = addslashes($_POST['fpekerjaan3']);
        $alamat3 = addslashes($_POST['falamat3']);
        $penghasilan_ibu = addslashes($_POST['fpenghasilan_ibu']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO surat_keterangan_penghasilan_orang_tua (
        jenis_surat, 
        nik, 
        nomor_induk_siswa, 
        jurusan_fakultas, 
        sekolah_perguruan_tinggi, 
        kelas_semester, 
        nama_ayah, 
        tgl_lahir2, 
        nik2, 
        jenis_kelamin2, 
        agama2, 
        pekerjaan2, 
        alamat2, 
        penghasilan_ayah, 
        nama_ibu, 
        tgl_lahir3, 
        nik3, 
        jenis_kelamin3, 
        agama3, 
        pekerjaan3, 
        alamat3, 
        penghasilan_ibu, 
        status_surat, 
        id_profil_desa
        ) VALUES(
        '$jenis_surat', 
        '$nik', 
        '$nomor_induk_siswa', 
        '$jurusan_fakultas', 
        '$sekolah_perguruan_tinggi', 
        '$kelas_semester', 
        '$nama_ayah', 
        '$tgl_lahir2', 
        '$nik2', 
        '$jenis_kelamin2', 
        '$agama2', 
        '$pekerjaan2', 
        '$alamat2', 
        '$penghasilan_ayah', 
        '$nama_ibu', 
        '$tgl_lahir3', 
        '$nik3', 
        '$jenis_kelamin3', 
        '$agama3', 
        '$pekerjaan3', 
        '$alamat3', 
        '$penghasilan_ibu', 
        '$status_surat', 
        '$id_profil_desa'
        )";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>