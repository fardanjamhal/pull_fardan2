<?php
function redirectKePending($id_arsip, $nik, $nama = '-') {
    // Set zona waktu Indonesia
    date_default_timezone_set('Asia/Makassar');

    // Fungsi untuk format tanggal Indonesia
    function formatTanggalIndonesia($datetime) {
        $bulanIndo = [
            'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
            'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
            'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
            'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
        ];
        $dt = new DateTime($datetime);
        $bulan = $bulanIndo[$dt->format('F')];
        return $dt->format("H:i:s - d") . " $bulan " . $dt->format("Y");
    }

    // Ambil nama folder, lalu ubah ke format "Formulir Pengantar Nikah"
    $folder = basename(dirname($_SERVER['PHP_SELF']));
    $jenis_surat = ucwords(str_replace('_', ' ', $folder));

    // Waktu disalin dalam format lengkap Bahasa Indonesia
    $waktu_disalin = formatTanggalIndonesia('now');

    // Redirect ke pending.php dengan parameter lengkap
    header("Location: ../pending.php?pesan=berhasil" .
        "&jenis=" . urlencode($jenis_surat) .
        "&waktu_disalin=" . urlencode($waktu_disalin) .
        "&nama=" . urlencode($nama) .
        "&nik=$nik" .
        "&id_arsip=$id_arsip");
    exit;
}
