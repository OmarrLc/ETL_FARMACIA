/**************************registro correo peticion ajax**************************************************************/      
$("#btnConsulta").click(function(){
    var parametros= "tabla="+$("#cbx_TablaD").val()
    console.log("Informacion a enviar: " + parametros);
    $.ajax({
        url:"../assets/ajax/cargarconsulta.php",
        method:"Post",
        data:parametros,
        dataType:"html",
        success:function(respuesta){ 
            console.log("El servidor hizo la peticion"+ respuesta);
            
        },
        error:function(respuesta){ 
            console.log("ocurre un error  ");
             
            
        }
    });
  });