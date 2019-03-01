<?php 
	require 'config/conexion.php';
	$sql = mysqli_query($conectar,"SELECT logo FROM configuracion");
	$row = mysqli_fetch_array($sql);
?>
<header class="jumbotron">
  <div class="container-img">
    <img src="img/<?php echo $row['logo']; ?>" class="img-responsive hidden-xs" id="Image-logo">
  </div>
  <div class="container">
    <h3> Centro de Alimentación </h3>
    <div class="pull-left hidden-xs">
      <p>"Pueblo Socialista".</p>
    </div>
  </div>
</header>