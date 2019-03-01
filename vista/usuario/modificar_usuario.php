<?php
  date_default_timezone_set('America/Caracas');
  require_once('../config/conexion.php'); /*Hacemos la Conexión a la Base de Datos*/

  $id=$_GET['id'];
  $sql="SELECT * FROM usuario WHERE id='$id'";
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
            $sexo = $row['sexo'];
            $pregunta = $row['pregunta'];
          ?>
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
              <li><a href="#cambiarClave" data-toggle="tab">Cambiar Contraseña</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=modificado_usuario" method="POST" id="cambiar-perfil">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
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
                      <label for="inputEmail" class="control-label">Cédula</label>
                      <input type="number" class="form-control" id="cedula" name="cedula" id="inputName" placeholder="Cédula" value="<?php echo $row['cedula']; ?>" readonly disabled>
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="inputName" placeholder="Nombre" value="<?php echo $row['nombre']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="inputName" placeholder="Apellido" value="<?php echo $row['apellido']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Sexo</label><br>
                        <p>
                          <input name="sexo" type="radio" id="Masculino" value="M"<?php if ($sexo=="M") { ?> checked="checked" <?php } ?> class="minimal"/>
                          <label for="Masculino">Masculino</label>
                          <input name="sexo" type="radio" id="Femenino" value="F"<?php if ($sexo=="F") { ?> checked="checked" <?php } ?> class="minimal"/>
                          <label for="Femenino">Femenino</label>
                        </p>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Ocupación</label>
                      <input type="text" class="form-control" name="ocupacion" id="inputName" placeholder="Ocupación" value="<?php echo $row['ocupacion']; ?>">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Telefono</label>
                      <input type="number" class="form-control" name="telefono" id="inputName" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" maxlength="11" min="1">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                    <label for="inputExperience" class="control-label">Dirección</label>
                      <textarea class="form-control" name="direccion" id="inputExperience" placeholder="Dirección"><?php echo $row['direccion']; ?></textarea>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Registrado Desde:</label>
                      <input type="text" class="form-control" name="registro" id="inputSkills" value="<?php echo $registro;?>" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <a href="index.php?llave=usuario" class="btn btn-danger" id="submit_btn" data-loading-text="Cambiando Datos....">Regresar... <i class="ion-ios-undo"></i></a>
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Modificar Datos <i class="ion-android-exit"></i></button>
                    </div>
                  </div>
                </form> <?php } ?>
              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="cambiarClave">
                <form action="index.php?llave=modificado_clave" id="cambiar-clave" method="post" class="form-horizontal myaccount" role="form">
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label for="inputEmail" name="clave" id="clave" class="control-label">Nueva Contraseña</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-6">
                      <label for="inputName" class="control-label">Confirmar Contraseña</label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar Contraseña ">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                      <input type="hidden" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" />
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando contraseña....">Cambiar Contraseña</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->   
      </div>