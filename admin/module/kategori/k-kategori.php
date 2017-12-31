<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	$table='t_kategori';
	$link='index.php?module=kategori';
	$pk='id_kategori';

// SIMPAN //
if(isset($_POST['simpan'])){ 
	if(isset($id)){ 
// SIMPAN EDIT //
		  $sql_aksi=mysql_query("update $table SET nama_kategori='".htmlentities($_POST['nama_kategori'])."' where $pk='".$id."'");
		  $alert='Diperbarui'; 
		}else{
// CHECK DUPLIKAT //
		$sql_check=mysql_query("select *from $table where $pk='".htmlentities($_POST['id_kategori'])."'");
		$row_check=mysql_num_rows($sql_check);
		if($row_check!=0){
			echo "<script>alert('ID Kategori Sudah Dipakai!');</script>";
			$alert='Ditambahkan';
		}else{
// SIMPAN TAMBAH //
		  	$sql_aksi=mysql_query("insert into $table VALUES ('".htmlentities($_POST['id_kategori'])."','".htmlentities($_POST['nama_kategori'])."')") ;
		  	$alert='Ditambahkan';
		}
}
// ALERT //
			if($sql_aksi){
					echo "<script>alert('Data Berhasil $alert');window.location=('$link');</script>";
			}else{
					echo "<script>alert('Data Gagal $alert');window.location=('$link');</script>";
			}
	}



// TAMPIL EDIT & HAPUS //
if(isset($id)){
	$sql_check=mysql_query("select *from t_kategori where id_kategori='".$id."'");
	$hitung_check=mysql_num_rows($sql_check);
	if($hitung_check==1){
		if($aksi=='hapus'){
		$sql_aksi=mysql_query("delete from $table where $pk='".$id."'");
			if($sql_aksi){
				echo "<script>alert('Data Berhasil Dihapus!');window.location=('$link');</script>";
			}else{
				echo "<script>alert('Data Gagal Dihapus!');window.location=('$link');</script>";
			}
		}else{
			$sql_edit=mysql_query("select *from $table where $pk='".$id."'");
			$row_edit=mysql_fetch_assoc($sql_edit);
		}
	}else{
		echo "<script>alert('Kategori Tidak Tersedia');window.location='index.php';</script";
	
	}
}


if(isset($aksi) && isset($id)){
		$judul="- Edit Kategori ".$id." :";
}else{
		$judul="- Tambah Kategori :";
}

?>

<div class="path"><h3><?php echo "".$judul."" ?> </h3></div>
<div class="input">
   <form action="" method="post" name="form1" id="form1"><br>
      <table width="390" height="150" align="center" cellpadding="0" cellspacing="0">
        <tr align="left">
          <td width="122" height="50" scope="col" >ID Kategori</td>
          <td width="10" scope="col">:</td>
          <td width="312" scope="col"><span id="sprytextfield1">
            <input name="id_kategori" type="text" id="id_kategori" size="10" maxlength="10" value="<?php echo "".$row_edit['id_kategori'].""; ?>"<?php if(isset($_GET['id'])){ echo "readonly"; }?>   />
            <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
          </tr>
        <tr align="left">
          <td height="33">Nama Kategori</td>
          <td>:</td>
          <td><span id="sprytextfield2">
            <input name="nama_kategori" type="text" id="nama_kategori" size="40" maxlength="40" value="<?php echo "".$row_edit['nama_kategori']."";?>"  />
            <br />
            <span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right"><input type="reset" name="batal" id="batal" value="Batal" class="button red" onClick="window.location.href='index.php?module=kategori'"/>
            <input type="submit" name="simpan" id="simpan" value="Simpan" class="button green" /></td>
        </tr>
      </table>
  </form>
    &nbsp;</td>
</div>
  
  
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
