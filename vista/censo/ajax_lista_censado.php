<?php
$connect = mysqli_connect("localhost", "root", "1234", "cdaps");//Configurar los datos de conexion
$columns = array('id_personas', 'nombre', 'apellido', 'fecha_nacimiento','estado_civil', 'telefono','fecha_registro','estatus');

$query = "SELECT * FROM personas WHERE estatus='Censado(a)' AND ";

if($_POST["is_date_search"] == "yes") {
 $query .= 'fecha_registro BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"])) {
 $query .= '
  (id_personas LIKE "%'.$_POST["search"]["value"].'%" 
  OR nombre LIKE "%'.$_POST["search"]["value"].'%" 
  OR apellido LIKE "%'.$_POST["search"]["value"].'%"
  OR fecha_nacimiento LIKE "%'.$_POST["search"]["value"].'%"
  OR telefono LIKE "%'.$_POST["search"]["value"].'%"
  OR estatus LIKE "%'.$_POST["search"]["value"].'%")
 ';
}

if(isset($_POST["order"])) {
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else {
 $query .= 'ORDER BY fecha_registro DESC ';
}

$query1 = '';

if($_POST["length"] != -1) {
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

$estado = '<center><small class="label label-primary"><i class="fa fa-clock-o"></i> ';
$estado1 = '</small></center>';
while($row = mysqli_fetch_array($result)) {
 $ver ='<center> <a href="index.php?llave=ver_persona&id='.$row['id_personas'].'" title="Ver" data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-sm"><i class="ion-eye"></i></a>';
 $editar =' <a href="index.php?llave=modificar_persona&id='.$row['id_personas'].'" title="Modificar"data-toggle="tooltip" data-placement="top" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>';
 $eliminar = ' <a href="index.php?llave=eliminar_persona&id='.$row['id_personas'].'" title="Inhabilitar Censado" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> ';
 $reporte = ' <a href="reportes/reporte_personas.php?id='.$row['id_personas'].'" target="_blank" title="Reporte PDF" data-toggle="tooltip" data-placement="top" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i></a> </center>';
 $fecha=date("d/m/Y", strtotime($row["fecha_registro"]));
 $fecha_nacimiento=date("d/m/Y", strtotime($row["fecha_nacimiento"]));
 $sub_array = array();
 $sub_array[] = $row["cedula"];
 $sub_array[] = $row["nombre"];
 $sub_array[] = $row["apellido"];
 $sub_array[] = $fecha_nacimiento;
 $sub_array[] = $row["telefono"];
 $sub_array[] = $fecha;
 $sub_array[] = $estado .$row["estatus"] .$estado1;
 $sub_array[] = $ver .$editar .$eliminar .$reporte; 
 $data[] = $sub_array;
}

function get_all_data($connect) {
 $query = "SELECT * FROM personas WHERE estatus='Censado(a)'";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
