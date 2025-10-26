<?php
include '../../config/koneksi.php';

$keyword = $_GET['q'] ?? '';
$keyword = trim($keyword);

if ($keyword == '') {
    echo json_encode([]);
    exit;
}

$sql = "SELECT nik, nama FROM penduduk 
        WHERE nik LIKE ? OR nama LIKE ?
        ORDER BY nama ASC LIMIT 30";

$stmt = mysqli_prepare($connect, $sql);
$param = "%$keyword%";
mysqli_stmt_bind_param($stmt, "ss", $param, $param);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {

    // Sensor NIK: tampilkan 4 digit awal + simbol • + 3 digit akhir
    $nik_asli = $row['nik'];
    $nik_sens = substr($nik_asli, 0, 4) . str_repeat('•', 9) . substr($nik_asli, -3);

    $data[] = [
        'nik' => $nik_asli, // tetap kirim NIK asli untuk kebutuhan form
        'nama' => $row['nama'],
        'text' => $nik_sens . ' - ' . $row['nama'] // yang ditampilkan disensor
    ];
}

echo json_encode($data);
