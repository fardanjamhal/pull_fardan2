<?php 
  include ('../part/akses.php');
  include ('../../../../../config/koneksi.php');
  include ('../part/header.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT penduduk.*, surat_keterangan_belum_terbit_sppt_pbb.* FROM penduduk LEFT JOIN surat_keterangan_belum_terbit_sppt_pbb ON surat_keterangan_belum_terbit_sppt_pbb.nik = penduduk.nik WHERE surat_keterangan_belum_terbit_sppt_pbb.id_skbtsp='$id'");
  while($row = mysqli_fetch_array($qCek)){
?>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php  
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../../../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../../../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
        <a href="../../../../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
       <li>
   			<a href="../../../../profil_desa/">
     			<i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
   			</a>
   		</li>
      <li>
   			<a href="../../../../data_kades_kel/">
     			<i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
   			</a>
   		</li>
      <li>
        <a href="../../../../penduduk/">
          <i class="fa fa-users"></i><span>&nbsp;&nbsp;Data Penduduk</span>
        </a>
      </li>
      <li>
        <a href="../../../permintaan_surat/">
          <i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>
      <li>
        <a href="../../../surat_selesai/">
          <i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span>
        </a>
      </li>
      <li>
        <a href="../../../../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb">
      <li><a href="../../../../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Permintaan Surat</li>
    </ol>
  </section>
  <section class="content">      
    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
          <div class="box-header with-border">
            <h2 class="box-title"><i class="fas fa-envelope"></i> Konfirmasi <?php echo $row['jenis_surat']; ?></h2>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
          </div>
          <div class="box-body">
            <form class="form-horizontal" method="post" action="update-konfirmasi.php">
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tanda Tangan</label>
                      <div class="col-sm-9">

                        <!-- fardan pilhan barcode -->
                        <select name="ft_tangan" class="form-control" style="text-transform: uppercase;" required>
                        <option value="">-- Pilih Tanda Tangan --</option>
                        <?php
                          $selectedPejabat  = $row['jabatan'];
                          $qTampilPejabat   = "SELECT * FROM pejabat_desa";
                          $tampilPejabat    = mysqli_query($connect, $qTampilPejabat);
                          while($rows = mysqli_fetch_assoc($tampilPejabat)) {
                            $selected = ($rows['jabatan'] == $selectedPejabat) ? 'selected="selected"' : '';
                            $displayText = ($rows['id_pejabat_desa'] == 2) 
                                            ? 'TTD BARCODE' 
                                            : $rows['jabatan'] . " (" . $rows['nama_pejabat_desa'] . ")";
                        ?>
                          <option value="<?php echo $rows['id_pejabat_desa']; ?>" <?php echo $selected; ?>>
                            <?php echo $displayText; ?>
                          </option>
                        <?php } ?>
                      </select>
                      <!-- fardan pilhan barcode -->

                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">



                    <!-- FARDAN SALIN NOMOR OTOMATIS -->
                    
                     <?php
                    include('../../../../../config/koneksi.php');

                    // Ambil tanggal surat (default hari ini jika kosong)
                    $tanggal = isset($row['tanggal_surat']) ? $row['tanggal_surat'] : date('Y-m-d');
                    $bulan = date('m', strtotime($tanggal));
                    $tahun = date('Y', strtotime($tanggal));

                    // Mapping bulan ke romawi
                    $bulan_romawi_map = [
                      '01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV',
                      '05' => 'V', '06' => 'VI', '07' => 'VII', '08' => 'VIII',
                      '09' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII'
                    ];
                    $bulan_romawi = $bulan_romawi_map[$bulan] ?? 'X';

                    // Ambil kode_surat dari nama folder
                    $folder_name = basename(__DIR__);
                    $folder_parts = explode('_', $folder_name);
                    $kode_surat = strtoupper(implode('', array_map(fn($word) => $word[0], $folder_parts)));

                    // Ambil kode_desa terakhir dari seluruh isi tabel nomor_surat (global, tanpa filter jenis surat)
                    $q_kode_desa = mysqli_query($connect, "
                        SELECT kode_desa FROM nomor_surat 
                        ORDER BY id DESC LIMIT 1
                    ");

                    $r_kode_desa = mysqli_fetch_assoc($q_kode_desa);

                    // Jika ada input dari POST, pakai itu, kalau tidak ada pakai dari query, jika tidak ada juga pakai default
                    $kode_desa = $_POST['kode_desa'] ?? ($r_kode_desa['kode_desa'] ?? 'KODE-DS');


                    // Ambil no urut dari input manual atau generate otomatis dari tahun
                    if (isset($_POST['no_urut_manual'])) {
                      $no_urut = (int)$_POST['no_urut_manual'];
                    } else {
                      $q = mysqli_query($connect, "
                        SELECT MAX(nomor_urut) as max_urut 
                        FROM nomor_surat 
                        WHERE tahun = '$tahun'
                      ");
                      $r = mysqli_fetch_assoc($q);
                      $no_urut = ($r && $r['max_urut']) ? $r['max_urut'] + 1 : 1;
                    }

                    // Format nomor surat akhir
                    $final_no_surat = str_pad($no_urut, 3, '0', STR_PAD_LEFT) . "/$kode_surat/$kode_desa/$bulan_romawi/$tahun";
                    ?>

                    <!-- TAMPILAN FORM -->
                    <div class="form-group">
                      <label class="col-sm-3 control-label">No. Urut</label>
                      <div class="col-sm-3">
                        <input type="number" name="no_urut_manual" class="form-control" value="<?= $no_urut ?>" required>
                      </div>

                      <label class="col-sm-2 control-label">Kode Desa</label>
                      <div class="col-sm-4">
                        <input type="text" name="kode_desa" class="form-control" value="<?= htmlspecialchars($kode_desa) ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label">No. Surat Final</label>
                      <div class="col-sm-9">
                        <input type="text" name="fno_surat" class="form-control" readonly value="<?= htmlspecialchars($final_no_surat) ?>">
                      </div>
                    </div>

                   
                    <!-- FARDAN SALIN NOMOR OTOMATIS -->



                  </div>
                </div>
              </div>
              <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i> <b>Informasi Penduduk</b></h5>
              <br><hr style="border-bottom: 1px solid #DCDCDC;">
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnama" style="text-transform: uppercase;" value="<?php echo $row['nama']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <?php
                      $tgl_lhr = date($row['tgl_lahir']);
                      $tgl = date('d ', strtotime($tgl_lhr));
                      $bln = date('F', strtotime($tgl_lhr));
                      $thn = date(' Y', strtotime($tgl_lhr));
                      $blnIndo = array(
                          'January' => 'Januari',
                          'February' => 'Februari',
                          'March' => 'Maret',
                          'April' => 'April',
                          'May' => 'Mei',
                          'June' => 'Juni',
                          'July' => 'Juli',
                          'August' => 'Agustus',
                          'September' => 'September',
                          'October' => 'Oktober',
                          'November' => 'November',
                          'December' => 'Desember'
                      );
                    ?>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat, Tgl Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" name="ft_lahir" style="text-transform: capitalize;" value="<?php echo $row['tempat_lahir'] . ", " . $tgl . $blnIndo[$bln] . $thn; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Pekerjaan</label>
                      <div class="col-sm-9">
                        <input type="text" name="fpekerjaan" style="text-transform: capitalize;" value="<?php echo $row['pekerjaan']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Alamat</label>
                      
                      <?php include '../../../permintaan_surat/konfirmasi/helper/alamat_helper.php'?>

                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label"></label>
                      <div class="col-sm-9">
                       <!-- Untuk Bootstrap 4 -->
                        <button type="button" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modalFormulir_<?php echo $row['id_skbtsp']; ?>">
                        Lihat Data Formulir
                      </button>

                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <input type="text" name="fj_kelamin" value="<?php echo $row['jenis_kelamin']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Agama</label>
                      <div class="col-sm-9">
                        <input type="text" name="fagama" style="text-transform: capitalize;" value="<?php echo $row['agama']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">NIK</label>
                      <div class="col-sm-9">
                        <input type="text" name="fnik" value="<?php echo $row['nik']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kewarganegaraan</label>
                      <div class="col-sm-9">
                        <input type="text" name="fkewarganegaraan" style="text-transform: uppercase;" value="<?php echo $row['kewarganegaraan']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                
                    <div>
                      <input type="hidden" name="id" value="<?php echo $row['id_skbtsp']; ?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box-body pull-right">
                    <input type="submit" name="submit" class="btn btn-success" value="Konfirmasi">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="box-footer">
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Modal -->
<div class="modal fade" id="modalFormulir_<?php echo $row['id_skbtsp']; ?>" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Formulir</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <?php
          // Cek lagi id_skbtsp ini
          $id_skbtsp = $row['id_skbtsp'];
          $query = mysqli_query($connect, "SELECT * FROM surat_keterangan_belum_terbit_sppt_pbb WHERE id_skbtsp = '$id_skbtsp'");
          $data = mysqli_fetch_assoc($query);

          if ($data) {
        ?>
          <table class="table table-bordered" style="width: 100%;">
          <tr>
            <td style="width: 30%; font-weight: 500;">LOKASI TANAH</td>
            <td><?php echo $data['lokasi']; ?></td>
          </tr>
          <tr>
            <td style="font-weight: 500;">Sebelah Utara</td>
            <td><?php echo $data['tanah_utara']; ?></td>
          </tr>
          <tr>
            <td style="font-weight: 500;">Sebelah Timur</td>
            <td><?php echo $data['tanah_timur']; ?></td>
          </tr>
          <tr>
            <td style="font-weight: 500;">Sebelah Selatan</td>
            <td><?php echo $data['tanah_selatan']; ?></td>
          </tr>
          <tr>
            <td style="font-weight: 500;">Sebelah Barat</td>
            <td><?php echo $data['tanah_barat']; ?></td>
          </tr>
        </table>

        <?php
          } else {
            echo "<p class='text-danger'>Data tidak ditemukan.</p>";
          }
        ?>
      </div>
    </div>
  </div>
</div>


<!-- jQuery dulu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<?php
  }

  include ('../part/footer.php');
?>