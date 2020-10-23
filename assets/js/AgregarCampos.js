/**************************registro correo peticion ajax**************************************************************/      
$("#btnAgregarCampo").click(function(){
    var parametros= "tabla="+$("#cbx_Tabla").val()+"&campo="+
    $("#cbx_Campo").val()+"&tipodato="+
    $("#cbx_TipoDato").val()+"&operacion="+
    $("#cbx_Operacion").val()+"&campo2="+$("#cbx_Campo2").val()+"&tabla2="+$("#cbx_Tabla2").val()
    console.log("Informacion a enviar: " + parametros);
    $.ajax({
        url:"../assets/ajax/insert.php",
        method:"Post",
        data:parametros,
        dataType:"html",
        success:function(respuesta){ 
            console.log("El servidor hizo la peticion  "+respuesta);
           // location.reload();
        },
        error:function(respuesta){ 
            console.log("ocurre un error  ");
             
            
        }
    });
  }); 


