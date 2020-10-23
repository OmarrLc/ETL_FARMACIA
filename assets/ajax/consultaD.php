<?php
require '../../php/conexionOLAP.php';

$tabla=$_POST['tabla'];

$query="SELECT * FROM " .$tabla;
$resultado=sqlsrv_query($conn2,$query);

$html="";

switch ($tabla) {

case "clientes":
$html.= "<tr>
        <td>Id Cliente</td>
        <td>Nombre Cliente</td>
    </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "<tr>
        <td>". $row['idClientes']."</td>
        <td>". $row['Nombre']."</td>
    </tr>";
    }
break;

case "Empleado":
$html.= "<tr>
        <td>Id Empleado</td>
        <td>Nombre Empleado</td>
    </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "<tr>
        <td>". $row['idEmpleado']."</td>
        <td>". $row['nombre']."</td>
    </tr>";
}
break;
case "producto":
$html.= "<tr>
        <td>Id Producto</td>
        <td>Nombre Producto</td>
        <td>Categoria Producto</td>
    </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "<tr>
        <td>". $row['idProducto']."</td>
        <td>". $row['nombre']."</td>
        <td>". $row['categoria']."</td>
    </tr>";

}
break;

case "sucursal":
$html.= "<tr>
        <td>Id Sucursal</td>
        <td>Nombre Sucursal</td>
        <td>Direccion</td>
    </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "<tr>
        <td>". $row['idSucursal']."</td>
        <td>". $row['nombre']."</td>
        <td>". $row['direccion']."</td>
    </tr>";

}
break;
case "Laboratorio":
$html.= "<tr>
        <td>Id Laboratorio</td>
        <td>Nombre Laboratorio</td>
    </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "<tr>
        <td>". $row['idLaboratorio']."</td>
        <td>". $row['nombre']."</td>
    </tr>";

}
break;
case "Tiempo":
$html.="<tr>
        <td>Id Fecha</td>
        <td>Año</td>
        <td>Mes</td>
        <td>Semana</td>
        <td>Trimestre</td>
        <td>Dia de Semana</td>
        </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "
        
        <tr>
        <td>". $row['fecha']->format("Y/m/D"). "</td>
        <td>". $row['anio']."</td>
        <td>". $row['mes']."</td>
        <td>". $row['semana']."</td>
        <td>". $row['trimestre']."</td>
        <td>". $row['diaSemana']."</td>
    </tr>";

}
break;
case "hechosVentas":
$html.="<tr>
        <td>Id Producto</td>
        <td>Id Empleado</td>
        <td>Id Tiempo</td>
        <td>Id Cliente</td>
        <td>Id Sucursal</td>
        <td>Id Laboratorio</td>
        <td>Total Venta</td>
        <td>Existencia</td>
        <td>Producto Vencido</td>
        <td>Puntos Acumulados</td>
        <td>Cantidad Medicamentos</td>

        </tr>";
    while($row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)) {
        $html.= "
        
        <tr>
        <td>". $row['Producto_idProducto']."</td>
        <td>". $row['Empleados_idEmpleados']."</td>
        <td>". $row['Tiempo_idTiempo']->format("Y/m/D")."</td>
        <td>". $row['Clientes_idClientes']."</td>
        <td>". $row['sucursal_idSucursal']."</td>
        <td>". $row['Laboratorio_idLaboratorio']."</td>
        <td>". $row['totalVentas']."</td>
        <td>". $row['Existencia']."</td>
        <td>". $row['prodVencido']."</td>
        <td>". $row['puntosAcumuladoClientes']."</td>
        <td>". $row['CantidadMedicamentos']."</td>
    </tr>";

}
break;
}

echo $html;

?>