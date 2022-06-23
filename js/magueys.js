function fn_cantidade(){
				can = $("#grillita tbody").find("tr").length;
				$("#span_cantidad").html(can);
			};
            
           function fn_agregare(){
			   

            if($("#especies").val()!=""){
              
                if($("#des").val()!=""){
                  
                cadena = "<tr>";
                cadena = cadena + "<td>" + $("#especies").val(); +"</td>";
				cadena = cadena + "<td>" + $("#edads").val() + "</td>";
                cadena = cadena + "<td>" + $("#plantass").val() + "</td>";
                cadena = cadena + "<td>" + $("#des").val() + "</td>";
				 cadena = cadena + "<td>" + $("#resultado").val() + "</td>";
                
                cadena = cadena + "<td><a class='eliminar'><img src='images/delete.png' /></a></td>";
                $("#grillita tbody").append(cadena);
			
                /*
                    aqui puedes enviar un conunto de tados ajax para agregar al usuairo
                    $.post("agregar.php", {ide_usu: $("#valor_ide").val(), nom_usu: $("#valor_uno").val()});
                */
				   document.magueysi.especies.value="";
				   document.magueysi.edads.value="";
 				   document.magueysi.plantass.value="";
 				   document.magueysi.des.value="";
				   document.magueysi.resultado.value="";
 				  
           fn_dar_eliminare();
				   fn_cantidade();
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
			
			

            function fn_dar_eliminare(){
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



