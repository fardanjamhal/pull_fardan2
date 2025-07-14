<?php
error_reporting(E_ALL); // Tampilkan semua error PHP
ini_set('display_errors', 1); // Tampilkan error di browser

  include ('../../config/koneksi.php');
  include ('../part/akses.php');
  include ('../part/header.php');

  // Variabel untuk Pagination
  $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10; // Jumlah data per halaman, default 10
  $page = isset($_GET['page']) ? intval($_GET['page']) : 1;   // Halaman saat ini, default 1
  $offset = ($page - 1) * $limit; // Offset untuk query SQL

  // Membangun URL dasar untuk pagination dan filter
  $base_url = 'index.php';
  $query_params = array();
  // Pastikan parameter tidak kosong sebelum ditambahkan ke query_params
  if (isset($_GET['filter']) && !empty($_GET['filter'])) {
      $query_params['filter'] = $_GET['filter'];
      if ($_GET['filter'] == '2' && isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
          $query_params['tanggal'] = $_GET['tanggal'];
      } else if ($_GET['filter'] == '3' && isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '') {
          $query_params['bulan'] = $_GET['bulan'];
          $query_params['tahun'] = $_GET['tahun'];
      } else if ($_GET['filter'] == '4' && isset($_GET['tahun']) && $_GET['tahun'] != '') {
          $query_params['tahun'] = $_GET['tahun'];
      }
  }

  // Construct the base URL for pagination links, ensuring it starts with '?' if parameters exist
  $pagination_base_url = $base_url;
  $existing_params_string = http_build_query($query_params);

  if (!empty($existing_params_string)) {
      $pagination_base_url .= '?' . $existing_params_string;
  }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
  $(window).load(function(){
    $("#ktp").change(function() {
      console.log($("#ktp option:selected").val());
      if ($("#ktp option:selected").val() == 'Tidak Ada') {
        $('#no_ktp').prop('hidden', 'true');
      } else {
        $('#no_ktp').prop('hidden', false);
      }
    });

    // JavaScript untuk menyembunyikan/menampilkan form filter berdasarkan pilihan
    $('#filter').change(function(){
      if($(this).val() == '2'){ // Per Tanggal
        $('#form-tanggal').prop('hidden', false);
        $('#form-bulan').prop('hidden', true);
        $('#form-tahun').prop('hidden', true);
      } else if($(this).val() == '3'){ // Per Bulan
        $('#form-tanggal').prop('hidden', true);
        $('#form-bulan').prop('hidden', false);
        $('#form-tahun').prop('hidden', false);
      } else if($(this).val() == '4'){ // Per Tahun
        $('#form-tanggal').prop('hidden', true);
        $('#form-bulan').prop('hidden', true);
        $('#form-tahun').prop('hidden', false);
      } else { // Semua Waktu (default)
        $('#form-tanggal').prop('hidden', true);
        $('#form-bulan').prop('hidden', true);
        $('#form-tahun').prop('hidden', true);
      }
    }).change(); // Panggil .change() saat halaman dimuat untuk inisialisasi
  });
</script>

