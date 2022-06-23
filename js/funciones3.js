// JavaScript Document

$(document).ready(function(){
    verlistado3()
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
})
function verlistado3(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/listar3.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido3").html(data);
            });
}