<?php
	session_start();
	
	$BatasAwal = 10; // Jumlah Konten Yang Ditampilkan
	
	require "./module/tagihan.php";
	require "./includes/paging.php";
	
	
?>

<style type="text/css">
	.tabel{
		color: #FFF;
	}

	table a{
		text-decoration:none;
		color:#0A307E;
	}

	table a:hover{
		text-decoration:underline;
}
</style>

  <div class="bread"><b style="font-weight:bold">- Daftar Tagihan :</b></div><br>
	<table width="571" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr class="tabel">

    <th width="90" bgcolor="#575757" scope="col" height="38px">No.Tagihan</th>
    <th width="103" bgcolor="#575757" scope="col">Status</th>
	<th width="100" bgcolor="#575757" scope="col">Tgl.Tagihan</th>
    <th width="103" bgcolor="#575757" scope="col">Total</th>
    <th width="100" bgcolor="#575757" scope="col">Aksi</th>
  </tr>
  
<?php

	$sql=mysql_query("select *from t_tagihan where id_member=".$id_member." order by tgl_tagihan ASC limit $MulaiAwal,$BatasAwal");
	
	while($row=mysql_fetch_assoc($sql)){
		

		
		$id_tagihan=$row['id_tagihan'];
		$total_tag=formatRupiah($row['total_tagihan']);
		$tgl_tagihan=TanggalIndo($row['tgl_tagihan']);
		
		if($row['status_tagihan']=='Lunas'){
			$status="<font color='green'>Lunas</font>";
			$link="<a href='index.php?module=tagihan&id=".$id_tagihan."' target='a_blank'>Lihat Tagihan</a><br>
				  
					";
		
		}elseif($row['foto_faktur']!=''){
			$status="<font color='#E67817'>Proses..</font>";
			$link="<a href='index.php?module=tagihan&id=".$id_tagihan."' target='a_blank'>Lihat Tagihan</a><br>
				 
					";
		
		}else{
			$status="<font color='red'>Belum Lunas</font>";
			$link="<a href='index.php?module=tagihan&id=".$id_tagihan."' target='a_blank'>Lihat Tagihan</a><br>
				   <a href='index.php?module=tagihan&aksi=confirm&id=".$id_tagihan."'>Konfirmasi</a>
					";
	
		}

			echo "  <tr align='center' bgcolor='#F6F4F5'>
				
					<td height=32px>".$id_tagihan."</td>
					<td>".$status."</td>
					<td>".$tgl_tagihan."</td>
					<td>".$total_tag."</td>
					<td align='left'>
						".$link."
					</td>
					</tr>
					"; 

}
; 
  
  echo "</table>";
 
	$cekQuery = mysql_query("select id_tagihan from t_tagihan where id_member=".$id_member."");
	
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
            echo '" href="index.php?module=konfirmasi&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }


  
  
  ?>
  
  

