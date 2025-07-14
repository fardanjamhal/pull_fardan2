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
  body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
  }

  .form-center-wrapper {
    display: flex;
    justify-content: center;
    padding: 15px 15px;
  }

  .form-container {
    width: 100%;
    max-width: 900px;
    background: #fff;
    padding: 25px 25px;
    border-radius: 14px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
  }

  .form-container h2 {
    text-align: center;
    margin-bottom: 18px;
    font-size: 20px;
    color: #333;
  }

  p.note {
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
    text-align: center;
  }

  .form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 15px 20px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
  }

  .form-group label {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 4px;
    color: #333;
  }

  .form-group input[type="text"],
  .form-group input[type="file"] {
    padding: 8px 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    transition: border-color 0.2s;
  }

  .form-group input:focus {
    border-color: #007bff;
    outline: none;
  }

  .form-text {
    font-size: 12px;
    color: #777;
    margin-top: 3px;
  }

  .btn-simpan {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s;
    margin-top: 20px;
  }

  .btn-simpan:hover {
    background-color: #0056b3;
  }

  .preview-img {
    margin-top: 6px;
    height: 65px;
    border: 1px solid #ddd;
    border-radius: 6px;
    object-fit: contain;
  }

  /* Responsif padding untuk mobile */
  @media (max-width: 576px) {
    .form-container {
      padding: 20px 15px;
    }

    .form-grid {
      gap: 12px 10px;
    }

    .btn-simpan {
      margin-top: 16px;
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