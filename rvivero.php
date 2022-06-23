
<?php
require_once("comboeml/funciones.php");
require_once("bus_especie.php");
require_once("idparaje.php");


?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>

       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Entrada-Maguey</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		<meta name="author" content="templatemo">              
       <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <link rel="stylesheet" href="smoothness/jquery-ui.css">
          <link href="css/estilo.css" rel="stylesheet" type="text/css" />

        <!--calendario--->
        <link href="./calendario/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    	<link href="./calendario/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
        <!-- fin del calendario--->
        
        <!--<link rel="shortcut icon" href="images/fq1.ico">-->
<script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
       <!-- inicio del carrito -->
<script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
<script language="javascript" type="text/javascript" src="js/scriptvive.js"></script>
        <!-- fin del carrito -->
        <!--<script src="js/ajax.js"></script>-->
<script src="js/bootstrap.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
       
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/magueyvive.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--ESTE ES LO DE LAS TABLAS -->
           <!--    ESTILO GENERAL   -->
       <link type="text/css" href="css/style.css" rel="stylesheet" />
        <!--    ESTILO GENERAL    -->
        <!--    JQUERY   -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
         <script type="text/javascript" language="javascript" src="js/funciones2.js"></script>
        <!--    JQUERY    -->
        <!--    FORMATO DE TABLAS    -->
        <link type="text/css" href="css/demo_table.css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
        <!--    FORMATO DE TABLAS    -->
        <!-- ESTO ES LO DE LAS TABLAS--->
         
<script>
$(document).ready(function(){
   $("#referencia1").click(function(evento){
      if ($("#referencia1").attr("checked")){
         $("#formularioreferencia").css("display", "block");
      }else{
         $("#formularioreferencia").css("display", "none");
      }
   });
});
</script>
<script type="text/javascript">
 $(document).ready(function() {
   $("#cancelar").click(function() {
     $("form")[0].reset();
   });
 });
</script>
<!---empieza el mapa-->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
    var map;
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(23.6266557,-102.5377501),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),
  mapOptions);
  map.setZoom(5);
    }
	 var image = 'iconocrm.png';
    google.maps.event.addDomListener(window, 'load', initialize);
    function pan() {
        var panPoint = new google.maps.LatLng(document.getElementById("lat").value, document.getElementById("lng").value);
        map.panTo(panPoint)
		//map.setZoom(17);
		map.setZoom(13);
		var marker = new google.maps.Marker({
		  //icon: 'map.png',	
          position: panPoint,
          map: map,
		  animation: google.maps.Animation.DROP,
		  icon: image

        });
     }
