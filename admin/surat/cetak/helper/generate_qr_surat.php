<?php
require_once __DIR__ . '/../../../../config/koneksi.php';
require_once __DIR__ . '/../../../../vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;

// --- AMBIL PARAMETER DARI URL ---
$id_surat = $_GET['id'] ?? null;
$jenis    = $_GET['jenis'] ?? null;

if (!$id_surat || !$jenis) {
    http_response_code(400);
    exit('ID surat atau jenis surat tidak diberikan.');
}

// --- CEK APAKAH TABEL ADA ---
$cek_tabel = mysqli_query($connect, "SHOW TABLES LIKE '$jenis'");
if (mysqli_num_rows($cek_tabel) === 0) {
    http_response_code(404);
    exit("Tabel jenis surat tidak ditemukan.");
}

// --- AMBIL KOLOM ID UTAMA DARI TABEL SECARA DINAMIS ---
function getPrimaryIdColumn($connect, $tableName) {
    $result = mysqli_query($connect, "DESCRIBE $tableName");
    while ($row = mysqli_fetch_assoc($result)) {
        if (strpos($row['Field'], 'id_') === 0) {
            return $row['Field']; // Ambil kolom pertama yang diawali 'id_'
        }
    }
    return null;
}

$kolom_id = getPrimaryIdColumn($connect, $jenis);
if (!$kolom_id) {
    http_response_code(400);
    exit('Kolom ID utama tidak ditemukan secara otomatis.');
}

// --- AMBIL NO SURAT DARI TABEL JENIS SURAT ---
$query_surat = mysqli_query($connect, "SELECT no_surat FROM $jenis WHERE $kolom_id = '$id_surat'");
$data_surat  = mysqli_fetch_assoc($query_surat);

if (!$data_surat) {
    http_response_code(404);
    exit("Data surat tidak ditemukan.");
}

$no_surat = $data_surat['no_surat'];

// --- COCOKKAN DENGAN TABEL NOMOR_SURAT ---
$query_nomor = mysqli_query($connect, "SELECT nomor_lengkap, tanggal_surat, nama_pejabat_desa, jabatan FROM nomor_surat WHERE nomor_lengkap = '$no_surat'");
$data_nomor  = mysqli_fetch_assoc($query_nomor);

if (!$data_nomor) {
    http_response_code(404);
    exit("Nomor surat tidak ditemukan di tabel nomor_surat.");
}

$nomor_lengkap = $data_nomor['nomor_lengkap'] ?? '-';
$tanggal       = $data_nomor['tanggal_surat'] ?? '-';
$nama_kades    = $data_nomor['nama_pejabat_desa'] ?? '-';
$jabatan       = $data_nomor['jabatan'] ?? '-';

// --- ISI QR CODE ---
$baseURL = 'http://' . $_SERVER['HTTP_HOST'] . '/';
$linkVerifikasi = $baseURL . 'verifikasi.php?kode=' . urlencode($nomor_lengkap);

$isiQR = <<<TEXT
$linkVerifikasi
TEXT;


// --- GENERATE FILE QR CODE ---
$folder_qr = __DIR__ . '/../../qr/';
if (!is_dir($folder_qr)) {
    mkdir($folder_qr, 0777, true);
}

$nama_file = 'qr_' . $id_surat . '_' . $jenis . '.png';
$path_qr   = $folder_qr . $nama_file;

// --- GENERATE QR CODE ---
$result = Builder::create()
    ->writer(new PngWriter())
    ->data($isiQR)
    ->encoding(new Encoding('UTF-8'))
    ->errorCorrectionLevel(ErrorCorrectionLevel::Low)
    ->size(300)
    ->margin(10)
    ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
    ->build();

// --- SIMPAN DAN TAMPILKAN QR CODE ---
$result->saveToFile($path_qr);
header('Content-Type: image/png');
readfile($path_qr);
exit;
