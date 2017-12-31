<?php
 session_start();
 	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	
	if(isset($id)){
		$sql_check=mysql_query("select *from t_testimonial where id_testimonial=".$id."");
		$hitung_check=mysql_num_rows($sql_check);
			if($hitung_check>0){
				if($aksi=='kelola'){
					$sql_edit=mysql_query("update t_testimonial SET tampil=1 where id_testimonial=".$id."");
					echo "<script>alert('Testimonial Berhasil Tampilkan!');window.location='index.php?module=testimonial';</script>";
				}
				if($aksi=='hapus'){
					$sql_hapus=mysql_query("delete from t_testimonial where id_testimonial=".$id."");
					echo "<script>alert('Testimonial Berhasil Dihapus!');window.location='index.php?module=testimonial';</script>";
				}
		}else{
			echo "<script>alert('Testimoni Tidak Tersedia!');window.location='index.php?module=testimonial':</script>";
		}
	}

	$BatasAwal = 5;
 
    if (!empty($_GET['p'])) {
        $hal = $_GET['p'] - 1;
        $MulaiAwal = $BatasAwal * $hal;
    } else if (!empty($_GET['p']) and $_GET['p'] == 1) {
        $MulaiAwal = 0;
    } else if (empty($_GET['p'])) {
        $MulaiAwal = 0;
    }
	
	
?>

<div class="path"><h3>- Testimonial</h3></div><br><br>

<?php


$sql_testimonial=mysql_query("select *from t_testimonial INNER JOIN t_member on t_testimonial.id_member=t_member.id_member limit ".$MulaiAwal.",".$BatasAwal."");
	while($row_tes=mysql_fetch_assoc($sql_testimonial)){
		$nama=$row_tes['nama_lengkap'];
		$tampil=$row_tes['tampil'];
		$id_testimonial=$row_tes['id_testimonial'];
		$tgl_testimonial=$row_tes['tgl_testimonial'];
		$isi=$row_tes['isi_testimonial'];
		
	echo "<table width='586' height='176' cellpadding='5' align='center' cellspacing='0'>
	  <tr align=left bgcolor=#F4E6C9>
		<td width='124' height='41' scope='col'><b>Nama</b></td>
		<td width='11' scope='col'>:</td>
		<td width='388' scope='col'>".$nama."</td>
		<td width='81' scope='col' >&nbsp;</td>
	  </tr>
	  <tr align=left bgcolor=#FFF6CF>
		<td height=96><b>Testimonial<b/></td>
		<td>:</td>
		<td>".$isi."</td>
		<td align=left>"; if($tampil!=1){ echo "<a href='index.php?module=testimonial&aksi=kelola&id=".$id_testimonial."' style=text-decoration:none;color:#333355><img src='img/icon/tag-4.png' title='Tampilkan'></a><a href='index.php?module=testimonial&aksi=hapus&id=".$id_testimonial."'  style=text-decoration:none;color:#333355><img src='img/icon/delete.png'>Hapus</a>"; }else{ echo "<a href='index.php?module=testimonial&id=".$id_testimonial."'  style=text-decoration:none;color:#333355><img src='img/icon/delete.png' title='Hapus'></a>"; } ?><?php echo "</td>
	  </tr>
	  <tr align=left bgcolor=#F4E6C9>
		<td><b>Tgl Testimonial<b/></td>
		<td>:</td>
		<td>".$tgl_testimonial."</td>
		<td>&nbsp;</td>
	  </tr>
	</table><br>
";};

$cekQuery = mysql_query("SELECT * FROM t_testimonial");
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
            echo '" href="index.php?module=testimonial&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }

?>
