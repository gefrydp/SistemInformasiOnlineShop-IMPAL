<?php
session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}
	
$sql_check=mysql_query("select id_order from t_order where id_member=".$id_member."") or die(mysql_error()); // Memanggil Tabel Order Sesuai ID Member
$check=mysql_num_rows($sql_check);

	if($check<=0){ // Jika Data Kosong Maka Muncul Peringatan
		echo "<script>alert('Anda Belum Melakukan Pembelian!');window.location=('index.php');</script>";
	}
	
	

?>

