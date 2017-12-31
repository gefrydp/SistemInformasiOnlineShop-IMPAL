<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	$table='t_shipping';
	$link='index.php?module=shipping';
	$pk='id_shipping';

// Simpan //
if(isset($_POST['simpan'])){ 
	if(isset($id)){ 
// Simpan Edit //
		  $sql_aksi=mysql_query("update ".$table." SET wilayah='".htmlentities($_POST['wilayah'])."', biaya='".htmlentities($_POST['biaya'])."',kurir='".htmlentities($_POST['kurir'])."' where $pk='".$id."'") or die(mysql_error());
		  $alert='Diperbarui'; 
		}else{
// Simpan Tambah //
		  	$sql_aksi=mysql_query("insert into ".$table." (wilayah,biaya,kurir) VALUES ('".htmlentities($_POST['wilayah'])."','".htmlentities($_POST['biaya'])."','".htmlentities($_POST['kurir'])."')") ;
		  	$alert='Ditambahkan';
		}

// Peringatan //
			if($sql_aksi){
					echo "<script>alert('Data Berhasil $alert');window.location=('$link');</script>";
				}else{
					echo "<script>alert('Data Gagal $alert');window.location=('$link');</script>";
				}
	}

// Edit & Hapus //
if(isset($id)){
	$sql_check=mysql_query("select *from ".$table." where ".$pk."='".$id."'");
	$hitung_check=mysql_num_rows($sql_check);
	if($hitung_check>0){
		if($aksi=='hapus'){
				$sql_aksi=mysql_query("delete from ".$table." where ".$pk."='".$id."'");
				echo "<script>alert('Data Berhasil Dihapus!');window.location=('".$link."');</script>";
		}else{
			$sql_edit=mysql_query("select *from ".$table." where ".$pk."='".$id."'");
			$row_edit=mysql_fetch_assoc($sql_edit);
		}
	}else{
		echo "<script>alert('Data Tidak Tersedia!');window.location=('".$link."');</script>";
	}
}

	if(isset($aksi) && isset($id)){
		$judul="- Edit Shipping ".$id." :";
	}else{
		$judul="- Tambah Wilayah :";
	}
?>   

<div class="path"><h3><?php echo "".$judul."" ?> </h3></div>

<form action="" method="post" name="form1" id="form1"><div class="input">
<br>
<table width="440" height="138" cellpadding="0" cellspacing="0" align="center">
  <tr align="left">
    <td width="148" scope="col">Wilayah</td>
    <td width="11" scope="col">:</td>
    <td width="302" scope="col"><span id="sprytextfield1">
      <input name="wilayah" type="text" id="wilayah" size="40" maxlength="50" value="<?php echo $row_edit['wilayah'] ?>">
    <span class="textfieldRequiredMsg">Input Masih Kosong.</span></span></td>
  </tr>
  <tr align="left">
    <td>Biaya</td>
    <td>:</td>
    <td><span id="sprytextfield2">
      <input name="biaya" type="text" id="biaya" size="30" maxlength="50" onkeypress='return harusangka(event)' value="<?php echo $row_edit['biaya'] ?>">
    <br><span class="textfieldRequiredMsg">Input Masih Kosong.</span></span></td>
  </tr>
  <tr align="left">
    <td>Kurir</td>
    <td>:</td>
    <td><span id="sprytextfield3">
   
      <input name="kurir" type="text" id="kurir" size="40" maxlength="50" value="<?php echo $row_edit['kurir'] ?>">
    <span class="textfieldRequiredMsg">Input Masih Kosong.</span></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input type="reset" class="button red" name="batal" id="batal" value="Batal" onClick="window.location.href='index.php?module=shipping'"/>   <input type="submit" class="button green" name="simpan" id="simpan" value="Simpan"></td>
  </tr>
</table><br></div>
</form>
<script type="text/javascript">
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>