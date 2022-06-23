<?php

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
<script type="text/javascript" src="js/magueys.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--ESTE ES LO DE LAS TABLAS -->
           <!--    ESTILO GENERAL   -->
       <link type="text/css" href="css/style.css" rel="stylesheet" />
        <!--    ESTILO GENERAL    -->
        <!--    JQUERY   -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
         <script type="text/javascript" language="javascript" src="js/funciones2.js"></script>
         <script type="text/javascript" language="javascript" src="js/funciones3.js"></script>
        <!--    JQUERY    -->
        <!--    FORMATO DE TABLAS    -->
        <link type="text/css" href="css/demo_table.css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>


 
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
                                  <li id="vin1"><a href="inicio.php">predio</a></li> 
                                  
                                   <li id="vin2" class="active"><a href="constancias.php">Constancia</a></li> 
                                  
                                                  
                                <li id="vinr3"><a rel="Cerrar Sesión" href= "libs/logout.php">Finalizar Sesión</a></li>
                              
                                   
                                  
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
							 <li id="vin1"><a href="inicio.php">predio</a></li> 
                             
                                <li id="vin2" class="active"><a href="constancias.php">Constancia</a></li>
                                  
                             
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
                        <div class="panel-title" style="text-align:center; font-weight:bold;">CONSTANCIAS</div>
                        
                      </div> 
                       <!--AQUI ESTA EL TABS --><div id="tabs">
  <ul>
    <li><a href="#tabs-1">Constancia de Registro</a></li>
    <li><a href="#tabs-2">Guias de Extracción</a></li>
    <li><a href="#tabs-3">Nuevas Guias</a></li>
    
  </ul>
  <!--EMPIEZA EL PRIMER TABS --->
  <div id="tabs-1">               
                      <div class="panel-body"><!-- panel-body -->  
                      
	
     <article id="contenido"></article>   
     
 
                      </div><!--panel-body-->
                       </div>

  <!--ESTO ES EL FORMULARIO DEL REGISTRO DE MAGUEY   -->
  <div id="tabs-2">               
                      <div class="panel-body"><!-- panel-body -->  
                      

         <article id="contenido2"></article>  
 
                      </div><!--panel-body-->
                       </div>
                       
                       
                       
                       <div id="tabs-3">               
                      <div class="panel-body"><!-- panel-body -->  
                      

         <article id="contenido3"></article>  
 
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

 <script type="text/javascript" src="js/jquery-ui.min.js"></script> <!--Aqui checar  -->




 
    
        <!-- fin del js calendario -->

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
</html>
<?php
 }
 else
 {
session_destroy();
 header("Location:index.html"); 
 }
 ?>