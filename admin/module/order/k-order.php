<?php
	session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	if(isset($id)){
		$sql_check=mysql_query("select *from t_tagihan where id_tagihan=".$id."");
		$row_check=mysql_fetch_assoc($sql_check);
		$hitung_check=mysql_num_rows($sql_check);
		if($hitung_check>=1){
		
			if($row_check['status_tagihan']=='Belum Lunas'){
				$sql_konfirmasi=mysql_query("update t_tagihan SET status_tagihan='Lunas' where id_tagihan=".$id."") or die(mysql_error());
			}else{
				$sql_konfirmasi=mysql_query("update t_tagihan SET status_tagihan='Belum Lunas' where id_tagihan=".$id."");
			}
			
			if($sql_konfirmasi){
					echo "<script>alert('Status Berhasil Diubah!');window.location='index.php?module=order';</script>";
				}else{
					echo "<script>alert('Status Gagal Diubah!');window.location='index.php?module=order';</script>";
				}
		}else{
			echo "<script>alert('Order Tidak Tersedia!');window.location='index.php?module=order';</script";
		}
	}
	
?>
			