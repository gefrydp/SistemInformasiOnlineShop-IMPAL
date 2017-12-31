<?php
session_start();
	
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	
	$table='t_kategori';
	$link='index.php?module=kategori';
	$pk='id_kategori';
	
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


<div class="path"><h3>- Daftar Kategori : </h3></div>
  
<div class="tambah"><br>
<a href="index.php?module=kategori&aksi=kelola" ><img src="img/icon/add.png"> Tambah Kategori</a></b>
</div>   
<br>
	<td valign="top">
      <table width="508" height="57" border="0" align="center" cellpadding="0" cellspacing="1" >
        <tr class="tabel">
          <th width="91" bgcolor="#575757" scope="col" height="36">ID Kategori</th>
          <th width="226" bgcolor="#575757" scope="col">Nama Kategori</th>
          <th width="89" bgcolor="#575757" scope="col">Aksi</th>
        </tr>
 <?php
        
        $sql_tampil=mysql_query("select *from ".$table." limit ".$MulaiAwal.",".$BatasAwal."");
        while($row_tampil=mysql_fetch_assoc($sql_tampil)){
		
			$id_kategori=$row_tampil['id_kategori'];
			$nama_kategori=$row_tampil['nama_kategori'];
			
        echo "        
        <tr bgcolor=#F6F4F5>
          <td height=25px>".$id_kategori."</td>
          <td align=left>".$nama_kategori."</td>
          <td><center><a href='".$link."&aksi=kelola&id=".$id_kategori."'><img src='img/icon/pencil.png' title='Edit'></a><a href='".$link."&aksi=hapus&id=".$id_kategori."'><img src='img/icon/delete.png' title='Hapus'></a></center></td>
		</tr>
		  ";
        }
          
?>        
  
</table>  
	  
<?php
 $cekQuery = mysql_query("SELECT * FROM t_kategori");
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
            echo '" href="index.php?module=kategori&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }

?>     
   
