<?php
session_start();
	if(!isset($_SESSION['id_user']) && !isset($_SESSION['username'])){
			  header('location:login.php');
	}
	
	$table='t_rekening';
	$link='index.php?module=rekening';
	$pk='id_rekening';
	
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
	color: #FFF;
	
}
</style>


<div class="path"><h3>- Daftar Rekening : </h3></div>
  <br>
<div class="tambah">
<a href="index.php?module=rekening&aksi=kelola" ><img src="img/icon/add.png"> Tambah Rekening</a></b>
</div>   
<br>
	<td valign="top">
      <table width="608" height="57" border="0" align="center" cellpadding="0" cellspacing="1" >
        <tr class="tabel">
          <th width="160" bgcolor="#575757" scope="col" height="36">Nama Pemilik</th>
		   <th width="161" bgcolor="#575757" scope="col" height="36">No. Rekening</th>
          <th width="126" bgcolor="#575757" scope="col">Nama Bank</th>
          <th width="119" bgcolor="#575757" scope="col">Cabang</th>
		    <th width="89" bgcolor="#575757" scope="col">Aksi</th>
        </tr>
        <?php
        
        // Tampil Data //
        
        $sql_tampil=mysql_query("select *from ".$table." limit ".$MulaiAwal.",".$BatasAwal."");
        while($row_tampil=mysql_fetch_assoc($sql_tampil))
        {
			$nama_pemilik=$row_tampil['nama_pemilik'];
			$no_rekening=$row_tampil['no_rekening'];
			$nama_bank=$row_tampil['nama_bank'];
			$cabang=$row_tampil['cabang'];
			$id_rekening=$row_tampil['id_rekening'];
        echo "        
        <tr align='center' bgcolor='#F6F4F5'>
          <td height=30px>".$nama_pemilik."</td>
		  <td height=30px>".$no_rekening."</td>
		  <td height=30px>".$nama_bank."</td>
          <td height=30px>".$cabang."</td>
          <td><center><a href='".$link."&aksi=kelola&id=".$id_rekening."'><img src='img/icon/pencil.png' title='Edit'></a><a href='".$link."&aksi=hapus&id=".$id_rekening."'><img src='img/icon/delete.png' title='Hapus'></a></center></td>";
          };
          
          ?>        
        </tr>
  </table>
  <?php
 $cekQuery = mysql_query("SELECT * FROM t_rekening");
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
            echo '" href="index.php?module=rekening&p=' . $i . '">' . $i . '</a>, ';
        }
        echo '</div></center>';
    }

?>     
   
