<?php
	session_start();

	include "./includes/koneksi.php"; // Memanggil File Koneksi

	$sql = mysql_query("SELECT * FROM t_produk ORDER BY tgl_post DESC LIMIT 10"); // Memanggil Table Produk di Urutkan Sesuai Tgl.Post dibatasi 10 Data

	$file = fopen("rss.xml", "w");

	fwrite($file, '<?xml version="1.0"?> 
	<rss version="2.0"> 
	<channel> 
	<title>'.$judul_web.'</title> 
	<link>'.$_SERVER['HTTP_HOST'].'</link> 
	<description>Feed Description</description> 
	<language>en-us</language>');

	while($row=mysql_fetch_array($sql)){

	  $deskripsi_produk = htmlentities(strip_tags(nl2br($row['deskripsi_produk']))); 
	  $deskripsi   = substr($deskripsi_produk,0,220); 
	  $deskripsi   = substr($deskripsi_produk,0,strrpos($deskripsi," "));

	  fwrite($file, "<item>
					 <title>".$judul_web."</title>
					 <link>http://".$_SERVER['HTTP_HOST']."/index.php?module=detail&id=".$row['id_produk']."</link>
					 <description>".$deskripsi."</description>
					 </item>");
	}

	fwrite($file, "</channel></rss>");
	fclose($file);
?>
