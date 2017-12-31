<?php
	session_start();
	if(!isset($_SESSION['id_user'])){
		echo "<script>window.location=('login.php');</script>";
	}
	
	$sql_pro=mysql_query("select *from t_profil where id_profil=1");
	$row_pro=mysql_fetch_assoc($sql_pro);
?>

<div class="path"><h3>- Profil Toko : </h3></div>
<div class="input" style="padding:5px">
<p></p>
<table width="425" height="240" cellpadding="0" cellspacing="0"  align="center">
  <tr align="left">
    <td width="205" scope="col">Nama Toko</td>
    <td width="11" scope="col">:</td>
    <td width="316" scope="col"><?php echo $row_pro['nama_toko']; ?></td>
  </tr>
  <tr align="left">
    <td>Kota</td>
    <td>:</td>
    <td><?php echo $row_pro['kota_toko']; ?></td>
  </tr>
  <tr align="left">
    <td>Provinsi</td>
    <td>:</td>
    <td><?php echo $row_pro['provinsi_toko']; ?></td>
  </tr>
  <tr align="left">
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $row_pro['alamat_toko']; ?></td>
  </tr>
  <tr align="left">
    <td>Kode POS</td>
    <td>:</td>
    <td><?php echo $row_pro['kode_pos']; ?></td>
  </tr>
  <tr align="right">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
		<input type="button" name="edit" id="edit" value="Edit" class="button green" onClick="window.location.href='index.php?module=profil&aksi=kelola'">
	
	
	</td>
  </tr>
</table>
</div>