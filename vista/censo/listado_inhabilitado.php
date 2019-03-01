<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php');

      $sq= "SELECT * FROM personas INNER JOIN datos_personas ON personas.id_personas = datos_personas.id_datos_personas 
    WHERE personas.estatus = 'Inhabilitado(a)' ORDER BY cedula ";
    $query = mysqli_query($conectar,$sq) or die ("ERROR 22 ".mysqli_error());
?>
    <section class="content-header">
      <h1>Consultas<small>Personas Inhabilitadas</small></h1>
      <ol class="breadcrumb">
        <li><a href="../home.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Consulta</li>
        <li><a href="#"><i class="active"></i> Personas Inhabilitadas</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="index.php?llave=listado_censo">Personas Censada</a></li>
              <li><a href="index.php?llave=listado_beneficiado">Personas Beneficiada</a></li>
              <li class="active-danger"><a href="index.php?llave=listado_inhabilitado">Personas Inhabilitada</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <div class="box box-danger">
                <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Estado Civil</th>
                        <th>Telefono</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                        while($row=mysqli_fetch_array($query)) {
                          $id = $row['id_personas'];
                          echo '<tr>';
                          echo '<td>'.mb_convert_encoding($row['cedula'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['nombre'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['apellido'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['estado_civil'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['telefono'], "UTF-8").'</td>';
                          echo '<td>'.mb_convert_encoding($row['fecha_nacimiento'], "UTF-8").'</td>';
                          echo '<td align="center"> <small class="label label-danger"><i class="fa fa-close"></i> '.mb_convert_encoding($row['estatus'], "UTF-8").'</small></td>';
                          echo '<td align="center">';

                          echo '<a href="index.php?llave=ver_persona&id='.$row['id_personas'].'" data-toggle="tooltip" data-placement="top" title="Ver"><button type="button" class="btn btn-primary btn-sm">
                          <i class="ion-eye"></i></button></a>';
                          if($_SESSION['tipocuenta']=="Administrador(a)"){
                            echo ' <a href="index.php?llave=bene_persona&id='.$row['id_personas'].'" data-placement="top" title="Beneficiar Persona"><button type="button" class="btn btn-success btn-sm">
                            <i class="ion-arrow-return-left"></i></button></a>';
                            echo ' <a href="reportes/reporte_personas1.php?id='.$row['id_personas'].'" target="_blank" title="Reporte PDF" data-toggle="tooltip" data-placement="top" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i></a>';
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
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
    </section>