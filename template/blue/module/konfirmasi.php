<?php
	require "./module/konfirmasi.php";
?>

<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
<div class="bread"><b style="font-weight:bold">- Konfirmasi Pembayaran :</b></div>
  <table width="500" height="157" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="192" scope="col">ID Tagihan</td>
      <td width="10" scope="col">:</td>
      <td width="238" scope="col">      <input name="id_order" type="text" id="id_order" value="<?php echo "".$id."" ?>" size="20" readonly="readonly" /></td>
    </tr>
        <tr>
      <td>Foto Faktur</td>
      <td>:</td>
      <td>
        <input type="file" name="foto" id="foto" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="submit" name="kirim" id="kirim" value="Kirim" class="button green" /></td>
    </tr>
  </table>

 <div class="bread"><font style="color:#FF0000; font-weight:bold;">* Pastikan Informasi di Akun Anda Benar</font></div>

</form>