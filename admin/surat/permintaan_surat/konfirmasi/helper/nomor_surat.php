<?php
function generate_nomor_surat($kode_surat, $kode_surat_url, $kode_desa, $nomor_urut, $tanggal)
{
    include('../../../../../config/koneksi.php'); // Sesuaikan path jika perlu

    // Mapping bulan ke angka Romawi
    $bulan_romawi_map = [
        '01'=>'I','02'=>'II','03'=>'III','04'=>'IV',
        '05'=>'V','06'=>'VI','07'=>'VII','08'=>'VIII',
        '09'=>'IX','10'=>'X','11'=>'XI','12'=>'XII'
    ];

    $bulan = date('m', strtotime($tanggal));
    $tahun = date('Y', strtotime($tanggal));
    $bulan_romawi = $bulan_romawi_map[$bulan] ?? 'X';
    $nomor_urut_padded = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);

    // Ambil jabatan dari baris pertama tabel pejabat_desa
    $q = mysqli_query($connect, "SELECT jabatan FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1");
    $r = mysqli_fetch_assoc($q);
    $jabatan = strtolower($r['jabatan'] ?? '');

    // Format berdasarkan jabatan
    if ($jabatan === 'lurah') {
        /*return "$kode_surat/$kode_surat_url/$nomor_urut_padded/$kode_desa/$bulan_romawi/$tahun";*/
        return "$kode_surat/$nomor_urut_padded/$kode_surat_url/$kode_desa/$bulan_romawi/$tahun";
    } else {
        return "$nomor_urut_padded/$kode_surat/$kode_desa/$bulan_romawi/$tahun";
    }
}
?>
