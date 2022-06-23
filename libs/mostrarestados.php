<?php
include('../php/registro/conexion.php');


 $sql = "SELECT clave,nombre FROM  estados ";

                 $res=mysqli_query($conexion,$sql)or die(mysql_error());

                     
                 while($fila=mysqli_fetch_array($res)){
                  
                  
                    echo "<option value='".$fila['clave']."'> ".$fila['nombre']." </option>";
                  

           
                                                     }
                           mysqli_close($conexion);

                          
?>