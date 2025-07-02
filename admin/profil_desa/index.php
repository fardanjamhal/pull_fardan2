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
    background-color: #f0f2f5;
    font-family: 'Segoe UI', sans-serif;
  }

  .form-center-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 15px;
    min-height: 100%;
  }

  .form-container {
    width: 100%;
    max-width: 720px;
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  }

  .form-group {
    margin-bottom: 18px;
  }

  .form-group label {
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
    color: #333;
  }

  .form-group input[type="text"],
  .form-group input[type="file"] {
    width: 100%;
    padding: 10px 14px;
    font-size: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: 0.3s;
  }

  .form-group input:focus {
    border-color: #007bff;
    outline: none;
  }

  .form-text {
    font-size: 13px;
    color: #666;
    margin-top: 4px;
  }

  .btn-simpan {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s;
  }

  .btn-simpan:hover {
    background-color: #0056b3;
  }

  .row .col-code,
  .row .col-number {
    padding-right: 0;
    padding-left: 0;
  }

  .preview-img {
    margin-top: 10px;
    height: 75px;
    border: 1px solid #ddd;
    border-radius: 8px;
  }

  p.note {
    font-size: 14px;
    color: #444;
    margin-bottom: 25px;
  }
</style>

<div class="form-center-wrapper">
  <div class="form-container">
    <p class="note">Petunjuk: gunakan tanda * (bintang) untuk membuat baris baru pada alamat.</p>

    <form action="update_profil_desa.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_profil_desa" value="<?= $data['id_profil_desa']; ?>">

      <div class="form-group">
        <label>Nama Desa</label>
        <input type="text" name="nama_desa" value="<?= $data['nama_desa']; ?>" required>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required>
      </div>

      <div class="form-group">
        <label>No Telepon</label>
        <input type="text" name="no_telpon" value="<?= $data['no_telpon']; ?>">
      </div>

      <div class="form-group">
        <label>Kecamatan</label>
        <input type="text" name="kecamatan" value="<?= $data['kecamatan']; ?>">
      </div>

      <div class="form-group">
        <label>Kota</label>
        <input type="text" name="kota" value="<?= $data['kota']; ?>">
      </div>

      <div class="form-group">
        <label>Provinsi</label>
        <input type="text" name="provinsi" value="<?= $data['provinsi']; ?>">
      </div>

      <div class="form-group">
        <label>Kode Pos</label>
        <input type="text" name="kode_pos" value="<?= $data['kode_pos']; ?>">
      </div>

      <div class="form-group">
        <label>Nomor WhatsApp Admin</label>
        <div class="row">
          <div class="col-3 col-sm-2">
            <input type="text" class="form-control text-center" value="+62" readonly>
          </div>
          <div class="col-9 col-sm-10">
            <input type="text" name="wa_admin" class="form-control"
                   value="<?= htmlspecialchars(ltrim($data['wa_admin'], '0')); ?>"
                   pattern="[0-9]{6,15}"
                   placeholder="81234567890" required>
          </div>
        </div>
        <small class="form-text">
          Masukkan tanpa angka 0 di depan. Contoh: <strong>81234567890</strong>
        </small>
      </div>

      <div class="form-group">
        <label>Tanda Tangan Digital</label>
        <input type="file" name="ttd_digital">
        <?php if (!empty($data['ttd_digital'])): ?>
          <img src="../../assets/img/barcode.png?<?= time(); ?>" alt="TTD Digital" class="preview-img">
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label>Gambar Kop Surat</label>
        <input type="file" name="gambar_kop">
        <?php if (!empty($data['gambar_kop'])): ?>
          <img src="../../assets/img/<?= $data['gambar_kop']; ?>" alt="Kop Surat" class="preview-img">
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label>Logo Desa</label>
        <input type="file" name="logo_desa">
        <?php if (!empty($data['logo_desa'])): ?>
          <img src="../../assets/img/<?= $data['logo_desa']; ?>" alt="Logo Desa" class="preview-img">
        <?php endif; ?>
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