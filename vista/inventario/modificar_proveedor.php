<?php 
	require '../config/conexion.php';
	$fecha = str_replace('-', '/', date("d-m-Y"));
	extract($_REQUEST);

	$sq= "SELECT * FROM proveedores WHERE id_proveedores='$id_proveedores'";
	$result = mysqli_query($conectar,$sq);
	if ($row=mysqli_fetch_array($result)) {
		$estado = $row['estatus'];
		$fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_registro'])));
?>
	<section class="content-header">
      <h1>Consultas<small>Ver Proveedor registrado</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li class="active">Proveedores</li>
      </ol>
    </section>
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-truck"></i> <span> <?php echo $row['nombre_proveedor']; ?></span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <form action="index.php?llave=modificado_proveedor" method="POST" id="proveedores">
        <input type="hidden" name="id_proveedores" value="<?php echo $row['id_proveedores']; ?>">
        <div class="col-sm-12 invoice-col">
          <strong><i class="fa fa-institution"></i> Datos del proveedor</strong><br><br>
          <div class="col-sm-4">
            <label>RIF:</label>
            <input type="text" class="form-control" value="<?php echo $row['tipo_rif']; ?>-<?php echo $row['rif']; ?>" disabled=""><br>            
          </div>
          <div class="col-sm-4">
            <label>Nombre:</label>
            <input type="text" name="nombre_proveedor" id="nombre_proveedor" class="form-control" value="<?php echo $row['nombre_proveedor']; ?>"required placeholder="Nombre">
            <span class="help-block"></span>
          </div>
          <div class="col-sm-4">
            <label>Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $row['telefono']; ?>" >
            <span class="help-block"></span>            
          </div>
        </div>
        <div class="col-sm-12">
          <div class="col-sm-4">
            <label>Email:</label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" >
            <span class="help-block"></span>        
          </div>
          <div class="col-sm-4">
          <label>Dirección:</label>
          <textarea class="form-control" name="direccion_proveedores" id="direccion_proveedores"><?php echo $row['direccion_proveedores']; ?></textarea>
          <span class="help-block"></span>      
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=proveedores" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
            <button type="submit" class="btn btn-success" value="Registrar">Modificar...<i class="fa fa-check-square-o"></i></button>
          </div>
        </div>
        </form>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>