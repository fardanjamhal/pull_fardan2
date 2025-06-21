<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include('../part/sidebar.php');
?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Profil Desa</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Profil Desa</li>
    </ol>
  </section>
  <section class="content">

  <?php if (isset($_SESSION['success'])): ?>
  <div style="padding:10px; background-color:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:4px; margin-bottom:10px;">
    <?php 
      echo $_SESSION['success']; 
      unset($_SESSION['success']); 
    ?>
  </div>
  <?php endif; ?>

  <?php if (isset($_SESSION['error'])): ?>
    <div style="padding:10px; background-color:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:4px; margin-bottom:10px;">
      <?php 
        echo $_SESSION['error']; 
        unset($_SESSION['error']); 
      ?>
    </div>
  <?php endif; ?>


  <?php
  include ('../../config/koneksi.php');

  // Perhatikan di sini pakai $connect, bukan $koneksi
  $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
  $data = mysqli_fetch_assoc($query);
  ?>



  <!-- Tambahkan di <body> -->
      <div class="tombol-hp">
        <a href="../dashboard/">
          <div>
            Kembali Ke Menu
          </div>
        </a>
      </div>

    <style>
      body, html {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      .form-center-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        padding: 20px;
        background-color: #f0f2f5;
      }

      .form-container {
        width: 100%;
        max-width: 600px;
        background: #fff;
        padding: 30px 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      }

      .form-group {
        margin-bottom: 16px;
      }

      .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #333;
      }

      .form-group input[type="text"] {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s;
      }

      .form-group input[type="text"]:focus {
        border-color: #007bff;
        outline: none;
      }

      .btn-simpan {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
      }

      .btn-simpan:hover {
        background-color: #0056b3;
      }
    </style>

  <div class="form-center-wrapper">
    <div class="form-container">
      <p>Petunjuk : beri tanda * (bintang) untuk buat baris baru pada alamat</p>
      <form action="update_profil_desa.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_profil_desa" value="<?php echo $data['id_profil_desa']; ?>">

        <div class="form-group">
          <label>Nama Desa</label>
          <input type="text" name="nama_desa" value="<?php echo $data['nama_desa']; ?>">
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>">
        </div>

        <div class="form-group">
          <label>No Telepon</label>
          <input type="text" name="no_telpon" value="<?php echo $data['no_telpon']; ?>">
        </div>

        <div class="form-group">
          <label>Kecamatan</label>
          <input type="text" name="kecamatan" value="<?php echo $data['kecamatan']; ?>">
        </div>

        <div class="form-group">
          <label>Kota</label>
          <input type="text" name="kota" value="<?php echo $data['kota']; ?>">
        </div>

        <div class="form-group">
          <label>Provinsi</label>
          <input type="text" name="provinsi" value="<?php echo $data['provinsi']; ?>">
        </div>

        <div class="form-group">
          <label>Kode Pos</label>
          <input type="text" name="kode_pos" value="<?php echo $data['kode_pos']; ?>">
        </div>

        <label>Tanda Tangan Digital</label><br>
        <input type="file" name="ttd_digital"><br><br><br><br>

         <!-- Tampilkan preview jika sudah ada -->
        <?php if (!empty($data['ttd_digital'])): ?>
          <img src="../../assets/img/barcode.png?<?php echo time(); ?>" alt="Barcode Pejabat" style="max-width: 60px; margin-top: -75px">
        <?php endif; ?>

        <br>

        <label>Gambar Kop Surat</label>
        <input type="file" name="gambar_kop"><br>

         <!-- Tampilkan preview jika sudah ada -->
        <?php if (!empty($data['gambar_kop'])): ?>
          <img src="../../assets/img/<?php echo $data['gambar_kop']; ?>" style="height: 75px;"><br><br>
        <?php endif; ?>

        <label>Logo Desa</label><br>
        <input type="file" name="logo_desa"><br>

        <?php if (!empty($data['logo_desa'])): ?>
          <img src="../../assets/img/<?php echo $data['logo_desa']; ?>" style="height: 75px;"><br><br>
        <?php endif; ?>

        <button type="submit" class="btn-simpan">💾 Simpan Perubahan</button>
      </form>
    </div>
  </div>


  
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
  
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>