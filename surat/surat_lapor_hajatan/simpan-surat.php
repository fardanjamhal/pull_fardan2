<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Lapor Hajatan";
        $nik = $_POST['fnik'];
        $bukti_ktp = $_POST['fbukti_ktp'];
        $bukti_kk = $_POST['fbukti_kk'];
        $jenis_hajat = addslashes($_POST['fjenis_hajat']);
        $hari = addslashes($_POST['fhari']);
        $tanggal = $_POST['ftanggal'];
        $jenis_hiburan = addslashes($_POST['fjenis_hiburan']);
        $pemilik = addslashes($_POST['fpemilik']);
        $alamat_pemilik = addslashes($_POST['falamat_pemilik']);
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

        $qTambahSurat = "INSERT INTO surat_lapor_hajatan (jenis_surat, nik, bukti_ktp, bukti_kk, jenis_hajat, hari, tanggal, jenis_hiburan, pemilik, alamat_pemilik, status_surat, id_profil_desa, id_arsip) VALUES('$jenis_surat', '$nik', '$bukti_ktp', '$bukti_kk', '$jenis_hajat', '$hari', '$tanggal', '$jenis_hiburan', '$pemilik', '$alamat_pemilik', '$status_surat', '$id_profil_desa', '$id_arsip')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
}
?>