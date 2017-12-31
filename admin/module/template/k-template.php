<?php
	session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	
	if(isset($id) && isset($aksi)){
		$sql_check=mysql_query("select *from t_templates where id_template='".$id."'");
		$row_check=mysql_fetch_assoc($sql_check);
		$hitung_check=mysql_num_rows($sql_check);
		if($hitung_check>0){
			if($aksi=='hapus'){
				$lokasi=$row_check['lokasi_template'];
				$fileTemplate="../template/".$lokasi."";
			
				$files = glob("".$fileTemplate."/*"); // get all file names
				foreach($files as $file){ // iterate files
				  if(is_file($file))
					unlink($file); // delete file
				}
				rmdir($fileTemplate)
				;
				
				$sql_delete=mysql_query("delete from t_templates where id_template='".$id."'");
				
				echo "<script>alert('Template Berhasil di Hapus!');window.location='index.php?module=template';</script>";
				
			}else{
			
				$sql_non=mysql_query("update t_templates SET aktif_template='0' where aktif_template='1'") or die(mysql_error());
				$sql_aktif=mysql_query("update t_templates SET aktif_template='1' where id_template='".$id."'") or die(mysql_error());
				
				echo "<script>alert('Template Berhasil di Aktifkan!');window.location='index.php?module=template';</script>";
				
			}
		}
	}
	
	
	
	if(isset($_POST['simpan'])){ // Jika POST Simpan Maka Eksekusi
	
			$namaTemplate = $_POST['nama_template'];
			
		if(!empty($_FILES["zip_file"]["name"])) { // Jika File Tidak Kosong Maka Lanjut
			
			$source = $_FILES["zip_file"]["tmp_name"];
			$tipe = $_FILES["zip_file"]["type"];
			$namaFile = $_FILES["zip_file"]["name"];
			
			
			$list_ekstensi = array("zip"); // Extension Yang Diperbolehkan //
			$list_tipe = array("[application/zip]", "[application/x-zip-compressed]", "[multipart/x-zip]", "[application/x-compressed]"); // Tipe Yang Diperbolehkan //
			
			$pecah = explode(".", $namaFile);
			$pecah_ekstensi = $pecah[1]; // Pecah File Ambil Array 1
			$jenis = ".$pecah_ekstensi";
		
			$dir="../template/".$namaTemplate."/";
		
		if (in_array($pecah_ekstensi, $list_ekstensi)){
				if(in_array($tipe, $list_tipe)){   
					if(!file_exists($dir)){
					
						mkdir($dir);
						
						$target_path = "../template/".$namaTemplate."/".$namaFile;  
								
						if(move_uploaded_file($source, $target_path)) {
							
							$zip = new ZipArchive();
							$x = $zip->open($target_path);
							if ($x === true) {
								
								$eksekusi = "Sukses";
								
								$zip->extractTo("../template/".$namaTemplate."/"); // change this to the correct site path
								$zip->close();
						
								unlink($target_path);
								
							}
						}
					}else{
						
						echo "<script>alert('Template Sudah Ada! Silahkan Hapus Terlebih Dahulu!');window.location='index.php?module=template';</script>";
					}
				}	
			}
		}

		if($eksekusi == "Sukses"){
			$sql=mysql_query("insert into t_templates (nama_template,lokasi_template) VALUES ('".$namaTemplate."', '".$namaTemplate."/')");
			echo "<script>alert('Template Berhasil Ditambahkan!');window.location='index.php?module=template';</script>";
		}else{
			echo "<script>alert('Template Gagal Ditambahkan! Silahkan Coba Lagi!');window.location='index.php?module=template&aksi=kelola';</script>";
		}
		
	}	
	
?>

<div class="path"><h3>- Kelola Template : </h3></div>
<div class="input" style="padding:10px">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="525" height="130" cellpadding="0" cellspacing="0" align="center">
  <tr align="left">
    <td width="189" scope="col">Nama Template</td>
    <td width="13" scope="col">:</td>
    <td width="321" scope="col"><span id="sprytextfield1"><input name="nama_template" type="text" id="nama_template" size="30" maxlength="30"><br><span class="textfieldRequiredMsg">Input Masih Kosong.</span></span></td>
  </tr>
  <tr align="left">
    <td>File Template</td>
    <td>:</td>
    <td><input type="file" name="zip_file" /><br>
		<i>File Harus Berextensi zip</i></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">
		<input type="reset" class="button red" name="batal" id="batal" value="Batal" onClick="window.location.href='index.php?module=template'"/> 
		<input type="submit" class="button green" name="simpan" id="simpan" value="Simpan">
	</td>
  </tr>
</table>
</form>
</div>

<script type="text/javascript">
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");

</script>