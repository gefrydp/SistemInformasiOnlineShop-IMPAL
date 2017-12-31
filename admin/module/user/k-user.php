<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}

	$table='t_user';
	$link='index.php?module=user';
	$pk='id_user';

// SIMPAN //
if(isset($_POST['simpan'])){ 
	if(isset($id)){ 
// SIMPAN EDIT //
	
		  $sql_aksi=mysql_query("update $table SET username='".htmlentities($_POST['username'])."',password='".htmlentities(md5($_POST['password'].$salt_pass))."',level='".htmlentities($_POST['level'])."' where $pk=".$id."");
		  $alert='Diperbarui'; 
		}else{
// SIMPAN TAMBAH //
		  	$sql_aksi=mysql_query("insert into $table (username,password,email,level) VALUES ('".htmlentities($_POST['username'])."','".htmlentities(md5($_POST['password']))."','".htmlentities($_POST['email'])."','".htmlentities($_POST['level'])."')") ;
		  	$alert='Ditambahkan';
		}

// ALERT //
			if($sql_aksi){
					echo "<script>alert('User Berhasil $alert');window.location=('$link');</script>";
				}else{
					echo "<script>alert('User Gagal $alert');window.location=('$link');</script>";
				}
}



if(isset($id)){
	$sql_check=mysql_query("select *from t_user where ".$pk."=".$id."");
	$hitung_check=mysql_num_rows($sql_check);
	if($hitung_check>0){
		if($aksi=='hapus'){
			$sql_aksi=mysql_query("delete from ".$table." where ".$pk."=".$id."");
			echo "<script>alert('User Berhasil Dihapus!');window.location=('".$link."');</script>";
		}else{
			$sql_edit=mysql_query("select *from ".$table." where ".$pk."='".$id."'");
			$row_edit=mysql_fetch_assoc($sql_edit);
				$username=$row_edit['username'];
				$password=$row_edit['password'];
				$email_user=$row_edit['email'];
				$level=$row_edit['level'];
		}
	}else{
		echo "<script>alert('User Tidak Tersedia!');window.location=('".$link."');</script>";
	}
}


if(isset($aksi) && isset($id)){
	$judul="- Edit User ".$id." :";
}else{
	$judul="- Tambah User :";
}

?>

<div class="path"><h3><?php echo "".$judul."" ?> </h3></div>


<form name="form1" method="post" action="">
<div class="input">
  <table width="415" height="189" align="center" cellpadding="0" cellspacing="0">
    <tr align="left">
      <td width="138" scope="col">Username</td>
      <td width="21" scope="col">:</td>
      <td width="154" scope="col"><span id="sprytextfield1">
        <input name="username" type="text" id="username" size="20" maxlength="20" value="<?php echo $username;?>">
        <br><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
</tr>
    <tr align="left">
      <td><?php if(isset($id)){ echo "Password Baru :"; }else{ echo "Password"; }; ?></td>
      <td>:</td>
      <td><span id="sprytextfield2">
        <input name="password" type="text" id="password" size="20" maxlength="20">
        <br><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
</tr>
    <tr align="left">
      <td>E-Mail</td>
      <td>:</td>
      <td><span id="sprytextfield3">
        <input name="email" type="text" id="email" size="30" maxlength="100" value="<?php echo $email_user; ?>">
        <br><span class="textfieldRequiredMsg">Input Masih Kosong!</span></span></td>
</tr>
    <tr align="left">
      <td>Level</td>
      <td>:</td>
      <td><select name="level" id="level">
<?php if(isset($id)) {
			echo "<option value='".$level."' hidden>".ubah_huruf_awal(" ",$level)."</option>";
			}
?>        <option value="super admin">Super Admin</option>
        <option value="admin">Admin</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
	  <br><br>
      <td align="right"><input type="reset" name="batal" class="button red" id="batal" value="Batal" onClick="window.location.href='index.php?module=user'"/><input type="submit" class="button green" name="simpan" id="simpan" value="Simpan"></td>
    </tr>
    <tr> </tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</form>
<p></p><p></p>
</div>
<script type="text/javascript">
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
</script>
