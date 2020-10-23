<?php
// require 'conexion.php';
// $query1="SELECT sd.database_id,sd.name FROM sys.databases sd
// 		ORDER BY sd.name ASC";
// $resultado1=sqlsrv_query($conn,$query1);


// require 'conexionOLAP.php';

// $query2="SELECT sd.database_id,sd.name FROM sys.databases sd
// 		ORDER BY sd.name ASC";
// $resultado2=sqlsrv_query($conn2,$query2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../assets/js/jquery.min.js"></script>
	<link rel="stylesheet" href="../assets/css/custoums.css">
	<script src="../assets/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

	<script language="javascript">
			$(document).ready(function(){
				$("#cbx_BD").change(function () {
 
					//$('#cbx_Tabla').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_BD option:selected").each(function () {
						nombreBD = $(this).val();
						$.post("includes/getTabla.php", { nombreBD: nombreBD }, function(data){
							$("#cbx_Tabla").html(data);
						});            
					});
				});
			});
		</script>




<script language="javascript">
			$(document).ready(function(){
				$("#cbx_BDT").change(function () {
 
					//$('#cbx_Tabla').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_BDT option:selected").each(function () {
						nombreTDBD = $(this).val();
						$.post("includes/getTablaDestino.php", { nombreTDBD: nombreTDBD }, function(data){
							$("#cbx_TablaD").html(data);
						});            
					});
				});
			});
		</script>

		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_TablaD").change(function () {
 
					//$('#cbx_Tabla').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_TablaD option:selected").each(function () {
						nombreTDBD = $(this).val();
						$.post("includes/getCampoOLAP.php", { nombreTDBD: nombreTDBD }, function(data){
							$("#ulCampos").html(data);
						});            
					});
				});
			});
		</script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_TablaD").change(function () {
 
					//$('#cbx_Tabla').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_TablaD option:selected").each(function () {
						nombreTDBD = $(this).val();
						$.post("includes/getTipoDatoOLAP.php", { nombreTDBD: nombreTDBD }, function(data){
							$("#ulTipoDato").html(data);
						});            
					});
				});
			});
		</script>






		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_Tabla").change(function () {
 
					$('#cbx_Campo').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_Tabla option:selected").each(function () {
						nombreTabla = $(this).val();
						$.post("includes/getCampo.php", { nombreTabla: nombreTabla }, function(data){
							$("#cbx_Campo").html(data);
						});            
					});
				});
			});
		</script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_Campo").change(function () {
 
					$('#cbx_TipoDato').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_Campo option:selected").each(function () {
						nombreCampo = $(this).val();
						$.post("includes/getTipoDato.php", { nombreCampo: nombreCampo }, function(data){
							$("#cbx_TipoDato").html(data);
						});            
					});
				});
			});
		</script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_TipoDato").change(function () {
 
					$('#cbx_Operacion').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					

					$("#cbx_TipoDato option:selected").each(function () {
					
						nombreTipoDato = $(this).val();
						$.post("includes/getOperacion.php", { nombreTipoDato: nombreTipoDato }, function(data){
							$("#cbx_Operacion").html(data);
						});            
					});
				});
			});
		</script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_Operacion").change(function () {
 
					$('#cbx_Tabla2').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_Operacion option:selected").each(function () {
						tipoOperacion = $(this).val();
						console.log(tipoOperacion);
						if (tipoOperacion=="Concatenar"){
								$("#cbx_BD option:selected").each(function () {
									nombreBD = $(this).val();
									$.post("includes/getTabla.php", { nombreBD: nombreBD }, function(data){
									$("#cbx_Tabla2").html(data);
								});            
							});

						}else {
							$("#cbx_Tabla2").html("<option value=''> No disponible </option>");
						}

					});
					
										
				});
			});
		</script>
		<script language="javascript">
			$(document).ready(function(){
				$("#cbx_Tabla2").change(function () {
 
					$('#cbx_Campo2').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
					
					$("#cbx_Tabla2 option:selected").each(function () {
						nombreTabla = $(this).val();
						$.post("includes/getCampo.php", { nombreTabla: nombreTabla }, function(data){
							$("#cbx_Campo2").html(data);
						});            
					});
				});
			});
		</script>

		<!--<script language="javascript">
			$(document).ready(function(){
				nombreTabla = "Empleado";
						$.post("includes/getCampoOLAP.php", { nombreTabla: nombreTabla }, function(data){
							$("#ulCampos").html(data);
						});
			});
		</script>
		<script language="javascript">
			$(document).ready(function(){
				nombreTabla = "Empleado";
						$.post("includes/getTipoDatoOLAP.php", { nombreTabla: nombreTabla }, function(data){
							$("#ulTipoDato").html(data);
						});
			});
		</script>-->


