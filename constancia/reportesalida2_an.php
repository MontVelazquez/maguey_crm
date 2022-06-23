<?php
//header('Content-Type: text/html; charset=UTF-8');
include_once("Polyline.php");
require('fpdf/fpdf.php');
include('../php/registro/conexion.php');
header('Content-Type: text/html; charset=UTF-8');
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	$this->widths=$w;
}

function SetAligns($a)
{
	$this->aligns=$a;
}
function Row($data) 
{ 
//Calculate the height of the row 
$nb=0; 
for($i=0;$i<count($data);$i++) 
$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i])); 
$h=5*$nb; 
//Issue a page break first if needed 
$this->CheckPageBreak($h); 
//Draw the cells of the row 
for($i=0;$i<count($data);$i++) 
{ 
$w=$this->widths[$i]; 
$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L'; 
//Save the current position 
$x=$this->GetX(); 
$y=$this->GetY(); 
//Draw the border 

$this->Rect($x,$y,$w,$h); 

$this->MultiCell($w,5,$data[$i],0,$a,'true'); 
//Put the position to the right of the cell 
$this->SetXY($x+$w,$y); 
} 
//Go to the next line 
$this->Ln($h); 
} 

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

}

function Footer()
{
	
	$this->SetFont('Helvetica','BI',9);
		$this->AliasNbPages();
		$this->SetY(-21);
    $this->Cell(0,5,utf8_decode('Página').$this->PageNo().'/{nb}',0,5,'L');
    $this->SetY(-21);
       $this->Cell(0,5,Utf8_decode('FM-03/00.'),0,5,'R');


    
	$this->SetY(-15);
	$this->Cell(47,5, utf8_decode(' --> Llenar solo vendedor' ),0,5,'C'); 	
	$this->Cell(50,6, utf8_decode('--> Llenar solo comprador'),0,5,'C');
	$this->SetLineWidth(0.1);
	$this->SetDrawColor(33,33,33);
	$this->SetFillColor(23,97,66);
	$this->Rect(20, 264, 5, 5, 'FD');
	$this->SetDrawColor(33,33,33);
	$this->SetFillColor(70,105,176);
	$this->Rect(20, 270, 5, 5, 'FD');
	//$this->Cell(15, 6, '', 1 , 1);
}

}

	$paraje= $_GET['id'];
	$strConsulta = "SELECT Date_format(constancias.fecha,'%y') as anio,nombrep,paraje,tenencia,paraje.id_paraje,clientes.no_cliente,clientes.nombre nombrecli,
regmaguey,LPAD(constancias.id_constancia,4,'0') as constanciae,CONCAT(LPAD(paraje.id_paraje,4,'0'),paraje.distincion) as parajes,
clientes.nombre as clienten,clientes.calle,clientes.noexterior,clientes.nointerior,clientes.colonia, 
municipios.nombre as nombrem,estados.nombre as nombree,clientes.telefono,clientes.correo,constancias.fecha as fecha1,
date_add(constancias.fecha, INTERVAL 1 YEAR) as fecha2

 from estados 
 inner join municipios 
 on municipios.estado=estados.clave 
 inner join clientes 
 on clientes.municipio=municipios.id 
 inner join paraje 
 on paraje.id_cliente=clientes.no_cliente 
 inner join constancias 
 on constancias.id_paraje=paraje.id_paraje 
 inner join existenciaplanta 
 on paraje.id_paraje=existenciaplanta.id_paraje
