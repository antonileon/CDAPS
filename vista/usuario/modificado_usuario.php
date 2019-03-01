<?php 
	require_once('../config/conexion.php');

	extract($_REQUEST);
	//$id=$_GET['id'];
	$sql="UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email', sexo='$sexo', ocupacion='$ocupacion', 
	telefono='$telefono', direccion='$direccion' WHERE id='$id'";
	
	$query = mysqli_query($conectar,$sql);
	if($query>0){
		echo" <script type='text/javascript'>
			alert('Registro Modificado');
			window.open('index.php?llave=usuario','_self');
			</script>";
		} else { 
		  echo " <script type='text/javascript'>
				alert('No Se modificaron Los Datos');
				window.open('index.php?llave=usuario','_self');
				</script>";
		}
?> 
