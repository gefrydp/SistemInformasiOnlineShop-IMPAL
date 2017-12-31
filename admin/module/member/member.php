<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	if($aksi=='hapus'){
		$sql_check=mysql_query("select *from t_member where id_member=".$id."");
		$hitung_check=mysql_num_rows($sql_check);
		if($hitung_check>0){
			$sql_hapus=mysql_query("delete from t_member where id_member=".$id."");
			echo "<script>alert('Member Berhasil Dihapus!');window.location=('index.php?module=member');</script>";
		}else{
			echo "<script>alert('Member Tidak Tersedia!');window.location=('index.php?module=member');</script>";
		}
	}
	
	//fungsi pagination
    $BatasAwal = 10;
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
	.table-member {
		color: #FFF;
	}
</style>

<div class="path"><h3>- Daftar Member : </h3></div>
  <br>
<br>
<table width="550" height="81" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr class="table-member">
    <th width="120" height="35" bgcolor="#575757" scope="col">Nama</th>
    <th width="90" bgcolor="#575757" scope="col">E-Mail</th>
    <th width="90" bgcolor="#575757" scope="col">No Telp</th>
    <th width="77" bgcolor="#575757" scope="col">Aksi</th>
  </tr>
<?php

	$sql_member=mysql_query("select *from t_member limit ".$MulaiAwal.",".$BatasAwal."");
	while($row_member=mysql_fetch_assoc($sql_member)){
	
		$id_member=$row_member['id_member'];
		$nama_lengkap=$row_member['nama_lengkap'];
		$no_telp=$row_member['no_telp'];
		$alamat=$row_member['alamat'];
		$provinsi=$row_member['provinsi'];
		$kota=$row_member['kota'];
		$kode_pos=$row_member['kode_pos'];
				
		  echo "<tr align='center' height='30px' bgcolor='#F6F4F5'>
					<td>".$nama_lengkap."</td>
					<td>".$email."</td>
					<td>".$no_telp."</td>
					<td><center>
						<a href='index.php?module=member&id=".$id_member."'><img src='img/icon/detail.png' title='Detail'></a>
						<a href='index.php?module=member&aksi=hapus&id=".$id_member."'><img src='img/icon/user-2-remove.png' title='Hapus'></a>
					</center>
					</td>
				</tr>";
	}
?>
</table>

<?php

	$cekQuery = mysql_query("SELECT * FROM t_member");
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
            echo '" href="index.php?module=member&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }
?>     

