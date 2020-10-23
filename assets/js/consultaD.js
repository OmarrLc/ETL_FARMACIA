$("#btnMostrar").click(function(){
    var parametros= "tabla="+$("#cbx_TablaD").val()
    console.log("Informacion a enviar: " + parametros);
    
    $.ajax({
        url:"../assets/ajax/consultaD.php",
        method:"Post",
        data:parametros,
        dataType:"html",
        success:function(respuesta){ 
            console.log("El servidor hizo la peticion  "+respuesta);
            $("#consultaM").html(respuesta);
           // location.reload();
        },
        error:function(respuesta){ 
            console.log("ocurre un error  ");
             
            
        }
    });
  }); 
