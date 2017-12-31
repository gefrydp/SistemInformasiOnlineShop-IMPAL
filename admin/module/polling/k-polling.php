<?php	
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	$sql_tanya=mysql_query("select *from t_polling");
	$row_tanya=mysql_fetch_assoc($sql_tanya);
	
	$sql_jawab1=mysql_query("select *from t_polling where id_polling=2");
	$row_jawab1=mysql_fetch_assoc($sql_jawab1);
		
	$sql_jawab2=mysql_query("select *from t_polling where id_polling=3");
	$row_jawab2=mysql_fetch_assoc($sql_jawab2);

	$sql_jawab3=mysql_query("select *from t_polling where id_polling=4");
	$row_jawab3=mysql_fetch_assoc($sql_jawab3);
	
	$sql_jawab4=mysql_query("select *from t_polling where id_polling=5");
	$row_jawab4=mysql_fetch_assoc($sql_jawab4);
	
	
	if(isset($_POST['simpan'])){
		$sql_tanya=mysql_query("update t_polling SET isi='".htmlentities($_POST['tanya'])."', status='Tanya', rating=0 where id_polling=1");
		$sql_jawab1=mysql_query("update t_polling SET isi='".htmlentities($_POST['jawab1'])."', status='Jawab', rating=0 where id_polling=2");
		$sql_jawab2=mysql_query("update t_polling SET isi='".htmlentities($_POST['jawab2'])."', status='Jawab', rating=0 where id_polling=3");
		$sql_jawab3=mysql_query("update t_polling SET isi='".htmlentities($_POST['jawab3'])."', status='Jawab', rating=0 where id_polling=4");
		$sql_jawab4=mysql_query("update t_polling SET isi='".htmlentities($_POST['jawab4'])."', status='Jawab', rating=0 where id_polling=5");
		
		echo "<script>alert('Polling Berhasil diperbarui!');window.location='index.php?module=polling';</script>";

	}
?>
<div class="path"><h3>- Kelola Polling : </h3></div>
<div class='input' style='padding:5px'>
<form name="form1" method="post" action="">
<table width="467" height="212" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <th width="162" align="left" scope="col">Pertanyaan</th>
    <td width="10" scope="col">:</td>
    <td width="298" scope="col"  align="left"><input name="tanya" type="text" id="tanya" size="40" maxlength="100" value="<?php echo $row_tanya['isi'] ?>"/></td>
  </tr>
  <tr>
    <th align="left">Jawaban</th>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td>:</td>
    <td  align="left"><input name="jawab1" type="text" id="jawab1" size="30" maxlength="30" value="<?php echo $row_jawab1['isi'] ?>" /></td>
  </tr>
  <tr>
    <td align="center">2</td>
    <td>:</td>
    <td  align="left"><input name="jawab2" type="text" id="jawab2" size="30" maxlength="30" value="<?php echo $row_jawab2['isi'] ?>" /></td>
  </tr>
  <tr>
    <td align="center">3</td>
    <td>:</td>
    <td  align="left"><input name="jawab3" type="text" id="jawab3" size="30" maxlength="30"  value="<?php echo $row_jawab3['isi'] ?>"/></td>
  </tr>
  <tr>
    <td align="center">4</td>
    <td>:</td>
    <td align="left"><input name="jawab4" type="text" id="jawab4" size="30" maxlength="30" value="<?php echo $row_jawab4['isi'] ?>" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="reset" name="batal" id="batal" value="Batal" class="button red" onClick="window.location.href='index.php?module=polling'">
        <input type="submit" name="simpan" class="button green" id="simpan" value="Simpan" />
	</td>
  </tr>
</table>
</form>
</div>