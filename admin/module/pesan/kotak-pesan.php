<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
//fungsi pagination
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
<style type="text/css">
.tab {
	color: #FFF;
}
</style>
<div class="path"><h3>- Daftar Pesan Masuk : </h3></div>
  <br>
<br>

 <?php 
		
	$tampil=mysql_query("select *from t_pesan INNER JOIN t_member on t_pesan.dari=t_member.id_member where untuk='Admin' order by tgl_pesan limit ".$MulaiAwal.",".$BatasAwal."");
		
	while($rt=mysql_fetch_assoc($tampil)){
		$username=$rt['username'];
		$judul=$rt['judul_pesan'];
		$isi=$rt['isi_pesan'];
		
			echo "
			
			<table width='586' height='176' cellpadding='5' align='center' cellspacing='0'>
  <tr align=left bgcolor=#F4E6C9>
    <td width='124' height='41' scope='col'><b>Nama</b></td>
    <td width='11' scope='col'>:</td>
    <td width='388' scope='col'>".$username."</td>
	<td></td>

  </tr>
  <tr align=left bgcolor=#FFF6CF>
    <td ><b>Judul Pesan<b/></td>
    <td>:</td>
    <td>".$judul."</td>
	<td ><a href='index.php?module=pesan&aksi=kirim'><img src='img/icon/reply.png' title='Jawab'></a></td>
     </tr>
  <tr align=left bgcolor=#F4E6C9 >
    <td><b>Isi Pesan<b/></td>
    <td>:</td>
    <td>".$isi."</td>
	<td></td>
 
  </tr>
</table><br>
		";}
?>
     
 <?php
  $cekQuery = mysql_query("SELECT * FROM t_pesan");
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
            echo '" href="index.php?module=pesan&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }
?>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>