<?php
include('php/registro/conexion.php');


$sql="SELECT * from comun  c INNER JOIN especie e on e.id_especie=c.id_especie";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
		
        $combobit .="\t<option value=\""    .$row['id_comun']." "    .$row['nombre']." - ".$row['genespecie']."
".$row['variante']."\">

".$row['nombre']." - ".$row['genespecie']."
".$row['variante']." </option>\n"; //concatenamos el los options para luego ser insertado en el HTML
    }
	
}
else
{
    echo "No hubo resultados";
}
$conexion->close(); //cerramos la conexión
?>
