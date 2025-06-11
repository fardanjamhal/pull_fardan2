<?php
require '../../vendor/autoload.php';
include '../../config/koneksi.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Import Penduduk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Hasil Import Data Penduduk</h5>
        </div>
        <div class="card-body">

<?php

if (isset($_FILES['datapenduduk']) && $_FILES['datapenduduk']['error'] == 0) {
    $file = $_FILES['datapenduduk']['tmp_name'];

    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    $total = count($rows) - 1;
    $ditambahkan = 0;
    $diperbarui = 0;

    for ($i = 1; $i < count($rows); $i++) {
        $row = $rows[$i];

        if (count($row) < 23) {
            echo "<div class='alert alert-warning'>Baris $i tidak lengkap. Dilewati.</div>";
            continue;
        }

        // Ambil data mentah
        $raw_tgl_lahir = $row[3];

        // Tangani format tanggal lahir
        if (is_numeric($raw_tgl_lahir)) {
            $tgl_lahir = Date::excelToDateTimeObject($raw_tgl_lahir)->format('Y-m-d');
        } else {
            $tgl_lahir = date('Y-m-d', strtotime($raw_tgl_lahir));
        }

        // Ambil dan amankan semua data
        $data = array_map(function($item) use ($connect) {
            return mysqli_real_escape_string($connect, trim($item));
        }, $row);

        list(
            $nik, $nama, $tempat_lahir, /* skip */, $jenis_kelamin, $agama,
            $jalan, $dusun, $rt, $rw, $desa, $kecamatan, $kota, $no_kk,
            $pend_kk, $pend_terakhir, $pend_ditempuh, $pekerjaan, $status_perkawinan,
            $status_dlm_keluarga, $kewarganegaraan, $nama_ayah, $nama_ibu
        ) = $data;

        if ($nik == "" || $nama == "") {
            echo "<div class='alert alert-warning'>Baris $i dilewati karena NIK atau Nama kosong.</div>";
            continue;
        }

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

        $exec = mysqli_query($connect, $stmt);

        if ($exec) {
            $affected = mysqli_affected_rows($connect);
            if ($affected == 1) {
                $ditambahkan++;
            } elseif ($affected == 2) {
                $diperbarui++;
            }
        } else {
            echo "<div class='alert alert-danger'>Baris $i gagal: " . mysqli_error($connect) . "</div>";
        }
    }

    // Hasil akhir
    echo "<table class='table table-bordered mt-3'>
            <tr><th>Total Baris Data</th><td>$total</td></tr>
            <tr><th>Data Baru Ditambahkan</th><td class='text-success font-weight-bold'>$ditambahkan</td></tr>
            <tr><th>Data Diperbarui (Duplikat NIK)</th><td class='text-warning font-weight-bold'>$diperbarui</td></tr>
        </table>";

    echo "<a href='index.php' class='btn btn-primary mt-3'>Kembali</a>";

} else {
    echo "<div class='alert alert-danger'>Gagal upload file Excel.</div>";
}

?>

        </div>
    </div>
</div>
</body>
</html>
