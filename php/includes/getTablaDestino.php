<?php
require ('../conexionOLAP.php');

$nomTDDB=$_POST['nombreTDBD'];
$q="SELECT ts.TABLE_NAME FROM INFORMATION_SCHEMA.TABLES ts
        WHERE TABLE_TYPE = 'BASE TABLE' and ts.TABLE_CATALOG='$nomTDDB'
        order by TABLE_NAME";
$r=sqlsrv_query($conn2,$q);

$html="<option value='0'> Seleccionar La tabla</option>";
while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {

    $html.= "<option value='".$row['TABLE_NAME']."'>".$row['TABLE_NAME']." </option>";
 
}
echo $html;
?>