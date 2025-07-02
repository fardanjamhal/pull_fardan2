<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Kematian";
        $nik = $_POST['fnik'];
        $tanggal_meninggal = addslashes($_POST['ftanggal_meninggal']);
        $bertempat_di = addslashes($_POST['fbertempat_di']);
        $penyebab_kematian = addslashes($_POST['fpenyebab_kematian']);
        $nama_pelapor = addslashes($_POST['fnama_pelapor']);
        $nik_pelapor = addslashes($_POST['fnik_pelapor']);
        $tanggal_lahir_pelapor = addslashes($_POST['ftanggal_lahir_pelapor']);
        $pekerjaan_pelapor = addslashes($_POST['fpekerjaan_pelapor']);
        $alamat_pelapor = addslashes($_POST['falamat_pelapor']);
        $hubungan_pelapor = addslashes($_POST['fhubungan_pelapor']);
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


        $qTambahSurat = "INSERT INTO surat_keterangan_kematian (
        jenis_surat,
        nik,
        tanggal_meninggal,
        bertempat_di,
        penyebab_kematian,
        nama_pelapor,
        nik_pelapor,
        tanggal_lahir_pelapor,
        pekerjaan_pelapor,
        alamat_pelapor,
        hubungan_pelapor,
        status_surat,
        id_profil_desa,
        id_arsip
        ) 
        VALUES(
        '$jenis_surat',
        '$nik', 
        '$tanggal_meninggal', 
        '$bertempat_di', 
        '$penyebab_kematian', 
        '$nama_pelapor', 
        '$nik_pelapor', 
        '$tanggal_lahir_pelapor', 
        '$pekerjaan_pelapor', 
        '$alamat_pelapor',
        '$hubungan_pelapor', 
        '$status_surat', 
        '$id_profil_desa',
        '$id_arsip'
        )";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);

        // Ambil ID surat yang baru
        // Ambil nama folder URL, misalnya "formulir_pengantar_nikah"
        $folder = basename(dirname($_SERVER['PHP_SELF']));
        $jenis_surat = ucwords(str_replace('_', ' ', $folder));
        $tanggal = date('Y-m-d');
        $nama = $dataPenduduk['nama'] ?? '-';

        // Kirim data lewat URL termasuk id_arsip
        header("Location: ../pending.php?pesan=berhasil" .
            "&jenis=" . urlencode($jenis_surat) .
            "&tanggal=$tanggal" .
            "&nama=" . urlencode($nama) .
            "&nik=$nik" .
            "&id_arsip=$id_arsip");
        exit;

    }
}
?>