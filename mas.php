<?php
include('php/registro/conexion.php');
if (isset($_GET['term'])){
	$return_arr = array();
    $busca=$_GET['term'];
	$result = $conexion->query("SELECT id_paraje,paraje,id_cliente,nombre FROM paraje inner join clientes on no_cliente=id_cliente where id_paraje like '%".$_GET['term']."%' and paraje !=' 'and tipo='1'");
    // Se obtiene el resultado de la consulta,
    while($row = $result->fetch_array()) {
	    //$row_array['id'] = $row['id'];
		$row_array['value'] = $row['id_paraje'];
		$row_array['nombrep'] = $row['paraje'];
		$row_array['clientec'] = $row['id_cliente'];
		$row_array['nombrecli'] = $row['nombre'];
		//$row_array['abbre'] = $row['tipo_persona'];
		 array_push($return_arr,$row_array);
	    }
		
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}


?>

