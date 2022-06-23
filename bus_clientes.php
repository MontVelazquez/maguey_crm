<?php
include('php/registro/conexion.php');
if (isset($_GET['term'])){
	$return_arr = array();
    $busca=$_GET['term'];
	$result = $conexion->query("SELECT * FROM clientes where no_cliente like '%".$_GET['term']."%' and nombre !='--'");
    // Se obtiene el resultado de la consulta
    while($row = $result->fetch_array()) {
	    //$row_array['id'] = $row['id'];
		$row_array['value'] = $row['no_cliente'];
		$row_array['abbrev'] = $row['nombre'];
		//$row_array['abbre'] = $row['tipo_persona'];
		 array_push($return_arr,$row_array);
	    }
		
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>

