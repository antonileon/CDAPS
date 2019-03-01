    <section class="content-header">
      <h1>Tablero<small>Panel de Control</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Tablero</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $rows2; ?></h3>
              <p>Personas Censadas</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="index.php?llave=listado_censo" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $rows3; ?></h3>
              <p>Personas Beneficiadas</p>
            </div>
            <div class="icon">
              <i class="ion-android-contacts"></i>
            </div>
            <a href="index.php?llave=listado_beneficiado" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $rows1; ?></h3>
              <p>Proveedores</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="index.php?llave=proveedores" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $rows; ?></h3>

              <p>Usuario Registrado</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="index.php?llave=usuario" class="small-box-footer">Mas Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-5">
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Posibles Beneficiario</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                  <?php 
                    $sql4="SELECT * FROM personas INNER JOIN datos_personas 
                    ON personas.id_personas = datos_personas.id_datos_personas WHERE estatus='Censado(a)' ORDER BY id_personas DESC LIMIT 5";
                    $query4 =mysqli_query($conectar,$sql4);
                    while($row4=mysqli_fetch_assoc($query4)) {
                      if ($row4['trabaja']=="No" && $row4['personas_cargo']>="1") {
                  ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../img/profile.png" alt="Product Image" class="fa fa-user">
                  </div>
                  <div class="product-info">
                    <a href="index.php?llave=ver_persona&id=<?php echo $row4['id_personas'];?>" class="product-title"> <?php echo $row4['nombre'] ?> <?php echo $row4['apellido'] ?>
                      <span class="label label-primary pull-right"> <?php echo $row4['estatus']; ?></span></a>
                      <div class="progress progress-sm active">
                        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                  </div>
                </li>
                <?php } else if ($row4['trabaja']=="Si" && $row4['gasto_total']>$row4['ingreso_fijo']) { ?>
                <li class="item">
                  <div class="product-img">
                    <img src="../img/profile.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="index.php?llave=ver_persona&id=<?php echo $row4['id_personas'];?>" class="product-title"><?php echo $row4['nombre'] ?> <?php echo $row4['apellido'] ?>
                      <span class="label label-primary pull-right"><?php echo $row4['estatus']; ?></span></a>
                      <div class="progress progress-sm active">
                        <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                  </div>
                </li>

                <?php

                  } else if ($row4['trabaja']=="Si" && $row4['ingreso_fijo']>$row4['gasto_total']) { ?> 
                <li class="item">
                  <div class="product-img">
                    <img src="../img/profile.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="index.php?llave=ver_persona&id=<?php echo $row4['id_personas'];?>" class="product-title"><?php echo $row4['nombre'] ?> <?php echo $row4['apellido'] ?>
                      <span class="label label-primary pull-right"><?php echo $row4['estatus']; ?></span></a>
                      <div class="progress progress-sm active">
                        <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                  </div>
                </li>                  
                  <?php
                  } }?>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
            Leyenda: 100%<i class="fa fa-circle text-success"></i> 50%<i class="fa fa-circle text-warning"></i> 25%<i class="fa fa-circle text-danger"></i>
            <br>
              <a href="" class="uppercase">Ver todos los personas</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-7 hidden-xs">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Productos a vencer o cantidad mínima</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <?php 
              $sql5= "SELECT * FROM inventario INNER JOIN insumos ON insumos.id_insumos = inventario.id_insumos WHERE inventario.estado = 'Aceptado'";
              $query5 = mysqli_query($conectar, $sql5);
            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    while($row5=mysqli_fetch_array($query5)) {
                      $fecha1 = str_replace('-', '/', date("d-m-Y", strtotime($row5['fecha_vencimiento'])));
                      $fecha = date('Y-m-d');
                      if ($row5['fecha_vencimiento']<"$fecha" || $row5['cantidad']<=5) {
                        $id_inventario = $row5['id_inventario'];
                        echo '<tr>';
                        echo '<td><a href="index.php?llave=ver_inventario&id_inventario='.$row5['id_inventario'].'">'.mb_convert_encoding($row5['codigo_insumo'], "UTF-8").'</a></td>';
                        echo '<td>'.mb_convert_encoding($row5['nombre'], "UTF-8").'</td>';
                        echo '<td>'.mb_convert_encoding($row5['marca'], "UTF-8").'</td>';
                        echo '<td align="center">'; 
                  ?>
                  <?php if ($row5['cantidad']<=5) { ?>  <span class="label label-danger"><?php echo $row5['cantidad']; ?></span> <?php } else { echo $row5['cantidad']; } ?>
                  <?php echo '</td>';
                        echo '<td align="center">';
                  ?>
                  <?php if ($row5['fecha_vencimiento']<"$fecha") { ?>  <span class="label label-danger"><?php echo $fecha1; ?></span> <?php } else { echo $fecha1; } ?>
                  <?php
                        echo '</td>';
                        echo '<td align="center">';
                  ?>
                  <?php if ($row5['fecha_vencimiento']<"$fecha" && $row5['cantidad']<=5) { ?>  <span style="color:;"><b>Cantidad Mínima y <br>Producto Vencido</b></span> <?php } 
                        else if ($row5['cantidad']<=5){ echo '<b style="">Cantidad Mínima</b>'; }
                        else if ($row5['fecha_vencimiento']<"$fecha"){ echo '<b>Producto Vencido</b>'; }
                  ?>
                  <?php
                        echo '</td>';
                        echo '</tr>';
                      }
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="index.php?llave=registrar_inventario" class="btn btn-sm btn-info btn-flat pull-left">Nuevo registro</a>
              <a href="index.php?llave=inventario" class="btn btn-sm btn-default btn-flat pull-right">Ver todo el inventario</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
          </div>
      </div>
      <!-- /.row -->
    </section>