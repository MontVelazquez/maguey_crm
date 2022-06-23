<?php


  include("../php/registro/conexion.php");



      $no_asociado=$_POST['no_asociado'];
      $nombre_o_razon = $_POST['nombre_o_razon'];
      $rfc=$_POST['rfc'];
      $calle=$_POST['calle'];
      $no_exterior=$_POST['no_exterior'];
      $localidad = $_POST['localidad'];
      $cp=$_POST['cp'];
      $municipio=$_POST['municipio'];
      $estado=$_POST['estado'];
      $telefono=$_POST['telefono'];
      $correo=$_POST['correo'];
      $repre_legal = $_POST['repre_legal'];
      
   

    echo  $consulta="INSERT INTO clientes(no_cliente, nombre, rfc, calle, noexterior, colonia, municipio, cp, telefono, correo, rep_legal) VALUES ('$no_asociado', '$nombre_o_razon','$rfc','$calle','$no_exterior','$localidad','$municipio','$cp','$telefono','$correo','$repre_legal')";
      $res=mysqli_query($conexion,$consulta)or die(mysql_error());
      
     
      
    
      mysqli_close($conexion);
?>