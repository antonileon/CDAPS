    <section class="content-header">
      <h1>Tablero<small>Menú de Comida</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Tablero</a></li>
        <li class="active">Menú de Comida</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header">
            <div class="col-xs-2"><br>
              <h3 class="box-title"><i class="fa fa-coffee"></i> Menú de Comida</h3>  
            </div>
            <div class="box-body">
              <div class="table-responsive"  style="overflow-x: hidden;">
                <div class="row">
                  <div class="input-daterange">
                    <div class="col-md-4">
                      <div data-date-format="yyyy/mm/dd" data-date="yyyy/mm/dd" class="input-group input-large">
                        <input type="text" name="start_date" id="start_date" class="form-control dpd1" placeholder="Desde"/>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="text" name="end_date" id="end_date" class="form-control dpd2" placeholder="Hasta"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <button type="button" name="buscar" id="buscar" class="btn btn-primary active" ><i class="fa fa-search"></i> Buscar</button>
                  </div>
                  <div class="col-md-2">
                    <a data-target="#myModal2" data-toggle="modal" target="blank" class="btn btn-block btn-primary btn-sm"><i class="fa fa-coffee"></i> Registrar Menú</a>
                  </div> 
                  <!--<div class="col-md-2">
                    <a href="reportes/reporte_censado.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
                  </div>-->
                </div><br>
              </div>
              <table id="order_menu" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Plato</th>
                  <th>Jugo</th>
                  <th>Merienda</th>
                  <th>Fecha</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
            <!-- /.box-body -->
        </div>
        </div>
      </div>
    </section>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Menú a preparar hoy <?php echo date('d/m/Y'); ?></h4>
      </div>
      <form action="index.php?llave=guardar_menu" method="POST" id="menu">
      <div class="modal-body"> 
        <div class="form-group">
          <div class="col-md6">
            <label> Plato:</label>
            <input type="text" name="plato" id="plato" class="form-control" placeholder="Plato" required/>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md6">
            <label> Jugo:</label>
            <input type="text" name="jugo" id="jugo" class="form-control" placeholder="Jugo" required/>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md6">
            <label> Merienda:</label>
            <input type="text" name="merienda" id="merienda" class="form-control" placeholder="Merienda" required/>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md6">
            <input type="hidden" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha"/>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-coffee"></i> Registrar Menú</button>
      </div>
      </form>
    </div>
  </div>
</div>