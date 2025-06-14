<?php
  include ('../../../config/koneksi.php');
  include ('../part/akses.php');
  include ('../part/header.php');
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
          }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['lvl']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="../../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../../penduduk/">
          <i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span>
        </a>
      </li>
      <li>
        <a href="../../surat/permintaan_surat/">
          <i class="fa fa-file-alt"></i>
          <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>

      <li>
        <a href="../../surat/surat_selesai/">
          <i class="fa fa-check-circle"></i>
          <span>&nbsp;Surat Selesai</span>
        </a>
      </li>
      <li>
        <a href="../../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Permintaan Surat</h1><br>
    
    <!-- Tambahkan di <head> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        .tombol-hp {
          display: none; /* Sembunyikan di desktop */
        }

        @media (max-width: 768px) {
          .tombol-hp {
            display: flex;
            justify-content: flex-end;
            padding: 16px;
          }

          .tombol-hp a {
            text-decoration: none;
          }

          .tombol-hp div {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
          }

          .tombol-hp div:hover {
            background-color: #0056b3;
          }
        }
      </style>

      <!-- Tambahkan di <body> -->
      <div class="tombol-hp">
        <a href="../../dashboard/">
          <div>
            Kembali Ke Menu
          </div>
        </a>
      </div>


    <ol class="breadcrumb">
      <li><a href="../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Permintaan Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row" style="overflow-x:auto;">
      <div class="col-md-12">
        <br><br>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>Tanggal</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Jenis Surat</strong></th>
              <th><strong>Status</strong></th>
              <th><strong>Aksi</strong></th>
            </tr>
          </thead>
          <tbody>
                  <?php
                        $query = "
                            SELECT penduduk.nama, surat_keterangan.id_sk AS id_surat, surat_keterangan.no_surat, surat_keterangan.nik, surat_keterangan.jenis_surat, surat_keterangan.status_surat, surat_keterangan.tanggal_surat
                            FROM penduduk 
                            LEFT JOIN surat_keterangan ON surat_keterangan.nik = penduduk.nik 
                            WHERE surat_keterangan.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_berkelakuan_baik.id_skbb AS id_surat, surat_keterangan_berkelakuan_baik.no_surat, surat_keterangan_berkelakuan_baik.nik, surat_keterangan_berkelakuan_baik.jenis_surat, surat_keterangan_berkelakuan_baik.status_surat, surat_keterangan_berkelakuan_baik.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_berkelakuan_baik ON surat_keterangan_berkelakuan_baik.nik = penduduk.nik 
                            WHERE surat_keterangan_berkelakuan_baik.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_domisili.id_skd AS id_surat, surat_keterangan_domisili.no_surat, surat_keterangan_domisili.nik, surat_keterangan_domisili.jenis_surat, surat_keterangan_domisili.status_surat, surat_keterangan_domisili.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_domisili ON surat_keterangan_domisili.nik = penduduk.nik 
                            WHERE surat_keterangan_domisili.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_kepemilikan_kendaraan_bermotor.id_skkkb AS id_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.no_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.nik, surat_keterangan_kepemilikan_kendaraan_bermotor.jenis_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat, surat_keterangan_kepemilikan_kendaraan_bermotor.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_kepemilikan_kendaraan_bermotor ON surat_keterangan_kepemilikan_kendaraan_bermotor.nik = penduduk.nik 
                            WHERE surat_keterangan_kepemilikan_kendaraan_bermotor.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_perhiasan.id_skp AS id_surat, surat_keterangan_perhiasan.no_surat, surat_keterangan_perhiasan.nik, surat_keterangan_perhiasan.jenis_surat, surat_keterangan_perhiasan.status_surat, surat_keterangan_perhiasan.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_perhiasan ON surat_keterangan_perhiasan.nik = penduduk.nik 
                            WHERE surat_keterangan_perhiasan.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_usaha.id_sku AS id_surat, surat_keterangan_usaha.no_surat, surat_keterangan_usaha.nik, surat_keterangan_usaha.jenis_surat, surat_keterangan_usaha.status_surat, surat_keterangan_usaha.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_usaha ON surat_keterangan_usaha.nik = penduduk.nik 
                            WHERE surat_keterangan_usaha.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_lapor_hajatan.id_slh AS id_surat, surat_lapor_hajatan.no_surat, surat_lapor_hajatan.nik, surat_lapor_hajatan.jenis_surat, surat_lapor_hajatan.status_surat, surat_lapor_hajatan.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_lapor_hajatan ON surat_lapor_hajatan.nik = penduduk.nik 
                            WHERE surat_lapor_hajatan.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_pengantar_skck.id_sps AS id_surat, surat_pengantar_skck.no_surat, surat_pengantar_skck.nik, surat_pengantar_skck.jenis_surat, surat_pengantar_skck.status_surat, surat_pengantar_skck.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_pengantar_skck ON surat_pengantar_skck.nik = penduduk.nik 
                            WHERE surat_pengantar_skck.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_tidak_mampu.id_sktm AS id_surat, surat_keterangan_tidak_mampu.no_surat, surat_keterangan_tidak_mampu.nik, surat_keterangan_tidak_mampu.jenis_surat, surat_keterangan_tidak_mampu.status_surat, surat_keterangan_tidak_mampu.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_tidak_mampu ON surat_keterangan_tidak_mampu.nik = penduduk.nik 
                            WHERE surat_keterangan_tidak_mampu.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, formulir_pengantar_nikah.id_fpn AS id_surat, formulir_pengantar_nikah.no_surat, formulir_pengantar_nikah.nik, formulir_pengantar_nikah.jenis_surat, formulir_pengantar_nikah.status_surat, formulir_pengantar_nikah.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN formulir_pengantar_nikah ON formulir_pengantar_nikah.nik = penduduk.nik 
                            WHERE formulir_pengantar_nikah.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, formulir_permohonan_kehendak_nikah.id_fpkn AS id_surat, formulir_permohonan_kehendak_nikah.no_surat, formulir_permohonan_kehendak_nikah.nik, formulir_permohonan_kehendak_nikah.jenis_surat, formulir_permohonan_kehendak_nikah.status_surat, formulir_permohonan_kehendak_nikah.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik 
                            WHERE formulir_permohonan_kehendak_nikah.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, formulir_persetujuan_calon_pengantin.id_fpcp AS id_surat, formulir_persetujuan_calon_pengantin.no_surat, formulir_persetujuan_calon_pengantin.nik, formulir_persetujuan_calon_pengantin.jenis_surat, formulir_persetujuan_calon_pengantin.status_surat, formulir_persetujuan_calon_pengantin.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN formulir_persetujuan_calon_pengantin ON formulir_persetujuan_calon_pengantin.nik = penduduk.nik 
                            WHERE formulir_persetujuan_calon_pengantin.status_surat='pending'     

                            UNION 
                            SELECT penduduk.nama, formulir_persetujuan_calon_pengantin_istri.id_fpcp2 AS id_surat, formulir_persetujuan_calon_pengantin_istri.no_surat, formulir_persetujuan_calon_pengantin_istri.nik, formulir_persetujuan_calon_pengantin_istri.jenis_surat, formulir_persetujuan_calon_pengantin_istri.status_surat, formulir_persetujuan_calon_pengantin_istri.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN formulir_persetujuan_calon_pengantin_istri ON formulir_persetujuan_calon_pengantin_istri.nik = penduduk.nik 
                            WHERE formulir_persetujuan_calon_pengantin_istri.status_surat='pending' 

                            UNION 
                            SELECT penduduk.nama, formulir_surat_izin_orang_tua.id_fsiot AS id_surat, formulir_surat_izin_orang_tua.no_surat, formulir_surat_izin_orang_tua.nik, formulir_surat_izin_orang_tua.jenis_surat, formulir_surat_izin_orang_tua.status_surat, formulir_surat_izin_orang_tua.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN formulir_surat_izin_orang_tua ON formulir_surat_izin_orang_tua.nik = penduduk.nik 
                            WHERE formulir_surat_izin_orang_tua.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_kematian.id_skk AS id_surat, surat_keterangan_kematian.no_surat, surat_keterangan_kematian.nik, surat_keterangan_kematian.jenis_surat, surat_keterangan_kematian.status_surat, surat_keterangan_kematian.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_kematian ON surat_keterangan_kematian.nik = penduduk.nik 
                            WHERE surat_keterangan_kematian.status_surat='pending'

                            UNION 
                            SELECT penduduk.nama, surat_keterangan_domisili_usaha.id_skdu AS id_surat, surat_keterangan_domisili_usaha.no_surat, surat_keterangan_domisili_usaha.nik, surat_keterangan_domisili_usaha.jenis_surat, surat_keterangan_domisili_usaha.status_surat, surat_keterangan_domisili_usaha.tanggal_surat 
                            FROM penduduk 
                            LEFT JOIN surat_keterangan_domisili_usaha ON surat_keterangan_domisili_usaha.nik = penduduk.nik 
                            WHERE surat_keterangan_domisili_usaha.status_surat='pending'

                        ";

                        $result = mysqli_query($connect, $query);

                        if ($result && $result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $datetime = strtotime($row['tanggal_surat']);
                                $tgl = date('d', $datetime);
                                $bln = date('F', $datetime);
                                $thn = date('Y', $datetime);
                                $jam = date('H:i:s', $datetime);

                                $blnIndo = [
                                    'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
                                    'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
                                    'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
                                    'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
                                ];

                                $tanggal = "$tgl {$blnIndo[$bln]} $thn pukul $jam";

                                echo "<tr>
                                    <td>{$tanggal}</td>
                                    <td>{$row['nik']}</td>
                                    <td style='text-transform: capitalize;'>{$row['nama']}</td>
                                    <td>{$row['jenis_surat']}</td>
                                    <td>
                                        <a class='btn btn-danger btn-sm' href='#'>
                                            <i class='fa fa-spinner'></i> <b>{$row['status_surat']}</b>
                                        </a>
                                    </td>
                                    <td>";

                                $jenis = strtolower(str_replace(' ', '_', $row['jenis_surat']));
                                $link = '';

                                switch ($jenis) {
                                    case 'surat_keterangan':
                                    case 'surat_keterangan_berkelakuan_baik':
                                    case 'surat_keterangan_domisili':
                                    case 'surat_keterangan_kepemilikan_kendaraan_bermotor':
                                    case 'surat_keterangan_perhiasan':
                                    case 'surat_keterangan_usaha':
                                    case 'surat_lapor_hajatan':
                                    case 'surat_pengantar_skck':
                                    case 'surat_keterangan_tidak_mampu':
                                    case 'formulir_pengantar_nikah':
                                    case 'formulir_permohonan_kehendak_nikah':
                                    case 'formulir_persetujuan_calon_pengantin':
                                    case 'formulir_persetujuan_calon_pengantin_istri':
                                    case 'formulir_surat_izin_orang_tua':
                                    case 'surat_keterangan_kematian':
                                    case 'surat_keterangan_domisili_usaha':
                                        $link = "konfirmasi/{$jenis}/index.php?id={$row['id_surat']}";
                                        break;
                                }

                                echo "<a class='btn btn-danger btn-sm' href='hapus_surat.php?id={$row['id_surat']}&jenis={$jenis}' onclick=\"return confirm('Yakin ingin menghapus surat ini?')\">
                                        <i class='fa fa-trash'></i> HAPUS
                                      </a>
                                        <a class='btn btn-success btn-sm' href='{$link}'>
                                        <i class='fa fa-check'></i> <b>KONFIRMASI</b>
                                      </a>
                                    </td>
                                </tr>";
                            }
                          }
                        ?>
                </tbody>

                <?php if (isset($_GET['status']) && $_GET['status'] == 'berhasil'): ?>
                  <div id="flash-message" style="
                      background-color: #d4edda;
                      color: #155724;
                      border: 1px solid #c3e6cb;
                      padding: 10px 20px;
                      border-radius: 5px;
                      margin-bottom: 15px;
                      font-weight: bold;
                      animation: fadeOut 3s forwards;
                  ">
                      ✅ Surat berhasil dihapus!
                  </div>
              <?php endif; ?>

        </table>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>