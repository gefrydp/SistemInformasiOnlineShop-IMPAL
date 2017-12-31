<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	//fungsi pagination
    $BatasAwal = 10;
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
		color: #FFFFFF;
	}
	a{
		text-decoration:none;
	}

	a:hover{
		opacity:0.8;
		text-decoration:underline;
	}

</style>
</head>

<body>

<div class="path"><h3>- Daftar Konfirmasi : </h3></div>
<br>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr class="tabel">
    <th width="89" height="43" bgcolor="#575757" scope="col">No. Order</th>
    <th width="317" bgcolor="#575757" scope="col">Nama</th>
    <th width="161" bgcolor="#575757" scope="col">Foto Faktur</th>
    <th width="200" bgcolor="#575757" scope="col">Total Tagihan</th>
	<th width="200" bgcolor="#575757" scope="col">Status</th>
    <th width="200" bgcolor="#575757" scope="col">Aksi</th>
  </tr>
<?php
	$sql_tampil=mysql_query("select *from t_tagihan INNER JOIN t_member on t_tagihan.id_member=t_member.id_member order by id_tagihan DESC limit $MulaiAwal,$BatasAwal") or die(mysql_error());
	
	while($row_tampil=mysql_fetch_assoc($sql_tampil)){
		$id_tagihan=$row_tampil['id_tagihan'];
		$nama_lengkap=$row_tampil['nama_lengkap'];
		$total_tagihan=$row_tampil['total_tagihan'];
		$foto_faktur=$row_tampil['foto_faktur'];
		
		if($status_tagihan=='Lunas'){
				$status_tagihan="<font color='green'>Lunas</font>";
				$nama_link="Batal";
		}else{
				$status_tagihan="<font color='red'>Belum Lunas</font>";
				$nama_link="Konfirmasi";
		}
		
		if($row_tampil['foto_faktur']!=''){
			echo "
			  <tr bgcolor=#F6F4F5>
				<td align=center>".$id_tagihan."</td>
				<td>".$nama_lengkap."</td>
				<td><center><a id='single_1' href='.".$row_tampil['foto_faktur']."'><img src='.".$foto_faktur."' width='100' height='100' title='Klik Untuk Memperbesar!'></a></center></td>
				<td><center>".formatRupiah($total_tagihan)."</center></td>
				<td><center>".$status_tagihan."</center></td>
				<td><center>
					<a href='index.php?module=order&id=".$id_tagihan."'>Detail Order</a><br>
					<a href='index.php?module=order&aksi=kelola&id=".$id_tagihan."'>".$nama_link."</a>
					</center>
				</td>
			  </tr>
			"; 
			}
		
	}
?>
</table>
<?php

	$cekQuery = mysql_query("SELECT * FROM t_tagihan");
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