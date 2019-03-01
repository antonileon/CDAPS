    <section class="content-header">
      <h1>Tablero<small>Asistencia</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Asistencia</li>
      </ol>
    </section>
     <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-edit"></i> Control de Asistencia
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-offset-4 col-sm-4 invoice-col">
        <form action="index.php?llave=guardar_asistencia" method="POST" id="asistencia">
        	<div class="form-group">
        	<label>Cédula de Beneficado:</label>
        		<input type="number" name="cedula" id="cedula" placeholder="Cédula" class="form-control" required>
            <span class="help-block"></span>
        	</div>
          <!-- /.col -->
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Buscando Persona....">Marcar Asistencia <i class="ion-ios-undo"></i></button>
            </div>
          </div>
        </form>
      </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->