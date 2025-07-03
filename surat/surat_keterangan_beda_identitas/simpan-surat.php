<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Beda Identitas";
        $nik = $_POST['fnik'];
        $perbedaan = addslashes($_POST['fperbedaan']);
        $nama_kartu_identitas = addslashes($_POST['fnama_kartu_identitas']);
        $nama_no_identitas = addslashes($_POST['fnama_no_identitas']);
        $nama2 = addslashes($_POST['fnama2']);
        $tgl_lahir2 = addslashes($_POST['ftgl_lahir2']);
        $jenis_kelamin2 = addslashes($_POST['fjenis_kelamin2']);
        $alamat2 = addslashes($_POST['falamat2']);
        $agama2 = addslashes($_POST['fagama2']);
        $pekerjaan2 = addslashes($_POST['fpekerjaan2']);
        $keterangan2 = addslashes($_POST['fketerangan2']);
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


        $qTambahSurat = "INSERT INTO surat_keterangan_beda_identitas 
        (
        jenis_surat, 
        nik,
        perbedaan,
        nama_kartu_identitas,
        nama_no_identitas,
        nama2,
        tgl_lahir2,
        jenis_kelamin2,
        alamat2,
        agama2,
        pekerjaan2,
        keterangan2,
        status_surat, 
        id_profil_desa,
        id_arsip
        ) VALUES(
        '$jenis_surat', 
        '$nik', 
        '$perbedaan',
        '$nama_kartu_identitas',
        '$nama_no_identitas',
        '$nama2',
        '$tgl_lahir2',
        '$jenis_kelamin2',
        '$alamat2',
        '$agama2',
        '$pekerjaan2',
        '$keterangan2',
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