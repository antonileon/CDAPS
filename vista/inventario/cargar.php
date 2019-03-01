<?php

require_once('../config/conexion.php');

extract($_REQUEST);

$sql = "SELECT * FROM proveedores WHERE id_proveedores='$id_proveedores'";
$resultado = mysqli_query($conectar,$sql);
$representante=mysql_fetch_array($resultado);
if($parentesco=='madre') {
 ?>

 <input type="hidden" name="idmadre"   value="<?php echo $representante['id_padre_representante']; ?>"/>
						<h2>Datos de la Madre </h2>
						<label>Apellido(s):</label>
						<input type="text" name="apellido_repre" onkeypress="return soloL()"  value="<?php echo $representante['apellido_repre']; ?>" placeholder="Apellido" title="Introduzca un apellido valido" size="28" maxlength="30" required>
<br>
						<label>Nombre(s):</label>
						<input type="text" name="nombre_repre" onkeypress="return soloL()"  value="<?php echo $representante['nombre_repre']; ?>" placeholder="Nombre" title="Introduzca un nombre valido" size="28" maxlength="30" required>
<br>
						<label>Cédula:</label>
						<select name="nacion_repre" class="nacionalidad">
							<option value="v">V</option>
							<option value="e">E</option>
						</select>	
						<input type="text" name="cedula_repre"  onkeypress="return soloD()"  value="<?php echo $representante['cedula_repre']; ?>" placeholder="12345678" title="Introduzca una cédula valida" size="20" maxlength="8" required>
<br>
						<label>Direccion:</label>
						<input type="text" name="direccion_repre"   value="<?php echo $representante['direccion_repre']; ?>" placeholder="La mora Residencia x" title="Introduzca un direccion" size="28" maxlength="30" required>
<br>
						<label>E-mail:</label>
						<input type="email" name="email_repre"   value="<?php echo $representante['email_repre']; ?>" placeholder="ejemplo@gmail.com" title="Introduzca una dirección de correo electrónica: gmail, hotmail, etc" size="20" maxlength="40">
<br>
						<label id="large">Telefono de habitacion:</label>
						<input type="text" name="telefono_repre" onkeypress="return soloD()"   value="<?php echo $representante['telefono_repre']; ?>" placeholder="02xxxxxxxxxxx" title="Introduzca un número de casa" size="10" maxlength="11" required>
<br>
						<label>Celular:</label>
						<input type="text" name="celular_repre"  onkeypress="return soloD()"  value="<?php echo $representante['celular_repre']; ?>" placeholder="04xxxxxxxx" title="Introduzca un número de celular" size="10" maxlength="11">
<br>
						<label>Otro:</label>
						<input type="text" name="otro_telefono_repre"  onkeypress="return soloD()"  value="<?php echo $representante['otro_telefono_repre']; ?>" placeholder="otro teléfono o celular" size="10" maxlength="11">
<br>	
						<label>¿Trabaja?</label>
						<select name="trabajo1" id="trabajo1" onchange="cambia6(this.value)" required>
						<option value="">Seleccione</option>
							<option value="0"<?php if($representante['lugar_trabajo_repre']=='') echo "selected"; ?> >No</option>
							<option value="1" <?php if($representante['lugar_trabajo_repre']!='') echo "selected"; ?> >Si</option>
						</select>
						<br>
						<div id="trabajo1_cambia" style="display: block">
						<label>¿Donde?</label>
						<input type="text" name="lugar_trabajo_repre"  value="<?php echo $representante['lugar_trabajo_repre']; ?>" placeholder="Direccion del trabajo" size="16" maxlength="40">
<br>
						<label id="large">Telefono del trabajo:</label>
						<input type="text" name="telefono_trabajo_repre" onkeypress="return soloD()"  value="<?php echo $representante['telefono_trabajo_repre']; ?>" placeholder="02xxxxxxx" value"" size="10" maxlength="11"></div>

<br>
						<h2>Datos del Padre</h2>
						<label>Apellido(s):</label>
						<input type="text" name="apellido_padre" value"" placeholder="Apellido" size="28" maxlength="30" onkeypress="return soloL()">
<br>
						<label>Nombre(s):</label>
						<input type="text" name="nombre_padre" value"" placeholder="Nombre" size="28" maxlength="30" onkeypress="return soloL()">
<br>
						<label>Cédula:</label>
						<select name="nacion_padre" class="nacionalidad">
							<option value="v">V</option>
							<option value="e">E</option>
						</select>	
						<input type="text" name="cedula_padre" value"" placeholder="12345678" size="20" maxlength="8" onkeypress="return soloD()" >
											
<br>
						<label>Direccion:</label>
						<input type="text" name="direccion_padre" value"" placeholder="La mora Residencia..." size="28" maxlength="30" >
<br>
						<label>E-mail:</label>
						<input type="email" name="email_padre" value"" placeholder="ejemplo@gmail" size="20" maxlength="40">
<br>
						<label id="large">Telefono de habitacion:</label>
						<input type="text" name="telefono_padre" placeholder="02xxxxxxx" value"" size="10" maxlength="11" onkeypress="return soloD()" >
<br>
						<label>Celular:</label>
						<input type="text" name="celular_padre" value"" placeholder="04xxxxxxxx" size="10" maxlength="11" onkeypress="return soloD()" >
<br>
						<label>Otro:</label>
						<input type="text" name="otro_telefono_padre" placeholder="Otro teléfono o celular" value"" size="10" maxlength="11" onkeypress="return soloD()" >
<br>	
						<label>¿Trabaja?</label>
						<select name="trabajo2" id="trabajo2" onchange="cambia7(this.value)" >
						<option value="">Seleccione</option>
							<option value="0">No</option>
							<option value="1">Si</option>
						</select>
						<br>
						<div id="trabajo2_cambia" style="display: none">
						<label>¿Donde?</label>
						<input type="text" name="lugar_padre" placeholder="Direccion del trabajo" size="16" maxlength="40">
<br>
						<label id="large">Telefono del trabajo:</label>
						<input type="text" name="telefono_trabajo_padre" placeholder="02xxxxxxx" value"" size="10" maxlength="11" onkeypress="return soloD()" ></div>
						<br>
<?php }else if ($parentesco=='padre'){ ?>

 
 <input type="hidden" name="idpadre"   value="<?php echo $representante['id_padre_representante']; ?>"/>
						<h2>Datos de la Madre </h2>
						<label>Apellido(s):</label>
						<input type="text" name="apellido_repre" value""  size="28" maxlength="30" required onkeypress="return soloL()">
<br>
						<label>Nombre(s):</label>
						<input type="text" name="nombre_repre" value""  size="28" maxlength="30" required onkeypress="return soloL()">
<br>
						<label>Cédula:</label>
						<select name="nacion_repre" class="nacionalidad">
							<option value="v">V</option>
							<option value="e">E</option>
						</select>	
						<input type="text" name="cedula_repre" value""  size="20" maxlength="8" required onkeypress="return soloD()" >
<br>
						<label>Direccion:</label>
						<input type="text" name="direccion_repre" value""  size="28" maxlength="30" required>
<br>
						<label>E-mail:</label>
						<input type="email" name="email_repre" value""  size="20" maxlength="40">
<br>
						<label id="large">Telefono de habitacion:</label>
						<input type="text" name="telefono_repre" value"" size="10" maxlength="11" required onkeypress="return soloD()" >
<br>
						<label>Celular:</label>
						<input type="text" name="celular_repre" value"" size="10" maxlength="11" onkeypress="return soloD()" >
<br>
						<label>Otro:</label>
						<input type="text" name="otro_telefono_repre" value"" size="10" maxlength="11" onkeypress="return soloD()" >
<br>	
						<label>¿Trabaja?</label>
						<select name="trabajo1" id="trabajo1" onchange="cambia6(this.value)" required title="*">
						<option value="">Seleccione</option>
							<option value="0">No</option>
							<option value="1">Si</option>
						</select>
						<br>
						<div id="trabajo1_cambia" style="display: none">
						<label>¿Donde?</label>
						<input type="text" name="lugar_trabajo_repre" size="16" maxlength="40">
<br>
						<label id="large">Telefono del trabajo:</label>
						<input type="text" name="telefono_trabajo_repre" value"" size="10" maxlength="11" onkeypress="return soloD()" ></div>

<br>
						<h2>Datos del Padre</h2>
						<label>Apellido(s):</label>
						<input type="text" name="apellido_padre" onkeypress="return soloL()"  value="<?php echo $representante['apellido_repre']; ?>" size="28" maxlength="30" >
<br>
						<label>Nombre(s):</label>
						<input type="text" name="nombre_padre"  onkeypress="return soloL()" value="<?php echo $representante['nombre_repre']; ?>"  size="28" maxlength="30" >
<br>
						<label>Cédula:</label>
						<select name="nacion_padre" class="nacionalidad">
							<option value="v">V</option>
							<option value="e">E</option>
						</select>	
						<input type="text" name="cedula_padre" onkeypress="return soloD()"   value="<?php echo $representante['cedula_repre']; ?>"  size="20" maxlength="8" >
											
<br>
						<label>Direccion:</label>
						<input type="text" name="direccion_padre"   value="<?php echo $representante['direccion_repre']; ?>"  size="28" maxlength="30" >
<br>
						<label>E-mail:</label>
						<input type="email" name="email_padre"   value="<?php echo $representante['email_repre']; ?>"  size="20" maxlength="40">
<br>
						<label id="large">Telefono de habitacion:</label>
						<input type="text" name="telefono_padre"  onkeypress="return soloD()"  value="<?php echo $representante['telefono_repre']; ?>" -size="10" maxlength="11" >
<br>
						<label>Celular:</label>
						<input type="text" name="celular_padre" onkeypress="return soloD()"  value="<?php echo $representante['celular_repre']; ?>" value"" size="10" maxlength="11">
<br>
						<label>Otro:</label>
						<input type="text" name="otro_telefono_padre" onkeypress="return soloD()"  value="<?php echo $representante['otro_telefono_repre']; ?>" value"" size="10" maxlength="11">
<br>	
						<label>¿Trabaja?</label>
						<select name="trabajo2" id="trabajo2" onchange="cambia7(this.value)">
						<option value="">Seleccione</option>
							<option value="0"<?php if($representante['lugar_trabajo_repre']=='') echo "selected"; ?> >No</option>
							<option value="1" <?php if($representante['lugar_trabajo_repre']!='') echo "selected"; ?> >Si</option>
						</select>
						<br>
						<div id="trabajo2_cambia" style="display: block">
						<label>¿Donde?</label>
						<input type="text"  value="<?php echo $representante['lugar_trabajo_repre']; ?>" name="lugar_padre" size="16" maxlength="40">
<br>
						<label id="large">Telefono del trabajo:</label>
						<input type="text"  value="<?php echo $representante['telefono_trabajo_repre']; ?>" name="telefono_trabajo_padre" value"" size="10" maxlength="11" onkeypress="return soloD()" ></div>
						<br>
<?php }?>