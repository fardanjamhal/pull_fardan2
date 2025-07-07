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
        'formulir_persetujuan_calon_pengantin_istri' => ['table' => 'formulir_persetujuan_calon_pengantin_istri', 'id_col' => 'id_fpcpi'],
        'formulir_surat_izin_orang_tua' => ['table' => 'formulir_surat_izin_orang_tua', 'id_col' => 'id_fsiot'],
        'surat_keterangan_kematian' => ['table' => 'surat_keterangan_kematian', 'id_col' => 'id_skk'],
        'surat_keterangan_domisili_usaha' => ['table' => 'surat_keterangan_domisili_usaha', 'id_col' => 'id_skdu'],
        'surat_keterangan_pengantar' => ['table' => 'surat_keterangan_pengantar', 'id_col' => 'id_skp'],
        'surat_keterangan_beda_identitas' => ['table' => 'surat_keterangan_beda_identitas', 'id_col' => 'id_skbi'],
        'surat_keterangan_beda_identitas_kis' => ['table' => 'surat_keterangan_beda_identitas_kis', 'id_col' => 'id_skbis'],
        'surat_keterangan_penghasilan_orang_tua' => ['table' => 'surat_keterangan_penghasilan_orang_tua', 'id_col' => 'id_skpot'],
        'surat_pengantar_hewan' => ['table' => 'surat_pengantar_hewan', 'id_col' => 'id_sph'],
        'surat_keterangan_kematian_dan_penguburan' => ['table' => 'surat_keterangan_kematian_dan_penguburan', 'id_col' => 'id_skkp'],
        'surat_keterangan_pindah_penduduk' => ['table' => 'surat_keterangan_pindah_penduduk', 'id_col' => 'id_skpp'],
        'surat_keterangan_pengantar_rujuk_atau_cerai' => ['table' => 'surat_keterangan_pengantar_rujuk_atau_cerai', 'id_col' => 'id_skrc'],
        'surat_keterangan_wali_hakim' => ['table' => 'surat_keterangan_wali_hakim', 'id_col' => 'id_skwh'],
        'surat_keterangan_mahar_sunrang' => ['table' => 'surat_keterangan_mahar_sunrang', 'id_col' => 'id_skm'],
        'surat_keterangan_jual_beli' => ['table' => 'surat_keterangan_jual_beli', 'id_col' => 'id_skjb'],
        'surat_keterangan_belum_terbit_sppt_pbb' => ['table' => 'surat_keterangan_belum_terbit_sppt_pbb', 'id_col' => 'id_skbtsp'],
        'surat_perintah_perjalanan_dinas' => ['table' => 'surat_perintah_perjalanan_dinas', 'id_col' => 'id_sppd'],
        'surat_tugas' => ['table' => 'surat_tugas', 'id_col' => 'id_st']
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
