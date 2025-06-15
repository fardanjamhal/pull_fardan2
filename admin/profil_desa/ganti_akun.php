<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
?>

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
      <li class="active">
        <a href="#"><i class="fa fa-home"></i> <span>&nbsp;Profil Desa</span></a>
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

  

     <?php
      include('../../config/koneksi.php');

      // Ambil ID dari parameter URL, default ke 1 jika tidak ada
      $id_login = isset($_GET['id']) ? (int)$_GET['id'] : 1;

      // Ambil data dari database berdasarkan ID
      $query = mysqli_query($connect, "SELECT * FROM login WHERE id = $id_login");
      $data = mysqli_fetch_assoc($query);

      // Cek jika data tidak ditemukan
      if (!$data) {
          echo "Akun dengan ID $id_login tidak ditemukan.";
          exit;
      }
      ?>

      <div style="max-width: 500px; margin: 40px auto; padding: 30px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); background-color: #f9f9f9; font-family: sans-serif;">

  <h2 style="text-align: center; margin-bottom: 30px;">
    Ganti Username & Password (ID: <?php echo $id_login; ?>)
  </h2>

  <form action="proses_ganti_akun.php" method="post" autocomplete="off">
      <!-- Kirim ID login lewat form -->
      <input type="hidden" name="id_login" value="<?php echo $id_login; ?>">

      <label for="username">Username Baru:</label><br>
      <input type="text" id="username" name="username" required
             style="width: 100%; padding: 10px; margin-top: 5px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;" autocomplete="off"><br>

      <label for="passwordInput">Password Baru:</label><br>
      <div style="position: relative; width: 100%;">
        <input type="password" name="password" id="passwordInput" required
               style="padding: 10px 40px 10px 10px; width: 100%; border: 1px solid #ccc; border-radius: 5px;" autocomplete="new-password">
        <button type="button" onclick="togglePassword()" style="
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
        ">👁</button>
      </div><br>

      <script>
        function togglePassword() {
          const input = document.getElementById("passwordInput");
          input.type = input.type === "password" ? "text" : "password";
        }
      </script>

      <button type="submit" style="
          width: 100%;
          padding: 10px;
          background-color: #007bff;
          color: white;
          border: none;
          border-radius: 5px;
          font-size: 16px;
          cursor: pointer;
      ">Simpan Perubahan</button>
  </form>

  <!-- Navigasi edit akun -->
  <div style="text-align: center; margin-top: 20px;">
    <a href="?id=1" style="text-decoration: none; color: #007bff;">Akun Administrator</a> |
    <a href="?id=2" style="text-decoration: none; color: #007bff;">Akun Kades</a>
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