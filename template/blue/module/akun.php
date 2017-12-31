<?php	
	require "./module/akun.php";
?>

<form name="form1" method="post" action="index.php?module=akun&aksi=update">

<div class="bread"><b style='font-weight:bold'>- Akun Saya :</b></div>
<table width="485" height="352" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="196" scope="col"><strong>Username</strong></td>
    <td width="12" scope="col">:</td>
    <td width="382" scope="col"><?php echo $username; // Username // ?></td>
  </tr>
  <tr>
    <td><strong>Nama Lengkap</strong></td>
    <td>:</td>
    <td><?php echo $nama_lengkap; // Nama Lengkap // ?></td>
  </tr>
    <tr>
    <td><strong>E-Mail</strong></td>
    <td>:</td>
    <td><?php echo $email; // Email // ?></td>
  </tr>
  <tr>
    <td><strong>No.HP</strong></td>
    <td>:</td>
    <td><?php echo $no_telp; // No.Telp // ?></td>
  </tr>
  <tr>
    <td><strong>Alamat</strong></td>
    <td>:</td>
    <td><?php echo $alamat; // Alamat // ?></td>
  </tr>
  <tr>
    <td><strong>Provinsi</strong></td>
    <td>:</td>
    <td><?php echo $provinsi; // Provinsi // ?></td>
  </tr>
  <tr>
    <td><strong>Kota</strong></td>
    <td>:</td>
    <td><?php echo $kota; // Kota // ?></td>
  </tr>
  <tr>
    <td><strong>Kode Pos</strong></td>
    <td>:</td>
    <td><?php echo $kode_pos; // POS // ?></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><input name="update" class="button blue" type="submit" value="Update"></td>
  </tr>
  

</table>

</form>

 <div class="bread"><font style='color:#FF0000; font-weight:bold;'>* Pastikan Informasi di Akun Anda Benar</font></div> 
