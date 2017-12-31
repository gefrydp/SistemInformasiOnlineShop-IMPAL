<?php
	session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}
	
if(isset($_POST['kirim'])){
	if($_POST['cap']==$_SESSION['captcha_session']){ // Jika Captcha Benar Maka Lanjut
		$sql=mysql_query("insert into t_testimonial (id_member,isi_testimonial,tgl_testimonial,tampil) VALUES (".$id_member.",'".htmlentities($_POST['isi'])."','".$tgl_sekarang."','0')") or die(mysql_error());
		echo "<script>alert('Terima Kasih! Testimonial Berhasil Dikirim!');window.location='index.php';</script>";
	}else{

		echo "<script>alert('Masukan Captcha Dengan Benar!');window.location=('index.php');</script>";
	}
}

?>