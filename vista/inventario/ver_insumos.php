    <?php
      $sq1= "SELECT insumos.id_insumos ides, insumos.codigo c1, insumos.tipo c2, insumos.nombre c3, 
      insumos.marca c4, insumos.fecha_registro c5, proveedores.nombre_proveedor c6 FROM insumos 
      INNER JOIN proveedores ON insumos.id_proveedores = proveedores.id_proveedores 
      WHERE insumos.id_insumos='$id'";
      $result1 = mysqli_query($conectar,$sq1);
      if ($row1=mysqli_fetch_array($result1)) {
        $fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row1['fecha_registro'])));
    ?>
  <section class="content-header">
      <h1>Consultas<small>Ver Insumos registrado</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="invoice">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-shopping-cart"></i> <span> <?php echo $row1['c3']; ?></span>
            <small class="pull-right"><b>Fecha de Registro</b>: <?php echo $fecha1; ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            <strong><i class="fa fa-shopping-cart"></i> Datos del insumo</strong><br><br>
            <label>Proveedor:</label>
            <input type="text" class="form-control" value="<?php echo $row1['c6']; ?>" disabled=""><br>
            <label>Nombre:</label>
            <input type="text" class="form-control" value="<?php echo $row1['c3']; ?>" disabled="">
        </div>
        <div class="col-sm-4">
          <strong></strong><br><br>
          <label>Código:</label>
          <input type="text" class="form-control" value="<?php echo $row1['c1']; ?>" disabled=""><br>
          <label>Marca:</label>
          <input type="text" class="form-control" value="<?php echo $row1['c4']; ?>" disabled=""><br>
        </div>
        <div class="col-sm-4">
          <strong></strong><br><br>
          <label>Tipo de Alimento:</label>
          <input type="text" class="form-control" value="<?php echo $row1['c2']; ?>" disabled=""><br>
          <!--<label>Marca:</label>
          <input type="text" class="form-control" value="<?php //echo $row1['marca']; ?>" disabled=""><br>-->

        </div>
        <div class="form-group">
          <div class="col-sm-offset-5 col-sm-7">
            <a href="index.php?llave=insumos" class="btn btn-danger">Regresar... <i class="ion-ios-undo"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section> <!-- Fin de Main content Section-->
<?php } ?>
