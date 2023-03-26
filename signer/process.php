<?php
	$sig_string=$_POST['signature'];
	$nama_file="one.png";
	file_put_contents($nama_file, file_get_contents($sig_string));
	header("location:index.php") ; 
	if(file_exists($nama_file)){
		echo "<p>Signature est ajouter sous le nom - ".$nama_file."</p>";
		echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='".$nama_file."'></p>";
	}
	
?>