<?php
include('../../../../../config/koneksi.php');

if (!isset($_POST['id'])) {
    die("ID tidak ditemukan");
}

$id = (int)$_POST['id'];
$id_pejabat_desa = mysqli_real_escape_string($connect, $_POST['ft_tangan']);
$status_surat = "SELESAI";

// ✅ Update tanggal_surat di database ke waktu sekarang
mysqli_query($connect, "UPDATE formulir_pengantar_nikah SET tanggal_surat = NOW() WHERE id_fpn = $id");
// ✅ Ambil ulang tanggal_surat yang sudah diperbarui
$qSurat = mysqli_query($connect, "SELECT tanggal_surat FROM formulir_pengantar_nikah WHERE id_fpn = $id");
$dSurat = mysqli_fetch_assoc($qSurat);
// ✅ Ambil komponen tanggal untuk ditampilkan di surat
$tanggal = $dSurat['tanggal_surat'];
$bulan = date('m', strtotime($tanggal));
$tahun = date('Y', strtotime($tanggal));

// Mapping bulan ke romawi
$bulan_romawi_map = [
  '01'=>'I','02'=>'II','03'=>'III','04'=>'IV',
  '05'=>'V','06'=>'VI','07'=>'VII','08'=>'VIII',
  '09'=>'IX','10'=>'X','11'=>'XI','12'=>'XII'
];
$bulan_romawi = $bulan_romawi_map[$bulan] ?? 'X';

// Ambil kode_surat dari folder
$folder_name = basename(__DIR__);
$folder_parts = explode('_', $folder_name);
$kode_surat = strtoupper(implode('', array_map(fn($word) => $word[0], $folder_parts)));

// Ambil data dari form
$no_urut = isset($_POST['no_urut_manual']) ? (int)$_POST['no_urut_manual'] : 1;
$kode_desa = isset($_POST['kode_desa']) ? mysqli_real_escape_string($connect, $_POST['kode_desa']) : 'KODE-DS';

// Cek apakah nomor urut dan tahun sudah digunakan
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

// Format final nomor surat
$no_surat = str_pad($no_urut, 3, '0', STR_PAD_LEFT) . "/$kode_surat/$kode_desa/$bulan_romawi/$tahun";

// Update status dan nomor surat ke surat utama
$update = mysqli_query($connect, "
  UPDATE formulir_pengantar_nikah 
  SET no_surat='$no_surat', id_pejabat_desa='$id_pejabat_desa', status_surat='$status_surat' 
  WHERE id_fpn='$id'
");

if ($update) {
    // Simpan ke log nomor_surat
    $simpan = mysqli_query($connect, "
      INSERT INTO nomor_surat (kode_surat, kode_desa, bulan, tahun, nomor_urut, nomor_lengkap)
      VALUES ('$kode_surat', '$kode_desa', '$bulan', '$tahun', $no_urut, '$no_surat')
    ");

    if ($simpan) {
        header('Location: ../../');
        exit;
    } else {
        echo "<script>alert('Gagal menyimpan nomor surat ke log.'); window.history.back();</script>";
        exit;
    }
} else {
    echo "<script>alert('Gagal mengupdate surat.'); window.history.back();</script>";
    exit;
}
?>
