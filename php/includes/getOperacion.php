<?php
$nomTipoDato=$_POST['nombreTipoDato'];
$html.="<option value='0'> Seleccionar Operacion </option>"; 
switch ($nomTipoDato) {
    case "varchar":
    $html.= "<option value='Concatenar'> Concatenar </option>";
    $html.= "<option value='Mayuscula'> Convertir a mayuscula </option>";
    $html.= "<option value='Minuscula'> Convertir a minuscula </option>";
        break;
    case "date":
    $html.= "<option value='DatePartDia'> Dia </option>";
    $html.= "<option value='DatePartMes'> Mes </option>";
    $html.= "<option value='DatePartAnio'> Anio </option>";
    $html.= "<option value='DatePartTri'> Trimestre </option>";
    $html.= "<option value='DatePartSem'> Semana </option>";
        break;

    default:
    $html.= "<option value='0'> No hay operacion disponible</option>";
}
echo $html;
?>