$("#btnMatr").click(function(){
    var parametros= "idSecion="+$("#cbx_Seccion").val();
    alert("Informacion a enviar: " + parametros);
  
    $.ajax({
        url:"../ajax/controlador.php",
        method:"POST",
        data:parametros,
        dataType:"html",
        success:function(respuesta){ 
            console.log("El servidor hizo la peticion y su respuesta es:  "+respuesta);
            if(respuesta==1){
              console.log("agregada corectamente");
              location.reload();
            }else
            console.log('hubo algun problema en el procedimiento almacenado');
        },
        error:function(error){
            console.log(error);
        },
        
    });
  }); 