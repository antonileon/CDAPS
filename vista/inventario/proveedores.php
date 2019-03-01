<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');

  $sql="SELECT * FROM proveedores ORDER BY nombre_proveedor";
  $query = mysqli_query($conectar, $sql);
?>
    <section class="content-header">
      <h1>Inventario<small>Proveedores Registrados</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li class="active">Proveedores</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <div class="col-xs-8">
              <h3 class="box-title"><i class="fa fa-truck"></i> Proveedores Registrados</h3>  
              </div>
              <div class="col-xs-2">
                <a href="index.php?llave=registrar_proveedores" class="btn btn-block btn-primary btn-sm"><i class="fa fa-truck"></i> Registrar Proveedor</a>
              </div>
              <div class="col-xs-2">
              <?php if($_SESSION['tipocuenta']=="Administrador(a)"){  ?>
                <a href="reportes/reporte_proveedor.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
              <?php } ?>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Rif</th>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Email</th>
                  <th>Estatus</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    while($row=mysqli_fetch_array($query)) {
                      $id_proveedores = $row['id_proveedores'];
                      echo '<tr>';
                      echo '<td>'.mb_convert_encoding($row['id_proveedores'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['tipo_rif'], "UTF-8").-mb_convert_encoding($row['rif'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['nombre_proveedor'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['telefono'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['email'], "UTF-8").'</td>'; ?>
                      <td align="center">
                        <?php if ($row['estatus']=="Activo") { ?>
                        <small class="label label-success"><i class="fa fa-clock-o"></i> <?php echo $row['estatus']; ?></small>
                        <?php } else { ?>
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $row['estatus']; ?></small>
                        <?php } ?>
                      </td>
                      <?php echo '<td align="center">';
                        echo '<a href="index.php?llave=ver_registro&id_proveedores='.$row['id_proveedores'].'" data-toggle="tooltip" data-placement="top" title="Ver"><button type="button" class="btn btn-primary btn-xs">
                        <i class="ion-eye"></i></button></a>';
                        echo ' <a href="index.php?llave=modificar_proveedor&id_proveedores='.$row['id_proveedores'].'&nombre_proveedor='.$row['nombre_proveedor'].'" title="Modificar"><button type="button" class="btn btn-success btn-xs">
                        <i class="fa fa-edit"></i></button></a>';
                        if ($row['estatus']=="Activo") {
                        echo ' <a href="index.php?llave=eliminar_proveedor&id_proveedores='.$row['id_proveedores'].'&nombre_proveedor='.$row['nombre_proveedor'].'" onclick="return EliminarPro()" title="Inhabilitar Proveedor"><button type="button" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i></button></a>';
                      } else {
                        echo ' <a href="index.php?llave=eliminar_proveedor&id_proveedores='.$row['id_proveedores'].'&nombre_proveedor='.$row['nombre_proveedor'].'" onclick="return ActivarPro()" title="Activar Proveedor"><button type="button" class="btn btn-warning btn-xs">
                        <i class="fa fa-undo"></i></button></a>';
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
