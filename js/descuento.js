var predionum = '';
var nombrepre= '';
var RECIBO = '0';
$(document).ready(function() {
  putTable();
  /*****************************************************************************************************************************/
  $("#num").autocomplete({
    source: "bus_nompredio.php",
    minLength: 1,
    maxRows: 15,
    select: function(e, ui) {
       predionum = ui.item.value;
      putTable();
      $("#especies").load("../bus_especie2.php", function() {
        $("#especies").append($('<option selected></option>').val("0").html("TODAS"));
        var options = $('#especies option' );
        $( options[ 19 ] ).insertBefore( $( options[ 0 ] ) );
      });
    },change: function (event, ui) {
      if (!ui.item) {
        this.value = '';
        predionum = '';
      }
    }
  }).keypress(function(e) {
    if (e.keyCode === 13) {
      return false;
    }
  });
  /***************************************************************************************/
 
  /***************************************************************************************/
});


var predionum = '';

	       	$(function() {
		
			
			$('#nombrepre').val("");
			$("#num").autocomplete({
				source: "bus_predionum.php",
				//minLength: 1,
				select: function(event, ui) {
					
					//$('#state_id').val(ui.item.id);
					$('#nombrepre').val(ui.item.nombrepre);
					$('#clientep').val(ui.item.clientep);
					$('#nombrecc').val(ui.item.nombrecc);
					
	
					
					
				}
			});
			
			$("#num_nombrepre_clientep").autocomplete({
				source: "bus_nompredio.php",
				minLength: 1
			});
		});		
      
        