<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])) {
        $jenis_surat = "Formulir Pengantar Nikah";
        $nik = $_POST['fnik'];
        $status_nikah1 = addslashes($_POST['fstatus_nikah1']);
        $status_nikah2 = addslashes($_POST['fstatus_nikah2']);
        $nama_ayah = addslashes($_POST['fnama_ayah']);
        $nik_ayah = addslashes($_POST['fnik_ayah']);
        $tempat_tgl_lahir_ayah = addslashes($_POST['ftempat_tgl_lahir_ayah']);
        $kewarganegaraan_ayah = addslashes($_POST['fkewarganegaraan_ayah']);
        $agama_ayah = addslashes($_POST['fagama_ayah']);
        $pekerjaan_ayah = addslashes($_POST['fpekerjaan_ayah']);
        $alamat_ayah = addslashes($_POST['falamat_ayah']);
        $nama_ibu = addslashes($_POST['fnama_ibu']);
        $nik_ibu = addslashes($_POST['fnik_ibu']);
        $tempat_tgl_lahir_ibu = addslashes($_POST['ftempat_tgl_lahir_ibu']);
        $kewarganegaraan_ibu = addslashes($_POST['fkewarganegaraan_ibu']);
        $agama_ibu = addslashes($_POST['fagama_ibu']);
        $pekerjaan_ibu = addslashes($_POST['fpekerjaan_ibu']);
        $alamat_ibu = addslashes($_POST['falamat_ibu']);
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


        $qTambahSurat = "INSERT INTO formulir_pengantar_nikah (
            jenis_surat, nik, status_nikah1, status_nikah2, nama_ayah, nik_ayah, tempat_tgl_lahir_ayah, kewarganegaraan_ayah, agama_ayah, pekerjaan_ayah, alamat_ayah,
            nama_ibu, nik_ibu, tempat_tgl_lahir_ibu, kewarganegaraan_ibu, agama_ibu, pekerjaan_ibu, alamat_ibu, status_surat, id_profil_desa, id_arsip
        ) VALUES (
            '$jenis_surat', '$nik', '$status_nikah1', '$status_nikah2', '$nama_ayah', '$nik_ayah', '$tempat_tgl_lahir_ayah', '$kewarganegaraan_ayah', '$agama_ayah', '$pekerjaan_ayah', '$alamat_ayah',
            '$nama_ibu', '$nik_ibu', '$tempat_tgl_lahir_ibu', '$kewarganegaraan_ibu', '$agama_ibu', '$pekerjaan_ibu', '$alamat_ibu', '$status_surat', '$id_profil_desa', '$id_arsip'
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
