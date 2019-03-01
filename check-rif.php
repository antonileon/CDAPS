<?php
require_once 'config/conexion.php';

if( isset( $_POST['password'] ) && !empty($_POST['password'])){
	$password =md5( trim( $_POST['password'] ) );
	$usuario = $_POST['usuario'];
	
	if( !empty( $usuario) && !empty($password) ){
		$query = " SELECT count(usuario) cnt FROM usuario where password = '$password' and usuario = '$usuario' ";
		$result = mysqli_query($conectar, $query);
		$data = mysqli_fetch_assoc($result);
		if($data['cnt'] == 1){
			echo 'true';
		}else{
			echo 'false';
		}
	}else{
		echo 'false';
	}
	exit;
}


if( isset( $_POST['rif'] ) && !empty($_POST['rif'])){
	$rif = $_POST['rif'];
	$query = " SELECT count(rif) cnt FROM proveedores WHERE rif = '$rif' ";
	$result = mysqli_query($conectar, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] > 0){
		echo 'false';
	}else{
		echo 'true';
	}
	exit;
}

if( isset( $_GET['rif'] ) && !empty($_GET['rif'])){
	$rif = $_GET['rif'];
	$query = " SELECT count(rif) cnt FROM proveedores WHERE rif = '$rif' ";
	$result = mysqli_query($conectar, $query);
	$data = mysqli_fetch_assoc($result);
	if($data['cnt'] == 1){
		echo 'true';
	}else{
		echo 'false';
	}
	exit;
}