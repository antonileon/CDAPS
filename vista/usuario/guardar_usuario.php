<?php 
	
	require_once('../config/conexion.php');
	extract ($_REQUEST);
	$password=md5($_POST['password']);
	$sq = "SELECT * FROM usuario WHERE usuario='".$usuario."'";
	$query = mysqli_query($conectar,$sq);
	$num = mysqli_num_rows($query);
	$date = date("Y-m-d");
	if($num>0){
	echo "<script> alert('!!! Usuario ya Registrado !!!');
	             window.location='index.php?llave=registrar_usuario';
          </script>" ;
	}else{
	if ($sexo == 'M') {
	$sql=" INSERT INTO usuario VALUES ('NULL','$tipocuenta','$usuario','$password','$nombre','$apellido','$cedula','$email','$sexo',
		'$ocupacion','$direccion','$telefono','$pregunta','$respuesta','male.png','$date','1')";
	} else {
		$sql=" INSERT INTO usuario VALUES ('NULL','$tipocuenta','$usuario','$password','$nombre','$apellido','$cedula','$email','$sexo',
		'$ocupacion','$direccion','$telefono','$pregunta','$respuesta','female.png','$date','1')";
	}
	$rs= mysqli_query($conectar,$sql);
	if ($rs) {
		echo "	<script type='text/javascript'>
					alert('Registro Exitoso');
					window.open('index.php?llave=usuario','_self');
				</script>";
		// Auditoria //
		$login = $_SESSION['usuario'];
		$auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha registrado al usuario $usuario', CURRENT_TIMESTAMP, CURRENT_TIME)";
    	$bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());
	} else {
		echo "	<script type='text/javascript'>
					alert('No Se Registraron Los Datos');
					window.open('index.php?llave=registrar_usuario','_self');
				</script>";
	}
}

?>