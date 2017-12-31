<?php

// vMart //
// Developed by Luqman Hakim //
// luqman.web.id //

date_default_timezone_set('Asia/Jakarta');

// vMart //
define("versi_cms", "1.0 Beta");
define("powered", "Powered by vMart, Versi ".versi_cms."");
define("tahun", "2017");
{
	define ("folder_inc", "./includes/");
	define ("folder_mod", "./module/");
}

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) { // Loading Website Dengan Gzip Compression
	ob_start("ob_gzhandler");
}
else {
	ob_start();
}	


// Pengaturan //
$sql_pengaturan=mysql_query("select *from t_pengaturan where id=1");
$row_pengaturan=mysql_fetch_assoc($sql_pengaturan);
{ 
	$judul_web=$row_pengaturan['judul_website']; 
	$banner_web=$row_pengaturan['banner_website'];
	$favicon_web=$row_pengaturan['favicon'];
	$keyword_web=$row_pengaturan['keyword'];
	$deskripsi_web=$row_pengaturan['deskripsi'];
	$google=$row_pengaturan['google_analystics'];	
	$panduan_web=$row_pengaturan['panduan'];

}


// Template //
$sql_template=mysql_query("select *from t_templates where aktif_template='1'");
$row_template=mysql_fetch_assoc($sql_template);
{
	$nama_template=$row_template['nama_template'];
	$lokasi_template="./template/".$row_template['lokasi_template'];
	$aktif_template=$row_template['aktif_template'];
}

define("ft",$lokasi_template);


// Module //
$sql_mod=mysql_query("select slide,polling from t_pengaturan");
$row_mod=mysql_fetch_assoc($sql_mod);
{
	$set_slide=$row_mod['slide'];
	$set_polling=$row_mod['polling'];
}


// Profil Toko //
$sql_toko=mysql_query("select *from t_profil");
$row_toko=mysql_fetch_assoc($sql_toko);
{
	$nama_toko=$row_toko['nama_toko'];
	$kota_toko=$row_toko['kota_toko'];
	$alamat_toko=$row_toko['alamat_toko'];
	$tentang_web=$row_toko['tentang_toko'];
}

// Waktu Indonesia //

	$tgl_sekarang = date("Y-m-d");
	$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'); 
	$hari = $array_hari[date('N')]; $array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novemer','Desember'); 
	$bulan = $array_bulan [date('n')]; 
	$tgl = date('j'); 
	$thn = date('Y'); 

// Kontak //
$sql_kontak=mysql_query("select *from t_kontak");
$row_kontak=mysql_fetch_assoc($sql_kontak);
{
	$sms=$row_kontak['sms'];
	$telp=$row_kontak['telpon'];
	$bbm=$row_kontak['bbm'];
	$email=$row_kontak['email'];
	$fb=$row_kontak['facebook'];
	$tw=$row_kontak['twitter'];
	$pin=$row_kontak['pinterest'];
	$gp=$row_kontak['googleplus'];
	$ym=$row_kontak['ym'];
}



// SQL i $id //

$id=$_GET['id'];
if(isset($_GET['id'])){
	if(preg_match('/\s/', $id))
		exit('SQL Injection Detected'); // no whitespaces
	if(preg_match('/[\'"]/', $id))
		exit('SQL Injection Detected'); // no quotes
	if(preg_match('/[\/\\\\]/', $id))
		exit('SQL Injection Detected'); // no slashes
	if(preg_match('/(and|or|null|not)/i', $id))
		exit('SQL Injection Detected'); // no sqli boolean keywords
	if(preg_match('/(union|select|from|where)/i', $id))
		exit('SQL Injection Detected'); // no sqli select keywords
	if(preg_match('/(group|order|having|limit)/i', $id))
		exit('SQL Injection Detected'); //  no sqli select keywords
	if(preg_match('/(into|file|case)/i', $id))
		exit('SQL Injection Detected'); // no sqli operators
	if(preg_match('/(=|&|\|)/', $id))
		exit('SQL Injection Detected'); // no boolean operators		
}

/* SQL i $kategori */
$kategori=$_GET['kategori'];
if(isset($_GET['kategori'])){
	if(preg_match('/\s/', $kategori))
		exit('SQL Injection Detected'); // no whitespaces
	if(preg_match('/[\'"]/', $kategori))
		exit('SQL Injection Detected'); // no quotes
	if(preg_match('/[\/\\\\]/', $kategori))
		exit('SQL Injection Detected'); // no slashes
	if(preg_match('/(and|or|null|not)/i', $kategori))
		exit('SQL Injection Detected'); // no sqli boolean keywords
	if(preg_match('/(union|select|from|where)/i', $kategori))
		exit('SQL Injection Detected'); // no sqli select keywords
	if(preg_match('/(group|order|having|limit)/i', $kategori))
		exit('SQL Injection Detected'); //  no sqli select keywords
	if(preg_match('/(into|file|case)/i', $kategori))
		exit('SQL Injection Detected'); // no sqli operators
	if(preg_match('/(=|&|\|)/', $kategori))
		exit('SQL Injection Detected'); // no boolean operators		
}
		
/* SQL i $add */

$add=$_GET['add'];
if(isset($_GET['add'])){
	if(preg_match('/\s/', $add))
		exit('SQL Injection Detected'); // no whitespaces
	if(preg_match('/[\'"]/', $add))
		exit('SQL Injection Detected'); // no quotes
	if(preg_match('/[\/\\\\]/', $add))
		exit('SQL Injection Detected'); // no slashes
	if(preg_match('/(and|or|null|not)/i', $add))
		exit('SQL Injection Detected'); // no sqli boolean keywords
	if(preg_match('/(union|select|from|where)/i', $add))
		exit('SQL Injection Detected'); // no sqli select keywords
	if(preg_match('/(group|order|having|limit)/i', $add))
		exit('SQL Injection Detected'); //  no sqli select keywords
	if(preg_match('/(into|file|case)/i', $add))
		exit('SQL Injection Detected'); // no sqli operators
	if(preg_match('/(=|&|\|)/', $add))
		exit('SQL Injection Detected'); // no boolean operators		
}
		
/* SQL i $p */

$p=$_GET['p'];
if(isset($_GET['p'])){
	if(preg_match('/\s/', $p))
		exit('SQL Injection Detected'); // no whitespaces
	if(preg_match('/[\'"]/', $p))
		exit('SQL Injection Detected'); // no quotes
	if(preg_match('/[\/\\\\]/', $p))
		exit('SQL Injection Detected'); // no slashes
	if(preg_match('/(and|or|null|not)/i', $p))
		exit('SQL Injection Detected'); // no sqli boolean keywords
	if(preg_match('/(union|select|from|where)/i', $p))
		exit('SQL Injection Detected'); // no sqli select keywords
	if(preg_match('/(group|order|having|limit)/i', $p))
		exit('SQL Injection Detected'); //  no sqli select keywords
	if(preg_match('/(into|file|case)/i', $p))
		exit('SQL Injection Detected'); // no sqli operators
	if(preg_match('/(=|&|\|)/', $p))
		exit('SQL Injection Detected'); // no boolean operators		
}

$module=$_GET['module'];
$level=$_SESSION['level'];
$aksi=$_GET['aksi'];
$id_member=$_SESSION['id_member'];

?>