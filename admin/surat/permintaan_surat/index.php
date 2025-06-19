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
        <a href="../../profil_desa/">
          <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
        </a>
      </li>
      <li>
   			<a href="../../data_kades_kel/">
     			<i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
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
              <th><strong>No.</strong></th> <th><strong>Tanggal</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Jenis Surat</strong></th>
              <th><strong>Status</strong></th>
              <th><strong>Aksi</strong></th>
            </tr>
          </thead>
          <tbody>

          <?php
              $jenisSurat = [
                'surat_keterangan' => 'id_sk',
                'surat_keterangan_berkelakuan_baik' => 'id_skbb',
                'surat_keterangan_domisili' => 'id_skd',
                'surat_keterangan_kepemilikan_kendaraan_bermotor' => 'id_skkkb',
                'surat_keterangan_perhiasan' => 'id_skp',
                'surat_keterangan_usaha' => 'id_sku',
                'surat_lapor_hajatan' => 'id_slh',
                'surat_pengantar_skck' => 'id_sps',
                'surat_keterangan_tidak_mampu' => 'id_sktm',
                'formulir_pengantar_nikah' => 'id_fpn',
                'formulir_permohonan_kehendak_nikah' => 'id_fpkn',
                'formulir_persetujuan_calon_pengantin' => 'id_fpcp',
                'formulir_persetujuan_calon_pengantin_istri' => 'id_fpcp2',
                'formulir_surat_izin_orang_tua' => 'id_fsiot',
                'surat_keterangan_kematian' => 'id_skk',
                'surat_keterangan_domisili_usaha' => 'id_skdu',
                'surat_keterangan_pengantar' => 'id_skp',
                'surat_keterangan_beda_identitas' => 'id_skbi',
                'surat_keterangan_beda_identitas_kis' => 'id_skbis',
                'surat_keterangan_penghasilan_orang_tua' => 'id_skpot'
              ];

              $unionParts = [];
              foreach ($jenisSurat as $table => $idField) {
                $unionParts[] = "SELECT penduduk.nama, {$table}.{$idField} AS id_surat, {$table}.no_surat, {$table}.nik, {$table}.jenis_surat, {$table}.status_surat, {$table}.tanggal_surat
                                FROM penduduk
                                LEFT JOIN {$table} ON {$table}.nik = penduduk.nik
                                WHERE {$table}.status_surat='pending'";
              }

              $query = implode(" UNION ", $unionParts) . " ORDER BY tanggal_surat ASC";
              $result = mysqli_query($connect, $query);
              $no = 1;

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
                  $jenis = strtolower(str_replace(' ', '_', $row['jenis_surat']));
                  $link = "konfirmasi/{$jenis}/index.php?id={$row['id_surat']}";

                  echo "<tr>
                    <td>{$no}.</td> <td>{$tanggal}</td>
                    <td>{$row['nik']}</td>
                    <td style='text-transform: capitalize;'>{$row['nama']}</td>
                    <td>{$row['jenis_surat']}</td>
                    <td>
                      <a class='btn btn-danger btn-sm' href='#'>
                        <i class='fa fa-spinner'></i> <b>{$row['status_surat']}</b>
                      </a>
                    </td>
                    <td>
                      <a class='btn btn-danger btn-sm' href='hapus_surat.php?id={$row['id_surat']}&jenis={$jenis}' onclick=\"return confirm('Yakin ingin menghapus surat ini?')\">
                        <i class='fa fa-trash'></i> HAPUS
                      </a>
                      <a class='btn btn-success btn-sm' href='{$link}'>
                        <i class='fa fa-check'></i> <b>KONFIRMASI</b>
                      </a>
                    </td>
                  </tr>";
                  $no++;
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