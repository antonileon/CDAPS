<?php
  require '../config/conexion.php';
  extract($_REQUEST);

  $sq= "SELECT * FROM personas te INNER JOIN datos_personas tei ON te.id_personas=tei.id_datos_personas WHERE te.id_personas='$id'";
  $result = mysqli_query($conectar,$sq);
  if ($row=mysqli_fetch_array($result)) {
    $id = $row['id_personas'];
    $estatus = $row['estatus'];
    $fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_registro'])));
?>
<?php if ($estatus=="Censado(a)") { ?>
<div>
    <section class="content-header">
      <h1>Consultas<small>Ver Personas Censada</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-danger color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-globe"></i> <span> <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> <small class="label label-primary"><i class="fa fa-user"></i> <?php echo $row['estatus']; ?></small></span></h3>
          <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr align="center">
              <th colspan="4"><center><i class="fa fa-user"></i> Datos Personales</center></th>
            </tr>
            <tr>
              <td><b>Cédula:</b> <?php echo $row['cedula']; ?></td>
              <td><b>Nombre:</b> <?php echo $row['nombre']; ?></td>
              <td><b>Apellido:</b> <?php echo $row['cedula']; ?></td>
              <td><b>Estado Civil:</b> <?php echo $row['estado_civil']; ?></td>
            </tr>
            <tr>
              <td><b>Estado Civil:</b> <?php echo $row['sexo']; ?></td>
              <td><b>Sexo:</b> <?php echo $row['telefono']; ?></td>
              <td><b>Lugar de Nacimiento:</b> <?php echo $row['lugar_nacimiento']; ?></td>
              <td><b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?></td>
            </tr>
            <tr>
              <td><b>Nivel de Estudio:</b> <?php echo $row['nivel_estudio']; ?></td>
              <td><b>Profesión:</b> <?php echo $row['profesion']; ?></td>
              <td><b>Número de Hijo:</b> <?php echo $row['num_hijos']; ?></td>
              <td><b>Personas a Cargo:</b> <?php echo $row['personas_cargo']; ?></td>
            </tr>
            <tr>
              <td colspan="4"> <b>Discapacidad:</b> <?php echo $row['discapacidad']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <th colspan="4"><center><i class="fa fa-home"></i> Datos de Domicilio</center></th>
            </tr>
            <tr>
              <td><b>Estado:</b> <?php echo $row['estado']; ?></td>
              <td><b>Ciudad:</b> <?php echo $row['ciudad']; ?></td>
              <td><b>Municipio:</b> <?php echo $row['municipio']; ?></td>
              <td><b>Parroquia:</b> <?php echo $row['parroquia']; ?></td>
            </tr>
            <tr>
              <td><b>Tipo de Vivienda:</b> <?php echo $row['tipo_vivienda']; ?></td>
              <td><b>Condición de la Vivienda:</b> <?php echo $row['condicion_vivienda']; ?></td>
              <td colspan="2"><b>Dirección:</b> <?php echo $row['direccion']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <th colspan="4"><center><i class="fa fa-money"></i> Datos Financiero</center></th>
            </tr>
            <tr>
              <td><b>¿Trabaja:?</b> <?php echo $row['trabaja']; ?></td>
              <td><b>Fecha de ingreso:</b> <?php echo $row['fecha_ingreso']; ?></td>
              <td><b>Nombre de la Empresa:</b> <?php echo $row['nombre_empresa']; ?></td>
              <td><b>Cargo de Trabajo:</b> <?php echo $row['cargo_trabajo']; ?></td>
            </tr>
            <tr>
              <td><b>Ingreso Fijo:</b> <?php echo $row['ingreso_fijo']; ?></td>
              <td><b>Otros Ingresos:</b> <?php echo $row['otros_ingresos']; ?></td>
              <td><b>Gasto Total:</b> <?php echo $row['gasto_total']; ?></td>
            </tr>
          </table><br>
          <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=listado_censo" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
            <a href="#" class="btn btn-success" data-target="#myModal2" data-toggle="modal" >Beneficiar Personas... <i class="fa fa-check-square"></i></a>
          </div>
        </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Beneficiar persona</h4>
      </div>
      <div class="modal-body"> ¿Estas seguro de beneficiar a esta persona…? 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <a href="<?php echo 'index.php?llave=beneficiar_persona&id='.$id.'';?>" type="button" class="btn btn-success">Beneficiar Persona</a>
      </div>
    </div>
  </div>
</div>
<?php }  ?>

<?php if ($estatus=="Inhabilitado(a)") { ?>
<div>
    <section class="content-header">
      <h1>Consultas<small>Ver Personas Censada</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-danger color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-globe"></i> <span> <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> <small class="label label-danger"><i class="fa fa-user"></i> <?php echo $row['estatus']; ?></small></span></h3>
          <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr align="center">
              <th colspan="4"><center><i class="fa fa-user"></i> Datos Personales</center></th>
            </tr>
            <tr>
              <td><b>Cédula:</b> <?php echo $row['cedula']; ?></td>
              <td><b>Nombre:</b> <?php echo $row['nombre']; ?></td>
              <td><b>Apellido:</b> <?php echo $row['cedula']; ?></td>
              <td><b>Estado Civil:</b> <?php echo $row['estado_civil']; ?></td>
            </tr>
            <tr>
              <td><b>Estado Civil:</b> <?php echo $row['sexo']; ?></td>
              <td><b>Sexo:</b> <?php echo $row['telefono']; ?></td>
              <td><b>Lugar de Nacimiento:</b> <?php echo $row['lugar_nacimiento']; ?></td>
              <td><b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?></td>
            </tr>
            <tr>
              <td><b>Nivel de Estudio:</b> <?php echo $row['nivel_estudio']; ?></td>
              <td><b>Profesión:</b> <?php echo $row['profesion']; ?></td>
              <td><b>Número de Hijo:</b> <?php echo $row['num_hijos']; ?></td>
              <td><b>Personas a Cargo:</b> <?php echo $row['personas_cargo']; ?></td>
            </tr>
            <tr>
              <td colspan="4"> <b>Discapacidad:</b> <?php echo $row['discapacidad']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <th colspan="4"><center><i class="fa fa-home"></i> Datos de Domicilio</center></th>
            </tr>
            <tr>
              <td><b>Estado:</b> <?php echo $row['estado']; ?></td>
              <td><b>Ciudad:</b> <?php echo $row['ciudad']; ?></td>
              <td><b>Municipio:</b> <?php echo $row['municipio']; ?></td>
              <td><b>Parroquia:</b> <?php echo $row['parroquia']; ?></td>
            </tr>
            <tr>
              <td><b>Tipo de Vivienda:</b> <?php echo $row['tipo_vivienda']; ?></td>
              <td><b>Condición de la Vivienda:</b> <?php echo $row['condicion_vivienda']; ?></td>
              <td colspan="2"><b>Dirección:</b> <?php echo $row['direccion']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <th colspan="4"><center><i class="fa fa-money"></i> Datos Financiero</center></th>
            </tr>
            <tr>
              <td><b>¿Trabaja:?</b> <?php echo $row['trabaja']; ?></td>
              <td><b>Fecha de ingreso:</b> <?php echo $row['fecha_ingreso']; ?></td>
              <td><b>Nombre de la Empresa:</b> <?php echo $row['nombre_empresa']; ?></td>
              <td><b>Cargo de Trabajo:</b> <?php echo $row['cargo_trabajo']; ?></td>
            </tr>
            <tr>
              <td><b>Ingreso Fijo:</b> <?php echo $row['ingreso_fijo']; ?></td>
              <td><b>Otros Ingresos:</b> <?php echo $row['otros_ingresos']; ?></td>
              <td><b>Gasto Total:</b> <?php echo $row['gasto_total']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <td colspan="4"><b>Inhabilitado:</b> <?php echo $row['motivo_eliminar']; ?></td>
            </tr>
          </table><br>
          <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=listado_inhabilitado" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php }  ?>
<?php if ($estatus=="Beneficiado(a)") { ?>
<div>
    <section class="content-header">
      <h1>Consultas<small>Ver Personas Censada</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="content">
      <div class="box box-danger color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-globe"></i> <span> <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> <small class="label label-success"><i class="fa fa-user"></i> <?php echo $row['estatus']; ?></small></span></h3>
          <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr align="center">
              <th colspan="4"><center><i class="fa fa-user"></i> Datos Personales</center></th>
            </tr>
            <tr>
              <td><b>Cédula:</b> <?php echo $row['cedula']; ?></td>
              <td><b>Nombre:</b> <?php echo $row['nombre']; ?></td>
              <td><b>Apellido:</b> <?php echo $row['cedula']; ?></td>
              <td><b>Estado Civil:</b> <?php echo $row['estado_civil']; ?></td>
            </tr>
            <tr>
              <td><b>Estado Civil:</b> <?php echo $row['sexo']; ?></td>
              <td><b>Sexo:</b> <?php echo $row['telefono']; ?></td>
              <td><b>Lugar de Nacimiento:</b> <?php echo $row['lugar_nacimiento']; ?></td>
              <td><b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?></td>
            </tr>
            <tr>
              <td><b>Nivel de Estudio:</b> <?php echo $row['nivel_estudio']; ?></td>
              <td><b>Profesión:</b> <?php echo $row['profesion']; ?></td>
              <td><b>Número de Hijo:</b> <?php echo $row['num_hijos']; ?></td>
              <td><b>Personas a Cargo:</b> <?php echo $row['personas_cargo']; ?></td>
            </tr>
            <tr>
              <td colspan="4"> <b>Discapacidad:</b> <?php echo $row['discapacidad']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <th colspan="4"><center><i class="fa fa-home"></i> Datos de Domicilio</center></th>
            </tr>
            <tr>
              <td><b>Estado:</b> <?php echo $row['estado']; ?></td>
              <td><b>Ciudad:</b> <?php echo $row['ciudad']; ?></td>
              <td><b>Municipio:</b> <?php echo $row['municipio']; ?></td>
              <td><b>Parroquia:</b> <?php echo $row['parroquia']; ?></td>
            </tr>
            <tr>
              <td><b>Tipo de Vivienda:</b> <?php echo $row['tipo_vivienda']; ?></td>
              <td><b>Condición de la Vivienda:</b> <?php echo $row['condicion_vivienda']; ?></td>
              <td colspan="2"><b>Dirección:</b> <?php echo $row['direccion']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <th colspan="4"><center><i class="fa fa-money"></i> Datos Financiero</center></th>
            </tr>
            <tr>
              <td><b>¿Trabaja:?</b> <?php echo $row['trabaja']; ?></td>
              <td><b>Fecha de ingreso:</b> <?php echo $row['fecha_ingreso']; ?></td>
              <td><b>Nombre de la Empresa:</b> <?php echo $row['nombre_empresa']; ?></td>
              <td><b>Cargo de Trabajo:</b> <?php echo $row['cargo_trabajo']; ?></td>
            </tr>
            <tr>
              <td><b>Ingreso Fijo:</b> <?php echo $row['ingreso_fijo']; ?></td>
              <td><b>Otros Ingresos:</b> <?php echo $row['otros_ingresos']; ?></td>
              <td><b>Gasto Total:</b> <?php echo $row['gasto_total']; ?></td>
            </tr>
            <tr><td></td></tr>
            <tr>
              <td colspan="4"><b>Beneficiado:</b> <?php echo $row['motivo_beneficiar']; ?></td>
            </tr>
          </table><br>
          <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=listado_beneficiado" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } } ?>