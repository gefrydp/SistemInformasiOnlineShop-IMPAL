<?php
	session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
		
if($_POST['simpan']){

	for($i=0; $i<=count($_POST['nama_slider']); $i++){

		$list_ekstensi = array("bmp", "jpg", "gif", "png", "jpeg"); // Extension Yang Diperbolehkan //
		$list_tipe= array("image/gif","image/jpeg","image/png","image/bmp"); // Tipe Yang Diperbolehkan //
		$no=$i+1;
		if(!empty($_FILES['foto_slider']['name'][$i])){		
				$namaFile = $_FILES['foto_slider']['name'][$i];
				$tipe=$_FILES['foto_slider']['type'][$i];
				$pecah = explode(".", $namaFile);
				$pecah_ekstensi = $pecah[1];
				$jenis=".$pecah_ekstensi";
				$namaFileNew="slide".$i."".$jenis;
				$namaDir = '../images/slide/';
				$pathFile = $namaDir . $namaFile;
			if (in_array($pecah_ekstensi, $list_ekstensi)){
					if(in_array($tipe,$list_tipe)){   
						if (move_uploaded_file($_FILES['foto_slider']['tmp_name'][$i], $pathFile))	{
								$foto='./images/slide/'.$namaFileNew;
								rename($namaDir.$namaFile,$namaDir.$namaFileNew);
								$status='sukses';
						}
					}else{
						echo "<script>alert('File ".$no." Tidak Diperbolehkan!);</script>";
						$status='failed';
					}
			}else{
						echo "<script>alert('File ".$no." Tidak Diperbolehkan!);</script>";
						$status='failed';
			}
		}elseif(empty($_FILES['foto_slider']['name'][$i])){	
			$status='sukses';
		}
			
		
		if($status=='sukses'){
			if(!empty($_FILES['foto_slider']['name'][$i])){
				$sql_update=mysql_query("update t_slider SET foto_slider='".$foto."', nama_slider='".htmlentities($_POST['nama_slider'][$i])."', deskripsi_slider='".htmlentities($_POST['deskripsi_slider'][$i])."' where id_slider=".$i."") or die(mysql_error());
				echo "<script>alert('Slider ".$no." Berhasil Diperbarui!');</script>";
			}elseif(empty($_FILES['foto_slider']['name'][$i])){
				$sql_update=mysql_query("update t_slider SET nama_slider='".htmlentities($_POST['nama_slider'][$i])."', deskripsi_slider='".htmlentities($_POST['deskripsi_slider'][$i])."' where id_slider=".$i."") or die(mysql_error());
			}
		}else{
			echo "<script>alert('Gagal, Silahkan Check Kembali!');</script>";
	}
}
}		

// Slider 1 //
	$sql_1=mysql_query("select *from t_slider where id_slider=0");
	$row_1=mysql_fetch_assoc($sql_1);

// Slider 2 //
	$sql_2=mysql_query("select *from t_slider where id_slider=1");
	$row_2=mysql_fetch_assoc($sql_2);

// Slider 3 //
	$sql_3=mysql_query("select *from t_slider where id_slider=2");
	$row_3=mysql_fetch_assoc($sql_3);





?>
<div class="path"><h3>- Pengaturan Slider : </h3></div>
<div class="input" style="padding:10px"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="100%" height="551" cellpadding="0" cellspacing="0">
  <tr>
    <td height="34" colspan="3" align="left" bgcolor="#575757" style="color:#FFFFFF" scope="col"><strong>&nbsp;Slider 1 :</strong></td>
  </tr>
  <tr>
    <td width="151" height="29" align="left" scope="col">Nama</td>
    <td width="8" align="left" scope="col">:</td>
    <td width="324" align="left" scope="col"><input name="nama_slider[]" value="<?php echo $row_1['nama_slider'] ?>" type="text" id="nama_slider[]" size="30" /></td>
  </tr>
  <tr>
    <td height="30" align="left">Deskripsi </td>
    <td align="left">:</td>
    <td align="left"><input name="deskripsi_slider[]" type="text" id="deskripsi_slider[]" value="<?php echo $row_1['deskripsi_slider'] ?>" size="50" maxlength="100" /></td>
  </tr>
  <tr>
    <td height="76" align="left">Foto </td>
    <td align="left">:</td>
    <td align="left"><a id="single_1" href=".<?php echo $row_1['foto_slider'] ?>"><img src=".<?php echo $row_1['foto_slider'] ?>" width='100px' title="Klik Untuk Memperbesar!"></a><input type="file" name="foto_slider[]" id="foto_slider[]" /></td>
  </tr>
  <tr>
    <td height="36" colspan="3" align="left" bgcolor="#575757" style="color:#FFFFFF"><strong>&nbsp;Slider 2 :</strong></td>
  </tr>
  <tr>
    <td height="30" align="left">Nama</td>
    <td align="left">:</td>
    <td align="left"><input name="nama_slider[]" type="text" id="nama_slider[]" value="<?php echo $row_2['nama_slider'] ?>" size="30" maxlength="50" /></td>
  </tr>
  <tr>
    <td height="30" align="left">Deskripsi</td>
    <td align="left">:</td>
    <td align="left"><input name="deskripsi_slider[]" type="text" id="deskripsi_slider[]" value="<?php echo $row_2['deskripsi_slider'] ?>" size="50" maxlength="100" /></td>
  </tr>
  <tr>
    <td height="95" align="left">Foto</td>
    <td align="left">:</td>
    <td align="left"><a id="single_1" href=".<?php echo $row_2['foto_slider'] ?>"><img src=".<?php echo $row_2['foto_slider'] ?>" width='100px' title="Klik Untuk Memperbesar!"></a><input type="file" name="foto_slider[]" id="foto_slider[]" /></td>
  </tr>
  <tr>
    <td height="35" colspan="3" align="left" bgcolor="#575757" style="color:#FFFFFF"><strong>&nbsp;Slider 3 :</strong></td>
  </tr>
  <tr>
    <td height="30" align="left">Nama</td>
    <td align="left">:</td>
    <td align="left"><input name="nama_slider[]" type="text" id="nama_slider[]"  value="<?php echo $row_3['nama_slider'] ?>" size="30" maxlength="50" /></td>
  </tr>
  <tr>
    <td height="30" align="left">Deskripsi</td>
    <td align="left">:</td>
    <td align="left"><input name="deskripsi_slider[]" value="<?php echo $row_3['deskripsi_slider'] ?>" type="text" id="deskripsi_slider[]" size="50" maxlength="100" /></td>
  </tr>
  <tr>
    <td height="94" align="left">Foto</td>
    <td align="left">:</td>
    <td align="left"><a id="single_1" href=".<?php echo $row_3['foto_slider'] ?>"><img src=".<?php echo $row_3['foto_slider'] ?>" width='100px' title="Klik Untuk Memperbesar!"></a><input type="file" name="foto_slider[]" id="foto_slider[]" /></td>
  </tr>
   <tr>
    <td height="94" align="left"></td>
    <td align="left"></td>

	
    <td align="right"><input type="reset" name="batal" class="button red" id="batal" value="Batal" onClick="window.location.href='index.php?module=slider'">
            <input type="submit" name="simpan" id="simpan" value="Simpan" class="button green" /></td>
  </tr>
</table>
</form>

</div>