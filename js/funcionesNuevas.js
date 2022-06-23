
$( document ).ready(function() {
  //ocultamos los componentes
 $('#alertaerror,#alertacargando').hide();

 //boton para ingresar
     $("#BtnIngresar").click(function(){

           

        username=$("#usuario").val();
        password=$("#pass").val();
        password2 = SHA1(password);

            $.ajax({
            type: "POST",
            url: "libs/login.php",
			data: "user="+username+"&pass="+password2,
            success: function(data){
              if(data==1)
              {
              $('#alertacargando').hide();
              $('#alertaerror').show();
              $("#usuario").val("");
              $("#pass").val("");

              }
              else
              {
              $(location).attr('href','inicio.php');
              }
             },
            beforeSend:function()
			{
			$('#alertaerror').hide();
            $('#alertacargando').show();
            }
            });
       });

     });
    









function myFunction(e) {
    // PARA VER QUE TECLA ESTA PRESIONADO 
    if (e.keyCode == 13) {
           

        username=$("#usuario").val();
        password=$("#pass").val();
        password2 = SHA1(password);

            $.ajax({
            type: "POST",
            url: "libs/login.php",
      data: "user="+username+"&pass="+password2,
            success: function(data){
              if(data==1)
              {
              $('#alertacargando').hide();
              $('#alertaerror').show();
              $("#usuario").val("");
              $("#pass").val("");

              }
              else
              {
              $(location).attr('href','inicio.php');
              }
             },
            beforeSend:function()
      {
      $('#alertaerror').hide();
            $('#alertacargando').show();
            }
            });
    }
}
