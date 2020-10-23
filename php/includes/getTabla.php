<?php
require ('../conexion.php');

$nomDB=$_POST['nombreBD'];
$q="SELECT ts.TABLE_NAME FROM INFORMATION_SCHEMA.TABLES ts
        WHERE TABLE_TYPE = 'BASE TABLE' and ts.TABLE_CATALOG='$nomDB'
        order by TABLE_NAME";
$r=sqlsrv_query($conn,$q);

$html="<option value='0'> Seleccionar La tabla</option>";
while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {

    $html.= "<option value='".$row['TABLE_NAME']."'>".$row['TABLE_NAME']." </option>";
 
}
echo $html;
?>