<?php 
include('../php/registro/conexion.php');

$listado="INSERT INTO localidades(MunicipioID,localidad) VALUES ( '$_POST[id_municipio]','$_POST[localidad]')";
$listar= $conexion->query($listado);

?>
