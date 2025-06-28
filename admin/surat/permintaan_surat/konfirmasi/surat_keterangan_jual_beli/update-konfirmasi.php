<?php
include('../../../../../config/koneksi.php'); // ✅ Koneksi database

// ✅ Validasi awal
if (!isset($_POST['id'])) {
    die("ID tidak ditemukan");
}

$id = (int)$_POST['id'];

// ✅ Data dari form    
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']); 
$status_surat    = "SELESAI";

// ✅ Ambil tanggal surat
$qSurat = mysqli_query($connect, "SELECT tanggal_surat FROM surat_keterangan_jual_beli WHERE id_skjb = $id");
$dSurat = mysqli_fetch_assoc($qSurat);
$tanggal = $dSurat['tanggal_surat'];
$bulan = date('m', strtotime($tanggal));
$tahun = date('Y', strtotime($tanggal));

// ✅ Mapping bulan ke romawi
$bulan_romawi_map = [
    '01'=>'I','02'=>'II','03'=>'III','04'=>'IV',
    '05'=>'V','06'=>'VI','07'=>'VII','08'=>'VIII',
    '09'=>'IX','10'=>'X','11'=>'XI','12'=>'XII'
];
$bulan_romawi = $bulan_romawi_map[$bulan] ?? 'X';

// ✅ Ambil kode_surat otomatis dari nama folder
$folder_name = basename(__DIR__); // contoh: surat_keterangan_jual_beli
$folder_parts = explode('_', $folder_name);
$kode_surat = strtoupper(implode('', array_map(fn($word) => $word[0], $folder_parts))); // Contoh: FPKN

// ✅ Ambil data nomor urut dan kode desa dari form
$no_urut    = isset($_POST['no_urut_manual']) ? (int)$_POST['no_urut_manual'] : 1;
$kode_desa  = isset($_POST['kode_desa']) ? mysqli_real_escape_string($connect, $_POST['kode_desa']) : 'KODE-DS';

// ✅ Validasi nomor urut agar unik dalam tahun yang sama
$cek = mysqli_query($connect, "SELECT id FROM nomor_surat WHERE nomor_urut = $no_urut AND tahun = '$tahun'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Nomor urut $no_urut sudah digunakan di tahun $tahun. Silakan pilih nomor lain.'); window.history.back();</script>";
    exit;
}

// ✅ Susun nomor surat final
$no_surat = str_pad($no_urut, 3, '0', STR_PAD_LEFT) . "/$kode_surat/$kode_desa/$bulan_romawi/$tahun";

// ✅ Update surat ke tabel utama
$qUpdate = "
    UPDATE surat_keterangan_jual_beli 
    SET no_surat='$no_surat', 
        id_pejabat_desa='$id_pejabat_desa', 
        status_surat='$status_surat' 
    WHERE id_skjb='$id'
";

$update = mysqli_query($connect, $qUpdate);

if ($update) {
    // ✅ Simpan ke tabel nomor_surat
    $simpan = mysqli_query($connect, "
        INSERT INTO nomor_surat 
        (kode_surat, kode_desa, bulan, tahun, nomor_urut, nomor_lengkap)
        VALUES 
        ('$kode_surat', '$kode_desa', '$bulan', '$tahun', $no_urut, '$no_surat')
    ");

    if ($simpan) {
        header('location:../../'); // ✅ Sukses
        exit;
    } else {
        // ❌ Gagal simpan ke nomor_surat
        $error = mysqli_error($connect);
        echo "<script>alert('Nomor surat gagal disimpan ke log. Error: $error'); window.history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('Gagal mengonfirmasi surat.'); window.history.back();</script>";
    exit;
}
?>
