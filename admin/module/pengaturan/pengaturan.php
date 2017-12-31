<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
$sql=mysql_query("select *from t_pengaturan where id=1");
$row=mysql_fetch_assoc($sql);


if(isset($_POST['simpan'])){

			$list_ekstensi = array("bmp", "jpg", "gif", "png", "jpeg", "ico"); // Extension Yang Diperbolehkan //
			$list_tipe= array("image/gif","image/jpeg","image/png","image/bmp","image/x-icon"); // Tipe Yang Diperbolehkan //
			
	if(!empty($_FILES['foto']['name'])){		
			
			$namaFile = $_FILES['foto']['name'];
			$tipe=$_FILES['foto']['type'];
			$pecah = explode(".", $namaFile);
			$pecah_ekstensi = $pecah[1];
			$jenis=".$pecah_ekstensi";
			$namaFileNew="logo".$jenis;
			$namaDir = '../images/';
			$pathFile = $namaDir . $namaFile;	
		 if (in_array($pecah_ekstensi, $list_ekstensi)){
				if(in_array($tipe,$list_tipe)){   
					if (move_uploaded_file($_FILES['foto']['tmp_name'], $pathFile))	{
							$foto='./images/'.$namaFileNew;
							rename($namaDir.$namaFile,$namaDir.$namaFileNew);
							$status='sukses';
					}
				}else{
					echo "<script>alert('Tipe File tidak diperbolehkan!');</script>";
					$status='failed';
				}
		}else{
			echo "<script>alert('Tipe File tidak diperbolehkan!');</script>";
			$status='failed';
		}
	}elseif(empty($_FILES['foto']['name'])){
		$foto=$_POST['gbr'];
		$status='sukses';
	}
		
	if(!empty($_FILES['fav']['name'])){		
			$namaFileFav = $_FILES['fav']['name'];
			$tipeFav=$_FILES['fav']['type'];
			$pecahFav = explode(".", $namaFileFav);
			$pecah_ekstensi_fav = $pecahFav[1];
			$jenisFav=".$pecah_ekstensi_fav";
			$namaFileNewFav="fav".$jenisFav;
			$namaDirFav = '../images/';
			$pathFileFav = $namaDirFav . $namaFileFav;
		if (in_array($pecah_ekstensi_fav, $list_ekstensi)){
				if(in_array($tipeFav,$list_tipe)){   
					if (move_uploaded_file($_FILES['fav']['tmp_name'], $pathFileFav)){
							$fotoFav='./images/'.$namaFileNewFav;
							rename($namaDirFav.$namaFileFav,$namaDirFav.$namaFileNewFav);
							$status='sukses';
					}
				}else{
					echo "<script>alert('Tipe File tidak diperbolehkan!');</script>";
					$status='failed';
				}
		}else{
			echo "<script>alert('Tipe File tidak diperbolehkan!');</script>";
			$status='failed';
		}
		
	}elseif(empty($_FILES['fav']['name'])){
		$fotoFav=$_POST['fav'];
		$status='sukses';
	}
	
	if($status=='sukses'){
		$update=mysql_query("update t_pengaturan SET judul_website='".htmlentities($_POST['judul_website'])."', banner_website='".$foto."',favicon='".$fotoFav."',keyword='".htmlentities($_POST['keyword'])."',deskripsi='".htmlentities($_POST['deskripsi'])."',google_analystics='".htmlentities($_POST['google'])."'  where id=1") or die (mysql_error());
		echo "<script>alert('Pengaturan Berhasil di Perbarui!');window.location=('index.php?module=pengaturan');</script>";
	}else{
		echo "<script>alert('Pengaturan Gagal di Perbarui!');window.location=('index.php?module=pengaturan');</script>";
	}
}
?>


<form action="" method="post" enctype="multipart/form-data" name="form1">
<div class="path"><h3>- Pengaturan</h3></div>
<div class="input" style="width:700px; height:auto">
<br>
<table width="600" height="469" align="center" cellpadding="0" cellspacing="0">
    <tr align="left">
      <td width="188" scope="col">Judul Website</td>
      <td width="10" scope="col">:</td>
      <td width="247" scope="col"><span id="sprytextfield1">
        <input name="judul_website" type="text" id="judul_website" value="<?php echo "".$row['judul_website'].""; ?>" size="50" maxlength="50">
        <br><span class="textfieldRequiredMsg">Input Masih Kosong.</span></span></td>
</tr>
    <tr align="left">
      <td width="188" scope="col">Keyword</td>
      <td width="10" scope="col">:</td>
      <td width="247" scope="col">
        <input name="keyword" type="text" id="keyword" value="<?php echo "".$row['keyword']."" ?>" size="50" maxlength="100">
  </td>
</tr>
    <tr align="left">
      <td width="188" scope="col">Deskripsi Website</td>
      <td width="10" scope="col">:</td>
      <td width="247" scope="col">
        <input name="deskripsi" type="text" id="deskripsi" value="<?php echo "".$row['deskripsi']."" ?>" size="50" maxlength="100">
      </td>
</tr>
    <tr align="left">
      <td width="188" scope="col">Google Analystic ID</td>
      <td width="10" scope="col">:</td>
      <td width="247" scope="col">
        <input name="google" type="text" id="google" value="<?php echo "".$row['google_analystics']."" ?>" size="20" maxlength="20">
      </td>
</tr>
   
    <tr align="left">
      <td>Favicon</td>
      <td>:</td>
      <td><img src=".<?php echo $row['favicon'] ?>" width="50px" height="50px"/><input type="file" name="fav" id="fav" /></td>
    </tr>
    <tr align="left">
      <td>Banner Web</td>
      <td>:</td>
      <td><img src=".<?php echo $row['banner_website'] ?>" width="275px"/><input type="file" name="foto" id="foto" /></td>
    </tr>
 
    <tr align="left" valign="top">
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="right"><input type="reset" name="batal" class="button red" id="batal" value="Batal" onClick="window.location.href='index.php?module=pengaturan'"/><input type="submit" class="button green" name="simpan" id="simpan" value="Simpan"></td>
    </tr>
  </table>
 </div>
 
<input type="hidden" name="gbr" value="<?php echo $row['banner_website'] ?>">
	  <input type="hidden" name="fav" value="<?php echo $row['favicon'] ?>">
</form>
<br><br><br><br>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
</script>
