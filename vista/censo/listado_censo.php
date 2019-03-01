    <section class="content-header">
      <h1>Consultas<small>Personas Censadas</small></h1>
      <ol class="breadcrumb">
        <li><a href="../home.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Consulta</li>
        <li><a href="#"><i class="active"></i> Personas Censadas</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active-primary"><a href="#datosPersonales">Personas Censada</a></li>
              <li><a href="index.php?llave=listado_beneficiado">Personas Beneficiada</a></li>
              <li><a href="index.php?llave=listado_inhabilitado">Personas Inhabilitada</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <div class="box box-primary">
                <!-- /.box-header -->
                  <div class="box-body">
                    <div class="table-responsive"  style="overflow-x: hidden;">
                      <div class="row">
                        <div class="input-daterange">
                          <div class="col-sm-offset-3 col-sm-4">
                            <div data-date-format="yyyy/mm/dd" data-date="yyyy/mm/dd" class="input-group input-large">
                              <input type="text" name="start_date" id="start_date" class="form-control dpd1" placeholder="Desde"/>
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input type="text" name="end_date" id="end_date" class="form-control dpd2" placeholder="Hasta"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <button type="button" name="search1" id="search1" class="btn btn-primary active" ><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        <div class="col-md-2">
                          <a href="reportes/reporte_censado.php" target="blank" class="btn btn-block btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Reporte PDF</a>
                        </div>  
                      </div><br>
                    </div>
                    <table id="order_data_censo" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>Cédula</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Fecha de Nacimiento</th>
                          <th>Telefono</th>
                          <th>Fecha de Registro</th>
                          <th>Estado</th>
                          <th>Opciones</th>
                        </tr>
                      </thead>
                      <tbody>
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">¿Estas seguro de inhabilitar a esta persona?</h4>
      </div>
      <form action="index.php?llave=inhabilitar_persona" method="POST">
      <div class="modal-body"> Explique los motivos… 
        <textarea class="form-control" placeholder="Motivos de la inhabilitación" style="resize:none;" name="motivo_eliminar" id="motivo_eliminar"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Inhabilitar Persona</button>
      </div>
      </form>
    </div>
  </div>
</div>