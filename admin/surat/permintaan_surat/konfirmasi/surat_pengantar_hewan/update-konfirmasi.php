<?php
include('../../../../../config/koneksi.php');
include('../helper/nomor_surat.php');

if (!isset($_POST['id'])) {
    die("ID tidak ditemukan");
}

$id = (int)$_POST['id'];
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']);
$status_surat = "SELESAI";

// Update tanggal_surat saat ini
mysqli_query($connect, "UPDATE surat_pengantar_hewan SET tanggal_surat = NOW() WHERE id_sph = $id");

// Ambil tanggal_surat terbaru
$qSurat = mysqli_query($connect, "SELECT tanggal_surat FROM surat_pengantar_hewan WHERE id_sph = $id");
$dSurat = mysqli_fetch_assoc($qSurat);
$tanggal = $dSurat['tanggal_surat'];
$tahun = date('Y', strtotime($tanggal));

// Ambil nomor urut global berdasarkan tahun
$q = mysqli_query($connect, "
    SELECT MAX(nomor_urut) AS max_urut 
    FROM nomor_surat 
    WHERE tahun = '$tahun'
");
$r = mysqli_fetch_assoc($q);
$no_urut = ($r && $r['max_urut']) ? $r['max_urut'] + 1 : 1;

// Ambil kode desa terakhir
$q_desa = mysqli_query($connect, "SELECT kode_desa FROM nomor_surat ORDER BY id DESC LIMIT 1");
$r_desa = mysqli_fetch_assoc($q_desa);
$kode_desa = $_POST['kode_desa'] ?? ($r_desa['kode_desa'] ?? 'KODE-DS');

// Ambil kode_surat dari database khusus jenis surat ini (folder)
$folder_name = basename(__DIR__);
$q_kode = mysqli_query($connect, "
    SELECT kode_surat 
    FROM nomor_surat 
    WHERE nomor_lengkap LIKE '%/$folder_name/%' 
    ORDER BY id DESC LIMIT 1
");
$r_kode = mysqli_fetch_assoc($q_kode);

// Stop words
$kata_abaikan = ['dan', 'atau', 'yang', 'dengan', 'ke', 'di', 'dari', 'untuk', 'serta'];
$folder_parts = explode('_', $folder_name);
$kode_surat_default = strtoupper(implode('', array_map(function($word) use ($kata_abaikan) {
    return in_array(strtolower($word), $kata_abaikan) ? '' : $word[0];
}, $folder_parts)));

// Gunakan kode_surat manual jika ada, atau dari database, jika tidak ada baru default
$kode_surat = $_POST['kode_surat'] ?? ($r_kode['kode_surat'] ?? $kode_surat_default);

// Cek jika no_urut dan tahun sudah pernah dipakai
$cek = mysqli_query($connect, "
    SELECT id 
    FROM nomor_surat 
    WHERE nomor_urut = $no_urut 
    AND tahun = '$tahun'
");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Nomor urut $no_urut sudah digunakan pada tahun $tahun. Silakan pilih nomor lain.'); window.history.back();</script>";
    exit;
}

// Buat format nomor surat akhir
$no_surat = generate_nomor_surat($kode_surat, $kode_desa, $no_urut, $tanggal);

// Simpan ke tabel utama surat
$update = mysqli_query($connect, "
  UPDATE surat_pengantar_hewan 
  SET no_surat='$no_surat', id_pejabat_desa='$id_pejabat_desa', status_surat='$status_surat' 
  WHERE id_sph='$id'
");

if ($update) {
    // Simpan ke log
    $simpan = mysqli_query($connect, "
      INSERT INTO nomor_surat (kode_surat, kode_desa, bulan, tahun, nomor_urut, nomor_lengkap)
      VALUES ('$kode_surat', '$kode_desa', MONTH('$tanggal'), '$tahun', $no_urut, '$no_surat')
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