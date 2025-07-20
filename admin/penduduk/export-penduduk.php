<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../../vendor/autoload.php';
include '../../config/koneksi.php';

use OpenSpout\Writer\XLSX\Writer;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Writer\Common\Creator\WriterEntityFactory;
use OpenSpout\Common\Entity\Style\CellAlignment;

// Ambil nama desa
$qProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
$dataProfil = mysqli_fetch_assoc($qProfil);
$nama_desa = $dataProfil['nama_desa'] ?? 'Desa';

// Siapkan output file
$judul_file = "Data Penduduk $nama_desa.xlsx";
$judul_file = str_replace(' ', ' ', $judul_file);

// Buat writer XLSX
$writer = new Writer();
$writer->openToBrowser($judul_file);

// Buat style header manual
$headerStyle = (new Style())
    ->setFontBold()
    ->setFontSize(12)
    ->setCellAlignment(CellAlignment::CENTER)
    ->setShouldWrapText(false);

// Header kolom
$headers = [
    "No", "NIK", "Nama", "Tempat Lahir", "Tanggal Lahir", "Jenis Kelamin", "Agama",
    "Jalan", "Lingk / Dusun", "RT", "RW", "Kel / Desa", "Kecamatan", "Kabupaten", "No KK",
    "Pendidikan KK", "Pendidikan Terakhir", "Pendidikan Ditempuh", "Pekerjaan",
    "Status Perkawinan", "Status dalam Keluarga", "Kewarganegaraan", "Nama Ayah", "Nama Ibu"
];

// Tulis header
$headerCells = array_map(fn($h) => Cell::fromValue($h, $headerStyle), $headers);
$writer->addRow(new Row($headerCells));

// Ambil data per batch 5000
$limit = 5000;
$offset = 0;
$no = 1;

while (true) {
    $q = mysqli_query($connect, "SELECT * FROM penduduk LIMIT $offset, $limit");
    if (mysqli_num_rows($q) === 0) break;

    while ($row = mysqli_fetch_assoc($q)) {
        $data = [
            $no++,
            "'" . $row['nik'],
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
            "'" . $row['no_kk'],
            $row['pend_kk'],
            $row['pend_terakhir'],
            $row['pend_ditempuh'],
            $row['pekerjaan'],
            $row['status_perkawinan'],
            $row['status_dlm_keluarga'],
            $row['kewarganegaraan'],
            $row['nama_ayah'],
            $row['nama_ibu'],
        ];

        $cells = array_map(fn($v) => Cell::fromValue($v), $data);
        $writer->addRow(new Row($cells));
    }

    $offset += $limit;
}

// Selesai tulis file
$writer->close();

// Format tanggal
function formatTanggal($tanggal)
{
    if (!$tanggal || strtolower(trim($tanggal)) === '0000-00-00') {
        return '';
    }
    try {
        $date = new DateTime($tanggal);
        return $date->format('d-m-Y');
    } catch (Exception $e) {
        return $tanggal;
    }
}
