<?php
include ("php/registro/conexion.php");

$fechahoy = date("Y-m-d"); 
$fecha2 = new DateTime($fechahoy);

 $sql = "SELECT * FROM  existenciaplanta ";
 $res=mysqli_query($conexion,$sql)or die(mysql_error());
                
       while($fila=mysqli_fetch_array($res)){

           $fecha1 = new DateTime($fila['fecha_registro']);
           $fecha = $fecha1->diff($fecha2);
           $diferencia=$fecha->y;

              if($diferencia>0){
                   $sql2 = "SELECT anios FROM  anios_sumados WHERE id_plantas='$fila[id_plantas]'";
				   
				   
                   $res2=mysqli_query($conexion,$sql2)or die(mysqli_error($conexion));

                      while($fila2=mysqli_fetch_array($res2)){ 

                        if($diferencia!=$fila2['anios'])
                           {
               
                              $upd_anios = "UPDATE anios_sumados SET anios=$diferencia where id_plantas='$fila[id_plantas]'";
                              mysqli_query($conexion,$upd_anios)or die(mysqli_error());

                              $upd_edad = "UPDATE existenciaplanta SET edad=edad+1 where id_plantas='$fila[id_plantas]'";
                              mysqli_query($conexion,$upd_edad)or die(mysqli_error());

                             //update anios sumados
                             //update a edad existencia plantas
                              
                            }
                                                            }

             $total = mysqli_num_rows(mysqli_query($conexion,$sql2));
             if($total==0){
           
             $sql3 = "INSERT INTO anios_sumados (id_plantas,anios) VALUES(  '$fila[id_plantas]',$diferencia)";
             mysqli_query($conexion,$sql3)or die(mysqli_error($conexion));    

             $upd_edad2 = "UPDATE existenciaplanta SET edad=edad+1 where id_plantas='$fila[id_plantas]'";
             mysqli_query($conexion,$upd_edad2)or die(mysqli_error($conexion));
                          //update a edad existencia plantas
                           }


                               }




   
                                          }
                                                  
                 mysqli_close($conexion);






?>

