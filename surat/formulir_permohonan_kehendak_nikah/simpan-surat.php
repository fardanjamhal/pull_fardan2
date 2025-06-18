<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Formulir Permohonan Kehendak Nikah";
        $nik = $_POST['fnik'];
        $calon_suami = addslashes($_POST['fcalon_suami']);
        $calon_istri = addslashes($_POST['fcalon_istri']);
        $hari_tanggal = addslashes($_POST['fhari_tanggal']);
        $tempat_akad = addslashes($_POST['ftempat_akad']);
        $delapan = addslashes($_POST['fdelapan']);
        $sembilan = addslashes($_POST['fsembilan']);
        $sepuluh = addslashes($_POST['fsepuluh']);
        $sebelas = addslashes($_POST['fsebelas']);
        $dua_belas = addslashes($_POST['fdua_belas']);
        $tiga_belas = addslashes($_POST['ftiga_belas']);
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

        $qTambahSurat = "INSERT INTO formulir_permohonan_kehendak_nikah (jenis_surat, nik, calon_suami, calon_istri, hari_tanggal, tempat_akad, delapan, sembilan, sepuluh, sebelas, dua_belas, tiga_belas, status_surat, id_profil_desa, id_arsip) VALUES('$jenis_surat', '$nik',  '$calon_suami', '$calon_istri', '$hari_tanggal', '$tempat_akad', '$delapan', '$sembilan', '$sepuluh', '$sebelas', '$dua_belas', '$tiga_belas', '$status_surat', '$id_profil_desa', '$id_arsip')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
        }
    }
?>