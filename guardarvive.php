<?php
include ("php/registro/conexion.php");
    $nombre = $_FILES['foto1']['name'];
    $tipo = $_FILES['foto1']['type'];
    $tamanio = $_FILES['foto1']['size'];
    $ruta =$_FILES['foto1']['tmp_name'];
    $destino = "fotosvive/" . $nombre;
	//foto2
	 $nombre1 = $_FILES['foto2']['name'];
    $tipo1 = $_FILES['foto2']['type'];
    $tamanio1 = $_FILES['foto2']['size'];
    $ruta1 =$_FILES['foto2']['tmp_name'];
    $destino1 = "fotosvive1/" . $nombre1;
    if ($nombre != "" and $nombre1!="") {
        if (copy($ruta, $destino) && copy($ruta1, $destino1)) {

		  		   $loc=$_POST['local']; //id_localidad
  				   $sta=$_POST['state'];  //no.asociado
 				   $par=$_POST['paraje']; //nombre del paraje
  				   $lati=$_POST['lat']; //latitud
  				   $lon=$_POST['lng'];//longitud
 				   $refu=$_POST['referenciau']; //referencia ubicacion
  				   $ref=$_POST['referencia2']; //referencia del asociado
  				   $fec = date('Y-m-d',  strtotime($_POST['fecha']));
  				   $cam=$_POST['campo'];// representante en campo 
				   

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
$query = "SELECT * FROM paraje WHERE foto1='$destino'";
 $consultita = $conexion->query($query);
// haces la consulta, no me acuerdo cómo es con el conector viejo
if ($consultita->num_rows > 0) {
  echo 'Lo sentimos pero el archivo ingresado ya existe';
} else {	   // insertamos los datos del paraje
		$datoparaje="('$id','$loc','$sta','$par','$lati','$lon','','$refu',now(),'$ref','$fec','$cam','1','2','$destino','$destino1')";

$sqlparaje="INSERT INTO paraje (id_paraje,id_localidad,id_cliente,paraje,lat,lng,docpro,referencia,fecha,nombrep,fecha_paraje,rcampo,status,tipo,foto1,foto2)VALUES".$datoparaje;
$result=$conexion->query($sqlparaje);
}
		}

	}
	
	
	
//ingresamos las plantas		



$id_parajito=$conexion->insert_id;

$data = json_decode($_POST['tMaguey'], true);
foreach($data as $value)
{
	  $fechita = date('Y-m-d',strtotime($value[4]));
$sqlplantas="('$id_parajito','$value[0]','$value[1]','$value[2]','$fechita','$value[3]',now(),'1','$value[3]')";
$sqlplantas="insert into existenciaplanta(id_paraje,regmaguey,origen,id_comun,fecha_siembra,cantidadini,fecha_registro,status,existenciaplantas)VALUES".$sqlplantas;
$ps=$conexion->query($sqlplantas);
if($ps==false)
{
 echo 'Error al realizar el registro'.$sqlplantas;
}
}

//insertarmos las constancias		

$datoconst="(now(),' ','$id_parajito','1')";
		 
		//  $count_id++;	
	  //}
	  $sqlconstancia="insert into constancias(fecha,constancia,id_paraje,status)values".$datoconst;
	$rescons=$conexion->query($sqlconstancia);

	if($rescons==false)
	{
		
		 echo 'Error al realizar el registro'.$sqlconstancia;
    }
	//esto es para la constancia de extraccion

	  echo 'Registro realizado correctamente';	


    ?>