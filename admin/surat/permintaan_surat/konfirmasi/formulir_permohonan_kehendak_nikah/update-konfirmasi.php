<?php
	include ('../../../../../config/koneksi.php');

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$kepada_yth 		= $_POST['fkepada_yth'];
	$kepala_kua 		= $_POST['fkepala_kua'];
	$id_pejabat_desa 	= $_POST['ft_tangan'];
	$status_surat 		= "SELESAI";

	$qUpdate 	= "UPDATE formulir_permohonan_kehendak_nikah SET no_surat='$no_surat', kepada_yth='$kepada_yth', kepala_kua='$kepala_kua', id_pejabat_desa='$id_pejabat_desa', status_surat='$status_surat' WHERE id_fpkn='$id'";
	$update 	= mysqli_query($connect, $qUpdate);

	if($update){
		header('location:../../');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>