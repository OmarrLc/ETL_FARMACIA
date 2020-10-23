<?php 
//error_reporting(0);
require '../../php/conexion.php';
require '../../php/conexionOLAP.php';


    $archivo = fopen("CamposSelecionados.json","r");
    $archivo1 = fopen("datosPedir.json","a+");
    $linea="";
    $usuarios=array();
    while(($linea = fgets($archivo))){
        $registro = json_decode($linea,true);
        echo  $registro['operacion'].' ';

        switch ($registro['operacion']) {
            case "Concatenar":
            $Cextraer= 'concat('.$registro['tabla'].'.'.$registro['campo'].','.$registro['tabla2'].'.'.$registro['campo2'].') cc';
                break;
            case "Mayuscula":
            
            $Cextraer= 'upper('.$registro['campo'].')' .$registro['campo'].' ';
                break;
            case "Minuscula":
            $Cextraer= 'lower('.$registro['campo'].') ' .$registro['campo'].' ';
            break;
            case "DatePartDia":
            $Cextraer= 'DATENAME(WEEKDAY,'.$registro['campo'].') dia';
            break;
            case "DatePartMes":
            $Cextraer= 'DATEPART(MONTH,'.$registro['campo'].') mes';
            break;
            case "DatePartAnio":
            $Cextraer= 'DATEPART(YEAR,'.$registro['campo'].') anio';
            break;
            case "DatePartTri":
            $Cextraer= 'DATEPART(QUARTER,'.$registro['campo'].') trimestre';
            break;
            case "DatePartSem":
            $Cextraer= 'DATEPART(WEEK,'.$registro['campo'].') semana';
            break;
            default:
            $Cextraer=$registro['tabla'].'.'.$registro['campo'];
        }
        /*fin del switch */
        echo  $Cextraer;


        fwrite($archivo1, 
            $Cextraer. ","
                ); 

 
    }
    /*fin del while */

      

    fwrite($archivo1, 
     "'a':\n"
                ); 


    
    
                
                
//Campos de cerrar
fclose($archivo);//cerramos el archivo CamposSelecionados.txt
fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
//unlink("datosPedir.json");
//unlink("CamposSelecionados.json");   
$archivo1 = fopen("datosPedir.json","r");
$consulta ;


switch ($_POST["tabla"]) {

    case "Laboratorio":

    while(($linea = fgets($archivo1))){ //Lee una linea.
        $partes = explode(":", $linea); //$partes es un arreglo
        echo'haciendo consulta ';
        $consulta= "select ".$partes[0]." from laboratorio";
        break;
    }
    echo $consulta;
    
    $r=sqlsrv_query($conn,$consulta);
    while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
        echo $row['codigoLaboratorio']."   ".$row['nombreLaboratorio'];
        
        $myparams['Id'] =$row['codigoLaboratorio'];
        $myparams['nombreLaboratorio'] = $row['nombreLaboratorio'];
        $myparams['mensaje'] = '';
          
        $procedure_params = array(
              array(&$myparams['Id'], SQLSRV_PARAM_IN),
              array(&$myparams['nombreLaboratorio'], SQLSRV_PARAM_IN),
              array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)
              );
  
  
        $sql = "exec SP_InsertarLaboratorio @Id=?,@nombreLaboratorio=?,@mensaje=?";
        $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);
  
        if( !$stmt ) {
              die( print_r( sqlsrv_errors(), true));
              }
  
              if(sqlsrv_execute($stmt)){
                while($res = sqlsrv_next_result($stmt)){
                  
                }
                print_r($myparams);
              }else{
                die( print_r( sqlsrv_errors(), true));
              }
 /*
        
        $consultaInsert="insert into laboratorio values (".$row['codigoLaboratorio'].",'".$row['nombreLaboratorio']."');";
        sqlsrv_query($conn2,$consultaInsert);
        */
       
    }
    fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
    unlink("datosPedir.json");
    unlink("CamposSelecionados.json");
    break;

    case "Empleado":
    while(($linea = fgets($archivo1))){ //Lee una linea.
        $partes = explode(":", $linea); //$partes es un arreglo
        echo'haciendo consulta ';
        $consulta= " select ".$partes[0]." d from empleado 
        inner join persona on persona.codigoPersona=empleado.Persona_codigoPersona;";
        break;
    }
    echo $consulta;
    $r=sqlsrv_query($conn,$consulta);
    while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
       echo $row['codigoEmpleado']."   ".$row['cc'].'    <------->';

       $myparams['Id'] =$row['codigoEmpleado'];
       $myparams['nombreEmpleado'] = $row['cc'];
       $myparams['mensaje'] = '';
         
       $procedure_params = array(
             array(&$myparams['Id'], SQLSRV_PARAM_IN),
             array(&$myparams['nombreEmpleado'], SQLSRV_PARAM_IN),
             array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)
             );
 
 
       $sql = "exec SP_InsertarEmpleado @Id=?,@nombreEmpleado=?,@mensaje=?";
       $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);
 
       if( !$stmt ) {
             die( print_r( sqlsrv_errors(), true));
             }
 
             if(sqlsrv_execute($stmt)){
               while($res = sqlsrv_next_result($stmt)){
                 
               }
               print_r($myparams);
             }else{
               die( print_r( sqlsrv_errors(), true));
             }


      /*  $consultaInsert="insert into Empleado values (".$row['codigoEmpleado'].",'".$row['cc']."');";
        sqlsrv_query($conn2,$consultaInsert);*/
    }
    fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
    unlink("datosPedir.json");
    unlink("CamposSelecionados.json");
    break;

    case "clientes":
      while(($linea = fgets($archivo1))){ //Lee una linea.
        $partes = explode(":", $linea); //$partes es un arreglo
        echo'haciendo consulta ';
        $consulta= " select ".$partes[0]."  from cliente
        inner join persona on persona.codigoPersona=cliente.Persona_codigoPersona;";
        break;
    }
    echo $consulta;
    $r=sqlsrv_query($conn,$consulta);
    while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
       echo $row['codigoCliente']."   ".$row['cc'].'    <------->';

       $myparams['Id'] =$row['codigoCliente'];
       $myparams['nombreCliente'] = $row['cc'];
       $myparams['mensaje'] = '';
         
       $procedure_params = array(
             array(&$myparams['Id'], SQLSRV_PARAM_IN),
             array(&$myparams['nombreCliente'], SQLSRV_PARAM_IN),
             array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)
             );
 
 
       $sql = "exec SP_InsertarCliente @Id=?,@nombreCliente=?,@mensaje=?";
       $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);
 
       if( !$stmt ) {
             die( print_r( sqlsrv_errors(), true));
             }
 
             if(sqlsrv_execute($stmt)){
               while($res = sqlsrv_next_result($stmt)){
                 
               }
               print_r($myparams);
             }else{
               die( print_r( sqlsrv_errors(), true));
             }


