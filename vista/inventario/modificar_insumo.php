<?php 
	require '../config/conexion.php';
	$fecha = str_replace('-', '/', date("d-m-Y"));
	extract($_REQUEST);

  $sq1= "SELECT * FROM insumos ins
  INNER JOIN proveedores pro ON ins.id_proveedores=pro.id_proveedores 
  WHERE ins.id_insumos='$id_insumos'";
  $result1 = mysqli_query($conectar,$sq1);
    if ($row=mysqli_fetch_array($result1)) {
      $Proveedor1=$row['nombre_proveedor'];
      $tipo=$row['tipo'];
      $fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row['c5'])));
?>
	<section class="content-header">
      <h1>Consultas<small>Modificar Insumo</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li>Inventario</li>
        <li class="active">Insumos</li>
      </ol>
    </section>
    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-pencil"></i> <span> Modificar Insumo</span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <form action="index.php?llave=modificado_insumo" method="POST" id="proveedores">
        <input type="hidden" name="id_insumos" value="<?php echo $row['id_insumos']; ?>">
        <div class="col-sm-12 invoice-col">
          <div class="col-sm-4">
            <label>Proveedor:</label>
            <?php
              $sql="SELECT * FROM proveedores";
              $query=mysqli_query($conectar,$sql);
              echo "<select  name='id_proveedores' required class='form-control'>";
              while($row1=mysqli_fetch_assoc($query)){
                $Proveedor=$row1['nombre_proveedor'];
            ?>
              <option value="<?php echo $row1['id_proveedores']; ?>" <?php if($Proveedor=="$Proveedor1") {?>selected="selected"<?php } ?> > <?php echo $row1['nombre_proveedor']; ?></option>
             <?php }
              echo "</select>";
            ?>        
          </div>
          <div class="col-sm-4">
            <label>Código:</label>
            <input type="text" class="form-control" name="codigo_insumo" id="codigo_insumo" value="<?php echo $row['codigo_insumo']; ?>" readonly=""><br>
          </div>
          <div class="col-sm-4">
            <label>Tipo:</label>
            <select class="form-control" name="tipo" id="tipo" required>
              <option value="Secos" <?php if ($tipo=="Secos") {?> selected="selected" <?php } ?>>Secos</option>
              <option value="Frutas" <?php if ($tipo=="Frutas") {?> selected="selected" <?php } ?>>Frutas</option>
              <option value="Hortalizas" <?php if ($tipo=="Hortalizas") {?> selected="selected" <?php } ?>>Hortalizas</option>
              <option value="Verduras" <?php if ($tipo=="Verduras") {?> selected="selected" <?php } ?>>Verduras</option>
              <option value="Carne" <?php if ($tipo=="Carne") {?> selected="selected" <?php } ?>>Carne</option>
              <option value="Pollo" <?php if ($tipo=="Pollo") {?> selected="selected" <?php } ?>>Pollo</option>
            </select>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="col-sm-4">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $row['nombre']; ?>" >
            <span class="help-block"></span>        
          </div>
          <div class="col-sm-4">
            <label>Marca:</label>
            <input type="text" name="marca" id="marca" class="form-control" value="<?php echo $row['marca']; ?>" >
            <span class="help-block"></span>            
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=insumos" class="btn btn-danger">Regresar...<i class="ion-ios-undo"></i></a>
            <button type="submit" class="btn btn-success" value="Registrar">Modificar...<i class="fa fa-check-square-o"></i></button>
          </div>
        </div>
        </form>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>