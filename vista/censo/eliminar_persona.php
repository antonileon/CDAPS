<?php 
  require "../config/conexion.php";
extract($_REQUEST);
  $sql ="SELECT * FROM personas WHERE id_personas='$id'";
  $query =mysqli_query($conectar,$sql);
  while ($row=mysqli_fetch_array($query)) {
    $id = $row['id_personas'];
?>
    <section class="content-header">
      <h1>Consultas<small>Eliminar Persona</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#"></a>Consultas</li>
        <li class="active">Eliminar Persona</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab"><i class="fa fa-trash"></i> Eliminar Persona</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=inhabilitar_persona" method="POST" id="insumos">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Cédula</label>
                      <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula" value="<?php echo $row['cedula']; ?>" readonly>
                      <input type="hidden" class="form-control" name="cedula" id="cedula" placeholder="Cédula" value="<?php echo $row['id_personas']; ?>" readonly>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del insumo" readonly value="<?php echo $row['nombre']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Marca del insumo" readonly value="<?php echo $row['apellido']; ?>">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="col-sm-12">
                    <label for="" class="control-label">Motivos</label>
                    <textarea class="form-control" placeholder="Motivos de la inhabilitación" style="resize:none;" name="motivo_eliminar" id="motivo_eliminar" required></textarea>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="index.php?llave=listado_censo" class="btn btn-default">Regresar... <i class="ion-ios-undo"></i></a>
                      <button type="submit" class="btn btn-danger" id="submit_btn" data-loading-text="Cambiando Datos....">Eliminar Persona <i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
    </section>
    <?php } ?>