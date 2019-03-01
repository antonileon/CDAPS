<?php 
	
	require_once('../config/conexion.php');
	extract ($_REQUEST);
	
	$sql="UPDATE configuracion SET nombre='$nombre', siglas='$siglas', sueldo='$sueldo' WHERE id_configuracion='1'";
	
	$query= mysqli_query($conectar,$sql);
	if ($query>0) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('index.php?llave=configuracion','_self');
				</script>";
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('index.php?llave=configuracion','_self');
				</script>";
	}

?>