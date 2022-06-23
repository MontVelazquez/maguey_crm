<?php
include('php/registro/conexion.php');
if (isset($_GET['term'])){
	$return_arr = array();
    $busca=$_GET['term'];
	
	
	$result = $conexion->query("SELECT id_extraccion, paraje.id_paraje,paraje, id_cliente, clientes.nombre FROM paraje inner join clientes on no_cliente=id_cliente inner join cextracciones on cextracciones.id_paraje=paraje.id_paraje where id_extraccion like '%".$busca."%' and paraje !=' 'and tipo='1' and cextracciones.status=1");
	
    // Se obtiene el resultado de la consulta
    while($row = $result->fetch_array()) {
	    //$row_array['id'] = $row['id'];
		$row_array['value'] = $row['id_extraccion'];
		$row_array['num'] = $row['id_paraje'];
		$row_array['nombrepre'] = $row['paraje'];
		$row_array['clientep'] = $row['id_cliente'];
		$row_array['nombrecc'] = $row['nombre'];
		
		
		
		
		
		
		
		
		
		
		//$row_array['abbre'] = $row['tipo_persona'];
		 array_push($return_arr,$row_array);
	    }
		

		
    /* Toss back results as json encoded array. */
    echo json_encode($return_arr);
}






?>

