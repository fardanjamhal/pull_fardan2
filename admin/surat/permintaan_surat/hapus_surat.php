<?php
include('../../../config/koneksi.php');

if (isset($_GET['id']) && isset($_GET['jenis'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);
    $jenis = mysqli_real_escape_string($connect, $_GET['jenis']);

    // Daftar jenis surat dan nama tabel beserta nama kolom ID
    $suratMap = [
        'surat_keterangan' => ['table' => 'surat_keterangan', 'id_col' => 'id_sk'],
        'surat_keterangan_berkelakuan_baik' => ['table' => 'surat_keterangan_berkelakuan_baik', 'id_col' => 'id_skbb'],
        'surat_keterangan_domisili' => ['table' => 'surat_keterangan_domisili', 'id_col' => 'id_skd'],
        'surat_keterangan_kepemilikan_kendaraan_bermotor' => ['table' => 'surat_keterangan_kepemilikan_kendaraan_bermotor', 'id_col' => 'id_skkkb'],
        'surat_keterangan_perhiasan' => ['table' => 'surat_keterangan_perhiasan', 'id_col' => 'id_skp'],
        'surat_keterangan_usaha' => ['table' => 'surat_keterangan_usaha', 'id_col' => 'id_sku'],
        'surat_lapor_hajatan' => ['table' => 'surat_lapor_hajatan', 'id_col' => 'id_slh'],
        'surat_pengantar_skck' => ['table' => 'surat_pengantar_skck', 'id_col' => 'id_sps'],
        'surat_keterangan_tidak_mampu' => ['table' => 'surat_keterangan_tidak_mampu', 'id_col' => 'id_sktm'],
        'formulir_pengantar_nikah' => ['table' => 'formulir_pengantar_nikah', 'id_col' => 'id_fpn'],
        'formulir_permohonan_kehendak_nikah' => ['table' => 'formulir_permohonan_kehendak_nikah', 'id_col' => 'id_fpkn'],
        'formulir_persetujuan_calon_pengantin' => ['table' => 'formulir_persetujuan_calon_pengantin', 'id_col' => 'id_fpcp'],
        'formulir_persetujuan_calon_pengantin_istri' => ['table' => 'formulir_persetujuan_calon_pengantin_istri', 'id_col' => 'id_fpcp2'],
        'formulir_surat_izin_orang_tua' => ['table' => 'formulir_surat_izin_orang_tua', 'id_col' => 'id_fsiot']
    ];

    if (array_key_exists($jenis, $suratMap)) {
        $table = $suratMap[$jenis]['table'];
        $id_col = $suratMap[$jenis]['id_col'];

        $deleteQuery = "DELETE FROM $table WHERE $id_col = '$id'";
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
