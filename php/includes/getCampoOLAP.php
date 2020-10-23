<?php
require ('../conexionOLAP.php');

$nomTabla=$_POST['nombreTDBD'];
$q="SELECT ic.COLUMN_NAME FROM Information_Schema.Columns ic
WHERE TABLE_NAME = '$nomTabla' and ic.TABLE_CATALOG='OLAP_FARMACIA'
ORDER BY COLUMN_NAME;";
$r=sqlsrv_query($conn2,$q);
$html="<H6 STYLE='TEXT-ALIGN: left'>Los campos de la tabla son:</H6>";
while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
	$html.= "<li class=><H6 STYLE='TEXT-ALIGN: left'>".$row['COLUMN_NAME']."</H6></li>";
 
}
echo $html;
?>