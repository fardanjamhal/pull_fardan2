<?php
include('../../config/koneksi.php');

if (isset($_POST['submit'])) {
    $jenis_surat = "Surat Keterangan Pindah Penduduk";
    $nik = mysqli_real_escape_string($connect, $_POST['fnik']);
    $alamat_yang_dituju = addslashes($_POST['falamat_yang_dituju']);
    $alasan_pindah = addslashes($_POST['falasan_pindah']);
    $tanggal_pindah = addslashes($_POST['ftanggal_pindah']);
    $jumlah_pengikut_display = (int) $_POST['fjumlah_pengikut_display'];
    $status_surat = "PENDING";
    $id_profil_desa = "1";

    // Inisialisasi array pengikut (hindari warning jika tidak ada pengikut)
    $nik_pengikut = isset($_POST['fnik_pengikut']) ? $_POST['fnik_pengikut'] : [];
    $nama_pengikut = isset($_POST['fnama_pengikut']) ? $_POST['fnama_pengikut'] : [];
    $masa_berlaku_ktp = isset($_POST['fmasa_berlaku_ktp']) ? $_POST['fmasa_berlaku_ktp'] : [];
    $shdk = isset($_POST['fshdk']) ? $_POST['fshdk'] : [];

    // Ambil data penduduk
    $qPenduduk = mysqli_query($connect, "SELECT * FROM penduduk WHERE nik = '$nik'");
    $dataPenduduk = mysqli_fetch_assoc($qPenduduk);

    if ($dataPenduduk) {
        // Escape semua data penduduk
        foreach ($dataPenduduk as $key => $value) {
            $dataPenduduk[$key] = mysqli_real_escape_string($connect, $value);
        }

        // Simpan ke arsip_surat
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
        $id_arsip = mysqli_insert_id($connect);

        // Simpan ke surat_keterangan_pindah_penduduk
        $qTambahSurat = "INSERT INTO surat_keterangan_pindah_penduduk (
            jenis_surat, nik, alamat_yang_dituju, alasan_pindah, tanggal_pindah, 
            jumlah_pengikut_display, status_surat, id_profil_desa, id_arsip
        ) VALUES (
            '$jenis_surat', '$nik', '$alamat_yang_dituju', '$alasan_pindah', '$tanggal_pindah',
            '$jumlah_pengikut_display', '$status_surat', '$id_profil_desa', '$id_arsip'
        )";
        mysqli_query($connect, $qTambahSurat);
        $id_surat = mysqli_insert_id($connect);

        // Simpan data pengikut jika ada
       if ($jumlah_pengikut_display > 0 && is_array($nik_pengikut)) {
            foreach ($nik_pengikut as $i => $nik_p) {
                if (!empty($nik_p)) {
                    $nik_p    = mysqli_real_escape_string($connect, $nik_p);
                    $nama_p   = mysqli_real_escape_string($connect, $nama_pengikut[$i]); // Perbaikan di sini
                    $masa_ktp = mysqli_real_escape_string($connect, $masa_berlaku_ktp[$i]);
                    $shdk_p   = mysqli_real_escape_string($connect, $shdk[$i]);

                    mysqli_query($connect, "INSERT INTO pengikut_surat_keterangan_pindah_penduduk (
                        id_surat_pindah, nik_pengikut, nama_pengikut, masa_berlaku_ktp, shdk
                    ) VALUES (
                        '$id_surat', '$nik_p', '$nama_p', '$masa_ktp', '$shdk_p'
                    )");
                }
            }
        }


        // Redirect jika sukses
        header("Location: ../index.php?pesan=berhasil");
        exit;
    } else {
        // Jika NIK tidak ditemukan
        echo "Data penduduk tidak ditemukan.";
    }
}
?>
