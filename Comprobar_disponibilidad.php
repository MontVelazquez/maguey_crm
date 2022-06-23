<?php
sleep(1);

include ("php/registro/conexion.php");

if($_REQUEST) {
    $numgp = $_REQUEST['numgp'];
    $sql="Select * from cextracciones2 where extraccion = '$numgp'";
	
if ($result=$conexion->query($sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount); mostrar resultado
 if($rowcount > 0)
        echo '<div id="Error">Número de guia ya registrada</div>';
    else
        echo '<div id="Success">Disponible</div>';
}
  }



?>