<?php
	require "./module/cart.php";
?>

<style type="text/css">
#form1 table tr th {
	color: #FFF;
}
</style>

<form id="form1" name="form1" method="post" action="">
  <div class="bread"><b style="font-weight:bold">- Keranjang Belanja :</b></div><br>
  <table width="559" border="0" cellspacing="1" align="center" cellpadding="0" cellspacing="0">
    <tr bgcolor="#CCCCCC">

      <th width="135" bgcolor="#575757" scope="col" height="35px">Produk</th>

      <th width="141" bgcolor="#575757" scope="col">Harga</th>
	    <th width="75" bgcolor="#575757" scope="col">Berat</th>
       <th width="65" bgcolor="#575757" scope="col">Ukuran</th>  
      <th width="50" bgcolor="#575757" scope="col">Qty</th>
      <th width="133" bgcolor="#575757" scope="col">Jumlah</th>
      <th width="131" bgcolor="#575757" scope="col">Aksi</th>
    </tr>
<?php
	
	// Menampilkan Data Table Keranjang //
	
		$sql_get=mysql_query("select *from t_keranjang INNER JOIN t_produk on t_keranjang.id_produk=t_produk.id_produk where id_member=".$id_member.""); // SQL Untuk Memanggil Data
		while($row_get=mysql_fetch_assoc($sql_get)){
			 $check=mysql_num_rows($sql_get);
			 $jumlah=$row_get['harga_produk']*$row_get['qty'];
			 $nama_produk=$row_get['nama_produk'];
			 $total=$total+$jumlah;
			 $berat=$row_get['berat'];
			 $ukuran=$row_get['ukuran'];
			 $harga_produk=$row_get['harga_produk'];
			 $qty=$row_get['qty'];
			 $id_produk=$row_get['id_produk'];
			 $id_keranjang=$row_get['id_keranjang'];
			 
			 $duit_harga=formatRupiah($harga_produk);
			 $duit_jumlah=formatRupiah($jumlah);
			 $duit_total=formatRupiah($total);
	
		echo "
			 <tr height=30px bgcolor=#F6F4F5>
				<input name='id_keranjang' type='text' id='id_keranjang' size=3 maxlength=3 value=".$id_keranjang." hidden>
			 <td align=center>".$nama_produk."</td>
			 <td align=center>".$duit_harga."</td>
			 <td align=center>".$berat." Kg</td>
			 
			 <td align=center><select name=ukuran[] id=ukuran[]>
				 <option value=".$ukuran." hidden>".$ukuran."</option>;
				 <option value=S>S</option>
				 <option value=M>M</option>
				 <option value=L>L</option>
			 </select></td>
			
			 <td align=center><input name='qty[]' type=text id=qty size=2 maxlength=3 value=".$qty." onkeypress='return harusangka(event)'></td>
			 <td align=center>".$duit_jumlah."</td>
			 <td style=padding:3px><center><input name='update' type='submit' value='Update' class='button green'/> <a href='index.php?module=cart&aksi=hapus&id=".$id_keranjang."'><img src='".ft."/images/icon/delete.png'></a></center></td>

				 <input type='hidden' name='id_keranjang[]' value=".$id_keranjang." />
				 <input type='hidden' name='id_produk[]' value=". $id_produk." />
				 <input type='hidden' name='id_mem[]' value=".$id_member." />
		
			";}?> 
  </tr>
  </table>
 
  <table width="501" height="20" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th width="501" align="right" scope="col"> <h3><font color="#FF0000" style="font-weight:200">Total Yang Harus Dibayar : <?php echo $duit_total ?></font></h3></th><td width="1"></th>
    </tr>
  </table>
  <font size='2' color='#666666'>* Apabila Anda mengubah jumlah (Qty) atau Ukuran, jangan lupa tekan tombol <b style="font-weight:900">Update</b></font><br>
  <font size='2' color='#666666'>** Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat <b style="font-weight:900">Check Out</b></font>
  <table width="501" height="64" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <th height="62" align="right" scope="col">
        <p>
		  <input type='button' onclick="window.location='index.php'" class='button green' name='lanjut' id='lanjut' value='Lanjut Belanja'>
          <input type="submit" name="checkout" id="checkout" value="Check Out" class="button blue" />
      </p></th>
    </tr>
  </table>
 
</form>