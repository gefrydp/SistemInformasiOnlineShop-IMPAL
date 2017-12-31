<?php
	session_start();
	if(!isset($_SESSION['id_member']) && !isset($_SESSION['username'])){  // Jika Session Kosong Maka Harus Login
		header('location:index.php');
	}
	
	
	
	$sql_ctag=mysql_query("select * from t_tagihan where id_tagihan=".$id." and id_member=".$id_member."") or die(mysql_error()); // Memanggil Data Sesuai ID Member dan ID Tagihan
	$r_ctag=mysql_num_rows($sql_ctag);
	
		if($r_ctag<1){ // Jika Kosong Maka Harus Gagal
			echo "<script>window.location=('index.php?module=tagihan');</script>";
		}
	
	$row_tag=mysql_fetch_assoc($sql_ctag);
	
		if($row_tag['status_tagihan']=='Lunas'){ // Jika Status Tagihan Lunas Maka Eksekusi Perintah
			$status="<font color='green' size='5'>Lunas</font>";
			
		}elseif($row_tag['foto_faktur']!=''){
			$status='Proses...';
			
		}else{
			$status="<font size='5' color='red'>Belum Lunas</font>";
		
		}
	
	$tgl_tagihan=TanggalIndo($tag_tag['tgl_tagihan']);
	
?>