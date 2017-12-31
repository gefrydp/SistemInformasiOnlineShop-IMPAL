<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}

	
if(isset($_POST['kirim'])){
	$sql=mysql_query("insert into t_pesan (tgl_pesan,dari,untuk,judul_pesan,isi_pesan) VALUES ('".$tgl_sekarang."','Admin','".htmlentities($_POST['untuk'])."','".htmlentities($_POST['judul'])."','".htmlentities($_POST['isi'])."')");
	echo "<script>alert('Pesan Berhasil Dikirim!');window.location=('index.php?module=pesan');</script>";
}
//fungsi pagination
    $BatasAwal = 7;
    if (!empty($_GET['p'])) {
        $hal = $_GET['p'] - 1;
        $MulaiAwal = $BatasAwal * $hal;
    } else if (!empty($_GET['p']) and $_GET['p'] == 1) {
        $MulaiAwal = 0;
    } else if (empty($_GET['p'])) {
        $MulaiAwal = 0;
    }


?>


<div class="path"><h3>- Kirim Pesan : </h3></div>
  <br>
<br>
<div class="input" style='width:700px'>
<table width="700" align="center" cellpadding="0" cellspacing="0">
  <tr align="left">
    <td height="278" valign="top" scope="col">
     <br>
      <form name="form1" method="post" action="">
        <table width="604" height="91" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td scope="col">Kepada</td>
            <td scope="col">:</td>
            <td scope="col"><select name="untuk" id="untuk"><?php $u=mysql_query("select *from t_member");
			while($r=mysql_fetch_assoc($u)){
				echo "<option value=".$r['id_member'].">".ubah_huruf_awal(" ",$r['username'])."</option>"; }?>
            </select></td>
          </tr>
          <tr>
            <td width="164" scope="col">Judul Pesan</td>
            <td width="11" scope="col">:</td>
            <td width="427" scope="col"><span id="sprytextfield1">
              <input name="judul" type="text" id="judul" size="50" maxlength="50">
              <br><span class="textfieldRequiredMsg">Input Masih Kosong!.</span></span></td>
</tr>
          <tr>
            <td>Isi Pesan</td>
            <td>:</td>
            <td><span id="sprytextarea1">
              <textarea name="isi" id="isi" cols="50" rows="8"></textarea>
              <br><span class="textareaRequiredMsg">Input Masih Kosong!.</span></span><p id="remaining" >Maksimal 200 karakter</p></td>
</tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right"><br><input type="submit" class='button blue' name="kirim" id="kirim" value="Kirim"></td>
          </tr>
        
        </table>
    </form><br></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</div>

<script type="text/javascript">
  $(document).ready(function(){
  $("#isi").keyup(function(){
   if(this.value.length>200){
    this.value=this.value.substring(0,200);
   }
   $("#remaining").text("Karakter tersisa : " + (200-this.value.length));
    })
  })
</script>
