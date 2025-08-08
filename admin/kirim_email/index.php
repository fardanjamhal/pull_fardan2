<?php 
  include ('../part/akses.php');
  include ('../part/header.php');
  include ('../part/sidebar.php');
?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>Kirim Dokumen</h1>
    <ol class="breadcrumb">
      <li><a href="../dashboard/"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
      <li class="active">Profil Desa</li>
    </ol>
  </section>
  <section class="content">

 <?php
// Koneksi database
include '../../config/koneksi.php';

// Ambil data pengiriman email sebelumnya
$query = mysqli_query($connect, "SELECT * FROM kirim_email ORDER BY tanggal_kirim DESC");
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
  .table-container {
    max-width: 1000px;
    margin: 50px auto;
    font-family: 'Segoe UI', sans-serif;
  }

  h3 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    background: #fff;
  }

  thead {
    background-color: #007BFF;
    color: white;
  }

  th, td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  tbody tr:hover {
    background-color: #f1f1f1;
  }

  a {
    color: #007BFF;
    text-decoration: none;
  }

  .pagination {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 10px;
  }

  .pagination a {
    padding: 8px 14px;
    border: 1px solid #007BFF;
    color: #007BFF;
    text-decoration: none;
    border-radius: 4px;
    transition: 0.3s;
  }

  .pagination a:hover {
    background-color: #007BFF;
    color: white;
  }

  .pagination .active {
    background-color: #007BFF;
    color: white;
    pointer-events: none;
  }
</style>



<!-- Font Awesome (untuk ikon kirim) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
  /* Tombol Buka Modal */
  .btn-open-modal {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 18px;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin: 20px 0;
  }

  .btn-open-modal:hover {
    background-color: #0056b3;
  }

  /* Modal Styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 99;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
  }

  .modal-content {
    background-color: #fff;
    margin: 60px auto;
    padding: 30px 40px;
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    position: relative;
    animation: fadeIn 0.3s ease-in-out;
  }

  @keyframes fadeIn {
    from { transform: scale(0.9); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
  }

  .close-modal {
    position: absolute;
    top: 14px;
    right: 20px;
    font-size: 22px;
    color: #aaa;
    cursor: pointer;
  }

  .close-modal:hover {
    color: #000;
  }

  /* Form Styles */
  .form-group {
    margin-bottom: 18px;
  }

  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 6px;
  }

  .form-group input[type="text"],
  .form-group input[type="email"],
  .form-group input[type="file"] {
    width: 100%;
    padding: 10px 12px;
    font-size: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .btn-submit {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 12px 18px;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
  }

  .btn-submit i {
    margin-right: 6px;
  }

  .btn-submit:hover {
    background-color: #218838;
  }
</style>

<!-- Tombol Buka Modal -->
<button class="btn-open-modal" onclick="openModal()">📩 Kirim Surat</button>

<!-- Modal -->
<div id="kirimModal" class="modal">
  <div class="modal-content">
    <span class="close-modal" onclick="closeModal()">&times;</span>
    <h4>Kirim Email Surat ke Kecamatan / Warga</h4>
    <form action="proses_kirim.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="judul">Judul Surat</label>
        <input type="text" id="judul" name="judul" placeholder="Contoh: Permohonan Numpang KK" required>
      </div>

      <div class="form-group">
        <label for="email_tujuan">Email Tujuan</label>
        <input type="email" id="email_tujuan" name="email_tujuan" placeholder="Contoh: kecamatan@kabupaten.go.id" required>
      </div>

      <div class="form-group">
        <label for="file_surat">Upload Dokumen (PDF)</label>
        <input type="file" id="file_surat" name="file_surat" accept="application/pdf" required>
      </div>

      <button type="submit" name="kirim" class="btn-submit">
        <i class="fas fa-paper-plane"></i> Kirim Email
      </button>
    </form>
  </div>
</div>

<script>
  function openModal() {
    document.getElementById("kirimModal").style.display = "block";
  }

  function closeModal() {
    document.getElementById("kirimModal").style.display = "none";
  }

  // Tutup modal jika klik luar area konten
  window.onclick = function(event) {
    const modal = document.getElementById("kirimModal");
    if (event.target == modal) {
      closeModal();
    }
  }
</script>

<?php
if (isset($_GET['status'])) {
  if ($_GET['status'] == 'success') {
    echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;'>
            ✅ Email berhasil dikirim.
          </div>";
  } elseif ($_GET['status'] == 'error') {
    $msg = htmlspecialchars($_GET['msg']);
    echo "<div style='background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px;'>
            ❌ Gagal mengirim email. Error: $msg
          </div>";
  }
}
?>


<!-- Tabel Riwayat Pengiriman Email -->
  <h3>Riwayat Pengiriman Email</h3>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Surat</th>
        <th>Email Tujuan</th>
        <th>File</th>
        <th>Tanggal Kirim</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $limit = 10;
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      $start = ($page - 1) * $limit;

      $query = mysqli_query($connect, "SELECT * FROM kirim_email ORDER BY tanggal_kirim DESC LIMIT $start, $limit");
      $no = $start + 1;

      while ($data = mysqli_fetch_assoc($query)) {
        echo "<tr>
          <td>{$no}</td>
          <td>{$data['judul']}</td>
          <td>{$data['email_tujuan']}</td>
          <td><a href='uploads/{$data['file_surat']}' target='_blank'>Lihat File</a></td>
          <td>{$data['tanggal_kirim']}</td>
        </tr>";
        $no++;
      }
      ?>
    </tbody>
  </table>

  <?php
  $result = mysqli_query($connect, "SELECT COUNT(*) AS total FROM kirim_email");
  $row = mysqli_fetch_assoc($result);
  $total_records = $row['total'];
  $total_pages = ceil($total_records / $limit);

  echo '<div class="pagination">';
  if ($page > 1) {
    echo '<a href="?page=' . ($page - 1) . '">&laquo; Previous</a>';
  }
  for ($i = 1; $i <= $total_pages; $i++) {
    $active = ($i == $page) ? 'class="active"' : '';
    echo "<a href='?page=$i' $active>$i</a>";
  }
  if ($page < $total_pages) {
    echo '<a href="?page=' . ($page + 1) . '">Next &raquo;</a>';
  }
  echo '</div>';
  ?>



  
  </section>
</div>

<?php 
  include ('../part/footer.php');
?>