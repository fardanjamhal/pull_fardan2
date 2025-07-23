<?php
include('../../../../../config/koneksi.php');
include('../helper/nomor_surat.php');

if (!isset($_POST['id'])) {
    die("ID tidak ditemukan");
}

$id = (int)$_POST['id'];
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']);
$status_surat = "SELESAI";

// Ambil nama folder (sebagai nama tabel)
$nama_tabel = basename(__DIR__);

// Buat ID kolom dari singkatan huruf kecil nama folder
$stopwords = ['dan', 'atau', 'yang', 'dengan', 'ke', 'di', 'dari', 'untuk', 'serta'];
$singkatan = implode('', array_map(function($word) use ($stopwords) {
    return in_array(strtolower($word), $stopwords) ? '' : strtolower($word[0]);
}, explode('_', $nama_tabel)));
$kolom_id = 'id_' . $singkatan;

// Update tanggal_surat saat ini
mysqli_query($connect, "UPDATE $nama_tabel SET tanggal_surat = NOW() WHERE $kolom_id = $id");

// Ambil tanggal_surat terbaru
$qSurat = mysqli_query($connect, "SELECT tanggal_surat FROM $nama_tabel WHERE $kolom_id = $id");
$dSurat = mysqli_fetch_assoc($qSurat);
$tanggal = $dSurat['tanggal_surat'];
$tahun = date('Y', strtotime($tanggal));

// Ambil kode desa terakhir
$q_desa = mysqli_query($connect, "SELECT kode_desa FROM nomor_surat ORDER BY id DESC LIMIT 1");
$r_desa = mysqli_fetch_assoc($q_desa);
$kode_desa = $_POST['kode_desa'] ?? ($r_desa['kode_desa'] ?? 'KODE-DS');

