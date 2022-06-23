<?php
session_start();
include("../php/registro/conexion.php");


$user=$_POST['user'];
$pass=$_POST['pass'];

$consulta="SELECT id_usuario,nombre,nivel FROM usuarios WHERE usuario='$user' AND pass='$pass' AND ACTIVO=1";

$res=mysqli_query($conexion,$consulta)or die(mysql_error());

if(mysqli_num_rows($res)>0) {
  while ( $row=mysqli_fetch_array($res)) {
  $_SESSION['id_usuario']=$row['id_usuario'];
  $_SESSION['nombre']=$row['nombre'];
  $_SESSION['nivel']=$row['nivel'];
}
    }
      else
	  {
      echo 1;
	  }
	   mysqli_close($conexion);
?>

