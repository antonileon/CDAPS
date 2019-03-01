<?php
	date_default_timezone_set('America/Caracas');
	//**Fecha en Orden**//
 	$date = date("Y-m-d");
 	$fecha = str_replace('-', '/', date("d-m-Y", strtotime($date)));
	//** Fin - Fecha en Orden**//

	//** Mostrar Fecha Actual en Español **//
	$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
	$arrayDias = array( 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
	$time = date('h:i A');
	//echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y'); /* 
	//** Fin - Mostrar Fecha Actual en Español **//

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script type="text/javascript">
function hora() { 
	var fecha = new Date()
	var hora = fecha.getHours()
  	var minuto = fecha.getMinutes()
  	var segundo = fecha.getSeconds()
    if (hora < 10) {hora = "0" + hora}
    	if (minuto < 10) {minuto = "0" + minuto}
       		if (segundo < 10) {segundo = "0" + segundo}
  	var horita = hora + ":" + minuto + ":" + segundo
  	document.getElementById('hora').firstChild.nodeValue = horita
  	tiempo = setTimeout('hora()',1000)
}

function inicio(){
	document.write('<span id="hora">')
	document.write('000000</span>')
 	hora()
}
	/*var puntos = ":"
	function hora() {
		var fecha = new Date()
		var hora = fecha.getHours()
		var minuto = fecha.getMinutes()
		var meridiano = " AM"
		if(hora > 12){hora -= 12; meridiano = " PM"}
			if (hora < 10) {hora = "0" + hora}
				if (minuto < 10) {minuto = "0" + minuto}
					puntos == ":" ? puntos = " " : puntos = ":"
		var horita = hora + puntos + minuto + meridiano
		document.getElementById('hora').firstChild.nodeValue = horita
		tiempo = setTimeout('hora()',1000)
	}
	function inicio(){
		document.write('<span id="hora">')
		document.write('000000</span>')
		hora()
	}*/
</script>
</body>
</html>