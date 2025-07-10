<?php
include_once '../../../config/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$id = $_GET['id'] ?? null;
$table = $_GET['table'] ?? null;
$no_surat = $_GET['no_surat'] ?? null;

if (!$id || !$table) {
    die("ID atau nama tabel tidak valid.");
}

$primaryKeys = [];

$query = mysqli_query($connect, "SHOW TABLES");
while ($row = mysqli_fetch_row($query)) {
    $namaTabel = $row[0];

    if (preg_match('/^(surat|formulir)_/', $namaTabel)) {
        $kata = explode('_', $namaTabel);
        $prefix = $kata[0];
        $singkatan = '';

        for ($i = 1; $i < count($kata); $i++) {
            $singkatan .= substr($kata[$i], 0, 1);
        }

        // Ganti variabel ini agar tidak konflik
        $primaryKey = 'id_' . strtolower(substr($prefix, 0, 1)) . $singkatan;

        $primaryKeys[$namaTabel] = $primaryKey;
    }
}

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
