$(document).ready(function(){

  $("#cancelar").click(function() {
    $("form")[0].reset();
  });

  $("#reset1").click(function() {
    $("form")[0].reset();
  });

  $('#nombrep').val("");
  $("#nump").autocomplete({
    source: "mas.php",
    //minLength: 1,
    select: function(event, ui) {
      //$('#state_id').val(ui.item.id);
      $('#nombrep').val(ui.item.nombrep);
      $('#clientec').val(ui.item.clientec);
      $('#nombrecli').val(ui.item.nombrecli);
    }
  });

  $("#num_nombrepre_clientep").autocomplete({
    source: "bus_nompredio.php",
    minLength: 1
  });
    
  $("#referencia1").click(function(evento){
      if ($("#referencia1").attr("checked"))
        $("#formularioreferencia").css("display", "block");
      else
        $("#formularioreferencia").css("display", "none");
    });

    $.ajax("libs/mostrarestados.php",{
      cache: false,
      success: function(data, textStatus, jqXHR) {
        $("#estado2").html(data).change(function(){
          $("#local2").html('<option value=""> Selecciona una Localidad </option>');
          if($("#estado2 option:selected").attr('value')!=""){
            $("#municipio2").html('');
            $.ajax("libs/mostrarmunicipios.php?estado=" + $("#estado2 option:selected").attr('value'),{
              cache: false,
              success: function(data, textStatus, jqXHR) {
                $("#municipio2").html(data).change(function(){
                  if($("#municipio2 option:selected").attr('value')!=""){
                    $("#local2").html('');
                    $.ajax("libs/mostrarlocalidades.php?municipio=" + $("#municipio2 option:selected").attr('value'),{
                      cache: false,
                      success: function(data, textStatus, jqXHR) {
                        $("#local2").html(data);
                      },
                      dataType:"html"
                    });
                  }
                });
              },
              dataType:"html"
            });
          }
        });
      },
      dataType:"html"
    });
  });