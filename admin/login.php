<?php
	session_start();
	
	include "../includes/koneksi.php";
	include "../includes/lib.php";
      	
      	$username=htmlentities(trim($_POST['username'])); // Filter Input Username
      	$password=md5(htmlentities(trim($_POST['password'].$salt_pass))); // Filter Input Password

if(isset($_POST['login'])){
	$sql_login=mysql_query("select *from t_user where username='".$username."' and password='".$password."'"); 
	$row=mysql_fetch_assoc($sql_login);
	$login=mysql_num_rows($sql_login);
	if($login==1){
    		$_SESSION['id_user']=$row['id_user'];
    		$_SESSION['username']=$row['username'];
    		$_SESSION['level']=$row['level'];
  			echo "<script>window.location=('index.php');</script>";
	}else{
		echo "<script>alert('Login Gagal, Check Kembali Username dan Password!');</script>";
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "".$judul_web." - Halaman Login "; ?></title>
<link rel='SHORTCUT ICON' href='<?php echo ".".$favicon_web.""; ?>'>
<link href="css/login.css"  rel="stylesheet" type="text/css"></script>
<link href="js/SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="js/SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<p>&nbsp;</p>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="497" class="table" height="249" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th height="25" colspan="4" align="center" bgcolor="#00ADF1" scope="col" valign="middle"><h2><strong class="judul-login">ADMINISTRATOR LOGIN</strong></h2></th>
    </tr>
    <tr>
      <td width="18" rowspan="3" align="center" bgcolor="#DAD5D3"><img src="img/login.png" width="134" height="136" /></td>
      <td width="103" height="47" bgcolor="#DAD5D3">Username</td>
      <td width="13" bgcolor="#DAD5D3">:</td>
      <td width="201" bgcolor="#DAD5D3"><span id="sprytextfield1">
        <input name="username" type="text" id="username" size="20" maxlength="20" />
        <span class="textfieldRequiredMsg">Input Tidak Boleh Kosong!.</span></span></td>
</tr>
    <tr>
      <td height="40" bgcolor="#DAD5D3">Password</td>
      <td bgcolor="#DAD5D3">:</td>
      <td bgcolor="#DAD5D3"><span id="sprytextfield2">
        <input name="password" type="password" id="password" size="20" maxlength="40" />
        <span class="textfieldRequiredMsg">Input Tidak Boleh Kosong!</span></span></td>
</tr>
    <tr>
      <td height="76" bgcolor="#DAD5D3">&nbsp;</td>
      <td bgcolor="#DAD5D3">&nbsp;</td>
      <td style="padding-right:40px" align="right" bgcolor="#DAD5D3"><input type="submit" class="button green" name="login" id="login" value="Login" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" bgcolor="#DAD5D3"><font size="2" color="#272727"><em>Powered by vMart - Version <?php echo"".versi_cms."" ?></em></font></td>
    </tr>
  </table>
</form>
<table width="532" height="230" align="center" cellpadding="0" cellspacing="0">
  <tr>  </tr>
<tr>  </tr>
</table>

<script type="text/javascript">
  var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
  var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
</body>
</html>