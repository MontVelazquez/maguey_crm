<?php 
include('../php/registro/conexion.php');
$listado=

"SELECT  YEAR(fecha_paraje) as anio, paraje, id_paraje from paraje group by anio order by anio desc";
 
$listar= $conexion->query($listado);

?>

 <script type="text/javascript" language="javascript" src="js/jslistado4.js"></script>



            <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista4" >
                <thead>
                    <tr>
                      
                        <th align="center">AÑO</th>
                        <th align="center">CONSTANCIA</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                  <tbody>
                    <?php

                   while($reg=mysqli_fetch_array($listar))
                   {
                               echo '<tr>';
                               
							    echo '<td align="center">'.$reg['anio'].'</td>';
							  /* echo '<td>'.'<img src="images/pdf-icon.png"/>'.'</td>';*/
							  echo "<td><a href=\"reporteexcel.php?id=".$reg['anio']."\" target='_blank'><img src='images/pdf-icon.png'></a></td>";
							   
                               echo '</tr>';
                     
                        }
		
                    ?>
                <tbody>
            </table>
