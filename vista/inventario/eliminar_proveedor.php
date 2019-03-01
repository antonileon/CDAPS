<?php 
	date_default_timezone_set('America/Caracas');
	require_once('../config/conexion.php');

	$id_proveedores=$_GET['id_proveedores'];
	$nombre_proveedor = $_GET["nombre_proveedor"];

	$sql="UPDATE proveedores SET estatus='Inhabilitado' WHERE id_proveedores='$id_proveedores'";
	$query = mysqli_query($conectar,$sql);

	$sql ="SELECT * FROM proveedores WHERE id_proveedores='$id_proveedores' AND nombre_proveedor='$nombre_proveedor'";
	$query= mysqli_query($conectar, $sql);
	$row = mysqli_fetch_array($query);

?>

<html>
<head>
	<title></title>
		
</head>
<body>
	<?php 
		if($query>0){
		echo" <script type='text/javascript'>
				alert('Proveedor Inhabilitado');
				window.open('index.php?llave=proveedores','_self');
			  </script>";

		$login = $_SESSION['usuario'];
		$auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha eliminado al Proveedor $nombre_proveedor', CURRENT_TIMESTAMP, CURRENT_TIME)";
    	$bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error()); 
	} ?> 
</body>
</html>