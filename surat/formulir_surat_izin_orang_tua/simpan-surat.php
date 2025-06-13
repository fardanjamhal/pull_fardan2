<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Formulir Persetujuan Calon Pengantin";
        $nik = $_POST['fnik'];
        $bin = addslashes($_POST['fbin']);
        $nama_istri = addslashes($_POST['fnama_istri']);
        $bin_istri = addslashes($_POST['fbin_istri']);
        $nik_istri = addslashes($_POST['fnik_istri']);
        $tgl_lahir_istri = addslashes($_POST['ftgl_lahir_istri']);
        $kewarganegaraan_istri = addslashes($_POST['fkewarganegaraan_istri']);
        $agama_istri = addslashes($_POST['fagama_istri']);
        $pekerjaan_istri = addslashes($_POST['fpekerjaan_istri']);
        $alamat_istri = addslashes($_POST['falamat_istri']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO formulir_persetujuan_calon_pengantin (jenis_surat, nik, bin, nama_istri, bin_istri, nik_istri,  tgl_lahir_istri, kewarganegaraan_istri, agama_istri, pekerjaan_istri, alamat_istri,  status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik',  '$bin', '$nama_istri', '$bin_istri', '$nik_istri', '$tgl_lahir_istri', '$kewarganegaraan_istri', '$agama_istri', '$pekerjaan_istri', '$alamat_istri', '$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>