<?php
session_start();
	@ $id_vinilo = $_GET['id_vinilo'];
	@ $accion = $_GET['accion']; //para ver si hay que sumar o restar cantidad
	
	if(!$id_vinilo  || !isset($_SESSION['carrito'][$id_vinilo]) ||  !$accion){
		header('location: compra.php');
		exit;
	}
	
	$cantidad_actual= $_SESSION['carrito'][$id_vinilo];
	if($accion == 'sumar'){
		$_SESSION['carrito'][$id_vinilo]++;
	}elseif($accion == 'restar'){
		if($cantidad_actual > 1){
			$_SESSION['carrito'][$id_vinilo]--;
			
		}else{
			//eliminamos del carrito
			unset($_SESSION['carrito'][$id_vinilo]);
		}
	}
	header('location: compra.php');
?>