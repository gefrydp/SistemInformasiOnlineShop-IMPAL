<?php

function tampil_polling(){

	$sql_tanya=mysql_query("select *from t_polling where status='Tanya'");
	$row_tanya=mysql_fetch_assoc($sql_tanya);
	{
		$pertanyaan=$row_tanya['isi'];
	}
	
	$sql_jawab=mysql_query("select *from t_polling where status='Jawab'");
	
		echo '
		<b>'.$pertanyaan.'</b><br>
		<form method="post" action="./module/voting.php">
		<font size="2" color="#2e776a" face="verdana">
		';
		
		while($row_jawab=mysql_fetch_assoc($sql_jawab)){
			$jawaban=$row_jawab['isi'];
			echo '<input type="radio" name="polling" value="'.$jawaban.'">'.$jawaban.'<br>';
		}
		echo '
		
		<input type="submit" name="kpolling" value="Pilih" >
		</font>
		</form>
		';
	
	
}

?>