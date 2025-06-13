<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Formulir Persetujuan Calon Pengantin Istri";
        $nik = $_POST['fnik'];
        $bin = addslashes($_POST['fbin']);
        $nama_suami = addslashes($_POST['fnama_suami']);
        $bin_suami = addslashes($_POST['fbin_suami']);
        $nik_suami = addslashes($_POST['fnik_suami']);
        $tgl_lahir_suami = addslashes($_POST['ftgl_lahir_suami']);
        $kewarganegaraan_suami = addslashes($_POST['fkewarganegaraan_suami']);
        $agama_suami = addslashes($_POST['fagama_suami']);
        $pekerjaan_suami = addslashes($_POST['fpekerjaan_suami']);
        $alamat_suami = addslashes($_POST['falamat_suami']);
        $status_surat = "PENDING";
        $id_profil_desa = "1";

        $qTambahSurat = "INSERT INTO formulir_persetujuan_calon_pengantin_istri (jenis_surat, nik, bin, nama_suami, bin_suami, nik_suami,  tgl_lahir_suami, kewarganegaraan_suami, agama_suami, pekerjaan_suami, alamat_suami,  status_surat, id_profil_desa) VALUES('$jenis_surat', '$nik',  '$bin', '$nama_suami', '$bin_suami', '$nik_suami', '$tgl_lahir_suami', '$kewarganegaraan_suami', '$agama_suami', '$pekerjaan_suami', '$alamat_suami', '$status_surat', '$id_profil_desa')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
?>