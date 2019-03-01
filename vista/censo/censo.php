    <section class="content-header">
      <h1>Censo<small>Registrar Censo</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Censo</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=verificar_cedula" method="POST" id="censo">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <div class="col-sm-3">
                      <label for="" class="control-label">Posee Cédula Propia</label>
                      <select name="" class="form-control" id ="alergia" onchange="cambia(this.value)">
                        <option value="0">Si</option>
                        <option value="1">No</option>
                      </select>
                      <span class="help-block"></span>
                    </div>
                    <div id="cedula_cambia" style="display: none;">
                      <div class="col-sm-3">
                        <label for="" class="control-label">Cédula del Representante</label>
                        <input type="number" class="form-control" name="cedula_repre" id="cedula_repre" placeholder="Cédula del Representante" value="">
                        <span class="help-block"></span>
                      </div>
                      <div class="col-sm-3">
                        <label for="" class="control-label">Número de Hijo</label>
                        <input type="number" class="form-control" name="n_hijo" id="n_hijo" placeholder="Número de Hijo" min="1" max="10">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label for="" class="control-label">Cédula</label>
                      <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Cédula" onclick="calcular_cedula()" min="1">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Continuar <i class="fa fa-check-square"></i></button>
                    </div>
                  </div>
                </form> 
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>  
        </div>
      </div>
    </section>