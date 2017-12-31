<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
$table='t_produk';
$link='index.php?module=produk';

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
   <div class="path"><h3>- Daftar Produk : </h3></div>
  <br>
<div class="tambah">
<a href="index.php?module=produk&aksi=kelola" ><img src="img/icon/add.png" title="Tambah"> Tambah Produk</a></b>
</div>   
<tr>
    <td valign="top">
    <br />
    <table width="800" height="57" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr class="tabel">
    

        <th width="114" bgcolor="#575757" scope="col" height="36">Produk </th>
        <th width="97" bgcolor="#575757" scope="col">Harga </th>
        <th width="230" bgcolor="#575757" scope="col">Deskripsi </th><br />
		<th width="95" bgcolor="#575757" scope="col">Stok </th>
        <th width="95" bgcolor="#575757" scope="col">Tgl. Post</th>
        <th width="95" bgcolor="#575757" scope="col">Aksi</th>
      </tr>
    </td>
  </tr>
  <?php
// Tampil Data //
	$sql_tampil=mysql_query("select *from ".$table." order by tgl_post DESC limit ".$MulaiAwal.",".$BatasAwal."");
	while($row_tampil=mysql_fetch_assoc($sql_tampil))
	{
		$nama_produk=$row_tampil['nama_produk'];
		$harga_produk=$row_tampil['harga_produk'];
		$stok=$row_tampil['stok'];
		$tgl_post=$row_tampil['tgl_post'];
		$id_produk=$row_tampil['id_produk'];
		$deskripsi_produk=$row_tampil['deskripsi_produk'];
		
		echo "        
        <tr height=35px bgcolor=#F6F4F5>

		  <td>".$nama_produk."</td>
		  <td>" . formatRupiah($harga_produk)."</td>
		
		  <td>
".substr($deskripsi_produk,0,75)." .......</td>
          <td><center>".$stok."</center></td>
		  <td><center>".TanggalIndo($tgl_post)."</center></td>
		  <td><center><a href='".$link."&aksi=kelola&id=".$id_produk."'><img src='img/icon/pencil.png' title='Edit'></a><a href='".$link."&aksi=hapus&id=".$id_produk."'><img src='img/icon/delete.png' title='Hapus'></a></center></td>";
	}
		  
?>
</table>
<?php
 $cekQuery = mysql_query("SELECT * FROM ".$table."");
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
            echo '" href="index.php?module=produk&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }

?>     