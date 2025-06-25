<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
  include('config/koneksi.php');
  $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
  $data = mysqli_fetch_assoc($query);
  $favicon = !empty($data['logo_desa']) ? $data['logo_desa'] : 'mini-logo.png';
  ?>

  <link rel="shortcut icon" href="assets/img/<?php echo $favicon; ?>">
  <title>Home - <?php echo ucwords(strtolower($data['nama_desa'])); ?></title>
  <link rel="stylesheet" href="assets/fontawesome-free-5.10.2-web/css/all.css">
  <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.css">

  <style>
	* {
      box-sizing: border-box;
    }

    body, html {
      margin: 0;
      padding: 0;
      min-height: 80vh;
      overflow-x: hidden;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('assets/img/dedig.png') center center / cover no-repeat;
	  background-size: cover;
	  background-attachment: fixed;
    }

    .container {
	min-height: 80vh;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	padding: 20px;
	}

    .logo-box {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 16px;
      padding: 15px 25px;
      box-shadow: 0 4px 20px rgba(255, 255, 255, 0.1);
      width: fit-content;
    }

    .logo-img {
      width: 100px;
      height: auto;
    }

    .glow-title {
      font-family: monospace;
      font-weight: bold;
      font-size: 2.5rem;
      color: black;
      min-height: 3.5rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      position: relative;
    }

    .cursor {
      display: inline-block;
      color: black;
      animation: blink 0.7s steps(1) infinite;
      font-size: 2.5rem;
      position: relative;
      top: -4px;
    }

    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }

    .btn-surat {
      background: linear-gradient(135deg,rgb(16, 76, 196),rgb(29, 158, 233));
      color: white;
      padding: 12px 30px;
      font-size: 1.1rem;
      font-weight: bold;
      border-radius: 30px;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(31, 101, 231, 0.4);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-surat:hover {
      background: linear-gradient(135deg, #1de9b6, #00ffff);
      box-shadow: 0 6px 25px rgba(0, 255, 255, 0.6);
      transform: translateY(-2px);
    }

    @media screen and (max-width: 576px) {
    
      .logo-box { margin-bottom: 20px; }
      .glow-title { font-size: 1.3rem; min-height: 2rem; margin-bottom: 20px; }
      .cursor { font-size: 1.3rem; top: -2px; }
      .logo-img { width: 80px; }
      .btn-surat { font-size: 1rem; padding: 10px 20px; margin-bottom: -18px; }
    }
  </style>
</head>
<body>

<?php include 'admin/part/navbar.php'; ?>



<?php
$query = mysqli_query($connect, "SELECT * FROM profil_desa WHERE id_profil_desa = 1");
$row = mysqli_fetch_assoc($query);
$nama_desa = strtoupper($row['nama_desa'] ?? 'DESA');
$kota = strtoupper($row['kota'] ?? 'KOTA');
?>

<style>
	/* --- Full Clock Display (untuk waktu) --- */
.full-clock-display {
  font-family: 'Arial', sans-serif; /* Font standar, bersih */
  font-size: 2em; /* Ukuran cukup besar untuk waktu */
  font-weight: bold; /* Sedikit tebal agar jelas */
  color:rgb(22, 22, 22); /* Warna putih bersih */
  /* Tidak ada background, shadow, atau animasi kompleks */
}

/* --- Full Date Display (untuk hari, tanggal, tahun) --- */
.full-date-display {
  font-family: 'Arial', sans-serif; /* Font yang sama */
  font-size: 1.4em; /* Ukuran lebih kecil dari jam */
  font-weight: normal;
  color:rgb(22, 22, 22); /* Warna abu-abu terang */
}

/* --- Responsive Adjustments --- */
@media (max-width: 768px) {

	body {
    background-position: center bottom;
    background-size: cover;
  }

  .container {
    padding-top: 0 !important;
    min-height: 90vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-size: cover;
    background-position: center;
  }

  .full-clock-display {
    font-size: 3em;
  }

  .full-date-display {
    font-size: 1.2em;
  }
}

@media (max-width: 480px) {
  .container {
    padding-top: 0 !important;
    min-height: 90vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-size: cover;
    background-position: center;
  }

  .full-clock-display {
    font-size: 2em;
  }

  .full-date-display {
    font-size: 1em;
  }
}

</style>

<!-- KONTEN -->
<div class="container text-center">
  
	<div id="current-time" class="full-clock-display">
    </div>
	<div id="current-date" class="full-date-display mt-3">
    </div>

  <div class="logo-box mx-auto mb-4">
    <img src="assets/img/<?php echo $row['logo_desa']; ?>" alt="Logo Desa" class="logo-img">
  </div>

  <div class="glow-title mb-5">
    <span id="typewriter"></span><span class="cursor">|</span>
  </div>

  <a href="surat/" class="btn-surat">
    <i class="fas fa-envelope me-2"></i> BUAT SURAT
  </a>
</div>

<!-- EFFECT KETIK -->
<script>
  const textArray = [
    "Sistem Pelayanan Administrasi",
    "<?php echo $nama_desa; ?>",
    "<?php echo $kota; ?>"
  ];

  let typingElement = document.getElementById('typewriter');
  let i = 0, j = 0, isDeleting = false, delay = 100;

  function typeEffect() {
    let current = textArray[i];
    if (isDeleting) {
      typingElement.textContent = current.substring(0, j--);
    } else {
      typingElement.textContent = current.substring(0, j++);
    }

    if (!isDeleting && j === current.length + 1) {
      isDeleting = true;
      delay = 1500;
    } else if (isDeleting && j === 0) {
      isDeleting = false;
      i = (i + 1) % textArray.length;
      delay = 300;
    } else {
      delay = isDeleting ? 50 : 100;
    }

    setTimeout(typeEffect, delay);
  }

  typeEffect();
</script>

<script>
function updateTime() {
    const now = new Date(); // Membuat objek Date baru untuk waktu saat ini

    // --- Bagian Waktu (Jam, Menit, Detik, AM/PM) ---
    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');

    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12;
    hours = hours ? hours : 12; // Jika jam 0, jadikan 12 (untuk 12-hour format)

    // Perbarui elemen jam
    document.getElementById('current-time').innerHTML =
        `${hours}:${minutes}:${seconds} <span class="small-text">${ampm}</span>`;

    // --- Bagian Tanggal (Hari, Tanggal, Bulan, Tahun) ---
    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const months = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];

    const dayName = days[now.getDay()]; // Mendapatkan nama hari (0-6)
    const date = now.getDate(); // Mendapatkan tanggal (1-31)
    const monthName = months[now.getMonth()]; // Mendapatkan nama bulan (0-11)
    const year = now.getFullYear(); // Mendapatkan tahun (YYYY)

    // Perbarui elemen tanggal
    document.getElementById('current-date').innerHTML =
        `${dayName}, ${date} ${monthName} ${year}`;
}

// Memperbarui waktu dan tanggal setiap 1000 milidetik (1 detik)
setInterval(updateTime, 1000);
// Panggil fungsi segera saat halaman dimuat agar waktu dan tanggal langsung muncul
updateTime();
</script>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="assets/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

</body>
</html>
