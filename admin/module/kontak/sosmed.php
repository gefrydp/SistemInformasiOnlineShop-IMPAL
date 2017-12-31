<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}

		if(isset($_POST['simpan'])){
			$sql_simpan=mysql_query("update t_kontak SET facebook='".htmlentities($_POST['facebook'])."', twitter='".htmlentities($_POST['twitter'])."', pinterest='".htmlentities($_POST['pinterest'])."', googleplus='".htmlentities($_POST['gp'])."' where id_kontak=1") or die(mysql_error());
			echo "<script>alert('Data Berhasil diperbarui!');window.location='index.php?module=sosmed';</script>";
		}
		
		
	$sql_edit=mysql_query("select *from t_kontak");
	$row_edit=mysql_fetch_assoc($sql_edit);


?>
<div class="path"><h3>- Sosial Media : </h3></div>
<div class="input">
<form name="form1" method="post" action="">
<table width="400" height="159" cellpadding="0" cellspacing="0" align="center"><br>
  <tr align="left">
    <td width="177" scope="col">Facebook</td>
    <td width="14" scope="col">:</td>
    <td width="276" scope="col"><input name="facebook" type="text" id="facebook" size="40" maxlength="100" value="<?php echo $row_edit['facebook']; ?>" /></td>
  </tr>
  <tr align="left">
    <td>Twitter</td>
    <td>:</td>
    <td><input name="twitter" type="text" id="twitter" size="40" maxlength="100" value="<?php echo $row_edit['twitter']; ?>" /></td>
  </tr>
  <tr align="left">
    <td>Pinterest</td>
    <td>:</td>
    <td><input name="pinterest" type="text" id="pinterest" size="40" maxlength="100" value="<?php echo $row_edit['pinterest']; ?>" /></td>
  </tr>
  <tr align="left">
    <td>Google Plus</td>
    <td>:</td>
    <td><input name="gp" type="text" id="gp" size="40" maxlength="100" value="<?php echo $row_edit['googleplus']; ?>" /></td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="reset" name="batal" id="batal" value="Batal" class="button red" onClick="window.location.href='index.php?module=sosmed'">
            <input type="submit" name="simpan" class="button green" id="simpan" value="Simpan" /></td>
  </tr>
</table>
<p></p>
</form>
</div>