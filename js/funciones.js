//** Funcion de Confirmación para Eliminar **//
//** Funcion de Confirmación para Eliminar **//
  function Eliminar(){
    var con= confirm("¿Realmente desea borrar a este usuario?")
    if (con == false) {
      return false;
    };
  }
  function EliminarPro(){
    var con= confirm("¿Realmente desea Inhabilitar a este Proveedor?")
    if (con == false) {
      return false;
    };
  }
  function ActivarPro(){
    var con= confirm("¿Realmente desea Activar a este Proveedor?")
    if (con == false) {
      return false;
    };
  }
    function Beneficiar(){
    var con= confirm("¿Realmente desea Beneficiar a esta persona?")
    if (con == false) {
      return false;
    };
  }
    function Inhabilitar(){
    var con= confirm("¿Realmente desea Inhabilitar a esta persona?")
    if (con == false) {
      return false;
    };
  }
//** Fin -/ Funcion de confirmacion para eliminar **/
//--> FUNCION PARA OCULTAR CAMPOS <--// INICIO **//
//--> FUNCION PARA OCULTAR CAMPOS <--// INICIO **//
  function cambia (valor){
    if(valor==0){
      $('#cedula_cambia').hide(1000);
    }else {
      $('#cedula_cambia').show(1000);
    }
  }
//--> FUNCION PARA OCULTAR CAMPOS <--// FIN **//
//--> FUNCION PARA OCULTAR CAMPOS <--// FIN **//
  //**Funcion para Generar Cedula Escolar **//
//**Funcion para Generar Cedula Escolar **//

  function calcular_cedula() {
  var n_hijo = document.getElementById('n_hijo').value;
  var cedula_repre = document.getElementById('cedula_repre').value;
  var cedula = document.getElementById('cedula');

    if (n_hijo!='' && cedula_repre!='' ) {
      cedula.value = cedula_repre + n_hijo;

    } else {
      //alert('Los Dos (2) primeros campos deben contener información correcta');
    }
  }
// -->Funcion Para Generar Cedula <--// FIN **/
// -->Funcion Para Generar Cedula <--// FIN **/