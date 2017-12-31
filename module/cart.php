<?php	
	session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}

	$sql_check=mysql_query("select id_keranjang from t_keranjang where id_member=".$id_member."") or die(mysql_error()); // Check Jumlah Keranjang Sessuai ID Member
	$check=mysql_num_rows($sql_check);

	if($check<=0){ // Jika Keranjang Kosong Maka Muncul Peringatan
		echo "<script>alert('Keranjang Masih Kosong!');window.location=('index.php');</script>";
	}
	
if(isset($id)){	 // Check Session ID Member
	$sql_check_keranjang=mysql_query("select id_member from t_keranjang where id_keranjang=".$id."") or die(mysql_error());	
	$row_check_produk=mysql_num_rows($sql_check_keranjang);
	
	if($row_check_produk==1){ // Menghitung Jumlah Keranjang Sesuai ID Keranjang
		if($aksi=='hapus'){ // Jika Aksi Hapus Maka Data di Hapus
			$sql_delete=mysql_query("delete from t_keranjang where id_keranjang=".$id."");
			echo "<script>alert('Item Berhasil Dihapus!');window.location=('index.php?module=cart');</script>";
		}
	}else{	
		header('location:index.php');
	}
}
	
	$id_ker=$_POST['id_keranjang'];
	$qty=$_POST['qty'];
	$ukuran=$_POST['ukuran'];
	$j=count($_POST['id_keranjang']);

	if(isset($_POST['checkout']) && isset($id_member)){ // Jika Post Check Out dan ada Session ID Member Akan ke Halaman Selanjutnya
			header('location:index.php?module=check-out');
	}elseif(isset($_POST['update'])){
		for($i=0; $i<$j; $i++){ // Memasukan Perubahan Data Pembelian ke Table Keranjang
			$sql_update=mysql_query("update t_keranjang SET qty='".$qty[$i]."',ukuran='".$ukuran[$i]."' where id_keranjang='".$id_ker[$i]."'") or die(mysql_error());}
			echo "<script>alert('Keranjang Berhasil Diperbarui!');window.location=('index.php?module=cart');</script>";
	}

?>


