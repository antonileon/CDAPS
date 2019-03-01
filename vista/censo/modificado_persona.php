<?php  

  extract($_REQUEST); 

  require("../config/conexion.php");
  
  $sql="UPDATE personas SET cedula='$cedula',nombre='$nombre',apellido='$apellido',sexo='$sexo',estado_civil='$estado_civil',
      telefono='$telefono',fecha_nacimiento='$fecha_nacimiento',lugar_nacimiento='$lugar_nacimiento',nivel_estudio='$nivel_estudio',profesion='$profesion',
      num_hijos='$num_hijos',personas_cargo='$personas_cargo',discapacidad='$discapacidad' WHERE id_personas='$id_personas'";
  $sq=mysqli_query($conectar,$sql) or die ("Error en el UPDATE Estudiante " . mysqli_error($conectar));
 
  
  $sql1="UPDATE datos_personas SET estado='$estado',ciudad='$ciudad',municipio='$municipio',
    parroquia='$parroquia',direccion='$direccion',tipo_vivienda='$tipo_vivienda',condicion_vivienda='$condicion_vivienda',trabaja='$trabaja',nombre_empresa='$nombre_empresa',
    fecha_ingreso='$fecha_ingreso',cargo_trabajo='$cargo_trabajo', ingreso_fijo='$ingreso_fijo',otros_ingresos='$otros_ingresos',
    gasto_total='$gasto_total' WHERE id_datos_personas = '$id_datos_personas'";
  $sq1=mysqli_query($conectar,$sql1);

  if ($sq==1 && $sq1==1 ) {
    $respuesta="Los Datos han sido modificados";

    $login = $_SESSION['usuario'];
    $auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha modificado los datos de $nombre $apellido', CURRENT_TIMESTAMP, CURRENT_TIME)";
    $bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());
  } else {
      $respuesta="Fallo en actualizar los datos".mysqli_error($conectar);
    }
 ?>

<script type="text/javascript">
  
    alert("<?php echo $respuesta; ?>")
    window.location=("index.php?llave=listado_censo")

</script>