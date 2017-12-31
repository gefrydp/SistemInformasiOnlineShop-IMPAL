<?php
	session_start();
		
	if(!isset($_SESSION['id_member']) || !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
 		echo "<script>alert('Anda Harus Login Terlebih Dahulu!');window.location=('index.php?module=login');</script>";
	}

	$qty=1; // Jumlah Setiap Pembelian

	$sql=mysql_query("select id_keranjang from t_keranjang where id_member='".$id_member."' and id_produk='".$add."'") or die(mysql_error()); // Check Jumlah Keranjang Sesuai ID Member dan ID Produk
	$row=mysql_num_rows($sql); 

	$sc=mysql_query("select nama_produk from t_produk where id_produk='".$add."'") or die(mysql_error()); // Check Jumlah Produk  Sesuai ID Produk
	$rowp=mysql_num_rows($sc);

if(isset($add) && isset($id_member)){ // Jika Tidak Ada Variable Session ID Member dan ID Produk Maka Pembelian Gagal

	if($rowp>=1){ // Jika Jumlah Produk Sesuai ID Produk Kosong Maka Pembelian Gagal
		if($row>0 && $row<10){ // Jika Sudah Pernah Membeli Maka Produk ditambahkan , dan Tidak Boleh Melebihi 10
		
			$sql_update=mysql_query("update t_keranjang SET qty=qty+1 where id_member=".$id_member." and id_produk='".$add."'") or die (mysql_error());
			
			echo "<script>alert('Produk Berhasil Ditambahkan!');window.location=('index.php?module=cart')</script>";
			
		}elseif($row>10){ // Jika Pembelian lebih dari 10 maka Pembelian Gagal
		
			echo "<script>alert('Maaf, Anda Melebihi Batas Pemesanan! Segera Lakukan Check Out!');window.location=('index.php?module=cart');</script>";
			
		}else{
		
			$sql_add=mysql_query("insert into t_keranjang (id_member,id_produk,qty) VALUES (".$id_member.",'".$add."',".$qty.")") or die (mysql_error());
			
			if($sql_add){ // Jika Sukses Maka Tampil Peringatan
			
				echo "<script>alert('Produk Berhasil Dipesan');window.location=('index.php?module=cart');</script>";
				
			}
		}
	}else{
	
		echo "<script>alert('Produk Tidak Tersedia!');window.location=('index.php');</script>";
		
	}
}

?>