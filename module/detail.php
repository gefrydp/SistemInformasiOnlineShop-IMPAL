<?php
	$sql_dc=mysql_query("select nama_produk from t_produk where id_produk='".$id."'"); // Memanggil Data Sesuai ID
	$row_dc=mysql_num_rows($sql_dc);
	
	if($row_dc<1){
		echo "<script>alert('Produk Tidak Tersedia!');window.location=('index.php');</script>";
	}
	
	$sql_produk=mysql_query("select *from t_produk INNER JOIN t_kategori on t_produk.id_kategori=t_kategori.id_kategori where id_produk='".$id."'") or die(mysql_error());
	$row_produk=mysql_fetch_assoc($sql_produk);
	{
		$id_kategori=$row_produk['id_kategori'];
		$nama_kategori=$row_produk['nama_kategori'];
		$id_produk=$row_produk['id_produk'];
		$nama_produk=$row_produk['nama_produk'];
		$harga_produk=$row_produk['harga_produk'];
		$gambar_produk=$row_produk['gambar_produk'];
		$deskripsi_produk=$row_produk['deskripsi_produk'];
		$stok=$row_produk['stok'];
		$nama_kategori=$row_produk['nama_kategori'];
		$tgl_produk=$row_produk['tgl_produk'];
	}

?>