<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include ('../part/sidebar.php');
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

<style>
#toast-salin {
  visibility: hidden;
  min-width: 250px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 8px;
  padding: 12px 20px;
  position: fixed;
  z-index: 9999;
  left: 50%;
  bottom: 40px;
  transform: translateX(-50%);
  font-size: 14px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.3);
  opacity: 0;
  transition: opacity 0.3s ease, bottom 0.3s ease;
}

#toast-salin.show {
  visibility: visible;
  opacity: 1;
  bottom: 60px;
}
</style>

<style>
  .btn-toggle-surat {
  margin-top: 5px;
  padding: 5px 10px;
  background-color: #0d6efd;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
}

.btn-surat {
  display: block;
  width: 100%;
  margin: 3px 0;
  padding: 6px 12px;
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
  border-radius: 6px;
  cursor: pointer;
  text-align: left;
  font-weight: 500;
  transition: background-color 0.2s ease;
}

.btn-surat:hover {
  background-color: #e2e6ea;
}
</style>

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

        /* Kolom No, NIK, Jenis Kelamin, Agama rata tengah */
        table#data-table td:nth-child(1),  /* No */
        table#data-table td:nth-child(2),  /* NIK */
        table#data-table td:nth-child(5),  /* Jenis Kelamin */
        table#data-table td:nth-child(6),
        table#data-table td:nth-child(8) { /* Agama */
          text-align: center;
        }

        /* Kurangi lebar kolom NIK */
        table#data-table td:nth-child(2) {
          min-width: 160px;
          max-width: 200px;
        }

        /* Scroll horizontal jika diperlukan di HP */
        .table-responsive {
          overflow-x: auto;
          max-width: 100%;
        }
      </style>

  
        <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
        <table class="table table-striped table-bordered" id="data-table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th><strong>No</strong></th>
              <th><strong>NIK</strong></th>
              <th><strong>Nama</strong></th>
              <th><strong>Tempat / Tgl Lahir</strong></th>
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
              $qTampil = mysqli_query($connect, "SELECT * FROM penduduk ORDER BY nama ASC");
              foreach($qTampil as $row){
                $tanggal = $row['tgl_lahir'];
            ?>
            <tr>
              <td><?php echo $no++; ?></td>

                
               <td>
                <?php echo $row['nik']; ?>
                <button onclick="salinTeks('<?php echo $row['nik']; ?>')" title="Salin NIK" style="margin-left: 5px;">📋</button>

                <!-- Tombol Buat Surat -->
                <!-- Tombol Buat Surat (Memicu Modal) -->
              <button type="button" class="btn btn-primary btn-sm" style="font-size:14px;" data-toggle="modal" data-target="#modalSurat_<?php echo $row['nik']; ?>">
                Buat Surat
              </button>

              <!-- Modal -->
              <div class="modal fade" id="modalSurat_<?php echo $row['nik']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalSuratLabel_<?php echo $row['nik']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalSuratLabel_<?php echo $row['nik']; ?>">Pilih Jenis Surat</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>


                    <div class="modal-body">
                    <div class="list-group">
                      <?php
                      $nik = $row['nik'];

                      // Ambil semua folder dari folder ../../surat/
                      $surat_dir = '../../surat';
                      $surat_urls = [];

                      $folders = scandir($surat_dir);
                      foreach ($folders as $folder) {
                        if (
                          $folder != '.' &&
                          $folder != '..' &&
                          is_dir("$surat_dir/$folder") &&
                          (strpos($folder, 'surat_') === 0 || strpos($folder, 'formulir_') === 0)
                        ) {
                          $surat_urls[] = $folder;
                        }
                      }

                      // Urutkan alfabetis
                      sort($surat_urls);
                      $noSurat = 1;

                      // Tampilkan daftar tombol surat
                      foreach ($surat_urls as $surat) {
                          $label = ucwords(str_replace('_', ' ', $surat));
                          echo '
                            <form action="../../surat/' . $surat . '/info-surat.php" method="post" class="mb-2">
                              <input type="hidden" name="fnik" value="' . htmlspecialchars($nik) . '">
                              <button type="submit" class="list-group-item list-group-item-action d-flex align-items-start">
                                <span class="me-2 fw-bold" style="min-width: 25px;">' . $noSurat++ . '.</span>
                                <span>' . $label . '</span>
                              </button>
                            </form>
                          ';
                      }
                      ?>

                    </div>
                  </div>

                  </div>
                </div>
              </div>


              </td>


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
              <td style="text-transform: capitalize;"><?php echo trim($row['jalan'] . ' ' . $row['dusun']); ?></td>

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
            

            <script>
            function tampilkanPilihanSurat(nik) {
              const div = document.getElementById('pilihan-' + nik);
              if (div.style.display === 'none') {
                div.style.display = 'block';
              } else {
                div.style.display = 'none';
              }
            }
            </script>


          </tbody>
        </table>
        </div>

        

      </div>
    </div>
  </section>
</div>


<?php 
  include ('../part/footer.php');
?>