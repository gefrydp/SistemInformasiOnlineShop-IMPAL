<?php 

	session_start();

	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
		header('location:login.php');
	}

	$awalload = microtime(true);

	require_once "../includes/koneksi.php";
	require_once "../includes/lib.php";
	require_once "../includes/fungsi.php";
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "".$judul_web." - Halaman Login "; ?></title>
<link rel='SHORTCUT ICON' href='<?php echo ".".$favicon_web.""; ?>'>

<script src="js/jquery.min.js"></script>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="js/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="js/SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="js/js.js" type="text/javascript"></script>
<link href="js/SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="plugins/ckeditor/ckeditor.js" type="text/javascript"></script>

<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>

</head>

<body>

<div class="banner">
	<img src="<?php echo ".".$banner_web."" ?>" width="220px" height="40px">
</div>

<div class="text-welcome">
		<img src="img/icon/user-4.png" style="float:left; margin-top:5px; margin-left:-20px; margin-right:10px;">
		<font color="#222244"><b>Anda Login Sebagai <font color="#FF0000"><?php echo "".ubah_huruf_awal(" ",$level)."" ?></font></b> </font><br>
	
	<?php
		$sql_user=mysql_query("select *from t_user where id_user=".$_SESSION['id_user']."");
		$row_user=mysql_fetch_assoc($sql_user);
	?>
	
		<b>	Last Login : <font color="#FF0000"><?php echo "".$row_user['last_login']."" ?></font><br>
			IP Login : <font color="#FF0000"><?php echo "".$row_user['ip_login']."" ?></font> </b>
		<br>
	
	<a href='../index.php' target="_blank" style="color:#2BA6CB; text-decoration:none; position:absolute; margin-left:140px;"><i class="fa fa-arrow-right"></i> <b>Lihat Situs</b></a>
</div>

<div class="konten">
	<div class="side-menu">
		<div class="menu-header">
			<h2>MENU ADMIN </h2>
		</div>

	<div id="wrapper">
		<ul class="menu">
			<li><a href="index.php?module=dashboard" ><i class="fa fa-home"></i> Dashboard</a></li>
			<li><a href="#"><i class="fa fa-edit"></i>  Kelola<span><i class='fa fa-caret-down'></i></span></a>
				<ul>
					<li><a href="index.php?module=kategori">Kategori</a></li>
					<li><a href="index.php?module=produk">Produk</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-bars"></i>  Pesanan<span><i class='fa fa-caret-down'></i></span></a>
				<ul>
					<li><a href="index.php?module=order">Daftar Pesanan</a></li>
					<li> <a href="index.php?module=konfirmasi">Konfirmasi Pembayaran</a></li>
				</ul>
			</li>
			<li><a href="index.php?module=member"><i class="fa fa-users"></i>  Member</a></li>
			<li><a href="index.php?module=testimonial"><i class="fa fa-quote-right"></i> Testimonial</a></li>
			<li><a href="index.php?module=pesan"><i class="fa fa-envelope"></i>  Pesan<span><i class='fa fa-caret-down'></i></span></a>
				<ul>
					<li><a href="index.php?module=pesan">Kotak Masuk</a></li>
					<li><a href="index.php?module=pesan&aksi=kirim">Kirim Pesan</a></li>
				</ul>
			</li>
			<li><a href="#"><i class="fa fa-check-square"></i>  Polling<span><i class='fa fa-caret-down'></i></span></span></a>
				<ul>
					<li><a href="index.php?module=polling&aksi=tampil">Hasil Polling</a></li>
					<li><a href="index.php?module=polling">Polling</a></li>	
				</ul>
			<li><a href="#"><i class="fa fa-info-circle"></i>  Toko<span><i class='fa fa-caret-down'></i></span></span></a>
				<ul>
					<li><a href="index.php?module=profil">Profil</a></li>
					<li><a href="index.php?module=tentang">Tentang Kami</a></li>
					<li><a href="index.php?module=panduan">Panduan Belanja</a></li>
					<li><a href='index.php?module=kontak'>Kontak</a></li>
					<li><a href='index.php?module=sosmed'>Sosial Media</a></li>
					<li><a href='index.php?module=rekening'>Rekening</a></li>
				</ul>
			<li><a href="#"><i class="fa fa-wrench"></i>  Pengaturan<span><i class='fa fa-caret-down'></i></span></a>
				<ul>
					<li><a href="index.php?module=shipping">Pengiriman</a></li>	
					<li><a href="index.php?module=template">Template</a></li>	
					<li><a href='index.php?module=slider'>Slider</a></li>	
			<?php
				if($level=='super admin')		{
						echo "<li><a href='index.php?module=user'>User</a></li><li><a href='index.php?module=pengaturan'>Pengaturan Website</a></li>";
					}
				
			?>					
				</ul>
			</li>
				<li><a href="index.php?module=keluar"><i class="fa fa-power-off"></i>  Keluar</a></li>
			</ul>
	</div>
