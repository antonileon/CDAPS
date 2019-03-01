<?php 
	require '../config/conexion.php';
	$fecha = str_replace('-', '/', date("d-m-Y"));
	extract($_REQUEST);

	$sq= "SELECT * FROM proveedores WHERE id_proveedores='$id_proveedores'";
	$result = mysqli_query($conectar,$sq);
	if ($row=mysqli_fetch_array($result)) {
		$fecha_registro = str_replace('-', '/', date("d-m-Y", strtotime($row['fecha_registro'])));
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
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha_registro; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong><i class="fa fa-institution"></i> Datos del proveedor</strong><br><br>
            <label>RIF:</label>
            <input type="text" class="form-control" value="<?php echo $row['tipo_rif']; ?>-<?php echo $row['rif']; ?>" disabled=""><br>
            <label>Email:</label>
          <input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled="">
        </div>
        <div class="col-sm-4">
	        <strong></strong><br><br>
          <label>Nombre:</label>
          <input type="text" class="form-control" value="<?php echo $row['nombre_proveedor']; ?>" disabled=""><br>
          <label>Dirección:</label>
          <textarea readonly="" disabled="" class="form-control"><?php echo $row['direccion_proveedores']; ?></textarea><br>
	      </div>
        <div class="col-sm-4">
        	<strong></strong><br><br>
          <label>Teléfono:</label>
          <input type="text" class="form-control" value="<?php echo $row['telefono']; ?>" disabled="">
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=proveedores" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>