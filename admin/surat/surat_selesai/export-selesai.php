<?php
require '../../../vendor/autoload.php';
require '../../../config/koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

// Daftar jenis surat
// Ambil semua tabel surat dari database
$jenisSuratList = [];
$queryTables = mysqli_query($connect, "SHOW TABLES");
while ($row = mysqli_fetch_array($queryTables)) {
    $tableName = $row[0];
    // Filter hanya tabel yang mengandung kata 'surat' atau 'formulir'
    if (strpos($tableName, 'surat_') === 0 || strpos($tableName, 'formulir_') === 0) {
        // Ambil singkatan dari nama tabel untuk id field
        $explode = explode('_', $tableName);
        $singkatan = '';
        foreach ($explode as $part) {
            $singkatan .= substr($part, 0, 1); // ambil huruf pertama
        }
        $id_field = 'id_' . strtolower($singkatan);
        $jenisSuratList[$tableName] = $id_field;
    }
}

// Gabungan query
$unionQueries = [];
foreach ($jenisSuratList as $table => $info) {
    $unionQueries[] = "SELECT
        s.no_surat,
        s.nik,
        s.id_arsip,
        s.jenis_surat,
        s.status_surat,
        s.tanggal_surat,
        (SELECT nama FROM arsip_surat ap WHERE ap.nik = s.nik ORDER BY ap.id_arsip DESC LIMIT 1) AS nama
    FROM $table s
    WHERE s.status_surat = 'selesai'";
}

$sql = implode(" UNION ALL ", $unionQueries) . " ORDER BY id_arsip ASC";
$result = mysqli_query($connect, $sql);
if (!$result) {
    die("Query error: " . mysqli_error($connect));
}

// Mulai buat spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Header kolom
$headers = ['No.', 'ID Pengajuan', 'No Surat', 'NIK', 'Nama', 'Jenis Surat', 'Status', 'Tanggal Surat'];
$col = 'A';
foreach ($headers as $header) {
    $sheet->setCellValue($col . '1', $header);
    $col++;
}

// Style header: biru muda, tengah, tebal
$headerStyle = [
    'font' => ['bold' => true],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER
    ],
    'fill' => [
        'fillType' => Fill::FILL_SOLID,
        'startColor' => ['rgb' => 'CFE2F3']
    ]
];

$sheet->getStyle('A1:H1')->applyFromArray($headerStyle);
$sheet->getRowDimension(1)->setRowHeight(22);

// Isi data
$row = 2;
$no = 1;
while ($data = mysqli_fetch_assoc($result)) {
    $sheet->setCellValue("A$row", $no++);
    $sheet->getStyle("A$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue("B$row", $data['id_arsip']);
    $sheet->getStyle("B$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue("C$row", $data['no_surat']);
    $sheet->setCellValueExplicit("D$row", $data['nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
    $sheet->setCellValue("E$row", $data['nama']);
    $sheet->setCellValue("F$row", $data['jenis_surat']);
    $sheet->setCellValue("G$row", $data['status_surat']);
    $sheet->getStyle("G$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->setCellValue("H$row", $data['tanggal_surat']);
    $sheet->getStyle("H$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $row++;
}

// Lebar kolom otomatis
foreach (range('A', 'H') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Output Excel
$filename = 'Data Surat Selesai ' . date('d-m-Y') . '.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header("Content-Disposition: attachment; filename=\"$filename\"");
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
