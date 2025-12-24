<?php
@ $correo=$_GET['correo'];
if(!$correo){
	header('location: mostrar_usuarios.php');
	exit;
}
   include('ConexBD_tienda.php');
	$query="delete from usuarios where correo='" . $correo . "'";
	$resultado = mysqli_query($db, $query);
	header('location: mostrar_usuarios.php');
?>