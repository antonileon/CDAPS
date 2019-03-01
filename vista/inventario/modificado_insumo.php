<?php 
  require_once('../config/conexion.php');

  extract($_REQUEST);
  //$id_insumos=$_GET['id_insumos'];
  $sql="UPDATE insumos SET id_proveedores='$id_proveedores', codigo_insumo='$codigo_insumo', tipo='$tipo', nombre='$nombre', marca='$marca' WHERE id_insumos='$id_insumos'";
  
  $query = mysqli_query($conectar,$sql);
  if($query>0){
    echo" <script type='text/javascript'>
      alert('Insumo Modificado');
      window.open('index.php?llave=insumos','_self');
      </script>";
    } else { 
      echo " <script type='text/javascript'>
        alert('No Se modificaron Los Datos');
        window.open('index.php?llave=insumos','_self');
        </script>";
    }
?> 