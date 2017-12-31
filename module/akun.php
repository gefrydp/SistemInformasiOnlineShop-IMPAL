<?php
session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}
		
$sql_akun=mysql_query("select *from t_member where id_member=".$id_member."") or die(mysql_error()); // Menampilkan Data Member Sesuai ID Member
$row_akun=mysql_fetch_assoc($sql_akun);

{
	$username=$row_akun['username'];
	$nama_lengkap=$row_akun['nama_lengkap'];
	$email=$row_akun['email'];
	$no_telp=$row_akun['no_telp'];
	$alamat=$row_akun['alamat'];
	$provinsi=$row_akun['provinsi'];
	$kota=$row_akun['kota'];
	$kode_pos=$row_akun['kode_pos'];
}


?>