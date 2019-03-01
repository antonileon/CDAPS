<?php 
	
	require("../config/conexion.php");
	extract($_REQUEST);
	
	$sq= "UPDATE personas SET estatus='Beneficiado(a)', motivo_beneficiar='$motivo_beneficiar' WHERE id_personas='$id' ";
	$result = mysqli_query($conectar,$sq) or die ("Error en la Consulta de Estudiante Inscrito ".mysqli_error($conectar));

 ?>
 <script type="text/javascript">
 	window.location=("index.php?llave=listado_beneficiado&alert=2")
 </script>