<?php
require '../../../vendor/autoload.php';
require '../../../config/koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

// Daftar jenis surat
$jenisSuratList = [
    'surat_keterangan' => ['id' => 'id_sk'],
    'surat_keterangan_berkelakuan_baik' => ['id' => 'id_skbb'],
    'surat_keterangan_domisili' => ['id' => 'id_skd'],
    'surat_keterangan_kepemilikan_kendaraan_bermotor' => ['id' => 'id_skkkb'],
    'surat_keterangan_perhiasan' => ['id' => 'id_skp'],
    'surat_keterangan_usaha' => ['id' => 'id_sku'],
    'surat_lapor_hajatan' => ['id' => 'id_slh'],
    'surat_pengantar_skck' => ['id' => 'id_sps'],
    'surat_keterangan_tidak_mampu' => ['id' => 'id_sktm'],
    'formulir_pengantar_nikah' => ['id' => 'id_fpn'],
    'formulir_permohonan_kehendak_nikah' => ['id' => 'id_fpkn'],
    'formulir_persetujuan_calon_pengantin' => ['id' => 'id_fpcp'],
    'formulir_persetujuan_calon_pengantin_istri' => ['id' => 'id_fpcpi'],
    'formulir_surat_izin_orang_tua' => ['id' => 'id_fsiot'],
    'surat_keterangan_kematian' => ['id' => 'id_skk'],
    'surat_keterangan_domisili_usaha' => ['id' => 'id_skdu'],
    'surat_keterangan_pengantar' => ['id' => 'id_skp'],
    'surat_keterangan_beda_identitas' => ['id' => 'id_skbi'],
    'surat_keterangan_beda_identitas_kis' => ['id' => 'id_skbis'],
    'surat_keterangan_penghasilan_orang_tua' => ['id' => 'id_skpot'],
    'surat_pengantar_hewan' => ['id' => 'id_sph'],
    'surat_keterangan_kematian_dan_penguburan' => ['id' => 'id_skkp'],
    'surat_keterangan_pindah_penduduk' => ['id' => 'id_skpp'],
    'surat_keterangan_pengantar_rujuk_atau_cerai' => ['id' => 'id_skrc'],
    'surat_keterangan_wali_hakim' => ['id' => 'id_skwh'],
    'surat_keterangan_mahar_sunrang' => ['id' => 'id_skm'],
    'surat_keterangan_jual_beli' => ['id' => 'id_skjb'],
    'surat_keterangan_belum_terbit_sppt_pbb' => ['id' => 'id_skbtsp'],
    'surat_perintah_perjalanan_dinas' => ['id' => 'id_sppd'],
    'surat_tugas' => ['id' => 'id_st'],
    'surat_keterangan_hibah' => ['id' => 'id_skh']
];

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
