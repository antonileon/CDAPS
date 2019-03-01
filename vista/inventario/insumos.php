<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');

  $sql= "SELECT insumos.id_insumos ides, insumos.codigo_insumo c1, insumos.tipo c2, insumos.nombre c3, 
  insumos.marca c4, insumos.fecha_registro c5, proveedores.nombre_proveedor c6 FROM insumos 
  INNER JOIN proveedores ON insumos.id_proveedores = proveedores.id_proveedores ORDER BY ides DESC";
  $query = mysqli_query($conectar, $sql);
?>
    <section class="content-header">
      <h1>Inventario<small>Insumos Registrados</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li class="active">Insumos</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box">
            <div class="box-header">
              <div class="col-xs-8">
              <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Insumos Registrados</h3>  
              </div>
              <div class="col-xs-2">
                <a href="index.php?llave=registrar_insumo" class="btn btn-block btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Registrar Insumos</a>
              </div>
              <div class="col-xs-2">
                <a href="reportes/reporte_insumos.php" target="_blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Proveedor</th>
                  <th>Código</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Marca</th>
                  <th>Fecha de Registro</th>
                  <th>Opciones</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Proveedor</th>
                  <th>Código</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Marca</th>
                  <th>Fecha de Registro</th>
                  <th>Opciones</th>
                </tr>
                </tfoot>
                <tbody>
                  <?php
                    while($row=mysqli_fetch_array($query)) {
                      $id_insumos = $row['ides'];
                      echo '<tr>';
                      echo '<td>'.mb_convert_encoding($row['ides'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['c6'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['c1'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['c2'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['c3'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['c4'], "UTF-8").'</td>';
                      echo '<td>'.mb_convert_encoding($row['c5'], "UTF-8").'</td>';
                      echo '<td align="center">';
                        echo ' <a href="index.php?llave=modificar_insumo&id_insumos='.$row['ides'].'" data-toggle="tooltip" data-placement="top" title="Modificar"><button type="button" class="btn btn-success btn-xs">
                        <i class="fa fa-edit"></i></button></a>';
                        //echo ' <a href="eliminar_usuario.php?id='.$row['id'].'" data-toggle="tooltip" onclick="return Eliminar()" data-placement="top" title="Eliminar"><button type="button" class="btn btn-danger btn-xs">
                        //<i class="fa fa-trash"></i></button></a>';
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
