<?php 
  include ('../part/akses.php');
  include ('../../../../../config/koneksi.php');
  include ('../part/header.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT penduduk.*, formulir_permohonan_kehendak_nikah.* FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.id_fpkn='$id'");
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
            <h2 class="box-title"><i class="fas fa-envelope"></i> Konfirmasi Formulir Permohonan Kehendak Nikah</h2>
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

                    <div class="form-group">
                    <label class="col-sm-3 control-label">Kepada yth, Kepala KUA/PPN LN di </label>
                    <div class="col-sm-9">
                      <input type="text" name="fkepada_yth" 
                            value="<?php echo $row['kepada_yth']; ?>" 
                            class="form-control" placeholder="Tempat" required>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">Kepala KUA/PPN LN</label>
                    <div class="col-sm-9">
                      <input type="text" name="fkepala_kua" 
                            value="<?php echo $row['kepala_kua']; ?>" 
                            class="form-control" placeholder="Nama" required>
                    </div>
                    </div>

                  </div>
                </div>

                <div class="col-md-6">
                  <div class="box-body">

                     <!-- FARDAN SALIN NOMOR OTOMATIS -->
                    <?php
                      // Ambil id_fpknkkb dari data surat sekarang (misal dari hasil query sebelumnya)
                      $current_id = isset($row['id_fpkn']) ? (int)$row['id_fpkn'] : 0;

                      if ($current_id > 0) {
                          // Query nomor surat sebelumnya berdasarkan id_fpknkkb yang kurang dari current_id
                          $query = mysqli_query($connect, "
                              SELECT no_surat 
                              FROM formulir_permohonan_kehendak_nikah
                              WHERE id_fpkn < $current_id 
                              ORDER BY id_fpkn DESC 
                              LIMIT 1
                          ");

                          $data = mysqli_fetch_assoc($query);
                          $last_no_surat = $data ? $data['no_surat'] : 'Data belum tersedia';
                      } else {
                          $last_no_surat = 'Data belum tersedia';
                      }
                      ?>

                      <div class="form-group" style="border: none; padding-top: 7px; font-style: italic; color: red;">
                        <label class="col-sm-3 control-label"><em>No. Surat Sebelumnya</em></label>
                        <div class="col-sm-7">
                          <div id="noSuratText" class="form-control" style="border: none; padding-top: 7px; font-style: italic; color: red;">
                            <?php echo htmlspecialchars($last_no_surat); ?>
                          </div>
                        </div>
                        <div class="col-sm-2" style="position: relative;">
                          <button type="button" class="btn btn-primary" onclick="copyNoSurat()">Salin</button>
                          <small id="copyText" style="display:none; color:green; margin-left:8px;">Tersalin</small>
                        </div>
                      </div>

                      <script>
                      function copyNoSurat() {
                        const text = document.getElementById('noSuratText').innerText;
                        const copyText = document.getElementById('copyText');

                        if(text === 'Data belum tersedia') {
                          copyText.style.display = 'none';
                          return;
                        }

                        navigator.clipboard.writeText(text).then(() => {
                          copyText.style.display = 'inline';
                          setTimeout(() => {
                            copyText.style.display = 'none';
                          }, 2000);
                        }).catch(() => {
                          copyText.style.display = 'none';
                        });
                      }
                      </script>
                      <!-- FARDAN SALIN NOMOR OTOMATIS -->

                    <!-- TAMBAHKAN 1 ANGKA OTOMATIS -->
                     <?php
                    $current_id = isset($row['id_fpkn']) ? (int)$row['id_fpkn'] : 0;
                    $auto_no_surat = '';

                    if ($current_id > 0) {
                        $query = mysqli_query($connect, "
                            SELECT no_surat 
                            FROM formulir_permohonan_kehendak_nikah
                            WHERE id_fpkn < $current_id 
                            ORDER BY id_fpkn DESC 
                            LIMIT 1
                        ");

                        $data = mysqli_fetch_assoc($query);
                        if ($data && isset($data['no_surat'])) {
                            $last_no_surat = trim($data['no_surat']);
                            $parts = explode('/', $last_no_surat);

                            if (count($parts) > 0 && is_numeric($parts[0])) {
                                $next_number = (int)$parts[0] + 1;
                                $parts[0] = str_pad($next_number, 2, '0', STR_PAD_LEFT);
                                $auto_no_surat = implode('/', $parts);
                            } else {
                                // Jika gagal baca format, fallback ke default format
                                $bulan_romawi_map = [
                                  '01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV',
                                  '05' => 'V', '06' => 'VI', '07' => 'VII', '08' => 'VIII',
                                  '09' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII'
                                ];
                                $tanggal_surat = isset($row['tanggal_surat']) ? $row['tanggal_surat'] : date('Y-m-d');
                                $bulan = date('m', strtotime($tanggal_surat));
                                $tahun = date('Y', strtotime($tanggal_surat));
                                $bulan_romawi = $bulan_romawi_map[$bulan];
                                
                                $kode_desa = 'KODE-DESA';
                                $kode_surat = 'SKD';
                                $auto_no_surat = "0001/$kode_surat/$kode_desa/$bulan_romawi/$tahun";
                            }
                        }
                    }
                    ?>

                   <div class="form-group">
                    <label class="col-sm-3 control-label">No. Surat</label>
                    <div class="col-sm-9">
                      <input type="text" name="fno_surat" 
                            value="<?php echo !empty($auto_no_surat) ? htmlspecialchars($auto_no_surat) : htmlspecialchars($row['no_surat']); ?>" 
                            class="form-control" placeholder="Masukkan No. Surat" required>
                    </div>
                  </div>
                    <!-- TAMBAHKAN 1 ANGKA OTOMATIS -->

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
                      <div class="col-sm-9">
                        <textarea rows="3" name="falamat" class="form-control" style="text-transform: capitalize;" readonly><?php echo $row['jalan'] . ", RT" . $row['rt'] . "/RW" . $row['rw'] . ", Dusun " . $row['dusun'] . ", Desa " . $row['desa'] . ", Kecamatan " . $row['kecamatan'] . ", " . $row['kota']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Tempat Akad Nikah</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftempat_akad" style="text-transform: capitalize;" value="<?php echo $row['tempat_akad']; ?>" class="form-control" readonly>
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
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Calon Suami</label>
                      <div class="col-sm-9">
                        <input type="text" name="fcalon_suami" style="text-transform: uppercase;" value="<?php echo $row['calon_suami']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Calon Istri</label>
                      <div class="col-sm-9">
                        <input type="text" name="fcalon_istri" style="text-transform: uppercase;" value="<?php echo $row['calon_istri']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h5 class="box-title pull-right" style="color: #696969;"><i class="fas fa-info-circle"></i> <b>Informasi Surat</b></h5>
              <br><hr style="border-bottom: 1px solid #DCDCDC;">
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hari dan Tanggal Nikah</label>
                      <div class="col-sm-9">
                        <input type="text" name="fhari_tanggal" style="text-transform: uppercase;" value="<?php echo $row['hari_tanggal']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">8..</label>
                      <div class="col-sm-9">
                        <input type="text" name="fdelapan" style="text-transform: uppercase;" value="<?php echo $row['delapan']; ?>" class="form-control" readonly>
                      </div>
                    </div>
                       <div class="form-group">
                      <label class="col-sm-3 control-label">9..</label>
                      <div class="col-sm-9">
                        <input type="text" name="fsembilan" style="text-transform: uppercase;" value="<?php echo $row['sembilan']; ?>" class="form-control" readonly>
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="col-sm-3 control-label">10..</label>
                      <div class="col-sm-9">
                        <input type="text" name="fsepuluh" style="text-transform: uppercase;" value="<?php echo $row['sepuluh']; ?>" class="form-control" readonly>
                      </div>
                      </div>
                    <div>
                      <input type="hidden" name="id" value="<?php echo $row['id_fpkn']; ?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">

                  <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-3 control-label">11..</label>
                      <div class="col-sm-9">
                        <input type="text" name="fsebelas" style="text-transform: uppercase;" value="<?php echo $row['sebelas']; ?>" class="form-control" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">12..</label>
                      <div class="col-sm-9">
                        <input type="text" name="fdua_belas" style="text-transform: uppercase;" value="<?php echo $row['dua_belas']; ?>" class="form-control" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">13..</label>
                      <div class="col-sm-9">
                        <input type="text" name="ftiga_belas" style="text-transform: uppercase;" value="<?php echo $row['tiga_belas']; ?>" class="form-control" readonly>
                      </div>
                      </div>
                  </div>
                  </div>

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

<?php
  }

  include ('../part/footer.php');
?>