
$(document).ready(function(){
  $("#btn_nueva_localidad").hide();
    verlistado()

 
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO



  $("#btn_nueva_localidad").click(function() { 
    $("#ModalRutaNueva").modal("show");
  });



  $("#BtnNuevaLocalidad").click(function() {
  if ( $('#municipio').val()!="" )
  {
     if ( $('#TxtNuevaLocalidad').val()!="" ){
     var localidad = $('#TxtNuevaLocalidad').val();
     var id_municipio = $('#municipio').val();
           var parametros = {
           "localidad":localidad,
           "id_municipio" : id_municipio
                            };
            $.ajax({
                data:  parametros,
                url:   'libs/nuevalocalidad.php',
                type:  'post',
                 });      
        alert("Localidad guardada");
        $('#TxtNuevaLocalidad').val("");
        $("#ModalRutaNueva").modal("hide");
        buscarLocalidades();
        }
       else{
        alert("No ha escrito una localidad");
        }
    }
    else
    {
    alert("No ha seleccionado un minicipio");
    }
    return false; 
      
  });






    
})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              var randomnumber=Math.random()*11;
            $.post("libs/listar.php", {
                randomnumber:randomnumber
            }, function(data){
              $("#contenido").html(data);
            });
}

