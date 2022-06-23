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
 $fechita = date('Y-m-d',strtotime($value[4]));
$sqlplantas="('$num','$value[0]','$value[1]','$value[2]','$fechita','$value[3]',now(),'1','$value[3]')";
$sqlplantas="insert into existenciaplanta(id_paraje,regmaguey,origen,id_comun,fecha_siembra,cantidadini,fecha_registro,status,existenciaplantas)VALUES".$sqlplantas;
$ps=$conexion->query($sqlplantas);
if($ps==false)
{
 echo 'Error al realizar el registro '.$sqlplantas;
}
else{
 echo 'Registro realizado correctamente';	
}
}


    ?>
