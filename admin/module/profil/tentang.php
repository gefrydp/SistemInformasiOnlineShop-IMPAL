<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}

	$sql=mysql_query("select *from t_profil where id_profil=1");
	$row=mysql_fetch_assoc($sql);

if(isset($_POST['simpan'])){
	$sql_simpan=mysql_query("update t_profil SET tentang_toko='".$_POST['tentang']."' where id_profil=1") or die(mysql_error());
	echo "<script>alert('Tentang Kami Berhasil diperbarui!');window.location=('index.php?module=tentang');</script>";
}

?>
<div class="path"><h3>- Tentang Kami</h3></div>
<div class="input" style="width:800px">
<form action="" method="post" name="form1"><br>
<table width="781" height="467" cellpadding="0" cellspacing="0">
  <tr>
    <td width="189" height="237" scope="col">Tentang</td>
    <td width="18" align="center" scope="col">:</td>
    <td width="591" scope="col"><textarea name="tentang" id="tentang" cols="45" rows="5"><?php echo $row['tentang_toko'] ?></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><br><input type="reset" name="batal" id="batal" class="button red" value="Batal" onClick="window.location.href='index.php?module=tentang'"/><input type="submit" class="button green" name="simpan" id="simpan" value="Simpan"><br></td>
  </tr>
</table>
</div>
</form>

	<script>    
    		CKEDITOR.replace( 'tentang', {
			fullmodule: true,
			allowedContent: true
			});
	</script>