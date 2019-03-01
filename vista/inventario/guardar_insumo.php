<?php 
	
	require_once('../config/conexion.php');
	extract ($_REQUEST);
	$date = date("Y-m-d");
	
	$sql=" INSERT INTO insumos VALUES ('NULL','".$id_proveedores."','".$codigo_insumo."','".$tipo."','".$nombre."','".$marca."', CURRENT_TIMESTAMP)";
	
	$query= mysqli_query($conectar,$sql);
	if ($query) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('index.php?llave=insumos','_self');
				</script>";
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('index.php?llave=insumos','_self');
				</script>";
	}

?>