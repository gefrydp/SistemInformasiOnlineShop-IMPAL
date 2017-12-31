<?php	

	require "./module/daftar.php";

?>

<div class="bread"><b style="font-weight:bold">- Pendaftaran :</b></div><br>

<form name="form1" method="post" action="">
<table width="483" height="550" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>Username</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield2">
        <label for="username"></label>
        <input name="username" type="text" id="username" size="20" maxlength="20" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield3">
        <input name="password" type="password" id="password" size="20" maxlength="20" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>Ulangi Password</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield12">
        <input name="password_ulang" type="password" id="password_ulang" size="20" maxlength="20" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield4">
        <input name="nama_lengkap" type="text" id="nama_lengkap" size="50" maxlength="100" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>E-Mail</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield11">
        <input name="email" type="text" id="email" size="40" maxlength="100"/>
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>No.HP</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield5">
        <input name="no_hp" type="text" id="no_hp" size="20" maxlength="20" onkeypress='return harusangka(event)'  />
        <br/>
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>Alamat</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield6">
        <input name="alamat" type="text" id="alamat" size="50" maxlength="300" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>Kota</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield8">
        <input name="kota" type="text" id="kota" size="40" maxlength="50" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
     
	</tr>
    <tr>
		<td>Provinsi</td>
		<td>:</td>
		<td align="left" valign="middle"><span id="sprytextfield7">
        <input name="provinsi" type="text" id="provinsi" size="40" maxlength="50" />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
    <tr>
      <td>Kode Pos</td>
      <td>:</td>
      <td align="left" valign="middle"><span id="sprytextfield9">
        <input name="kode_pos" type="text" id="kode_pos" size="10" maxlength="10" onkeypress='return harusangka(event)'  />
        <br />
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
	</tr>
	<tr>
      <td></td>
      <td></td>
      <td align="left" valign="middle"><span id="sprytextfield10">
		<img src="./plugins/captcha/captcha.php"><br><br>
        <input name="cap" type="text" id="cap" size="10" maxlength="10"><br>
        <span class="textfieldRequiredMsg">(Masukkan 3 kode di atas)</span></span></td>
	</tr>
    <tr>
      <td height="41">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right">
			<input type="reset" name="Batal" id="Batal" value="Batal" class="button red" />
			<input type="submit" name="simpan" id="simpan" value="Daftar" class="button green" /></td>
    </tr>
  </table>
</form>

<br>

<div class="bread"><font style='color:#FF0000; font-weight:bold;'>* Pastikan Informasi Yang Anda Masukan Benar</font></div>

<script type="text/javascript">
	var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
	var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
	var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
	var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
	var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
	var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
	var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
</script>