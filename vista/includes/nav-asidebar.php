<?php
  require '../config/conexion.php';
  $id = $_SESSION['id'];
  $sql ="SELECT nombre, apellido, profile FROM usuario where id='$id'";
  $query = mysqli_query($conectar, $sql);
  $row=mysqli_fetch_assoc($query);
  $ruta_img = $row ['profile'];

  $sql1 = mysqli_query($conectar, " SELECT siglas FROM configuracion");
  $row1 = mysqli_fetch_array($sql1);
?>
<!--  * HEADER ** HEADER ** HEADER ** HEADER * -->
<header class="main-header">
  <!-- Logo -->
  <a href="../" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>CDA</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b><?php echo $row1['siglas']; ?></b> </span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav navbar">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?=$_SESSION['tipocuenta'] ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="index.php?llave=perfil"><i class="fa fa-fw fa-user"></i> Mi Perfil</a></li>
            <li class="divider"></li>
            <li><a href="../salir.php"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<!--  * FIN DE HEADER ** FIN DE HEADER ** FIN DE HEADER ** FIN DE HEADER * -->

<!--  * NAV-ASIDEBAR ** NAV-ASIDEBAR ** NAV-ASIDEBAR ** NAV-ASIDEBAR * -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php
          $profile = $row['profile'];
          if ($profile == "male.png") {
             echo "<img class='profile-user-img img-responsive img-circle' src='../img/male.png'>";
          } else if ($profile == "female.png") {
            echo "<img class='profile-user-img img-responsive img-circle' src='../img/female.png'>";
          } else if ($profile == "$ruta_img") { ?>
            <img class="profile-user-img img-responsive img-circle" src="../img/<?=$_SESSION['usuario'];?>/<?php echo $ruta_img;?>" alt="Foto de Perfil">
        <?php } ?>
      </div>
      <div class="pull-left info">
        <p>
          <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?>
        </p>
        <a href="#"><i class="fa fa-circle text-green"></i> Conectado</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header"><h6 align="center" style="color:white;">MENÚ DE NAVEGACIÓN</h6></li>
      <li class="active treeview">
        <a href="index.php">
          <i class="fa fa-dashboard"></i> <span>Tablero</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">New</small>
          </span>
        </a>
      </li>
      <?php if($_SESSION['tipocuenta']=="Administrador(a)" || $_SESSION['tipocuenta']=="Voluntario") { ?>
      <li class="treeview">
        <a href="index.php?llave=censo">
          <i class="fa fa-pie-chart"></i>
          <span>Censo</span>
            <span class="pull-right-container">
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="index.php?llave=menu_comida">
          <i class="fa fa-coffee"></i>
          <span>Menú de Comida</span>
            <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php } ?>
      <?php if($_SESSION['tipocuenta']=="Administrador(a)" ) { ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Inventario</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?llave=inventario"><i class="fa fa-circle-o text-aqua"></i> Inventario</a></li>
          <li><a href="index.php?llave=proveedores"><i class="fa fa-circle-o text-aqua"></i> Proveedores</a></li>
          <li><a href="index.php?llave=insumos"><i class="fa fa-circle-o text-aqua"></i> Insumos</a></li>
        </ul>
      </li>
      <?php } ?>
      <?php if($_SESSION['tipocuenta']=="Administrador(a)" || $_SESSION['tipocuenta']=="Supervisor(a)" || $_SESSION['tipocuenta']=="Voluntario") { ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Consultas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?llave=listado_censo"><i class="fa fa-circle-o text-aqua"></i> Personas</a></li>
          <li><a href="index.php?llave=inventario"><i class="fa fa-circle-o text-aqua"></i> Inventario</a></li>
        </ul>
      </li>
      <?php } ?>
      <?php if($_SESSION['tipocuenta']=="Administrador(a)" ) { ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Ajustes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="index.php?llave=configuracion"><i class="fa fa-cogs  "></i> Configuración</a></li>
          <li><a href="index.php?llave=respaldar"><i class="fa fa-circle-o text-aqua"></i> Respaldar BD</a></li>
          <li><a href="index.php?llave=restaurar"><i class="fa fa-circle-o text-aqua"></i> Restaurar BD</a></li>
          <li><a href="index.php?llave=auditoria"><i class="fa fa-circle-o text-aqua"></i> Auditoria</a></li>
          <li><a href="index.php?llave=usuario"><i class="fa fa-circle-o text-aqua"></i> Usuario</a></li>
        </ul>
      </li>
      <?php } ?>
      <li class="treeview">
        <a href="../salir.php">
          <i class="fa fa-power-off"></i> <span>Cerrar Sesión</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-red"><i class="fa fa-unlock-alt"></i></small>
          </span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<!--  * FIN DE NAV-ASIDEBAR ** FIN DE NAV-ASIDEBAR ** FIN DE NAV-ASIDEBAR ** FIN DE NAV-ASIDEBAR * -->