<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
            echo '<img src="../../assets/img/ava-admin-female.png" class="img-circle" alt="User Image">';
          }else if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Kepala Desa')){
            echo '<img src="../../assets/img/ava-kades.png" class="img-circle" alt="User Image">';
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
        <a href="../dashboard/">
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../profil_desa/">
          <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
        </a>
      </li>
      <li>
   			<a href="../data_kades_kel/">
     			<i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
   			</a>
   		</li>
      <li>
        <a href="../penduduk/">
          <i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span>
        </a>
      </li>
      <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
      <li>
        <a href="../surat/permintaan_surat/">
          <i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>
      <li>
        <a href="../surat/surat_selesai/">
          <i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span>
        </a>
      </li>
      <?php
        }else{

        }
      ?>
      <li class="active">
        <a href="#"><i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span></a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <?php
      $title_suffix = '';
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
      $nama_bulan_arr = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

      if(isset($_GET['filter']) && ! empty($_GET['filter'])){
        $filter = $_GET['filter'];
        if($filter == '2' && isset($_GET['tanggal']) && $_GET['tanggal'] != ''){
          $tgl_lhr = date($_GET['tanggal']);
          $tgl = date('d ', strtotime($tgl_lhr));
          $bln = date('F', strtotime($tgl_lhr));
          $thn = date(' Y', strtotime($tgl_lhr));
          $title_suffix = ' (Tanggal '.$tgl . $blnIndo[$bln] . $thn.')';
        }else if($filter == '3' && isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != ''){
          $title_suffix = ' (Bulan '.$nama_bulan_arr[$_GET['bulan']].' '.$_GET['tahun'].')';
        }else if($filter == '4' && isset($_GET['tahun']) && $_GET['tahun'] != ''){
          $title_suffix = ' (Tahun '.$_GET['tahun'].')';
        }
      }
      echo '<h1>Laporan Surat Administrasi Desa - Surat Keluar'.$title_suffix.'</h1>';
    ?>
    <h1></h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Laporan</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <div class="col-md-12">
        <div class="col-md-9">
          <?php
            // Cetak Laporan Button
            $cetak_href = 'cetak-laporan.php';
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){
              $filter = $_GET['filter'];
              if($filter == '2' && isset($_GET['tanggal']) && $_GET['tanggal'] != ''){
                $cetak_href .= '?filter=2&tanggal='.$_GET['tanggal'];
              }else if($filter == '3' && isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != ''){
                $cetak_href .= '?filter=3&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'];
              }else if($filter == '4' && isset($_GET['tahun']) && $_GET['tahun'] != ''){
                $cetak_href .= '?filter=4&tahun='.$_GET['tahun'];
              }
            }
            echo '<a name="cetak" target="output" class="btn btn-primary btn-md" href="'.$cetak_href.'"><i class="fas fa-print"></i> Cetak Laporan</a>';
          ?>
        </div>
        <div class="col-md-3" align="right">
          <a name="filter" target="output" class="btn btn-primary btn-md" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-filter"></i> Filter</a>
          <a href="../laporan/" name="filter" class="btn btn-danger btn-md"><i class="fas fa-eraser"></i> Reset Filter</a>
        </div><br>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="get" action="">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Filter Berdasarkan</label>
                    <select class="form-control" name="filter" id="filter">
                      <option value="1" <?php echo (isset($_GET['filter']) && $_GET['filter'] == '1') ? 'selected' : ''; ?>>Semua Waktu</option>
                      <option value="2" <?php echo (isset($_GET['filter']) && $_GET['filter'] == '2') ? 'selected' : ''; ?>>Per Tanggal</option>
                      <option value="3" <?php echo (isset($_GET['filter']) && $_GET['filter'] == '3') ? 'selected' : ''; ?>>Per Bulan</option>
                      <option value="4" <?php echo (isset($_GET['filter']) && $_GET['filter'] == '4') ? 'selected' : ''; ?>>Per Tahun</option>
                    </select>
                  </div>
                  <div class="form-group" id="form-tanggal">
                    <label>Tanggal</label><br>
                    <input class="form-control" type="date" name="tanggal" value="<?php echo isset($_GET['tanggal']) ? $_GET['tanggal'] : ''; ?>">
                  </div>
                  <div class="form-group" id="form-bulan">
                    <label>Bulan</label><br>
                    <select class="form-control" name="bulan">
                      <option value="">Pilih</option>
                      <?php
                        // $nama_bulan_arr sudah didefinisikan di atas
                        for ($i=1; $i <= 12; $i++) {
                          $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $i) ? 'selected' : '';
                          echo '<option value="'.$i.'" '.$selected.'>'.$nama_bulan_arr[$i].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group" id="form-tahun">
                    <label>Tahun</label><br>
                    <select class="form-control" name="tahun">
                      <option value="">Pilih</option>

                      <?php
                        // Ambil tahun dari semua tabel surat kemudian UNION dan DISTINCT
                        // Ambil semua nama tabel dari database
                        $query = mysqli_query($connect, "SHOW TABLES"); // Ganti $conn → $connect
                        $daftar_tabel_surat_filter = [];

                        while ($row = mysqli_fetch_row($query)) {
                            $nama_tabel = $row[0];

                            // Cek apakah nama tabel diawali dengan 'surat_' atau 'formulir_'
                            if (strpos($nama_tabel, 'surat_') === 0 || strpos($nama_tabel, 'formulir_') === 0) {
                                $daftar_tabel_surat_filter[] = $nama_tabel;
                            }
                        }

                        // Debug: tampilkan isi array jika perlu
                        // print_r($daftar_tabel_surat_filter);

                        $query_tahun_parts = [];
                        foreach ($daftar_tabel_surat_filter as $tabel_for_year) {
                            $query_tahun_parts[] = "(SELECT YEAR(tanggal_surat) AS tahun FROM $tabel_for_year WHERE status_surat = 'selesai')";
                        }
                        $query_tahun = "SELECT DISTINCT tahun FROM (" . implode(" UNION ", $query_tahun_parts) . ") AS all_years ORDER BY tahun DESC";

                        $sql_tahun = mysqli_query($connect, $query_tahun);
                        if (!$sql_tahun) {
                            die('Error mengambil tahun: ' . mysqli_error($connect));
                        }
                        while($data_tahun = mysqli_fetch_array($sql_tahun)){
                          $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $data_tahun['tahun']) ? 'selected' : '';
                          echo '<option value="'.$data_tahun['tahun'].'" '.$selected.'>'.$data_tahun['tahun'].'</option>';
                        }
                      ?>
                      
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
              </form>
            </div>
          </div>
        </div><br>
          <form class="form-inline d-inline" method="get" action="<?php echo $base_url; ?>">
          <?php foreach ($query_params as $key => $value): ?>
            <input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
          <?php endforeach; ?>
          <label for="limit">Tampilkan:</label>
          <select name="limit" id="limit" class="form-control ms-2 me-1" onchange="this.form.submit()">
            <option value="10" <?php echo ($limit == 10) ? 'selected' : ''; ?>>10</option>
            <option value="20" <?php echo ($limit == 20) ? 'selected' : ''; ?>>20</option>
            <option value="50" <?php echo ($limit == 50) ? 'selected' : ''; ?>>50</option>
            <option value="100" <?php echo ($limit == 100) ? 'selected' : ''; ?>>100</option>
          </select>
          data per halaman
        </form>

       <?php
          // Daftar nama tabel surat
          // Pastikan nama tabel ini sesuai dengan yang ada di database Anda
         $daftar_tabel_surat = [];

          $query = mysqli_query($connect, "SHOW TABLES");
          if (!$query) {
              die("Query gagal: " . mysqli_error($connect));
          }

          while ($row = mysqli_fetch_row($query)) {
              $nama_tabel = $row[0];

              // Tambahkan ke daftar jika nama tabel diawali dengan 'surat_' atau 'formulir_'
              if (strpos($nama_tabel, 'surat_') === 0 || strpos($nama_tabel, 'formulir_') === 0) {
                  $daftar_tabel_surat[] = $nama_tabel;
              }
          }

          // Contoh penggunaan (sementara):
          // print_r($daftar_tabel_surat);

          // Array untuk menyimpan bagian UNION query
          $union_parts_select = [];
          // Array untuk menyimpan kondisi WHERE untuk filter tanggal di dalam setiap UNION part
          $union_where_clause = "";

          // Tambahkan filter jika ada, filter ini akan diterapkan ke setiap UNION part
          if (isset($_GET['filter']) && !empty($_GET['filter'])) {
            $filter = $_GET['filter'];
            if ($filter == '2' && isset($_GET['tanggal']) && $_GET['tanggal'] != '') {
              $union_where_clause = " AND DATE(tanggal_surat) = '{$_GET['tanggal']}'";
            } elseif ($filter == '3' && isset($_GET['bulan']) && $_GET['bulan'] != '' && isset($_GET['tahun']) && $_GET['tahun'] != '') {
              $union_where_clause = " AND MONTH(tanggal_surat) = '{$_GET['bulan']}' AND YEAR(tanggal_surat) = '{$_GET['tahun']}'";
            } elseif ($filter == '4' && isset($_GET['tahun']) && $_GET['tahun'] != '') {
              $union_where_clause = " AND YEAR(tanggal_surat) = '{$_GET['tahun']}'";
            }
          }

          foreach ($daftar_tabel_surat as $tabel) {
            // Menggunakan DISTINCT di dalam setiap subquery UNION untuk memastikan keunikan setiap baris dari sumbernya
            $union_parts_select[] = "
              SELECT DISTINCT nik, no_surat, tanggal_surat, jenis_surat
              FROM $tabel
              WHERE status_surat = 'selesai' " . $union_where_clause . "
            ";
          }

          $union_subquery_sql = implode(" UNION ALL ", $union_parts_select);

          // Query utama menggabungkan hasil UNION dengan tabel arsip_surat untuk mendapatkan detail penduduk
          // Penting: Ganti 'arsip_surat' dengan 'penduduk' jika informasi nama/alamat ada di tabel penduduk
          $main_query_base = "
            SELECT
              t_union.nik,
              t_union.no_surat,
              t_union.tanggal_surat,
              t_union.jenis_surat,
              arsip_surat.nama,
              arsip_surat.dusun,
              arsip_surat.rt,
              arsip_surat.rw
            FROM
              ($union_subquery_sql) AS t_union
            LEFT JOIN
              arsip_surat ON t_union.nik = arsip_surat.nik
            WHERE arsip_surat.nama IS NOT NULL -- Pastikan hanya data yang memiliki nama (join berhasil)
          ";

          // Hitung total record
          // Query untuk menghitung total records harus dijalankan pada keseluruhan hasil yang sudah difilter
          // Perbaikan: Menambahkan jenis_surat ke COUNT(DISTINCT) agar hitungan lebih akurat jika no_surat bisa sama antar jenis surat
          $total_records_query = "SELECT COUNT(*) AS total FROM (SELECT DISTINCT no_surat, jenis_surat FROM ($main_query_base) AS temp_final_results) AS final_distinct_results";
          $total_records_result = mysqli_query($connect, $total_records_query);
          if (!$total_records_result) {
              die('Error menghitung total records: ' . mysqli_error($connect) . '<br>Query: ' . $total_records_query);
          }
          $total_records_row = mysqli_fetch_assoc($total_records_result);
          $total_records = $total_records_row['total'];
          $total_pages = ceil($total_records / $limit);
          ?>



       <style>
    /* Gunakan font Arial dan perkecil tinggi baris */
    table#data-table {
      font-family: Arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    /* Ukuran teks dan tinggi sel */
    table#data-table th,
    table#data-table td {
      font-size: 14px;
      padding: 11px 10px;
      vertical-align: middle;
      border: 1px solid #ccc;
    }

    /* Warna selang-seling baris */
    table#data-table tbody tr:nth-child(odd) {
      background-color: #f9f9f9; /* abu terang */
    }

    table#data-table tbody tr:nth-child(even) {
      background-color: #eef5ff; /* biru sangat muda */
    }

      /* Judul kolom di tengah dan tinggi lebih besar */
    table#data-table thead th {
      text-align: center;
      padding: 12px 10px; /* Tambahkan tinggi */
      background-color: #007acc; /* Biru profesional */
      color: white;
      font-weight: bold;
      border: 1px solid #005fa3;
    }

    /* Scroll horizontal jika diperlukan di HP */
    .table-responsive {
      overflow-x: auto;
      max-width: 100%;
    }

    /* Rata tengah kolom tertentu */
    table#data-table td:nth-child(1),  /* No. */
    table#data-table td:nth-child(3),  /* Tanggal */
    table#data-table td:nth-child(6)   /* Alamat */
    {
      text-align: center;
    }
  </style>


