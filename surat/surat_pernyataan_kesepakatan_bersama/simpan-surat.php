<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
         // Ambil nama folder dari URL (misalnya: "surat_keterangan_domisili_usaha")
        $folder = basename(dirname($_SERVER['PHP_SELF']));
        // Ubah garis bawah (_) jadi spasi, lalu huruf awal tiap kata jadi kapital
        $jenis_surat = ucwords(str_replace('_', ' ', $folder));
        $nik = $_POST['fnik'];

        // Ambil dan amankan input dari form
        $nama2      = addslashes($_POST['fnama2']);
        $umur2      = addslashes($_POST['fumur2']);
        $pekerjaan2 = addslashes($_POST['fpekerjaan2']);
        $agama2     = addslashes($_POST['fagama2']);
        $alamat2    = addslashes($_POST['falamat2']);
        $isi_surat  = addslashes($_POST['fisi_surat']);

        // Ambil array saksi dari form
        $saksiList = isset($_POST['saksi']) ? $_POST['saksi'] : [];

        // Isi default kosong jika tidak diisi
        $saksi1 = isset($saksiList[0]) ? addslashes($saksiList[0]) : '';
        $saksi2 = isset($saksiList[1]) ? addslashes($saksiList[1]) : '';
        $saksi3 = isset($saksiList[2]) ? addslashes($saksiList[2]) : '';
        $saksi4 = isset($saksiList[3]) ? addslashes($saksiList[3]) : '';

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
        // 1. Ambil nama folder = nama tabel (misalnya: surat_keterangan_domisili_usaha)
        $nama_tabel = basename(dirname($_SERVER['PHP_SELF']));

        $qTambahSurat = "INSERT INTO `$nama_tabel` (
        jenis_surat, 
        nik,

        nama2, 
        umur2, 
        pekerjaan2, 
        agama2, 
        alamat2, 
        isi_surat,
        saksi1,
        saksi2, 
        saksi3, 
        saksi4,

        status_surat, 
        id_profil_desa, 
        id_arsip
        ) VALUES(
        '$jenis_surat', 
        '$nik', 

        '$nama2',
        '$umur2', 
        '$pekerjaan2', 
        '$agama2', 
        '$alamat2', 
        '$isi_surat',
        '$saksi1', 
        '$saksi2', 
        '$saksi3', 
        '$saksi4',

        '$status_surat', 
        '$id_profil_desa', 
        '$id_arsip'
        )";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);

        // Ambil ID surat yang baru
        include_once '../helper/waktu_disalin.php'; // sesuaikan dengan lokasi sebenarnya
        $nama = $dataPenduduk['nama'] ?? '-';
        redirectKePending($id_arsip, $nik, $nama);

    }
}
?>