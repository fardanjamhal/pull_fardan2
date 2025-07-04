<?php
    include ('../../config/koneksi.php');

    if (isset($_POST['submit'])){
        // Ambil nama folder dari URL (misalnya: "surat_keterangan_domisili_usaha")
        $folder = basename(dirname($_SERVER['PHP_SELF']));
        // Ubah garis bawah (_) jadi spasi, lalu huruf awal tiap kata jadi kapital
        $jenis_surat = ucwords(str_replace('_', ' ', $folder));
        $nik = $_POST['fnik'];

        $pejabat      = addslashes($_POST['fpejabat']);
        $jabatan      = addslashes($_POST['fjabatan']);
        $dari         = addslashes($_POST['fdari']);
        $ke           = addslashes($_POST['fke']);
        $kendaraan    = addslashes($_POST['fkendaraan']);
        $selama       = addslashes($_POST['fselama']);
        // Hapus titik pada input rupiah agar bisa disimpan sebagai angka
        $rencana_biaya   = str_replace('.', '', $_POST['frencanabiaya']);
        $tgl_berangkat   = $_POST['ftgl_berangkat']; // tidak perlu addslashes karena format date
        $tgl_kembali     = $_POST['ftgl_kembali'];   // sama seperti di atas
        $maksud_mengadakan = addslashes($_POST['fmaksud_mengadakan']);
        $keterangan   = addslashes($_POST['fketerangan']);

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
        // 1. Ambil nama folder = nama tabel (misalnya: surat_keterangan_domisili_usaha)
        $nama_tabel = basename(dirname($_SERVER['PHP_SELF']));

        $qTambahSurat = "INSERT INTO `$nama_tabel` (
        jenis_surat, 
        nik, 
        pejabat, 
        jabatan, 
        dari, 
        ke, 
        kendaraan,
        selama, 
        rencana_biaya, 
        tgl_berangkat, 
        tgl_kembali, 
        maksud_mengadakan,
        keterangan,
        status_surat, 
        id_profil_desa, 
        id_arsip
        ) VALUES(
        '$jenis_surat', 
        '$nik', 

        '$pejabat', 
        '$jabatan', 
        '$dari', 
        '$ke', 
        '$kendaraan',
        '$selama', 
        '$rencana_biaya', 
        '$tgl_berangkat', 
        '$tgl_kembali', 
        '$maksud_mengadakan',
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