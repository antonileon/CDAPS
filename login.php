<?php 
	require 'config/conexion.php';
	$sql = mysqli_query($conectar,"SELECT logo FROM configuracion");
	$row = mysqli_fetch_array($sql);
?>
	<div class="login-form">
		<div class="form-header">
			<h3> <span class="bienvenido">Bienvenido</span>
    	    <img src="img/<?php echo $row['logo']; ?>" class="img-responsive" id="Image-logoo"></h3>
		</div>
		<div class="ContentForm">
			<form id="login-form" method="post" class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         		<div class="messages">
            	<?php if($errors) {
            		foreach ($errors as $key => $value) {
                	echo '<center><div class="alert alert-danger mensajes" role="alert">
    	        	<i class="glyphicon glyphicon-exclamation-sign"></i>
	           		'.$value.'</div></center>';                    
        	    	}
            	} ?>
        		</div>
				<div class="input-group input-group-lg">
			  		<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
					<input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario"/>
				</div><br>
				<div class="input-group input-group-lg">
					<span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
					<input name="password" id="password" type="password" class="form-control" placeholder="Contraseña"/>
				</div><br>	
				<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Iniciando Sesión...."> <i class="fa fa-chevron-right"></i> Iniciar Sesión</button>
			</form>
		</div>
		<div class="form-login">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<center><i class="glyphicon glyphicon-lock"></i>
					<span> <a href="vista/usuario/recuperar_clave.php" id="link">¿Olvidó su contraseña? </a></span></center>
				</div>
			</div>
		</div>
	</div>