</script>
<!---termina el mapa-->
<script type="text/javascript">
function idinsertar ()
{ $consultaid="SELECT max(id_paraje)+1 FROM `paraje` WHERE 1"; }
</script>  
 <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
          
    </head>
    <body>
 <div class="site-header">
            <div class="container">
                <div class="main-header">
                    <div class="row">
                       <div class="col-md-4 col-sm-6 col-xs-10">
                            <div class="logo">
                                <a href="#">
                                    <!--<img src="images/logo.png"  width="120%" alt="travel html5 template" title="travel html5 template">-->
                                    <img src="images/logo.png"  width="90%" alt="travel html5 template" title="travel html5 template">
                                </a>
                                                     </div>
                        </div>  
                        <div class="col-md-8 col-sm-6 col-xs-2">
                            <div class="main-menu">
                                <ul class="visible-lg visible-md">
                                  <li id="vin1"><a href="index.php?d_s=<?php echo $d_s?>">predio</a></li> 
                                    <li id="vin4" class="active"><a href="rvivero.php?d_s=<?php echo $d_s?>">Vivero</a></li>
                                   <li id="vin2"><a href="constancias.php?d_s=<?php echo $d_s?>">Constancia</a></li>
                                   <li id="vin3"><a href="buscar.php?d_s=<?php echo $d_s?>">Consulta</a></li>
                                    <li id="vin5"><a href="salida.php?d_s=<?php echo $d_s?>">Salida</a></li>
                                <!-- <li id="vinr3"><a rel="Cerrar Sesión" href= "../acceso/login.php?mod=4">Finalizar Sesión</a></li>-->
                               <li id="vinr3"><a href="../acceso/cerrar.php?cerrar">Cerrar sesión</a></li>
                                   
                                  
                                </ul>
                                <a href="#" class="toggle-menu visible-sm visible-xs">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </div> <!-- /.main-menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                </div> <!-- /.main-header -->
                <div class="row">
                    <div class="col-md-12 visible-sm visible-xs">
                        <div class="menu-responsive" id="mnr">
                            <ul>
							 <li id="vin1"><a href="index.php?d_s=<?php echo $d_s?>">predio</a></li>
                              <li id="vin4" class="active"><a href="rvivero.php?d_s=<?php echo $d_s?>">Vivero</a></li>
                                  <li id="vin2"><a href="constancias.php?d_s=<?php echo $d_s?>">Constancia</a></li> 
                                  <li id="vin3"><a href="buscar.php?d_s=<?php echo $d_s?>">Consulta</a></li> 
                                    <li id="vin5"><a href="salida.php?d_s=<?php echo $d_s?>">Salida</a></li> 
                              <!--<li id="vinr3"><a rel="Cerrar Sesión" href= "../acceso/login.php?mod=4">Finalizar Sesión</a></li>-->
                                  <li id="vinr3"><a href="../acceso/cerrar.php?cerrar">Cerrar sesión</a></li>
                             
                            </ul>
                        </div> <!-- /.menu-responsive -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-header -->
        <div class="page-top" id="templatemo_contact">
        </div> <!-- /.page-header -->

        <div class="contact-page">
            <div class="container">
                
                 <div class="row row-centered">
                 <div class="col-xs-10 col-centered">
                   <div class="panel panel-primary">
                      <div class="panel-heading">
                        <div class="panel-title" style="text-align:center; font-weight:bold;">REGISTRO DE VIVERO</div>
                        
                      </div> 
                       <!--AQUI ESTA EL TABS --><div id="tabs">
  <ul>
    <li><a href="#tabs-1">Registro de Vivero</a></li>
    <li><a href="#tabs-2">Entrada de Maguey</a></li>
  </ul>
  <!--EMPIEZA EL PRIMER TABS --->
  <div id="tabs-1">               
                      <div class="panel-body"><!-- panel-body -->  
                      
                     
<div id="asociado">
	<!--<form class="form-horizontal" role="form" action="" method="post" name="maguey" id="frminformacion" onsubmit="enviarDatos();return false"> -->
    <form class="form-horizontal" id="maguey" action="" method="POST" name="maguey" enctype="multipart/form-data" >
     <input type="hidden" name='usr' id='usr' value='<?php echo $_SESSION[$d_s]['s_username'];?>'/>
    <fieldset><legend align="center">Datos del Productor</legend></fieldset>
    
<label for="maguey" class="col-lg-3 control-label">No.Vivero:</label>
<div class="col-lg-8">
<input type="text" name="id" id="id" disabled="disabled"  class='form-control txt-short' value="<?php echo $id; ?>"><br/>         
    </div>
<label for="maguey" class="col-lg-3 control-label">No. Asociado:</label>
<div class="col-lg-8">
	<input type="text" id="state"  name="state" class='form-control txt-short' /></p>
    </div>
 <label for="maguey" class="col-lg-3 control-label">Nombre Asociado:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="abbrev" name="abbrev" class='form-control'/></p>

            </div>
               <div class="col-lg-12">
             <legend align="center">Datos del Predio</legend></div>
             
             <label for="maguey" class="col-lg-3 control-label"></label>
                                 <div class="col-lg-8">
                                  <input type="checkbox" name="referencia1" value="1" id="referencia1" for="maguey">Propietario
                                  </div>
