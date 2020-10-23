<?php
require ('../conexion.php');


$nomCampo=$_POST['nombreCampo'];
$q="SELECT distinct(ic.DATA_TYPE) FROM Information_Schema.Columns ic
WHERE ic.TABLE_CATALOG='OLTP_FARMACIA' and ic.COLUMN_NAME='$nomCampo';";
$r=sqlsrv_query($conn,$q);

$html="<option value='0'> Seleccionar </option>";
while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {

    $html.= "<option value='".$row['DATA_TYPE']."'>".$row['DATA_TYPE']." </option>";
 
}
echo $html;
?>