</head>

<body>
<div id="main">
			<div class="inner">
				<header>
			
				</header>
			<form id="combo"  name="combo">
				<table STYLE=" WIDTH: 100%;" class=" table table-hovercv">
				<TR class="table-info">
			<td colspan="4" >
			<H3 STYLE="TEXT-ALIGN: center">ORIGEN DE LOS DATOS</H3>
			</td>
				
			
				
				</TR>
			
				<TR>
				<td>
					<div>
						<select name="cbx_BD" id="cbx_BD">
								<option value="0"> Seleccionar Base de datos</option>
								<?php while($row = sqlsrv_fetch_array($resultado1,SQLSRV_FETCH_ASSOC)) { ?> 
								
								<option value="<?php echo $row['name'];?>"> <?php echo $row['name'];?></option>

								<?php } ?>
								
						</select>
					</div>
				</td>
				<td>
					<div>
						<select name="cbx_Tabla" id="cbx_Tabla">
							<option value="0"> Seleccionar La tabla</option>
						</select>
					</div>
				</td>
				<td>
					<div>
						<select name="cbx_Campo" id="cbx_Campo">
							<option value="0"> Seleccionar el campo</option>
						</select>
					</div>
				</td>
					<td>
					<div>
						<select name="cbx_TipoDato" id="cbx_TipoDato">
							<option value="0"> Seleccionar el tipo de dato</option>
						</select>
					</div>
				</td>
				
				<TR>
				
				<td>
					<div>
						<select name="cbx_Operacion" id="cbx_Operacion">
						<option value="0"> Seleccionar la operacion</option>
						</select>
					</div>
				</td>
		
				<td>
					<div>
						<select name="cbx_Tabla2" id="cbx_Tabla2">
						<option value="0"> No disponible </option>

						</select>
					</div>
				</td>
				<td colspan="2">
		
				<div>
					<select name="cbx_Campo2" id="cbx_Campo2">
							<option value="0"> No disponible </option>
						</select>
					</div>
				</td>
				</TR>
				<TR>
				<td colspan="4" >
					<div style="text-align: center">
					<input type="button"  class="btn btn-primary" id="btnAgregarCampo" onclick="" value="Agregar Campo">
					</div>
				</td>
					
				</TR>
				<tr>
				<td colspan="4" >
					
				</td>
				
				</tr>
				<tr>
				
	
				</tr>
				<tr class="table-info">
				<td colspan="4" >
					<H3 STYLE="TEXT-ALIGN: center">DESTINO DE LOS DATOS</H3>
				</td>
				</tr>
				
				<tr>
				<td >
					<H6 STYLE="TEXT-ALIGN: left">Base de datos:</H6>
					<!--h6 STYLE="TEXT-ALIGN: left">OLAP_FARMACIA</h6-->
					<div>
						<select name="cbx_BD" id="cbx_BDT">
								<option value="0"> Seleccionar Base de datos</option>
								<?php while($row = sqlsrv_fetch_array($resultado2,SQLSRV_FETCH_ASSOC)) { ?> 
								
								<option value="<?php echo $row['name'];?>"> <?php echo $row['name'];?></option>

								<?php } ?>
								
						</select>
					</div>
							
				</td>	

				<td >
					<H6 STYLE="TEXT-ALIGN: left">Tabla Destino:</H6>
					
					<div>
						<select name="cbx_Tabla" id="cbx_TablaD">
							<option value="0"> Seleccionar La tabla</option>
						</select>
					</div>
				
				</td>	
				<td>
					<div>
					<ul class="list-group" id="ulCampos">
						
					</ul>
					</div>
				</td>
				<td>
					<div>
					<ul class="list-group" id="ulTipoDato">
						
					</ul>
					</div>
				</td>
				
				</tr>
				<tr>
				<td colspan="4" > 
					<div style="text-align: center">
					<input type="button"  class="btn btn-primary" id="btnConsulta" onclick="" value="Realizar Consulta">
					</div>
				</td>
				</tr>

				<tr>
				
				<td colspan="4" > 
					<div style="text-align: center">
					<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"  id="btnMostrar" onclick="" value="Mostrar Datos">

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div  role="document">
    <div class="modal-content">
      <div class="modal-dialog" class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Consulta a la tabla </h5>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>-->
      </div>
      <div class="modal-body" id="consultaM">
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

				</td>
				</tr>
				
			
				
				
			</table>
			
		</form>
		
											
		</div>
	</div>

	<script src="../assets/js/AgregarCampos.js"></script>
	<script src="../assets/js/EjecutarLectura.js"></script>
	<script src="../assets/js/consultaD.js"></script>
</body>
</html>