<br>
<div id="formularioreferencia" style="display: none;">
<label for="maguey" class="col-lg-3 control-label">Nombre completo:</label>
<div class="col-lg-8">
<input type="text" name="referencia2" id="referencia2" class="form-control" onblur="upperCase()" ></p>
</div>
</div>    
             <label for="maguey" class="col-lg-3 control-label">Fecha de Registro:</label>
             <div class="col-lg-8">
                <div class="input-group date form_date" data-date="" data-date-format="mm/dd/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
               
                    <input class="form-control" size="16" type="text" value="" name="fecha"  id="fecha" readonly/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    </div>
                
                
             <label for="maguey" class="col-lg-3 control-label">Nombre del Vivero:</label>
                                  <div class="col-lg-8">
   <input type="text" id="paraje" name="paraje" class='form-control txt-largo' /></p>

            </div>
            <label for="maguey" class="col-lg-3 control-label">Referencia de Ubicación:</label>
                                  <div class="col-lg-8">
   <input type="text" id="referenciau" name="referenciau" onblur="upperCase()" /></p>
            </div>
            <label for="maguey" class="col-lg-3 control-label">Estado:</label>
                                  <div class="col-lg-8" >
		<select name="estado" id="estado" />
				<option value="">- Seleccione un Estado -</option>
		<?php
		$estados = dameEstado();
		
		foreach($estados as $indice => $registro){
			echo "<option value=".$registro['clave'].">".$registro['nombre']."</option>";
		}
		?>
	</select></p>
    </div>
	
	<label for="maguey" class="col-lg-3 control-label">Municipio:</label>
                                  <div class="col-lg-8">
		<select name="municipio" id="municipio"/>
				<option value="">- primero seleccion un estado -</option>
	</select>
    </p>
    </div>
    <label for="maguey" class="col-lg-3 control-label">Localidad:</label>
                                  <div class="col-lg-8">
		<select name="local" id="local">
				<option value="">- primero seleccion un municipio -</option>
	</select>
    
    </p>
    </div>  
              
                                  
               
      <label for="maguey" class="col-lg-3 control-label">Latitud Norte:</label>
                                  <div class="col-lg-8" >
   <input type="text" id="lat" name="lat" class='form-control txt-largo' /></p>

            </div>
             <label for="maguey" class="col-lg-3 control-label">Longitud Oeste:</label>
                                  <div class="col-lg-8">
   <input type="text" id="lng" name="lng" class='form-control txt-largo' /></p>
            </div>
           <!-- <div class="col-lg-12" align="center">
       <input id="submit" type="button" value="Ubícame" name="ubicame" id="ubicame" onclick="pan()"></p>
       
      </div>
       <div  id="map-canvas"></div></p>-->
     
           
    <label for="maguey" class="col-lg-3 control-label">Encargado:</label>
                                  <div class="col-lg-8">
		<input type="text" id="campo" name="campo" class='form-control txt-largo' onblur="upperCase()"/></p>
          
    </div> 
     <label for="maguey" class="col-lg-3 control-label">Foto 1:</label>
                                  <div class="col-lg-8">
                                  
   <input type="file" id="foto1" name="foto1"/></p>

            </div>  
             <label for="maguey" class="col-lg-3 control-label">Foto 2:</label>
                                  <div class="col-lg-8">
                                  
   <input type="file" id="foto2" name="foto2"/></p>

            </div>  
    
     <div class="col-lg-12">
            
              <fieldset><legend align="center">Datos del Maguey</legend> </fieldset></div>
            <div id="contenedor">
            
   
            <label for="maguey" class="col-lg-3 control-label">Registro de Maguey:</label>
             <div class="col-lg-8">
                                  
                                    <select name="registro" id="registro"style="max-width:250px;" />

                                    <option selected="selected" value="">SELECCIONAR</option>
                                    <option value="ALMACIGO">ALMACIGO</option>
                                    <option value="BOLSA O MACETA">BOLSA O MACETA</option>
                                    <option value="CHAROLAS">CHAROLAS</option>
                                    </select>  
                                  </p>
                                  </div>
                                  <label for="maguey" class="col-lg-3 control-label">Origen del Maguey:</label>
             <div class="col-lg-8">
                                  
                                    <select name="origen" id="origen"style="max-width:250px;" />

                                    <option selected="selected" value="">SELECCIONAR</option>
                                    <option value="QUIOTE">QUIOTE</option>
                                    <option value="SEMILLA">SEMILLA</option>
                                    <option value="HIJUELO">HIJUELO</option>
                                    <option value="OTRO">OTRO</option>
                                    </select>  
                                  </p>
                                  </div>
                                  
            
 <label for="maguey" class="col-lg-3 control-label">Especie: </label>
 <select name="especie" id="especie" />
 <option value="">- Seleccione una Especie -</option>
 
       <?php echo $combobit; ?>
   </select></p>
           <label for="maguey" class="col-lg-3 control-label">No. de Plantas:</label>                   
   <input type="text" id="plantas" name="plantas" class='form-control txt-largo'/></p>

       <label for="maguey" class="col-lg-3 control-label">Fecha de Siembra:</label>
             <div class="col-lg-8">
                <div class="input-group date form_date" data-date="" data-date-format="mm/dd/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
               
                    <input class="form-control" size="16" type="text" value="" name="fechavive"  id="fechavive" readonly/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    </div> 
            
    <div class="form-group" align="center">
  <button type="button" name='agregar' id='agregar' class="btn btn-danger1" onClick="fn_agregar()" >
                                  &nbsp;&nbsp;Agregar
                                   </button>
                                   </div>
                                   
