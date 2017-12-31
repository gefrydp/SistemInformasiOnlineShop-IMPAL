<?php
	session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
		
		
	require_once "../../includes/koneksi.php";
	require_once "../../includes/lib.php";
	require_once  "../../includes/fungsi.php";
	
	$sql_ctag=mysql_query("select *from t_tagihan where id_tagihan=".$id." and id_member=".$id_member."") or die(mysql_error());
	$row_ctag=mysql_fetch_assoc($sql_ctag);
	$r_ctag=mysql_num_rows($sql_ctag);
	if($r_ctag<1){
		echo "<script>window.location=('index.php?module=order');</script>";
	}
	
	$sql_member=mysql_query("select *from t_tagihan INNER JOIN t_member on t_tagihan.id_member=t_member.id_member where id_tagihan=".$id."");
	$row_member=mysql_fetch_assoc($sql_member);
		{
			$nama_member=$row_member['nama_lengkap'];
			$no_telp_member=$row_member['no_telp'];
			$email_member=$row_member['email'];
			$alamat_member=$row_member['alamat'];
			$provinsi_member=$row_member['provinsi'];
			$kota_member=$row_member['kota'];
			$kode_pos_member=$row_member['kode_pos'];
		}
	

?>

<style type="text/css">
.tabel {
	color: #FFF;
}
</style>
<br><br>
<table width="552" height="433" cellpadding="10" align="center" cellspacing="0" border="0" style="border-style:solid;border-width:thin;border-color:#DFDFDF;">
  <tr>
    <td width="540" height="238" scope="col"><table width="532" height="223" cellpadding="0" cellspacing="0">
      <tr>
        <th height="44" colspan="3" scope="col"><font size="3">DATA PEMBELI</font></th>
        </tr>
      <tr align="left">
        <td width="167">Nama</td>
        <td width="7">:</td>
        <td width="356"><?php echo $nama_member ?></td>
      </tr>
      <tr align="left">
        <td>No.Telp</td>
        <td>:</td>
        <td><?php echo $no_telp_member ?></td>
      </tr>
      <tr align="left">
        <td>Email</td>
        <td>:</td>
        <td><?php echo $email_member ?></td>
      </tr>
      <tr align="left">
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $alamat_member ?></td>
      </tr>
      <tr align="left">
        <td>Kota</td>
        <td>:</td>
        <td><?php echo $kota_member ?></td>
      </tr>
      <tr align="left">
        <td>Provinsi</td>
        <td>:</td>
        <td><?php echo $provinsi_member ?></td>
      </tr>
      <tr align="left">
        <td height="28">Kode Pos</td>
        <td>:</td>
        <td><?php echo $kode_pos_member ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="189" valign="top"><table width="532" height="142" cellpadding="0" cellspacing="1" >
      <tr>
		 <th height="43" scope="col" colspan="5"><font size="3">DATA BARANG</font></th>
		</tr>
	  <tr class="tabel">
		 
        <th width="136" height="43" bgcolor="#575757" scope="col">Produk</th>
        <th width="76" bgcolor="#575757" scope="col">Ukuran</th>
        <th width="124" bgcolor="#575757" scope="col">Harga</th>
        <th width="56" bgcolor="#575757" scope="col">Qty</th>
        <th width="138" bgcolor="#575757" scope="col">Jumlah</th>
      </tr>
<?php
	$total_tagihan=$row_ctag['total_tagihan'];
	
	$sql_dorder=mysql_query("select *from t_order INNER JOIN t_produk on t_order.id_produk=t_produk.id_produk where id_tagihan=".$id."");
	while($row_dtag=mysql_fetch_assoc($sql_dorder)){
	

	
		$nama_produk=$row_dtag['nama_produk'];
		$ukuran=$row_dtag['ukuran'];
		$harga_produk=$row_dtag['harga_produk'];
		$qty=$row_dtag['qty'];
		$jumlah=$harga_produk*$qty;
		$jumlah_semua=$jumlah_semua+$jumlah;
		echo"
      <tr align=center>
        <td bgcolor=#F6F4F5 height=29>".$nama_produk."</td>
        <td bgcolor=#F6F4F5>".$ukuran."</td>
        <td bgcolor=#F6F4F5>".formatRupiah($harga_produk)."</td>
        <td bgcolor=#F6F4F5>".$qty."</td>
        <td bgcolor=#F6F4F5>".formatRupiah($jumlah)."</td>
      </tr>";
	  };
	  
	 $uang_kirim=$total_tagihan-$jumlah_semua;
?>
      <tr align="center">
        <td colspan="4" align="right" height="32" bgcolor="#E2EBEE"><strong>Biaya Pengiriman :&nbsp; </strong></td>
        <td bgcolor="#E2EBEE"><strong><?php echo formatRupiah($uang_kirim) ?></strong></td>
      </tr>
      <tr align="center">
        <td colspan="4" align="right" height="32" bgcolor="#B9FFFF"><strong>Total :&nbsp; </strong></td>
        <td bgcolor="#B9FFFF"><strong><?php echo formatRupiah($total_tagihan) ?></strong></td>
      </tr>
    </table><p>&nbsp;</p>

</td>
  </tr>
 

</table>

<script>
window.print();
</script>