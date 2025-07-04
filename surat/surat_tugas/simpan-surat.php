<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        // Ambil nama folder dari URL (misalnya: "surat_keterangan_domisili_usaha")
        $folder = basename(dirname($_SERVER['PHP_SELF']));
        // Ubah garis bawah (_) jadi spasi, lalu huruf awal tiap kata jadi kapital
        $jenis_surat = ucwords(str_replace('_', ' ', $folder));
        $nik = $_POST['fnik'];

        $dasar          = addslashes($_POST['fdasar']);

        $nama_anggota   = $_POST['fnama'] ?? [];
        $jabatan_anggota = $_POST['fjabatan'] ?? [];

        $jumlah = count($nama_anggota);
        $max = min(9, $jumlah); // batas maksimum 9

        // Siapkan variabel dinamis untuk disisip ke query
        for ($i = 0; $i < $max; $i++) {
            ${"nama_" . ($i+1)}    = addslashes($nama_anggota[$i]);
            ${"jabatan_" . ($i+1)} = addslashes($jabatan_anggota[$i]);
        }

        // Isi yang kosong jika kurang dari 9
        for ($i = $max; $i < 9; $i++) {
            ${"nama_" . ($i+1)}    = '';
            ${"jabatan_" . ($i+1)} = '';
        }

        $untuk           = addslashes($_POST['funtuk']);
        $tempat_tujuan   = addslashes($_POST['ftempat_tujuan']);
        $lama_penugasan  = addslashes($_POST['flama_penugasan']);
        $tanggal_mulai   = addslashes($_POST['ftanggal_mulai']);
        $tanggal_selesai = addslashes($_POST['ftanggal_selesai']);

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

            dasar,
            nama_1, jabatan_1,
            nama_2, jabatan_2,
            nama_3, jabatan_3,
            nama_4, jabatan_4,
            nama_5, jabatan_5,
            nama_6, jabatan_6,
            nama_7, jabatan_7,
            nama_8, jabatan_8,
            nama_9, jabatan_9,

            untuk,
            tempat_tujuan,
            lama_penugasan,
            tanggal_mulai,
            tanggal_selesai,

            status_surat, 
            id_profil_desa, 
            id_arsip
        ) VALUES (
            '$jenis_surat', 
            '$nik', 

            '$dasar',

            '$nama_1', '$jabatan_1',
            '$nama_2', '$jabatan_2',
            '$nama_3', '$jabatan_3',
            '$nama_4', '$jabatan_4',
            '$nama_5', '$jabatan_5',
            '$nama_6', '$jabatan_6',
            '$nama_7', '$jabatan_7',
            '$nama_8', '$jabatan_8',
            '$nama_9', '$jabatan_9',

            '$untuk',
            '$tempat_tujuan',
            '$lama_penugasan',
            '$tanggal_mulai',
            '$tanggal_selesai',

            '$status_surat', 
            '$id_profil_desa', 
            '$id_arsip'
        )";

        $TambahSurat = mysqli_query($connect, $qTambahSurat) or die(mysqli_error($connect));


        // Ambil ID surat yang baru
         include_once '../helper/waktu_disalin.php'; // sesuaikan dengan lokasi sebenarnya
        $nama = $dataPenduduk['nama'] ?? '-';
        redirectKePending($id_arsip, $nik, $nama);

    }
}
?>