<table id="grilla" class="lista">
              <thead>
                    <tr>
                        <th>Registro</th>
                        <th>Origen</th>
                        <th>Especie</th>
                        <th>No. de Plantas</th>
                        <th>Fecha de Siembra</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                
            </table>       
    </div> 
   
          
<div class="form-group" align="center">
                                   <!--<button type="submit"  name='btnTerminar' id='btnTerminar' class="btn btn-success" id="enviar-btn">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>Guardar Registro
                                   </button>-->
                                  <button type="submit"  name='btnTerminar' id='btnTerminar' class="btn btn-success"  onClick="">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>&nbsp;Guardar
                                   </button>
                                   
                                   
                                   <button type="button" name='cancelar' id='cancelar' class="btn btn-danger" onClick="cancelar()" >
                                   
                                   <span class="glyphicon glyphicon-remove-sign"></span>Cancelar
                                   </button>
                                
                             </div>                           
    
	</div>
     </form>
     
     
 
                      </div><!--panel-body-->
                       </div>

  <!--ESTO ES EL FORMULARIO DEL REGISTRO DE MAGUEY   -->
  <div id="tabs-2">               
                      <div class="panel-body"><!-- panel-body -->  
                      
                     
<div id="asociados">
	<!--<form class="form-horizontal" role="form" action="" method="post" name="maguey" id="frminformacion" onsubmit="enviarDatos();return false"> -->
    <form class="form-horizontal" id="magueys" action="" method="POST" name="magueys" enctype="multipart/form-data">
 
    <fieldset><legend align="center">Datos del Predio</legend></fieldset>
    
