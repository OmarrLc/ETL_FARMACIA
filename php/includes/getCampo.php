<?php
require ('../conexion.php');

$nomTabla=$_POST['nombreTabla'];
$q="SELECT ic.COLUMN_NAME FROM Information_Schema.Columns ic
WHERE TABLE_NAME = '$nomTabla' and ic.TABLE_CATALOG='OLTP_FARMACIA'
ORDER BY COLUMN_NAME;";
$r=sqlsrv_query($conn,$q);

$html="<option value=''> Seleccionar el campo</option>";
while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {

    $html.= "<option value='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']." </option>";
 
}
echo $html;
?>