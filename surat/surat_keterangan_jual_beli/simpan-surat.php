<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Jual Beli";
        $nik = $_POST['fnik'];
        $nama2             = addslashes($_POST['fnama2']);
        $nik2              = addslashes($_POST['fnik2']);
        $tempat_tgl_lahir2 = addslashes($_POST['ftempat_tgl_lahir2']);
        $pekerjaan2        = addslashes($_POST['fpekerjaan2']);
        $alamat2           = addslashes($_POST['falamat2']);
        $yang_diperjualbelikan       = addslashes($_POST['fyang_diperjualbelikan']);
        $lokasi         = addslashes($_POST['flokasi']);
        $informasi_objek = addslashes($_POST['finformasi_objek']);
        $harga          = addslashes($_POST['fharga']);
        $tahun_jual_beli        = addslashes($_POST['ftahun_jual_beli']);
        $tanah_utara= addslashes($_POST['ftanah_utara']);
        $tanah_timur           = addslashes($_POST['ftanah_timur']);
        $tanah_selatan         = addslashes($_POST['ftanah_selatan']);
        $tanah_barat           = addslashes($_POST['ftanah_barat']);
        $saksi1           = addslashes($_POST['fsaksi1']);
        $saksi2           = addslashes($_POST['fsaksi2']);
        $saksi3           = addslashes($_POST['fsaksi3']);
        $saksi4           = addslashes($_POST['fsaksi4']);
        $nama_dusun        = addslashes($_POST['fnama_dusun']);
        $kepala_dusun         = addslashes($_POST['fkepala_dusun']);
        $keterangan           = addslashes($_POST['fketerangan']);
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



        // Simpan ke tabel surat_keterangan_mahar__sunrang_domisili dengan id_arsip

        $qTambahSurat = "INSERT INTO surat_keterangan_jual_beli (
        jenis_surat, 
        nik, 
        
        nik2,
        nama2,
        tempat_tgl_lahir2,
        pekerjaan2,
        alamat2,
        yang_diperjualbelikan,
        lokasi,
        informasi_objek,
        harga,
        tahun_jual_beli,
        tanah_utara, 
        tanah_timur, 
        tanah_selatan, 
        tanah_barat,
        saksi1, 
        saksi2, 
        saksi3, 
        saksi4,
        nama_dusun,
        kepala_dusun,
        keterangan,

        status_surat, 
        id_profil_desa, 
        id_arsip
        ) VALUES(
        '$jenis_surat', 
        '$nik', 

        '$nik2',
        '$nama2',
        '$tempat_tgl_lahir2',
        '$pekerjaan2',
        '$alamat2',
        '$yang_diperjualbelikan',
        '$lokasi',
        '$informasi_objek',
        '$harga',
        '$tahun_jual_beli',
        '$tanah_utara', 
        '$tanah_timur', 
        '$tanah_selatan', 
        '$tanah_barat',
        '$saksi1', 
        '$saksi2', 
        '$saksi3', 
        '$saksi4',
        '$nama_dusun',
        '$kepala_dusun',
        '$keterangan',

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