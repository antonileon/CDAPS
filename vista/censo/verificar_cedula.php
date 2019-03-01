<?php 
	require("../config/conexion.php"); //conexion entre el servidor y la base datos
	$_SESSION['cedula']=$_POST['cedula'];
	$cedula=$_SESSION['cedula'];

	if (!trim($cedula)==false) {

	$sql="SELECT cedula FROM personas WHERE cedula='$cedula'"; // hacemos una consulta a la base de datos para saber si la cedula es la correcta
	$consulta=mysqli_query($conectar,$sql) or die ("ERROR en la consulta ". mysqli_error());
	$fila=mysqli_fetch_assoc($consulta);
	if ($fila < 1) {
	?>
		<script type="text/javascript">
			var confirmar=confirm("Persona no existe. ¿Desea registrarlo?")
			if (confirmar==true) {
				window.location=("index.php?llave=registrar_censo&cedula=<?php echo $cedula; ?>");
			}
			else {
				window.location=("index.php?llave=censo");
			}
		</script>
	<?php	
	}
	else {
?>
	<script type="text/javascript">
		alert("Cédula Existente");
		window.location=("index.php?llave=censo");
	</script>
<?php
	}
	mysqli_free_result($consulta); // liberar espacio en la base de datos
} else {
	echo "<script type='text/javascript'>
			alert('Rellene el campo por favor');
			window.location=('index.php?llave=censo')
		</script>";
}
?>