<?php
	require_once('../config/conexion.php');
	// Recibo los datos de la imagen
	$nombre_img = $_FILES['profile']['name'];
	extract($_REQUEST);
	//$id = $_SESSION['id'];
	$sql = "SELECT * from usuario where id='$id'";
	$query = mysqli_query($conectar,$sql);
	while($row1=mysqli_fetch_assoc($query)) {
     	$usuario = $row1['usuario'];
    }

	if($_FILES["profile"]["error"]>0){
		echo "<script>alert('Error al cargar archivo.');
               window.location.href='index.php?llave=perfil'</script>";	
		} else {
		
		$permitidos = array("image/gif","image/png","image/jpg","image/jpeg");
		$limite_kb = 2000;
		
		if(in_array($_FILES["profile"]["type"], $permitidos) && $_FILES["profile"]["size"] <= $limite_kb * 1024){
			
			$ruta = '../img/'.$usuario.'/';
			$imagen = $ruta.$_FILES["profile"]["name"];
			
			if(!file_exists($ruta)){
				mkdir($ruta);
			}
			
			if(!file_exists($imagen)){
				
				$resultado = @move_uploaded_file($_FILES["profile"]["tmp_name"], $imagen);
				
				if($resultado){
					$sql = "UPDATE usuario SET profile = '$nombre_img' WHERE id='$id'";
					$query = mysqli_query($conectar,$sql);
					//echo "Archivo Guardado";
					//header("Location: index.php?llave=perfil");
					echo "<script>alert('Imagen cambiada con exito.');
               		window.location.href='index.php?llave=perfil'</script>";
					} else {
					echo "<script>alert('Error al guardar imagen.');
               		window.location.href='index.php?llave=perfil'</script>";
				}
				
				} else {
				echo "<script>alert('Archivo ya existe.');
               	window.location.href='index.php?llave=perfil'</script>";
			}
			
			} else {
				echo "<script>alert('Archivo no permitido o excede el tamaño.');
            	window.location.href='index.php?llave=perfil'</script>";
		}
	}
?>