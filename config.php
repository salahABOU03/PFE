<?php
$usrname  = "root";
$password = "";
$server = "localhost";
$database = "salah";
$con = mysqli_connect($server, $usrname, $password) or die("No se ha podido conectar al Servidor");
mysqli_query($con,"SET SESSION collation_connection ='utf8_unicode_ci'");
$db = mysqli_select_db($con, $database) or die("Upps! Error en conectar a la Base de Datos");

?>
