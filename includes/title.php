<?php 

if($module=='cart'){
	$title="".$judul_web." - Keranjang Belanja";
}elseif($module=='login'){
	$title="".$judul_web." - Login";
}elseif($module=='akun'){
	if($aksi=='update'){
		$title="".$judul_web." - Perbarui Akun";
	}else{
		$title="".$judul_web." - Akun";
	}
}elseif($module=='daftar'){
	$title="".$judul_web." - Pendaftaran";
}elseif($module=='lupa-password'){
	$title="".$judul_web." - Lupa Password";
}elseif($module=='testimonial'){
	$title="".$judul_web." - Testimoni";
}elseif($module=='detail'){
	$title="".$judul_web." - Detail Produk - ".$_GET['id']."";
}elseif($module=='tagihan'){
		if($aksi=='confirm'){
			$title="".$judul_web." - Konfirmasi Tagihan";
		}elseif(isset($_GET['id'])){
			$title="".$judul_web." - Detail Tagihan - ".$_GET['id']."";
		}else{
			$title="".$judul_web." - Tagihan";
		}
}elseif($module=='panduan'){
	$title="".$judul_web." - Panduan Belanja";
}elseif($module=='tentang'){
	$title="".$judul_web." - Tentang Kami";
}elseif($module=='check-out'){
	$title="".$judul_web." - Check Out";
}elseif($module=='pesan'){
	$title="".$judul_web." - Pesan";
}elseif($module=='produk' && isset($kategori)){
	$title="".$judul_web." - Kategori - ".$kategori."";
}else{
	$title="".$judul_web."";
}




?>