<?php 
  require_once('../config/conexion.php');

  extract($_REQUEST);
  //$id=$_GET['id'];
  $sql="UPDATE proveedores SET nombre_proveedor='$nombre_proveedor', telefono='$telefono', email='$email', direccion_proveedores='$direccion_proveedores' WHERE id_proveedores='$id_proveedores'";
  
  $query = mysqli_query($conectar,$sql);
  if($query>0){
    echo" <script type='text/javascript'>
      alert('Registro Modificado');
      window.open('index.php?llave=proveedores','_self');
      </script>";

    $login = $_SESSION['usuario'];
    $auditoria ="INSERT INTO  auditoria (id, usuario, actividad, fecha ,hora) VALUES (NULL, '$login ','Ha modificado los datos del Proveedor $nombre_proveedor', CURRENT_TIMESTAMP, CURRENT_TIME)";
    $bita=mysqli_query($conectar,$auditoria) or die ("Error en Auditoria" .mysqli_error()); 

    } else { 
      echo " <script type='text/javascript'>
        alert('No Se modificaron Los Datos');
        window.open('index.php?llave=proveedores','_self');
        </script>";
    }
?> 