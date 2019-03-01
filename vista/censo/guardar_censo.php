<?php 
	extract($_REQUEST);
	if (  !trim($fecha_registro)==false ) { 
		require("../config/conexion.php");

	$sql="INSERT INTO datos_personas (id_datos_personas,estado,ciudad,municipio,parroquia,direccion,tipo_vivienda,condicion_vivienda,trabaja,nombre_empresa,
		fecha_ingreso,cargo_trabajo,ingreso_fijo,otros_ingresos,gasto_total) VALUES ('NULL','$estado','$ciudad','$municipio',
		'$parroquia','$direccion','$tipo_vivienda','$condicion_vivienda','$trabaja','$nombre_empresa','$fecha_ingreso','$cargo_trabajo',
		'$ingreso_fijo','$otros_ingresos','$gasto_total')";
  	$query=mysqli_query($conectar,$sql) or die ("ERROR 1 " . mysqli_error($conectar)) ;
  	$datos_personas=mysqli_insert_id($conectar);

  	$sql1="INSERT INTO personas (id_personas,id_datos_personas,cedula,nombre,apellido,sexo,estado_civil,telefono,fecha_nacimiento,lugar_nacimiento,nivel_estudio,
  		profesion,num_hijos,personas_cargo,discapacidad,fecha_registro,estatus) VALUES ('NULL','$datos_personas','$cedula','$nombre','$apellido','$sexo','$estado_civil',
  		'$telefono','$fecha_nacimiento','$lugar_nacimiento','$nivel_estudio','$profesion','$num_hijos','$personas_cargo','$discapacidad',CURRENT_TIMESTAMP,'Censado(a)')";
  	$query1=mysqli_query($conectar,$sql1) or die ("ERROR 2 " . mysqli_error($conectar));
  	$personas=mysqli_insert_id($conectar);

  	$sql10="SELECT * FROM datos_personas INNER JOIN personas 
  	ON personas.id_datos_personas=datos_personas.id_datos_personas WHERE personas.cedula='$cedula'";

  	$consulta10=mysqli_query($conectar,$sql10) or die ("ERROR en la consulta ".mysqli_error($conectar));
  	$fila10=mysqli_fetch_assoc($consulta10);
  	$id_personas=$fila10['id_personas'];

  	 if ($query==1 && $query1==1 ) {
        echo "	<script type='text/javascript'>
        			alert('Se ha registro los datos exitosamente');
					window.open('index.php?llave=listado_censo','_self');
				</script>";
        unset($cedula);

  		date_default_timezone_set('America/Caracas');
  
    $login = $_SESSION['usuario'];
    $auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha Censado a $nombre $apellido', CURRENT_TIMESTAMP, CURRENT_TIME)";
    $bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());
    } 
    else {
	    echo "	<script type='text/javascript'>
        			alert('No se registraron los datos');
					window.open('index.php?llave=listado_censo','_self');
				</script>".mysqli_error($conectar);
   	}
?>

<?php } ?>