/*
        $consultaInsert="insert into clientes values (".$row['codigoCliente'].",'".$row['cc']."');";
        sqlsrv_query($conn2,$consultaInsert);*/
    }
    fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
    unlink("datosPedir.json");
    unlink("CamposSelecionados.json");
    break;

    case "producto":
       while(($linea = fgets($archivo1))){ //Lee una linea.
        $partes = explode(":", $linea); //$partes es un arreglo
        echo'haciendo consulta ';
        $consulta= "select ".$partes[0]." from producto 
        inner join categoriaproducto on categoriaproducto.codigoCategoria=producto.CategoriaProducto_codigoCategoria;";
        break;
    }
    echo $consulta;
    $r=sqlsrv_query($conn,$consulta);
    while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
       echo $row['codigoProducto']."   ".$row['nombre']."   "
       .$row['descripcion'];

       $myparams['Id'] =$row['codigoProducto'];
       $myparams['nombreProducto'] = $row['nombre'];
       $myparams['nombreCategoria'] = $row['descripcion'];
       $myparams['mensaje'] = '';
         
       $procedure_params = array(
             array(&$myparams['Id'], SQLSRV_PARAM_IN),
             array(&$myparams['nombreProducto'], SQLSRV_PARAM_IN),
             array(&$myparams['nombreCategoria'], SQLSRV_PARAM_IN),
             array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)
             );
 
 
       $sql = "exec SP_InsertarProducto @Id=?,@nombreProducto=?,@nombreCategoria=?,@mensaje=?";
       $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);
 
       if( !$stmt ) {
             die( print_r( sqlsrv_errors(), true));
             }
 
             if(sqlsrv_execute($stmt)){
               while($res = sqlsrv_next_result($stmt)){
                 
               }
               print_r($myparams);
             }else{
               die( print_r( sqlsrv_errors(), true));
             }



       /*
       echo $consultaInsert="insert into producto values (".$row['codigoProducto'].",'".$row['nombre']."','".$row['descripcion']."');";
        sqlsrv_query($conn2,$consultaInsert);*/
    }
    fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
    unlink("datosPedir.json");
    unlink("CamposSelecionados.json");
    break;
    case "sucursal":
    
    while(($linea = fgets($archivo1))){ //Lee una linea.
        $partes = explode(":", $linea); //$partes es un arreglo
        echo'haciendo consulta ';
        $consulta= "select ".$partes[0]." from sucursal";
        break;
    }
    echo $consulta;
    
    $r=sqlsrv_query($conn,$consulta);
    while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
        echo $row['codigoSucursal']."   ".$row['nombre']."   ".$row['direccion'];

        
       $myparams['Id'] =$row['codigoSucursal'];
       $myparams['nombreSucursal'] = $row['nombre'];
       $myparams['direccion'] = $row['direccion'];
       $myparams['mensaje'] = '';
         
       $procedure_params = array(
             array(&$myparams['Id'], SQLSRV_PARAM_IN),
             array(&$myparams['nombreSucursal'], SQLSRV_PARAM_IN),
             array(&$myparams['direccion'], SQLSRV_PARAM_IN),
             array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)
             );
 
 
       $sql = "exec SP_InsertarSucursal @Id=?,@nombreSucursal=?,@direccion=?,@mensaje=?";
       $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);
 
       if( !$stmt ) {
             die( print_r( sqlsrv_errors(), true));
             }
 
             if(sqlsrv_execute($stmt)){
               while($res = sqlsrv_next_result($stmt)){
                 
               }
               print_r($myparams);
             }else{
               die( print_r( sqlsrv_errors(), true));
             }
        
        
        /*echo $consultaInsert="insert into sucursal values (".$row['codigoSucursal'].",'".$row['nombre']."','".$row['direccion']."');";
        sqlsrv_query($conn2,$consultaInsert);*/
    }
    fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
    unlink("datosPedir.json");
    unlink("CamposSelecionados.json");

    break;
  
    case "Tiempo":

    while(($linea = fgets($archivo1))){ //Lee una linea.
      $partes = explode(":", $linea); //$partes es un arreglo
      echo'<---> haciendo consulta <--->';
      $consulta= "select CONVERT(varchar, fecha) fc, ".$partes[0]." from factura";
      break;
  }
  echo $consulta;
  
  $r=sqlsrv_query($conn,$consulta);
  while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
      echo  $row['fc']."   ".$row['mes']."   ".$row['trimestre']."   ".$row['anio']."   ".$row['semana'].' <----respuesta----->';
