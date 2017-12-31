<?php
 session_start();
 	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
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
<div class="path"><h3>- Daftar Shipping : </h3></div>
  <br>
<div class="tambah">
<a href="index.php?module=shipping&aksi=kelola" ><img src="img/icon/add.png"> Tambah Wilayah</a></b>
</div>   
<br>

<style type="text/css">
	.tabel {
		color: #FFF;
		
	}
</style>

<table width="685" height="74" cellpadding="0" cellspacing="1" border="0" align="center">
  <tr class="tabel">
    <th width="173" height="40" bgcolor="#575757" scope="col">Wilayah</th>
    <th width="169" scope="col" bgcolor="#575757">Biaya</th>
	<th width="150" scope="col" bgcolor="#575757">Kurir</th>
    <th width="89" scope="col" bgcolor="#575757">Aksi</th>
  </tr>

<?php

	$sqlship=mysql_query("select *from t_shipping limit ".$MulaiAwal.",".$BatasAwal."");
	while($row_ship=mysql_fetch_assoc($sqlship)){
		$id_ship=$row_ship['id_shipping'];
		$wilayah=$row_ship['wilayah'];
		$biaya=$row_ship['biaya'];
		$kurir=$row_ship['kurir'];
		
	echo "
	  <tr bgcolor='#F6F4F5'>
		<td height=35px>".$wilayah."</td>
		<td>".formatRupiah($biaya)."</td>
		<td>".$kurir."</td>
		<td><center><a href='index.php?module=shipping&aksi=kelola&id=".$id_ship."'><img src='img/icon/pencil.png' title='Edit'></a><a href='index.php?module=shipping&aksi=hapus&id=".$id_ship."'><img src='img/icon/delete.png' title='Hapus'></a></center></td>
	  </tr>
	 "; } 
?>
 
 
</table>

<?php
$cekQuery = mysql_query("SELECT * FROM t_shipping");
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
            echo '" href="index.php?module=shipping&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }
	
?>
