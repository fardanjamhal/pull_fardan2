<?php
include '../../config/koneksi.php';
include '../helper/address_check_nik_helper.php';

$nik = $_POST['nik'] ?? '';
$nik = trim($nik); // Hilangkan spasi ekstra

if ($nik === '') {
    echo json_encode(['success' => false, 'message' => 'NIK kosong']);
    exit;
}

// Gunakan prepared statement (lebih aman dari SQL Injection)
$stmt = mysqli_prepare($connect, "SELECT * FROM penduduk WHERE nik = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "s", $nik);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($data = mysqli_fetch_assoc($result)) {

    $alamatLengkap = formatAlamatLengkap($data); // ← Panggil helper

    echo json_encode([
        'success' => true,
        'data' => [
            'nama' => $data['nama'] ?? '',
            'tempat_lahir' => $data['tempat_lahir'] ?? '',
            'tgl_lahir' => isset($data['tgl_lahir']) ? date('d-m-Y', strtotime($data['tgl_lahir'])) : '',
            'jenis_kelamin' => $data['jenis_kelamin'] ?? '',
            'agama' => $data['agama'] ?? '',
            'kecamatan' => $data['kecamatan'] ?? '',
            'kota' => $data['kota'] ?? '',
            'kewarganegaraan' => $data['kewarganegaraan'] ?? '',
            'pekerjaan' => $data['pekerjaan'] ?? '',
            'nama_ayah' => $data['nama_ayah'] ?? '',
            'nama_ibu' => $data['nama_ibu'] ?? '',
            'alamat' => $alamatLengkap // ← Tambahkan hasil helper di sini
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'NIK tidak ditemukan']);
}
?>
