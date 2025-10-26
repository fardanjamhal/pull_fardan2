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
    $data[] = [
        'nik' => $row['nik'],
        'nama' => $row['nama'],
        'text' => $row['nik'].' - '.$row['nama']
    ];
}

echo json_encode($data);