<label for="magueys" class="col-lg-3 control-label">No. Predio:</label>
<div class="col-lg-8">
	<input type="text" id="num"  name="num" class='form-control txt-short'/></p>
    </div>
 <label for="magueys" class="col-lg-3 control-label">Nombre del Predio:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombrepre" name="nombrepre" class='form-control'/></p>

            </div>
            <label for="magueys" class="col-lg-3 control-label">No. Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="clientep" name="clientep" class='form-control'/></p>

            </div>
              
      <div class="col-lg-12">
            
              <fieldset><legend align="center">Datos del Maguey</legend> </fieldset></div>
            <div id="contenedor">
            
   
            <label for="magueys" class="col-lg-3 control-label">Registro de Maguey:</label>
             <div class="col-lg-8">
                                  
                                    <select name="registros" id="registros"style="max-width:250px;" />

                                    <option selected="selected" value="">SELECCIONAR</option>
                                    <option value="ALMACIGO">ALMACIGO</option>
                                    <option value="BOLSA O MACETA">BOLSA O MACETA</option>
                                    <option value="CHAROLAS">CHAROLAS</option>
                                    </select>  
                                  </p>
                                  </div>
                                   <label for="magueys" class="col-lg-3 control-label">Origen del Maguey:</label>
             <div class="col-lg-8">
                                  
                                    <select name="origens" id="origens"style="max-width:250px;" />

                                    <option selected="selected" value="">SELECCIONAR</option>
                                    <option value="QUIOTE">QUIOTE</option>
                                    <option value="SEMILLA">SEMILLA</option>
                                    <option value="HIJUELO">HIJUELO</option>
                                     <option value="OTRO">OTRO</option>
                                    </select>  
                                  </p>
                                  </div>
                                  
            
 <label for="magueys" class="col-lg-3 control-label">Especie: </label>
 <select name="especies" id="especies" />
 <option value="">- Seleccione una Especie -</option>
 
       <?php echo $combobit; ?>
   </select></p>
           <label for="magueys" class="col-lg-3 control-label">No. de Plantas:</label>                   
   <input type="text" id="plantass" name="plantass" class='form-control txt-largo'/></p>

       <label for="magueys" class="col-lg-3 control-label">Fecha de Siembra:</label>
             <div class="col-lg-8">
                <div class="input-group date form_date" data-date="" data-date-format="mm/dd/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
               
                    <input class="form-control" size="16" type="text" value="" name="fechavives"  id="fechavives" readonly/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    </div> 
            
    <div class="form-group" align="center">
  <button type="button" name='agregar' id='agregar' class="btn btn-danger1" onClick="fn_agregare()" >
                                  &nbsp;&nbsp;Agregar
                                   </button>
                                   </div>
                                   
<table id="grillas" class="lista">
              <thead>
                    <tr>
                        <th>Registro</th>
                        <th>Origen</th>
                        <th>Especie</th>
                        <th>No. de Plantas</th>
                        <th>Fecha de Siembra</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
                
            </table>       
    </div> 
   
          
<div class="form-group" align="center">
                                   <!--<button type="submit"  name='btnTerminar' id='btnTerminar' class="btn btn-success" id="enviar-btn">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>Guardar Registro
                                   </button>-->
                                  <button type="submit"  name='btnTerminars' id='btnTerminars' class="btn btn-success"  onClick="">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>&nbsp;Guardar
                                   </button>
                                   
                                   
                                   <button type="button" name='cancelar' id='cancelar' class="btn btn-danger" onClick="cancelar()" >
                                   
                                   <span class="glyphicon glyphicon-remove-sign"></span>Cancelar
                                   </button>
                                
                             </div>                           
    
	</div>
     </form>
     
     
 
                      </div><!--panel-body-->
                       </div>
  

                      
                    </div><!--panel-primary-->
                  </div><!-- /.col-xs-8 -->
                </div><!-- /.row-centered -->
            </div><!-- /.container -->
        </div><!-- /.contact-page -->
     </div>