// Ambil kode_surat dari database khusus jenis surat ini (folder)
$q_kode = mysqli_query($connect, "
    SELECT kode_surat 
    FROM nomor_surat 
    WHERE nomor_lengkap LIKE '%/$nama_tabel/%' 
    ORDER BY id DESC LIMIT 1
");
$r_kode = mysqli_fetch_assoc($q_kode);

// Buat kode default dari folder
$folder_parts = explode('_', $nama_tabel);
$kode_surat_default = strtoupper(implode('', array_map(function($word) use ($stopwords) {
    return in_array(strtolower($word), $stopwords) ? '' : $word[0];
}, $folder_parts)));

// Gunakan kode_surat manual jika ada, atau dari database, jika tidak ada baru default
$kode_surat = $_POST['kode_surat'] ?? ($r_kode['kode_surat'] ?? $kode_surat_default);

// ✅ CEK JABATAN PEJABAT PERTAMA
$q_jabatan = mysqli_query($connect, "SELECT jabatan FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1");
$r_jabatan = mysqli_fetch_assoc($q_jabatan);
$is_lurah = (isset($r_jabatan['jabatan']) && strtoupper(trim($r_jabatan['jabatan'])) === 'LURAH');

// ✅ Ambil nomor urut berdasarkan kondisi jabatan
if ($is_lurah) {
    // Jika LURAH: nomor urut berdasarkan jenis surat ini saja
    $q_urut = mysqli_query($connect, "
        SELECT MAX(ns.nomor_urut) AS max_urut
        FROM nomor_surat ns
        JOIN $nama_tabel s ON s.no_surat = ns.nomor_lengkap
        WHERE ns.tahun = '$tahun'
    ");
} else {
    // Jika bukan LURAH: nomor urut global semua surat
    $q_urut = mysqli_query($connect, "
        SELECT MAX(nomor_urut) AS max_urut 
        FROM nomor_surat 
        WHERE tahun = '$tahun'
    ");
}
$r_urut = mysqli_fetch_assoc($q_urut);
$no_urut_otomatis = ($r_urut && $r_urut['max_urut']) ? $r_urut['max_urut'] + 1 : 1;

// Gunakan input manual jika ada, jika tidak pakai otomatis
$no_urut = isset($_POST['no_urut_manual']) && is_numeric($_POST['no_urut_manual'])
    ? (int) $_POST['no_urut_manual']
    : $no_urut_otomatis;


// Cek jika nomor urut dan tahun sudah pernah dipakai
if ($is_lurah) {
    // Cek berdasarkan jenis surat
    $cek = mysqli_query($connect, "
        SELECT ns.id 
        FROM nomor_surat ns
        JOIN $nama_tabel s ON s.no_surat = ns.nomor_lengkap
        WHERE ns.nomor_urut = $no_urut AND ns.tahun = '$tahun'
    ");
} else {
    // Cek global
    $cek = mysqli_query($connect, "
        SELECT id 
        FROM nomor_surat 
        WHERE nomor_urut = $no_urut AND tahun = '$tahun'
    ");
}

/*
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Nomor urut $no_urut sudah digunakan pada tahun $tahun. Silakan pilih nomor lain.'); window.history.back();</script>";
    exit;
}
*/

 // Nama folder sebagai nama tabel
                      $folder_name = basename(__DIR__);
                      $nama_tabel = $folder_name;
// Ambil inisial kode_surat_url dari nama folder (misal: surat_keterangan_domisili → SKD)
                      $folder_parts = explode('_', $folder_name);
                      $kata_dilewati = ['dan', 'atau', 'yang', 'dengan', 'ke', 'di', 'dari', 'untuk'];
                      $kode_surat_url = strtoupper(implode('', array_map(function($word) use ($kata_dilewati) {
                          return in_array(strtolower($word), $kata_dilewati) ? '' : $word[0];
                      }, $folder_parts)));

// Buat format nomor surat akhir
$no_surat = generate_nomor_surat($kode_surat, $kode_surat_url, $kode_desa, $no_urut, $tanggal);

// Ambil ID pejabat dari form pilihan tanda tangan (tetap digunakan untuk menyimpan ID saja)
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']);

// Ambil data PEJABAT baris pertama dari tabel (bukan berdasarkan ID)
$q_pejabat = mysqli_query($connect, "
    SELECT nama_pejabat_desa, jabatan, pangkat, nip, alamat 
    FROM pejabat_desa 
    ORDER BY id_pejabat_desa ASC 
    LIMIT 1
");
$data_pejabat = mysqli_fetch_assoc($q_pejabat);

// Siapkan variabel pejabat (baris pertama)
$nama_pejabat_desa = $data_pejabat['nama_pejabat_desa'] ?? '';
$jabatan           = $data_pejabat['jabatan'] ?? '';
$pangkat           = $data_pejabat['pangkat'] ?? '';
$nip               = $data_pejabat['nip'] ?? '';
$alamat            = $data_pejabat['alamat'] ?? '';

// Simpan ke tabel utama surat
$update = mysqli_query($connect, "
  UPDATE $nama_tabel 
  SET no_surat = '$no_surat',
      id_pejabat_desa = '$id_pejabat_desa',
      status_surat = '$status_surat'
  WHERE $kolom_id = '$id'
");



// Tambahkan prefix statis "N1-" di nomor surat
$no_surat_final = 'N1-' . $no_surat;

// Update ke tabel jenis surat
$update = mysqli_query($connect, "
  UPDATE $nama_tabel 
  SET no_surat = '$no_surat_final',
      id_pejabat_desa = '$id_pejabat_desa',
      status_surat = '$status_surat'
  WHERE $kolom_id = '$id'
");

// Update ke tabel jenis surat
$update = mysqli_query($connect, "
  UPDATE $nama_tabel 
  SET no_surat = '$no_surat_final',
      id_pejabat_desa = '$id_pejabat_desa',
      status_surat = '$status_surat'
  WHERE $kolom_id = '$id'
");

if ($update) {
    // Simpan juga ke tabel nomor_surat
    mysqli_query($connect, "
        INSERT INTO nomor_surat (
            kode_surat, 
            kode_desa, 
            tahun, 
            nomor_urut, 
            nomor_lengkap, 
            tanggal_surat
        ) VALUES (
            '$kode_surat',
            '$kode_desa',
            '$tahun',
            '$no_urut',
            '$no_surat_final',
            '$tanggal'
        )
    ");

    header('Location: ../../');
    exit;
}

