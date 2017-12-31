<?php
	require "./module/d-tagihan.php";
	
?>

<table width="560" height="404" cellpadding="0" cellspacing="0" style="border-style:solid; border-width:thin; border-color:#DFDFDF" >
  <tr>
    <td width="559" valign="top" scope="col"><table width="560" cellspacing="0" cellpadding="0" border="0">
      <tr>
        <th width="110" height="89" scope="col"><img src="<?php echo "".$banner_web.""; ?>" width="200px" height="40px"></th>
        <th width="180" scope="col"><?php echo $status; ?></th>
      </tr>
    </table>
<hr>
      <table width="560" cellpadding="0" cellspacing="1">
        <tr align="left">
          <td height="30" colspan="5" scope="col">&nbsp;Tagihan No : <?php echo $id ?><br>
          &nbsp;Tgl. Tagihan : <?php echo $tgl_tagihan ?>
          <br><br></td>
        </tr>
        <tr bgcolor="#575757" style="color:#FFFFFF">
          <th width="117" height="38">Produk</th>
          <th width="103">Ukuran</th>
          <th width="129">Harga</th>
          <th width="118">Qty</th>
          <th width="151">Jumlah</th>
        
        </tr>
<?php
	$sql_dorder=mysql_query("select *from t_order INNER JOIN t_produk on t_order.id_produk=t_produk.id_produk where id_tagihan=".$id."");
	$sql_dtag=mysql_query("select *from t_tagihan where id_tagihan=".$id."");
		$r=mysql_fetch_assoc($sql_dtag);
		
		$total_tagihan=$r['total_tagihan'];
		
	while($row_dtag=mysql_fetch_assoc($sql_dorder)){
	

	
		$nama_produk=$row_dtag['nama_produk'];
		$ukuran=$row_dtag['ukuran'];
		$harga_produk=$row_dtag['harga_produk'];
		$qty=$row_dtag['qty'];
		$jumlah=$harga_produk*$qty;
		$jumlah_semua=$jumlah_semua+$jumlah;
		
	echo "
        <tr bgcolor='#F6F4F5' align='center'>
          <td height=30>".$nama_produk."</td>
          <td>".$ukuran."</td>
          <td>".formatRupiah($harga_produk)."</td>
          <td>".$qty."</td>
          <td>".formatRupiah($jumlah)."</td>
      ";
	 }
	
	 $uang_kirim=$total_tagihan-$jumlah_semua;
	 
?>

        </tr>
        <tr  bgcolor="#E2EBEE">
          <th height="30" colspan="4" align="right">Biaya Pengiriman :&nbsp; </th>
          <th><?php echo formatRupiah($uang_kirim) ?></th>
   
        </tr>
        <tr  bgcolor="#B9FFFF">
          <th height="30" colspan="4" align="right" >Total :&nbsp;  </th>
          <th><?php echo formatRupiah($total_tagihan) ?></th>
     
        </tr>
      </table>
	    <br>
   </td>
  
  </tr>

</table>
<p align="right">
<input type="button" onclick="window.location='index.php?module=tagihan'" class="button green" name="kembali" id="kembali" value="Daftar Tagihan">
<input type="button" onclick="window.location='index.php?module=tagihan&aksi=confirm&id=<?php echo $id ?>'" class="button blue" name="konfirmasi" id="konfirmasi" value="Konfirmasi"></p>
</body>
</html>
