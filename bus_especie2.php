<?php
include('php/registro/conexion.php');
$predionum = isset($_GET['c'])?$_GET['c']:0;

$sql = $conexion->prepare("SELECT c.id_comun,id_plantas,nombre, genespecie, variante,es.edad,es.existenciaplantas from cextracciones  inner join existenciaplanta es on 
cextracciones.id_paraje=es.id_paraje inner join comun  c on es.id_comun=c.id_comun  
INNER JOIN especie e on e.id_especie=c.id_especie where cextracciones.id_extraccion=$predionum");
if (!$sql) throw new Exception("Ocurrio un error al realizar esta operación, codigo de error(ERROR:FN01) $conexion->error");
if (!$sql->execute()) throw new Exception("Ocurrio un error al realizar esta operación, codigo de error(ERROR:FN02) $conexion->error");
$sql->store_result();
$sql->bind_result($id_comun,$id_plantas,$nombre,$genespecie,$variante,$edad,$existenciaplantas);
while ($sql->fetch()) {
	//echo "<option value='".$nombre." ".$edad." Años (".$genespecie." ".$variante.") - Existencia ".$existenciaplantas."'> ".$nombre." ".$edad." años (".$genespecie." ".$variante.") - Existencia ".$existenciaplantas."</option>";
	
	//echo "<option value='".$id_comun." ".$nombre." ".$edad." Años (".$genespecie." ".$variante.") - Existencia ".$existenciaplantas."'> ".$nombre." ".$edad." años (".$genespecie." ".$variante.") - Existencia ".$existenciaplantas."</option>";



	echo "<option value='".$id_plantas."' > ".$nombre." (".$genespecie." ".$variante.")</option>";
	//echo "<option value='"    .$id_plantas." "    .$nombre." - ".$genespecie." ".$variante."'> ".$nombre." - ".$genespecie." ".$variante." </option>";
	
	
	


	
	
	
}
$sql->close();
$conexion->set_charset("utf8");




