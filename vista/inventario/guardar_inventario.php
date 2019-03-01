<?php 
	
	require_once('../config/conexion.php');
	extract ($_REQUEST);
	$date = date("Y-m-d");
	
	$sql=" INSERT INTO inventario VALUES ('NULL','".$insumo."','".$estado."','".$observaciones."','".$cantidad."',CURRENT_TIMESTAMP,'".$fecha_vencimiento."')";
	
	$query= mysqli_query($conectar,$sql);
	if ($query) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('index.php?llave=inventario','_self');
				</script>";
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('index.php?llave=inventario','_self');
				</script>";
	}

?>