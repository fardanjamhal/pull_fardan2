<?php 
  include ('../part/akses.php');
  include ('../../../../../config/koneksi.php');
  include ('../part/header.php');
  include ('../helper/cek_akses_permintaan.php');

  $id = $_GET['id'];
  $qCek = mysqli_query($connect,"SELECT penduduk.*, formulir_permohonan_kehendak_nikah.* FROM penduduk LEFT JOIN formulir_permohonan_kehendak_nikah ON formulir_permohonan_kehendak_nikah.nik = penduduk.nik WHERE formulir_permohonan_kehendak_nikah.id_fpkn='$id'");
  while($row = mysqli_fetch_array($qCek)){
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
                  include('../../../../../config/koneksi.php');
                  include('../helper/nomor_surat.php');

                  // Nama folder sebagai nama tabel
                  $folder_name = 'formulir_pengantar_nikah'; // Pastikan sesuai dengan folder suratnya
                  $nama_tabel = $folder_name;

                  // Ambil nomor terakhir dari jenis surat ini
                  $q_salin = mysqli_query($connect, "
                    SELECT ns.nomor_lengkap, ns.kode_surat, ns.kode_desa, ns.nomor_urut, ns.tahun
                    FROM nomor_surat ns
                    JOIN $nama_tabel s ON s.no_surat = ns.nomor_lengkap
                    WHERE ns.nomor_lengkap IS NOT NULL
                    ORDER BY ns.id DESC
                    LIMIT 1
                  ");

                  $r_salin = ($q_salin && mysqli_num_rows($q_salin) > 0) ? mysqli_fetch_assoc($q_salin) : [];

                  // Siapkan nilai default jika kosong
                  $kode_surat = $_POST['kode_surat'] ?? ($r_salin['kode_surat'] ?? 'XXX');
                  $kode_desa  = $_POST['kode_desa']  ?? ($r_salin['kode_desa']  ?? 'KODE-DS');
                  $no_urut    = isset($_POST['no_urut_manual']) && is_numeric($_POST['no_urut_manual'])
                                  ? (int) $_POST['no_urut_manual']
                                  : ($r_salin['nomor_urut'] ?? 1);
                  $tahun      = $r_salin['tahun'] ?? date('Y');
                  $tanggal    = isset($row['tanggal_surat']) ? $row['tanggal_surat'] : date('Y-m-d');

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
                        <button type="button" class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modalFormulir_<?php echo $row['id_fpkn']; ?>">
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
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="box-body">
                    <div>
                      <input type="hidden" name="id" value="<?php echo $row['id_fpkn']; ?>" class="form-control">
                    </div>
                  </div>
                </div>
                  <div class="box-body pull-right">
                    <input type="submit" name="submit" class="btn btn-success" value="Konfirmasi">
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
<div class="modal fade" id="modalFormulir_<?php echo $row['id_fpkn']; ?>" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Formulir</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <?php
          // Cek lagi id_fpkn ini
          $id_fpkn = $row['id_fpkn'];
          $query = mysqli_query($connect, "SELECT * FROM formulir_permohonan_kehendak_nikah WHERE id_fpkn = '$id_fpkn'");
          $data = mysqli_fetch_assoc($query);

          if ($data) {
        ?>
          <table class="table table-bordered" style="width: 100%;">
            <tr><td style="width: 30%; font-weight: 500;">Tempat Akad Nikah </td><td><?php echo $data['tempat_akad']; ?></td></tr>
            <tr><td>Calon Suami </td><td><?php echo $data['calon_suami']; ?></td></tr>
            <tr><td>Calon Istri </td><td><?php echo $data['calon_istri']; ?></td></tr>
            <tr><td>Hari dan Tanggal Nikah </td><td><?php echo $data['hari_tanggal']; ?></td></tr>
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