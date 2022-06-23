<?php
include('php/registro/conexion.php');
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
else
{
    echo "No hubo resultados";
}
$conexion->close(); //cerramos la conexión
?> 
