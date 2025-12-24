<html>
<head>

<?php include('estilo_formulario.php'); ?>

</head>
<body>
<?php
@ $correo=$_GET['correo'];
if(!$correo){
	header('location: mostrar_usuarios.php');
	exit;
}
  
	
	include('ConexBD_tienda.php');
	include('cabecera.php');
			
	//comprueba si el correo ya esta en la base de datos
	$query="select * from usuarios where correo='" . $correo . "'";
	$resultado = mysqli_query($db, $query);
	$num=mysqli_num_rows($resultado);
	if($num==0){
			echo "No hay usuarios registrados <br>";
			exit;
	}
	
	$fila=mysqli_fetch_array($resultado);
	
	
?>


<section id="rectangulo"> 
	<h1>Modificar usuario</h1>

	<form id="formulario" action="modificar_usuario2.php" method="post"> <!--formulario de inscripcion-->
	<br/><br/>
		<fieldset>
		<legend>Introduzca sus datos</legend>
			<input type="radio" name="privilegio" <?php if($fila['privilegio']==1) echo "checked";?> value="1">Administrador</input>
		<input type="radio" name="privilegio" <?php if($fila['privilegio']==2) echo "checked";?>  value="2">Cliente</input></div>
			Nombre: <input name="nombre" type="text" maxlength="100" required value="<?php echo $fila['nombre'];?>"><br> 
			Apellidos: <input name="apellido" type="text" maxlength="100" required value="<?php echo $fila['apellido'];?>"><br>
			Correo: <input readonly name="correo" type="text" maxlength="50" value="<?php echo $fila['correo'];?>"><br>
			Ciudad: <input name="ciudad" type="text" maxlength="100" required value="<?php echo $fila['ciudad'];?>"><br>
			Fecha de nacimiento: <input name="fechnac" type="text" required value="<?php echo $fila['fechnac'];?>"><br>
			Contraseña: <input name="contrasena" type="text" maxlength="50" required value="<?php echo $fila['contrasena'];?>"><br>
			

            <!--el usuario debe completar todos los campos ya que son required-->
		</fieldset>
		<br/><br/>
	<button type="submit" form="formulario" >Aceptar</button> <!-- Botón fuera del form, pero lo asociamos -->
	 <!--al ser submit cuando lo pinchamos se envia el formulario--> 		
	</form>
</section>
</body>
</html>