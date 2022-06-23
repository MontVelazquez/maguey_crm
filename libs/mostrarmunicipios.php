<?php
include('../php/registro/conexion.php');

 $estado= trim($_REQUEST['estado']);
 $sql = "SELECT id,nombre FROM  municipios where estado='$estado' ";

                 $res=mysqli_query($conexion,$sql)or die(mysql_error());

                     
                 while($fila=mysqli_fetch_array($res)){
                  
                  
                    echo "<option value='".$fila['id']."'> ".$fila['nombre']." </option>";
                  

           
                                                     }
                           mysqli_close($conexion);

                          
?>