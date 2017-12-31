<?php

	$BatasAwal = 5; // Jumlah Konten Yang Ditampilkan //
	
	require "./module/pesan.php";
	require "./includes/paging.php";


?>
<style type="text/css">
.tab {
	color: #FFF;
}
</style>
<div class="bread"><b style='font-weight:bold'>- Pesan :</b></div><br>

<table width="550" height="588" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="278" valign="top" scope="col">
     
      <form name="form1" method="post" action="">
        <table width="504" height="91" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="164" scope="col" height="40px">Judul Pesan</td>
            <td width="11" scope="col">:</td>
            <td width="427" scope="col"><span id="sprytextfield1">
              <input name="judul" type="text" id="judul" size="40" maxlength="50"><br>
              <span class="textfieldRequiredMsg">Input Masih Kosong!.</span></span></td>
</tr>
          <tr>
            <td>Isi Pesan</td>
            <td>:</td>
            <td><span id="sprytextarea1">
              <textarea name="isi" id="isi" cols="40" rows="8"></textarea><br><span class="textareaRequiredMsg">Input Masih Kosong!.</span></span><p id="remaining" >Maksimal 200 karakter</p>
              </td>
</tr>
          <tr>
            <td></td>
            <td></td>
            <td><br><span id="sprytextfield2"><img src="./plugins/captcha/captcha.php"><br><br>
              <input name="cap" type="text" id="cap" size="10" maxlength="10"><br>
              <span class="textfieldRequiredMsg">(Masukkan 3 kode di atas)</span></span></td>
</tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right"><input type="submit" name="kirim" id="kirim" class="button green" value="Kirim"></td>
          </tr>
  
        </table>
      </form>
  
  </td>
  </tr>
  
  <tr>
    <td height="308" valign="top">
	<br>
    </h3>
      
  <div class="bread"><b style='font-weight:bold'>- Kotak Masuk :</b></div><br>
         
     
<?php 

		$tampil=mysql_query("select *from t_pesan where untuk=".$id_member." order by tgl_pesan limit ".$MulaiAwal.",".$BatasAwal."");
		while($rt=mysql_fetch_assoc($tampil)){
			$dari=$rt['dari'];
			$judul=$rt['judul_pesan'];
			$isi=$rt['isi_pesan'];
			
			echo "
			<table width='555' height='176' cellpadding='0' align='center' cellspacing='0'>
		  <tr align=left bgcolor=#F4E6C9 >
			<td width='124' height='41' scope='col'><b>&nbsp;Dari</b></td>
			<td width='11' scope='col'>:</td>
			<td width='388' scope='col'>".$dari."</td>

		  </tr>
		  <tr align=left bgcolor=#FFF6CF>
			<td ><b>&nbsp;Judul Pesan<b/></td>
			<td>:</td>
			<td>".$judul."</td>
			 </tr>
		  <tr align=left bgcolor=#F4E6C9 >
			<td><b>&nbsp;Isi Pesan<b/></td>
			<td>:</td>
			<td>".$isi."</td>
		 
		  </tr>
		</table><br>
		";}
	?> 

 <?php
  $cekQuery = mysql_query("select *from t_pesan ");
    $jumlahData = mysql_num_rows($cekQuery);
    if ($jumlahData > $BatasAwal) {
        echo '<br/><center><div style="font-size:10pt;">Halaman : ';
        $a = explode(".", $jumlahData / $BatasAwal);
        $b = $a[0];
        $c = $b + 1;
        for ($i = 1; $i <= $c; $i++) {
            echo '<a style="text-decoration:none;';
            if ($_GET['p'] == $i) {
                echo 'color:red';
            }
            echo '" href="index.php?module=pesan&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }
?>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>

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
