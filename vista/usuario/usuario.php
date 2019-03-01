<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');
  
  extract($_REQUEST);
  $sql="SELECT * FROM usuario ORDER BY id DESC";
  $query = mysqli_query($conectar, $sql);
?>
    <section class="content-header">
      <h1>Usuario<small>Usuarios Registrados</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuario</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <div class="col-xs-10">
              <h3 class="box-title"><i class="fa fa-users"></i> Usuarios Registrados</h3>  
              </div>
              <div class="col-xs-2">
              <?php if($_SESSION['tipocuenta']=="Administrador(a)"){  ?>
                <a href="index.php?llave=registrar_usuario" class="btn btn-block btn-primary btn-sm"><i class="ion-android-person-add"></i> Registrar Usuario</a>
              <?php } ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                <th>ID</th>
                  <th>Usuario</th>
                  <th>Tipo de Cuenta</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cédula</th>
                  <th>Email</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Usuario</th>
                  <th>Tipo de Cuenta</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cédula</th>
                  <th>Email</th>
                  <th>Opciones</th>
                </tr>
                </tfoot>
                <tbody>
                  <?php
                    while($row=mysqli_fetch_array($query)) {
                      $id = $row['id'];
                      $usuario = $row['usuario'];
                      echo '<tr>';
                      echo '<td>'.mb_convert_encoding($row['id'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['usuario'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['tipocuenta'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['nombre'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['apellido'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['cedula'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['email'], "UTF-8").'</td>';
                      echo '<td align="center">';

                      if($_SESSION['tipocuenta']=="Administrador(a)"){
                        echo '<a href="index.php?llave=ver_usuario&id='.$row['id'].'" data-toggle="tooltip" data-placement="top" title="Ver"><button type="button" class="btn btn-primary btn-xs">
                        <i class="ion-eye"></i></button></a>';
                        echo ' <a href="index.php?llave=modificar_usuario&id='.$row['id'].'&usuario='.$row['usuario'].'" data-toggle="tooltip" data-placement="top" title="Modificar"><button type="button" class="btn btn-success btn-xs">
                        <i class="fa fa-edit"></i></button></a>';
                        echo ' <a href="index.php?llave=eliminar_usuario&id='.$row['id'].'&usuario='.$row['usuario'].'" data-toggle="tooltip" onclick="return Eliminar()" data-placement="top" title="Eliminar"><button type="button" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i></button></a>';
                      }
                      echo '</td>';
                      echo '</tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>