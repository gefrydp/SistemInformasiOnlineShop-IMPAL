<?php
	session_start();
	if(!isset($_SESSION['id_user'])){
		echo "<script>window.location=('login.php');</script>";
	}
	
	$sql_profil=mysql_query("select *from t_profil where id_profil=1");
	$row_profil=mysql_fetch_assoc($sql_profil);
	
	if(isset($_POST['simpan'])){
		$sql_simpan=mysql_query("update *from t_profil SET nama_toko='".htmlentities($_POST['nama_toko'])."', kota_toko='".htmlentities($_POST['kota_toko'])."', provinsi_toko='".htmlentities($_POST['provinsi_toko'])."', alamat_toko='".htmlentities($_POST['alamat_toko'])."', kode_pos='".htmlentities($_POST['kode_pos'])."' where id_profil=1");
		echo "<script>alert('Profil Berhasil diperbarui!');window.location=('index.php?module=profil');</script>";
	}
	
?>

<div class="path"><h3>- Edit Profil Toko : </h3></div>
<div class="input" style="padding:5px">
<p></p>
<form name="form1" method="post" action="">
<table width="489" height="250" cellpadding="0" cellspacing="0" align="center">
  <tr align="left">
    <td width="227" scope="col">Nama Toko</td>
    <td width="10" scope="col">:</td>
    <td width="256" scope="col"><span id="sprytextfield1"><input name="nama_toko" type="text" id="nama_toko" size="40" maxlength="50" value="<?php echo $row_profil['nama_toko'] ?>" /><br /><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
  </tr>
  <tr align="left">
    <td>Kota</td>
    <td>:</td>
    <td><span id="sprytextfield2"><input name="kota_toko" type="text" id="kota_toko" size="30" maxlength="50" value="<?php echo $row_profil['kota_toko'] ?>" /><br /><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
  </tr>
  <tr align="left">
    <td>Provinsi</td>
    <td>:</td>
    <td><span id="sprytextfield3"><input name="provinsi_toko" type="text" id="provinsi_toko" size="30" maxlength="50" value="<?php echo $row_profil['provinsi_toko'] ?>" /><br /><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
  </tr>
  <tr align="left">
    <td>Alamat</td>
    <td>:</td>
    <td><span id="sprytextfield4"><input name="alamat_toko" type="text" id="alamat_toko" size="50" maxlength="300" value="<?php echo $row_profil['alamat_toko'] ?>" /><br /><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
  </tr>
  <tr align="left">
    <td>Kode POS</td>
    <td>:</td>
    <td><span id="sprytextfield5"><input name="kode_pos" type="text" id="kode_pos" size="10" maxlength="10" value="<?php echo $row_profil['kode_pos'] ?>" onkeypress="return harusangka(event)"/><br /><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td></td>
    <td align="right">
	<input type="reset" name="batal" id="batal" value="Batal" class="button red" onClick="window.location.href='index.php?module=profil'">
            <input type="submit" name="simpan" class="button green" id="simpan" value="Simpan" />
	</td>
  </tr>
</table>
</form>
<p></p>
</div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");


</script>