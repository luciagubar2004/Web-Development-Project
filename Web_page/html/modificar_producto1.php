<html>
<head>

<?php include('estilo_formulario.php'); ?>

</head>
<body>
<?php
@ $id_vinilo=$_GET['id_vinilo'];
if(!$id_vinilo){
	header('location: mostrar_productos.php');
	exit;
}
  
	
	include('ConexBD_tienda.php');
	include('cabecera.php');
			
	//comprueba si el id_vinilo ya esta en la base de datos
	$query="select * from vinilos where id_vinilo='" . $id_vinilo . "'";
	$resultado = mysqli_query($db, $query);
	$num=mysqli_num_rows($resultado);
	if($num==0){
			echo "No hay productos registrados <br>";
			exit;
	}
	
	$fila=mysqli_fetch_array($resultado);
	
	
?>


<section id="rectangulo"> 
	<h1>Modificar producto</h1>

	<form id="formulario" action="modificar_producto2.php" method="post"> <!--formulario de inscripcion-->
	<br/><br/>
		<fieldset>
		<legend>Introduzca datos</legend>
		<input name="id_vinilo" type="hidden" value="<?php echo $fila['id_vinilo'];?>">
			Nombre: <input name="nombre" type="text" maxlength="20" required value="<?php echo $fila['nombre'];?>"><br> 
			Tipo: <input name="tipo" type="text" maxlength="100" required value="<?php echo $fila['tipo'];?>"><br>
			Imagen: <input name="imagen" type="text" maxlength="255" required value="<?php echo $fila['imagen'];?>"><br>
			Precio: <input name="precio" type="text" maxlength="7" required value="<?php echo $fila['precio'];?>" ><br>
            <!--el usuario debe completar todos los campos ya que son required-->
		</fieldset>
		<br/><br/>
	<button type="submit" form="formulario" >Aceptar</button> <!-- Botón fuera del form, pero lo asociamos -->
	 <!--al ser submit cuando lo pinchamos se envia el formulario--> 		
	</form>
</section>
</body>
</html>