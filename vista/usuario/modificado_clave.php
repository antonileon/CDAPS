<?php 
	require_once('../config/conexion.php');

	extract($_REQUEST);
	//$id=$_GET['id'];
	$usuario = $_GET["usuario"];
	
	$password = md5( $password );
	$sql="UPDATE usuario SET password='$password' WHERE id='$id'";
	$query = mysqli_query($conectar,$sql);

	$sql ="SELECT * FROM usuario WHERE id='$id' AND usuario='$usuario'";
	$query= mysqli_query($conectar, $sql);
	$row = mysqli_fetch_array($query);
	
	if($query>0){
		echo" <script type='text/javascript'>
			alert('Contraseña ha sido Modificado');
			window.open('index.php?llave=usuario','_self');
			</script>";

		    $login = $_SESSION['usuario'];
		    $auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha modificado la contraseña de un usuario$usuario', CURRENT_TIMESTAMP, CURRENT_TIME)";
    		$bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());
		} else { 
		  echo " <script type='text/javascript'>
				alert('No Se modifico la Contraseña');
				window.open('index.php?llave=usuario','_self');
				</script>";
		}
?> 