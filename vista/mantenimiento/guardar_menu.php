<?php 
  require("../config/conexion.php");
  $fecha = date('Y-m-d');
  extract ($_REQUEST);
  $sql="SELECT * FROM menu_comida WHERE fecha='$fecha' ";
    $consulta=mysqli_query($conectar,$sql);

  if (mysqli_num_rows($consulta) == 0) {

      $sql2=" INSERT INTO menu_comida VALUES ('NULL','".$plato."','".$jugo."','".$merienda."', CURRENT_TIMESTAMP)";
      $query= mysqli_query($conectar,$sql2);
        if ($query) {
?>
  <script type="text/javascript">
    alert("<?php echo 'Registro Exitoso'; ?>")
    var confirmar=confirm("Desea Imprimir Reporte PDF")
    if (confirmar==true) {
      window.location=("reportes/reporte_menu.php?fecha=<?php echo $fecha; ?>");
    }
    else {
      window.location=("index.php?llave=menu_comida");
    }
  </script>
<?php
  } else {
    echo "  <script type='text/javascript'>
          alert('No Se Registraron Los Datos');
          window.open('index.php?llave=menu_comida','_self');
        </script>";
  }

 } else { ?>
  <script type="text/javascript">
    alert("Ya registro el plato del día")
    window.location=("index.php?llave=menu_comida");
  </script>
<?php } ?>