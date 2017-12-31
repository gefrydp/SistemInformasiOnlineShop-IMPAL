<?php
session_start();

	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}

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

	a{
		text-decoration:none;
	}

	a:hover{
		opacity:0.8;
		text-decoration:underline;
	}
</style>
	
<div class="path"><h3>- Daftar Pesanan : </h3></div>
  <br>


<table width="800" height="48" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr class="tabel">
	<th width="100" scope="col" bgcolor='#575757'>No. Order</th>
    <th width="114" height="48" align="center" bgcolor="#575757" scope="col">Nama</th>
    <th width="132" bgcolor="#575757" scope="col">Tgl Order</th>
    <th width="114" bgcolor="#575757" scope="col">Status</th>
    <th width="139" bgcolor="#575757" scope="col">Konfirmasi</th>
    <th width="182" bgcolor="#575757" scope="col">Aksi</th>
  </tr>
<?php

$sql_get=mysql_query("select *from t_tagihan INNER JOIN t_member on (t_tagihan.id_member=t_member.id_member) order by id_tagihan DESC  limit ".$MulaiAwal.",".$BatasAwal."");

	while($row_get=mysql_fetch_assoc($sql_get))
	{ 
	
		$nama_lengkap=$row_get['nama_lengkap'];
		$tgl_tagihan=$row_get['tgl_tagihan'];
		$id_tagihan=$row_get['id_tagihan'];
	
		
			if($row_get['foto_faktur']!=''){
				$kirim="<font color='green'><b>Sudah Kirim</b></font> <a href='index.php?module=konfirmasi' target='a_blank'>( Lihat ) </a>";
			}else{
				$kirim="<font color='red'>Belum Kirim</font>";
			}
		
			if($row_get['status_tagihan']=='Lunas'){
					$status_tagihan="<font color='green'>Lunas</font>";
					$nama_link="Batal";
			}else{
					$status_tagihan="<font color='red'>Belum Lunas</font>";
					$nama_link="Konfirmasi";
			}
		echo"
		<tr bgcolor=#F6F4F5>
			<td align='center'>".$id_tagihan."</td>
			<td height=40 align=center >".$nama_lengkap."</td>
			<td align='center'>".TanggalIndo($tgl_tagihan)."</td>
			<td align='center'>".$status_tagihan."</td>
			<td align='center'>".$kirim." </td>
			<td><center>
	
				<a href='index.php?module=order&id=".$id_tagihan."'>Detail Order</a><br>
				<a href='index.php?module=order&aksi=kelola&id=".$id_tagihan."'>".$nama_link."</a>
				</center>
			</td>
		</tr>
	";}

?>

</table>

<?php
	$cekQuery = mysql_query("SELECT * FROM t_order");
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
            echo '" href="index.php?module=order&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }

?>