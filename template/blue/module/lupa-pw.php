<?php
	require "./module/lupa-pw.php";
?>
<div class="bread"><b style="font-weight:bold">- Lupa Password :</b></div>
<br>
<form name="form1" method="post" action="">
  <table width="398" height="213" align="center" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td scope="col">Email</td>
      <td scope="col">:</td>
      <td scope="col"><span id="sprytextfield1">
        <input name="email" type="text" id="email" size="40" maxlength="100">
        <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
</tr>
 <tr>
      <td></td>
      <td></td>
      <td><span id="sprytextfield2">
       <img src="./plugins/captcha/captcha.php"><br><br>
         <input name="captcha" type="text" id="captcha" size="10" maxlength="10"><br>
        <span class="textfieldRequiredMsg">(Masukkan 3 kode di atas)</span></span></td>
</tr>
    <tr>
      <td height="41">&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="kirim" id="kirim" value="Kirim" class="button green" />
       </td>
    </tr>
  </table><br>

</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
