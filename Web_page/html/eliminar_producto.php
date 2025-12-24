<?php
@ $id_vinilo=$_GET['id_vinilo'];
if(!$id_vinilo){
	header('location: mostrar_productos.php');
	exit;
}
   include('ConexBD_tienda.php');
	$query="delete from vinilos where id_vinilo='" . $id_vinilo . "'";
	$resultado = mysqli_query($db, $query);
	header('location: mostrar_productos.php');
?>