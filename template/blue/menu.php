<?php 
	if($id_member==''){
		echo "<div style='margin-left:60%'>
				<li><img src='".ft."images/icon/key.png'> <a href='index.php?module=login'>Login</a></li>
				<li><img src='".ft."images/icon/user-2-add.png'> <a href='index.php?module=daftar'>Daftar</a></li></div>";
	}else{
		echo "		
		<div style='margin-left:-40px'>
			<li><img src='".ft."images/icon/user.png' /> <a href='index.php?module=akun'>Akun</a></li>
			<li><img src='".ft."images/icon/compose.png' /> <a href='index.php?module=tagihan'>Tagihan</a></li>
			<li><img src='".ft."images/icon/envelope.png' height=15px> <a href='index.php?module=pesan'>Pesan </a></li>
			<li><img src='".ft."images/icon/speech-bubble-right-2.png' height=15px> <a href='index.php?module=testimonial'>Testimoni </a></li>
			<li><img src='".ft."images/icon/power.png' height=15px> <a href='index.php?module=keluar'>Keluar </a></li></div>
	";
	}
?>