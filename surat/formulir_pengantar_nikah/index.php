<?php 
  include ('../part/header.php');
?>

<div class="container" style="max-height:cover; padding-top:60px; position:relative; height:80%;" align="center">
  	<div class="card col-md-4">
        <div class="card-content">
            <div class="card-body">
                <form action="info-surat.php" method="post"> 
    	            <?php 
                    if(isset($_GET['pesan'])){
                      if($_GET['pesan']=="gagal"){
                        echo "<div class='alert alert-danger'><center>NIK Anda tidak terdaftar. Silahkan hubungi Kantor Desa!</center></div>";
                      }
                    }
                  ?>
                  
                		<?php
                  include('../../config/koneksi.php');

                  $query = mysqli_query($connect, "SELECT * FROM profil_desa LIMIT 1");
                  $data = mysqli_fetch_assoc($query);
                  ?>
                  <img src="../../assets/img/<?php echo $data['logo_desa']; ?>" alt="Logo Desa" style="width: 120px; height: auto;">
                  
                  <hr>
                  	<label style="font-weight: 700;"><i class="fas fa-id-card"></i> NIK  <i>(Nomor Induk Kependudukan)</i></label>
                  	<input type="text" class="form-control form-control-md" maxlength="16" onkeypress="return hanyaAngka(event)" name="fnik" placeholder="Masukkan NIK Anda..." required>
                    <script>
                      function hanyaAngka(evt){
                        var charCode = (evt.which) ? evt.which : event.keyCode
                        if (charCode > 31 && (charCode < 48 || charCode > 57))
                        return false;
                        return true;
                      }
                    </script>
                  	<div class="form-control-position">
                    	<i class="ft-search primary font-medium-4"></i>
                  	</div>
                  	<br>
                  	<button type="submit" class="btn btn-info btn-md"><i class="fas fa-search"></i> CEK NIK</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
  include ('../part/footer.php');
?>