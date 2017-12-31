<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	$table='t_rekening';
	$link='index.php?module=rekening';
	$pk='id_rekening';

// SIMPAN //
if(isset($_POST['simpan'])){ 

	if(isset($_GET['id'])){ 
// SIMPAN EDIT //
		  $sql_aksi=mysql_query("update $table SET nama_pemilik='".htmlentities($_POST['nama_pemilik'])."', no_rekening='".htmlentities($_POST['no_rekening'])."', nama_bank='".htmlentities($_POST['nama_bank'])."', cabang='".htmlentities($_POST['cabang'])."' where $pk=".$id."") or die(mysql_error());
		  $alert='Diperbarui'; 
		}else{
// SIMPAN TAMBAH //
$check=mysql_num_rows(mysql_query("select *from t_rekening"));
if($check>3){
	echo "<script>alert('Maaf, Rekening Dibatasi!');window.location='index.php?module=rekening';</script>";
}else{
		  	$sql_aksi=mysql_query("insert into $table (nama_pemilik,no_rekening,nama_bank,cabang) VALUE ('".htmlentities($_POST['nama_pemilik'])."','".htmlentities($_POST['no_rekening'])."','".htmlentities($_POST['nama_bank'])."','".htmlentities($_POST['cabang'])."')") or die(mysql_error());
		  	$alert='Ditambahkan';
		}
}
// ALERT //
			if($sql_aksi){
					echo "<script>alert('Rekening Berhasil $alert');window.location=('$link');</script>";
				}else{
					echo "<script>alert('Rekening Gagal $alert');window.location=('$link');</script>";
				}
	}

// TAMPIL EDIT & HAPUS //
if(isset($id)){
	$sql_check=mysql_query("select *from t_rekening where ".$pk."=".$id."");
	$check=mysql_num_rows($sql_check);
	if($check>0){
		if($aksi=='hapus'){
		$sql_aksi=mysql_query("delete from $table where ".$pk."='".$id."'");
			if($sql_aksi){
				echo "<script>alert('Rekening Berhasil Dihapus!');window.location=('".$link."');</script>";
			}else{
				echo "<script>alert('Rekening Gagal Dihapus!');window.location=('".$link."');</script>";
			}
		}else{
			$sql_edit=mysql_query("select *from ".$table." where ".$pk."='".$id."'");
			$row_edit=mysql_fetch_assoc($sql_edit);
				$nama_pemilik=$row_edit['nama_pemilik'];
				$no_rekening=$row_edit['no_rekening'];
				$nama_bank=$row_edit['nama_bank'];
				$cabang=$row_edit['cabang'];
		}
	}
}

if(isset($aksi) && isset($id)){
	$judul="- Edit Rekening ".$row_edit['nama_pemilik']." :";
}else{
	$judul="- Tambah Rekening :";
}

?>

<div class="path"><h3><?php echo "".$judul."" ?> </h3></div>
<div class="input"><br>
   <form action="" method="post" name="form1" id="form1">
      <table width="390" height="88" align="center" cellpadding="0" cellspacing="0">
        <tr align="left">
          <td width="122" height="45" scope="col" >Nama Pemilik</td>
          <td width="10" scope="col">:</td>
          <td width="312" scope="col"><span id="sprytextfield1">
            <input name="nama_pemilik" type="text" id="nama_pemilik" size="40" maxlength="100" value="<?php echo $nama_pemilik ?>" />
            <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
          </tr>
        <tr align="left">
          <td height="45">No. Rekening</td>
          <td>:</td>
          <td><span id="sprytextfield2">
            <input name="no_rekening" type="text" id="no_rekening" size="40" maxlength="100" onkeypress='return harusangka(event)' value="<?php echo $no_rekening ?>"  />
            <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
          </tr>
        <tr>
		      <tr align="left">
          <td height="45">Nama Bank</td>
          <td>:</td>
          <td><span id="sprytextfield3">
            <input name="nama_bank" type="text" id="nama_bank" size="40" maxlength="100" value="<?php echo $nama_bank ?>"  />
            <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
          </tr>
        <tr>
		      <tr align="left">
          <td height="45">Cabang</td>
          <td>:</td>
          <td><span id="sprytextfield4">
            <input name="cabang" type="text" id="cabang" size="40" maxlength="100" value="<?php echo $cabang ?>"  />
            <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right"><input type="reset" class="button red" name="batal" id="batal" value="Batal" onClick="window.location.href='index.php?module=rekening'"/>
            <input type="submit" name="simpan" class="button green" id="simpan" value="Simpan" /></td>
        </tr>
      </table>
  </form>
    &nbsp;</td>
</div>
  
  
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
