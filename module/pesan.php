<?php
	session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}	
	
if(isset($_POST['kirim']) && isset($id_member)){
	if($_POST['cap']==$_SESSION['captcha_session']){ // Check Captcha 
		$sql=mysql_query("insert into t_pesan (tgl_pesan,dari,untuk,judul_pesan,isi_pesan) VALUES ('".$tgl_sekarang."','".$_SESSION['id_member']."','Admin','".htmlentities($_POST['judul'])."','".htmlentities($_POST['isi'])."')") or die(mysql_error());
		echo "<script>alert('Pesan Berhasil Dikirim!');window.location=('index.php?module=pesan');</script>";
	}else{
		echo "<script>alert('Masukan Captcha Dengan Benar!');window.location=('index.php?module=pesan');</script>";
	}
}

?>

