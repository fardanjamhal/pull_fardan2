<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Kematian dan Penguburan";
        $nik = $_POST['fnik'];
        $hari_tanggal_kematian = addslashes($_POST['fhari_tanggal_kematian']);
        $jam_pukul = addslashes($_POST['fjam_pukul']);
        $tempat = addslashes($_POST['ftempat']);
        $hari_tanggal_dikebumikan = addslashes($_POST['fhari_tanggal_dikebumikan']);
        $jam_pukul_dikebumikan = addslashes($_POST['fjam_pukul_dikebumikan']);
        $tempat_dikebumikan = addslashes($_POST['ftempat_dikebumikan']);
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

        $qTambahSurat = "INSERT INTO surat_keterangan_kematian_dan_penguburan 
        (
        jenis_surat, 
        nik,
        hari_tanggal_kematian,
        jam_pukul,
        tempat,
        hari_tanggal_dikebumikan,
        jam_pukul_dikebumikan,
        tempat_dikebumikan,
        status_surat, 
        id_profil_desa,
        id_arsip
        ) VALUES(
        '$jenis_surat', 
        '$nik', 
        '$hari_tanggal_kematian',
        '$jam_pukul',
        '$tempat',
        '$hari_tanggal_dikebumikan',
        '$jam_pukul_dikebumikan',
        '$tempat_dikebumikan',
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