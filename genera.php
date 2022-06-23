
<?php
/*echo "<pre>";
  $data = json_decode($_POST['tMaguey'], true);
print_r($data);
echo "</pre>";*/
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE);


header("Content-Type: text/html; charset=iso-8859-1 ");





include ("php/registro/conexion.php");
		  		   $nump=$_POST['nump']; //id_localidad
  				   $nombrep=$_POST['nombrep'];  //no.asociado
 				   $clientec=$_POST['clientec']; //nombre del paraje
  				   $nombrecli=$_POST['nombrecli']; //latitud
  				   $canti=$_POST['canti'];//longitud


	for ($i = 1; $i<=$canti; $i++) {

	  $datoextracc="('$nump','A','2',now(),' ','3')"; 
    $datoextracc="insert into cextracciones(id_paraje,distincion,status,fecha,constancia,bandera)VALUES".$datoextracc;
	  $ps=$conexion->query($datoextracc);
if($ps==false)
{
 echo 'Error al realizar el registro'.$datoextracc;
}
	}



	echo 'Registro realizado correctamente';
		
	
	
	

		
		
		
		
		
	
    ?>









