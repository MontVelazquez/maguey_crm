<?php
include('php/registro/conexion.php');

$return_arr = array();
$valorp = $_POST['valorp'];
$predionump= $_POST['predionump'];

//[{"plantass":"MAGUEY ARROQUE\u00d1O"}]

	//$result = $conexion->query("SELECT cextracciones.id_extraccion,edad, id_plantas,nombre, genespecie, variante,edad,es.existenciaplantas from cextracciones inner join existenciaplanta es on cextracciones.id_paraje=es.id_paraje inner join comun c on es.id_comun=c.id_comun INNER JOIN especie e on e.id_especie=c.id_especie  where es.id_plantas=$valor and cextracciones.id_extraccion=$predionum");
	$sql = $conexion->prepare("SELECT id_plantas,es.edad from  
existenciaplanta es inner join comun c 
on es.id_comun=c.id_comun INNER JOIN 
especie e on e.id_especie=c.id_especie  where es.id_plantas=$valorp and es.id_paraje=$predionump");
if (!$sql) throw new Exception("Ocurrio un error al realizar esta operación, codigo de error(ERROR:FN01) $conexion->error");
if (!$sql->execute()) throw new Exception("Ocurrio un error al realizar esta operación, codigo de error(ERROR:FN02) $conexion->error");
$sql->store_result();
$sql->bind_result($id_plantas,$edad);
while ($sql->fetch()) {
	
	
	echo $edad;
	
	
	


	
	
	
}
$sql->close();
$conexion->set_charset("utf8");




