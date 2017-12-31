<?php 

// Panggil File Untuk Konten //

if($module=='cart'){
	if($add!=''){
		include './module/add-cart.php';
	}else{
		include ''.ft.'module/cart.php';
	}
}elseif($module=='login'){
	include ''.ft.'module/login.php';
}elseif($module=='akun'){
	if($aksi=='update'){
		include ''.ft.'module/u-akun.php';
	}else{
		include ''.ft.'module/akun.php';
	}
}elseif($module=='daftar'){
	include ''.ft.'module/daftar.php';
}elseif($module=='lupa-password'){
	include ''.ft.'module/lupa-pw.php';
}elseif($module=='testimonial'){
	include ''.ft.'module/testimonial.php';
}elseif($module=='detail'){
	include ''.ft.'module/detail.php';
}elseif($module=='tagihan'){
		if($aksi=='confirm'){
			include ''.ft.'module/konfirmasi.php';
		}elseif(isset($_GET['id'])){
			include ''.ft.'module/d-tagihan.php';
		}else{
			include ''.ft.'module/tagihan.php';
			
		}
}elseif($module=='keluar'){
	echo "<script>window.location=('index.php')</script>";
	session_destroy();
	session_unset();
}elseif($module=='panduan'){
	include ''.ft.'module/panduan.php';
}elseif($module=='tentang'){
	include ''.ft.'module/tentang.php';
}elseif($module=='check-out'){
	include ''.ft.'module/check-out.php';
}elseif($module=='pesan'){
	include ''.ft.'module/pesan.php';
}elseif($module=='produk' && isset($kategori)){
	include ''.ft.'module/content.php';
}else{
	include ''.ft.'module/content.php';
}

?>