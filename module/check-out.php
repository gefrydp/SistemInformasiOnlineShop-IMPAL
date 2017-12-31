<?php
	session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){ // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}

	

$sql_berat=mysql_query("select *from t_keranjang INNER JOIN t_produk on t_keranjang.id_produk=t_produk.id_produk where id_member=".$id_member.""); // Menampilkan Data Table Keranjang Sesuai ID Member 
while($row_berat=mysql_fetch_assoc($sql_berat)){ 
	
	$berat=$row_berat['berat'];

		if($row_berat['qty']>1){ // Jika Pembelian Melebihi 1 Produk Maka Berat Barang dikalikan Jumlah Pembelian
			$berat=$berat*$row_berat['qty'];
		}else{
			$berat=$row_berat['berat'];
		}
		
	$ber=$ber+$berat;
}

	$berat_total=ceil($ber); // Membulatkan Berat Produk
	
	
	$sql_hitung=mysql_query("select *from t_keranjang where id_member=".$id_member."");  
	$jml=mysql_num_rows($sql_hitung); // Menghitung Data Keranjang Sesuai ID
	
	$id_produk=$_POST['id_produk'];
	$tgl_order=$_POST['tgl_order'];
	$id_mem=$_POST['id_mem'];
	$status=$_POST['status'];
	$ukuran=$_POST['ukuran'];
	$j=count($_POST['id_keranjang']);
	$id_ker=$_POST['id_keranjang'];
	$qty=$_POST['qty'];

	$sql_member=mysql_query("select *from t_member where id_member=".$id_member.""); // Memanggil Data Table Member Sesuai ID

	$row_member=mysql_fetch_assoc($sql_member);


		$sql_ship=mysql_query("select *from t_shipping where wilayah='".$row_member['kota']."'");
		$check_ship=mysql_num_rows($sql_ship);
		$row_ship=mysql_fetch_assoc($sql_ship);
		$biaya_kirim=$row_ship['biaya']*$berat_total;
	
	// ID Tagihan //

$sql_tag=mysql_query("select id_tagihan from t_tagihan order by id_tagihan DESC");
$id_t=mysql_fetch_assoc($sql_tag);

$id_tagihan=$id_t['id_tagihan']+1;

$total_bayar=$_SESSION['total_bayar'];
	
if(isset($_POST['co'])){	
	if(isset($_POST['co']) && isset($id_member)){
		
		$sql_tagihan=mysql_query("insert into t_tagihan (id_tagihan,id_member,tgl_tagihan,total_tagihan) VALUES ('".$id_tagihan."',".$id_member.",'".$tgl_sekarang."','".$total_bayar."')") or die(mysql_error());
		
		for($i=0; $i<$jml; $i++){
		$sql_checkout=mysql_query("insert into t_order (id_produk,id_member,id_tagihan,qty,ukuran) VALUES ('".$id_produk[$i]."','".$id_mem[$i]."',".$id_tagihan.",'".$qty[$i]."','".$ukuran[$i]."')") or die (mysql_error());
		
		}
		$sql_checkdel=mysql_query("delete from t_keranjang where id_member=".$id_member."");
		echo "<script>alert('Terima Kasih Pesanan Anda Sedang Kami Proses --> Segera Lakukan Pembayaran!');window.location=('index.php?module=tagihan');</script>";
		unset($_SESSION['total_bayar']);
	}else{
		echo "<script>alert('Pembelian Gagal!');window.location=('index.php');</script>";
	}
}
?>


