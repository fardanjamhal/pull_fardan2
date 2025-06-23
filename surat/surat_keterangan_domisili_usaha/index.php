<?php 
  include ('../part/header.php');
?>

<style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  .form-wrapper {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    transform: translateY(-60px);
    position: relative;
    z-index: 1; /* Supaya tidak menutupi header */
  }

  .navbar {
    position: relative;
    z-index: 10; /* Pastikan header selalu di atas */
  }

  .custom-btn-blue {
  background: linear-gradient(135deg, #1976d2, #2196f3);
  border: none;
  color: white;
  transition: background 0.3s ease, transform 0.2s;
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(25, 118, 210, 0.3);
  }

  .custom-btn-blue:hover {
    background: linear-gradient(135deg, #1565c0, #1e88e5);
    transform: translateY(-2px);
  }

</style>

<div class="form-wrapper">
  <div class="card shadow-lg rounded-4 border-0 p-4" style="max-width: 400px; width: 100%;">
    <div class="card-body">
      <form action="info-surat.php" method="post">
        <?php 
        if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-danger text-center rounded-3'>NIK Anda tidak terdaftar. Silahkan hubungi Kantor Desa!</div>";
        }

        include('../../config/koneksi.php');
        $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
        $data = mysqli_fetch_assoc($query);
        ?>
        
        <div class="text-center mb-3">
          <img src="../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 100px; height: auto;">
        </div>

        <h5 class="text-center fw-bold mb-3">CEK SURAT ANDA</h5>
        <p class="text-muted text-center small mb-4">Masukkan NIK untuk melihat surat yang pernah dibuat.</p>

        <div class="mb-3">
          <label for="fnik" class="form-label fw-semibold">
            <i class="fas fa-id-card"></i> NIK <span class="text-muted small">(Nomor Induk Kependudukan)</span>
          </label>
          <input type="text" class="form-control" name="fnik" id="fnik" maxlength="16" placeholder="Masukkan NIK Anda..." onkeypress="return hanyaAngka(event)" required>
        </div>

        <script>
          function hanyaAngka(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode;
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
          }
        </script>

        <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary custom-btn-blue fw-semibold px-4">
          <i class="fas fa-search"></i> CEK NIK
        </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php 
  include ('../part/footer.php');
?>
