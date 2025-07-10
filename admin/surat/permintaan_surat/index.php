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
    <?php
        $current_path = basename(dirname($_SERVER['PHP_SELF'])); // folder aktif
        ?>

        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          
          <li class="<?= ($current_path == 'dashboard') ? 'active' : '' ?>">
            <a href="../../dashboard/">
              <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'profil_desa') ? 'active' : '' ?>">
            <a href="../../profil_desa/">
              <i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'data_kades_kel') ? 'active' : '' ?>">
            <a href="../../data_kades_kel/">
              <i class="fa fa-user"></i> <span>&nbsp;Data Kades / Kelurahan</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'penduduk') ? 'active' : '' ?>">
            <a href="../../penduduk/">
              <i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'permintaan_surat') ? 'active' : '' ?>">
            <a href="../../surat/permintaan_surat/">
              <i class="fa fa-file-alt"></i> <span>&nbsp;Permintaan Surat</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'surat_selesai') ? 'active' : '' ?>">
            <a href="../../surat/surat_selesai/">
              <i class="fa fa-check-circle"></i> <span>&nbsp;Surat Selesai</span>
            </a>
          </li>

          <li class="<?= ($current_path == 'laporan') ? 'active' : '' ?>">
            <a href="../../laporan/">
              <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
            </a>
          </li>
        </ul>
  </section>
</aside>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Permintaan Surat</h1>
    
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

      <style>
        /* Gunakan font Arial dan perkecil tinggi baris */
        table#data-table {
          font-family: Arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        /* Tambahan khusus untuk perataan tengah kolom tertentu */
        #data-table td:nth-child(1),  /* Nomor */
        #data-table td:nth-child(2),  /* id arsip */
        #data-table td:nth-child(3),  /* NIK */
        #data-table td:nth-child(4),  /* NIK */
        #data-table td:nth-child(7),
        #data-table td:nth-child(8) { /* Aksi */
          text-align: center;
        }

        /* Ukuran teks dan tinggi sel */
        table#data-table th,
        table#data-table td {
          font-size: 14px;
          padding: 6px 10px;
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
              <th><strong>No.</strong></th> 
              <th><strong>ID Pengajuan</strong></th>
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

            $jenisSurat = [];
            $query = mysqli_query($connect, "SHOW TABLES");
            if (!$query) {
                die("Query gagal: " . mysqli_error($connect));
            }

            while ($row = mysqli_fetch_row($query)) {
                $nama_tabel = $row[0];

                // Ambil tabel yang diawali dengan surat_ atau formulir_
                if (strpos($nama_tabel, 'surat_') === 0 || strpos($nama_tabel, 'formulir_') === 0) {
                    // Pisahkan dengan underscore dan ambil huruf depan
                    $parts = explode('_', $nama_tabel);
                    $inisial = '';

                    foreach ($parts as $p) {
                        $inisial .= substr($p, 0, 1);
                    }

                    // Hasilkan id, contoh: 'id_skp', 'id_sku'
                    $id_field = 'id_' . strtolower($inisial);
                    $jenisSurat[$nama_tabel] = $id_field;
                }
            }

            // Tampilkan hasil untuk cek
            // echo "<pre>"; print_r($jenisSurat); echo "</pre>";

              $unionParts = [];
              foreach ($jenisSurat as $table => $idField) {
                  $unionParts[] = "SELECT penduduk.nama, {$table}.{$idField} AS id_surat, {$table}.no_surat, {$table}.nik, {$table}.jenis_surat, {$table}.status_surat, {$table}.id_arsip, {$table}.tanggal_surat
                                  FROM penduduk
                                  LEFT JOIN {$table} ON {$table}.nik = penduduk.nik
                                  WHERE {$table}.status_surat='pending'";
                }


              $query = implode(" UNION ", $unionParts) . " ORDER BY tanggal_surat DESC";
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
                    <td>{$no}.</td> 
                    <td>{$row['id_arsip']}</td>
                    <td>{$tanggal}</td>
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
              } else {
                      echo "<tr>
                        <td colspan='7' style='text-align: center; color: #999; padding: 30px;'>
                          <i class='fa fa-inbox' style='font-size: 24px; color: #ccc;'></i><br>
                          <span style='font-size: 16px; font-style: italic;'>📭 Permintaan surat saat ini kosong</span>
                        </td>
                      </tr>";
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