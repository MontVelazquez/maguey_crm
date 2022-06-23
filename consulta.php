<?php  
include ("php/registro/conexion.php"); 
//Archivo de conexión a la base de datos
//error_reporting(E_ALL ^ E_NOTICE);
//Variable de búsqueda
//$consultaBus=isset($_POST['state']) ? $_POST['state'] : NULL;
//$consultaBusqueda=isset($_POST['criterio']) ? $_POST['criterio'] : NULL;


$criterio=$_POST['criterio'];
$state=$_POST['state'];


//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$criterio = str_replace($caracteres_malos, $caracteres_buenos, $criterio);
$state = str_replace($caracteres_malos, $caracteres_buenos, $state);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($criterio)) {
	
	$strConsulta = "SELECT paraje.id_paraje,paraje.id_cliente,clientes.nombre as nombrec,Date_format(constancias.fecha,'%y') as anio,fecha_registro as fecha2,nombrep,regmaguey,LPAD(constancias.id_constancia,4,'0') as constancia,LPAD(paraje.id_paraje,4,'0') as parajes,edad,paraje.paraje, comun.nombre,genespecie,existenciaplantas,existenciaplanta.edad,usufruto,tenencia,superficie,lng,lat,dis_planmetros,dis_surcometros,fecha_paraje,rcampo
from clientes 
inner join paraje on clientes.no_cliente=paraje.id_cliente 
inner join constancias on constancias.id_paraje=paraje.id_paraje
inner join existenciaplanta on paraje.id_paraje=existenciaplanta.id_paraje
Inner Join comun ON comun.id_comun= existenciaplanta.id_comun 
Inner Join especie ON comun.id_especie = especie.id_especie
where id_cliente='$state' and  paraje='$criterio';";
	$parajes= $conexion->query($strConsulta);
	$fila = mysqli_fetch_array($parajes);

	
	
	$strConsultaa = "SELECT municipios.nombre as nombrem,estados.nombre as nombree,localidades.localidad
from estados 
inner join municipios on municipios.estado=estados.clave
inner join localidades on localidades.MunicipioID=municipios.id 
inner join paraje on localidades.id=paraje.id_localidad 
where id_cliente='$state' and  paraje='$criterio';";
	
	$parajess= $conexion->query($strConsultaa);
	$filaa = mysqli_fetch_array($parajess);

	
		$Consulta = "SELECT paraje.id_paraje,paraje.id_cliente,nombrep,regmaguey,constancias.id_constancia as numeroconstancia,municipios.nombre as nombrem,estados.nombre as nombree,localidades.localidad,paraje.paraje, comun.nombre,genespecie,existenciaplantas,existenciaplanta.edad,usufruto,tenencia,superficie,lng,lat,dis_planmetros,dis_surcometros,fecha_paraje,rcampo
from estados 
inner join municipios on municipios.estado=estados.clave
inner join localidades on localidades.MunicipioID=municipios.id 
inner join paraje on localidades.id=paraje.id_localidad 
inner join constancias on constancias.id_paraje=paraje.id_paraje
inner join existenciaplanta on paraje.id_paraje=existenciaplanta.id_paraje
Inner Join comun ON comun.id_comun= existenciaplanta.id_comun 
Inner Join especie ON comun.id_especie = especie.id_especie
where id_cliente='$state' and  paraje='$criterio';";

$consultita= $conexion->query($Consulta);
$numfilas = mysqli_num_rows($consultita);


	
	if ($numfilas===0) {
		$mensaje = "<center><p>NO HAY NINGUN PARAJE SELECCIONADO</p></center>";
	} else {
		echo '<fieldset><legend align="center">DATOS DEL CLIENTE</legend></fieldset>';
		echo 'NO.CLIENTE:   <strong>'.$state.'</strong></br>';
		echo 'NOMBRE DEL CLIENTE:   <strong>'.$fila['nombrec'].'</strong></br>';
		echo 'NOMBRE DEL PRODUCTOR:   <strong>'.$fila['nombrep'].'</strong></br>';
	    echo 'NOMBRE DEL REPRESENTANTE EN CAMPO:   <strong>'.$fila['rcampo'].'</strong></br></br>';
		//datos del predio
		echo '<fieldset><legend align="center">DATOS DEL PREDIO</legend></fieldset>';
		echo 'NO.CONSTANCIA:   <strong>'.strtoupper($fila['constancia']).$fila['parajes'].$fila['anio'].'</strong></br>';
		echo 'NO.PARAJE:   <strong>'.$fila['parajes'].'</strong></br>';
		echo 'NOMBRE DEL PARAJE:   <strong>'.$fila['paraje'].'</strong></br>';
		echo 'ESTADO:   <strong>'.$filaa['nombree'].'</strong></br>';
		echo 'MUNICIPIO:   <strong>'.$filaa['nombrem'].'</strong></br>';
		echo 'LOCALIDAD:   <strong>'.$filaa['localidad'].'</strong></br>';
		//aqui va localidad, municipio y estado
		echo 'USUFRUTO DE LA TIERRA:   <strong>'.$fila['usufruto'].'</strong></br>';
		echo 'TENENCIA DE LA TIERRA:   <strong>'.$fila['tenencia'].'</strong></br>';
		echo 'SUPERFICIE:   <strong>'.$fila['superficie'].'</strong></br>';
		echo 'LONGITUD:   <strong>'.$fila['lng'].'</strong></br>';
		echo 'LATITUD:   <strong>'.$fila['lat'].'</strong></br>';
		echo 'FECHA DE REGISTRO:   <strong>'.$fila['fecha_paraje'].'</strong></br></br></br>';
		
				
				
?>
    <fieldset><legend align="center">DATOS DEL MAGUEY</legend></fieldset>
	<center><table style="width:100%;" border="1px" align="center"> 
	<tbody>
		<tr>
			<td class="paraje" align="center"><strong>ESPECIE (NOMBRE COMÚN)</strong></td>
			<td class="especie" align="center"><strong>ESPECIE (NOMBRE CIENTIFICO)</strong></td>
			<td class="situacion" align="center"><strong>SITUACIÓN DE MANEJO</strong></td>
            <td class="existencia" align="center"><strong>EXISTENCIA DE PLANTAS</strong></td>
             <td class="edad" align="center"><strong>EDAD (AÑOS)</strong></td>
             <td class="distanciap" align="center"><strong>DISTANCIA ENTRE PLANTAS (METROS)</strong></td>
              <td class="distancias" align="center"><strong>DISTANCIA ENTRE SURCOS (METROS)</strong></td>
		</tr>
<?php	
	while($row = mysqli_fetch_array($consultita)) {
		echo "
			<tr>
				
				<td class=\"nombre\"  align=\"center\">".$row['nombre']."</td>
				<td class=\"genespecie\"  align=\"center\">".$row['genespecie']."</td>
				<td class=\"regmaguey\" align=\"center\">".$row['regmaguey']."</td>
				<td class=\"existenciaplantas\" align=\"center\">".$row['existenciaplantas']."</td>
				<td class=\"edad\" align=\"center\">".$row['edad']."</td>
				<td class=\"dis_planmetros\" align=\"center\">".$row['dis_planmetros']."</td>
				<td class=\"edad\" align=\"center\">".$row['dis_surcometros']."</td>
			</tr>";
		//$i++;
	}
}
}
echo $mensaje;
?>
	</tbody>
	</table></center>
		