where paraje.id_paraje='$paraje'";
	
	//Cambiar locales a español México
	$parajes= $conexion->query($strConsulta);
	//$parajes = mysql_query($strConsulta);
	$fila = mysqli_fetch_array($parajes);
	
	//aqui empieza del paraje
	
	$Consulta = "SELECT localidades.localidad,municipios.nombre as nombrem,estados.nombre as 		nombree,paraje.paraje,paraje.referencia,paraje.lat,paraje.lng,paraje.superficie,MAX(paraje.id_paraje) as id_paraje
		from estados 
		inner join municipios on municipios.estado=estados.clave 
		inner join localidades on localidades.MunicipioID=municipios.id 
		inner join paraje on paraje.id_localidad=localidades.id
		where paraje.id_paraje='$paraje'";
		
		//$nombrecc = $fila['nombrec'];
	$ubicaciones= $conexion->query($Consulta);
	//$parajes = mysql_query($strConsulta);
	$dato = mysqli_fetch_array($ubicaciones);
	
	$consultafecha = "SELECT date_add(cextracciones.fecha, INTERVAL 1 YEAR) as fechita FROM cextracciones WHERE id_paraje = '$paraje' ORDER BY id_extraccion";
	$consul= $conexion->query($consultafecha);
	$consulfe = mysqli_fetch_array($consul);
	
	
	
	
	
	//aqui termina paraje
	// AQUI INGRESAMOS EL FORPARA REPETIR LAS HOJAS	
	
	
	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	
	$strConsulta = "SELECT CONCAT(LPAD(cextracciones.id_extraccion,4,'0'),cextracciones.distincion) as id FROM cextracciones WHERE id_paraje = '$paraje' ORDER BY id_extraccion";
	$extracciones= $conexion->query($strConsulta);
	
	
	
	
	
	while ($extraccion = mysqli_fetch_array($extracciones)) {
		
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->SetAutoPageBreak(true,20);
	// aqui empieza
	setlocale(LC_ALL,"es_ES@euro","Es_ES","esp");
$d = $fila['fecha1'];
$fecha = strftime("%d-%b-%Y", strtotime($d));
$fecha1 = ucfirst(strtolower($fecha));
//fecha1
$d = $fila['fecha2'];
$fechaa = strftime("%Y", strtotime($d));
$fecha2 = ucfirst($fechaa);
	//termina fecha
	$ds = $consulfe['fechita'];
	$year = date('Y',strtotime($ds));

	$pdf->Ln(30);
	$pdf->SetXY(20,20);


				
				$pdf->SetFont('Helvetica','B',25);
	$pdf->Cell(0,8, utf8_decode('GUIA DE MAGUEY'),0,5, 'C');
	$pdf->SetTextColor(238,55,60);
	$pdf->SetFont('Helvetica','',14);
	$pdf->Text(180,27,strtoupper($extraccion['id']).'/'.strtoupper($fila['parajes']),0,5,'C');
	$pdf->SetTextColor(33,33,33);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Text(180,33,utf8_decode('VIGENCIA: '),0,5,'C');
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Text(199,33,$year,0,5,'C');
	$pdf->Ln(14);
	$pdf->SetFont('Helvetica','B',11);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(0,6,strtoupper('DATOS DEL VENDEDOR'), 0,5, 'C');
	$pdf->SetTextColor(33,33,33);
	$pdf->Ln(6);


	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(28,7,'No. DE PREDIO: ',0,0);
	$pdf->SetFont('Helvetica','B',9);
	$pdf->Cell(25,7,strtoupper($fila['parajes']),0,0,'C');
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(26,7,'No. DE GUIA: ',0,0);
	$pdf->SetFont('Helvetica','B',9);	
	$pdf->Cell(23,7,strtoupper($extraccion['id']),0,0,'C');
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(35,7,'No. DE ASOCIADO: ',0,0);
	$pdf->SetFont('Helvetica','B',9);
	$pdf->Cell(28,7,strtoupper($fila['no_cliente']),0,0,'C');
	///
	$pdf->Ln(0);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Cell(28,7,'',0,0);
	$pdf->SetFont('Helvetica','',9);
	$pdf->Cell(25,7,'______________',0,0,'C');
	$pdf->SetFont('Helvetica','',10);
	$pdf->Cell(26,7,' ',0,0);
	$pdf->SetFont('Helvetica','',9);	
	$pdf->Cell(23,7,'_____________',0,0,'C');
	$pdf->SetFont('Helvetica','',10);
	$pdf->Cell(35,7,'',0,0);
	$pdf->SetFont('Helvetica','',9);
	$pdf->Cell(28,7,'_________________',0,0,'C');	
		///
	$pdf->Ln(7);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(22,7,utf8_decode('NOMBRE: '),0,0);
	$pdf->SetFont('Helvetica','B',9);
	$pdf->Cell(152,7,utf8_decode($fila['nombrecli']),0,5,'C');
	$pdf->Ln(-7);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Cell(22,7,utf8_decode(''),0,0);
	$pdf->SetFont('Helvetica','',9);
	$pdf->Cell(152,7,'___________________________________________________________________________________________',0,5,'C');
	
	
	$pdf->Ln(1);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(22,7,utf8_decode('NOMBRE DE PREDIO: '),0,0);
	$pdf->SetFont('Helvetica','B',9);
	$pdf->Cell(152,7,utf8_decode($fila['paraje']),0,5,'C');
	$pdf->Ln(-7);
	$pdf->SetFont('Helvetica','',10);
	$pdf->Cell(1,7,utf8_decode(''),0,0);
	$pdf->SetFont('Helvetica','',9);
	$pdf->Cell(215,7,'_______________________________________________________________________________',0,5,'C');
	
	
	$pdf->Ln(1);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(33,7,utf8_decode('FECHA DE CORTE: '),0,0);
	$pdf->SetFont('Helvetica','',9);	
	$pdf->Cell(141,7,'_______________________',0,5);	
	
	// la consulta para datos del predio
	$Consulta = "SELECT localidades.localidad,municipios.nombre as nombrem,estados.nombre as 		nombree,paraje.paraje,paraje.referencia,paraje.lat,paraje.lng,paraje.superficie
		from estados 
		inner join municipios on municipios.estado=estados.clave 
		inner join localidades on localidades.MunicipioID=municipios.id 
		inner join paraje on paraje.id_localidad=localidades.id 
		where paraje.id_paraje='$paraje'";
		
	$ubicaciones= $conexion->query($Consulta);
	$dato = mysqli_fetch_array($ubicaciones);
// Aqui empieza la tabla de atributos de la tierra
	 
	$pdf->Ln(2);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->SetDrawColor(33,33,33);// color a las lineas de la tabla
	$pdf->Cell(0,5, utf8_decode('ATRIBUTOS DE LA TIERRA'),0,5);
	$pdf->Ln(2);
	$pdf->SetFont('Helvetica','B',7);
	$pdf->Cell(67,8,utf8_decode('MANEJO SUSTENTABLE DE MAGUEY SILVESTRE'),1,0);
	$pdf->SetFont('Helvetica','',7);	
	$pdf->Cell(9,8,'---',1,0,'C');
	$pdf->SetFont('Helvetica','B',7);
	$pdf->MultiCell(90,4,utf8_decode('PRESERVACIÓN DE POLINIZADORES Y VARIABILIDAD GENÉTICA DEL MAGUEY EN CULTIVOS'),1);
	$pdf->Ln(-8);
	$pdf->SetX(186);
	$pdf->SetFont('Helvetica','B',7);	
	$pdf->Cell(9,8,'---',1,0,'C');
	$pdf->Ln(8);
	$pdf->SetFont('Helvetica','B',7);
	$pdf->Cell(67,8,utf8_decode('MANEJO SUSTENTABLE DE CULTIVOS DE LADERAS'),1,0);
	$pdf->SetFont('Helvetica','B',7);	
	$pdf->Cell(9,8,'---',1,0,'C');
	$pdf->SetFont('Helvetica','B',7);
	$pdf->Cell(90,8,utf8_decode('MANEJO ORGÁNICO DEL CULTIVO DE MAGUEY'),1,0);
	$pdf->SetFont('Helvetica','B',7);	
	$pdf->Cell(9,8,'---',1,0,'C');
	$pdf->Ln(7);

	$pdf->Ln(2);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(0,5, utf8_decode('ESPECIFICACIONES DEL MAGUEY'), 0,5,'C');
	$pdf->Ln(2);  
	$pdf->SetTextColor(33,33,33);
	$pdf->SetDrawColor(33,33,33);// color a las lineas de la tabla
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Helvetica','B',7.5);
	$pdf->SetLineWidth(0.1);
	$pdf->Cell(53,9,utf8_decode('MAGUEY (NOMBRE COMÚN)'),1,0,'C',1);
	$pdf->Cell(41,9,utf8_decode('AGAVE (NOMBRE CIENTIFICO)'),1,0,'C',1);
	$pdf->Cell(35,9,utf8_decode('SISTEMA DE PLANTACIÓN'),1,0,'C',1);
	$pdf->Cell(23,9,utf8_decode('EDAD (AÑOS)'),1,0,'C',1);
	$pdf->Cell(24,9,utf8_decode('No. DE PIÑAS'),1,0,'C',1);
 
	$pdf->Ln(9);
		
	$strConsulta = "SELECT paraje.id_paraje, existenciaplanta.regmaguey, existenciaplanta.cantidadini, 
existenciaplanta.edad, comun.nombre,especie.genespecie,especie.variante
FROM existenciaplanta Inner Join comun ON comun.id_comun= existenciaplanta.id_comun Inner Join especie ON comun.id_especie = especie.id_especie 
Inner Join paraje ON paraje.id_paraje=existenciaplanta.id_paraje
	WHERE  paraje.id_paraje='$paraje' and existenciaplanta.edad > 4";	
	
	$historial= $conexion->query($strConsulta);
	$numfilas = mysqli_num_rows($historial);
	
				$pdf->SetFont('Arial','',9);
				$pdf->SetFillColor(255,255,255);
   			    $pdf->SetTextColor(33,33,33);
				$pdf->SetDrawColor(33,33,33);// color a las lineas de la tabla
				
				
	$pdf->SetLineWidth(0);
	$pdf->SetDrawColor(33,33,33);
	
				
	for ($i=0; $i<$numfilas; $i++)
		{
			
			while($resultado = mysqli_fetch_array($historial))
			{

            


				$pdf->SetLineWidth(0.1);
				$pdf->SetFont('Helvetica','B',7.5); 
				$pdf->Cell(53,5,utf8_decode($resultado['nombre']),1,0,'C'); 
				$pdf->SetFont('Helvetica','BI',8); 
				$pdf->Cell(41,5,utf8_decode(ucfirst(strtolower($resultado['genespecie']))),1,0,'C');
				$pdf->SetFont('Helvetica','B','7.5'); 
				 $pdf->Cell(35,5,utf8_decode(strtoupper($resultado['regmaguey'])),1,0,'C'); 
				 $pdf->Cell(23,5,utf8_decode(strtoupper($resultado['edad'])),1,0,'C');
				 
				
				$pdf->SetFont('Helvetica','');
				$pdf->Cell(24,5,'',1,0,'C');
				
				 $pdf->Ln();
                   
			}
			 
			
	}
					//RECTANGULO EMPIEZA VERDE
	$pdf->SetLineWidth(2.0);
	$pdf->SetDrawColor(23,97,66);
	$pdf->SetFillColor(255,255,255);
	//margen izquierdo, margen superior,margen derecho,margen inferior
	$pdf->Rect(10, 39, 195, 96 + ($numfilas - 1) * 5); /*es el cuarto numero*/
	//RECTANGULO TERMINADO
					if($numfilas<=5){
	
	//RECTANGULO EMPIEZA AZUL
	$pdf->SetDrawColor(70,105,176);
	$pdf->SetFillColor(255,255,255);
	$pdf->Rect(10, 141 + ($numfilas - 1) * 5, 195, 65+ ($numfilas - 1) * 5);
				}
				
				else {$pdf->AddPage(); 
	
				$pdf->SetDrawColor(70,105,176);
				$pdf->SetFillColor(255,255,255);
				$pdf->Rect(10, 39, 195, 96 + ($numfilas - 1) * 5); /*es el cuarto numero*/
				}
					
					
					$pdf->SetFont('Helvetica','B',11);
					$pdf->SetTextColor(33,33,33);
					$pdf->Ln(13);
	$pdf->Cell(0,6,strtoupper('DATOS DEL COMPRADOR'), 0,5, 'C');
	$pdf->SetTextColor(33,33,33);
	$pdf->Ln(6);	
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(57,7,utf8_decode('FECHA DE INGRESO A FÁBRICA: '),0,0);
	$pdf->SetFont('Helvetica','',9);	
	$pdf->Cell(119,7,'______________________________',0,5);
	$pdf->Ln(1);
	
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(68,7,'No. DE REGISTRO CRM: ',0,0);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(20,7,'NOMBRE: ',0,0);
	
	
	$pdf->Ln(0);
	
	$pdf->SetFont('Helvetica','',9);
	$pdf->Cell(110,7,'______________',0,0,'C');
	
	
	$pdf->SetFont('Helvetica','',9);	
	$pdf->Cell(42,7,'___________________________________________________',0,0,'C');
	$pdf->SetFont('Helvetica','',10);
	
	
	$pdf->Ln(7);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(45,7,utf8_decode('DOMICILIO DE ENTREGA: '),0,0);
	$pdf->SetFont('Helvetica','',9);
	$pdf->Cell(131,7,'__________________________________________________________________________',0,5,'C');	
	
	
	// la consulta para datos del predio
	$Consulta = "SELECT localidades.localidad,municipios.nombre as nombrem,estados.nombre as 		nombree,paraje.paraje,paraje.referencia,paraje.lat,paraje.lng,paraje.superficie
		from estados 
		inner join municipios on municipios.estado=estados.clave 
		inner join localidades on localidades.MunicipioID=municipios.id 
		inner join paraje on paraje.id_localidad=localidades.id 
		where paraje.id_paraje='$paraje'";
		
		//$nombrecc = $fila['nombrec'];
		$ubicaciones= $conexion->query($Consulta);
	$dato = mysqli_fetch_array($ubicaciones);

	$pdf->Ln(3);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->SetTextColor(33,33,33);
	$pdf->Cell(0,5, utf8_decode('ESPECIFICACIONES DEL MAGUEY'), 0,5,'C');
	$pdf->Ln(2);  
	$pdf->SetTextColor(33,33,33);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetDrawColor(33,33,33);// color a las lineas de la tabla
	$pdf->SetFont('Helvetica','B',7.5);
	$pdf->SetLineWidth(0.1);
	$pdf->Cell(53,9,utf8_decode('MAGUEY (NOMBRE COMÚN)'),1,0,'C',1);
	$pdf->Cell(41,9,utf8_decode('AGAVE (NOMBRE CIENTIFICO)'),1,0,'C',1);
	$pdf->Cell(35,9,utf8_decode('SISTEMA DE PLANTACIÓN'),1,0,'C',1);
	$pdf->Cell(23,9,utf8_decode('KG. DE MAGUEY'),1,0,'C',1);
	$pdf->Cell(24,9,utf8_decode('% ART'),1,0,'C',1);
	
 
	$pdf->Ln(9);
		
	$strConsulta = "SELECT paraje.id_paraje, existenciaplanta.regmaguey, existenciaplanta.cantidadini, 
existenciaplanta.edad, comun.nombre,especie.genespecie,especie.variante
FROM existenciaplanta Inner Join comun ON comun.id_comun= existenciaplanta.id_comun Inner Join especie ON comun.id_especie = especie.id_especie 
Inner Join paraje ON paraje.id_paraje=existenciaplanta.id_paraje
	WHERE  paraje.id_paraje='$paraje'  and existenciaplanta.edad > 4";	
	$historial= $conexion->query($strConsulta);
	$numfilas = mysqli_num_rows($historial);
				$pdf->SetFont('Arial','',9);
				$pdf->SetFillColor(255,255,255);
   			    $pdf->SetTextColor(33,33,33);
				$pdf->SetDrawColor(33,33,33);// color a las lineas de la tabla
				
	for ($i=0; $i<$numfilas; $i++)
		{
			
			while($resultado = mysqli_fetch_array($historial))
			{
            

				$pdf->SetLineWidth(0.1);
				$pdf->SetFont('Helvetica','B',7.5); 
				$pdf->Cell(53,5,utf8_decode($resultado['nombre']),1,0,'C'); 
				 $pdf->SetFont('Helvetica','BI',8); 
				$pdf->Cell(41,5,utf8_decode(ucfirst(strtolower($resultado['genespecie']))),1,0,'C');
				$pdf->SetFont('Helvetica','B',7.5); 
				 $pdf->Cell(35,5,utf8_decode(strtoupper($resultado['regmaguey'])),1,0,'C'); 
				$pdf->Cell(23,5,'',1,0,'C');
				$pdf->Cell(24,5,'',1,0,'C');
				 $pdf->Ln();
				 
               
			}
			
		}
			
						
					$pdf->Ln(15);
					
			$pdf->SetFont('Helvetica','B',11);
			 $pdf->SetTextColor(33,33,33);
			
			
			$pdf->cell(88,5,utf8_decode('___________________________________'),0,0,'C');
			$pdf->cell(88,5,utf8_decode('___________________________________'),0,0,'C');
			$pdf->Ln(5);
			$pdf->SetFont('Helvetica','B',10);
			$pdf->cell(88,5,utf8_decode('FIRMA DEL VENDEDOR'),0,0,'C');
			$pdf->cell(88,5,utf8_decode('FIRMA DEL COMPRADOR'),0,0,'C');
			
				
			}
   ob_end_clean();
   $pdf->Output("Extraccion".$paraje.".pdf",'D');
?>