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
	
?>

<div class="path"><h3>- Polling : </h3></div>
<div class='input' style='padding:5px'>
<table width="467" height="212" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <th width="162" align="left" scope="col">Pertanyaan</th>
    <td width="10" scope="col">:</td>
    <td width="298" scope="col" align="left"><?php echo $row_tanya['isi'] ?></td>
  </tr>
  <tr>
    <th align="left">Jawaban</th>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td>:</td>
    <td align="left"><?php echo $row_jawab1['isi'] ?></td>
  </tr>
  <tr>
    <td align="center">2</td>
    <td>:</td>
    <td align="left"><?php echo $row_jawab2['isi'] ?></td>
  </tr>
  <tr>
    <td align="center">3</td>
    <td>:</td>
    <td align="left"><?php echo $row_jawab3['isi'] ?></td>
  </tr>
  <tr>
    <td align="center">4</td>
    <td>:</td>
    <td align="left"><?php echo $row_jawab4['isi'] ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="button" name="edit" id="edit" value="Edit" class="button blue" onClick="window.location.href='index.php?module=polling&aksi=kelola'"></td>
  </tr>
</table>
</div>