<!-- js del calendario   --->
<!--<script type="text/javascript" src="./calendario/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>-->
<script type="text/javascript" src="./calendario/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./calendario/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./calendario/js/locales/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script type="text/javascript">
	$('.form_date').datetimepicker({
       language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

</script>
 <script type="text/javascript" src="js/jquery-ui.min.js"></script> <!--Aqui checar  -->
        <script type="text/javascript">
		$(function() {
		
			$('#abbrev').val("");
			$('#abbre').val("");
			$("#state").autocomplete({
				source: "bus_clientes.php",
				//minLength: 1,
				select: function(event, ui) {
					//$('#state_id').val(ui.item.id);
					$('#abbrev').val(ui.item.abbrev);
					$('#abbre').val(ui.item.abbre);
				}
			});
			
			$("#state_abbrev").autocomplete({
				source: "bus_nomcli.php",
				minLength: 1
			});
		});		
		</script>
        <!--Aqui esta estoo -->
             <script>
	       	$(function() {
		
			
			$('#nombrepre').val("");
			$("#num").autocomplete({
				source: "bus_viveronum.php",
				//minLength: 1,
				select: function(event, ui) {
					//$('#state_id').val(ui.item.id);
					$('#nombrepre').val(ui.item.nombrepre);
					$('#clientep').val(ui.item.clientep);
					
				}
			});
			
			$("#num_nombrepre_clientep").autocomplete({
				source: "bus_nomvivero.php",
				minLength: 1
			});
		});		
        </script>
   
        <!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
<!--empezar guardar-->
<script type="text/javascript">
 function ArregloMaguey() {
 var myTableArray = [];
$("table#grilla").find("tbody tr").each(function() { 
    var arrayOfThisRow = [];
    var tableData = $(this).find('td');
    if (tableData.length > 0) {
        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
        myTableArray.push(arrayOfThisRow);
    }
});
return myTableArray;
 }
</script>
            
<script type="text/javascript"> 
$(document).ready(function(){
  $("#btnTerminar").click(function(){ 
	//var datos={'tMaguey': JSON.stringify(ArregloMaguey())};
	//datos = $("#maguey").serialize() + "&" + $.param(datos);
	var datos = new FormData($('#maguey')[0]);
	datos.append('foto1',$('#foto1')[0].files[0]);
	datos.append('foto2',$('#foto2')[0].files[0]);
	datos.append('tMaguey',JSON.stringify(ArregloMaguey()));  
	
	$.ajax({
		 async: false,
		type: "POST",
		url: "guardarvive.php",
		data:datos,
		cache: false,
		processData: false,
		contentType:false,
				success:function(response) {
					alert(response);
			   
             }			
});
  });
 
});
</script>
<!--ESTO ES PARA INGRESAR MAS MAGUEY -->
<script type="text/javascript">
 function ArregloMagueys() {
 var myTableArray = [];
$("table#grillas").find("tbody tr").each(function() { 
    var arrayOfThisRow = [];
    var tableData = $(this).find('td');
    if (tableData.length > 0) {
        tableData.each(function() { arrayOfThisRow.push($(this).text()); });
        myTableArray.push(arrayOfThisRow);
    }
});
return myTableArray;
 }
</script>
            
<script type="text/javascript"> 
$(document).ready(function(){
  $("#btnTerminars").click(function(){ 
	var datos={'tMagueys': JSON.stringify(ArregloMagueys())};
	datos = $("#magueys").serialize() + "&" + $.param(datos);
	 
	$.ajax({
		 async: false,
		type: "POST",
		url: "guardarvive2.php",
		data:datos,
		//dataType:"json",
		
		
				success:function(response) {
					alert(response);
             }

					
});
  });
 
});
</script>

<!-- AQUI TERMINA EL MAGUEY-->
        <script type="text/javascript">
		$(function() {
		
			$('#abbre').val("");
			$("#stat").autocomplete({
				source: "bus_especie.php",
				minLength: 1,
				select: function(event, ui) {
					$('#stat_id').val(ui.item.id);
					
					
				}
			});
		});	

		</script>
        
        <script>
$("#estado").on("change", buscarMunicipios);
$("#municipio").on("change", buscarLocalidades);

function buscarMunicipios(){
	$("#local").html("<option value=''>- primero seleccione un municipio -</option>");
	
	$estado = $("#estado").val();
	
	if($estado == ""){
			$("#municipio").html("<option value=''>- primero seleccione un estado -</option>");
	}
	else {
		$.ajax({
			dataType: "json",
			data: {"estado": $estado},
			url:   'comboeml/buscar.php',
			type:  'post',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				$("#municipio").html(respuesta.html);
			},
			error:	function(xhr,err){ 
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
	}
}

function buscarLocalidades(){
	$municipio = $("#municipio").val();
	
	$.ajax({
		dataType: "json",
		data: {"municipio": $municipio},
		url:   'comboeml/buscar.php',
        type:  'post',
		beforeSend: function(){
			//Lo que se hace antes de enviar el formulario
			},
        success: function(respuesta){
			//lo que se si el destino devuelve algo
			$("#local").html(respuesta.html);
		},
		error:	function(xhr,err){ 
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
		}
	});	
}
</script>
 
    
        <!-- fin del js calendario -->

 <footer id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                  <div id="usr" align="center" style="color:#CCC; margin-top:50px;"><?php echo $_SESSION[$d_s]['s_username'];?></div><div style="float:right; margin-top:50px; text-align:right;color:#CCC;">Usuario:&nbsp;     
                </div>
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

     
    
    </body>
</html>
