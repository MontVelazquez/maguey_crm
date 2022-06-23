
<?php
/*echo "<pre>";
  $data = json_decode($_POST['tMaguey'], true);
print_r($data);
echo "</pre>";*/
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_WARNING & ~E_NOTICE);


header("Content-Type: text/html; charset=iso-8859-1 ");





include ("php/registro/conexion.php");
		  		   $loc=$_POST['local']; //id_localidad
  				   $sta=$_POST['state'];  //no.asociado
 				   $par=$_POST['paraje']; //nombre del paraje
  				   $lati=$_POST['lat']; //latitud
  				   $lon=$_POST['lng'];//longitud
  				   //$pol=$_POST['poligono'];//poligono
 				   $ten=$_POST['tenencia'];//tenecia de la tierra
  				   $supe=$_POST['superficie']; //superficie del predio
 				   $refu=$_POST['referenciau']; //referencia ubicacion
 		   		   $usu=$_POST['usufruto']; //usufruto de ñla tierra
  				   $ref=$_POST['referencia2']; //referencia del asociado
  				   $nombre_asociado=$_POST['abbrev']; //id_localidad
  				   $fec = date('Y-m-d',  strtotime($_POST['fecha']));
  				   $cam=$_POST['campo'];// representante en campo 
				   $sin=$_POST['sino'];

				   

//obtenemos el id del paraje para insertar
$consulta="SELECT MAX(id_paraje)+1 as idparaje FROM `paraje` WHERE 1";
  $consultaid = $conexion->query($consulta);
  if ($consultaid->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $id="";
    while ($row = $consultaid->fetch_array(MYSQLI_ASSOC)) 
    {
        $id .=$row['idparaje']; //concatenamos el los options para luego ser insertado en el HTML
    }
	
}	

if( $ref=="")
{
		$datoparaje="('$id','$loc','$sta','$par','$lati','$lon','','$ten','$supe','','$refu','$usu',now(),'$nombre_asociado','$fec','$cam','1','1')";
}
else
{
     $datoparaje="('$id','$loc','$sta','$par','$lati','$lon','','$ten','$supe','','$refu','$usu',NOW(),'$ref','$fec','$cam','1','1')";
}


	   // insertamos los datos del paraje


$sqlparaje="INSERT INTO paraje (id_paraje,id_localidad,id_cliente,paraje,lat,lng,poligono,tenencia,superficie,docpro,referencia,usufruto,fecha,nombrep,fecha_paraje,rcampo,status,tipo)VALUES".$datoparaje;

$result=$conexion->query($sqlparaje);

if($result==false)
{
 echo 'Error al realizar el registro'.$sqlparaje;
}

//ingresamos las plantas		
$id_parajito=$conexion->insert_id;

$data = json_decode($_POST['tMaguey'], true);
foreach($data as $value)
{
$sqlplantas="('$value[0]','$value[1]','$value[2]','$value[3]','$value[4]','$value[5]',now(),'1','$value[4]','$id_parajito',now(),'')";
$sqlplantas="insert into existenciaplanta(regmaguey,dis_surcometros,dis_planmetros,id_comun,cantidadini,edad,fecha_registro,status,existenciaplantas,id_paraje,fecha_siembra,origen)VALUES".$sqlplantas;
$ps=$conexion->query($sqlplantas);
if($ps==false)
{
 echo 'Error al realizar el registro'.$sqlplantas;
}
}
//insertarmos las constancias		

$datoconst="(now(),'constancia$id_parajito' ,'$id_parajito','1')";
		 
		//  $count_id++;	
	  //}
	  $sqlconstancia="insert into constancias(fecha,constancia,id_paraje,status)values".$datoconst;
	$rescons=$conexion->query($sqlconstancia);

	if($rescons==false)
	{
		
		 echo 'Error al realizar el registro'.$sqlconstancia;
    }
	//esto es para la constancia de extraccion FOR 
//for ($i = 1; $i <= 5; $i++)
//{
	


	


	if ($value[5]>4 && $sin==1) {
	
	 // $datoextracc="('$id_parajito','1',now(),' '),('$id_parajito','1',now(),' '),('$id_parajito','1',now(),' '),('$id_parajito','1',now(),' '),('$id_parajito','1',now(),' ')";
	  $datoextracc="('$id_parajito','1',now(),' ','$sin'),('$id_parajito','1',now(),' ','$sin'),('$id_parajito','1',now(),' ','$sin'),('$id_parajito','1',now(),' ','$sin'),('$id_parajito','1',now(),' ','$sin')";
	 
	}
	
	
	else if ($value[5]>4 && $sin==2){
    $datoextracc="('$id_parajito','1',now(),' ','$sin')";
	  
}

$datoextracc="insert into cextracciones(id_paraje,status,fecha,constancia,bandera)values".$datoextracc;
	$resextrac=$conexion->query($datoextracc);
	
	if($resextrac==false)
{
// echo 'Error al realizar el registro'.$datoextracc;
}
	







	echo 'Registro realizado correctamente';
		
	
	
	

		
		
		
		
		
	
    ?>









