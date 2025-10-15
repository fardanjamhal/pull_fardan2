<?php 
  include ('../part/akses.php');
  include ('../../../../../config/koneksi.php');
  include ('../part/header.php');
  include ('../helper/cek_akses_permintaan.php');

  // Ambil nama folder surat dari URL
  $folder = basename(dirname($_SERVER['PHP_SELF'])); // contoh: 'surat_keterangan_mahar_sunrang'

  // Nama tabel = nama folder
  $nama_tabel = $folder;

  // Ambil singkatan dari awalan masing-masing kata, misalnya hasil: 'id_skms'
  $potongan = explode('_', $folder);
  $singkatan = 'id_' . implode('', array_map(function($word) {
      return substr($word, 0, 1);
  }, $potongan));

  $id_field = $singkatan; // ✅ PENTING: ini yang digunakan di query

  $id = $_GET['id'];

  $qCek = mysqli_query($connect, "
    SELECT penduduk.*, $nama_tabel.* 
    FROM penduduk 
    LEFT JOIN $nama_tabel ON $nama_tabel.nik = penduduk.nik 
    WHERE $nama_tabel.$id_field = '$id'
  ");

  while($row = mysqli_fetch_array($qCek)){
      // proses data
?>



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
                      include('../helper/nomor_surat.php');

                      // Tanggal surat
                      $tanggal = isset($row['tanggal_surat']) ? $row['tanggal_surat'] : date('Y-m-d');
                      $tahun = date('Y', strtotime($tanggal));
                      $bulan = date('m', strtotime($tanggal));

                      // Cek apakah pejabat pertama adalah LURAH
                      $q_jabatan = mysqli_query($connect, "SELECT jabatan FROM pejabat_desa ORDER BY id_pejabat_desa ASC LIMIT 1");
                      $r_jabatan = mysqli_fetch_assoc($q_jabatan);
                      $is_lurah = (isset($r_jabatan['jabatan']) && strtoupper(trim($r_jabatan['jabatan'])) === 'LURAH');

                      // Nama folder sebagai nama tabel
                      $folder_name = basename(__DIR__);
                      $nama_tabel = $folder_name;

                      // Buat kode default dari nama folder
                      $folder_parts = explode('_', $folder_name);
                      $kata_dilewati = ['dan', 'atau', 'yang', 'dengan', 'ke', 'di', 'dari', 'untuk'];
                      $kode_surat_default = strtoupper(implode('', array_map(function($word) use ($kata_dilewati) {
                          return in_array(strtolower($word), $kata_dilewati) ? '' : $word[0];
                      }, $folder_parts)));

                      // Ambil kode_surat dari tabel nomor_surat berdasarkan jenis surat
                      $q_surat = mysqli_query($connect, "
                        SELECT ns.kode_surat 
                        FROM nomor_surat ns
                        JOIN $nama_tabel s 
                          ON s.no_surat = ns.nomor_lengkap
                        ORDER BY ns.id DESC 
                        LIMIT 1
                      ");
                      $r_surat = mysqli_fetch_assoc($q_surat);
                      $kode_surat = $_POST['kode_surat'] ?? ($r_surat['kode_surat'] ?? $kode_surat_default);

                      // Ambil nomor urut
                      if ($is_lurah) {
                          // Nomor urut global, tetapi per kode_surat (khusus LURAH)
                          $q_urut = mysqli_query($connect, "
                              SELECT MAX(nomor_urut) AS max_urut 
                              FROM nomor_surat 
                              WHERE tahun = '$tahun' AND kode_surat = '$kode_surat'
                          ");
                      } else {
                          // Nomor urut global
                          $q_urut = mysqli_query($connect, "
                              SELECT MAX(nomor_urut) AS max_urut 
                              FROM nomor_surat 
                              WHERE tahun = '$tahun'
                          ");
                      }

                     $r_urut = mysqli_fetch_assoc($q_urut);
                    $no_urut_otomatis = ($r_urut && $r_urut['max_urut']) ? $r_urut['max_urut'] + 1 : 1;

                    // Gunakan input manual jika ada, jika tidak pakai otomatis
                    $no_urut = isset($_POST['no_urut_manual']) && is_numeric($_POST['no_urut_manual'])
                        ? (int) $_POST['no_urut_manual']
                        : $no_urut_otomatis;


                      // Ambil kode desa terakhir
                      $q_desa = mysqli_query($connect, "SELECT kode_desa FROM nomor_surat ORDER BY id DESC LIMIT 1");
                      $r_desa = mysqli_fetch_assoc($q_desa);
                      $kode_desa = $_POST['kode_desa'] ?? ($r_desa['kode_desa'] ?? 'KODE-DS');

                        // Nama folder sebagai nama tabel
                      $folder_name = basename(__DIR__);
                      $nama_tabel = $folder_name;
                      // Ambil inisial kode_surat_url dari nama folder (misal: surat_keterangan_domisili → SKD)
                      $folder_parts = explode('_', $folder_name);
                      $kata_dilewati = ['dan', 'atau', 'yang', 'dengan', 'ke', 'di', 'dari', 'untuk'];
                      $kode_surat_url = strtoupper(implode('', array_map(function($word) use ($kata_dilewati) {
                          return in_array(strtolower($word), $kata_dilewati) ? '' : $word[0];
                      }, $folder_parts)));

                     // Buat nomor surat akhir
                      $no_surat = generate_nomor_surat($kode_surat, $kode_surat_url, $kode_desa, $no_urut, $tanggal);

                      ?>

                      <!-- FORM -->
                      <div class="form-horizontal">

                        <div class="form-group">
                          <label class="col-sm-2 control-label">No. Urut</label>
                          <div class="col-sm-4">
                            <input type="number" name="no_urut_manual" class="form-control" value="<?= $no_urut ?>" required>
                          </div>
                          <label class="col-sm-2 control-label">Kode Surat</label>
                          <div class="col-sm-4">
                            <input type="text" name="kode_surat" class="form-control" value="<?= htmlspecialchars($kode_surat) ?>" required>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">No. Surat</label>
                          <div class="col-sm-4">
                            <input type="text" name="fno_surat" class="form-control" value="<?= htmlspecialchars($no_surat) ?>" readonly>
                          </div>
                          <label class="col-sm-2 control-label">Kode Desa / Kel</label>
                          <div class="col-sm-4">
                            <input type="text" name="kode_desa" class="form-control" value="<?= htmlspecialchars($kode_desa) ?>" required>
                          </div>
                        </div>

                      </div>

                     <script>
                      function updateNomorSuratLive() {
                        const kodeSurat = document.querySelector('[name="kode_surat"]').value.trim().toUpperCase();
                        const kodeDesa = document.querySelector('[name="kode_desa"]').value.trim().toUpperCase();
                        const tanggal = new Date();
                        const bulan = String(tanggal.getMonth() + 1).padStart(2, '0');
                        const tahun = tanggal.getFullYear();

                        if (kodeSurat && kodeDesa) {
                          // Ambil nomor urut dari server via AJAX
                          fetch(`../helper/get_no_urut.php?kode_surat=${kodeSurat}`)
                            .then(response => response.text())
                            .then(noUrut => {
                              document.querySelector('[name="no_urut_manual"]').value = noUrut;
                              const hasil = `${kodeSurat}/${noUrut}/${kodeDesa}/${bulan}/${tahun}`;
                              document.querySelector('[name="fno_surat"]').value = hasil;
                            });
                        } else {
                          document.querySelector('[name="fno_surat"]').value = '';
                        }
                      }

                      document.addEventListener('DOMContentLoaded', function () {
                        document.querySelector('[name="kode_surat"]').addEventListener('input', updateNomorSuratLive);
                        document.querySelector('[name="kode_desa"]').addEventListener('input', updateNomorSuratLive);
                      });
                      </script>

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
                        <button type="button" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modalFormulir_<?php echo $row[$id_field]; ?>">
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
                      <input type="hidden" name="id" value="<?php echo $row[$id_field]; ?>" class="form-control">
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
<div class="modal fade" id="modalFormulir_<?php echo $row[$id_field]; ?>" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Formulir</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <?php
          // Cek lagi id_skms ini
          $id_surat = $row[$id_field]; // Ambil ID dari hasil join sebelumnya
          $query = mysqli_query($connect, "SELECT * FROM `$nama_tabel` WHERE `$id_field` = '$id_surat'");
          $data = mysqli_fetch_assoc($query);
          if ($data) {
        ?>
          <table class="table">
            <tr><td>Pejabat:</td><td><?php echo $data['pejabat']; ?></td></tr>
            <tr><td>Jabatan:</td><td><?php echo $data['jabatan']; ?></td></tr>
            <tr><td>Dari:</td><td><?php echo $data['dari']; ?></td></tr>
            <tr><td>Ke:</td><td><?php echo $data['ke']; ?></td></tr>
            <tr><td>Selama:</td><td><?php echo $data['selama']; ?></td></tr>
            <tr><td>Rencana Biaya:</td><td>Rp <?php echo number_format($data['rencana_biaya'], 0, ',', '.'); ?></td></tr>
            <tr><td>Tanggal Berangkat:</td><td><?php echo date('d-m-Y', strtotime($data['tgl_berangkat'])); ?></td></tr>
            <tr><td>Tanggal Kembali:</td><td><?php echo date('d-m-Y', strtotime($data['tgl_kembali'])); ?></td></tr>
            <tr><td>Maksud Mengadakan:</td><td><?php echo nl2br($data['maksud_mengadakan']); ?></td></tr>
            <tr><td>Keterangan:</td><td><?php echo nl2br($data['keterangan']); ?></td></tr>
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