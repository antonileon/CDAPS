<?php 
	require_once('../config/conexion.php');

	extract($_REQUEST);
    $cpassword = ['confirm_password'];
	if((!$password) || (!$cpassword) ) {
		echo "<script type='text/javascript'>
				alert('Algunos campos faltas');
				window.open('perfil.php','_self');
			</script>";
		}
	$password = md5( $password );
	$sql = "UPDATE usuario SET password = '$password' WHERE id = '$id'";	
	$query = mysqli_query($conectar,$sql);
?>
<html>
<head>
	<title></title>
</head>
<body>
		<div class="cuerpo">
			<?php 
				if($query>0){
			?>			
			<?php echo" <script type='text/javascript'>
							alert('Su Contraseña ha sido Modificado');
							window.open('index.php?llave=perfil','_self');
						</script>"; ?>		
			<?php 	} else { 
				  echo " <script type='text/javascript'>
							alert('No se Modifico su Contraseña');
							window.open('index.php?llave=perfil','_self');
						</script>";
			} ?> 
	</div>
</body>
</html>