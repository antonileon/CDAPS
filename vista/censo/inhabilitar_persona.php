<?php 
	
	require("../config/conexion.php");
	extract($_REQUEST);
	
	$sq= "UPDATE personas SET estatus='Inhabilitado(a)', motivo_eliminar='$motivo_eliminar' WHERE id_personas='$id'";
	$result = mysqli_query($conectar,$sq) or die ("Error en la Consulta de Estudiante Inscrito ".mysqli_error($conectar));

	$login = $_SESSION['usuario'];
    $auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha Inhabilitado a una persona', CURRENT_TIMESTAMP, CURRENT_TIME)";
    $bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());

 ?>
 <script type="text/javascript">
 	alert("Persona Inhabilitado");
 	window.location=("index.php?llave=listado_inhabilitado")
 </script>