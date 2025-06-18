<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const nama = this.getAttribute('data-nama');

        Swal.fire({
          title: 'Yakin ingin menghapus?',
          text: 'Data ' + nama + ' akan dihapus secara permanen!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Ya, Hapus!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'hapus-penduduk.php?id=' + id;
          }
        });
      });
    });
  });
</script>


<style>
  .swal-title-lg {
    font-size: 2rem !important; /* Judul lebih besar */
    font-weight: 600;
  }

  .swal-content-lg {
    font-size: 1.5rem !important; /* Isi teks diperbesar */
  }

  .swal-popup-lg {
    padding: 2em !important;
    font-family: 'Segoe UI', sans-serif;
  }

  .swal2-popup {
    font-size: 1.5rem !important; /* Default teks tombol juga membesar */
  }
</style>




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
          <i class="fas fa-tachometer-alt"></i> <span>&nbsp;&nbsp;Dashboard</span>
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
      <li class="active">
        <a href="#"><i class="fa fa-users"></i> <span>&nbsp;Data Penduduk</span></a>
      </li>
      <?php
        if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
      ?>
      <li>
        <a href="../surat/permintaan_surat/">
          <i class="fa fa-file-alt"></i>
          <span>&nbsp;Permintaan Surat</span>
        </a>
      </li>

      <li>
        <a href="../surat/surat_selesai/">
          <i class="fa fa-check-circle"></i>
          <span>&nbsp;Surat Selesai</span>
        </a>
      </li>
      <?php 
        }else{
          
        }
      ?>
      <li>
        <a href="../laporan/">
          <i class="fas fa-chart-line"></i> <span>&nbsp;&nbsp;&nbsp;Laporan</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Penduduk</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Data Penduduk</li>
    </ol>
  </section>
  <section class="content">    



  <!-- pop up hapus data penduduk -->
      <?php
            if (isset($_GET['pesan'])) {
                $nama = isset($_GET['nama']) ? htmlspecialchars(urldecode($_GET['nama'])) : '';
                $nik  = isset($_GET['nik']) ? htmlspecialchars(urldecode($_GET['nik'])) : '';

                echo "<script>";
                switch ($_GET['pesan']) {
                    case 'sukses':
                        echo "
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data penduduk berhasil dihapus.',
                                width: '30em',
                                confirmButtonText: 'Oke',
                                customClass: {
                                    title: 'swal-title-lg',
                                    popup: 'swal-popup-lg',
                                    content: 'swal-content-lg'
                                }
                            });
                            window.history.replaceState(null, null, window.location.pathname);
                        ";
                        break;

                    case 'gagal-relasi':
                        echo "
                            Swal.fire({
                                icon: 'warning',
                                title: 'Tidak Bisa Dihapus',
                                text: 'Data $nama tidak bisa dihapus karena masih digunakan dalam surat lain.',
                                showCancelButton: true,
                                confirmButtonText: 'Lihat Surat Terkait',
                                cancelButtonText: 'Tutup',
                                width: '30em',
                                customClass: {
                                    title: 'swal-title-lg',
                                    popup: 'swal-popup-lg',
                                    content: 'swal-content-lg'
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '../surat/surat_selesai/?jenis_surat=&keyword=" . urlencode($nik) . "&limit=10';
                                }
                            });
                            window.history.replaceState(null, null, window.location.pathname);
                        ";
                        break;

                    case 'gagal-umum':
                        echo "
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                width: '30em',
                                confirmButtonText: 'Tutup',
                                customClass: {
                                    title: 'swal-title-lg',
                                    popup: 'swal-popup-lg',
                                    content: 'swal-content-lg'
                                }
                            });
                            window.history.replaceState(null, null, window.location.pathname);
                        ";
                        break;

                    case 'nik-tidak-ditemukan':
                        echo "
                            Swal.fire({
                                icon: 'error',
                                title: 'NIK Tidak Ditemukan',
                                text: 'Data penduduk dengan NIK tersebut tidak ditemukan.',
                                width: '30em',
                                confirmButtonText: 'Tutup',
                                customClass: {
                                    title: 'swal-title-lg',
                                    popup: 'swal-popup-lg',
                                    content: 'swal-content-lg'
                                }
                            });
                            window.history.replaceState(null, null, window.location.pathname);
                        ";
                        break;

                    case 'id-tidak-valid':
                        echo "
                            Swal.fire({
                                icon: 'error',
                                title: 'ID Tidak Valid',
                                text: 'ID penduduk tidak valid.',
                                width: '30em',
                                confirmButtonText: 'Tutup',
                                customClass: {
                                    title: 'swal-title-lg',
                                    popup: 'swal-popup-lg',
                                    content: 'swal-content-lg'
                                }
                            });
                            window.history.replaceState(null, null, window.location.pathname);
                        ";
                        break;
                }
                echo "</script>";
            }
            ?>

  <!-- pop up hapus data penduduk -->

            <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'edit-sukses'): ?>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Berhasil Diedit',
                  text: 'Data <?= htmlspecialchars($_GET["nama"]) ?> berhasil diperbarui.',
                  confirmButtonColor: '#3085d6'
                });
                window.history.replaceState(null, null, window.location.pathname);
              </script>
            <?php endif; ?>


  <!-- pop up hapus data penduduk -->



  
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
        <a href="../dashboard/">
          <div>
            Kembali Ke Menu
          </div>
        </a>
      </div>
  
    <div class="row" style="overflow-x:auto;">
      <div class="col-md-12">
        <div>
          <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal-menambah"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menambah data. NIK tersebut sudah digunakan.</center></div>";
              }
              if($_GET['pesan']=="gagal-menghapus"){
                echo "<div class='alert alert-danger'><center>Anda tidak bisa menghapus data tersebut.</center></div>";
              }
            }
          ?>
        </div>
        <?php 
          if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
        ?>
        <a class="btn btn-success btn-md" href='tambah-penduduk.php'><i class="fa fa-user-plus"></i> Tambah Data Penduduk</a>
        <a target="_blank" class="btn btn-md" href='export-penduduk.php' style="background-color: #007bff; color: white; border-color: #007bff;"><i class="fas fa-file-export"></i> Export .XLS</a>
       
       <?php
          include('../../config/koneksi.php');
          $dataPenduduk = mysqli_query($connect, "SELECT * FROM penduduk");
          ?>
          <!-- Tombol Hapus -->
        <button id="btnHapusSemua" class="btn btn-danger float-end">
          <i class="fa fa-trash"></i> Hapus Semua
        </button>
        
        <!-- Tabel -->
        <?php if (mysqli_num_rows($dataPenduduk) > 0): ?>
        <?php else: ?>
          <br><br><div class="alert alert-warning mt-3">📭 Data penduduk kosong.</div>
        <?php endif; ?>

        <!-- Script Konfirmasi Hapus -->
        <script>
        document.getElementById('btnHapusSemua').addEventListener('click', function () {
          Swal.fire({
            title: 'Yakin ingin menghapus semua data?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'delete_all.php?hapus=semua';
            }
          });
        });

        // Tampilkan alert sukses jika berhasil hapus
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'berhasil'): ?>
        Swal.fire({
          icon: 'success',
          title: 'Data berhasil dihapus!',
          showConfirmButton: false,
          timer: 2000
        });
        <?php endif; ?>
        </script>


        <?php 
          } else {

          }
        ?>
        <br><br>
        <table class="table table-striped table-bordered table-responsive" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>No</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Tempat/Tgl Lahir</strong></th>
              <th><strong>Jenis Kelamin</strong></th>
              <th><strong>Agama</strong></th>
              <th><strong>Alamat</strong></th>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
              <th><strong>Aksi</strong></th>
              <?php  
                } else {

                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
              include ('../../config/koneksi.php');

              $no = 1;
              $qTampil = mysqli_query($connect, "SELECT * FROM penduduk");
              foreach($qTampil as $row){
                $tanggal = $row['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['nik']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['nama']; ?></td>
              <?php
                $tanggal = date('d', strtotime($row['tgl_lahir']));
                $bulan = date('F', strtotime($row['tgl_lahir']));
                $tahun = date('Y', strtotime($row['tgl_lahir']));
                $bulanIndo = array(
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
              <td style="text-transform: capitalize;"><?php echo $row['tempat_lahir'] . ", " . $tanggal . " " . $bulanIndo[$bulan] . " " . $tahun; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['jenis_kelamin']; ?></td>
              <td style="text-transform: capitalize;"><?php echo $row['agama']; ?></td>
              <td style="text-transform: capitalize;"><?php echo 'Dsn. ', $row['dusun'], ', RT', $row['rt'], '/RW', $row['rw']; ?></td>
              <?php 
                if(isset($_SESSION['lvl']) && ($_SESSION['lvl'] == 'Administrator')){
              ?>
              <td>
                <a class="btn btn-success btn-sm" href='edit-penduduk.php?id=<?php echo $row['id_penduduk']; ?>'><i class="fa fa-edit"></i></a>
                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="<?php echo $row['id_penduduk']; ?>" data-nama="<?php echo htmlspecialchars($row['nama']); ?>">
                  <i class="fa fa-trash"></i>
                </button>

              </td>
              <?php  
                } else {
                  
                }
              ?>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>