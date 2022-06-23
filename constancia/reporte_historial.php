<?php
include_once("Polyline.php");
require('fpdf/fpdf.php');
include('../php/registro/conexion.php');
header("Content-Type: text/html; charset=iso-8859-1 ");



class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
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
// CREAMOS ESTA FUNCION 
function VariasLineas($cadena, $cantidad) 
{ 
$this->Cell(176,0,'','B'); 
while (!(strlen($cadena)=='')) 
{ 
    $subcadena = substr($cadena, 0, $cantidad);  
    $this->Cell(176,5,$subcadena,'LR',0,'L'); 
    $cadena= substr($cadena,$cantidad); 
	$this->Ln(); 

} 
$this->Cell(176,0,'','T'); 
}  
//TERMINAMOS LA FUNCION 

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
	
	


    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');


		
	$this->SetY(-20);
	$this->SetFont('Helvetica','BI',7);
	$this->Cell(350,5, utf8_decode('FM-02/00.'),0,5,'C');
	$this->SetY(-15);
	$this->SetFont('Helvetica','BI',7);
	$this->Cell(0,5, utf8_decode('ESTE DOCUMENTO NO ES UN INSTRUMENTO LEGAL, ÚNICAMENTE AMPARA EL REGISTRO DE LA PLANTACIÓN DEL MAGUEY DENTRO'),0,5,'C');
	$this->Cell(0,5, utf8_decode('DEL PREDIO PARA GARANTIZAR LA TRAZABILIDAD DE LA MATERIA PRIMA UTILIZADA EN LA PRODUCCIÓN DE MEZCAL.'),0,5,'C');
}

}

	$paraje= $_GET['id'];

	$strConsulta = "SELECT Date_format(constancias.fecha,'%y') as anio,character_length(CONCAT(calle, ' #', noexterior,', ',colonia,', ',municipios.nombre,', ',estados.nombre)) as contador,CONCAT(calle, ' #', noexterior,', ',colonia,', ',municipios.nombre,', ',estados.nombre) as domicilio,nombrep,paraje.id_paraje,clientes.no_cliente,regmaguey,LPAD(constancias.id_constancia,4,'0') as constancia,LPAD(paraje.id_paraje,5,'0') as parajes,clientes.nombre as clienten,clientes.calle,clientes.noexterior,clientes.nointerior,clientes.colonia, municipios.nombre as nombrem,estados.nombre as nombree,clientes.telefono,clientes.correo,constancias.fecha as fecha1,date_add(constancias.fecha, INTERVAL 1 YEAR) as fecha2 from estados inner join municipios on municipios.estado=estados.clave inner join clientes on clientes.municipio=municipios.id inner join paraje on paraje.id_cliente=clientes.no_cliente inner join constancias on constancias.id_paraje=paraje.id_paraje inner join existenciaplanta on paraje.id_paraje=existenciaplanta.id_paraje where  paraje.id_paraje='$paraje'";
	

	$parajes= $conexion->query($strConsulta);
	$fila = mysqli_fetch_array($parajes);
	
	
	
	$pdf=new PDF('P','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
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
	$pdf->Ln(30);
	$pdf->SetXY(26,20);
	$pdf->SetFont('Helvetica','B',23);
	$pdf->Cell(0,8, utf8_decode('REGISTRO DE MAGUEY'),0,5, 'C');
	$pdf->SetFont('Helvetica','B',13);
	$pdf->Ln(10);
	$pdf->Cell(0,3, utf8_decode(strtoupper('ASOCIADO ')).$fila['no_cliente'],0,5, 'C');
	$pdf->SetTextColor(238,55,60);
	$pdf->SetFont('Helvetica','B',14);
	$pdf->Text(185,28,strtoupper($fila['constancia']).$fila['parajes'].$fila['anio'],0,5,'C');
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Text(170,34,strtoupper('No. de predio: '),0,5,'C');
	$pdf->Text(165,38,utf8_decode('FECHA DE EMISIÓN: '),0,5,'C');
	$pdf->Text(178,42,strtoupper('Vigencia:'),0,5,'C');
	$pdf->SetFont('Helvetica','B',9);
	$pdf->Text(194,34,$fila['parajes'],0,5,'C');
	$pdf->Text(194,38,$fecha1,0,5,'C');
	$pdf->Text(194,42,$fecha2,0,5,'C');
 
		$pdf->Ln(3);
		
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Helvetica','B',15);
	$pdf->MultiCell(185,8,utf8_decode(strtoupper($fila['clienten'])),0, 'C');
	

		if($fila['contador']<=82){
			$pdf->Ln(3);
	$pdf->SetX(65);
	$pdf->SetFont('Helvetica','B',9);	
	$pdf->MultiCell(131,7,ucwords(strtolower(utf8_decode($fila['domicilio']))),1);
	$pdf->Ln(-7);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->MultiCell(45,7,'DOMICILIO FISCAL:',1,'C');
	
	}else {
		$pdf->Ln(3);
	$pdf->SetX(65);
	$pdf->SetFont('Helvetica','B',9);	
	$pdf->MultiCell(131,5,ucwords(strtolower(utf8_decode($fila['domicilio']))),1);
	$pdf->Ln(-10);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->MultiCell(45,10,'DOMICILIO FISCAL:',1,'C');
		
		
	
	}

	$pdf->Ln(0);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(45,7,utf8_decode('TELÉFONO: '),1,0,'C');
	$pdf->SetFont('Helvetica','B',9);	
	$pdf->Cell(30,7,$fila['telefono'],1,0,'C');
	$pdf->SetFont('Helvetica','B',10);	
	$pdf->Cell(45,7,utf8_decode('CORREO ELECTRÓNICO: '),1,0,'C');
	if($fila['correo']==""){  
	$pdf->SetFont('Helvetica','B',9);	
	$pdf->Cell(56,7,utf8_decode('---'),1,0,'C');
	}else{
		$pdf->SetFont('Helvetica','B',9);	
	$pdf->Cell(56,7,utf8_decode($fila['correo']),1,0,'C');
	}
	
	// la consulta para datos del paraje
	$Consulta = "SELECT localidades.localidad,municipios.nombre as nombrem,estados.nombre as 		nombree,paraje.paraje,paraje.referencia,paraje.lat,paraje.lng,paraje.superficie 
		from estados 
		inner join municipios on municipios.estado=estados.clave 
		inner join localidades on localidades.MunicipioID=municipios.id 
		inner join paraje on paraje.id_localidad=localidades.id
		where paraje.id_paraje='$paraje'";
		

	$ubicaciones= $conexion->query($Consulta);
	$dato = mysqli_fetch_array($ubicaciones);
	if($fila['nombrep']==$fila['clienten']){
		
		
		$pdf->Ln(7);
		
		$pdf->SetFont('Helvetica','B',10);
		$pdf->Cell(45,16, utf8_decode('UBICACIÓN DEL PREDIO'), 1,0,'C');
		$pdf->SetFont('Helvetica','B',10);
		$pdf->Cell(65,8,ucwords(strtolower('')),1,0,'C');
		$pdf->Cell(66,8,ucwords(strtolower('')),1,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',9);	
		$pdf->Cell(65,5,utf8_decode($dato['paraje']),0,0,'C');
		$pdf->Cell(66,5,ucwords(strtolower(utf8_decode($dato['localidad']))),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',7);	
		$pdf->Cell(65,12,strtoupper('Predio'),0,0,'C');
		$pdf->Cell(66,12,strtoupper ('localidad'),0,0,'C');
		//Termina paraje y localidad
		$pdf->Ln(8);
		$pdf->SetX(65);
		
		// aqui empieza el municipio y el estado
		// estado y municipio
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','',10);	
		$pdf->Cell(65,8,ucwords(strtolower('')),1,0,'C'); 
		$pdf->Cell(66,8,ucwords(strtolower('')),1,0,'C');

		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',9);	
		$pdf->Cell(65,5,ucwords(strtolower(utf8_decode($dato['nombrem']))),0,0,'C'); 
		$pdf->Cell(66,5,ucwords(strtolower(utf8_decode($dato['nombree']))),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',7);	
		$pdf->Cell(65,12,'MUNICIPIO',0,0,'C'); 
		$pdf->Cell(66,12,'ESTADO',0,0,'C');
		//termina estado y municipio
		
	
	   // condicion si  hay productor de maguey 
	}else{
			
		$pdf->Ln(7);
	
		$pdf->SetX(75);
		$pdf->SetFont('Helvetica','B',9);	
		$pdf->Cell(65,12,utf8_decode('QUIEN MANIFIESTA SER PROPIETARIO DEL MAGUEY DESCRITO A CONTINUACIÓN, Y QUE SE ENCUENTRA EN EL'),0,0,'C');
		$pdf->Ln(5);
		$pdf->SetX(70);
		$pdf->Cell(66,12,utf8_decode('PREDIO CUYOS DERECHOS DE EXPLOTACIÓN LE PERTENECE AL PRODUCTOR:'),0,0,'C');
		$pdf->SetFont('Helvetica','B',15);
		$pdf->Ln(7);	
		$pdf->cell(176,12,utf8_decode(strtoupper($fila['nombrep'])),0,0,'C'); 
		//ubicación del paraje
		$pdf->Ln(12);
		$pdf->SetFont('Helvetica','B',10);
		$pdf->Cell(45,16, utf8_decode('UBICACIÓN DEL PREDIO'), 1,0,'C');
		//paraje y localidad
		$pdf->SetFont('Helvetica','',10);
		$pdf->Cell(65,8,ucwords(strtolower('')),1,0,'C');
		$pdf->Cell(66,8,ucwords(strtolower('')),1,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',9);	
		$pdf->Cell(65,5,$dato['paraje'],0,0,'C');
		$pdf->Cell(66,5,ucwords(strtolower(utf8_decode($dato['localidad']))),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',7);	
		$pdf->Cell(65,12,'PREDIO',0,0,'C');
		$pdf->Cell(66,12,'LOCALIDAD',0,0,'C');
		//Termina paraje y localidad
		// estado y municipio
		$pdf->Ln(8);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','',10);	
		$pdf->Cell(65,8,ucwords(strtolower('')),1,0,'C'); 
		$pdf->Cell(66,8,ucwords(strtolower('')),1,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',9);	
		$pdf->Cell(65,5,ucwords(strtolower(utf8_decode($dato['nombrem']))),0,0,'C'); 
		$pdf->Cell(66,5,ucwords(strtolower(utf8_decode($dato['nombree']))),0,0,'C');
		
		$pdf->Ln(0);
		$pdf->SetX(65);
		$pdf->SetFont('Helvetica','B',7);	
		$pdf->Cell(65,12,'MUNICIPIO',0,0,'C'); 
		$pdf->Cell(66,12,'ESTADO',0,0,'C');
		//termina estado y municipio
	
	}
		
		// no tiene referencia
		$pdf->SetX(20);
			$pdf->Ln(8);
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(45,9, utf8_decode('SUPERFICIE'), 1,0, 'C');
	 $pdf->SetFont('Helvetica','B',9);	
	 $pdf->Cell(30,9,$dato['superficie'],1,0,'C');
	 $pdf->Ln(0);
	 $pdf->SetX(64);
	 $pdf->SetFont('Helvetica','B',7);
	 $pdf->Cell(31,14,'HECTAREAS',0,0,'C');
	 $pdf->Cell(45,9,'',1,0,'C');
	$pdf->SetFont('Helvetica','B',10);
	 $pdf->Ln(1);
	 $pdf->SetX(102);
	 $pdf->Cell(31,4.5,utf8_decode('COORDENADAS'), 0,0,'C');
	 $pdf->Ln(4);
	 $pdf->SetX(101);
	 $pdf->Cell(31,4.5,utf8_decode('GEOGRÁFICAS'), 0,0,'C');
	 $pdf->Ln(-5); 
	 $pdf->SetX(140);
	 $pdf->SetFont('Helvetica','B',9);
	 $pdf->Cell(56,9,''.'    '.'',1,0,'C');
	 $pdf->SetX(140);
	 $pdf->Cell(56,7,$dato['lat'].'        '.$dato['lng'],0,0,'C');
	 $pdf->Ln(0);
	 $pdf->SetX(129);
	 $pdf->SetFont('Helvetica','B',7);
	 $pdf->Cell(56,13,'LATITUD',0,0,'C');
	 $pdf->SetX(152);
	 $pdf->SetFont('Helvetica','B',7);
	 $pdf->Cell(53,13,'LONGITUD',0,0,'C');




	 
// Aqui empieza la tabla de atributos de la tierra
	 $pdf->SetX(20);
	$pdf->Ln(10);
	$pdf->SetFont('Helvetica','B',15);
	$pdf->SetTextColor(0,0,0);
	$pdf->Cell(0,12, strtoupper('Atributos DEL MAGUEY'), 0,5, 'C');
	$pdf->Ln(0);
	
      
$pdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(85,107,47);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(140,5,utf8_decode('TIPO DE MAGUEY'),1,0,'C', 1);
	$pdf->Cell(36,5,utf8_decode('CALIFICACIÓN **'),1,0,'C',1);
	$pdf->Ln(5);
	
	
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(140,5,utf8_decode(strtoupper('PRESERVACIÓN DE LA DIVERSIDAD BIOLÓGICA DE MAGUEYES')),1,0,'C');
	$pdf->SetFont('Helvetica','B',8);	
	$pdf->Cell(36,5,'---',1,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(140,5,utf8_decode(strtoupper('CONSERVACIÓN DE SUELO Y AGUA')),1,0,'C');
	$pdf->SetFont('Helvetica','B',8);	
	$pdf->Cell(36,5,'---',1,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(140,5,utf8_decode('MANEJO ORGÁNICO'),1,0,'C');
	$pdf->SetFont('Helvetica','B',8);	
	$pdf->Cell(36,5,'---',1,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(140,5,utf8_decode('APROVECHAMIENTO CONTROLADO DE MAGUEYES SILVESTRES'),1,0,'C');
	$pdf->SetFont('Helvetica','B',8);	
	$pdf->Cell(36,5,'---',1,0,'C');
	$pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(140,5,utf8_decode('MANEJO INTEGRADO DE PLAGAS Y ENFERMEDADES'),1,0,'C');
	$pdf->SetFont('Helvetica','B',8);	
	$pdf->Cell(36,5,'---',1,0,'C');
	
	
	$pdf->Ln(6);
	$pdf->SetDrawColor(255, 255, 255);
	$pdf->SetFont('Helvetica','B',5);
	$pdf->Cell(120,5,utf8_decode('** Escala de calificación de 5 a 10, donde 5 es cuando no se hace y 10 cuando cumple con todos los criterios de evaluación; --- No evaluado'),1,0,'C');
	
	
	
	
	 // Aqui termina 
	 $pdf->SetX(20);
	$pdf->Ln(5);
	$pdf->SetFont('Helvetica','B',15);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->Cell(0,12, utf8_decode('CARACTERÍSTICAS DEL MAGUEY'), 0,5, 'C');
	$pdf->SetFillColor(85,107,47);
	$pdf->SetTextColor(255,255,255);  
	$pdf->SetFont('Helvetica','B',8);
	$pdf->Cell(94,5,utf8_decode('ATRIBUTO'),1,0,'C',1);
	$pdf->Cell(25,5,'No. DE PLANTAS',1,0,'C',1);
	$pdf->Cell(21,5,utf8_decode('EDAD (AÑOS)'),1,0,'C',1);
	$pdf->Cell(36,5,utf8_decode('SISTEMA DE PLANTACIÓN'),1,0,'C',1);
	
	
 
	$pdf->Ln(5);
		
	$strConsulta = "SELECT paraje.id_paraje, existenciaplanta.regmaguey, existenciaplanta.cantidadini, existenciaplanta.edad, comun.nombre,especie.genespecie,especie.variante
	FROM existenciaplanta
	Inner Join comun ON comun.id_comun= existenciaplanta.id_comun 
	Inner Join especie ON comun.id_especie = especie.id_especie
	Inner Join paraje ON paraje.id_paraje=existenciaplanta.id_paraje
	WHERE  paraje.id_paraje='$paraje'";	
	
	$historial= $conexion->query($strConsulta);
	$numfilas = mysqli_num_rows($historial);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetFillColor(255,255,255);
   			    $pdf->SetTextColor(0,0,0);
				
	for ($i=0; $i<$numfilas; $i++)
		{
			
			while($resultado = mysqli_fetch_array($historial))
			{
				$pdf->SetFont('Helvetica','B',8); 
				$pdf->Cell(53,5,utf8_decode(strtoupper($resultado['nombre'])),1,0,'C'); 
				 $pdf->SetFont('Helvetica','BI'); 
				$pdf->Cell(41,5, utf8_decode(ucfirst(strtolower($resultado['genespecie']))),1,0,'C');
				$pdf->SetFont('Helvetica','B'); 
				 $pdf->Cell(25,5,$resultado['cantidadini'],1,0,'C'); 
				 $pdf->Cell(21,5,$resultado['edad'],1,0,'C');
				 
				
					$pdf->SetFont('Helvetica','B');
				$pdf->Cell(36,5,strtoupper($resultado['regmaguey']),1,0,'C');
				 $pdf->Ln(); 
			}
			
					}{
						
					$pdf->Ln(12);
					
			$pdf->SetFont('Helvetica','B',10);
			$pdf->SetX(135);
			$pdf->Cell( 88, 20, $pdf->Image("images/firmae.jpg", $pdf->GetX(), $pdf->GetY(), 40.78), 0, 0, 'C', false );
			//$pdf->Ln(0);
			$pdf->SetX(45);
			$pdf->Cell( 88, 20, $pdf->Image("images/firmae.jpg", $pdf->GetX(), $pdf->GetY(),40.78), 0,0, 'C', false );
			$pdf->Ln(18);
			$pdf->cell(88,5,utf8_decode('M. EN C. EFRAÍN PAREDES HERNÁNDEZ'),0,0,'C');
			$pdf->cell(88,5,utf8_decode('DR. EN C. HIPÓCRATES NOLASCO CANCINO'),0,0,'C');
			$pdf->Ln(0);
			$pdf->cell(88,5,utf8_decode('_______________________________________'),0,0,'C');
			$pdf->cell(88,5,utf8_decode('_______________________________________'),0,0,'C');
			$pdf->Ln(5);
			$pdf->SetFont('Helvetica','B',9);
			$pdf->cell(88,5,utf8_decode(strtoupper('Gerente de la Unidad de Maguey')),0,0,'C');
			$pdf->cell(88,5,utf8_decode(strtoupper('Presidente')),0,0,'C');
			}
					
			
			$pdf->Ln(40); 
	
			
		$Consulta = "SELECT * FROM paraje WHERE paraje.id_paraje='$paraje'";
		$historial= $conexion->query($Consulta);

	
			
			while($resultado = mysqli_fetch_array($historial))
			
 
    {
   		$id = $resultado['id_paraje'];
        $coordenada1 = $resultado['lat'];
        $coordenada2 = $resultado['lng'];
        
    }
	
	// Creación del objeto de la clase heredada

$pdf->AliasNbPages();	
			ob_end_clean();
   $pdf->Output("Registro".$paraje.".pdf",'D');
    
?>