<?php
function hapusQrLama($folder = __DIR__ . '/../../qr/', $hari = 15)
{
    // Hitung batas umur file dalam detik
    $detik = $hari * 24 * 60 * 60;

    if (!is_dir($folder)) {
        file_put_contents(__DIR__ . '/hapus_qr_log.txt', "[" . date('Y-m-d H:i:s') . "] Folder tidak ditemukan: $folder\n", FILE_APPEND);
        return;
    }

    $files = scandir($folder);
    $deleted = 0;

    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;

        $filePath = $folder . $file;

        // Hanya file PNG dengan prefix tertentu
        $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $prefixOk = preg_match('/^(barcode_|qr_)/i', $file);

        if (is_file($filePath) && $ext === 'png' && $prefixOk) {
            $fileAge = time() - filemtime($filePath);

            // Simpan log pengecekan
            file_put_contents(__DIR__ . '/hapus_qr_log.txt', "[" . date('Y-m-d H:i:s') . "] Cek: $file (umur: {$fileAge}s)\n", FILE_APPEND);

            if ($fileAge > $detik) {
                if (@unlink($filePath)) {
                    file_put_contents(__DIR__ . '/hapus_qr_log.txt', "[" . date('Y-m-d H:i:s') . "] Dihapus: $filePath\n", FILE_APPEND);
                    $deleted++;
                } else {
                    file_put_contents(__DIR__ . '/hapus_qr_log.txt', "[" . date('Y-m-d H:i:s') . "] Gagal hapus: $filePath\n", FILE_APPEND);
                }
            }
        }
    }

    if ($deleted === 0) {
        file_put_contents(__DIR__ . '/hapus_qr_log.txt', "[" . date('Y-m-d H:i:s') . "] Tidak ada file yang dihapus.\n", FILE_APPEND);
    }
}
