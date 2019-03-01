<?php 
  require "../config/conexion.php";
  $programa="SELECT * from proveedores WHERE estatus='Activo'";
  $query=mysqli_query($conectar,$programa);

  $programa1="SELECT * FROM insumos";
  $resultado=mysqli_query($conectar,$programa1);
  $rows = mysqli_num_rows($resultado);

?>
    <section class="content-header">
      <h1>Inventario<small>Registrar Insumos</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#"></a>Inventario</li>
        <li class="active">Registrar Insumos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Registro de Insumos</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=guardar_insumo" method="POST" id="insumos">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Proveedor</label>
                        <?php
                          echo "<select  name='id_proveedores' required class='form-control'>
                          <option value=''>Seleccione</option>";
                          while($row=mysqli_fetch_assoc($query)){
                          echo "<option value='".$row['id_proveedores']."'>".$row['nombre_proveedor']."</option>";
                          }
                          echo "</select>";
                        ?>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Codigo</label>
                      <input type="text" class="form-control" name="codigo_insumo" id="codigo_insumo" placeholder="Código" value="<?php echo 'CDAPS-'; echo $rows + 1;?>" readonly>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Tipo de Insumos</label>
                      <select class="form-control" name="tipo" required>
                        <option value="">Selecciones</option>
                        <option value="Secos">Secos</option>
                        <option value="Frutas">Frutas</option>
                        <option value="Hortalizas">Hortalizas</option>
                        <option value="Verduras">Verduras</option>
                        <option value="Carne">Carne</option>
                        <option value="Pollo">Pollo</option>
                      </select>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Nombre del insumo</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del insumo" required>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Marca del insumo</label>
                      <input type="text" class="form-control" name="marca" id="marca" placeholder="Marca del insumo" required>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="index.php?llave=insumos" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Registrar Insumo <i class="ion-android-exit"></i></button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
    </section>