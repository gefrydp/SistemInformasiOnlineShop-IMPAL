<?php  

// vMart //
// Developed by Luqman Hakim Y //
// mail@luqman.web.id //

function ubah_huruf_awal($pemisah, $paragrap) {  

    $pisahkalimat=explode($pemisah, $paragrap);  
    $kalimatbaru = array();  

    foreach ($pisahkalimat as $kalimat) {  
    $kalimatawalhurufbesar=ucfirst(strtolower($kalimat));  
    $kalimatbaru[] = $kalimatawalhurufbesar;  
    }  
      
    $textgood = implode($pemisah, $kalimatbaru);  
    return $textgood;  
}  

function makeForgotKey(){
	$salt = "abchefghjkmnpqrstuvwxyz0123456789"; 
          srand((double)microtime()*1000000);  
          $i = 0; 
          while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($salt, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
          } 
          return $pass; 
} 

function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
    return($result);
}

function logobank($bank){
	switch($bank){
	case "BRI";
		echo "<center><img src='images/website/bri.jpg' width='80px'></center>";
		break;
	case "BNI";
		echo "<center><img src='images/website/bni.jpg' width='80px'></center>";
		break;
	case "CIMB";
		echo "<center><img src='images/website/cimb.gif' width='80px'></center>";
		break;
	case "Mandiri";
		echo "<center><img src='images/website/mandiri.jpg' width='80px'></center>";
		break;
	case "Danamaon";
		echo "<center><img src='images/website/danamon.jpg' width='80px'></center>";
		break;
	case "BCA";
		echo "<center><img src='images/website/bca.jpg' width='80px'></center>";
		break;
	}
}
	
function formatRupiah($nilaiUang)
{
	$nilaiRupiah = "";
	$jumlahAngka = strlen($nilaiUang);
while($jumlahAngka > 3)
{
	$nilaiRupiah = "." . substr($nilaiUang,-3) . $nilaiRupiah;
	$sisaNilai = strlen($nilaiUang) - 3;
	$nilaiUang = substr($nilaiUang,0,$sisaNilai);
	$jumlahAngka = strlen($nilaiUang);
}
 
	$nilaiRupiah = "Rp. " . $nilaiUang . $nilaiRupiah . ",-";
return $nilaiRupiah;
}

function cek_session(){

	$time=1000;
	$_SESSION['timeout']=time()+$time;

	$timeout=$_SESSION['timeout'];
	
	if(time()<$timeout){
		return true;
	}else{
		unset($_SESSION['id_user']);
		unset($_SESSION['id_member']);
		return false;
	}
}
 


?>  