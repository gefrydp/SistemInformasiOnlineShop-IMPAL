<?php
	require "./module/check-out.php";
	
	
?>

<style type="text/css">
.tabel {
	color: #FFF;
}
</style>
  <div class="bread"><b style="font-weight:bold">- Alamat Pengiriman :</b></div>
<table width="559" height="217" align="center" cellpadding="0" cellspacing="4">
  <tr><?php echo"
    <td width=301 valign=top scope=col>
    <p><b>Nama  :</b> ".$row_member['nama_lengkap']."</p>
    <p><b>No. Telp :</b> ".$row_member['no_telp']."</p>
	<h4 style='color:#FF0000; background-color:#F4E6C9'>> Biaya Pengiriman :</h4>
	";
	
		
		if($check_ship<1){
			$status_ship="Fail";
			echo "Maaf, Kami Belum Melayani Pengiriman ke Wilayah Anda!";
		}else{
			$status="Suc";
			echo "	Dari : ".$kota_toko." <br>
					Tujuan : ".$row_member['kota']." <br>
					Kurir : ".$row_ship['kurir']."<br>
					Biaya : ".formatRupiah($biaya_kirim)."<br>";
		};


	echo "
	
	</td>
	
    <td width=356 valign=top scope=col><p><b>Tanggal Order :</b> ".TanggalIndo($tgl_sekarang)."</p>
    <p><b>Alamat :</b> ".$row_member['alamat']."</p>
    <p><b>Kota : </b>".$row_member['kota']."</p>
    <p><b>Provinsi : </b>".$row_member['provinsi']."</p>
    <p><b>Kode Pos : </b>".$row_member['kode_pos']."</p>
    <p align=right><strong><right><input type=button onclick=window.location='index.php?module=cart' class='button green' name='ubah' id='ubah' value='Ubah Alamat'></right></strong></p></td>
  </tr>
</table>";

if($status_ship=="Fail"){
	echo "<hr>Agar Kami Dapat Melayani ke Wilayah Anda , Silahkan Laporkan Wilayah Anda via <a href='index.php?module=pesan'><b style='color:#FF0000'>PESAN</b><hr>";
}else{

?>

 <div class="bread"><b style="font-weight:bold">- Detail Pembelian :</b></div><br>
  <form name="form1" method="post" action="">
    <table width="551" border="0"  align="center" cellpadding="0" cellspacing="1">
      <tr class="tabel">
        <th width="151" height="35px" bgcolor="#575757" scope="col">Produk</th>
        <th width="117" bgcolor="#575757" scope="col">Harga</th>
        <th width="111" bgcolor="#575757" scope="col">Ukuran</th>
        <th width="111" bgcolor="#575757" scope="col">Qty</th>
        <th width="150" bgcolor="#575757" scope="col">Jumlah</th>
      </tr>
 
<?php

// SQL Untuk Mengambil Data di Table Keranjang //


$sql_keranjang=mysql_query("select *from t_keranjang INNER JOIN t_produk on t_keranjang.id_produk=t_produk.id_produk where id_member=".$_SESSION['id_member']."");
while($row_keranjang=mysql_fetch_assoc($sql_keranjang)){

$jumlah=$row_keranjang['qty']*$row_keranjang['harga_produk'];
$total=$total+$jumlah;

$duit_harga=formatRupiah($row_keranjang['harga_produk']);
$duit_jumlah=formatRupiah($jumlah);
$duit_total=formatRupiah($total);

  echo"<tr bgcolor=#F6F4F5>
    <td align=center>".$row_keranjang['nama_produk']."</td>
    <td align=center>".$duit_harga."</td>
	 <td align=center>".$row_keranjang['ukuran']."</td>
    <td align=center>".$row_keranjang['qty']."</td>
    <td align=center>".$duit_jumlah."</td>
  </tr>
<input type='hidden' name='qty[]' value=".$row_keranjang['qty']." />
<input type='hidden' name='ukuran[]' value=".$row_keranjang['ukuran']." />
<input type='hidden' name='id_keranjang[]' value=".$row_keranjang['id_keranjang']." />
<input type='hidden' name='id_produk[]' value=".$row_keranjang['id_produk']." />
<input type='hidden' name='id_mem[]' value=".$id_member." />
<input type='hidden' name='tgl_order[]' value=".$tgl_sekarang." />
<input type='hidden' name='status[]' value='Belum Lunas'/>
  
  
"; }

	$total=$total+$biaya_kirim;
	$duit_total=formatRupiah($total);
	
	$_SESSION['total_bayar']=$total;
	

 ?>
      <tr bgcolor="#E2EBEE">
		<td colspan="4" align="right"><strong style="font-weight:bold; colir:">Biaya Pengiriman : &nbsp;</strong></td><td align="center" height='30px'><b style="font-weight:bold"><?php echo "".formatRupiah($biaya_kirim).""; ?></b></td></tr>
         <tr bgcolor="#B9FFFF"><td colspan="4" align="right"><strong style="font-weight:bold; colir:">Total : &nbsp;</strong></td>
		
        <td align="center" height='30px'><b style="font-weight:bold"><?php echo $duit_total; ?></b></td>
      </tr>
    </table><br><br>
	<p align="right">
   <input type="button" onclick="window.location='index.php?module=cart'" class="button green" name="ubah" id="ubah" value="Ubah Order">
          <input type="submit" name="co" id="co" value="Check Out" class="button blue"></p>
  </form>
<p>&nbsp;</p>
    <p>&nbsp;</p>

<?php } ?>