<?php
  require "../../config/conexion.php";

  $usuario = $_POST['usuario'];
  
  $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' ";
  $query = mysqli_query($conectar, $sql);
  $row = mysqli_fetch_array($query); 
  if (mysqli_num_rows($query) != 0){
    $pregunta = $row['pregunta'];
    $ruta_img = $row['profile'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>CDAPS | Recuperar Contraseña</title>
  <link rel="shortcut icon" href="../../img/Log.jpg">
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
        <img src="../../img/<?php echo $usuario;?>/<?php echo $ruta_img;?>" class="img-responsive" id="Image-logoo"></h3>
      </div>
      <div class="ContentForm">
        <form id="recuperar-clave" method="POST" class="form-signin" role="form" action="nclave.php">
          <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario" value="<?php echo $row['usuario']; ?>" readonly />
          </div><br>
          <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <select name="pregunta" id="pregunta" class="form-control" readonly>
              <option value="1" <?php if ($pregunta=="1") {?> selected="selected" <?php } ?> >¿Nombre de tu mascota?</option>
              <option value="2" <?php if ($pregunta=="2") {?> selected="selected" <?php } ?> >¿Segundo apellido de tu madre?</option>
              <option value="3" <?php if ($pregunta=="3") {?> selected="selected" <?php } ?> >¿Heroe Favorito?</option>
              <option value="4" <?php if ($pregunta=="4") {?> selected="selected" <?php } ?> >¿Equipo Favorito?</option>
              <option value="5" <?php if ($pregunta=="5") {?> selected="selected" <?php } ?> >¿Nombre de su mejor amigo?</option> 
            </select>
          </div><br>
          <div class="input-group input-group-lg">
            <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user"></i></span>
            <input name="respuesta" id="respuesta" type="text" class="form-control" placeholder="Respuesta de Seguridad" required/>
          </div><br>
          <button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Cargando...."> <i class="fa fa-chevron-right"></i> Recuperar Contraseña</button>
        </form>
      </div>
      <div class="form-login">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <center><i class="glyphicon glyphicon-home"></i>
            <span> <a href="../index.php" id="link"> Iniciar Sesión </a></span></center>
          </div>
        </div>
      </div>
    </div>
  <footer class="footer navbar-footer">
    <div class="pull-right hidden-xs">
      Desarrollado por: Natera, Manzo, Castillo. <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="index.php" data-toggle="tooltip" data-placement="top" title="C.D.A.P.S" style="color:white;">C.D.A "Pueblo Socialista"</a>.</strong>
    Todo los Derechos Reservado.
  </footer>
  </div>
</div>
  <script src="../../js/jquery.validate.min.js"></script>
  <script src="../../js/login.js"></script>
</body>
</html>
<?php 
  } 
    else {
      echo"<script>alert('El Usuario no existe.');
          window.location.href='recuperar_clave.php'</script>";
    }
?>
<?php ob_end_flush(); ?>