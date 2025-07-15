<?php
session_start();
require '../../vendor/autoload.php';
include '../../config/koneksi.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

header('Content-Type: application/json');

$step = $_POST['step'] ?? null;

if ($step === 'upload') {
    if (!isset($_FILES['datapenduduk']) || $_FILES['datapenduduk']['error'] !== 0) {
        echo json_encode(['success' => false, 'msg' => 'Gagal mengunggah file.']);
        exit;
    }

    $tmpFile = $_FILES['datapenduduk']['tmp_name'];

    try {
        $spreadsheet = IOFactory::load($tmpFile);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'msg' => 'Gagal membaca Excel: ' . $e->getMessage()]);
        exit;
    }

    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    if (count($rows) <= 1) {
        echo json_encode(['success' => false, 'msg' => 'Tidak ada data.']);
        exit;
    }

    $dataDir = realpath(dirname(__FILE__) . '/../uploads/');
    $dataFile = $dataDir . '/import_' . time() . '.json';
    file_put_contents($dataFile, json_encode($rows));

    $_SESSION['import_progress'] = 0;

    echo json_encode([
        'success' => true,
        'file' => $dataFile,
        'totalRows' => count($rows) - 1
    ]);
    exit;
}

if ($step === 'process') {
    $file = $_POST['file'] ?? '';
    $start = (int) ($_POST['index'] ?? 1);
    $batchSize = 1000;

    if (!file_exists($file)) {
        echo json_encode(['success' => false, 'msg' => 'File tidak ditemukan.']);
        exit;
    }

    $json = file_get_contents($file);
    $rows = json_decode($json, true);

    $inserted = 0;
    for ($i = $start; $i < $start + $batchSize && $i < count($rows); $i++) {
        $row = $rows[$i];
        if (count($row) < 23 || trim($row[0]) == '') continue;

        $raw_tgl_lahir = $row[3];
        $tgl_lahir = is_numeric($raw_tgl_lahir)
            ? Date::excelToDateTimeObject($raw_tgl_lahir)->format('Y-m-d')
            : date('Y-m-d', strtotime($raw_tgl_lahir));

        $data = array_map(function($item) use ($connect) {
            return mysqli_real_escape_string($connect, trim($item));
        }, $row);

        $nik = preg_replace('/\D/', '', $data[0]);
        $no_kk = preg_replace('/\D/', '', $data[13]);
        if (!empty($data[13]) && strlen($no_kk) != 16) $no_kk = '';

        list(, $nama, $tempat_lahir, , $jenis_kelamin, $agama,
            $jalan, $dusun, $rt, $rw, $desa, $kecamatan, $kota, ,
            $pend_kk, $pend_terakhir, $pend_ditempuh, $pekerjaan, $status_perkawinan,
            $status_dlm_keluarga, $kewarganegaraan, $nama_ayah, $nama_ibu
        ) = $data;

        $stmt = "INSERT INTO penduduk (
            nik, nama, tempat_lahir, tgl_lahir, jenis_kelamin, agama,
            jalan, dusun, rt, rw, desa, kecamatan, kota, no_kk,
            pend_kk, pend_terakhir, pend_ditempuh, pekerjaan, status_perkawinan,
            status_dlm_keluarga, kewarganegaraan, nama_ayah, nama_ibu
        ) VALUES (
            '$nik', '$nama', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$agama',
            '$jalan', '$dusun', '$rt', '$rw', '$desa', '$kecamatan', '$kota', '$no_kk',
            '$pend_kk', '$pend_terakhir', '$pend_ditempuh', '$pekerjaan', '$status_perkawinan',
            '$status_dlm_keluarga', '$kewarganegaraan', '$nama_ayah', '$nama_ibu'
        )
        ON DUPLICATE KEY UPDATE
            nama='$nama',
            tempat_lahir='$tempat_lahir',
            tgl_lahir='$tgl_lahir',
            jenis_kelamin='$jenis_kelamin',
            agama='$agama',
            jalan='$jalan',
            dusun='$dusun',
            rt='$rt',
            rw='$rw',
            desa='$desa',
            kecamatan='$kecamatan',
            kota='$kota',
            no_kk='$no_kk',
            pend_kk='$pend_kk',
            pend_terakhir='$pend_terakhir',
            pend_ditempuh='$pend_ditempuh',
            pekerjaan='$pekerjaan',
            status_perkawinan='$status_perkawinan',
            status_dlm_keluarga='$status_dlm_keluarga',
            kewarganegaraan='$kewarganegaraan',
            nama_ayah='$nama_ayah',
            nama_ibu='$nama_ibu'";

        mysqli_query($connect, $stmt);
        $inserted++;
    }

    $inserted = 0;
        $gagal = 0;

        for ($i = $start; $i < $start + $batchSize && $i < count($rows); $i++) {
            $row = $rows[$i];
            if (count($row) < 23 || trim($row[0]) == '') continue;

            // ... (parsing seperti sebelumnya)

            if (mysqli_query($connect, $stmt)) {
                $inserted++;
            } else {
                $gagal++;
            }
        }

       $_SESSION['import_progress'] = $start + $inserted;

        // Cek apakah sudah batch terakhir, lalu hapus file
        if (($start + $batchSize) >= count($rows)) {
            @unlink($file); // hapus file setelah semua data selesai diproses
        }

        echo json_encode([
            'success' => true,
            'msg' => "Memproses data $start - " . ($start + $inserted - 1),
            'berhasil' => $inserted,
            'gagal' => $gagal
        ]);
    exit;

}

echo json_encode(['success' => false, 'msg' => 'Permintaan tidak valid.']);
