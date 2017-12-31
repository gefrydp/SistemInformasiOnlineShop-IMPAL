<?php
	require './module/detail.php';
?>

<div class="detail">
<div class="bread"><a href="index.php">Home</a> > <a href="index.php?module=produk&kategori=<?php echo "".$id_kategori.""?>"><?php echo "".$nama_kategori."" ?></a> > <a href="index.php?module=detail&id=<?php echo "".$id_produk.""?>"><?php echo"".$nama_produk.""?></a>
</div><br><table width="544" height="193" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle">
    <th width="225" rowspan="4" scope="col" style="border-color:#DDDDDD; border-style:solid; border-width:thin; padding:5px"><a id="single_1" href='<?php echo "".$gambar_produk."" ?>'><img src="<?php echo "".$gambar_produk."" ?>"  height="260px" width="200px" title="Klik Untuk Memperbesar"></a></th>
    <th width="632" scope="col" align="left"><h2><?php echo"".$nama_produk."" ?></h2></th>
  </tr>
  <tr>
    <td height="19"><h5>Kategori : <?php echo "".$nama_kategori."" ?></h5><hr></td>
	
  </tr>
  <tr>
    <td style="padding:10px;"><span><?php echo "".$deskripsi_produk."" ?></span><hr style="margin-top:13px;margin-left:-2px;width:110%"></td>
  </tr>
  <tr>
    <td><h3>Harga : <?php echo"" . formatRupiah($harga_produk). ""?></h3><hr></td>
  </tr>
  <tr>
    <td></td>
    <td align="right"><br><form id="form1" name="form1" method="post" action="index.php?module=cart&add=<?php echo "".$id.""?>">
      <input type="submit" class="button blue" name="buy" style="width:60px;" id="buy" value="+ Beli" />
    </form></</td>
  </tr>
</table></div>
