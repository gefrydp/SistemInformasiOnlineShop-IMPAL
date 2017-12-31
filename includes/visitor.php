<?php
// COUNTER VISITOR //
$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = time(); //
 
// Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
$s = mysql_query("SELECT * FROM t_statistika WHERE ip='$ip' AND tanggal='$tanggal'");

// Kalau belum ada, simpan data user tersebut ke database
if(mysql_num_rows($s) == 0){
    mysql_query("INSERT INTO t_statistika(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
}
// Jika sudah ada, update
else{
    mysql_query("UPDATE t_statistika SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}

$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM t_statistika WHERE tanggal='$tanggal' GROUP BY ip")); // Hitung jumlah pengunjung
$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM t_statistika"), 0); // hitung total pengunjung
$bataswaktu       = time() - 300;
$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM t_statistika WHERE online > '$bataswaktu'")); // hitung pengunjung online
$hkemarin		  = date("d")-1;
$tkemarin		  = date("Y-m-").$hkemarin;
$kemarin		  = mysql_num_rows(mysql_query("SELECT *from t_statistika Where tanggal='".$tkemarin."'"));
?>