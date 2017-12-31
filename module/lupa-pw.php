<?php
session_start();
	
$email_lupa=$_POST['email'];
$captcha=$_POST['captcha'];

if(isset($_GET['forgot_key']) && isset($_GET['email'])){
	$sql_pw=mysql_query("select username from t_member where email='".$_GET['email']."' and forgot_key='".$_GET['forgot_key']."'") or die(mysql_error());
	$r_pw=mysql_num_rows($sql_pw);
	if($r_pw==1){
		$pw=makeForgotKey();
		$sql_pw=mysql_query("update t_member SET password='".md5($pw.$salt_pass)."' where email='".$_GET['email']."' and forgot_key='".$_GET['forgot_key']."'") or die(mysql_error());
		echo "<script>alert('Password Baru Anda : ".$pw."');window.location=('index.php?module=login');</script>";
		$sql_ubah=mysql_query("update t_member SET forgot_key='' where email='".$_GET['email']."'");
	}else{
		echo "<script>alert('Lupa Password Gagal!');window.location=('index.php');</script>";
	}
}
if(isset($_POST['kirim'])){
	if($captcha==$_SESSION['captcha_session']){
		$sql_check=mysql_query("select id_member from t_member where email='".$email_lupa."'");
		$num_check=mysql_num_rows($sql_check);
		$row_check=mysql_fetch_assoc($sql_check);
		if($num_check<1){
			echo "<script>alert('E-Mail Belum Terdaftar!');window.location=('index.php?module=lupa-password');</script>";
		}else{
			echo "<script>alert('Konfirmasi Berhasil Dikirim, Silahkan Check Email!');</script>";
			$username=$row_check['username'];
			forgot_password($email,$email_lupa,$username,$judul_web);
			
		}
	}else{
		echo "<script>alert('Captcha Salah!');</script>";
	}
}


function forgot_password($email,$email_lupa,$username,$judul_web){
          
		$random_key = makeForgotKey(); 
		$forgot_key = md5($random_key); 
     
		$sql = mysql_query("UPDATE t_member SET forgot_key='".$forgot_key."' WHERE email='".$email_lupa."'") or die(mysql_error()); 
     
    $subject = "[".$judul_web."] Lupa Password"; 
    $message = "Hi, Anda telah mengajukan perubahan kata sandi.
				Silahkan klik url dibawah ini untuk mengubah password anda : 
     
				http://".$_SERVER['HTTP_HOST']."/index.php?module=lupa-password&email=".$email_lupa."&forgot_key=".$forgot_key."
    
				Jika anda bukan pemilik akun ini, silahkan abaikan email ini.

				Untuk bantuan, Anda bisa menghubungi kami melalui : ".$email."

				Terima kasih,
				".$judul_web.""; 
     
    mail($email_lupa, $subject, $message, "From: ".$_SERVER['HTTP_HOST']." Webmaster<".$email.">\n X-Mailer: PHP/" . phpversion()); 
 } 


	?>