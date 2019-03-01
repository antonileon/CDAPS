<?php
	
	require_once('../config/conexion.php');
	extract ($_REQUEST);
	

				$sql="INSERT INTO proveedores (id_proveedores, tipo_rif, rif, nombre_proveedor, telefono, email, direccion_proveedores, fecha_registro, estatus) 
				VALUES ('NULL','$tipo_rif','$rif','$nombre_proveedor','$telefono','$email','$direccion_proveedores', CURRENT_TIMESTAMP,'Activo')";
				$query = mysqli_query($conectar,$sql);
	
	if ($query) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('index.php?llave=proveedores','_self');
				</script>";
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('index.php?llave=proveedores','_self');
				</script>";
	}

?>