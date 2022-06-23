
$(document).ready(function(){
    verlistadoexcel()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
})
function verlistadoexcel(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/listarexcel.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenidoexcel").html(data);
            });
}

