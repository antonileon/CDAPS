<?php 
  require "../config/conexion.php";
  $programa="SELECT * FROM tipo_insumos";
  $resultado=mysqli_query($conectar,$programa);
?>
    <section class="content-header">
      <h1>Inventario<small>Registrar Proveedores</small></h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#"></a>Inventario</li>
        <li class="active">Registrar Proveedores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Registro de Proveedores</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal mailbox-messages" action="index.php?llave=guardar_proveedores" method="POST" id="proveedores">
                  <div class="form-group">
                    <div class="col-sm-4">
                      <div class="col-sm-3">
                        <label class="control-label">RIF&nbsp;</label>
                        <select class="form-control" name="tipo_rif" required>
                          <option value="">--</option>
                          <option value="V">V</option>
                          <option value="J">J</option>
                          <option value="G">G</option>
                          <option class="E">E</option>
                        </select>
                      </div>
                      <div class="col-sm-9">
                        <label for="" class="control-label">&nbsp;&nbsp;</label>
                        <input type="number" class="form-control" name="rif" id="rif" placeholder="RIF" value="" required min="1">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre_proveedor" id="nombre_proveedor" placeholder="Nombre" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Teléfono</label>
                      <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Teléfono" required min="1" value="" />
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="" class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="" class="control-label">Dirección</label>
                      <textarea class="form-control" name="direccion_proveedores" id="direccion_proveedores" placeholder="Ingrese Dirección"></textarea>
                      <span class="help-block"></span>
                    </div>
                    <!--<div class="col-sm-4">
                      <label>Tipos de Insumos</label>
                      <p>
                        <input name="checkbox[]" type="checkbox" id="checkbox" class="form-cntrol" value="Secos"  />
                        <label for="Secos">Secos</label>
                        <input name="checkbox[]" type="checkbox" id="checkbox" class="form-cntrol" value="Frutas"  />
                        <label for="Frutas">Frutas</label>
                        <input name="checkbox[]" type="checkbox" id="checkbox" class="form-cntrol" value="Hortalizas"  />
                        <label for="Hortalizas">Hortalizas</label>
                        <input name="checkbox[]" type="checkbox" id="checkbox" class="form-cntrol" value="Verduras"  />
                        <label for="Verduras">Verduras</label>
                        <input name="checkbox[]" type="checkbox" id="checkbox" class="form-cntrol" value="Carne"  />
                        <label for="Carne">Carne</label>
                        <input name="checkbox[]" type="checkbox" id="checkbox" class="form-cntrol" value="Pollo"  />
                        <label for="Pollo">Pollo</label>
                      </p>
                      <span class="help-block"></span>
                    </div>-->
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="index.php?llave=proveedores" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Registrar Proveedor <i class="fa fa-check-square"></i></button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
    </section>