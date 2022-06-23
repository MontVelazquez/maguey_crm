function fn_cantidadep(){
				can = $("#grillitap tbody").find("tr").length;
				$("#span_cantidad").html(can);
			};
            
           function fn_agregarep(){
			   

            if($("#especiesp").val()!=""){
              
                if($("#desp").val()!=""){
                  
                cadena = "<tr>";
                cadena = cadena + "<td>" + $("#especiesp").val(); +"</td>";
				cadena = cadena + "<td>" + $("#edadsp").val() + "</td>";
                cadena = cadena + "<td>" + $("#plantassp").val() + "</td>";
                cadena = cadena + "<td>" + $("#desp").val() + "</td>";
				 cadena = cadena + "<td>" + $("#resultadop").val() + "</td>";
                
                cadena = cadena + "<td><a class='eliminar'><img src='images/delete.png' /></a></td>";
                $("#grillitap tbody").append(cadena);
			
                /*
                    aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar.php", {ide_usu: $("#valor_ide").val(), nom_usu: $("#valor_uno").val()});
                */
				   document.magueysip.especiesp.value="";
				   document.magueysip.edadsp.value="";
 				   document.magueysip.plantassp.value="";
 				   document.magueysip.desp.value="";
				   document.magueysip.resultadop.value="";
 				  
           fn_dar_eliminarep();
				   fn_cantidadep();
           alert("Registro Agregado");
                 }
                
                
               else
               {
               alert("Ingrese un descuento");
               return false;
               }
			     }
			   else
                {
                alert("Seleccione una especie");
                return false;
                }
              
             
            
            };
			
			

            function fn_dar_eliminarep(){
                $("a.eliminar").click(function(){
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



