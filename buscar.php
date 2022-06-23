
<?php
include('php/registro/conexion.php');
require("funciones.php");

	$strConsulta = "select no_cliente, nombre from clientes";
	$result = $conexion->query($strConsulta);
	$opciones = '<option value="0"> Elige un cliente</option>';
	while( $fila = $result->fetch_array() )
	{
		$opciones.='<option value="'.$fila["no_cliente"].'">'.$fila["no_cliente"].'</option>';
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Consulta de Predio</title>
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
<script language="javascript" type="text/javascript" src="js/script.js"></script>
        <!-- fin del carrito -->
        <!--<script src="js/ajax.js"></script>-->
<script src="js/bootstrap.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->
       
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.addfield.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
			$(document).ready(function(){
				$("#state").change(function(){
					$.ajax({
						url:"php/procesa.php",
						type: "POST",
						data:"clienteno="+$("#state").val(),
						success: function(opciones){
							$("#criterio").html(opciones);
						}
					})
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


<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!--Aqui checar  -->
        <script type="text/javascript">
		$(function() {
		
			$('#abbrev').val("");
			$('#abbre').val("");
			$("#statee").autocomplete({
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
	


          
      <!--AQUI LA BUSQUEDA -->        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
          
    </head>
    <body>
     <div id="wrap">
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
                                 <li id="vin4"><a href="rvivero.php?d_s=<?php echo $d_s?>">Vivero</a></li> 
                                 <li id="vin2"><a href="constancias.php?d_s=<?php echo $d_s?>">Constancia</a></li> 
                                   
                               <li id="vin3" class="active"><a href="buscar.php?d_s=<?php echo $d_s?>">Consulta</a></li>
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
							  <?php if(isset($_SESSION[$d_s]['seccion_1'])) { if($_SESSION[$d_s]['seccion_1']=='OK'){?><li id="vin1"><a href="index.php?d_s=<?php echo $d_s?>">predio</a></li> <?php }}?>
                               <?php if(isset($_SESSION[$d_s]['seccion_4'])) { if($_SESSION[$d_s]['seccion_4']=='OK'){?> <li id="vin4"><a href="rvivero.php?d_s=<?php echo $d_s?>">Vivero</a></li> <?php }}?>
                                   <?php if(isset($_SESSION[$d_s]['seccion_2'])) { if($_SESSION[$d_s]['seccion_2']=='OK'){?> <li id="vin2" ><a href="constancias.php?d_s=<?php echo $d_s?>">Constancia</a></li> <?php }}?>
                                   <?php if(isset($_SESSION[$d_s]['seccion_3'])) { if($_SESSION[$d_s]['seccion_3']=='OK'){?> <li id="vin3" class="active"><a href="buscar.php?d_s=<?php echo $d_s?>">Consulta</a></li> <?php }}?>
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
            <div class="container" id="cont_main">                
                 <div class="row row-centered">
                 <div class="col-xs-12 col-centered">
                   <div class="panel panel-primary">
                      <div class="panel-heading">
                        <div class="panel-title" style="text-align:center; font-weight:bold;">Consulta de Predio</div>
                      </div> 
                      <div class="panel-body"><!-- panel-body -->                 
<div id="asociado">
 <form class="form-horizontal" action="" onsubmit="" id="formbuscar" method="POST" name="formbuscar" enctype="multipart/form-data" onSubmit="return limpiar()">
 <input type="hidden" name='usr' id='usr' value='<?php echo $_SESSION[$d_s]['s_username'];?>'/>
    <fieldset><legend align="center">Buscar</legend></fieldset>
  <!--<label for="asociado" class="col-lg-3 control-label">No. Asociado:</label>
<div class="col-lg-8">
	<input type="text" id="statee"  name="statee" class='form-control txt-short'/></p>
    </div>
    <label for="asociado" class="col-lg-3 control-label">Nombre Asociado:</label>
                                  <div class="col-lg-8">
   <input readonly type="text" id="abbrev" name="abbrev" class='form-control'/></p>
            </div>-->
           <!-- esto esta bien --> 
<label for="asociado" class="col-lg-3 control-label">No. Asociado:</label>
<div class="col-lg-8">
<select id="state" name="state"><?php echo $opciones; ?></select></p>
 </div>
 <label for="asociado" class="col-lg-3 control-label">Predio o Vivero:</label>
 <div class="col-lg-8">
  <select id="criterio" name="criterio"><option value="">Elige un Predio o Vivero</option></select>
   </div>
  
       <div class="col-lg-12">
        <div class="form-group" align="center">
                                     <button type="submit" id='btbuscar' name="btbuscar" class="btn btn-success">
                                   <span class="glyphicon glyphicon glyphicon-saved"></span>&nbsp;&nbsp;Buscar
                                   </button>
                                   <button type="button" name='cancelar' id='cancelar' class="btn btn-danger" onClick="cancelar()" >
                                   <span class="glyphicon glyphicon-remove-sign"></span>Cancelar
                                   </button>
                                
                             </div> 
</div> 
                             <div class="col-lg-8"> 
                              <label for="asociado" class="col-lg-3 control-label">Descarga Reporte</label> 
  <a href="reporteexcel.php" target="_blank"><img src="images/excel.png" alt="Descarga" width="50"></a></br></br></div>                              
    </form>
    <div class="col-lg-12"> 
  <section id="resultado"></section></div>
  </div>
  
  <script>
$("#formbuscar").on("submit", function(event){
    event.preventDefault();
 
    $.ajax({
        url: "consulta.php",
        type: "post",
        data: $(this).serialize(),
        //dataType: "html"
    }).done(function(response){
        $("#resultado").html(response);
    }).fail(function(jqXHR, textStatus){
        console.log(textStatus);
		
    });

});
 
	</script>
    <script>
   function limpiar() {
    setTimeout('document.formbuscar.reset()',2000);
    return false;
}
</script>


                      </div><!--panel-body-->
                    </div><!--panel-primary-->
                  </div><!-- /.col-xs-8 -->
                </div><!-- /.row-centered -->
            </div><!-- /.container -->
        </div><!-- /.contact-page -->
     </div>
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
