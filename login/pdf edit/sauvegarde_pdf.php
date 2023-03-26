 <?php  
include('config.php');
date_default_timezone_set("America/Bogota");
$fecha      	=  date("d_m_Y");
$hora        	=  date("g:i:A");

// verfication de l existance du chemin 
$chemin = "Files_Pdf/";
if (!file_exists($chemin)) {
    mkdir($chemin, 0777, true);
}

$namefile  = $_REQUEST['name_file'];
$urlFile   = $_FILES["file-input"]["name"]; //Recibiendo el Archivo


//Modificando nombre del archivo
$new_name_file  = "PDF.pdf";
//$new_name_file  = $fecha.'_'.$urlFile;


//Guardando archivo en la carperta
$archivo = $chemin . basename($new_name_file); 
//$archivo ="Files_Pdf/08_03_2023SASA.pdf "  ;
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));  
if (move_uploaded_file($_FILES["file-input"] ["tmp_name"], $archivo)) {
	
	//Registrando el archivo en bd
	$InsertFile = ("INSERT INTO archivos(
		  urlArchiv,
		  name_file,
		  dateactuel
		)
		VALUES (
		  '" .$new_name_file. "',
		  '" .$namefile. "',
		  '" .$fecha.'_'.$hora. "'
		)");
	$resultInsert = mysqli_query($con, $InsertFile); ?>
	<script type="text/javascript">
		window.location.href = "index.html";
	</script>
<?php

} else {
    echo "erreur e subission des archives ";
}
mysqli_close($con);
?>	