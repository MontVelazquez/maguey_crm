<?php
if(isset($_POST["clienteno"]))
	{
		$criterio = '<option value="0"> Elige un Predio o Vivero</option>';

		include('registro/conexion.php');
		$strConsulta="select id_paraje, paraje from paraje where id_cliente = ".$_POST["clienteno"];
		mysqli_set_charset($conexion,"utf8");
		$result = $conexion->query($strConsulta);
		

		while( $fila = $result->fetch_array() )
		{
			//$opciones.='<option value="'.$fila["id_paraje"].'">'.$fila["id_paraje"].' - '.$fila["paraje"].'</option>';
			$criterio.='<option value="'.$fila["paraje"].'">'.$fila["paraje"].'</option>';
			
		}

		echo $criterio;
	}
	
		
?>
