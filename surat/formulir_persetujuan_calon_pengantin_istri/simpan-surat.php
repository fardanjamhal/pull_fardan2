<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Formulir Persetujuan Calon Pengantin Istri";
        $nik = $_POST['fnik'];
        $bin = addslashes($_POST['fbin']);
        $nama_suami = addslashes($_POST['fnama_suami']);
        $bin_suami = addslashes($_POST['fbin_suami']);
        $nik_suami = addslashes($_POST['fnik_suami']);
        $tgl_lahir_suami = addslashes($_POST['ftgl_lahir_suami']);
        $kewarganegaraan_suami = addslashes($_POST['fkewarganegaraan_suami']);
        $agama_suami = addslashes($_POST['fagama_suami']);
        $pekerjaan_suami = addslashes($_POST['fpekerjaan_suami']);
        $alamat_suami = addslashes($_POST['falamat_suami']);
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
        $qTambahSurat = "INSERT INTO formulir_persetujuan_calon_pengantin_istri (jenis_surat, nik, bin, nama_suami, bin_suami, nik_suami,  tgl_lahir_suami, kewarganegaraan_suami, agama_suami, pekerjaan_suami, alamat_suami,  status_surat, id_profil_desa, id_arsip) VALUES('$jenis_surat', '$nik',  '$bin', '$nama_suami', '$bin_suami', '$nik_suami', '$tgl_lahir_suami', '$kewarganegaraan_suami', '$agama_suami', '$pekerjaan_suami', '$alamat_suami', '$status_surat', '$id_profil_desa', '$id_arsip')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);
        header("location:../index.php?pesan=berhasil");
    }
}
?>