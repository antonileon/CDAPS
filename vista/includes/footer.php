 </div></div> 
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Desarrollado por: Natera, Manzo, Castillo. <b>Version</b> 1.0.1
    </div>
    <strong>Copyright &copy; 2017 <a href="index.php" data-toggle="tooltip" data-placement="top" title="C.D.A.P.S">C.D.A "Pueblo Socialista"</a>.</strong> Todo los Derechos Reservado.
  </footer>
 <!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../estilo/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../js/pages/dashboard2..js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/app.min.js"></script>
<!-- JS PARA INPUT FILE -->
<script src="../js/fileinput.js" type="text/javascript"></script>
<!-- Validaciones de Formulario JS -->
<script src="../js/jquery.validate.min.js"></script>
<script src="../js/validaciones.js"></script>
<script src="../js/funciones.js"></script>
<script src="../js/validar_usuario.js"></script>
<!-- PLUGINS PARA CHECKBOX Y RADIO -->
<script src="../plugins/checkbox/zepto.js"></script>
<script src="../plugins/checkbox/icheck.js"></script>
<script src="../js/icheck.js"></script>
<script src="../js/icheck-init.js"></script>
<script src="../documentation/docs.js"></script>
<!-- PLUGINS de DATATABLES -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- JS PARA FORM-WIZARD Y VALIDACIÓN -->
<script src="../js/form-wizard/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<script src="../js/form-wizard/gsdk-bootstrap-wizard.js"></script>
<script src="../js/form-wizard/jquery.validate.min.js"></script>
<!-- /* FIN */ JS PARA FORM-WIZARD Y VALIDACIÓN -->
<script src="../js/jquery.validate.min.js"></script> <!-- Espacios en blanco -->
<!-- Select2 -->
<script src="../plugins/select2/select2.full.minjs"></script>
<!-- DATEPICKER -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../js/daterangepicker.js"></script> <!-- Espacios en blanco -->
<script src="../js/moment.js"></script> <!-- Espacios en blanco -->
<script type="text/javascript" src="../jsjquery-2.1.0.js"></script>
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

  });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('.input-daterange').datepicker({
    "locale": {
                "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
  
  format: "yyyy-mm-dd",
  autoclose: true

 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='') {
  var dataTable = $('#order_data').DataTable({

    "language":{
       "lengthMenu":"Mostrar _MENU_ registros por página.",
       "zeroRecords": "Lo sentimos. No se encontraron registros.",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros aún.",
             "infoFiltered": "(filtrados de un total de _MAX_ registros)",
             "search" : "Búsqueda",
             "LoadingRecords": "Cargando ...",
             "Processing": "Procesando...",
             "SearchPlaceholder": "Comience a teclear...",
             "paginate": {
     "previous": "Anterior",
     "next": "Siguiente", 
     }
      },

   "processing" : true,
   "serverSide" : true,
   "sort": false,
   "order" : [],
   "ajax" : {
    url:"./mantenimiento/ajax.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='') {
   $('#order_data').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else {
   alert("Por favor seleccione la fecha");
  }
 }); 
 
});
</script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('.input-daterange').datepicker({
    "locale": {
                "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
  
  format: "yyyy-mm-dd",
  autoclose: true

 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='') {
  var dataTable = $('#order_data_censo').DataTable({

    "language":{
       "lengthMenu":"Mostrar _MENU_ registros por página.",
       "zeroRecords": "Lo sentimos. No se encontraron registros.",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros aún.",
             "infoFiltered": "(filtrados de un total de _MAX_ registros)",
             "search" : "Búsqueda",
             "LoadingRecords": "Cargando ...",
             "Processing": "Procesando...",
             "SearchPlaceholder": "Comience a teclear...",
             "paginate": {
     "previous": "Anterior",
     "next": "Siguiente", 
     }
      },

   "processing" : true,
   "serverSide" : true,
   "sort": false,
   "order" : [],
   "ajax" : {
    url:"./censo/ajax_lista_censado.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#search1').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='') {
   $('#order_data_censo').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else {
   alert("Por favor seleccione la fecha");
  }
 }); 
 
});
</script>
<!-- Fin / PLUGINS de DATATABLES -->

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('.input-daterange').datepicker({
    "locale": {
                "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "Desde",
        "toLabel": "Hasta",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    },
  
  format: "yyyy-mm-dd",
  autoclose: true

 });

 fetch_data('no');

 function fetch_data(is_date_search, start_date='', end_date='') {
  var dataTable = $('#order_menu').DataTable({

    "language":{
       "lengthMenu":"Mostrar _MENU_ registros por página.",
       "zeroRecords": "Lo sentimos. No se encontraron registros.",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros aún.",
             "infoFiltered": "(filtrados de un total de _MAX_ registros)",
             "search" : "Búsqueda",
             "LoadingRecords": "Cargando ...",
             "Processing": "Procesando...",
             "SearchPlaceholder": "Comience a teclear...",
             "paginate": {
     "previous": "Anterior",
     "next": "Siguiente", 
     }
      },

   "processing" : true,
   "serverSide" : true,
   "sort": false,
   "order" : [],
   "ajax" : {
    url:"./mantenimiento/ajax_menu.php",
    type:"POST",
    data:{
     is_date_search:is_date_search, start_date:start_date, end_date:end_date
    }
   }
  });
 }

 $('#buscar').click(function(){
  var start_date = $('#start_date').val();
  var end_date = $('#end_date').val();
  if(start_date != '' && end_date !='') {
   $('#order_menu').DataTable().destroy();
   fetch_data('yes', start_date, end_date);
  }
  else {
   alert("Por favor seleccione la fecha");
  }
 }); 
 
});
</script>
  <script>
  $('.date').datepicker({
    format: 'yyyy-mm-dd',
  })
  </script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/login.js"></script>
  <script src="../estilo/materialize/js/materializemin.js"></script>

<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
  </body>
</html>