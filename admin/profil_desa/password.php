<?php 
session_start();
include('../part/akses.php');
include('../part/header.php');
include('../part/sidebar.php');

// CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
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
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
      <div style="padding:10px; background-color:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:4px; margin-bottom:10px;">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
      </div>
    <?php endif; ?>

    <?php
    include('../../config/koneksi.php');

    $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
    $data_desa = mysqli_fetch_assoc($query);

    $id_login = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    $query = mysqli_query($connect, "SELECT * FROM login WHERE id = $id_login");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        echo "<p>Akun dengan ID $id_login tidak ditemukan.</p>";
        exit;
    }
    ?>

    <div style="max-width: 500px; margin: 40px auto; padding: 30px; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); background-color: #f9f9f9; font-family: sans-serif;">
      <h2 style="text-align: center; margin-bottom: 30px;">Data Login</h2>

      <?php if (isset($_GET['pesan']) && $_GET['pesan'] == 'password_diubah'): ?>
        <div style="padding:10px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:4px;">
          Password berhasil diubah. Silakan login kembali.
        </div>
      <?php endif; ?>


      <!-- Tambahkan Font Awesome (ikon) -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

      <form action="proses_ganti_akun.php" method="post" autocomplete="off">
        <input type="hidden" name="id_login" value="<?= htmlspecialchars($id_login) ?>">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

        <!-- Username -->
        <label for="username">Username Baru:</label>
        <input type="text" id="username" name="username" required
          placeholder="Masukkan username baru"
          value="<?= isset($_SESSION['old_username']) ? htmlspecialchars($_SESSION['old_username']) : htmlspecialchars($data['username']); ?>"
          style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 5px;">

        <!-- Email (readonly + tombol edit) -->
        <label for="email">Email:</label>
        <div style="position: relative; margin-bottom: 20px;">
          <input type="email" id="email" name="email" readonly
            value="<?= htmlspecialchars($data['email']) ?>"
            style="width: 100%; padding: 10px 40px 10px 10px;
                  border: 1px solid #ccc; border-radius: 5px;
                  background-color: #f4f1ee;  /* coklat muda */
                  transition: border 0.3s, background-color 0.3s;">
                  
          <button type="button" onclick="enableEmailEdit(this)" title="Edit Email" style="
              position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
              background: none; border: none; font-size: 18px; cursor: pointer;">
            <i class="fa fa-edit"></i>
          </button>
        </div>

        <!-- Password -->
        <label for="passwordInput">Password Baru:</label>
        <div style="position: relative; margin-bottom: 20px;">
          <input type="password" name="password" id="passwordInput" required minlength="5"
            placeholder="Password minimal 5 karakter"
            value="<?= isset($_SESSION['old_password']) ? htmlspecialchars($_SESSION['old_password']) : ''; ?>"
            style="width: 100%; padding: 10px 40px 10px 10px; border: 1px solid #ccc; border-radius: 5px;">
          <button type="button" onclick="togglePassword('passwordInput', this)" style="
              position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
              background: none; border: none; font-size: 18px; cursor: pointer;">
            <i class="fa fa-eye"></i>
          </button>
        </div>

        <!-- Konfirmasi Password -->
        <label for="confirmPasswordInput">Konfirmasi Password:</label>
        <div style="position: relative; margin-bottom: 20px;">
          <input type="password" name="confirm_password" id="confirmPasswordInput" required minlength="5"
            placeholder="Ulangi password baru"
            value="<?= isset($_SESSION['old_confirm']) ? htmlspecialchars($_SESSION['old_confirm']) : ''; ?>"
            style="width: 100%; padding: 10px 40px 10px 10px; border: 1px solid #ccc; border-radius: 5px;">
          <button type="button" onclick="togglePassword('confirmPasswordInput', this)" style="
              position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
              background: none; border: none; font-size: 18px; cursor: pointer;">
            <i class="fa fa-eye"></i>
          </button>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" style="
            width: 100%; padding: 10px;
            background-color: #007bff; color: white;
            border: none; border-radius: 5px;
            font-size: 16px; cursor: pointer;">Simpan Perubahan</button>
      </form>

    </div>
  </section>
</div>

<!-- JS -->
<script>
  function togglePassword(id, el) {
    const input = document.getElementById(id);
    const icon = el.querySelector('i');
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }

  function enableEmailEdit(button) {
    const input = document.getElementById("email");
    const icon = button.querySelector("i");

    if (input.hasAttribute("readonly")) {
      input.removeAttribute("readonly");
      input.style.border = "1px solid #007bff";
      input.style.backgroundColor = "#ffffff"; // putih saat edit
      icon.classList.remove("fa-edit");
      icon.classList.add("fa-check");
      input.focus();
    } else {
      input.setAttribute("readonly", true);
      input.style.border = "1px solid #ccc";
      input.style.backgroundColor = "#f4f1ee"; // kembali coklat muda
      icon.classList.remove("fa-check");
      icon.classList.add("fa-edit");
    }
  }
</script>


<?php 
unset($_SESSION['old_username'], $_SESSION['old_password'], $_SESSION['old_confirm']);
include('../part/footer.php');
?>
