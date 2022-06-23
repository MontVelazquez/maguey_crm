<?php
  include('php/registro/conexion.php');
  
  
	$consulta = "SELECT paraje.id_paraje, clientes.no_cliente, clientes.nombre as clientenombre,nombrep,regmaguey, LPAD(paraje.id_paraje,4,'0') as parajes, municipios.nombre as nombrem, estados.nombre as nombree, localidades.localidad, paraje.paraje, comun.nombre,genespecie,existenciaplantas, existenciaplanta.edad,usufruto,tenencia,superficie,lng,lat,dis_planmetros,dis_surcometros,fecha_paraje,rcampo from estados inner join municipios on municipios.estado=estados.clave inner join localidades on localidades.MunicipioID=municipios.id inner join paraje on localidades.id=paraje.id_localidad inner join clientes on paraje.id_cliente=clientes.no_cliente inner join existenciaplanta on paraje.id_paraje=existenciaplanta.id_paraje Inner Join comun ON comun.id_comun= existenciaplanta.id_comun Inner Join especie ON comun.id_especie = especie.id_especie order by paraje.id_paraje";
	$resultado = $conexion->query($consulta);
	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'libs/phpExcel/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
							 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel con PHP y MySQL")
							 ->setSubject("Reporte Excel con PHP y MySQL")
							 ->setDescription("Reporte de alumnos")
							 ->setKeywords("reporte alumnos carreras")
							 ->setCategory("Reporte excel");

		$tituloReporte = "REPORTE DE PREDIOS DE MAGUEY";
		$titulosColumnas = array('NO_PARAJE','NO_CLIENTE','NOMBRE DEL CLIENTE','NOMBRE DE PRODUCTOR','SITUACIÓN DE MANEJO','LOCALIDAD','MUNICIPIO','ESTADO','NOMBRE DEL PARAJE','NOMBRE COMÚN (ESPECIE)','NOMBRE CIENTIFICO (ESPECIE)','CANTIDA DE EXISTENCIA PLANTAS','EDAD','USUFRUTO','TENENCIA','SUPERFICIE','LONGITUD','LATITUD','DISTANCIA ENTRE PLANTAS (METROS)','DISTANCIA ENTRE SURCOS (METROS)','FECHA DE REGISTRO','REPRESENTANTE EN CAMPO');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:V1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$tituloReporte)
        		    ->setCellValue('A2',  $titulosColumnas[0])
		            ->setCellValue('B2',  $titulosColumnas[1])
        		    ->setCellValue('C2',  $titulosColumnas[2])
            		->setCellValue('D2',  $titulosColumnas[3])
					->setCellValue('E2',  $titulosColumnas[4])
		            ->setCellValue('F2',  $titulosColumnas[5])
        		    ->setCellValue('G2',  $titulosColumnas[6])
            		->setCellValue('H2',  $titulosColumnas[7])
					->setCellValue('I2',  $titulosColumnas[8])
		            ->setCellValue('J2',  $titulosColumnas[9])
        		    ->setCellValue('K2',  $titulosColumnas[10])
            		->setCellValue('L2',  $titulosColumnas[11])
				    ->setCellValue('M2',  $titulosColumnas[12])
		            ->setCellValue('N2',  $titulosColumnas[13])
        		    ->setCellValue('O2',  $titulosColumnas[14])
            		->setCellValue('P2',  $titulosColumnas[15])
					->setCellValue('Q2',  $titulosColumnas[16])
					->setCellValue('R2',  $titulosColumnas[17])
					->setCellValue('S2',  $titulosColumnas[18])
					->setCellValue('T2',  $titulosColumnas[19])
					->setCellValue('U2',  $titulosColumnas[20])
					->setCellValue('V2',  $titulosColumnas[21]);
		
		//Se agregan los datos de los alumnos
		$i = 3;
		while ($registro= $resultado->fetch_array()) 
		{
			$objPHPExcel->setActiveSheetIndex(0)
	->setCellValueExplicit('A'.$i, $registro['parajes'], PHPExcel_Cell_DataType::TYPE_STRING)
	->setCellValueExplicit('B'.$i, $registro['no_cliente'], PHPExcel_Cell_DataType::TYPE_STRING)
    ->setCellValue('C'.$i, $registro['clientenombre'])
   	->setCellValue('D'.$i, $registro['nombrep'])
	->setCellValue('E'.$i, $registro['regmaguey'])
	 ->setCellValue('F'.$i, $registro['localidad'])
	 ->setCellValue('G'.$i, $registro['nombrem'])
	 ->setCellValue('H'.$i, $registro['nombree'])
	 ->setCellValue('I'.$i, $registro['paraje'])
	 ->setCellValue('J'.$i, $registro['nombre'])
	 ->setCellValue('K'.$i, $registro['genespecie'])
	 ->setCellValue('L'.$i, $registro['existenciaplantas'])
	 ->setCellValue('M'.$i, $registro['edad'])
	 ->setCellValue('N'.$i, $registro['usufruto'])
	 ->setCellValue('O'.$i, $registro['tenencia'])
	 ->setCellValue('P'.$i, $registro['superficie'])
	 ->setCellValue('Q'.$i, $registro['lng'])
	 ->setCellValue('R'.$i, $registro['lat'])
	 ->setCellValue('S'.$i, $registro['dis_planmetros'])
	 ->setCellValue('T'.$i, $registro['dis_surcometros'])
	 ->setCellValue('U'.$i, $registro['fecha_paraje'])
	 ->setCellValue('V'.$i, $registro['rcampo']);
	 $i++;
		}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => 'FFFFFF'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => '1C7F33')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true, 
				'size' =>11,                         
                'color'     => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => '4AE66F'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF431a5d'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '53DA73'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '29D551'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',
				'size' =>9,               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				//'color'		=> array('argb' => 'FFd9b7f4')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(	'rgb' => '#B2E5CB'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:V1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:V2')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A3:V".($i-1));
				
		for($i = 'A'; $i <= 'V'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Parajes');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,3);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reportedepredios.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{
		print_r('No hay resultados para mostrar');
	}
?>