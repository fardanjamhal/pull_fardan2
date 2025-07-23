<?php
include('../../../config/koneksi.php');

if (isset($_GET['id']) && isset($_GET['jenis'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $jenis = mysqli_real_escape_string($connect, $_GET['jenis']);

    // Ambil daftar tabel dari database
    $jenisSurat = [];
    $query = mysqli_query($connect, "SHOW TABLES");
    if (!$query) {
        die("Gagal mengambil daftar tabel: " . mysqli_error($connect));
    }

    while ($row = mysqli_fetch_row($query)) {
        $nama_tabel = $row[0];
        if (strpos($nama_tabel, 'surat_') === 0 || strpos($nama_tabel, 'formulir_') === 0) {
            $parts = explode('_', $nama_tabel);
            $inisial = '';
            foreach ($parts as $p) {
                $inisial .= substr($p, 0, 1);
            }
            $id_field = 'id_' . strtolower($inisial);
            $jenisSurat[$nama_tabel] = $id_field;
        }
    }

    // Cek apakah jenis dari URL ada dalam hasil tabel
    if (array_key_exists($jenis, $jenisSurat)) {
        $table = $jenis;
        $id_col = $jenisSurat[$jenis];

        // Ambil no_surat dari tabel utama
        $qNoSurat = mysqli_query($connect, "SELECT no_surat FROM `$table` WHERE `$id_col` = '$id'");
        $rowSurat = mysqli_fetch_assoc($qNoSurat);
        $no_surat = $rowSurat['no_surat'] ?? null;

        // Jika ada, hapus juga dari nomor_surat (hanya 1 entri terakhir)
        if ($no_surat) {
            $qHapusNomor = mysqli_query($connect, "
                SELECT id FROM nomor_surat 
                WHERE nomor_lengkap = '$no_surat' 
                ORDER BY id DESC LIMIT 1
            ");
            if ($qHapusNomor && mysqli_num_rows($qHapusNomor) > 0) {
                $rowNomor = mysqli_fetch_assoc($qHapusNomor);
                $id_nomor = $rowNomor['id'];
                mysqli_query($connect, "DELETE FROM nomor_surat WHERE id = $id_nomor");
            }
        }

        // Hapus dari tabel utama surat
        $deleteQuery = "DELETE FROM `$table` WHERE `$id_col` = '$id'";
        $result = mysqli_query($connect, $deleteQuery);

        if ($result) {
            echo "<script>window.location.href = 'index.php?status=berhasil';</script>";
        } else {
            echo "<script>alert('Gagal menghapus surat.'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Jenis surat tidak valid.'); window.location.href = 'index.php';</script>";
    }
} else {
    echo "<script>alert('Data tidak lengkap.'); window.location.href = 'index.php';</script>";
}
?>
