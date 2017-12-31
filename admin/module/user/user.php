<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}

	$link='index.php?module=user';
	
	//fungsi pagination
    $BatasAwal = 15;
    if (!empty($_GET['p'])) {
        $hal = $_GET['p'] - 1;
        $MulaiAwal = $BatasAwal * $hal;
    } else if (!empty($_GET['p']) and $_GET['p'] == 1) {
        $MulaiAwal = 0;
    } else if (empty($_GET['p'])) {
        $MulaiAwal = 0;
    }
	
?>

<style type="text/css">
	.tabel {
		color: #FFF;
	}
</style>

<div class="path"><h3>- Daftar User : </h3></div>
  <br>
<div class="tambah">
	<a href="index.php?module=user&aksi=kelola" ><img src="img/icon/add.png" title="Tambah User"> Tambah User</a></b>
</div>  
 
<br>
<p>

<table width="530" height="79" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr class="tabel">
    <th width="151" bgcolor="#575757" scope="col" height="35">Username</th>
    <th width="206" bgcolor="#575757" scope="col">E-Mail </th>
    <th width="105" bgcolor="#575757" scope="col">Level</th>
    <th width="96" bgcolor="#575757" scope="col">Aksi</th>
  </tr>
<?php

	$sql_user=mysql_query("select *from t_user limit ".$MulaiAwal.",".$BatasAwal."");
	while($row_user=mysql_fetch_assoc($sql_user)){
	
			$id_user=$row_user['id_user'];
			$username=$row_user['username'];
			$email=$row_user['email'];
			$level=$row_user['level'];
			
	  echo"<tr height='30' bgcolor='#F6F4F5'>
			<td>".$username."</td>
			<td>".$email."</td>
			<td>".ubah_huruf_awal(" ",$level)."</td>
			<td><center><a href='".$link."&aksi=kelola&id=".$id_user."'><img src='img/icon/pencil.png' title='Edit'></a><a href='".$link."&aksi=kelola&aksi=hapus&id=".$id_user."'><img src='img/icon/delete.png' title='Hapus'></a></center></td>
		  </tr>
	";}
?>
</table>


<?php
$cekQuery = mysql_query("SELECT * FROM t_user");
    $jumlahData = mysql_num_rows($cekQuery);
    if ($jumlahData > $BatasAwal) {
        echo '<br/><center><div style="font-size:10pt;">Halaman : ';
        $a = explode(".", $jumlahData / $BatasAwal);
        $b = $a[0];
        $c = $b + 1;
        for ($i = 1; $i <= $c; $i++) {
            echo '<a style="text-decoration:none;';
            if ($_GET['p'] == $i) {
                echo 'color:red';
            }
            echo '" href="index.php?module=user&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }
?>     
