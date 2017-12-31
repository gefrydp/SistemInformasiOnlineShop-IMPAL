<?php
	require "./module/u-akun.php";

?>

<div class="bread"><b style="font-weight:bold">- Update Akun :</b></div>

<br>
<form name="form1" method="post" action="index.php?module=akun&aksi=update">

  <table width="513" height="489" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="155" scope="col">Username</td>
      <td width="10" scope="col">:</td>
      <td width="332" scope="col"><span id="sprytextfield1"><input name="username" type="text" id="username" value="<?php echo $username ?>" size="20" maxlength="20"> <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
	 <tr>
      <td>Password Lama</td>
      <td>:</td>
      <td><input name="password_lama" type="password" id="password_lama" value="" size="20" maxlength="20"> <br />
           </td>
    </tr>
    <tr>
      <td>Password Baru</td>
      <td>:</td>
      <td><span id="sprytextfield3"><input name="password_baru" type="password" id="password_baru" value="" size="20" maxlength="20"> <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>:</td>
      <td><span id="sprytextfield4"><input name="nama_lengkap" type="text" id="nama_lengkap" value="<?php echo $nama_lengkap ?>" size="50" maxlength="100"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
	<tr>
      <td>E-Mail</td>
      <td>:</td>
      <td><span id="sprytextfield10"><input name="email" type="text" id="email" value="<?php echo $email ?>" size="30" maxlength="100"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>:</td>
      <td><span id="sprytextfield5"><input name="no_hp" type="text" id="no_hp" onkeypress='return harusangka(event)' value="<?php echo $no_telp ?>" size="20" maxlength="20"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td><span id="sprytextfield6"><input name="alamat" type="text" id="alamat" value="<?php echo $alamat ?>" size="50" maxlength="100"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td>Provinsi</td>
      <td>:</td>
      <td><span id="sprytextfield7"><input name="provinsi" type="text" id="provinsi" value="<?php echo $provinsi ?>" size="40" maxlength="40"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td>Kota</td>
      <td>:</td>
      <td><span id="sprytextfield8"><input name="kota" type="text" id="kota" value="<?php echo $kota ?>" size="40" maxlength="40"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td>Kode Pos</td>
      <td>:</td>
      <td><span id="sprytextfield9"><input name="kode_pos" type="text" id="kode_pos" onkeypress='return harusangka(event)' value="<?php echo $kode_pos ?>" size="10" maxlength="10"><br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
    </tr>
    <tr>
      <td height="44">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="reset" name="batal" id="batal" value="Batal" class="button blue" onClick="window.location.href='index.php?module=akun'">
        <input type="submit" name="simpan" id="simpan" class="button blue" value="Update"></td>
    </tr>
  </table>

 <div class="bread"><font style="color:#FF0000; font-weight:bold;">* Pastikan Informasi di Akun Anda Benar</font></div>

</form>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
</script>

