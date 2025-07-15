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


<style>
  body {
    margin: 0;
    padding: 0;
    background-color: #f5f6fa;
  }

  .form-center-wrapper {
    display: flex;
    justify-content: center;
    padding: 30px 15px;
  }

  .form-container {
    width: 100%;
    max-width: 720px;
    background: #fff;
    padding: 32px;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.07);
  }

  .form-container h2 {
    text-align: center;
    font-size: 22px;
    margin-bottom: 10px;
    color: #333;
  }

  .form-container .note {
    font-size: 13px;
    text-align: center;
    color: #777;
    margin-bottom: 30px;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    margin-bottom: 6px;
    font-size: 14px;
    font-weight: 600;
    color: #444;
  }

  .form-group input[type="text"],
  .form-group input[type="file"] {
    width: 100%;
    padding: 10px 12px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: border-color 0.2s;
  }

  .form-group input:focus {
    border-color: #007bff;
    outline: none;
  }

  .form-group .form-text {
    font-size: 12px;
    color: #888;
    margin-top: 4px;
  }

  .form-group img.preview-img {
    display: block;
    margin: 8px auto; /* center secara horizontal */
    height: 80px;
    border-radius: 6px;
    border: 1px solid #ddd;
    object-fit: contain;
  }

  .btn-simpan {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    border: none;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    font-size: 15px;
    transition: background-color 0.3s;
    cursor: pointer;
  }

  .btn-simpan:hover {
    background-color: #0056b3;
  }

  .flex-wa {
    display: flex;
    gap: 10px;
  }

  .flex-wa input:first-child {
    width: 60px;
    text-align: center;
    background: #f3f3f3;
  }

  @media (max-width: 576px) {
    .form-container {
      padding: 24px 16px;
    }

    .btn-simpan {
      padding: 10px;
    }
  }
</style>



<div class="form-center-wrapper">
  <div class="form-container">
    <h2>Edit Profil Desa</h2>
    <p class="note">Petunjuk: gunakan tanda * (bintang) untuk membuat baris baru pada alamat.</p>

    <form action="update_profil_desa.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_profil_desa" value="<?= $data['id_profil_desa']; ?>">

      <div class="form-grid">
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
          <div style="display: flex; gap: 8px;">
            <input type="text" value="+62" readonly style="width: 60px; text-align: center;">
            <input type="text" name="wa_admin"
                   value="<?= htmlspecialchars(ltrim($data['wa_admin'], '0')); ?>"
                   pattern="[0-9]{6,15}" placeholder="81234567890" required
                   style="flex: 1;">
          </div>
          <small class="form-text">Tanpa angka 0 di depan. Contoh: <strong>81234567890</strong></small>
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
      </div>

      <button type="submit" class="btn-simpan">💾 Simpan Perubahan</button>
    </form>
  </div>
</div>

  

  </section>
</div>

<?php 
  include ('../part/footer.php');
?>