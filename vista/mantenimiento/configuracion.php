<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php'); /*Hacemos la Conexión a la Base de Datos*/

  $id=$_SESSION['id'];
  $sql="SELECT * FROM configuracion ";
  $query = mysqli_query($conectar,$sql);
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Herramientas<small>Configuración</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Herremientas</a></li>
        <li class="active">Configración</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <?php while($row=mysqli_fetch_assoc($query)) {
            $ruta_img = $row['logo'];
          ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form action="index.php?llave=cambiar_logo" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <img class="profile-user-img img-responsive img-Thumbnail" src="../img/<?php echo $ruta_img;?>" alt="Foto de Perfil">
                 
                <h3 class="profile-username text-center"><?php echo $row['nombre']; ?></h3>
                <div class="form-group col-xs-12">
                  <center><input id="imagen" type="file" name="logo" multiple=true class="file" required></center>      
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos del Sistena</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=guardar_configuracion" method="POST" id="cambiar-perfil">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-0 control-label"></label>
                    <div class="col-sm-4">
                      <label for="inputName" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Siglas</label>
                      <input type="text" class="form-control" name="siglas" id="siglas" placeholder="siglas" value="<?php echo $row['siglas']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Sueldo Mínimo</label>
                      <input type="text" class="form-control" name="sueldo" id="sueldo" placeholder="Sueldo Mínimo" value="<?php echo $row['sueldo']; ?>">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Modificar Datos <i class="fa fa-edit"></i></button>
                    </div>
                  </div>
                </form> <?php } ?>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->   
      </div>
    </section>
