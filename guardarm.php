<?php
/*echo "<pre>";
  $data = json_decode($_POST['tMaguey'], true);
print_r($data);
echo "</pre>";*/
include ("php/registro/conexion.php");
  				  //$fec = date('Y-m-d',  strtotime($_POST['fecha']));
  				   $num=$_POST['num'];// representante en campo 

//obtenemos el id del paraje para insertar

$data = json_decode($_POST['tMagueys'], true);
foreach($data as $value)
{
$sqlplanta="('$num','$value[0]','$value[1]','$value[2]','$value[3]','$value[4]','$value[5]',now(),'1','$value[4]')";
$sqlplantas="insert into existenciaplanta(id_paraje,regmaguey,dis_surcometros,dis_planmetros,id_comun,cantidadini,edad,fecha_registro,status,existenciaplantas)VALUES".$sqlplanta;
$ps=$conexion->query($sqlplantas);

if ($value[5]>4){
	  $datoextracc="('$num','1',now(),' '),('$num','1',now(),' '),('$num','1',now(),' '),('$num','1',now(),' '),('$num','1',now(),' ')";
	  $datoextracc="insert into cextracciones(id_paraje,status,fecha,constancia)values".$datoextracc;
	$resextrac=$conexion->query($datoextracc);
	}

}
if($ps==false)
{
 echo 'Error al realizar el registro '.$sqlplantas;
}
else{
 echo 'Registro realizado correctamente';	
}

?>









