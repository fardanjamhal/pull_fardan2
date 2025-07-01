<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include ('../part/sidebar.php');
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
  $query = mysqli_query($connect, "SELECT * FROM pejabat_desa LIMIT 1");
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
      }

      .form-container {
        width: 100%;
        max-width: 600px;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.1);
      }

      .form-group {
        margin-bottom: 18px;
      }

      .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 6px;
        color: #333;
      }

      .form-group input[type="text"],
      .form-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s, box-shadow 0.3s;
        background-color: #fff;
        appearance: none;
      }

      .form-group input[type="text"]:focus,
      .form-group select:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0,123,255,0.2);
        outline: none;
      }

      .btn-simpan {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 14px 20px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s;
      }

      .btn-simpan:hover {
        background-color: #0056b3;
      }
    </style>


    <div class="form-center-wrapper">
    <div class="form-container">
      <form action="update_data_kades_kel.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pejabat_desa" value="<?php echo $data['id_pejabat_desa']; ?>">

        <div class="form-group">
          <label>Nama Kades / Lurah</label>
          <input type="text" name="nama_pejabat_desa" value="<?php echo $data['nama_pejabat_desa']; ?>" required>
        </div>

        <div class="form-group">
          <label>Jabatan</label>
          <select name="jabatan" required>
            <option value="">-- Pilih Jabatan --</option>
            <option value="Lurah" <?= ($data['jabatan'] == 'Lurah') ? 'selected' : '' ?>>Lurah</option>
            <option value="Kepala Desa" <?= ($data['jabatan'] == 'Kepala Desa') ? 'selected' : '' ?>>Kepala Desa</option>
          </select>
        </div>

        <div class="form-group">
          <label>Pangkat</label>
          <input type="text" name="pangkat" value="<?php echo $data['pangkat']; ?>">
        </div>

        <div class="form-group">
          <label>NIP</label>
          <input type="text" name="nip" value="<?php echo $data['nip']; ?>">
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>">
        </div>

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