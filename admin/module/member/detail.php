<?php 
	session_start();

	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	if(isset($id)){
		$sql_check=mysql_query("select *from t_member where id_member=".$id."");
		$hitung_check=mysql_num_rows($sql_check);
		if($hitung_check==1){
			$row_member=mysql_fetch_assoc($sql_check);
				
				$username=$row_member['username'];
				$nama_lengkap=$row_member['nama_lengkap'];
				$email=$row_member['email'];
				$no_telp=$row_member['no_telp'];
				$alamat=$row_member['alamat'];
				$provinsi=$row_member['provinsi'];
				$kota=$row_member['kota'];
				$kode_pos=$row_member['kode_pos'];
				
		}else{
			echo "<script>alert('Member Tidak Tersedia!');window.location='index.php?module=member';</script>";
		}
	}
	
?>
	
<div class="path"><h3>- Detail Member <?php echo $id ?> : </h3></div><br>
<div class="input">
<table width="584" height="238" cellpadding="5" cellspacing="0" align="center">
  <tr align="left">
    <td width="150" scope="col">Username</td>
    <td width="20" scope="col">:</td>
    <td width="323" scope="col"><?php echo $username ; ?></td>
  </tr>
  <tr align="left">
    <td>Nama Lengkap</td>
    <td>:</td>
    <td><?php echo $nama_lengkap ; ?></td>
  </tr>
  <tr align="left">
    <td>E-Mail</td>
    <td>:</td>
    <td><?php echo $email ; ?></td>
  </tr>
  <tr align="left">
    <td>No. Telp</td>
    <td>:</td>
    <td><?php echo $no_telp ; ?></td>
  </tr>
  <tr align="left">
    <td>Alamat</td>
    <td>:</td>
    <td><?php echo $alamat ; ?></td>
  </tr>
  <tr align="left">
    <td>Kota</td>
    <td>:</td>
    <td><?php echo $kota ; ?></td>
  </tr>
  <tr align="left">
 
    <td>Provinsi</td>
    <td>:</td>
    <td><?php echo $provinsi ; ?></td>
  </tr>
  <tr align="left">
    <td>Kode POS</td>
    <td>:</td>
    <td><?php echo $kode_pos ; ?></td>
  </tr>
</table>
</div>