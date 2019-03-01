<?php 
	require_once('../config/conexion.php');

	extract($_REQUEST);
	
	$sql="UPDATE usuario SET apellido='$apellido', nombre='$nombre', email='$email', sexo='$sexo', 
	pregunta='$pregunta', respuesta='$respuesta', telefono='$telefono' WHERE id='$id'";
	
	$query = mysqli_query($conectar, $sql);
?>

<?php 
	if($query>0){
?>			
<?php echo" <script type='text/javascript'>
		alert('Su perfil ha sido Modificado');
		window.open('index.php?llave=perfil','_self');
		</script>"; 
	
	    $login = $_SESSION['usuario'];
    	$auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha modificado su perfil', CURRENT_TIMESTAMP, CURRENT_TIME)";
    	$bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());
?>
<?php 	} else { 
	  echo " <script type='text/javascript'>
			alert('No se Modificaron Los Datos');
			window.open('index.php?llave=perfil','_self');
			</script>";
} ?> 
