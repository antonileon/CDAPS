<?php 
require_once 'config/conexion.php';
session_start();

if(isset($_SESSION['id'])) {
  header('location: vista/');  
}
$errors = array();

if($_POST) {
  $usuario = mysqli_real_escape_string($conectar, $_POST['usuario']); // Escapando caracteres especiales //
  $password = mysqli_real_escape_string($conectar, $_POST['password']); // Escapando caracteres especiales //

  if(empty($usuario) || empty($password)) {
    if($usuario == "") {
      $errors[] = "Se requiere nombre de usuario";
    } 

    if($password == "") {
      $errors[] = "Se requiere contraseña";
    }
  } else {
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $query = mysqli_query($conectar, $sql);

    if(mysqli_num_rows($query) == 1) {
      $password = md5($password);
      // exists
      $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND password = '$password'";
      $query = mysqli_query($conectar, $sql);

      if(mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_array($query);
        $id_usuario = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['tipocuenta'] = $row['tipocuenta'];
        $_SESSION['autentica'] = "SI";

        // set session
        $_SESSION['id'] = $id_usuario;
        header('location: vista/');

        $auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$usuario ','Ha iniciado sesi&oacute;n', CURRENT_TIMESTAMP, CURRENT_TIME)";
        $bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error());

      } else{       
        $errors[] = "La contraseña es incorrecta";
      } // /else
    } else {    
      $errors[] = "El nombre de usuario no existe";   
    } // /else
  } // /else not empty usuario // password 
} // /if $_POST
?>
<!DOCTYPE html>
<html>
<head>
	<title>CDAPS | Inicio de Sesión</title>
  <link rel="shortcut icon" href="img/Log.jpg">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="estilo/bootstrap/css/bootstrap.min.css">
  <!-- Estilo del Inicio de Sesión -->
  <link rel="stylesheet" href="estilo/css/index.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/login.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons.min.css">
  
</head>
<body>
<?php include_once "vista/includes/header.php"; ?>
<div class="wrapper">
	<div class="page-wrapper">
    <?php
      error_reporting(E_ALL ^ E_NOTICE);
      //include "verificar_usuario.php";
      switch($_REQUEST['llave']){
  
        default: include "login.php";break;
      }
    ?>
	</div>
</div>
  <footer class="footer navbar-footer">
    <div class="pull-right hidden-xs">
      Desarrollado por: Natera, Manzo, Castillo. <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="index.php" data-toggle="tooltip" data-placement="top" title="C.D.A.P.S" style="color:white;">C.D.A "Pueblo Socialista"</a>.</strong> Todo los Derechos Reservado.
  </footer>
</body>
</html>