/*
      $myparams['Id'] =$row['fc'];
      $myparams['anio'] = $row['anio'];
      $myparams['mes'] = $row['mes'];
      $myparams['semana'] = $row['semana'];
      $myparams['trimestre'] = $row['trimestre'];
      $myparams['dia'] = $row['dia'];
      $myparams['mensaje'] = '';
        
       $procedure_params = array(
          array(&$myparams['Id'],SQLSRV_PARAM_IN),
          array(&$myparams['anio'],SQLSRV_PARAM_IN),
          array(&$myparams['mes'],SQLSRV_PARAM_IN),
          array(&$myparams['semana'],SQLSRV_PARAM_IN),
          array(&$myparams['trimestre'],SQLSRV_PARAM_IN),
          array(&$myparams['dia'],SQLSRV_PARAM_IN),
          array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)   
          );
 
       $sql = "exec SP_InsertarTiempo @Id=?,@anio=?,@mes=?,@semana=?,@trimestre=?,@dia=?,@mensaje=?";
       $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);
 
       if( !$stmt ) {
             die( print_r( sqlsrv_errors(), true));
             }
 
             if(sqlsrv_execute($stmt)){
               while($res = sqlsrv_next_result($stmt)){
                 
               }
               print_r($myparams);
             }else{
               die( print_r( sqlsrv_errors(), true));
             }
      */
      echo $consultaInsert="insert into tiempo values ('".$row['fc']."','".$row['anio']."','".$row['mes']."','".$row['semana']."','".$row['trimestre']."','".$row['dia']."');";
      sqlsrv_query($conn2,$consultaInsert);
  }
  fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
  unlink("datosPedir.json");
  unlink("CamposSelecionados.json");


    break;

    
    case "hechosVentas":

    while(($linea = fgets($archivo1))){ //Lee una linea.
        $partes = explode(":", $linea); //$partes es un arreglo
        echo'<---> haciendo consulta <--->';
        $consulta= "select ".$partes[0].",CONVERT(varchar, fecha) fecha,SUM(producto.precioVenta*facturadetalle.cantidad) 
        totalVentas,(productoentrada.cantidad-productosalida.cantidad) existencia, 
        (select Count(codigoProducto) from producto 
        inner join productoentrada  on productoentrada.Producto_codigoProducto=producto.codigoProducto
        inner join productosalida on productosalida.Producto_codigoProducto=producto.codigoProducto
        where producto.fechaVencimiento<GETDATE() and (productoentrada.cantidad-productosalida.cantidad)>0) cantidadProductVencido ,
         (SUM(producto.precioVenta*facturadetalle.cantidad)*0.02) puntosAcumulados, count(medicamentos.codigoMedicamento) cantidadMed from factura
        inner join facturadetalle facturadetalle on facturadetalle.Factura_codigoFactura=factura.codigoFactura
        inner join cliente on cliente.codigoCliente=factura.Cliente_codigoCliente
        inner join producto on producto.codigoProducto=facturadetalle.Producto_codigoProducto
        inner join medicamentos on medicamentos.codigoProducto=producto.codigoProducto
        inner join estante_medicamento on estante_medicamento.codigoMedicamento=medicamentos.codigoMedicamento
        inner join estante on estante.codigoEstante=estante_medicamento.codigoEstante
        inner join productoentrada on productoentrada.Producto_codigoProducto=producto.codigoProducto
        inner join productosalida on productosalida.Producto_codigoProducto=producto.codigoProducto
        group by factura.codigoFactura,facturadetalle.Producto_codigoProducto,factura.Empleado_codigoEmpleado,factura.fecha
        , factura.Cliente_codigoCliente,estante.codigoSucursal,medicamentos.codigoLaboratorio,productoentrada.cantidad,productosalida.cantidad;";
        break;
    }
    echo $consulta;
    
    $r=sqlsrv_query($conn,$consulta);
    while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
        
      $myparams['IdP'] =$row['Producto_codigoProducto'];
    $myparams['IdE'] =$row['Empleado_codigoEmpleado'];
    $myparams['IdT'] =$row['fecha'];
    $myparams['IdC'] =$row['Cliente_codigoCliente'];
    $myparams['IdS'] =$row['codigoSucursal'];
    $myparams['IdL'] =$row['codigoLaboratorio'];
    $myparams['tVentas'] = $row['totalVentas'];
    $myparams['existencia'] = $row['existencia'];
    $myparams['pVencido'] = $row['cantidadProductVencido'];
    $myparams['pAcumulados'] = $row['puntosAcumulados'];
    $myparams['cMedicamento'] = $row['cantidadMed'];
    $myparams['mensaje'] = '';
      
     $procedure_params = array(
        array(&$myparams['IdP'],SQLSRV_PARAM_IN),
        array(&$myparams['IdE'],SQLSRV_PARAM_IN),
        array(&$myparams['IdT'],SQLSRV_PARAM_IN),
        array(&$myparams['IdC'],SQLSRV_PARAM_IN),
        array(&$myparams['IdS'],SQLSRV_PARAM_IN),
        array(&$myparams['IdL'],SQLSRV_PARAM_IN),
        array(&$myparams['tVentas'],SQLSRV_PARAM_IN),
        array(&$myparams['existencia'],SQLSRV_PARAM_IN),
        array(&$myparams['pVencido'],SQLSRV_PARAM_IN),
        array(&$myparams['pAcumulados'],SQLSRV_PARAM_IN),
        array(&$myparams['cMedicamento'],SQLSRV_PARAM_IN),
        array(&$myparams['mensaje'], SQLSRV_PARAM_OUT)   
        );

     $sql = "exec SP_InsertarHechos @IdP=?,@IdE=?,@IdT=?,@IdC=?,@IdS=?,@IdL=?,@tVentas=?,@existencia=?,@pVencido=?,@pAcumulados=?,@cMedicamento=?,@mensaje=?";
     $stmt = sqlsrv_prepare($conn2, $sql, $procedure_params);

     if( !$stmt ) {
           die( print_r( sqlsrv_errors(), true));
           }

           if(sqlsrv_execute($stmt)){
             while($res = sqlsrv_next_result($stmt)){
               
             }
             print_r($myparams);
           }else{
             die( print_r( sqlsrv_errors(), true));
           }
      
      
      
      
      //echo  $row['fc']."   ".$row['mes']."   ".$row['trimestre']."   ".$row['anio']."   ".$row['semana'].' <----respuesta----->';
        /*echo $consultaInsert="insert into hechosVentas values (".$row['Producto_codigoProducto'].",".$row['Empleado_codigoEmpleado'].",'".$row['fecha']."',".$row['Cliente_codigoCliente'].
        ",".$row['codigoSucursal'].",".$row['codigoLaboratorio'].",".$row['totalVentas'].",".$row['existencia'].",".$row['cantidadProductVencido'].",".$row['puntosAcumulados'].
        ",".$row['cantidadMed'].");";
        sqlsrv_query($conn2,$consultaInsert);*/
    }
    fclose($archivo1);//cerramos el archivo CamposSelecionados.txt
    unlink("datosPedir.json");
    unlink("CamposSelecionados.json");



    break;
    default:
        echo 'no se eligio nada';
    

} 
//fin switch 


?>