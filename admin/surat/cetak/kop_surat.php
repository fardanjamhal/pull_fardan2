<?php
include('../../../../config/koneksi.php');

// Ambil data profil desa
$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
$data = mysqli_fetch_assoc($query);

// Gunakan data untuk teks kop surat
$rows = $data;

// Ambil field untuk validasi dan pemrosesan
$alamat   = $rows['alamat'] ?? '';
$kode_pos = $rows['kode_pos'] ?? '';

// Atur lebar logo (kecil jika alamat dan kode_pos kosong)
$logo_width = (!empty($alamat) || !empty($kode_pos)) ? '75px' : '62px';
?>

<!-- Kop Surat -->
<div style="position: relative; width: 100%; text-align: center;">

  <!-- Logo di kiri -->
  <div style="position: absolute; left: 0;">
    <img src="../../../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa"
         style="width: <?php echo $logo_width; ?>; height: auto;">
  </div>

  <!-- Teks Kop di tengah -->
  <div style="display: inline-block; text-align: center;">
    <?php if (!empty($rows['kota'])) { ?>
      <h4 style="margin: 0; text-transform: uppercase;">PEMERINTAH <?php echo $rows['kota']; ?></h4>
    <?php } ?>
    <?php if (!empty($rows['kecamatan'])) { ?>
      <h4 style="margin: 0; text-transform: uppercase;"><?php echo $rows['kecamatan']; ?></h4>
    <?php } ?>
    <?php if (!empty($rows['nama_desa'])) { ?>
      <h4 style="margin: 0; text-transform: uppercase;"><?php echo $rows['nama_desa']; ?></h4>
    <?php } ?>
    
    <?php if (!empty($alamat) || !empty($rows['no_telpon']) || !empty($kode_pos)) { ?>
      <h6 style="margin: 0; text-transform: capitalize;">
        <?php
        // Ubah * jadi <br> hanya di alamat
        $alamat_bersih = str_replace('*', '<br>', $alamat);

        // Gabungkan no telp + kode pos
        $tambahan = trim(($rows['no_telpon'] ?? '') . ' ' . $kode_pos);

        // Tampilkan alamat + tambahan jika ada
        echo !empty($tambahan)
          ? $alamat_bersih . ' ' . $tambahan
          : $alamat_bersih;
        ?>
      </h6>
    <?php } ?>
  </div>

</div>
