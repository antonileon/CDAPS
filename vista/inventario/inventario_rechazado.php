<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');

  $sql5= "SELECT inventario.id_inventario ides, inventario.estado c1, inventario.observaciones c2, inventario.cantidad c3, 
  inventario.fecha_entrega c4, inventario.fecha_vencimiento c5, insumos.codigo_insumo c6, insumos.nombre c7, insumos.marca c8 FROM inventario INNER JOIN insumos 
  ON insumos.id_insumos = inventario.id_insumos WHERE inventario.estado='Rechazado' Order by ides DESC";
  $query5 = mysqli_query($conectar, $sql5);
?>
    <section class="content-header">
      <h1>Inventario<small>Productos Registrados</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li class="active">Inventario</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="index.php?llave=inventario">Inventario Aceptado</a></li>
              <li class="active-danger"><a href="#">Inventario Rechazado </a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <div class="box box-danger">
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Código</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Cantidad</th>
                        <th>Fecha de Registro</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Opciones</th>
                      </tr>
                      </thead>
                      <tfoot>
                      <tr>
                        <th>Código</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Cantidad</th>
                        <th>Fecha de Registro</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Opciones</th>
                      </tr>
                      </tfoot>
                      <tbody>
                      <?php
                        while($row=mysqli_fetch_array($query5)) {
                          $id_inventario = $row['ides'];
                          echo '<tr>';
                          echo '<td>'.mb_convert_encoding($row['c6'], "UTF-8").'</td>';
                          echo '<td><span class="label label-danger">'.mb_convert_encoding($row['c1'], "UTF-8").'</span></td>';
                          echo '<td>'.mb_convert_encoding($row['c7'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['c8'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['c3'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['c4'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['c5'], "UTF-8").'</td>';
                          echo '<td align="center">';
                          echo ' <a href="index.php?llave=modificar_inventario&id_inventario='.$row['ides'].'" title="Modificar"><button type="button" class="btn btn-success btn-xs">
                          <i class="fa fa-edit"></i></button></a>';
                          echo '</td>';
                          echo '</tr>';
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>