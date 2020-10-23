<?php
require ('../conexionOLAP.php');

$nomTabla=$_POST['nombreTDBD'];
$q="SELECT ic.DATA_TYPE FROM Information_Schema.Columns ic
WHERE TABLE_NAME = '$nomTabla' and ic.TABLE_CATALOG='OLAP_FARMACIA'
ORDER BY COLUMN_NAME;";
$r=sqlsrv_query($conn2,$q);
$html="<H6 STYLE='TEXT-ALIGN: left'>Tipo de dato::</H6>";
while($row = sqlsrv_fetch_array($r,SQLSRV_FETCH_ASSOC)) {
    
	$html.= "<li class=><H6 STYLE='TEXT-ALIGN: left'>".$row['DATA_TYPE']."</H6></li>";
 
}
echo $html;
?>