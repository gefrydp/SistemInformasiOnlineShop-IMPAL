<?php
	session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	if(isset($_POST['reset'])){
		$reset=mysql_query("UPDATE t_polling SET rating=0 WHERE status='Jawab'");
		echo "<script>alert('Polling Berhasil di Reset');window.location='index.php?module=polling&aksi=tampil';</script>";
	}

	$sql_tanya=mysql_query("select *from t_polling where status='Tanya'");
	$row_tanya=mysql_fetch_assoc($sql_tanya);

	$jml=mysql_query("SELECT SUM(rating) as jml_vote FROM t_polling");
	$j=mysql_fetch_assoc($jml);
	
	$jml_vote=$j['jml_vote'];
  
	$sql=mysql_query("SELECT * FROM t_polling WHERE status='Jawab'");

 ?>
 
<div class="path"><h3>- Hasil Polling :</h3></div>
<div class="input">
<form action="" method="post">	
<table width="500" height="76" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <th colspan="3" scope="col" height='30px'><font size='3px'><?php echo "".$row_tanya['isi']."" ?></font></th>
  </tr>
  
  <?php
		  
  while ($s=mysql_fetch_array($sql)){
	if($s['rating']>0){
		$prosentase = sprintf("%2.1f",(($s['rating']/$jml_vote)*100));
  	}else{
		$prosentase=0;
	}
	$gbr_vote   = $prosentase * 3;
  ?>
  
  <tr align='left' height='30px'>
    <td width="168"><?php echo "".$s['isi']."" ?></td>
    <td width="28">:</td>
    <td width="302"><?php echo "<img src='img/stat.jpg' width='".$gbr_vote."' height=12 border=0 style='margin-left:5px'> ".$s['rating']." ( ".$prosentase." % )" ?></td>
  </tr>
 <?php 
	}
  ?>
  <tr  align='left' height='30px'>
    <td><b>> Jumlah Pemilih</b></td>
    <td><b>:</b></td>
    <td><b><?php echo "".$jml_vote."" ?> Pemilih</b></td>
  </tr>
   <tr  align='right' height='30px'>
    <td></td>
    <td></td>
    <td><input type="button" name="edit" class="button green" id="edit" value="Edit" onClick="window.location.href='index.php?module=polling'">
		<input type="submit" name="reset" id="reset" value="Reset" class="button red" /><br></td>
  </tr>
</table>
</form>
<p></p>
 </div>