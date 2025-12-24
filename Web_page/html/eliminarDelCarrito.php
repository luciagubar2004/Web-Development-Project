<?php
session_start();

@ $id_vinilo=$_GET['id_vinilo'];
//comprobamos el id vinilo y si el carrito existe o no
if(!$id_vinilo || !isset($_SESSION['carrito'][$id_vinilo])){
	header('location: compra.php');
	exit;
}
if(isset($_SESSION['carrito'][$id_vinilo])){
	//eliminamos la variable
	unset($_SESSION['carrito'][$id_vinilo]);
}
   header('location: compra.php');
?>