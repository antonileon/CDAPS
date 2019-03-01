<?php
  date_default_timezone_set('America/Caracas');
  require '../config/conexion.php';
  
  $fecha = date("Y-m-d");
  $fecha_registro = str_replace('-', '/', date("d-m-Y", strtotime($fecha)));
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
            <form action="index.php?llave=guardar_censo" method="POST" class="form-group">
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
                        <label for="inputEmail" class="control-label">Cédula <span style="color:red;">*</span></label>
                        <input type="number" class="form-control" name="cedula" id="cedula" placeholder="Cédula" value="<?php echo $_GET['cedula']; ?>" readonly>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Nombre <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Apellido <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" >
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
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                          </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputSkills" class="control-label">Estado Civil <span style="color:red;">*</span></label>
                        <select class="form-control" name="estado_civil" required>
                          <option value="Soltero(a)" selected="selected" >Soltero(a)</option>
                          <option value="Casado(a)">Casado(a)</option>
                          <option value="Viudo(a)">Viudo(a)</option>
                          <option value="Divorciado(a)">Divorciado(a)</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Teléfono <span style="color:red;">*</span></label>
                        <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" maxlength="11" min="1">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4 demo">
                        <label for="" class="control-label">Fecha de Nacimiento <span style="color:red;">*</span></label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" onblur="calcular_edad()" placeholder="Fecha de Nacimiento">
                        <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Edad <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="edad" name="edad" placeholder="Edad" readonly="" value="" required>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Lugar de Nacimiento <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" placeholder="Lugar de Nacimiento" >
                        <span class="help-block"></span>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Nivel de Estudio <span style="color:red;">*</span></label>
                        <select name="nivel_estudio" id="nivel_estudio" class="form-control" required>
                          <option value="Primaria no Completa">Primaria no Completa</option>
                          <option value="Primaria Completa">Primaria Completa</option>
                          <option value="Secundaria no Completa">Secundaria no Completa</option>
                          <option value="Secundaria Completa">Secundaria Completa</option>
                          <option value="Técnico Medio">Técnico Medio</option>
                          <option value="T.S.U.">T.S.U.</option>
                          <option value="Universitario">Universitario</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Profesión</label>
                          <input type="text" class="form-control" id="Profesión" name="profesion" placeholder="Profesión" >
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Número de Hijo <span style="color:red;">*</span></label>
                          <input type="number" class="form-control" id="num_hijos" name="num_hijos" placeholder="Número de Hijo" min="0" max="15">
                          <span class="help-block"></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Personas a Cargo <span style="color:red;">*</span></label>
                          <input type="number" class="form-control" id="personas_cargo" name="personas_cargo" placeholder="Personas a Cargo" min="0" max="10">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="inputEmail" class="control-label">Discapacidad</label>
                          <input type="text" class="form-control" id="discapacidad" name="discapacidad" placeholder="Discapacidad">
                          <span class="help-block"></span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="fecha_registro" name="fecha_registro" placeholder="Fecha de Registro" value="<?php echo $fecha_registro; ?>" readonly>
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
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" value="Aragua" readonly="">
                        <span class="help-block"></span>                            
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Ciudad <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad" value="El Consejo" readonly="">
                        <span class="help-block"></span>                            
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Municipio <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio" value="José Rafael Revenga" readonly="">
                        <span class="help-block"></span> 
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Sector <span style="color:red;">*</span></label>
                        <select class="form-control" name="parroquia">
                          <option value="El Consejo">El Consejo</option>
                          <option value="Sabaneta">Sabaneta</option>
                          <option value="Corocito">Corocito</option>
                          <option value="Ingenio La Cruz">Ingenio La Cruz</option>
                          <option value="La Hoya">La Hoya</option>
                          <option value="Casona">Casona</option>
                          <option value="Trapiche del Medio">Trapiche del Medio</option>
                          <option value="La Concepción">La Concepción</option>
                          <option value="La Gruta">La Gruta</option>
                          <option value="Santo Domingo">Santo Domingo</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Dirección <span style="color:red;">*</span></label>
                        <textarea type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"></textarea>
                        <span class="help-block"></span> 
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Tipo de Vivienda <span style="color:red;">*</span></label>
                        <select name="tipo_vivienda" id="tipo_vivienda" class="form-control">
                          <option value="Rancho">Rancho</option>
                          <option value="Casa">Casa</option>
                          <option value="Apartamento">Apartamento</option>
                          <option value="Quinta">Quinta</option>
                        </select>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Condición de Vivienda <span style="color:red;">*</span></label>
                        <select name="condicion_vivienda" class="form-control">
                          <option value="Propia Pagada">Propia Pagada</option>
                          <option value="Propia Pagandose">Propia Pagandose</option>
                          <option value="Alquilada">Alquilada</option>
                          <option value="Prestada">Prestada</option>
                          <option value="Invadida">Invadida</option>
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
                        <label for="Trabaja" class="control-label"> ¿ Trabaja ? <span style="color:red;">*</span></label>
                        <p class="row text-center">
                          <input type="radio" value="Si" name="trabaja" id="Si" onchange="habilitar(this.value);" class="minimal">
                          <label for="Si">Si</label>
                          <input type="radio" value="No" name="trabaja" id="No" onchange="habilitar(this.value);" checked="checked" class="minimal">
                          <label for="No">No</label>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Nombre de la empresa</label>
                        <input type="text" class="form-control" name="nombre_empresa" id="nombre_empresa" placeholder="Nombre de la empresa" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="fecha-ingreso" class="control-label">Fecha de Ingreso</label>
                        <input type="date" class="input-group date form-control" id="fecha_ingreso" name="fecha_ingreso" placeholder="Fecha de Ingreso" data-date-format="dd-mm-yyyy" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Cargo de Trabajo</label>
                        <input type="text" class="form-control" id="cargo_trabajo" name="cargo_trabajo" placeholder="Cargo de Trabajo" disabled>
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Ingreso Fijo <span style="color:red;">*</span></label>
                        <input type="number" class="form-control" id="ingreso_fijo" name="ingreso_fijo" placeholder="Ingreso Fijo" min="0">
                        <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Otros Ingresos</label>
                        <input type="number" class="form-control" id="otros_ingresos" name="otros_ingresos" placeholder="Gasto Total" min="0">
                        <span class="help-block"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-10 col-sm-offset-1">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nombre-empresa" class="control-label">Gasto Total</label>
                        <input type="number" class="form-control" id="gasto_total" name="gasto_total" placeholder="Gasto Total" min="0">
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
  <script type="text/javascript">
  function calcular_edad() {
  var fecha = document.getElementById('fecha_nacimiento').value;  //**fecha de nacimiento en el formulario**//

  //**Si la fecha es correcta, calculamos la edad**//
  var fechaNacimiento = fecha.split("-");
  var diaNac = fechaNacimiento[2];
  var mesNac = fechaNacimiento[1];
  var anioNac = fechaNacimiento[0];
 
  //**Cogemos los valores actuales**//
  var fechaHoy = new Date(); //** Detecto la fecha actual y asigno el dia, mes y año a variables distintas **//
  var ahora_Anio = fechaHoy.getFullYear();
  var ahora_Mes = fechaHoy.getMonth()+1;
  var ahora_Dia = fechaHoy.getDate();

  //**Realizamos el calculo**//
  var edad =  (ahora_Anio - anioNac);
  
  //**Calculamos los meses**//
  if(mesNac > ahora_Mes){
    edad--;
    }
  //**Calculamos los dias**//
  else if(mesNac == ahora_Mes){
      if(diaNac > ahora_Dia){
        edad--;
        }
    }
  
  if (edad <= 4) {

    alert('Estudiante debe tener por lo menos Cinco (5) Año de Edad');
    edad = ""
  }
  else if (edad >= 100) {
    alert('Estudiante debe tener Maximo (99) Año de Edad');
    edad = ""
  }

document.getElementById('edad').value = edad;
}
</script>