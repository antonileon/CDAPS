<?php 
  require_once('../config/conexion.php');

  extract($_REQUEST);
  $sql="UPDATE inventario SET estado='$estado', fecha_vencimiento='$fecha_vencimiento', observaciones='$observaciones' WHERE id_inventario='$id_inventario'";
  
  $query = mysqli_query($conectar,$sql);
  if($query>0){
    echo" <script type='text/javascript'>
      alert('Producto de Inventario Modificado');
      window.open('index.php?llave=inventario','_self');
      </script>";
    } else { 
      echo " <script type='text/javascript'>
        alert('No Se modificaron Los Datos');
        window.open('index.php?llave=inventario','_self');
        </script>";
    }
?> 