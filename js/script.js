function fn_cantidad(){
				cantidad = $("#grilla tbody").find("tr").length;
				$("#span_cantidad").html(cantidad);
			};
            
           function fn_agregar(){

            if($("#registro").val()!=""){
              if($("#sc").val()!=""){
                if($("#sm").val()!=""){
                  if($("#especie").val()!=""){
                    if($("#plantas").val()!=""){
                      if($("#edad").val()!=""){
                cadena = "<tr>";
                cadena = cadena + "<td>" + $("#registro").val() + "</td>";
                cadena = cadena + "<td>" + $("#sc").val() + "</td>";
                cadena = cadena + "<td>" + $("#sm").val() + "</td>";
                cadena = cadena + "<td>" + $("#especie").val() + "</td>";
				        cadena = cadena + "<td>" + $("#plantas").val() + "</td>";
				        cadena = cadena + "<td>" + $("#edad").val() + "</td>";
                cadena = cadena + "<td><a class='elimina'><img src='images/delete.png' /></a></td>";
                $("#grilla tbody").append(cadena);
			
                /*
                    aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar.php", {ide_usu: $("#valor_ide").val(), nom_usu: $("#valor_uno").val()});
                */
				   document.maguey.registro.value="";
 				   document.maguey.sc.value="";
 				   document.maguey.sm.value="";
 				   document.maguey.especie.value="";
  				 document.maguey.plantas.value="";
  				 document.maguey.edad.value="";
           fn_dar_eliminar();
				   fn_cantidad();
           alert("Registro Agregado");
                 }
                 else
                 {
                 alert("Ingrese la edad");
                 return false;
                 }
                }
                else
                {
                alert("Ingrese un numero de plantas");
                return false;
                }
               }
               else
               {
               alert("Seleccione una especie");
               return false;
               }
              }
              else
              {
              alert("Ingrese una distancia entre plantas");
              return false;
              }
             }
             else
             {
             alert("Ingrese una distancia entre surcos");
             return false;
             }
            }
            else
            {
            alert("Seleccione un registro ");
            return false;
            }
            };
			
			

            function fn_dar_eliminar(){
                $("a.elimina").click(function(){
                    id = $(this).parents("tr").find("td").eq(0).html();
                    respuesta = confirm("Desea Eliminar el Registro: " + id);
                    if (respuesta){
                        $(this).parents("tr").fadeOut("normal", function(){
                            $(this).remove();
                            alert("Registro " + id + " Eliminado")
                            /*
                                aqui puedes enviar un conjunto de datos por ajax
                                $.post("eliminar.php", {ide_usu: id})
                            */
                        })
                    }
                });
            };


function upperCase() {
   var x=document.getElementById("referencia2").value
   document.getElementById("referencia2").value=x.toUpperCase()
   var x=document.getElementById("referenciau").value
   document.getElementById("referenciau").value=x.toUpperCase()
   var x=document.getElementById("campo").value
   document.getElementById("campo").value=x.toUpperCase()

}

