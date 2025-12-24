<?php
session_start();

@ $id_vinilo=$_GET['id_vinilo'];
if(!$id_vinilo){
	header('location: ../raiz.php');
	exit;
}

if($_SESSION['carrito'][$id_vinilo])
	$_SESSION['carrito'][$id_vinilo]++;
else
	$_SESSION['carrito'][$id_vinilo]=1;

header('location: ../raiz.php');
?>