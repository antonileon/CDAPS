<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php'); /*Hacemos la Conexión a la Base de Datos*/

  extract($_REQUEST);
  $sql="SELECT * FROM usuario WHERE id='$id' ";
  $query = mysqli_query($conectar,$sql);
?>
    <section class="content-header">
      <h1>Mi Perfil<small>Datos Personales</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Mi Perfil</a></li>
        <li class="active">Datos Personales</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <?php while($row=mysqli_fetch_assoc($query)){
            $registro = str_replace('-', '/', date("d-m-Y", strtotime($row['registro'])));
            $ruta_img = $row ['profile']; 
            $sexo = $row['sexo'];
            $pregunta = $row['pregunta'];
           ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <form action="cambiar_imagen.php" enctype="multipart/form-data" method="POST">
                <?php
                  $profile = $row['profile'];
                  if ($profile == "male.png") {
                    echo "<img class='profile-user-img img-responsive img-circle' src='../img/male.png'>";
                  } else if ($profile == "female.png") {
                    echo "<img class='profile-user-img img-responsive img-circle' src='../img/female.png'>";
                  } else if ($profile == "$ruta_img") { ?>
                    <img class="profile-user-img img-responsive img-circle" src="../img/<?=$_SESSION['usuario'];?>/<?php echo $ruta_img;?>" alt="Foto de Perfil">
                <?php } ?>          
                <h3 class="profile-username text-center"><?php echo $row['nombre']; ?> <?php echo $row['apellido']; ?></h3>
                <p class="text-muted text-center"><?php echo $row['tipocuenta']?></p>
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
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="guardar_perfil.php" method="POST" id="datos-form">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-0 control-label"></label>
                    <div class="col-sm-4">
                      <label for="inputName" class="control-label">Tipo de Cuenta</label>
                      <input type="text" class="form-control" name="tipocuenta" id="inputName" placeholder="Tipo de Cuenta" value="<?php echo $row['tipocuenta']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Usuario</label>
                      <input type="text" class="form-control" name="usuario" id="inputName" placeholder="Usuario" value="<?php echo $row['usuario']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="inputName" placeholder="Apellido" value="<?php echo $row['apellido']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Cédula</label>
                      <input type="number" class="form-control" id="cedula" name="cedula" id="inputName" placeholder="Cédula" value="<?php echo $row['cedula']; ?>" maxlength="8" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Sexo</label><br>
                        <p>
                          <input name="sexo" type="radio" id="Masculino" value="M"<?php if ($sexo=="M") { ?> checked="checked" <?php } ?> class="minimal" disabled/>
                          <label for="Masculino">Masculino</label>
                          <input name="sexo" type="radio" id="Femenino" value="F"<?php if ($sexo=="F") { ?> checked="checked" <?php } ?> class="minimal" disabled/>
                          <label for="Femenino">Femenino</label>
                        </p> 
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Ocupación</label>
                      <input type="text" class="form-control" name="ocupacion" id="inputName" placeholder="Ocupación" value="<?php echo $row['ocupacion']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Telefono</label>
                      <input type="number" class="form-control" name="telefono" id="inputName" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" maxlength="11" min="1" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                    <label for="inputExperience" class="control-label">Dirección</label>
                      <textarea class="form-control" name="direccion" id="inputExperience" placeholder="Dirección" readonly disabled><?php echo $row['direccion']; ?></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Pregunta de Seguridad</label>
                      <select class="form-control" name="pregunta" readonly disabled>
                        <option value="1" <?php if ($pregunta=="1") {?> selected="selected" <?php } ?> >¿Nombre de tu mascota?</option>
                        <option value="2" <?php if ($pregunta=="2") {?> selected="selected" <?php } ?> >¿Segundo apellido de tu madre?</option>
                        <option value="3" <?php if ($pregunta=="3") {?> selected="selected" <?php } ?> >¿Heroe Favorito?</option>
                        <option value="4" <?php if ($pregunta=="4") {?> selected="selected" <?php } ?> >¿Equipo Favorito?</option>
                        <option value="5" <?php if ($pregunta=="5") {?> selected="selected" <?php } ?> >¿Nombre de su mejor amigo?</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Respuesta de Seguridad</label>
                      <input type="text" class="form-control" name="respuesta" id="inputSkills" value="<?php echo $row['respuesta']; ?>" placeholder="Respuesta de Seguridad" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Registrado Desde:</label>
                      <input type="text" class="form-control" name="registro" id="inputSkills" value="<?php echo $registro;?>" readonly disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="index.php?llave=usuario" class="btn btn-danger" id="submit_btn" data-loading-text="Cambiando Datos....">Regresar... <i class="ion-ios-undo"></i></a>
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