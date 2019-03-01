<?php
  require ('conexion.php');
  $id = $_SESSION['id'];
  $sql ="SELECT nombre, apellido, profile FROM usuario where id='$id'";
  $result = mysqli_query($conectar, $sql);
  $row=mysqli_fetch_assoc($result);
  $ruta_img = $row ['profile'];
?>
<!--  * HEADER ** HEADER ** HEADER ** HEADER * -->
<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>CDA</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>CDAPS</b> </span>
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
            <li><a href="perfil.php"><i class="fa fa-fw fa-user"></i> Mi Perfil</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a></li>
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
        <img class="profile-user-img img-responsive img-circle" src="../img/<?=$_SESSION['usuario']?>/<?php echo $ruta_img;?>" alt="Foto de Perfil">
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
        <a href="../home.php">
          <i class="fa fa-dashboard"></i> <span>Tablero</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">New</small>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="../usuario/usuario.php">
          <i class="fa fa-users"></i>
          <span>Usuario</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="registrar_censo.php">
          <i class="fa fa-pie-chart"></i>
          <span>Censo</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Asistencia</span>
          <span class="pull-right-container"></span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Inventario</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/UI/general.html"><i class="fa fa-circle-o text-aqua"></i> General</a></li>
          <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o text-aqua"></i> Icons</a></li>
          <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o text-aqua"></i> Buttons</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Consultas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/forms/general.html"><i class="fa fa-circle-o text-aqua"></i> General Elements</a></li>
          <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o text-aqua"></i> Advanced Elements</a></li>
          <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o text-aqua"></i> Editors</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-table"></i> <span>Base de Datos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o text-aqua"></i> Respaldar BD</a></li>
          <li><a href="pages/tables/data.html"><i class="fa fa-circle-o text-aqua"></i> Restaurar BD</a></li>
        </ul>
      </li>
      <li>
        <a href="pages/calendar.html">
          <i class="fa fa-calendar"></i> <span>Auditoria</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-blue">17</small>
          </span>
        </a>
      </li>
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