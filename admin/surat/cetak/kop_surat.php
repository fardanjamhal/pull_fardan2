<?php
include('../../../../config/koneksi.php');

$query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
$data = mysqli_fetch_assoc($query);
?>

<table width="100%" style="text-align: center; margin: 0 auto;">
<tr>
  <td style="width: 100px;">
    <img src="../../../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 75px; height: auto;">
  </td>
  <td>
    <div class="header" style="text-align: center;">
      <h4 class="kop" style="margin: 0; text-transform: uppercase;">PEMERINTAH <?php echo $rows['kota']; ?></h4>
      <h4 class="kop" style="margin: 0; text-transform: uppercase;">KECAMATAN <?php echo $rows['kecamatan']; ?></h4>
      <h4 class="kop" style="margin: 0; text-transform: uppercase;">DESA <?php echo $rows['nama_desa']; ?></h4>
      <h6 class="kop2" style="margin: 0; text-transform: capitalize;"><?php echo $rows['alamat']; ?> <?php echo $rows['no_telpon']; ?> <?php echo $rows['kode_pos']; ?></h6>
    </div>
  </td>
</tr>
</table>