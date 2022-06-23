<?php
include('../php/registro/conexion.php');

 $municipio= trim($_REQUEST['municipio']);
 $sql = "SELECT id,localidad FROM  localidades where MunicipioID='$municipio' ";

                 $res=mysqli_query($conexion,$sql)or die(mysql_error());

                     
                 while($fila=mysqli_fetch_array($res)){
                  
                  
                    echo "<option value='".$fila['id']."'> ".$fila['localidad']." </option>";
                  

           
                                                     }
                           mysqli_close($conexion);

                          
?>