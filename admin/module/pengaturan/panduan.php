<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}


	$sql=mysql_query("select *from t_pengaturan where id=1");
	$row=mysql_fetch_assoc($sql);

if(isset($_POST['simpan'])){
	$sql_simpan=mysql_query("update t_pengaturan SET panduan='".$_POST['panduan']."' where id=1") or die(mysql_error());
	echo "<script>alert('Panduan Belanja Berhasil diperbarui!');window.location=('index.php?module=panduan');</script>";
}

?>
<div class="path"><h3>- Panduan Belanja</h3></div>
<div class="input" style="width:800px">
<form action="" method="post" name="form1"><br>
<table width="781" height="467" cellpadding="0" cellspacing="0">
  <tr>
    <td width="189" height="237" scope="col">Panduan Belanja</td>
    <td width="18" align="center" scope="col">:</td>
    <td width="591" scope="col"><textarea name="panduan" id="panduan" cols="45" rows="5"><?php echo $row['panduan'] ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><br><input type="reset" name="batal" class="button red" id="batal" value="Batal" onClick="window.location.href='index.php?module=panduan'"/><input type="submit" class="button green" name="simpan" id="simpan" value="Simpan"><br></td>
  </tr>
</table>
</div>
</form>

	<script>    
    		CKEDITOR.replace( 'panduan', {
			fullmodule: true,
			allowedContent: true
			});
	</script>