<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	

$t=mysql_query("select *from t_kontak");
$r=mysql_fetch_assoc($t);

if(isset($_POST['simpan'])){
	$sql=mysql_query("update t_kontak SET telpon='".htmlentities($_POST['telp'])."', sms='".htmlentities($_POST['sms'])."', bbm='".htmlentities($_POST['bbm'])."', email='".htmlentities($_POST['mail'])."', ym='".htmlentities($_POST['ym'])."' where id_kontak=1") or die(mysql_error());
	echo "<script>alert('Kontak berhasil diperbarui!');window.location='index.php?module=kontak';</script>";
}

?>


<div class="path"><h3>- Pengaturan Kontak :</h3></div>
<div class="input">
<form action="" method="post">	


<table width="351" height="257" cellpadding="0" cellspacing="0" align="center">
  <tr align='left'><br>
    <td width="190" scope="col">No. Telpon</td>
    <td width="10" scope="col">:</td>
    <td width="251" scope="col">      <input type="text" name="telp" id="telp" maxlength="20" onkeypress='return harusangka(event)' value="<?php echo $r['telpon'] ?>"	/></td>
  </tr>
  <tr align='left'>
    <td>No. SMS</td>
    <td>:</td>
    <td><input type="text" name="sms" id="sms" maxlength="20" onkeypress='return harusangka(event)'  value="<?php echo $r['sms'] ?>" /></td>
  </tr>
  <tr align='left'>
    <td>PIN BBM</td>
    <td>:</td>
    <td><input type="text" name="bbm" id="bbm" maxlength="10"  value="<?php echo $r['bbm'] ?>" /></td>
  </tr>
  <tr align='left'>
    <td>E-Mail</td>
    <td>:</td>
    <td><input type="text" name="mail" id="mail" maxlength="50"  value="<?php echo $r['email'] ?>" /></td>
  </tr>
  <tr align='left'>
    <td>Yahoo Messenger</td>
    <td>:</td>
    <td><input type="text" name="ym" id="ym" maxlength="50"  value="<?php echo $r['ym'] ?>" /></td>
  </tr>
  <tr align='right'>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align='right'><input type="reset" name="batal" class="button red" id="batal" value="Batal" onClick="window.location.href='index.php?module=kontak'">
            <input type="submit" name="simpan" id="simpan" value="Simpan" class="button green" /><br><br></td>
  </tr>
</table>
</div>
</form>
