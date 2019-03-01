<?php 
	date_default_timezone_set('America/Caracas');
	require_once('../config/conexion.php');

	$id=$_GET['id'];
	$usuario = $_GET["usuario"];

	$sql="DELETE FROM usuario WHERE id='$id'";
	$query = mysqli_query($conectar,$sql);

	$sql ="SELECT * FROM usuario WHERE id='$id' AND usuario='$usuario'";
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
	?>	
	<?php 
		echo" <script type='text/javascript'>
				alert('Usuario Eliminado');
				window.open('index.php?llave=usuario','_self');
			  </script>";

		$login = $_SESSION['usuario'];
		$auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha eliminado al usuario $usuario', CURRENT_TIMESTAMP, CURRENT_TIME)";
    	$bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error()); 
	?>			
	<?php 	} ?> 
</body>
</html>