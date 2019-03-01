<?php
  date_default_timezone_set('America/Caracas');
  $date = date("Y-m-d");
  $registro = str_replace('-', '/', date("d-m-Y", strtotime($date)));
  require_once('../config/conexion.php');

  $sql ="SELECT id, tipocuenta, sexo, pregunta, registro FROM usuario";
  $query = mysqli_query($conectar, $sql);
  while($row=mysqli_fetch_assoc($query)){
    $id = ['id'];
    $sexo = $row['sexo'];
    $pregunta = $row['pregunta'];
    $tipocuenta = $row['tipocuenta']; 
  }
  //Verificamos si existe un usuario de tipo Spervisor(a)//
  $sql="SELECT * FROM usuario WHERE tipocuenta='Supervisor(a)'";
  $rs=mysqli_query($conectar,$sql);
  $n=mysqli_num_rows($rs);
    if($n==1){
      $datos=mysqli_fetch_object($rs);
      //Verificamos que ese tipo sea el que se quiere Modificar
      if($datos->id==$id) { 
        $opc=0; 
      } 
        else { $opc=1; }
    } else { $opc=0; }
    
    //Verificamos si existe un usuario de tipo Administrador(a) 
    $sql="SELECT * FROM usuario WHERE tipocuenta='Administrador(a)'";
    $rs=mysqli_query($conectar,$sql);
    $n=mysqli_num_rows($rs);
      if($n==1 || $n==2){
        $datos=mysqli_fetch_object($rs);
        //verificando que ese tipo sea el que se quiere modificar
        if($datos->id==$id and $_SESSION['tipocuenta']=="Administrador(a)"){
          $opc2=0; 
        } else { $opc2=1; }
      } else { $opc2=0; }
?>

    <section class="content-header">
      <h1>Usuario<small>Registrar Usuario</small></h1>
      <ol class="breadcrumb">
        <li><a href="../home.php"><i class="fa fa-dashboard"></i> Tablero</a></li>
        <li><a href="usuario.php"><i class="fa fa-user"></i> Usuario</a></li>
        <li class="active">Registrar Usuario</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="datosPersonales">
                <form class="form-horizontal" action="index.php?llave=guardar_usuario" method="POST" id="usuario-form">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-0 control-label"></label>
                    <div class="col-sm-4">
                      <label for="inputName" class="control-label">Tipo de Cuenta</label>
                      <select name="tipocuenta" class="form-control">
                      <option value="Voluntario" <?php if($tipocuenta=="Voluntario"){ echo "selected='selected'";}?>>Voluntario</option>
                      <?php if($opc==0){ ?>
                        <option value="Supervisor(a)" <?php if($tipocuenta=="Supervisor(a)"){ echo "selected='selected'";}?>>Supervisor(a)</option><?php } ?>
                        <?php if($_SESSION['tipocuentas']=="Administrador(a)" && $opc2==1 ) { ?>
                        <option value="Administrador(a)" <?php if($tipocuenta=="Administrador(a)"){ echo "selected='selected'";}?>>Administrador(a)</option><?php } ?>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Usuario</label>
                      <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Cédula</label>
                      <input type="number" class="form-control" id="cedula" name="cedula" id="cedula" placeholder="Cédula" value="" maxlength="8" min="1">
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
                      <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ocupación" value="">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputEmail" class="control-label">Telefono</label>
                      <input type="number" class="form-control mask" name="telefono" id="telefono" data-inputmask="'mask": "(999) 999-9999'" data-mask placeholder="Telefono" min="1">
                      <span class="help-block"></span>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-4">
                    <label for="inputExperience" class="control-label">Dirección</label>
                      <textarea class="form-control" name="direccion" id="inputExperience" placeholder="Dirección"></textarea>
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                    <label for="inputExperience" class="control-label">Contraseña</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Nueva Contraseña">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                    <label for="inputExperience" class="control-label">Confirmar Contraseña</label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirmar Contraseña ">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Pregunta de Seguridad</label>
                      <select class="form-control" name="pregunta">
                        <option value="1" <?php if ($pregunta=="1") {?> selected="selected" <?php } ?> >¿Nombre de tu mascota?</option>
                        <option value="2" <?php if ($pregunta=="2") {?> selected="selected" <?php } ?> >¿Segundo apellido de tu madre?</option>
                        <option value="3" <?php if ($pregunta=="3") {?> selected="selected" <?php } ?> >¿Heroe Favorito?</option>
                        <option value="4" <?php if ($pregunta=="4") {?> selected="selected" <?php } ?> >¿Equipo Favorito?</option>
                        <option value="5" <?php if ($pregunta=="5") {?> selected="selected" <?php } ?> >¿Nombre de su mejor amigo?</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Respuesta de Seguridad</label>
                      <input type="text" class="form-control" name="respuesta" id="respuesta" value="" placeholder="Respuesta de Seguridad">
                      <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <label for="inputSkills" class="control-label">Fecha de Registro:</label>
                      <input type="text" class="form-control" name="registro" id="registro" value="<?php echo $registro; ?>" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-7">
                      <button type="submit" class="btn btn-success" id="submit_btn" data-loading-text="Cambiando Datos....">Registrar Usuario <i class="fa fa-check-square"></i></button>
                      <button type="reset" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></button>
                    </div>
                  </div>
                </form> <?php //} ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->   
      </div>
    </section>
    <!-- /.content -->
  </div>