<br>
<div class="table-responsive">
  <table id="data-table">
    <thead>
      <tr>
        <th>No.</th>
        <th>No. Surat</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Jenis Surat</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = $main_query_base . " GROUP BY t_union.no_surat, t_union.jenis_surat ORDER BY t_union.tanggal_surat DESC LIMIT $offset, $limit";
        $sql = mysqli_query($connect, $query);

        if (!$sql) {
          die('Query Error: ' . mysqli_error($connect) . '<br>Query: ' . $query);
        }

        if (mysqli_num_rows($sql) > 0) {
          $no = $offset + 1;
          while ($data = mysqli_fetch_array($sql)) {
            $tgl_surat = date($data['tanggal_surat']);
            $tgl = date('d ', strtotime($tgl_surat));
            $bln = date('F', strtotime($tgl_surat));
            $thn = date(' Y', strtotime($tgl_surat));
      ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $data['no_surat']; ?></td>
          <td><?php echo $tgl . $blnIndo[$bln] . $thn; ?></td>
          <td><?php echo $data['nama']; ?></td>
          <td><?php echo $data['jenis_surat']; ?></td>
          <td>
            <?php
                include_once '../../config/koneksi.php'; // sesuaikan path

                $output = [];

                // Tentukan tipe wilayah dari profil_desa
                $tipeWilayah = 'Desa'; // default
                $qProfil = mysqli_query($connect, "SELECT nama_desa FROM profil_desa LIMIT 1");
                if ($profil = mysqli_fetch_assoc($qProfil)) {
                    if (stripos($profil['nama_desa'], 'kelurahan') !== false) {
                        $tipeWilayah = 'Kelurahan';
                    }
                }

                // Dusun atau Lingkungan
                if (!empty($data['dusun'])) {
                    $labelDusun = ($tipeWilayah === 'Kelurahan') ? 'Lingkungan' : 'Dusun';
                    $namaDusun = ucwords(strtolower($data['dusun']));
                    $namaDusunLower = strtolower($namaDusun);

                    if (!preg_match('/\b(dusun|lingk\.|lingkungan)\b/i', $namaDusunLower)) {
                        $output[] = "$labelDusun $namaDusun";
                    } else {
                        $output[] = $namaDusun;
                    }
                }

                // RT/RW dengan default '000' dan 3 digit
                $rt_raw = trim($data['rt'] ?? '');
                $rw_raw = trim($data['rw'] ?? '');

                $rt_valid = (ctype_digit($rt_raw) && $rt_raw !== '') ? str_pad($rt_raw, 3, '0', STR_PAD_LEFT) : null;
                $rw_valid = (ctype_digit($rw_raw) && $rw_raw !== '') ? str_pad($rw_raw, 3, '0', STR_PAD_LEFT) : null;

                if ($rt_valid !== null || $rw_valid !== null) {
                    $rt_display = $rt_valid ?? '000';
                    $rw_display = $rw_valid ?? '000';
                    $output[] = "RT $rt_display / RW $rw_display";
                }

                // Gabungkan dan tampilkan
                echo implode(' ', $output);
                ?>
          </td>
        </tr>
      <?php
          }
        } else {
          echo '<tr><td colspan="6" class="text-center">Tidak ada data laporan.</td></tr>';
        }
      ?>
    </tbody>
  </table>
  <br><br>
