<?php
	require "./module/testimonial.php";

?>
<div class="bread"><b style='font-weight:bold'>- Testimoni :</b></div><br>
<form action="" method="post" name="form1" id="form1">
<table width="521" height="124" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="102" height="39" scope="col">Testimoni</td>
    <td width="67" scope="col">:</td>
    <td width="249" scope="col"><span id="sprytextarea1"><textarea name="isi" id="isi" cols="45" rows="4"></textarea> <span class="textareaRequiredMsg">Input Masih Kosong!.</span></span><p id="remaining" >Maksimal 100 karakter</p></td>
  </tr>
    <tr>
            <td></td>
            <td></td>
            <td><br><span id="sprytextfield1"><img src="./plugins/captcha/captcha.php"><br><br>
              <input name="cap" type="text" id="cap" size="10" maxlength="10"><br>
              <span class="textfieldRequiredMsg">(Masukkan 3 kode di atas)</span></span></td>
</tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><br><input type="reset" name="batal" id="batal" value="Batal" onClick="window.location.href='index.php'">
        <input type="submit" name="kirim" id="kirim" value="Kirim"></td>
  </tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>

<script type="text/javascript">
  $(document).ready(function(){
  $("#isi").keyup(function(){
   if(this.value.length>100){
    this.value=this.value.substring(0,100);
   }
   $("#remaining").text("Karakter tersisa : " + (100-this.value.length));
    })
  })
</script>