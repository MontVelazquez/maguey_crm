<?php
try{
		$servidor = "localhost";
		$basedatos = "u434890810_maguey_123";
		$usuario = "u434890810_maguey_123";
		$contrasena = "Maguey_123@";
	
		$conexion = new PDO("mysql:host=$servidor;dbname=$basedatos",
							$usuario,
							$contrasena,
							array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		
		$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $conexion;
	}
	catch (PDOException $e){
		die ("No se puede conectar a la base de datos". $e->getMessage());
	}
	
	
?>


