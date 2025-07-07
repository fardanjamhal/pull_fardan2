<style>
  body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    background: linear-gradient(135deg, #e3f2fd, #bbdefb);
    font-family: 'Segoe UI', sans-serif;
  }

  .form-wrapper {
    min-height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
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

  .card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  }

  .form-control.valid {
    border-color: green;
    padding-right: 2.5rem;
    background-image: url('data:image/svg+xml;utf8,<svg fill="green" height="20" viewBox="0 0 24 24" width="20" xmlns="http://www.w3.org/2000/svg"><path d="M9 16.17l-3.88-3.88L4 13.41l5 5 10-10-1.41-1.41z"/></svg>');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 20px 20px;
  }

  .form-control.invalid {
    animation: shake 0.3s;
    border-color: red;
  }

  @keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
  }

  .status-msg {
    height: 18px; /* Jaga tinggi tetap agar form tidak melompat */
    font-size: 13px;
    margin-top: 4px;
  }

  .status-msg.error {
    color: red;
  }

  .status-msg.success {
    color: green;
  }
</style>

<div class="form-wrapper">
  <div class="card p-4 shadow-lg" style="max-width: 420px; width: 100%;">
    <div class="card-body">
      <form action="info-surat.php" method="post" onsubmit="return validasiNIK()">
        <?php 
        if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
            echo "<div class='alert alert-danger text-center rounded-3'>NIK Anda tidak terdaftar. Silahkan hubungi Kantor Desa!</div>";
        }

        include('../../config/koneksi.php');
        $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
        $data = mysqli_fetch_assoc($query);
        ?>

        <div class="text-center mb-3">
          <img src="../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 100px;">
        </div>

        <h5 class="text-center fw-bold mb-3">CEK SURAT ANDA</h5>
        <p class="text-muted text-center small mb-4">Masukkan NIK untuk melihat surat yang pernah dibuat.</p>

        <div class="mb-3">
          <label for="fnik" class="form-label fw-semibold">
            <i class="fas fa-id-card"></i> NIK <span class="text-muted small">(16 digit angka)</span>
          </label>
          <input type="text" class="form-control" name="fnik" id="fnik" maxlength="16"
                 placeholder="Masukkan NIK Anda..." oninput="cekNIK()" onkeypress="return hanyaAngka(event)" required>
          <div id="notif-nik" class="status-msg"></div>
        </div>

        <script>
          function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            return !(charCode > 31 && (charCode < 48 || charCode > 57));
          }

          function cekNIK() {
            const input = document.getElementById("fnik");
            const msg = document.getElementById("notif-nik");
            const nik = input.value;

            if (nik.length === 0) {
              input.classList.remove('valid', 'invalid');
              msg.textContent = "";
              msg.className = "status-msg";
            } else if (nik.length < 16) {
              input.classList.remove('valid');
              input.classList.add('invalid');
              msg.textContent = "NIK harus 16 digit.";
              msg.className = "status-msg error";
            } else if (!/^\d{16}$/.test(nik)) {
              input.classList.remove('valid');
              input.classList.add('invalid');
              msg.textContent = "NIK hanya boleh angka.";
              msg.className = "status-msg error";
            } else {
              input.classList.remove('invalid');
              input.classList.add('valid');
              msg.textContent = "✅ NIK valid";
              msg.className = "status-msg success";
            }
          }

          function validasiNIK() {
            const input = document.getElementById("fnik");
            const nik = input.value;
            const msg = document.getElementById("notif-nik");

            if (nik.length !== 16 || !/^\d{16}$/.test(nik)) {
              input.classList.remove('valid');
              input.classList.add('invalid');
              msg.textContent = "NIK tidak valid. Harus 16 angka.";
              msg.className = "status-msg error";
              return false;
            }

            return true;
          }
        </script>

        <div class="text-center mt-4">
          <button type="submit" class="btn custom-btn-blue fw-semibold px-4">
            <i class="fas fa-search"></i> CEK NIK
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
