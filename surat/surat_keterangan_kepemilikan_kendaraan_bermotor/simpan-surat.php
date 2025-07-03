<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        $jenis_surat = "Surat Keterangan Kepemilikan Kendaraan Bermotor";
        $nik = $_POST['fnik'];
        $merk_type = $_POST['fmerk_type'];
        $jenis_model = $_POST['fjenis_model'];
        $tahun_pembuatan = $_POST['ftahun_pembuatan'];
        $cc = $_POST['fcc'];
        $warna_cat = $_POST['fwarna_cat'];
        $no_rangka = $_POST['fno_rangka'];
        $no_mesin = $_POST['fno_mesin'];
        $no_polisi = $_POST['fno_polisi'];
        $no_bpkb = $_POST['fno_bpkb'];
        $atas_nama_pemilik = addslashes($_POST['fatas_nama_pemilik']);
        $alamat_pemilik = addslashes($_POST['falamat_pemilik']);
        $keperluan = addslashes($_POST['fkeperluan']);
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


        $qTambahSurat = "INSERT INTO surat_keterangan_kepemilikan_kendaraan_bermotor (jenis_surat, nik, merk_type, jenis_model, tahun_pembuatan, cc, warna_cat, no_rangka, no_mesin, no_polisi, no_bpkb, atas_nama_pemilik, alamat_pemilik, keperluan, status_surat, id_profil_desa, id_arsip) VALUES('$jenis_surat', '$nik', '$merk_type', '$jenis_model', '$tahun_pembuatan', '$cc', '$warna_cat', '$no_rangka', '$no_mesin', '$no_polisi', '$no_bpkb', '$atas_nama_pemilik', '$alamat_pemilik', '$keperluan', '$status_surat', '$id_profil_desa', '$id_arsip')";
        $TambahSurat = mysqli_query($connect, $qTambahSurat);

        // Ambil ID surat yang baru
        include_once '../helper/waktu_disalin.php'; // sesuaikan dengan lokasi sebenarnya
        $nama = $dataPenduduk['nama'] ?? '-';
        redirectKePending($id_arsip, $nik, $nama);

    }
}
?>