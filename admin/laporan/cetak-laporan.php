<html>
<head>
  <link rel="shortcut icon" href="../../assets/img/e-SuratDesa.png">
  <title>CETAK LAPORAN</title>
  <style>
    @page {
      margin: 2cm;
      color: none;
    }
    body {
      font-family: "Times New Roman", Times, serif;
    }
    hr{
      border-bottom: 1px solid #000000;
      height:0px;
    }
  </style>
</head>
<body>
  <?php
    include "../../config/koneksi.php";
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){
      $filter = $_GET['filter'];
      if($filter == '1'){
        echo '
          <div class="header">
            <div align="center" style="font-size: 14pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar</b></div>
            <hr>
          </div><br>
        ';

        $query = "SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_pengantar_nikah.no_surat, formulir_pengantar_nikah.tanggal_surat, formulir_pengantar_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_permohonan_kehendak_nikah.no_surat, formulir_permohonan_kehendak_nikah.tanggal_surat, formulir_permohonan_kehendak_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_persetujuan_calon_pengantin.no_surat, formulir_persetujuan_calon_pengantin.tanggal_surat, formulir_persetujuan_calon_pengantin.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_persetujuan_calon_pengantin_istri.no_surat, formulir_persetujuan_calon_pengantin_istri.tanggal_surat, formulir_persetujuan_calon_pengantin_istri.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin_istri.status_surat='selesai'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_surat_izin_orang_tua.no_surat, formulir_surat_izin_orang_tua.tanggal_surat, formulir_surat_izin_orang_tua.jenis_surat FROM penduduk LEFT JOIN formulir_surat_izin_orang_tua ON formulir_surat_izin_orang_tua.nik = penduduk.nik WHERE formulir_surat_izin_orang_tua.status_surat='selesai'
          ORDER BY tanggal_surat";
      }else if($filter == '2'){
        $tgl = date('d-m-Y', strtotime($_GET['tanggal'])); // Ubah format tanggal menjadi d-m-Y
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar</b></div>
            <div align="center" style="font-size: 12pt;"><b>Tanggal '.$tgl.'</b></div>
            <hr>
          </div><br>
        ';
        
        $query = "SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND DATE(surat_keterangan.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND DATE(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND DATE(surat_keterangan_domisili.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND DATE(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND DATE(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND DATE(surat_keterangan_usaha.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND DATE(surat_lapor_hajatan.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND DATE(surat_pengantar_skck.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND DATE(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_pengantar_nikah.no_surat, formulir_pengantar_nikah.tanggal_surat, formulir_pengantar_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.status_surat='selesai' AND DATE(formulir_pengantar_nikah.tanggal_surat)='{$_GET['tanggal']}'  
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_permohonan_kehendak_nikah.no_surat, formulir_permohonan_kehendak_nikah.tanggal_surat, formulir_permohonan_kehendak_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.status_surat='selesai' AND DATE(formulir_permohonan_kehendak_nikah.tanggal_surat)='{$_GET['tanggal']}'  
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_persetujuan_calon_pengantin.no_surat, formulir_persetujuan_calon_pengantin.tanggal_surat, formulir_persetujuan_calon_pengantin.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin.status_surat='selesai' AND DATE(formulir_persetujuan_calon_pengantin.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_persetujuan_calon_pengantin_istri.no_surat, formulir_persetujuan_calon_pengantin_istri.tanggal_surat, formulir_persetujuan_calon_pengantin_istri.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin_istri.status_surat='selesai' AND DATE(formulir_persetujuan_calon_pengantin_istri.tanggal_surat)='{$_GET['tanggal']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_surat_izin_orang_tua.no_surat, formulir_surat_izin_orang_tua.tanggal_surat, formulir_surat_izin_orang_tua.jenis_surat FROM penduduk LEFT JOIN formulir_surat_izin_orang_tua ON formulir_surat_izin_orang_tua.nik = penduduk.nik WHERE formulir_surat_izin_orang_tua.status_surat='selesai' AND DATE(formulir_surat_izin_orang_tua.tanggal_surat)='{$_GET['tanggal']}'
          
          ORDER BY tanggal_surat";
      }else if($filter == '3'){
        $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar</b></div>
            <div align="center" style="font-size: 12pt;"><b>Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b></div>
            <hr>
          </div><br>
        ';
        
        $query = "SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND MONTH(surat_keterangan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND MONTH(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND MONTH(surat_keterangan_domisili.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_domisili.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND MONTH(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND MONTH(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND MONTH(surat_keterangan_usaha.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_usaha.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND MONTH(surat_lapor_hajatan.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_lapor_hajatan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND MONTH(surat_pengantar_skck.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_pengantar_skck.tanggal_surat)='{$_GET['tahun']}' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND MONTH(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['bulan']}' AND YEAR(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_pengantar_nikah.no_surat, formulir_pengantar_nikah.tanggal_surat, formulir_pengantar_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.status_surat='selesai' AND MONTH(formulir_pengantar_nikah.tanggal_surat)='{$_GET['bulan']}' AND YEAR(formulir_pengantar_nikah.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_permohonan_kehendak_nikah.no_surat, formulir_permohonan_kehendak_nikah.tanggal_surat, formulir_permohonan_kehendak_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.status_surat='selesai' AND MONTH(formulir_permohonan_kehendak_nikah.tanggal_surat)='{$_GET['bulan']}' AND YEAR(formulir_permohonan_kehendak_nikah.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_persetujuan_calon_pengantin.no_surat, formulir_persetujuan_calon_pengantin.tanggal_surat, formulir_persetujuan_calon_pengantin.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin.status_surat='selesai' AND MONTH(formulir_persetujuan_calon_pengantin.tanggal_surat)='{$_GET['bulan']}' AND YEAR(formulir_persetujuan_calon_pengantin.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_persetujuan_calon_pengantin_istri.no_surat, formulir_persetujuan_calon_pengantin_istri.tanggal_surat, formulir_persetujuan_calon_pengantin_istri.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin_istri.status_surat='selesai' AND MONTH(formulir_persetujuan_calon_pengantin_istri.tanggal_surat)='{$_GET['bulan']}' AND YEAR(formulir_persetujuan_calon_pengantin_istri.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_surat_izin_orang_tua.no_surat, formulir_surat_izin_orang_tua.tanggal_surat, formulir_surat_izin_orang_tua.jenis_surat FROM penduduk LEFT JOIN formulir_surat_izin_orang_tua ON formulir_surat_izin_orang_tua.nik = penduduk.nik WHERE formulir_surat_izin_orang_tua.status_surat='selesai' AND MONTH(formulir_surat_izin_orang_tua.tanggal_surat)='{$_GET['bulan']}' AND YEAR(formulir_surat_izin_orang_tua.tanggal_surat)='{$_GET['tahun']}'
          
          ORDER BY tanggal_surat";
      }else if($filter == '4'){
        echo '
          <div class="header">
            <div align="center" style="font-size: 12pt;"><b>Laporan Surat Administrasi Desa - Surat Keluar</b></div>
            <div align="center" style="font-size: 12pt;"><b>Tahun '.$_GET['tahun'].'</b></div>
            <hr>
          </div><br>
        ';
        
        $query = "SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai' AND YEAR(surat_keterangan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' AND YEAR(surat_keterangan_berkelakuan_baik.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' AND YEAR(surat_keterangan_domisili.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai' AND YEAR(surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai' AND YEAR(surat_keterangan_perhiasan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' AND YEAR(surat_keterangan_usaha.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai' AND YEAR(surat_lapor_hajatan.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' AND YEAR(surat_pengantar_skck.tanggal_surat)='{$_GET['tahun']}' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai' AND YEAR(surat_keterangan_tidak_mampu.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_pengantar_nikah.no_surat, formulir_pengantar_nikah.tanggal_surat, formulir_pengantar_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.status_surat='selesai' AND YEAR(formulir_pengantar_nikah.tanggal_surat)='{$_GET['tahun']}' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_permohonan_kehendak_nikah.no_surat, formulir_permohonan_kehendak_nikah.tanggal_surat, formulir_permohonan_kehendak_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.status_surat='selesai' AND YEAR(formulir_permohonan_kehendak_nikah.tanggal_surat)='{$_GET['tahun']}' 
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_persetujuan_calon_pengantin.no_surat, formulir_persetujuan_calon_pengantin.tanggal_surat, formulir_persetujuan_calon_pengantin.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin.status_surat='selesai' AND YEAR(formulir_persetujuan_calon_pengantin.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_persetujuan_calon_pengantin_istri.no_surat, formulir_persetujuan_calon_pengantin_istri.tanggal_surat, formulir_persetujuan_calon_pengantin_istri.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin_istri.status_surat='selesai' AND YEAR(formulir_persetujuan_calon_pengantin_istri.tanggal_surat)='{$_GET['tahun']}'
          UNION SELECT penduduk.nama, penduduk.dusun, penduduk.rw, penduduk.desa, formulir_surat_izin_orang_tua.no_surat, formulir_surat_izin_orang_tua.tanggal_surat, formulir_surat_izin_orang_tua.jenis_surat FROM penduduk LEFT JOIN formulir_surat_izin_orang_tua ON formulir_surat_izin_orang_tua.nik = penduduk.nik WHERE formulir_surat_izin_orang_tua.status_surat='selesai' AND YEAR(formulir_surat_izin_orang_tua.tanggal_surat)='{$_GET['tahun']}' 
          
          ORDER BY tanggal_surat";
      }
    }else{
      echo '
          <div class="header" style="text-align: center;">
            <img src="../../assets/img/e-SuratDesa.png" style="max-width: 200px; height: auto;">
            <div style="font-size: 12pt; font-weight: bold; margin-top: 8px;">
              Laporan Surat Administrasi Desa
            </div>
            <hr style="margin-top: 10px;">
          </div><br>
        ';
      $query = "SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan.no_surat, surat_keterangan.tanggal_surat, surat_keterangan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik WHERE surat_keterangan.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.tanggal_surat, surat_keterangan_berkelakuan_baik.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik WHERE surat_keterangan_berkelakuan_baik.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.tanggal_surat, surat_keterangan_domisili.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik WHERE surat_keterangan_domisili.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.tanggal_surat, surat_keterangan_perhiasan.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik WHERE surat_keterangan_perhiasan.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.tanggal_surat, surat_keterangan_usaha.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik WHERE surat_keterangan_usaha.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.tanggal_surat, surat_lapor_hajatan.jenis_surat FROM penduduk LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik WHERE surat_lapor_hajatan.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_pengantar_skck.no_surat, surat_pengantar_skck.tanggal_surat, surat_pengantar_skck.jenis_surat FROM penduduk LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik WHERE surat_pengantar_skck.status_surat='selesai' 
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.tanggal_surat, surat_keterangan_tidak_mampu.jenis_surat FROM penduduk LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik WHERE surat_keterangan_tidak_mampu.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_pengantar_nikah.no_surat, formulir_pengantar_nikah.tanggal_surat, formulir_pengantar_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik WHERE formulir_pengantar_nikah.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_permohonan_kehendak_nikah.no_surat, formulir_permohonan_kehendak_nikah.tanggal_surat, formulir_permohonan_kehendak_nikah.jenis_surat FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_persetujuan_calon_pengantin.no_surat, formulir_persetujuan_calon_pengantin.tanggal_surat, formulir_persetujuan_calon_pengantin.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_persetujuan_calon_pengantin_istri.no_surat, formulir_persetujuan_calon_pengantin_istri.tanggal_surat, formulir_persetujuan_calon_pengantin_istri.jenis_surat FROM penduduk LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.nik = penduduk.nik WHERE formulir_persetujuan_calon_pengantin_istri.status_surat='selesai'
        UNION SELECT penduduk.nama, penduduk.dusun, penduduk.desa, penduduk.rw, formulir_surat_izin_orang_tua.no_surat, formulir_surat_izin_orang_tua.tanggal_surat, formulir_surat_izin_orang_tua.jenis_surat FROM penduduk LEFT JOIN formulir_surat_izin_orang_tua ON formulir_surat_izin_orang_tua.nik = penduduk.nik WHERE formulir_surat_izin_orang_tua.status_surat='selesai'
        
        ORDER BY tanggal_surat";
    }
  ?>
  <table width="100%" border="1" cellpadding="5" style="border-collapse:collapse;">
    <tr>
      <th>No.</th> <th>No. Surat</th>
      <th>Tanggal</th>
      <th>Nama</th>
      <th>Jenis Surat</th>
      <th>Alamat</th>
    </tr>
    <?php
      $sql = mysqli_query($connect, $query);
      $row = mysqli_num_rows($sql);
      $no = 1; // Inisialisasi nomor
      if($row > 0){
        while($data = mysqli_fetch_assoc($sql)){
          $tgl = date('d-m-Y', strtotime($data['tanggal_surat']));
          echo "<tr>";
          echo "<td>".$no++."</td>"; // Menampilkan nomor dan increment
          echo "<td>".$data['no_surat']."</td>";
          echo "<td>".$tgl."</td>";
          echo "<td>".ucwords(strtolower($data['nama']))."</td>";
          echo "<td>".$data['jenis_surat']."</td>";
          echo "<td> ".ucwords(strtolower($data['dusun']))."</td>";
          echo "</tr>";
        }
      }else{
        echo "<tr><td colspan='6'>Data tidak ditemukan.</td></tr>"; // Ubah colspan menjadi 6
      }
    ?>
  </table>
  <script>
    window.print();
  </script>
</body>
</html>