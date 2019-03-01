<?php
	error_reporting(0);
	date_default_timezone_set('America/Caracas');
	session_start();
/*Código para ataque por la URL*/
	if (!$_SESSION) {
		header("Location: ../index.php");
	}
/*Fin*/
	require_once ('../config/conexion.php');

	$sql="SELECT id, usuario FROM usuario ORDER BY id DESC";
	$query = mysqli_query($conectar, $sql);
	$rows = mysqli_num_rows($query);

	$sql1="SELECT id_proveedores FROM proveedores ORDER BY id_proveedores DESC";
	$query1 = mysqli_query($conectar, $sql1);
	$rows1 = mysqli_num_rows($query1);

	$sql2="SELECT * FROM datos_personas INNER JOIN personas 
	ON personas.id_datos_personas=datos_personas.id_datos_personas WHERE personas.estatus='Censado(a)'";
	$query2 = mysqli_query($conectar, $sql2);
	$rows2 = mysqli_num_rows($query2);

	$sql3="SELECT * FROM datos_personas INNER JOIN personas 
	ON personas.id_datos_personas=datos_personas.id_datos_personas WHERE personas.estatus='Beneficiado(a)'";
	$query3 = mysqli_query($conectar, $sql3);
	$rows3 = mysqli_num_rows($query3);

?>
<?php include_once "includes/head.php"; ?>

    <!-- ===============================================  CONTENIDO DEL COMPONENTE =============================================== -->

		<?php 
		include"../config/conexion.php";
		switch($_REQUEST['llave']){
		//** Usuario **//
			case'perfil':include"usuario/perfil.php";break;
			case'usuario':include"usuario/usuario.php";break;
			case'guardar_perfil':include"usuario/guardar_perfil.php";break;
			case'guardar_usuario':include"usuario/guardar_usuario.php";break;
			case'cambiar_clave':include"usuario/cambiar_clave.php";break;
			case'cambiar_imagen':include"usuario/cambiar_imagen.php";break;
			case'eliminar_usuario':include"usuario/eliminar_usuario.php";break;
			case'ver_usuario':include"usuario/ver_usuario.php";break;
			case'modificar_usuario':include"usuario/modificar_usuario.php";break;
			case'modificado_usuario':include"usuario/modificado_usuario.php";break;
			case'registrar_usuario':include"usuario/registrar_usuario.php";break;
			case'modificado_clave':include"usuario/modificado_clave.php";break;
		//** Censo **//	
			case'censo':include"censo/censo.php";break;
			case'verificar_cedula':include"censo/verificar_cedula.php";break;
			case'registrar_censo':include"censo/registrar_censo.php";break;
			case'guardar_censo':include"censo/guardar_censo.php";break;
			case'listado_censo':include"censo/listado_censo.php";break;
			case'listado_beneficiado':include"censo/listado_beneficiado.php";break;
			case'listado_inhabilitado':include"censo/listado_inhabilitado.php";break;
			case'beneficiar_persona':include"censo/beneficiar_persona.php";break;
			case'inhabilitar_persona':include"censo/inhabilitar_persona.php";break;
			case'ver_persona':include"censo/ver_persona.php";break;
			case'modificar_persona':include"censo/modificar_persona.php";break;
			case'modificado_persona':include"censo/modificado_persona.php";break;
			case'ejm_lista':include"censo/ejm_lista.php";break;
			case'ajax_lista_censado':include"censo/ajax_lista_censado.php";break;
			case'eliminar_persona':include"censo/eliminar_persona.php";break;
			case'bene_persona':include"censo/bene_persona.php";break;
		//** Inventario **//
			case'registrar_inventario':include"inventario/registrar_inventario.php";break;
			case'proveedores':include"inventario/proveedores.php";break;
			case'registrar_proveedores':include"inventario/registrar_proveedores.php";break;
			case'guardar_proveedores':include"inventario/guardar_proveedores.php";break;
			case'registrar_insumo':include"inventario/registrar_insumo.php";break;
			case'ver_registro':include"inventario/ver_registro.php";break;
			case'guardar_insumo':include"inventario/guardar_insumo.php";break;
			case'insumos':include"inventario/insumos.php";break;
			case'ver_insumos':include"inventario/ver_insumos.php";break;
			case'guardar_inventario':include"inventario/guardar_inventario.php";break;
			case'inventario':include"inventario/inventario.php";break;
			case'ver_inventario':include"inventario/ver_inventario.php";break;
			case'eliminar_proveedor':include"inventario/eliminar_proveedor.php";break;
			case'modificar_proveedor':include"inventario/modificar_proveedor.php";break;
			case'modificado_proveedor':include"inventario/modificado_proveedor.php";break;
			case'modificado_insumo':include"inventario/modificado_insumo.php";break;
			case'modificado_inventario':include"inventario/modificado_inventario.php";break;
			case'modificar_insumo':include"inventario/modificar_insumo.php";break;
			case'modificar_inventario':include"inventario/modificar_inventario.php";break;
			case'usar_producto':include"inventario/usar_producto.php";break;
			case'modificado_producto':include"inventario/modificado_producto.php";break;
			case'inventario_rechazado':include"inventario/inventario_rechazado.php";break;
		//** Mantenimiento *//
			case'auditoria':include"mantenimiento/auditoria.php";break;
			case'respaldar':include"mantenimiento/respaldar.php";break;
			case'restaurar':include"mantenimiento/restaurar.php";break;
			case'ajax':include"mantenimiento/ajax.php";break;
			case'menu_comida':include"mantenimiento/menu_comida.php";break;
			case'guardar_menu':include"mantenimiento/guardar_menu.php";break;
			case'configuracion':include"mantenimiento/configuracion.php";break;
			case'cambiar_logo':include"mantenimiento/cambiar_logo.php";break;
			case'guardar_configuracion':include"mantenimiento/guardar_configuracion.php";break;
		//** Asistencia **//
			case'asistencia':include"asistencia/asistencia.php";break;
			case'guardar_asistencia':include"asistencia/guardar_asistencia.php";break;
			case'marcar_asistencia':include"asistencia/marcar_asistencia.php";break;
		//** Reportes **//
			case'reporte_usuario':include"reportes/reporte_usuario.php";break;
			case'reporte_proveedor':include"reportes/reporte_proveedor.php";break;
			case'reporte_personas':include"reportes/reporte_personas.php";break;
			case'reporte_menu':include"reportes/reporte_menu.php";break;

			default: include "inicio.php";break;
		}
		?>

<!-- ===============================================  CONTENIDO DEL COMPONENTE  ============================================== -->

<?php include_once "includes/footer.php"; ?>