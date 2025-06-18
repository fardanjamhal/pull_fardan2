<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Formulir Surat Izin Orang Tua";
        $nik = $_POST['fnik'];

        $bin = addslashes($_POST['fbin']);

        $nama1 = addslashes($_POST['fnama1']);
        $bin1 = addslashes($_POST['fbin1']);
        $nik1 = addslashes($_POST['fnik1']);
        $tempat_tgl_lahir1 = addslashes($_POST['ftempat_tgl_lahir1']);
        $kewarganegaraan1 = addslashes($_POST['fkewarganegaraan1']);
        $agama1 = addslashes($_POST['fagama1']);
        $pekerjaan1 = addslashes($_POST['fpekerjaan1']);
        $alamat1 = addslashes($_POST['falamat1']);

        $nama2 = addslashes($_POST['fnama2']);
        $bin2 = addslashes($_POST['fbin2']);
        $nik2 = addslashes($_POST['fnik2']);
        $tempat_tgl_lahir2 = addslashes($_POST['ftempat_tgl_lahir2']);
        $kewarganegaraan2 = addslashes($_POST['fkewarganegaraan2']);
        $agama2 = addslashes($_POST['fagama2']);
        $pekerjaan2 = addslashes($_POST['fpekerjaan2']);
        $alamat2 = addslashes($_POST['falamat2']);

        $nama3 = addslashes($_POST['fnama3']);
        $bin3 = addslashes($_POST['fbin3']);
        $nik3 = addslashes($_POST['fnik3']);
        $tempat_tgl_lahir3 = addslashes($_POST['ftempat_tgl_lahir3']);
        $kewarganegaraan3 = addslashes($_POST['fkewarganegaraan3']);
        $agama3 = addslashes($_POST['fagama3']);
        $pekerjaan3 = addslashes($_POST['fpekerjaan3']);
        $alamat3 = addslashes($_POST['falamat3']);

        $status_surat = "PENDING";
        $id_profil_desa = "1";

         // Ambil data dari tabel penduduk berdasarkan NIK
    $qPenduduk = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik'");
    $dataPenduduk = mysqli_fetch_assoc($qPenduduk);

    if ($dataPenduduk) {
        // Escape semua nilai dari array penduduk
        foreach ($dataPenduduk as $key => $value) {
            $dataPenduduk[$key] = mysqli_real_escape_string($connect, $value);
        }

        // Simpan ke tabel arsip_surat
        $qArsip = "INSERT INTO arsip_surat (
            nik, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama, jalan, dusun, rt, rw, desa, kecamatan, kota, no_kk,
            pend_kk, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan, status_dlm_keluarga,
            kewarganegaraan, nama_ayah, nama_ibu
        ) VALUES (
            '{$dataPenduduk['nik']}',
            '{$dataPenduduk['nama']}',
            '{$dataPenduduk['tempat_lahir']}',
            '{$dataPenduduk['tgl_lahir']}',
            '{$dataPenduduk['jenis_kelamin']}',
            '{$dataPenduduk['agama']}',
            '{$dataPenduduk['jalan']}',
            '{$dataPenduduk['dusun']}',
            '{$dataPenduduk['rt']}',
            '{$dataPenduduk['rw']}',
            '{$dataPenduduk['desa']}',
            '{$dataPenduduk['kecamatan']}',
            '{$dataPenduduk['kota']}',
            '{$dataPenduduk['no_kk']}',
            '{$dataPenduduk['pend_kk']}',
            '{$dataPenduduk['pend_terakhir']}',
            '{$dataPenduduk['pend_ditempuh']}',
            '{$dataPenduduk['pekerjaan']}',
            '{$dataPenduduk['status_perkawinan']}',
            '{$dataPenduduk['status_dlm_keluarga']}',
            '{$dataPenduduk['kewarganegaraan']}',
            '{$dataPenduduk['nama_ayah']}',
            '{$dataPenduduk['nama_ibu']}'
        )";
        mysqli_query($connect, $qArsip);

        // Ambil ID arsip yang baru saja disimpan
        $id_arsip = mysqli_insert_id($connect);



        // Simpan ke tabel surat_keterangan_domisili dengan id_arsip

        $qTambahSurat = "INSERT INTO formulir_surat_izin_orang_tua (
        jenis_surat, 
        nik,

        bin,
        nama1, 
        bin1, 
        nik1,  
        tempat_tgl_lahir1, 
        kewarganegaraan1,
        agama1, 
        pekerjaan1, 
        alamat1,

        nama2, 
        bin2, 
        nik2,  
        tempat_tgl_lahir2, 
        kewarganegaraan2,
        agama2, 
        pekerjaan2, 
        alamat2,

        nama3, 
        bin3, 
        nik3,  
        tempat_tgl_lahir3, 
        kewarganegaraan3,
        agama3, 
        pekerjaan3, 
        alamat3,

        status_surat, 
        id_profil_desa,
        id_arsip) 
        
        VALUES(
        '$jenis_surat', 
        '$nik',  

        '$bin', 

        '$nama1', 
        '$bin1', 
        '$nik1', 
        '$tempat_tgl_lahir1', 
        '$kewarganegaraan1', 
        '$agama1', 
        '$pekerjaan1', 
        '$alamat1',

        '$nama2', 
        '$bin2', 
        '$nik2', 
        '$tempat_tgl_lahir2', 
        '$kewarganegaraan2', 
        '$agama2', 
        '$pekerjaan2', 
        '$alamat2',

        '$nama3', 
        '$bin3', 
        '$nik3', 
        '$tempat_tgl_lahir3', 
        '$kewarganegaraan3', 
        '$agama3', 
        '$pekerjaan3', 
        '$alamat3',

        '$status_surat', 
        '$id_profil_desa',
        '$id_arsip')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
}
?>