<?php
  require '../config/conexion.php';
  $fecha = str_replace('-', '/', date("d-m-Y"));

  extract($_REQUEST);

  $sq= "SELECT *  FROM personas te
  INNER JOIN datos_personas tei ON te.id_personas=tei.id_datos_personas 
  WHERE te.id_personas='$id'";

  $result = mysqli_query($conectar,$sq) or die ("Error en la consulta ".mysqli_error($conectar));
  if ($row=mysqli_fetch_array($result)) {
    $nivel_estudio = $row['nivel_estudio'];
    $sexo = $row['sexo'];
    $estado_civil = $row['estado_civil'];
    $tipo_vivienda = $row['tipo_vivienda'];
    $condicion_vivienda = $row['condicion_vivienda'];
    $trabaja = $row['trabaja'];
?>
    <section class="content-header">
      <h1>Censo<small>Registrar Censo</small></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Censo</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="wizard-container">
            <div class="card wizard-card" data-color="azzure" id="wizardProfile">
            <form action="index.php?llave=modificado_persona" method="POST" class="form-group">
              <div class="wizard-navigation">
                <ul>
                  <li><a href="#datosPersonal" data-toggle="tab">Datos Personales</a></li>
                  <li><a href="#datosDomicilio" data-toggle="tab">Datos de Domicilio</a></li>
                  <li><a href="#datosFinanciero" data-toggle="tab">Datos Financiero</a></li>
                </ul>
              </div>
              <div class="tab-content">
                <div class="tab-pane" id="datosPersonal">
                <h4 class="info-text"> Todo los campos (<b style="color:red;">*</b>) son requerido</h4>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="hidden"  value="<?php echo $row['id_personas'] ?>" name="id_personas"/>
                        <input type="hidden"  value="<?php echo $row['id_datos_personas'] ?>" name="id_datos_personas"/>
                        <label for="inputEmail" class="control-label">Cédula <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cédula" value="<?php echo $row['cedula']; ?>" readonly>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Nombre <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" >
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Apellido <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $row['apellido']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Sexo <span style="color:red;">*</span></label>
                          <select name="sexo" id="sexo" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="Masculino" <?php if ($sexo=="Masculino") {?> selected <?php } ?>>Masculino</option>
                            <option value="Femenino" <?php if ($sexo=="Femenino") {?> selected <?php } ?>>Femenino</option>
                          </select>                        
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputSkills" class="control-label">Estado Civil <span style="color:red;">*</span></label>
                        <select class="form-control" name="estado_civil" required>
                          <option value="Soltero(a)" <?php if ($estado_civil=="Soltero(a)") {?> selected="selected" <?php } ?> >Soltero(a)</option>
                          <option value="Casado(a)" <?php if ($estado_civil=="Casado(a)") {?> selected="selected" <?php } ?> >Casado(a)</option>
                          <option value="Viudo(a)" <?php if ($estado_civil=="Viudo(a)") {?> selected="selected" <?php } ?> >Viudo(a)</option>
                          <option value="Divorciado(a)" <?php if ($estado_civil=="Divorciado(a)") {?> selected="selected" <?php } ?> >Divorciado(a)</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Teléfono <span style="color:red;">*</span></label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="11" min="1" value="<?php echo $row['telefono']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="" class="control-label">Fecha de Nacimiento <span style="color:red;">*</span></label>
                        <input type="text" class="input-group date form-control" id="fecha_nacimiento" name="fecha_nacimiento" date="" data-date-format="dd-mm-yyyy" placeholder="Fecha de Nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Lugar de Nacimiento <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de Nacimiento" value="<?php echo $row['lugar_nacimiento']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Nivel de Estudio <span style="color:red;">*</span></label>
                        <select name="nivel_estudio" id="nivel_estudio" class="form-control" required>
                          <option value="Primaria no Completa" <?php if ($nivel_estudio=="Primaria no Completa") {?> selected="selected" <?php } ?>>Primaria no Completa</option>
                          <option value="Primaria Completa" <?php if ($nivel_estudio=="Primaria Completa") {?> selected="selected" <?php } ?>>Primaria Completa</option>
                          <option value="Secundaria no Completa" <?php if ($nivel_estudio=="Secundaria no Completa") {?> selected="selected" <?php } ?>>Secundaria no Completa</option>
                          <option value="Secundaria Completa" <?php if ($nivel_estudio=="Secundaria Completa") {?> selected="selected" <?php } ?>>Secundaria Completa</option>
                          <option value="Técnico Medio" <?php if ($nivel_estudio=="Técnico Medio") {?> selected="selected" <?php } ?>>Técnico Medio</option>
                          <option value="T.S.U." <?php if ($nivel_estudio=="T.S.U.") {?> selected="selected" <?php } ?>>T.S.U.</option>
                          <option value="Universitario" <?php if ($nivel_estudio=="Universitario") {?> selected="selected" <?php } ?>>Universitario</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Profesión</label>
                          <input type="text" class="form-control" id="Profesión" name="profesion" placeholder="Profesión" value="<?php echo $row['profesion']; ?>">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Número de Hijo <span style="color:red;">*</span></label>
                          <input type="number" class="form-control" id="num_hijos" name="num_hijos" placeholder="Número de Hijo" min="0" max="15" value="<?php echo $row['num_hijos']; ?>">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Personas a Cargo <span style="color:red;">*</span></label>
                          <input type="number" class="form-control" id="personas_cargo" name="personas_cargo" placeholder="Personas a Cargo" min="0" max="10" 
                          value="<?php echo $row['personas_cargo']; ?>">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Discapacidad</label>
                          <input type="text" class="form-control" id="discapacidad" name="discapacidad" placeholder="Discapacidad" value="<?php echo $row['discapacidad']; ?>">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Fecha de Registro <span style="color:red;">*</span></label>
                          <input type="text" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="Fecha de Registro" value="<?php echo $row['fecha_registro'];?>" readonly>
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="tab-pane" id="datosDomicilio">
                  <h4 class="info-text"> Todo los campos (<span style="color:red;">*</span>) son requerido</h4>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Estado <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" value="<?php echo $row['estado']; ?>">
                        <span class="help-block"></span>                            
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Ciudad <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad" value="<?php echo $row['ciudad']; ?>">
                        <span class="help-block"></span>                            
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Municipio <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio" value="<?php echo $row['municipio']; ?>">
                        <span class="help-block"></span> 
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Parroquia <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="parroquia" id="parroquia" placeholder="Parroquia" value="<?php echo $row['parroquia']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Dirección <span style="color:red;">*</span></label>
                        <textarea type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"><?php echo $row['direccion']; ?></textarea>
                        <span class="help-block"></span> 
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Tipo de Vivienda <span style="color:red;">*</span></label>
                        <select name="tipo_vivienda" id="tipo_vivienda" class="form-control">
                          <option value="Rancho" <?php if ($tipo_vivienda=="Rancho") {?> selected="selected" <?php } ?>>Rancho</option>
                          <option value="Casa" <?php if ($tipo_vivienda=="Casa") {?> selected="selected" <?php } ?>>Casa</option>
                          <option value="Apartamento" <?php if ($tipo_vivienda=="Apartamento") {?> selected="selected" <?php } ?>>Apartamento</option>
                          <option value="Quinta" <?php if ($tipo_vivienda=="Quinta") {?> selected="selected" <?php } ?>>Quinta</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Condición de Vivienda <span style="color:red;">*</span></label>
                        <select name="condicion_vivienda" class="form-control">
                          <option value="Propia Pagada" <?php if ($condicion_vivienda=="Propia Pagada") {?> selected="selected" <?php } ?>>Propia Pagada</option>
                          <option value="Propia Pagandose" <?php if ($condicion_vivienda=="Propia Pagandose") {?> selected="selected" <?php } ?>>Propia Pagandose</option>
                          <option value="Alquilada" <?php if ($condicion_vivienda=="Alquilada") {?> selected="selected" <?php } ?>>Alquilada</option>
                          <option value="Prestada" <?php if ($condicion_vivienda=="Prestada") {?> selected="selected" <?php } ?>>Prestada</option>
                          <option value="Invadida" <?php if ($condicion_vivienda=="Invadida") {?> selected="selected" <?php } ?>>Invadida</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="datosFinanciero">
                  <h4 class="info-text"> Todo los campos (<span style="color:red;">*</span>) son requerido</h4>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label class="control-label"> ¿ Trabaja ? <span style="color:red;">*</span></label>
                        <p class="row text-center">
                          <input type="radio" value="Si" name="trabaja" id="Si" <?php if ($trabaja=="Si") { ?> checked="checked" <?php } ?> onchange="habilitar(this.value);" >
                          <label for="Si">Si</label>
                          <input type="radio" value="No" name="trabaja" id="No" <?php if ($trabaja=="No") { ?> checked="checked" <?php } ?> onchange="habilitar(this.value);" >
                          <label for="No">No</label>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Nombre de la empresa</label>
                        <input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre de la empresa" value="<?php echo $row['nombre_empresa']; ?>" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="fecha-ingreso" class="control-label">Fecha de Ingreso</label>
                        <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha de Ingreso" value="<?php echo $row['fecha_ingreso']; ?>" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Cargo de Trabajo</label>
                        <input type="text" class="form-control" id="cargo_trabajo" name="cargo_trabajo" placeholder="Cargo de Trabajo" value="<?php echo $row['cargo_trabajo']; ?>" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Ingreso Fijo <span style="color:red;">*</span></label>
                        <input type="number" class="form-control" id="ingreso_fijo" name="ingreso_fijo" placeholder="Ingreso Fijo" min="0" value="<?php echo $row['ingreso_fijo']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Otros Ingresos</label>
                        <input type="number" class="form-control" id="otros_ingresos" name="otros_ingresos" placeholder="Gasto Total" min="0" value="<?php echo $row['otros_ingresos']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Gasto Total</label>
                        <input type="number" class="form-control" id="gasto_total" name="gasto_total" placeholder="Gasto Total" min="0" value="<?php echo $row['gasto_total']; ?>">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wizard-footer height-wizard">
                <div class="pull-right">
                  <input type='button' class='btn btn-next btn-fill btn-primary btn-wd btn-sm' name='next' value='Siguiente' />
                  <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd btn-sm' name='finish' value='Registrar Datos' />
                </div>
                <div class="pull-left">
                  <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Atras' />
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
            </div>
          </div> <!-- wizard container -->
        </div> <!-- /col-md-12 -->
      </div>
    </section> <!-- Fin de Main content Section-->
<?php } ?>
  <script>    
  function habilitar(value) { 
    if(value=="Si") {        // habilitamos        
      document.getElementById("nombre_empresa").disabled=false;      
    } else if (value=="No"){       // deshabilitamos         
      document.getElementById("nombre_empresa").disabled=true;     
      }
        if(value=="Si") {        // habilitamos        
      document.getElementById("fecha_ingreso").disabled=false;      
    } else if (value=="No"){       // deshabilitamos         
      document.getElementById("fecha_ingreso").disabled=true;     
      }
        if(value=="Si") {        // habilitamos        
      document.getElementById("cargo_trabajo").disabled=false;      
    } else if (value=="No"){       // deshabilitamos         
      document.getElementById("cargo_trabajo").disabled=true;     
      }   
  } 
  </script>