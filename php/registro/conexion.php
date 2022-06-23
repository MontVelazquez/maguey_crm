<?php
	#$conexion = new mysqli("localhost","u434890810_maguey_123","Maguey_123@","u434890810_maguey_123");
	$Server="localhost";
	$User="root";
	$Pass="";
	$DataBase="crm";
	
	$conexion=mysqli_connect($Server,$User, $Pass,$DataBase);
	//$conexion = new mysqli("localhost","crm","root","crm");
	mysqli_set_charset($conexion,"utf8");
	if($conexion->connect_errno > 0){
  	die('Unable to connect to database [' . $conexion->connect_error . ']');
}

?>

