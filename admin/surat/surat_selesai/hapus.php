<?php
include_once '../../../config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_GET['id'] ?? null;
$table = $_GET['table'] ?? null;
$no_surat = $_GET['no_surat'] ?? null;

if (!$id || !$table) {
    die("ID atau nama tabel tidak valid.");
}

// Mapping tabel ke nama kolom primary key
$primaryKeys = [
    'surat_keterangan' => 'id_sk',
    'surat_keterangan_berkelakuan_baik' => 'id_skbb',
    'surat_keterangan_domisili' => 'id_skd',
    'surat_keterangan_kepemilikan_kendaraan_bermotor' => 'id_skkkb',
    'surat_keterangan_perhiasan' => 'id_skp',
    'surat_keterangan_usaha' => 'id_sku',
    'surat_lapor_hajatan' => 'id_slh',
    'surat_pengantar_skck' => 'id_sps',
    'surat_keterangan_tidak_mampu' => 'id_sktm',
    'formulir_pengantar_nikah' => 'id_fpn',
    'formulir_permohonan_kehendak_nikah' => 'id_fpkn',
    'formulir_persetujuan_calon_pengantin' => 'id_fpcp',
    'formulir_persetujuan_calon_pengantin_istri' => 'id_fpcpi',
    'formulir_surat_izin_orang_tua' => 'id_fsiot',
    'surat_keterangan_kematian' => 'id_skk',
    'surat_keterangan_domisili_usaha' => 'id_skdu',
    'surat_keterangan_pengantar' => 'id_skp',
    'surat_keterangan_beda_identitas' => 'id_skbi',
    'surat_keterangan_beda_identitas_kis' => 'id_skbis',
    'surat_keterangan_penghasilan_orang_tua' => 'id_skpot',
    'surat_pengantar_hewan' => 'id_sph',
    'surat_keterangan_kematian_dan_penguburan' => 'id_skkp',
    'surat_keterangan_pindah_penduduk' => 'id_skpp',
    'surat_keterangan_pengantar_rujuk_atau_cerai' => 'id_skrc',
    'surat_keterangan_wali_hakim' => 'id_skwh',
    'surat_keterangan_mahar_sunrang' => 'id_skm',
    'surat_keterangan_jual_beli' => 'id_skjb',
    'surat_keterangan_belum_terbit_sppt_pbb' => 'id_skbtsp',
    'surat_perintah_perjalanan_dinas' => 'id_sppd',
    'surat_tugas' => 'id_st'
];

if (!isset($primaryKeys[$table])) {
    die("Tabel tidak dikenali.");
}

$primaryKey = $primaryKeys[$table];

// Validasi ID harus integer
if (!ctype_digit($id)) {
    die("ID tidak valid.");
}

// Ambil waktu surat dari database
$queryTanggal = mysqli_query($connect, "SELECT tanggal_surat FROM `$table` WHERE `$primaryKey` = '$id'");
if (!$queryTanggal || mysqli_num_rows($queryTanggal) === 0) {
    die("Data tidak ditemukan.");
}
$row = mysqli_fetch_assoc($queryTanggal);

$tanggalSurat = strtotime($row['tanggal_surat']);
$sekarang = time();
$batasDetik = 60 * 60; // 60 menit
$selisih = $sekarang - $tanggalSurat;

if ($selisih > $batasDetik) {
    die("<script>alert('Waktu penghapusan telah habis.'); window.location.href='index.php';</script>");
}

// Hapus dari tabel jenis surat
$stmt = mysqli_prepare($connect, "DELETE FROM `$table` WHERE `$primaryKey` = ?");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id);
    $success = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($success) {
        // Jika ada parameter no_surat, hapus dari nomor_surat
        if ($no_surat) {
            $stmtNomor = mysqli_prepare($connect, "DELETE FROM nomor_surat WHERE nomor_lengkap = ?");
            if ($stmtNomor) {
                mysqli_stmt_bind_param($stmtNomor, "s", $no_surat);
                mysqli_stmt_execute($stmtNomor);
                mysqli_stmt_close($stmtNomor);
            }
        }

        echo "<script>alert('Data berhasil dihapus.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Terjadi kesalahan saat menyiapkan query.'); window.history.back();</script>";
}
?>
