<?php
	session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	
	
?>
<style type="text/css">
	.tabel {
		color: #FFF;
	}

	table a{
		text-decoration:none;
	}

	table a:hover{
		text-decoration:underline;
	}
</style>

   <div class="path"><h3>- Template : </h3></div><br>
   <div class="tambah">
<a href="index.php?module=template&aksi=kelola" ><img src="img/icon/add.png" title="Tambah"> Tambah Template</a></b>
</div>   
   <br>
<table width="418" height="67" cellpadding="0" cellspacing="1" align="center">
  <tr class="tabel" bgcolor="#575757">
    <th width="197" scope="col" height="36">Nama Template</th>
	<th width="100" scope="col">Status</th>
    <th width="119" scope="col">Aksi</th>
  </tr>
  
 <?php
	$sql_template=mysql_query("select *from t_templates");
	while($row_template=mysql_fetch_assoc($sql_template)){
		$idTemplate=$row_template['id_template'];
		$namaTemplate=$row_template['nama_template'];
		$statusTemplate=$row_template['aktif_template'];
			if($statusTemplate=='1'){
				$status="<font color='green'>Aktif</font>";
				$act="-";
			}else{
				$status="<font color='red'>Non-Aktif</font>";
				$act="<a href='index.php?module=template&aksi=kelola&id=".$idTemplate."'>Aktifkan</a><br>
					  <a href='index.php?module=template&aksi=hapus&id=".$idTemplate."'>Hapus</a><br>
					  ";
			}
	echo "
  <tr bgcolor=#F6F4F5>
    <td height='32'>".$namaTemplate."</td>
    <td>".$status."</td>
	<td>".$act."</td>
  </tr>

"; 
};
?>
</table>