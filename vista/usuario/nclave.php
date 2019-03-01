<?php   
    // Este Fichero recibe y procesa los datos del formulario de recuperacion de contraseña
    // En el que se escriben usuario y email
    //recogemos las variables enviadas por el formulario
    function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //recuerde que debe declarar $pass como un array
    $alphaLength = strlen($alphabet) - 1; //poner la longitud -1 en caché
    for ($i = 0; $i < 8; $i++) {
      $n = rand(0, $alphaLength);
      $pass[] = $alphabet[$n];
    }
    return implode($pass); //convertir el array en una cadena
  }
    $usuario = $_POST['usuario'];
    $pregunta= $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];

     /*Hacemos la conexion al servidor y la base de datos*/
     include ('../../config/conexion.php');

    // consultamos si existe $usuario + $email
    $res="SELECT * FROM usuario WHERE pregunta='$pregunta' AND respuesta='$respuesta'";
    $query = mysqli_query($conectar,$res);

    if (mysqli_num_rows($query)==0) {
      // Si no existe, datos incorrecto y fin del proceso y volvemos al formulario de recuperacion
      echo"<script>alert('Respuesta no es Verdadera.');
               window.location.href='recuperar_clave.php'</script>";
    } else {
      $better_token =md5(randomPassword());
      $better_token =substr($better_token, 0, 8);
      
      $res1 = "UPDATE usuario SET password ='".md5($better_token)."' WHERE usuario='$usuario' AND pregunta='$pregunta' AND respuesta='$respuesta'";
      $query1 = mysqli_query($conectar,$res1);
      
      if ($res1) {
        mail($pregunta, "Recuperacion de clave","Tu clave nueva es: $better_token");
        //header('Location: clave_nueva.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>CDAPS | Recuperar Contraseña</title>
  <link rel="shortcut icon" href="../img/Log.jpg">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../estilo/bootstrap/css/bootstrap.min.css">
  <!-- Estilo del Inicio de Sesión -->
  <link rel="stylesheet" href="../../estilo/css/index.css">

  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../estilo/bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../estilo/bootstrap/css/ionicons.min.css">
</head>
<body>
<!-- Header -->
<header class="jumbotron">
  <div class="container-img">
    <img src="../../img/log.jpg" class="img-responsive hidden-xs" id="Image-logo">
  </div>
  <div class="container">
    <h3> Centro de Alimentación </h3>
    <div class="pull-left hidden-xs">
      <p>"Pueblo Socialista".</p>
    </div>
  </div>
</header>
<!-- Fin del Header -->
<div class="wrapper">
	<div class="page-wrapper">
		<div class="login-form">
			<div class="form-header">
				<h3> <span class="bienvenido">Recuperar Contraseña</span>
        <img src="../../img/log.jpg" class="img-responsive" id="Image-logoo"></h3>
			</div>
			<div class="ContentForm">
				<form id="recuperar-clave" method="POST" class="form-signin" role="form" action="nclave.php">
					<div class="input-group input-group-lg">
					  <?php  echo "<h1 align='center'>Tu Nueva Clave es: <br> <span style='color:red;'> $better_token</span></h1>"; } }?>
					</div><br>
					<a class="btn btn-block bt-login" href="../index.php" id="submit_btn" > <i class="fa fa-chevron-right"></i> Iniciar Sesión</a>
				</form>
			</div>
		</div>
  <footer class="footer navbar-footer">
    <div class="pull-right hidden-xs">
      Desarrollado por: Natera, Manzo, Castillo. <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="index.php" data-toggle="tooltip" data-placement="top" title="C.D.A.P.S" style="color:white;">C.D.A "Pueblo Socialista"</a>.</strong> Todo los Derechos Reservado.
  </footer>
	</div>
</div>
  <script src="../../js/jquery.validate.min.js"></script>
  <script src="../../js/login.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>