<?php
	require_once('../config/conexion.php');
	// Recibo los datos de la imagen
	$nombre_img = $_FILES['logo']['name'];
	extract($_REQUEST);
	//$id = $_SESSION['id'];
	$sql = "SELECT * from configuracion";
	$query = mysqli_query($conectar,$sql);
	while($row1=mysqli_fetch_assoc($query)) {
     	$usuario = $row1['usuario'];
    }

	if($_FILES["logo"]["error"]>0){
		echo "<script>alert('Error al cargar archivo.');
               window.location.href='index.php?llave=configuracion'</script>";	
		} else {
		
		$permitidos = array("image/gif","image/png","image/jpg","image/jpeg");
		$limite_kb = 2000;
		
		if(in_array($_FILES["logo"]["type"], $permitidos) && $_FILES["logo"]["size"] <= $limite_kb * 1024){
			
			$ruta = '../img/';
			$imagen = $ruta.$_FILES["logo"]["name"];
			
			if(!file_exists($ruta)){
				mkdir($ruta);
			}
			
			if(!file_exists($imagen)){
				
				$resultado = @move_uploaded_file($_FILES["logo"]["tmp_name"], $imagen);
				
				if($resultado){
					$sql = "UPDATE configuracion SET logo = '$nombre_img'";
					$query = mysqli_query($conectar,$sql);
					//echo "Archivo Guardado";
					//header("Location: index.php?llave=perfil");
					echo "<script>alert('Imagen cambiada con exito.');
               		window.location.href='index.php?llave=configuracion'</script>";
					} else {
					echo "<script>alert('Error al guardar imagen.');
               		window.location.href='index.php?llave=configuracion'</script>";
				}
				
				} else {
				echo "<script>alert('Archivo ya existe.');
               	window.location.href='index.php?llave=configuracion'</script>";
			}
			
			} else {
				echo "<script>alert('Archivo no permitido o excede el tamaño.');
            	window.location.href='index.php?llave=configuracion'</script>";
		}
	}
?>