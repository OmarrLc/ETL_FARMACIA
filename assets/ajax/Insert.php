<?php
 $archivo = fopen("CamposSelecionados.json","a+");
 fwrite($archivo, 
         json_encode($_POST) . "\n"
                );  
 fclose($archivo);
 echo "Registro guardado exitosamente";
?>