</div>

<script>
  $(document).ready(function() {
    $('#data-table').DataTable({
      paging: false,        //❌ Aktifkan pagination
      info: false,         // ❌ Hilangkan "Showing 1 to 10 of 10 entries"
      searching: false,    // ❌ Hilangkan kolom Search
      lengthChange: false  // ❌ Hilangkan dropdown "Show xx entries"
    });
  });
</script>



       <div class="row align-items-center mb-3">
          <div class="col-md-4">
            <p class="mb-0">Menampilkan <?php echo min($limit, mysqli_num_rows($sql)); ?> dari <?php echo $total_records; ?> data.</p>
          </div>

          <div class="col-md-4 text-center">
            <ul class="pagination justify-content-center mb-0">
              <?php
              $max_pages_to_show = 10;
              $first_param_char = strpos($pagination_base_url, '?') === false ? '?' : '&';

              $start_page = floor(($page - 1) / $max_pages_to_show) * $max_pages_to_show + 1;
              $end_page = min($start_page + $max_pages_to_show - 1, $total_pages);

              // Tombol « (kembali ke halaman pertama dalam blok sebelumnya)
              if ($start_page > 1) {
                echo '<li class="page-item"><a class="page-link" href="' . $pagination_base_url . $first_param_char . 'page=' . max(1, $start_page - $max_pages_to_show) . '&limit=' . $limit . '">&laquo;</a></li>';
              }

              // Nomor halaman
              for ($i = $start_page; $i <= $end_page; $i++) {
                $active = ($i == $page) ? 'active' : '';
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $pagination_base_url . $first_param_char . 'page=' . $i . '&limit=' . $limit . '">' . $i . '</a></li>';
              }

              // Tombol » (ke halaman selanjutnya dalam blok berikutnya)
              if ($end_page < $total_pages) {
                echo '<li class="page-item"><a class="page-link" href="' . $pagination_base_url . $first_param_char . 'page=' . ($start_page + $max_pages_to_show) . '&limit=' . $limit . '">&raquo;</a></li>';
              }
              ?>
            </ul>
          </div>

        </div>


        </div>
    </div>
  </section>
</div>
<?php include ('../part/footer.php');?>