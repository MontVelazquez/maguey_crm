<?php
/*echo "<pre>";
  $data = json_decode($_POST['tMaguey'], true);
print_r($data);
echo "</pre>";*/
include ("php/registro/conexion.php");
  				  //$fec = date('Y-m-d',  strtotime($_POST['fecha']));
  				   //$des=$_POST['des'];// representante en campo 
				    $numpp=$_POST['numpp'];
					$numgp=$_POST['numgp'];
				
					
					 //$plantass=$_POST['plantass'];
				   
				   
				   
		$datoextracc="('$numpp',0,now(),0 ,'0','$numgp')";
		 
		//  $count_id++;	
	  //}
	  $datoextracc="insert into cextracciones2(id_paraje,status,fecha, constancia,bandera,extraccion)values".$datoextracc;
	    
   // $datoextracc="insert cextracciones2 SET status='0' WHERE id_extraccion='$numg'";
	  $ps=$conexion->query($datoextracc);
if($ps==false)
{
 echo 'Error al realizar el registro'.$datoextracc;
}

	

//obtenemos el id del paraje para insertar
//ingresamos las plantas		

$data = json_decode($_POST['tMagueysp'], true);
foreach($data as $value)
{
	//$sqlplantas="UPDATE existenciaplanta SET existenciaplanta.existenciaplantas='$value[4]' where id_plantas='$value[0]'";
		
	
	$sqlplantas="existenciaplanta.existenciaplantas='$value[4]' where id_plantas='$value[0]'";
	
$sqlplantas="UPDATE existenciaplanta  SET ".$sqlplantas; 
$ps=$conexion->query($sqlplantas);
if($ps==false)
{
 echo 'Error al realizar el registro'.$sqlplantas;
}
 else {
        echo "Registro Exitoso".$conexion->error;
        }
}





?>









