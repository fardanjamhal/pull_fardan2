<?php
require '../../vendor/autoload.php';
include '../../config/koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

// Ambil nama desa
$qProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
$dataProfil = mysqli_fetch_assoc($qProfil);
$nama_desa = $dataProfil['nama_desa'] ?? 'Desa';

// Buat Spreadsheet baru
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle('Data Penduduk');

// Header kolom
$headers = [
    "No", "NIK", "Nama", "Tempat Lahir", "Tanggal Lahir", "Jenis Kelamin", "Agama",
    "Jalan", "Lingk / Dusun", "RT", "RW", "Kel / Desa", "Kecamatan", "Kabupaten", "No KK",
    "Pendidikan KK", "Pendidikan Terakhir", "Pendidikan Ditempuh", "Pekerjaan",
    "Status Perkawinan", "Status dalam Keluarga", "Kewarganegaraan", "Nama Ayah", "Nama Ibu"
];

// Atur header kolom
$rowNum = 1;
$col = 1;
foreach ($headers as $header) {
    $cell = Coordinate::stringFromColumnIndex($col) . $rowNum;
    $sheet->setCellValue($cell, $header);

    // Tambah style header: warna biru, bold, center align, middle align
    $sheet->getStyle($cell)->getFont()->setBold(true);
    $sheet->getStyle($cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle($cell)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet->getStyle($cell)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCE5FF');
    $sheet->getRowDimension($rowNum)->setRowHeight(30); // Tinggi baris header

    $col++;
}


// Ambil data penduduk
$qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
$rowNum = 2;
$no = 1;
while ($row = mysqli_fetch_assoc($qTampil)) {
    $col = 1;

    $data = [
        $no++,
        "'" . $row['nik'], // NIK sebagai teks
        $row['nama'],
        $row['tempat_lahir'],
        formatTanggal($row['tgl_lahir']),
        $row['jenis_kelamin'],
        $row['agama'],
        $row['jalan'],
        $row['dusun'],
        $row['rt'],
        $row['rw'],
        $row['desa'],
        $row['kecamatan'],
        $row['kota'],
        "'" . $row['no_kk'], // No KK sebagai teks
        $row['pend_kk'],
        $row['pend_terakhir'],
        $row['pend_ditempuh'],
        $row['pekerjaan'],
        $row['status_perkawinan'],
        $row['status_dlm_keluarga'],
        $row['kewarganegaraan'],
        $row['nama_ayah'],
        $row['nama_ibu']
    ];

    foreach ($data as $value) {
        $cell = Coordinate::stringFromColumnIndex($col) . $rowNum;
        $sheet->setCellValue($cell, $value);
        $col++;
    }

    $rowNum++;
}

// Auto-size semua kolom kecuali RT & RW (kolom ke-10 dan 11)
$colCount = count($headers);
for ($i = 1; $i <= $colCount; $i++) {
    $colLetter = Coordinate::stringFromColumnIndex($i);
    if ($i == 10 || $i == 11) { // RT dan RW
        $sheet->getColumnDimension($colLetter)->setWidth(10); // Atur manual agar cukup
    } else {
        $sheet->getColumnDimension($colLetter)->setAutoSize(true);
    }
}

// Output ke browser
$judul_file = "Data Penduduk $nama_desa.xlsx";
$judul_file = str_replace(' ', ' ', $judul_file);

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"$judul_file\"");
header("Cache-Control: max-age=0");

$writer = new Xlsx($spreadsheet);
$writer->save("php://output");
exit();

// Fungsi format tanggal
function formatTanggal($tanggal)
{
    if (!$tanggal || strtolower(trim($tanggal)) === '0000-00-00') {
        return '';
    }

    // Coba parsing ke DateTime
    try {
        $date = new DateTime($tanggal);
        return $date->format('d-m-Y'); // Format: 13-11-2020
    } catch (Exception $e) {
        return $tanggal; // Jika gagal, tampilkan apa adanya
    }
}

