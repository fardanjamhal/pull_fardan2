<?php
include('../../../../../config/koneksi.php');
include('../helper/nomor_surat.php');

if (!isset($_POST['id'])) {
    die("ID tidak ditemukan");
}

$id = (int)$_POST['id'];
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']);
$status_surat = "SELESAI";

// Nama tabel dan kolom ID-nya (manual, bukan otomatis)
$nama_tabel = basename(__DIR__); // contoh: surat_keterangan_beda_identitas_kis
$kolom_id = 'id_skbik'; // Ditetapkan manual agar tidak error

// Update tanggal surat saat ini
mysqli_query($connect, "UPDATE $nama_tabel SET tanggal_surat = NOW() WHERE $kolom_id = $id");

// Ambil tanggal_surat terbaru
$qSurat = mysqli_query($connect, "SELECT tanggal_surat FROM $nama_tabel WHERE $kolom_id = $id");
$dSurat = mysqli_fetch_assoc($qSurat);
$tanggal = $dSurat['tanggal_surat'];
$tahun = date('Y', strtotime($tanggal));

// Ambil kode desa terakhir dari histori nomor_surat
$q_desa = mysqli_query($connect, "SELECT kode_desa FROM nomor_surat ORDER BY id DESC LIMIT 1");
$r_desa = mysqli_fetch_assoc($q_desa);
$kode_desa = $_POST['kode_desa'] ?? ($r_desa['kode_desa'] ?? 'KODE-DS');

// Ambil kode_surat terakhir dari jenis surat ini
$q_kode = mysqli_query($connect, "
    SELECT kode_surat 
    FROM nomor_surat 
    WHERE nomor_lengkap LIKE '%/$nama_tabel/%' 
    ORDER BY id DESC LIMIT 1
");
$r_kode = mysqli_fetch_assoc($q_kode);

// Stopwords untuk membentuk kode_surat default (jika dibutuhkan)
$stopwords = ['dan', 'atau', 'yang', 'dengan', 'ke', 'di', 'dari', 'untuk', 'serta'];
$folder_parts = explode('_', $nama_tabel);
$kode_surat_default = strtoupper(implode('', array_map(function($word) use ($stopwords) {
    return in_array(strtolower($word), $stopwords) ? '' : $word[0];
}, $folder_parts)));

// Tentukan kode_surat
$kode_surat = $_POST['kode_surat'] ?? ($r_kode['kode_surat'] ?? $kode_surat_default);

// Cek apakah jabatan pertama adalah Lurah
$q_jabatan = mysqli_query($connect, "SELECT jabatan FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1");
$r_jabatan = mysqli_fetch_assoc($q_jabatan);
$is_lurah = (isset($r_jabatan['jabatan']) && strtoupper(trim($r_jabatan['jabatan'])) === 'LURAH');

// Nomor urut
if ($is_lurah) {
    $q_urut = mysqli_query($connect, "
        SELECT MAX(ns.nomor_urut) AS max_urut
        FROM nomor_surat ns
        JOIN $nama_tabel s ON s.no_surat = ns.nomor_lengkap
        WHERE ns.tahun = '$tahun'
    ");
} else {
    $q_urut = mysqli_query($connect, "
        SELECT MAX(nomor_urut) AS max_urut 
        FROM nomor_surat 
        WHERE tahun = '$tahun'
    ");
}
$r_urut = mysqli_fetch_assoc($q_urut);
$no_urut_otomatis = ($r_urut && $r_urut['max_urut']) ? $r_urut['max_urut'] + 1 : 1;

// Manual jika diinput
$no_urut = isset($_POST['no_urut_manual']) && is_numeric($_POST['no_urut_manual'])
    ? (int) $_POST['no_urut_manual']
    : $no_urut_otomatis;

// Cek duplikat nomor urut
if ($is_lurah) {
    $cek = mysqli_query($connect, "
        SELECT ns.id 
        FROM nomor_surat ns
        JOIN $nama_tabel s ON s.no_surat = ns.nomor_lengkap
        WHERE ns.nomor_urut = $no_urut AND ns.tahun = '$tahun'
    ");
} else {
    $cek = mysqli_query($connect, "
        SELECT id 
        FROM nomor_surat 
        WHERE nomor_urut = $no_urut AND tahun = '$tahun'
    ");
}
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Nomor urut $no_urut sudah digunakan pada tahun $tahun. Silakan pilih nomor lain.'); window.history.back();</script>";
    exit;
}

// Buat nomor surat akhir
$no_surat = generate_nomor_surat($kode_surat, $kode_desa, $no_urut, $tanggal);

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

if ($update) {
    $tanggal_surat = $tanggal; // Sudah diambil sebelumnya dari surat

    // Simpan ke log
    $simpan = mysqli_query($connect, "
        INSERT INTO nomor_surat (
            kode_surat, kode_desa, bulan, tahun, nomor_urut, nomor_lengkap,
            id_pejabat_desa, tanggal_surat,
            nama_pejabat_desa, jabatan, pangkat, nip, alamat
        )
        VALUES (
            '$kode_surat', '$kode_desa', MONTH('$tanggal_surat'), '$tahun', $no_urut, '$no_surat',
            '$id_pejabat_desa', '$tanggal_surat',
            '$nama_pejabat_desa', '$jabatan', '$pangkat', '$nip', '$alamat'
        )
    ");

    if ($simpan) {
        header('Location: ../../');
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan nomor surat ke log.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Gagal mengupdate surat.'); window.history.back();</script>";
}

