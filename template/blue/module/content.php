<?php

	$BatasAwal = 9; // Jumlah Produk Yang Ditampilkan //

	require "./includes/paging.php";
	require "./module/content.php";
	
	if($set_slide=='aktif'){
		echo '<div id="slider"><div id="slideshow"> <ul>';
		slider();
		echo ' </ul></div></div>';
	}
	
?>	  
		
<div class="prod">

<?php
// Menampilkan Produk //

while($row_produk=mysql_fetch_assoc($sql_produk)){ 
	$id_produk=$row_produk['id_produk'];
	$nama_produk=$row_produk['nama_produk'];
	$harga_produk=formatRupiah($row_produk['harga_produk']);
	$gambar_produk=$row_produk['gambar_produk'];
	$stok_produk=$row_produk['stok'];
	$tgl_produk=$row_produk['tgl_post'];

	if($stok_produk!="Habis"){ // Jika Stok Habis Maka Tidak Ditampilkan //
		{	

?>



<div class="produk"><center><b><font size="5px" color="#555555" >
<?php echo $nama_produk; // Nama Produk // ?></font></b> 
<a id="single_1" href='<?php echo $gambar_produk ?>'><img src='<?php echo $gambar_produk // Gambar Produk // ?>' alt="<?php echo $nama_produk ?>" title="Klik Untuk Memperbesar" height="190" width="150"></a><br /><br />
<b style="font-weight:900;"> <?php echo $harga_produk // Harga Produk // ?> </b><br />
<a href="index.php?module=detail&id=<?php echo $id_produk; // ID Produk //?>">
<img src="<?php echo"".ft."./images/icon/btndetail.png" ?>" height="31px" width="80px"/></a>
<a href="index.php?module=cart&add=<?php echo $id_produk //ID Produk // ?>" onclick="return confirm('Apakah anda akan membeli <?php echo $nama_produk;?>?')">
<img src="<?php echo"".ft."./images/icon/btnbuy.png" ?>" height="30px" width="70px" style="margin-left:-5px;" /></a>
</center></div>

<?php
// Menutup Perulangan //
		} 
	}
}
?>      

</div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th align="center" scope="col">
<div class="pagination">
<ul>

<?php 

	if ($jumlahData > $BatasAwal) {
			echo '<center><li>Halaman : </li>';
			$a = explode(".", $jumlahData / $BatasAwal);
			$b = $a[0];
			$c = $b + 1;
			for ($i = 1; $i <= $c; $i++) {
				echo '<li><a ';
				if ($_GET['p'] == $i) {
					echo ' style="text-width:bold"';
				}
				echo 'href="index.php?module=produk'.$kat.''.$cari.'&p=' . $i . '">' . $i . '</a></li>';
			}
			echo '</center>';
		}

?>
	
</div>
	</th>
  </tr>
</table>
</ul>

