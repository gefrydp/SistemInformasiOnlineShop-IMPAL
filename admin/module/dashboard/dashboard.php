<?php 
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
?>

<br><br><center><br /><h2><strong>SELAMAT DATANG DI HALAMAN ADMINISTRATOR</strong></h2><br />
<h2 style="margin-top:-20px;"><b><?php echo "".ubah_huruf_awal(" ",$judul_web)."" ?></b></h2><br>
<p><img src="img/admin2.png" width="300" height="336" /></p><br /><br /><br>

</center></b>
