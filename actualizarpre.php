<?php
/*echo "<pre>";
  $data = json_decode($_POST['tMaguey'], true);
print_r($data);
echo "</pre>";*/
include ("php/registro/conexion.php");
  				  //$fec = date('Y-m-d',  strtotime($_POST['fecha']));
  				   //$des=$_POST['des'];// representante en campo 
				    $numg=$_POST['numg'];
					 $resultado=$_POST['resultado'];
					 $especies=$_POST['especies'];
					 //$plantass=$_POST['plantass'];
				   
				   
				   
				    
    $datoextracc="UPDATE cextracciones SET status='0' WHERE id_extraccion='$numg'";
	  $ps=$conexion->query($datoextracc);
if($ps==false)
{
 echo 'Error al realizar el registro'.$datoextracc;
}

	

//obtenemos el id del paraje para insertar
//ingresamos las plantas		

$data = json_decode($_POST['tMagueys'], true);
foreach($data as $value)
{
	//$sqlplantas="UPDATE existenciaplanta SET existenciaplanta.existenciaplantas='$value[4]' where id_plantas='$value[0]'";
		
	
	$sqlplantas="existenciaplanta.existenciaplantas='$value[4]' where id_plantas='$value[0]'";
	
$sqlplantas="UPDATE existenciaplanta  inner join cextracciones on cextracciones.id_paraje=existenciaplanta.id_paraje SET ".$sqlplantas; 
$ps=$conexion->query($sqlplantas);
if($ps==false)
{
 echo 'Error al realizar el registro'.$sqlplantas;
}
 else {
        echo "Registro Exitoso" . $conexion->error;
        }
}





?>









