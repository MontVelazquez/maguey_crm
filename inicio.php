
<?php
require_once("comboeml/funciones.php");
require_once("bus_especie.php");
require_once("bus_especie2.php");
//require_once("bus_predionum.php");// se agregaron campos para la consulta y autocompletar no. predio a no.cliente
require_once("idparaje.php");
//require_once("sumaranio.php");

session_start();
if(isset($_SESSION['id_usuario'])) {
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
<script src="js/vendor/modernizr.min.js"></script>
       <!-- inicio del carrito -->
<script language="javascript" type="text/javascript" src="js/jquery.validate.1.5.2.js"></script>
<script language="javascript" type="text/javascript" src="js/script.js"></script>
        <!-- fin del carrito -->
        <!--<script src="js/ajax.js"></script>-->
<script src="js/bootstrap.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
       
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/magueys.js"></script>
<script type="text/javascript" src="js/magueysp.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--ESTE ES LO DE LAS TABLAS -->
           <!--    ESTILO GENERAL   -->
       <link type="text/css" href="css/style.css" rel="stylesheet" />
        <!--    ESTILO GENERAL    -->
        
        <script type="text/javascript" language="javascript" src="js/funciones4.js"></script>
        
        
        
        
        
         
        
        
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
        
         <link href="css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="js/bootstrap4-toggle.min.js"></script>
         
<script>
$(document).ready(function(){
   $("#referencia1").click(function(evento){
      if ($("#referencia1").attr("checked")){
         $("#formularioreferencia").css("display", "block");
      }else{
         $("#formularioreferencia").css("display", "none");
      }
   });


 


   $.ajax("libs/mostrarestados.php",{
   cache: false,
   success: function(data, textStatus, jqXHR) {
   $("#estado2").html(data).change(function(){
      $("#local2").html('<option value=""> Selecciona una Localidad </option>');


   if($("#estado2 option:selected").attr('value')!=""){
  
   $("#municipio2").html('');
    $.ajax("libs/mostrarmunicipios.php?estado=" + $("#estado2 option:selected").attr('value'),{
    cache: false,
    success: function(data, textStatus, jqXHR) {
    $("#municipio2").html(data).change(function(){
          
         
           if($("#municipio2 option:selected").attr('value')!=""){
          
           $("#local2").html('');
            $.ajax("libs/mostrarlocalidades.php?municipio=" + $("#municipio2 option:selected").attr('value'),{
            cache: false,
            success: function(data, textStatus, jqXHR) {
            $("#local2").html(data);

          },
          dataType:"html"
          });
          }





          });
          },
          dataType:"html"
          });
          }





          });
          },
          dataType:"html"
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


<script type="text/javascript">
 $(document).ready(function() {
   $("#reset1").click(function() {
     $("form")[0].reset();
   });
 });
</script>

<script type="text/javascript">
function idinsertar ()
{ $consultaid="SELECT max(id_paraje)+1 FROM `paraje` WHERE 1"; }
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
                                  <li id="vin1" class="active"><a href="inicio.php">predio</a></li> 
                                 <!--  <li id="vin4"><a href="rvivero.php?d_s=<?php echo $d_s?>">Vivero</a></li>-->
                                    <li id="vin2"><a href="constancias.php">Constancia</a></li>
                                  <!-- <li id="vin3"><a href="buscar.php?d_s=<?php echo $d_s?>">Consulta</a></li> -->
                                    
                                 <li id="vinr3"><a rel="Cerrar Sesión" href= "libs/logout.php">Finalizar Sesión</a></li>
                               <!--<li id="vinr3"><a href="../acceso/cerrar.php?cerrar">Cerrar sesión</a></li>-->
                                   
                                  
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
						<li id="vin1" class="active"><a href="inicio.php?d_s=<?php echo $d_s?>">Registro de predio</a></li> 
                              <!--<li id="vin4"><a href="rvivero.php?d_s=<?php echo $d_s?>">Registro de Vivero</a></li> -->
                               <li id="vin2"><a href="constancias.php">Constancia</a></li> 
                                     <!--<li id="vin3"><a href="buscar.php?d_s=<?php echo $d_s?>">Consulta</a></li> -->
                              <!--<li id="vinr3"><a rel="Cerrar Sesión" href= "../acceso/login.php?mod=4">Finalizar Sesión</a></li>-->
                                   <!--<li id="vinr3"><a href="../acceso/cerrar.php?cerrar">Cerrar sesión</a></li>-->
                             
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
                        <div class="panel-title" style="text-align:center; font-weight:bold;">REGISTRO DE PREDIO</div>
                        
                      </div> 
                       <!--AQUI ESTA EL TABS --><div id="tabs">
  <ul>
    <li><a href="#tabs-1">Registro de Predio</a></li>
  <li><a href="#tabs-2">Descuento por Guia</a></li>
  <li><a href="#tabs-3">Descuento por Predio</a></li>
  <li><a href="#tabs-4">Generar Nueva Guia</a></li>



<?php

if(isset($_SESSION['nivel'])=='administrador') {
?>



  <li><a href="#tabs-5">Reporte Excel</a></li>



<?php
 }

 
 ?>


  </ul>
  <!--EMPIEZA EL PRIMER TABS --->
  <div id="tabs-1">               
                      <div class="panel-body"><!-- panel-body -->  
                      
                     
<div id="asociado">
	<!--<form class="form-horizontal" role="form" action="" method="post" name="maguey" id="frminformacion" onsubmit="enviarDatos();return false"> -->
    <form class="form-horizontal" id="maguey" action="" method="POST" name="maguey" enctype="multipart/form-data" >
     
    <fieldset><legend align="center">Datos del Productor</legend></fieldset>
    
<label for="maguey" class="col-lg-3 control-label">No.Predio: "A"</label>
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
<span for="maguey" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar Nuevo Asociado</span>
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
                
                
             <label for="maguey" class="col-lg-3 control-label">Nombre del Predio:</label>
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



  <!---<div  class="modal fade" id="ModalRutaNueva"  title="Nueva Localidad"   role="dialog" aria-hidden="true">
  <div style="position:relative;width:300px;margin:10px;width:600px;margin:30px auto">
<div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="titulo">Nueva Localidad</h4>
        </div>
        <div class="modal-body container-fluid">
             <label class="col-lg-3 control-label">Localidad:</label> 
              <input type="text" name="TxtNuevaLocalidad" id="TxtNuevaLocalidad" size="40"></input>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="BtnNuevaLocalidad">Aceptar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
  </div>
  </div>--->








          <label for="maguey" class="col-lg-3 control-label">Tenencia de la Tierra:</label>
                                  <div class="col-lg-8">
                                    <select name="tenencia" id="tenencia" onChange="next(7)" class="form-control" style="max-width:160px;"/>

                                    <option selected="selected" value="NS">SELECCIONAR</option>
                                    <option value="EJIDAL">EJIDAL</option>
                                    <option value="COMUNAL">COMUNAL</option>
                                    <option value="PRIVADA">PRIVADA</option>
                                    </select> </p> 
                                  </div> 
                                    
                                  <!----<label for="maguey" class="col-lg-3 control-label">Comprobante de Propiedad:</label>
                                  <div class="col-lg-8">
                                    <input type="file" name="archivo" id="archivo" size="40"></input></p>
                                    </div>--->
              
                                  
                <label for="maguey" class="col-lg-3 control-label">Usufruto de la Tierra:</label>
                                  <div class="col-lg-8">
                                    <select name="usufruto" id="usufruto" onChange="next(2)" class="form-control" style="max-width:200px;" />
                                    <option selected="selected" value="NS">SELECCIONAR</option></p>
                                    <option value="A MEDIAS">A MEDIAS</option>
                                    <option value="RENTADO">RENTADO</option>
                                    <option value="PROPIEDAD">PROPIEDAD</option>
                                    <option value="PRESTADO">PRESTADO</option>
                                    </select> </p>
                                  </div>
                            
                                  <label for="maguey" class="col-lg-3 control-label">Superficie (Hectáreas):</label>
                                  <div class="col-lg-8">
   <input type="text" id="superficie" name="superficie" class='form-control txt-largo'/></p>

            </div> 
             <div class="col-lg-12"> 
      <label for="maguey" class="col-lg-3 control-label">Latitud Norte:</label>
                                  <div class="col-lg-8" >
   <input type="text" id="lat" name="lat" class='form-control txt-largo' /></p>

            </div>
            </div>
             <div class="col-lg-12">
             <label for="maguey" class="col-lg-3 control-label">Longitud Oeste:</label>
                                  <div class="col-lg-8">
   <input type="text" id="lng" name="lng" class='form-control txt-largo' /></p>
            </div>
            </div>
           <!--- <div class="col-lg-12" align="center">
       <input id="submit" type="button" value="Ubícame" name="ubicame" id="ubicame" onclick="pan()"></p>
       
      </div>--->
       
     <div class="col-lg-12">
    <label for="maguey" class="col-lg-3 control-label">Representante en Campo:</label>
                                  <div class="col-lg-8">
		<input type="text" id="campo" name="campo" class='form-control txt-largo' onblur="upperCase()"/></p>
          
    </div>
    
     
    
    
      
    
    
    
    
    
    
    
    
   <!--- <label for="maguey" class="col-lg-3 control-label"></label>
                                 <div class="col-lg-8">
                                  <input type="checkbox" name="sino" value="1" id="sino" for="maguey">Generar una guia:
                                  </div>--->

    
     <div class="col-lg-12">
            
              <fieldset><legend align="center">Datos del Maguey</legend> </fieldset></div>
            
            
            
              <div id="contenedor">
              
    
              
              
              
              
            
              <!---<input type="checkbox" data-toggle="toggle" id="sino" name="sino"  value='1'>-->
              
             
   </div> 
   
    <div class="col-lg-12">
    
     <label for="maguey" class="col-lg-3 control-label">Generar una sola guia:</label>
                                  <div class="col-lg-8">
                                    <select name="sino" id="sino" onChange="next(2)" class="form-control" style="max-width:200px;" />
                                    <!---<option selected="selected" value="NS">SELECCIONAR</option></p>--->
                                    <option value="1">NO</option>
                                    <option value="2">SI</option>
                             
                                    </select> </p>
                                  </div>
                                  </div>
             
    
             
             
   
            <label for="maguey" class="col-lg-3 control-label">Registro de Maguey:</label>
             <div class="col-lg-8">
             
                                  
                                    <select name="registro" id="registro"style="max-width:250px;" />

                                    <option selected="selected" value="">SELECCIONAR</option>
                                    <option value="CULTIVADO">CULTIVADO</option>
                                    <option value="SEMICULTIVADO">SEMICULTIVADO</option>
                                    <option value="SILVESTRE">SILVESTRE</option>
                                    </select>  
                                  </p>
                                  </div>
                                  <label for="maguey" class="col-lg-3 control-label">Distancia (Surcos):</label>
                                 
   <input type="text" id="sc" name="sc" class='form-control txt-largo' /></p>

   <label for="maguey" class="col-lg-3 control-label">Distancia (Plantas):</label>
                                 
   <input type="text" id="sm" name="sm" class='form-control txt-largo' /></p>
            
 <label for="maguey" class="col-lg-3 control-label">Especie: </label>
 <select name="especie" id="especie" />
 <option value="">- Seleccione una Especie -</option>
 
       <?php echo $combobit; ?>
   </select></p>
           <label for="maguey" class="col-lg-3 control-label">No. de Plantas:</label>
                                 
   <input type="text" id="plantas" name="plantas" class='form-control txt-largo'/></p>

           
             <label for="maguey" class="col-lg-3 control-label">Edad:</label>
                                  
   <input type="text" id="edad" name="edad" class='form-control txt-largo' />  </p> 
    <div class="form-group" align="center">

  <button type="button" name='agregar' id='agregar' class="btn btn-danger1" onClick="fn_agregar()" >
                                  &nbsp;&nbsp;Agregar
                                   </button>
                                   </div>
                                   
<table id="grilla" class="lista">
              <thead>
                    <tr>
                        <th>Registro</th>
                        <th>Distancia (Surcos)</th>
                        <th>Distancia (Plantas)</th>
                        <th>Especie</th>
                        <th>No. de Plantas</th>
                        <th>Edad</th>
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
                              <button type="submit"  name='btnTerminar' id='btnTerminar'  value="btnTerminar" class="btn btn-success"  onClick="">
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
    <form class="form-horizontal" id="magueysi" action="" method="POST" name="magueysi" enctype="multipart/form-data">
 
    <fieldset><legend align="center">Datos del Predio</legend></fieldset>
    
<label for="magueysi" class="col-lg-3 control-label">No. Guia: "A"</label>
<div class="col-lg-8">
	<input type="text" id="numg"  name="numg" class='form-control txt-short'/></p>
    </div>

 
<label for="magueysi" class="col-lg-3 control-label">No. Predio: "A"</label>
<div class="col-lg-8">
	<input readonly type="text" id="num"  name="num" class='form-control txt-short'/></p>
    </div>
 <label for="magueysi" class="col-lg-3 control-label">Nombre del Predio:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombrepre" name="nombrepre" class='form-control'/></p>

            </div>
            <label for="magueysi" class="col-lg-3 control-label">No. Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="clientep" name="clientep" class='form-control'/></p>

            </div>
            <label for="magueysi" class="col-lg-3 control-label">Nombre Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombrecc" name="nombrecc" class='form-control'/></p>

            </div>
            
              
     <div class="col-lg-12">
            
              <fieldset><legend align="center">Datos del Maguey</legend> </fieldset></div>
            <div id="contenedor">
   
  <label for="magueysi" class="col-lg-3 control-label">Especie: </label>
                        <div class="col-lg-8">
                          <select class="form-control" name="especies" id="especies">

                          </select>
                        </div>
                        <label for="magueysi" class="col-lg-3 control-label">Edad:</label>
                                 
   <input readonly type="text" id="edads" name="edads" class='form-control txt-largo'/></p>
                        
                       
   
    <label for="magueysi" class="col-lg-3 control-label">Existencia:</label>
                                 
   <input readonly type="text" id="plantass" name="plantass" class='form-control txt-largo resta'/></p>
   
    <label for="magueysi" class="col-lg-3 control-label">Descuento</label>
                                  
   <input type="text" id="des" name="des" class='form-control txt-largo resta' />  </p>
    
   <label for="magueysi" class="col-lg-3 control-label">Nueva Existencia</label>
                                  
   <input readonly type="text" id="resultado" name="resultado" class='form-control txt-largo' /> 

   
    <div class="form-group" align="center">
  <button type="button" name='agregare' id='agregare' class="btn btn-danger1" onClick="fn_agregare()" >
                                  &nbsp;&nbsp;Agregar
                                   </button>
                                   </div>
                                   
<table id="grillita" class="lista">
              <thead>
                    <tr>
                        
                        <th>Especie</th>
                        <th>Edad</th>
                        <th>Existencia</th>
                        <th>Descuento</th>
                        <th>Nueva Existencia</th>
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
                                  <button type="submit"  name='Terminar' id='Terminar' class="btn btn-success"  onClick="">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>&nbsp;Guardar
                                   </button>
                                   
                                   
                                   <button type="reset" name='reset1' id='reset1' class="btn btn-danger" onClick="reset1()" >
                                   
                                   <span class="glyphicon glyphicon-remove-sign"></span>Cancelar
                                   </button>
                                
                             </div>                           
    
	</div>
     </form>
     
 
                      </div><!--panel-body-->
                       </div>
                       
                       <!--TERMINA-->
  
  
  
   <!--ESTO ES EL FORMULARIO DEL REGISTRO DE MAGUEY   -->
  <div id="tabs-3">               
                      <div class="panel-body"><!-- panel-body -->  
                      
                     
<div id="asociadosp">
	<!--<form class="form-horizontal" role="form" action="" method="post" name="maguey" id="frminformacion" onsubmit="enviarDatos();return false"> -->
    <form class="form-horizontal" id="magueysip" action="" method="POST" name="magueysip" enctype="multipart/form-data">
 
    <fieldset><legend align="center">Datos del Predio</legend></fieldset>
    


 
<label for="magueysip" class="col-lg-3 control-label">No. Predio:</label>
<div class="col-lg-8">
	<input  type="text" id="numpp"  name="numpp" class='form-control txt-short'/></p>
    </div>
    
    <label for="magueysip" class="col-lg-3 control-label">No. Guia:</label>
<div class="col-lg-8">
	<input  type="text" id="numgp"  name="numgp" class='form-control txt-short'/></p>
     <div id="info"></div>
    </div>
    
 <label for="magueysip" class="col-lg-3 control-label">Nombre del Predio:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombreprep" name="nombreprep" class='form-control'/></p>

            </div>
            <label for="magueysip" class="col-lg-3 control-label">No. Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="clientepp" name="clientepp" class='form-control'/></p>

            </div>
            <label for="magueysip" class="col-lg-3 control-label">Nombre Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombreccp" name="nombreccp" class='form-control'/></p>

            </div>
            
              
     <div class="col-lg-12">
            
              <fieldset><legend align="center">Datos del Maguey</legend> </fieldset></div>
            <div id="contenedorp">
   
  <label for="magueysip" class="col-lg-3 control-label">Especie: </label>
                        <div class="col-lg-8">
                          <select class="form-control" name="especiesp" id="especiesp">

                          </select>
                        </div>
                        <label for="magueysip" class="col-lg-3 control-label">Edad:</label>
                                 
   <input readonly type="text" id="edadsp" name="edadsp" class='form-control txt-largo'/></p>
                        
                       
   
    <label for="magueysip" class="col-lg-3 control-label">Existencia:</label>
                                 
   <input readonly type="text" id="plantassp" name="plantassp" class='form-control txt-largo restap'/></p>
   
    <label for="magueysip" class="col-lg-3 control-label">Descuento</label>
                                  
   <input type="text" id="desp" name="desp" class='form-control txt-largo restap' />  </p>
    
   <label for="magueysip" class="col-lg-3 control-label">Nueva Existencia</label>
                                  
   <input readonly type="text" id="resultadop" name="resultadop" class='form-control txt-largo' /> 

   
    <div class="form-group" align="center">
  <button type="button" name='agregarep' id='agregarep' class="btn btn-danger1" onClick="fn_agregarep()" >
                                  &nbsp;&nbsp;Agregar
                                   </button>
                                   </div>
                                   
<table id="grillitap" class="lista">
              <thead>
                    <tr>
                        
                        <th>Especie</th>
                        <th>Edad</th>
                        <th>Existencia</th>
                        <th>Descuento</th>
                        <th>Nueva Existencia</th>
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
                                  <button type="submit"  name='Terminarp' id='Terminarp' class="btn btn-success"  onClick="">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>&nbsp;Guardar
                                   </button>
                                   
                                   
                                   <button type="reset" name='reset1p' id='reset1p' class="btn btn-danger" onClick="reset1p()" >
                                   
                                   <span class="glyphicon glyphicon-remove-sign"></span>Cancelar
                                   </button>
                                
                             </div>                           
    
	</div>
     </form>
     
 
                      </div><!--panel-body-->
                       </div>
  
  
  
  <!--TERMINA-->
  
  
  
  <div id="tabs-4">               
                      <div class="panel-body"><!-- panel-body -->  
                      
                     
<div id="asociados">
       <form class="form-horizontal" id="mas" action="" method="POST" name="mas" enctype="multipart/form-data">
 
    <fieldset><legend align="center">Datos del Predio</legend></fieldset>
    


 
<label for="mas" class="col-lg-3 control-label">No. Predio: "A"</label>
<div class="col-lg-8">
	<input type="text" id="nump"  name="nump" class='form-control txt-short'/></p>
    </div>
 <label for="mas" class="col-lg-3 control-label">Nombre del Predio:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombrep" name="nombrep" class='form-control'/></p>

            </div>
            <label for="mas" class="col-lg-3 control-label">No. Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="clientec" name="clientec" class='form-control'/></p>

            </div>
            <label for="mas" class="col-lg-3 control-label">Nombre Cliente:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="nombrecli" name="nombrecli" class='form-control'/></p>

            </div>
            <label for="mas" class="col-lg-3 control-label">Cantidad de Guias:</label>
                                  <div class="col-lg-8">
   <input  type="text" id="canti" name="canti" class='form-control'/></p>

            </div>
                     
<div class="form-group" align="center">
                                   <!--<button type="submit"  name='btnTerminar' id='btnTerminar' class="btn btn-success" id="enviar-btn">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>Guardar Registro
                                   </button>-->
                                  <button type="submit"  name='gene' id='gene' class="btn btn-success"  onClick="">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>&nbsp;Guardar
                                   </button>
                                   
                                   
                                   <button type="reset" name='reseta' id='reseta' class="btn btn-danger" onClick="reseta()" >
                                   
                                   <span class="glyphicon glyphicon-remove-sign"></span>Cancelar
                                   </button>
                                
                             </div> 
                             
                             
    
	</div>
             </form>      
     
  
   </div><!--panel-body-->
                       </div>
  
  
  
  <!--EMPIEZA EL ULTIMMO TAB5-->



<?php

if(isset($_SESSION['nivel'])=='administrador') {
?>


                    <div id="tabs-5">               
                      <div class="panel-body"><!-- panel-body -->  
                      
  
     <article id="contenidoexcel"></article>   
     
 
                      </div><!--panel-body-->
                       </div>



<?php
 }

 
 ?>

  
   

                    <!--TERMINA-->
                    

                      
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





<script>
$(function() {
		
			
			$('#nombrep').val("");
			$("#nump").autocomplete({
				source: "mas.php",
				//minLength: 1,
				select: function(event, ui) {
					//$('#state_id').val(ui.item.id);
					$('#nombrep').val(ui.item.nombrep);
					$('#clientec').val(ui.item.clientec);
					$('#nombrecli').val(ui.item.nombrecli);
					
				}
			});
			
			$("#num_nombrepre_clientep").autocomplete({
				source: "bus_nompredio.php",
				minLength: 1
			});
		});		
	       	
        </script>



<script type="text/javascript"> 
$(document).ready(function(){
  $("#gene").click(function(){
  if($("#nump").val()!=""){
    if($("#canti").val()!=""){ 
               



    var datos = new FormData($('#mas')[0]);
	 // datos.append('archivo',$('#archivo')[0].files[0]);
	   
	
	  $.ajax({
		async: false,
		type: "POST",
		url: "genera.php",
		data:datos,
		cache: false,
		processData: false,
		contentType:false,
		success:function(response) {
		alert(response);
		}			
    });  
             }
			 
			 
			 
             else
             {
             alert("No ha introducido cantidad de extracción ");
             return false;
             }
           
		   
		   
		   }
		   
		   
		   
           else
           {
           alert("No ha agregado número de predio");
           return false;
           }
		   
		   
         
  });
 
});
</script>


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
       
        <!--desscuento de maguey por predio -->
        <script>
		//variable para el select
		var predionump = '';
		
		
		//$(document).ready(function() {
 
	       	$(function() {
			$('#nombreprep').val("");
			$('#clientepp').val("");
			$('#nombreccp').val("");
			$('#numpp').val("");			
			$('#plantassp').val("");
			$("#numpp").autocomplete({
				source: "bus_predionump.php",
				//minLength: 1,
				select: function(event, ui) {
					//$('#state_id').val(ui.item.id);
					$('#numpp').val(ui.item.numpp);
					$('#nombreprep').val(ui.item.nombreprep);
					$('#clientepp').val(ui.item.clientepp);
					$('#nombreccp').val(ui.item.nombreccp);			
					// se agrego para desplegar los magueyes
					
									  predionump = ui.item.value;	
									  
									
									  
					
      $("#especiesp").load("bus_especie2p.php?c="+predionump, function() {
		 
		  $('#especiesp').append($("<option selected></option>").val("").html("Seleccionar")); 
		
        //$("#especies").append($('<option selected></option>').val("0").html("Seleccionar"));		 
        var options = $('#especiesp option' );
        $( options[ 19 ] ).insertBefore( $( options[ 0 ] ) );
		
		
		$(document).on('change', '#especiesp', function(event) {
		var valorp=$("#especiesp").val();
		//alert(valorp)
		
	//$.post("carga.php", {valor:valor,predionum:predionum}, function(data) {
		//$("#plantass").val(data);
	
 
//});

$(document).ready(function() {
$.ajax(
{
  type: "POST", //Método por el cual se hará la petición
    url: 'cargap.php', //Dirección del archivo solicitado 
    data: {valorp:valorp,predionump:predionump}, //Envió de variables
	 cache: false,
	 success: function(d){
      $("#plantassp").val(d);
	 
	   
	   
	
}
});
});


$(document).ready(function() {
$.ajax(
{
  type: "POST", //Método por el cual se hará la petición
    url: 'carga2p.php', //Dirección del archivo solicitado 
    data: {valorp:valorp,predionump:predionump}, //Envió de variables
	 cache: false,
	 success: function(d){
      $("#edadsp").val(d);
	 
	   
	   
	
}
});
});


//TERMINA FUNCIONA


		
	});
	 
  
		 //fin del relleno
      });
	  
	  // fin de desplegar
	  
	   
    },change: function (event, ui) {
      if (!ui.item) {
        this.value = '';
        predionump = '';
		
      }

   

    
					
					
					// termino lo del select 
					
					
				}
			});
			
			$("#num_nombrepre_clientep").autocomplete({
				source: "bus_nompredio.php",
				minLength: 1
			});
		});		
        </script>
        
         <script>

	
	
	     
        $('.restap').keyup(function() {
var importe_totalp = 0
  $(".restap").each(
    function(index, value) {
       if ($(this).val() > 0) {
      importe_totalp = (-$(this).val())- importe_totalp  ;
      //console.log(importe_total);
      }
    }
  );
      $("#resultadop").val(importe_totalp);
});
    </script>
    
    
    <script type="text/javascript">
$(document).ready(function() {    
    $('#numgp').blur(function(){

        $('#info').html('<img src="loader.gif" alt="" />').fadeOut(300);

        var cedula = $(this).val();        
        var dataString = 'numgp='+cedula;

        $.ajax({
            type: "POST",
            url: "comprobar_disponibilidad.php",
            data: dataString,
            success: function(data) {
                $('#info').fadeIn(300).html(data);
            }
        });
    });              
});    
</script>   
        
        
        <script>
		//variable para el select
		var predionum = '';
		
		
		//$(document).ready(function() {
 
	       	$(function() {
			$('#nombrepre').val("");
			$('#clientep').val("");
			$('#nombrecc').val("");
			$('#num').val("");
			$('#numg').val("");
			$('#plantass').val("");
			$("#numg").autocomplete({
				source: "bus_predionum.php",
				//minLength: 1,
				select: function(event, ui) {
					//$('#state_id').val(ui.item.id);
					$('#num').val(ui.item.num);
					$('#nombrepre').val(ui.item.nombrepre);
					$('#clientep').val(ui.item.clientep);
					$('#nombrecc').val(ui.item.nombrecc);			
					// se agrego para desplegar los magueyes
					
									  predionum = ui.item.value;	
									  
									
									  
					
      $("#especies").load("bus_especie2.php?c="+predionum, function() {
		 
		  $('#especies').append($("<option selected></option>").val("").html("Seleccionar")); 
		
        //$("#especies").append($('<option selected></option>').val("0").html("Seleccionar"));		 
        var options = $('#especies option' );
        $( options[ 19 ] ).insertBefore( $( options[ 0 ] ) );
		
		
		$(document).on('change', '#especies', function(event) {
		var valor=$("#especies").val();
		//alert(valor)
		
	//$.post("carga.php", {valor:valor,predionum:predionum}, function(data) {
		//$("#plantass").val(data);
	
 
//});

$(document).ready(function() {
$.ajax(
{
  type: "POST", //Método por el cual se hará la petición
    url: 'carga.php', //Dirección del archivo solicitado 
    data: {valor:valor,predionum:predionum}, //Envió de variables
	 cache: false,
	 success: function(d){
      $("#plantass").val(d);
	 
	   
	   
	
}
});
});


$(document).ready(function() {
$.ajax(
{
  type: "POST", //Método por el cual se hará la petición
    url: 'carga2.php', //Dirección del archivo solicitado 
    data: {valor:valor,predionum:predionum}, //Envió de variables
	 cache: false,
	 success: function(d){
      $("#edads").val(d);
	 
	   
	   
	
}
});
});


//TERMINA FUNCIONA


		
	});
	 
  
		 //fin del relleno
      });
	  
	  // fin de desplegar
	  
	   
    },change: function (event, ui) {
      if (!ui.item) {
        this.value = '';
        predionum = '';
		
      }

   

    
					
					
					// termino lo del select 
					
					
				}
			});
			
			$("#num_nombrepre_clientep").autocomplete({
				source: "bus_nompredio.php",
				minLength: 1
			});
		});		
        </script>
        
        
      <script>

	
	
	     
        $('.resta').keyup(function() {
var importe_total = 0
  $(".resta").each(
    function(index, value) {
       if ($(this).val() > 0) {
      importe_total = (-$(this).val())- importe_total  ;
      //console.log(importe_total);
      }
    }
  );
      $("#resultado").val(importe_total);
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
  if($("#state").val()!=""){
    if($("#paraje").val()!=""){ 
      if($("#estado option:selected").attr('value')!=""){  
        if($("#municipio option:selected").attr('value')!=""){ 
         if($("#local option:selected").attr('value')!=""){
          if($("#lat").val()!=""){ 
           if($("#lng").val()!=""){ 
               if(ArregloMaguey()!=""){



    var datos = new FormData($('#maguey')[0]);
	 // datos.append('archivo',$('#archivo')[0].files[0]);
	  datos.append('tMaguey',JSON.stringify(ArregloMaguey()));  
	
	  $.ajax({
		async: false,
		type: "POST",
		url: "guardar.php",
		//url2: "constancia/reporte_historial3.php",
		data:datos,
		cache: false,
		processData: false,
		contentType:false,
		success:function(response) {
		alert(response);
		}			
    });  
	
	
             }
             else
             {
             alert("No has agregado datos del maguey");
             return false;
             }
           }
           else
           {
           alert("No ha introducido una longitud ");
           return false;
           }
          }
          else
          {
          alert("No ha introducido una latitud ");
          return false;
          }
         }
         else
         {
         alert("No ha seleccionado una localidad");
         return false;
         }
        }
        else
        {
        alert("No ha seleccionado un municipio");
        return false;
        }
       }  
       else
       {
       alert("No ha seleccionado un estado");
       return false;
       }
    }
    else
    {
    alert("Falta nombre del predio");
    return false; 
    }
  }
  else
  {
  alert("Falta numero de asociado");
  return false;   
  }
  });









  
  $("#btnAsociado").click(function(){




    if($("#no_asociado").val()=="")
    {
      alert("No has agregado No de asociado");
                 return false;
    }
    if($("#nombre_o_razon").val()=="")
    {
      alert("No has agregado un nombre");
                 return false;
    }

       if($("#municipio2 option:selected").attr('value')=="")
    {
      alert("No has seleccionado una Municipio");
                 return false;
    }

       if($("#local2 option:selected").attr('value')=="")
    {
      alert("No has seleccionado una localidad");
                 return false;
    }

    
       
 
    var no_asociado = $('#no_asociado').val();                
    var nombre_o_razon = $('#nombre_o_razon').val();
    var rfc = $('#rfc').val();

    var calle = $('#calle').val();
    
    var no_exterior = $('#no_exterior').val();

    var municipio = $("#municipio2 option:selected").attr('value');
     var localidad = $("#local2 option:selected").text();
    var cp = $('#cp').val();
    

    var telefono = $('#telefono').val();
    var correo = $('#correo').val();
    var repre_legal = $('#repre_legal').val();

     var parametros = {
      "no_asociado": no_asociado,
      "nombre_o_razon": nombre_o_razon,
      "rfc": rfc,
      "calle": calle,
      "no_exterior": no_exterior,
      "cp": cp,
      "municipio": municipio,
      "localidad": localidad,
      "telefono": telefono,
      "correo": correo,
      "repre_legal": repre_legal
    };

    
      $.ajax({

        url: "libs/guardarAsociado.php",
        type: "POST",
        dataType: "HTML",
        data: parametros,

      

        success:function(data){
   $('#no_asociado').val('');                
     $('#nombre_o_razon').val('');
    $('#rfc').val('');

    $('#calle').val('');
    
   $('#no_exterior').val('');

  
     $('#cp').val('');

     $('#telefono').val('');
    $('#correo').val('');
     $('#repre_legal').val('');

    
          alert("Guardado");

        },
    });
  
            

  });





















 
});
</script>



<!--ESTO ES PARA INGRESAR MAS MAGUEY -->
<!--empezar guardar-->
<script type="text/javascript">
 function ArregloMagueys() {
 var myTableArrays = [];
$("table#grillita").find("tbody tr").each(function() { 
    var arrayOfThisRow = [];
    var tableDatas = $(this).find('td');
    if (tableDatas.length > 0) {
        tableDatas.each(function() { arrayOfThisRow.push($(this).text()); });
        myTableArrays.push(arrayOfThisRow);
    }

});
return myTableArrays;

 }
</script>
<!--empezar guardar-->
<script type="text/javascript">
 function ArregloMagueysp() {
 var myTableArraysp = [];
$("table#grillitap").find("tbody tr").each(function() { 
    var arrayOfThisRow = [];
    var tableDatasp = $(this).find('td');
    if (tableDatasp.length > 0) {
        tableDatasp.each(function() { arrayOfThisRow.push($(this).text()); });
        myTableArraysp.push(arrayOfThisRow);
    }

});
return myTableArraysp;

 }
</script>



<script type="text/javascript"> 
$(document).ready(function(){
  $("#Terminarp").click(function(){
 if($("#numpp").val()!=""){
	 if($("#numgp").val()!=""){
	 
	   //if($("#especies option:selected").attr('value')!=""){
   // if($("#des").val()!=""){ 


    var datos = new FormData($('#magueysip')[0]);
	 // datos.append('archivo',$('#archivo')[0].files[0]);
	  datos.append('tMagueysp',JSON.stringify(ArregloMagueysp()));  
	
	  $.ajax({
		async: false,
		type: "POST",
		url: "actualizarprep.php",
		//url2: "constancia/reporte_historial3.php",
		data:datos,
		cache: false,
		processData: false,
		contentType:false,
		success:function(response) {
		alert(response);
		}			
    });  
	
	
             }
             else
             {
             alert("No has agregado el número de guia");
             return false;
             }
	   }
	   else
             {
             alert("No has agregado el número de predio");
             return false;
             }
          
         
  });
 
});
</script>



<script type="text/javascript"> 
$(document).ready(function(){
  $("#Terminar").click(function(){
 if($("#numg").val()!=""){
	   //if($("#especies option:selected").attr('value')!=""){
   // if($("#des").val()!=""){ 
       
        


    var datos = new FormData($('#magueysi')[0]);
	 // datos.append('archivo',$('#archivo')[0].files[0]);
	  datos.append('tMagueys',JSON.stringify(ArregloMagueys()));  
	
	  $.ajax({
		async: false,
		type: "POST",
		url: "actualizarpre.php",
		//url2: "constancia/reporte_historial3.php",
		data:datos,
		cache: false,
		processData: false,
		contentType:false,
		success:function(response) {
		alert(response);
		}			
    });  
	
	
             }
             else
             {
             alert("No has agregado el descuento");
             return false;
             }
			 
          
          
         
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
		
		
		
		<!--  borrar datos estado al refrescar pagina --> 


<!--  fin --> 
        
        
        
		
		<script>
$("#estado").on("change", buscarMunicipios);
$("#municipio").on("change", buscarLocalidades);

function buscarMunicipios(){
  $("#btn_nueva_localidad").hide();
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
      $("#btn_nueva_localidad").show();
		},
		error:	function(xhr,err){ 
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
		}
	});	
}
</script>









    
        <script>
$("#estado").on("change", buscarMunicipios);
$("#municipio").on("change", buscarLocalidades);

function buscarMunicipios(){
  $("#btn_nueva_localidad").hide();
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
      $("#btn_nueva_localidad").show();

		},
		error:	function(xhr,err){ 
			alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
		}
	});	
}
</script><!-- fin del js calendario -->
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
 <footer id="footer2">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                 
                <div class="col-sm-6">
                    
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

     
    
    </body>



<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Asociado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form>
  <div class="form-group">
    <div class="col-xs-6">
    <label >Numero de Cliente</label>
    <input type="text" class="form-control" id="no_asociado" placeholder="Numero de Cliente" autocomplete="off">
  </div>
  <div class="col-xs-6">
    <label >Nombre o Razon Social</label>
    <input type="text" class="form-control" id="nombre_o_razon" placeholder="Nombre o Razon Socia" autocomplete="off">
    </div>
  </div>


  <div class="form-group">

    <div class="col-xs-6">
    <label >RFC</label>
    <input type="text" class="form-control" id="rfc" placeholder="RFC" autocomplete="off">
 </div>

 <div class="col-xs-3">
    <label >Calle</label>
    <input type="text" class="form-control" id="calle" placeholder="Calle" autocomplete="off">
</div>

  <div class="col-xs-3">
   <label >No Exterior</label>
    <input type="text" class="form-control" id="no_exterior" placeholder="No Exterior" autocomplete="off">
    </div>


  </div>




      <div class="form-group">


          <div class="col-xs-6">
           <label >Estado</label>
           <select name="estado2" id="estado2" class="form-control" >
            <option value="">Selecciona un Estado</option>
          </select>
          </div> 


        <div class="col-xs-6">
        <label >Municipio</label>
        <select name="municipio2" id="municipio2" class="form-control">
        <option value="">Selecciona un Municipio </option>
       </select>
       </div>

  </div>























      <div class="form-group">



        <div class="col-xs-6">
    <label >Localidad</label>
    <select name="local2" id="local2" class="form-control">
        <option value=""> Selecciona una Localidad </option>
  </select>
    
      </div>


<div class="col-xs-6">
    <label >C.P</label>
    <input type="text" class="form-control" id="cp" placeholder="C.P" autocomplete="off">
  </div>

</div>


    <div class="form-group">
      <div class="col-xs-6">
    <label >Telefono</label>
    <input type="text" class="form-control" id="telefono" placeholder="Telefono" autocomplete="off">
  </div>
 <div class="col-xs-6">
    <label >Correo</label>
    <input type="text" class="form-control" id="correo" placeholder="Correo" autocomplete="off">
  </div>
 </div>


    <div class="form-group">
    <label >Representante Legal</label>
    <input type="text" class="form-control" id="repre_legal" placeholder="Representante Legal" autocomplete="off">
  </div>

</form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" name='btnAsociado' id='btnAsociado' value="btnAsociado" >Agregar</button>
      </div>
    </div>
  </div>
</div> 






    
</html>
<?php
 }
 else
 {
session_destroy();
 header("Location:index.html"); 
 }
 ?>