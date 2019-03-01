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
<?php if ($estatus=="Beneficiado(a)") { ?>
    <section class="content-header">
      <h1>Consultas<small>Ver Personas Censada</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <span> <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> <small class="label label-success"><i class="fa fa-user"></i> <?php echo $row['estatus']; ?></small></span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong><i class="fa fa-user"></i> Datos personales</strong><br><br>
            <b>Nombre:</b> <?php echo $row['nombre']; ?>&nbsp;&nbsp;
            <b>Apellido:</b> <?php echo $row['apellido']; ?><br>
            <b>Cédula:</b> <?php echo $row['cedula']; ?><br>

            <b>Sexo:</b> <?php echo $row['sexo']; ?><br>

            <b>Estado Civil:</b> <?php echo $row['estado_civil']; ?><br>
            <b>Teléfono:</b> <?php echo $row['telefono']; ?><br>
            <b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?><br>
            <b>Lugar de Nacimiento:</b> <?php echo $row['lugar_nacimiento']; ?><br>

            <b>Nivel de Estudio:</b> <?php echo $row['nivel_estudio']; ?><br>

            <b>Profesión:</b> <?php echo $row['profesion']; ?><br>
            <b>Número de Hijo:</b> <?php echo $row['num_hijos']; ?>
            <b>Personas a Cargo:</b> <?php echo $row['personas_cargo']; ?><br>
            <b>Discapacidad:</b> <?php echo $row['discapacidad']; ?>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong><i class="fa fa-home"></i> Datos de Domicilio</strong><br><br>
            <b>Estado:</b> <?php echo $row['estado']; ?><br>
            <b>Ciudad:</b> <?php echo $row['ciudad']; ?><br>
            <b>Municipio:</b> <?php echo $row['municipio']; ?><br>
            <b>Parroquia:</b> <?php echo $row['parroquia']; ?><br>
            <b>Dirección:</b> <?php echo $row['direccion']; ?><br>
            <b>Tipo de Vivienda:</b> <?php echo $row['tipo_vivienda']; ?><br>
            <b>Condicion de la Vivienda:</b> <?php echo $row['condicion_vivienda']; ?><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong><b><i class="fa fa-money"></i> Datos Financiero</b></strong><br><br>
            <b>Trabaja:</b> <?php echo $row['trabaja']; ?><br>
            <b>Nombre de la Empresa:</b> <?php echo $row['nombre_empresa']; ?><br>
            <b>Fecha de Ingreso:</b> <?php echo $row['fecha_ingreso']; ?><br>
            <b>Cargo de Trabajo:</b> <?php echo $row['cargo_trabajo']; ?><br>
            <b>Ingreso Fijo:</b> Bs.F. <?php echo $row['ingreso_fijo']; ?><br>
            <b>Otros Ingresos:</b> <?php echo $row['otros_ingresos']; ?><br>
            <b>Gasto Total:</b> <?php echo $row['gasto_total']; ?><br>
        </div>
        <!-- /.col -->
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=listado_beneficiado" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>
<?php if ($estatus=="Censado(a)") { ?>
    <section class="content-header">
      <h1>Consultas<small>Ver Personas Censada</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <span> <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> <small class="label label-primary"><i class="fa fa-user"></i> <?php echo $row['estatus']; ?></small></span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong><i class="fa fa-user"></i> Datos personales</strong><br><br>
            <b>Nombre:</b> <?php echo $row['nombre']; ?>&nbsp;&nbsp;
            <b>Apellido:</b> <?php echo $row['apellido']; ?><br>
            <b>Cédula:</b> <?php echo $row['cedula']; ?><br>

            <b>Sexo:</b> <?php echo $row['sexo']; ?><br>

            <b>Estado Civil:</b> <?php echo $row['estado_civil']; ?><br>
            <b>Teléfono:</b> <?php echo $row['telefono']; ?><br>
            <b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?><br>
            <b>Lugar de Nacimiento:</b> <?php echo $row['lugar_nacimiento']; ?><br>

            <b>Nivel de Estudio:</b> <?php echo $row['nivel_estudio']; ?><br>

            <b>Profesión:</b> <?php echo $row['profesion']; ?><br>
            <b>Número de Hijo:</b> <?php echo $row['num_hijos']; ?>
            <b>Personas a Cargo:</b> <?php echo $row['personas_cargo']; ?><br>
            <b>Discapacidad:</b> <?php echo $row['discapacidad']; ?><br><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong><i class="fa fa-home"></i> Datos de Domicilio</strong><br><br>
            <b>Estado:</b> <?php echo $row['estado']; ?><br>
            <b>Ciudad:</b> <?php echo $row['ciudad']; ?><br>
            <b>Municipio:</b> <?php echo $row['municipio']; ?><br>
            <b>Parroquia:</b> <?php echo $row['parroquia']; ?><br>
            <b>Dirección:</b> <?php echo $row['direccion']; ?><br>
            <b>Tipo de Vivienda:</b> <?php echo $row['tipo_vivienda']; ?><br>
            <b>Condicion de la Vivienda:</b> <?php echo $row['condicion_vivienda']; ?><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong><b><i class="fa fa-money"></i> Datos Financiero</b></strong><br><br>
            <b>Trabaja:</b> <?php echo $row['trabaja']; ?><br>
            <b>Nombre de la Empresa:</b> <?php echo $row['nombre_empresa']; ?><br>
            <b>Fecha de Ingreso:</b> <?php echo $row['fecha_ingreso']; ?><br>
            <b>Cargo de Trabajo:</b> <?php echo $row['cargo_trabajo']; ?><br>
            <b>Ingreso Fijo:</b> Bs.F. <?php echo $row['ingreso_fijo']; ?><br>
            <b>Otros Ingresos:</b> <?php echo $row['otros_ingresos']; ?><br>
            <b>Gasto Total:</b> <?php echo $row['gasto_total']; ?><br>
        </div>
        <!-- /.col -->
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=listado_censo" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
            <a href="#" class="btn btn-success" data-target="#myModal2" data-toggle="modal" >Beneficiar Personas... <i class="fa fa-check-square"></i></a>
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
<?php } ?>
<?php if ($estatus=="Inhabilitado(a)") { ?>
    <section class="content-header">
      <h1>Consultas<small>Ver Personas Censada</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <span> <?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?> <small class="label label-danger"><i class="fa fa-user"></i> <?php echo $row['estatus']; ?></small></span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong style="font-size: 18px;"><i class="fa fa-user"></i> Datos personales</strong><br><br>
            <b>Nombre:</b> <?php echo $row['nombre']; ?>&nbsp;&nbsp;
            <b>Apellido:</b> <?php echo $row['apellido']; ?><br>
            <b>Cédula:</b> <?php echo $row['cedula']; ?><br>

            <b>Sexo:</b> <?php echo $row['sexo']; ?><br>

            <b>Estado Civil:</b> <?php echo $row['estado_civil']; ?><br>
            <b>Teléfono:</b> <?php echo $row['telefono']; ?><br>
            <b>Fecha de Nacimiento:</b> <?php echo $row['fecha_nacimiento']; ?><br>
            <b>Lugar de Nacimiento:</b> <?php echo $row['lugar_nacimiento']; ?><br>

            <b>Nivel de Estudio:</b> <?php echo $row['nivel_estudio']; ?><br>

            <b>Profesión:</b> <?php echo $row['profesion']; ?><br>
            <b>Número de Hijo:</b> <?php echo $row['num_hijos']; ?>
            <b>Personas a Cargo:</b> <?php echo $row['personas_cargo']; ?><br>
            <b>Discapacidad:</b> <?php echo $row['discapacidad']; ?>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <strong style="font-size: 18px;"><i class="fa fa-home"></i> Datos de Domicilio</strong><br><br>
            <b>Estado:</b> <?php echo $row['estado']; ?><br>
            <b>Ciudad:</b> <?php echo $row['ciudad']; ?><br>
            <b>Municipio:</b> <?php echo $row['municipio']; ?><br>
            <b>Parroquia:</b> <?php echo $row['parroquia']; ?><br>
            <b>Dirección:</b> <?php echo $row['direccion']; ?><br>
            <b>Tipo de Vivienda:</b> <?php echo $row['tipo_vivienda']; ?><br>
            <b>Condicion de la Vivienda:</b> <?php echo $row['condicion_vivienda']; ?><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong style="font-size: 18px;"><b><i class="fa fa-money"></i> Datos Financiero</b></strong><br><br>
            <b>Trabaja:</b> <?php echo $row['trabaja']; ?><br>
            <b>Nombre de la Empresa:</b> <?php echo $row['nombre_empresa']; ?><br>
            <b>Fecha de Ingreso:</b> <?php echo $row['fecha_ingreso']; ?><br>
            <b>Cargo de Trabajo:</b> <?php echo $row['cargo_trabajo']; ?><br>
            <b>Ingreso Fijo:</b> <?php echo $row['ingreso_fijo']; ?><br>
            <b>Otros Ingresos:</b> <?php echo $row['otros_ingresos']; ?><br>
            <b>Gasto Total:</b> <?php echo $row['gasto_total']; ?><br>
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-sm-12">
          <strong><b></b></strong><br><br>
            <b>Inhabilitado Por:</b> <?php echo $row['motivo_eliminar']; ?><br><br><br>
        </div>
        <!-- /.col -->
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=listado_inhabilitado" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>
<?php } ?>