</div>

	<div class="isi">
<?php
	if($module=='kategori'){	
		if($aksi=='kelola' || $aksi=='hapus'){
			include "module/kategori/k-kategori.php";
		}else{
			include "module/kategori/kategori.php";
		}
	}elseif($module=='produk'){
		if($aksi=='kelola' || $aksi=='hapus'){
			include "module/produk/k-produk.php";
		}else{
			include "module/produk/produk.php";
		}		
	}elseif($module=='order'){
		if($aksi=='kelola'){
			include 'module/order/k-order.php';
		}elseif($id!=''){
			include 'module/order/detail.php';
		}else{
			include "module/order/order.php";
		}
	}elseif($module=='konfirmasi'){
			include 'module/konfirmasi/konfirmasi.php';
	}elseif($module=='template'){
		if($aksi=='kelola' || $aksi=='hapus'){
			include 'module/template/k-template.php';
		}else{
			include 'module/template/template.php';
		}
	}elseif($module=='rekening'){
		if($aksi=='kelola' || $aksi=='hapus'){
			include 'module/rekening/k-rekening.php';
		}else{
			include 'module/rekening/rekening.php';
		}
	}elseif($module=='tentang'){
			include 'module/profil/tentang.php';
	}elseif($module=='polling'){
		if($aksi=='kelola'){
			include 'module/polling/k-polling.php';
		}elseif($aksi=='tampil'){
			include 'module/polling/tampil-polling.php';
		}else{
			include 'module/polling/polling.php';
		}
	}elseif($module=='panduan'){
			include 'module/pengaturan/panduan.php';
	}elseif($module=='kontak'){
			include 'module/kontak/kontak.php';
	}elseif($module=='slider'){
			include 'module/slider/slider.php';
	}elseif($module=='sosmed'){
			include 'module/kontak/sosmed.php';
	}elseif($module=='profil'){
		if($aksi=='kelola'){
			include 'module/profil/k-profil.php';
		}else{
			include 'module/profil/profil.php';
		}
	}elseif($module=='testimonial'){
			include 'module/testimonial/testimonial.php';
		
	}elseif($module=='shipping'){
		if($aksi=='kelola' || $aksi=='hapus'){
			include 'module/ongkir/k-shipping.php';
		}else{
			include "module/ongkir/shipping.php";
		}
	}elseif($module=='member'){
		if(isset($id)){
			include "module/member/detail.php";
		}else{
			include "module/member/member.php";
		}
	}elseif($module=='user' && $level=='super admin'){
		if($aksi=='kelola' ){
			include "module/user/k-user.php";
		}else{
			include "module/user/user.php";
		}
	}elseif($module=='pengaturan' && $level=='super admin'){
		include "module/pengaturan/pengaturan.php";
	}elseif($module=='pesan'){
		if($aksi=='kirim'){
				include "module/pesan/kirim-pesan.php";
			}else{
				include "module/pesan/kotak-pesan.php";
		}
	}elseif($module=='keluar'){
		$sql_user=mysql_query("update t_user SET ip_login='".$_SERVER['REMOTE_ADDR']."',last_login='".date("d-m-Y H:i")."' where id_user=".$_SESSION['id_user'].""); 
		session_destroy();
		session_unset();
		echo "<script>window.location=('login.php');</script>";
	}else{
		include "module/dashboard/dashboard.php";
	}
?>

	</div>
		<br><br>
</div>
<br>

<center>
	<font style="color:#888888"><?php echo "".$judul_web.""; $akhirload = microtime(true); $waktuload = $akhirload  - $awalload; ?> - Powered by vMart - Version  <?php  echo "".versi_cms." - Page Load : " . number_format($waktuload, 3, '.', '') . " s"; ?></center>
	<br>
</div>

</body>
</html>

<script>	  
	$(document).ready(function() {
		$("#single_1").fancybox({
			  helpers: {
				  title : {
					  type : 'float'
				  }
			  }
		  });

	});
 </script> 
<script type="text/javascript">
	$(function() {
	
	    var menu_ul = $('.menu > li > ul'),
	           menu_a  = $('.menu > li > a');
	    
	    menu_ul.hide();
	
	    menu_a.click(function(e) {
	        
	        if(!$(this).hasClass('active')) {
	            menu_a.removeClass('active');
	            menu_ul.filter(':visible').slideUp('normal');
	            $(this).addClass('active').next().stop(true,true).slideDown('normal');
	        } else {
	            $(this).removeClass('active');
	            $(this).next().stop(true,true).slideUp('normal');
	        }
	    });
	
	});
</script>
 


