<?php
	include ('../../../../../config/koneksi.php');

	$id 				= $_POST['id'];
	$no_surat 			= $_POST['fno_surat'];
	$id_pejabat_desa 	= $_POST['ft_tangan'];
	$masa_berlaku		= $_POST['fmasa_berlaku'];
	$status_surat 		= "SELESAI";

	// Cek apakah no_surat sudah ada untuk surat lain
	$qCek = "SELECT * FROM surat_pengantar_skck WHERE no_surat = '$no_surat' AND id_sps != '$id'";
	$cekResult = mysqli_query($connect, $qCek);

		if (mysqli_num_rows($cekResult) > 0) {
			echo ("<script LANGUAGE='JavaScript'>
				window.alert('Nomor surat sudah digunakan. Silakan gunakan nomor lain.');
				window.location.href = 'index.php?id=$id'; // tetap di halaman sekarang
			</script>");
			exit();
		}

	// Jika tidak duplikat, lanjutkan update

	$qUpdate 	= "UPDATE surat_pengantar_skck SET no_surat='$no_surat', id_pejabat_desa='$id_pejabat_desa', masa_berlaku='$masa_berlaku', status_surat='$status_surat' WHERE id_sps='$id'";
	$update 	= mysqli_query($connect, $qUpdate);

	if($update){
		header('location:../../');
	}else{
	 	echo ("<script LANGUAGE='JavaScript'>window.alert('Gagal mengonfirmasi surat'); window.location.href='#'</script>");
	}
?>