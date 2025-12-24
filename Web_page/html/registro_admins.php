<?php
session_start();
include('ConexBD_tienda.php');
include('cabecera.php');

//para que solo permita el acceso al administrador
	if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 1){
		header('Location: ../raiz.php');
		exit;
	}
?>


<section id="rectangulo" > 
	<h1>Registro Usuario</h1>

	<form id="formulario" action="registros_admins.php" method="post"> <!--formulario de inscripcion-->
	<br/><br/>
		<fieldset>
		
		<legend>Introduzca sus datos</legend>
		<div class="radious">
		<input type="radio" name="privilegio" value="1">Administrador</input>
		<input type="radio" name="privilegio" value="2">Cliente</input></div>
			Nombre: <input name="nombre" type="text" maxlength="100" required><br> 
			Apellidos: <input name="apellido" type="text" maxlength="100" required><br>
			Correo: <input name="correo" type="text" maxlength="50" required><br>
			Ciudad: <input name="ciudad" type="text" maxlength="100" required><br>
			Fecha de nacimiento: <input name="fechnac" type="text" required><br>
			Contraseña: <input name="contrasena" type="text" maxlength="50" required><br>
			

            <!--el usuario debe completar todos los campos ya que son required-->
		</fieldset>
		<br/><br/>
	<button type="submit" form="formulario" >Aceptar</button> <!-- Botón fuera del form, pero lo asociamos -->
	 <!--al ser submit cuando lo pinchamos se envia el formulario--> 		
	</form>


</section>

<!-- Mensaje emergente oculto que aparece al enviar el formulario-->
<div id="mensaje" class="oculto">
  <p>Te has suscrito a nuestro newsletter.</p>
  <img id="news" src="../images/newsletter.gif" alt="Vinilo 70s"><!--gif que aparece dentro del mensaje-->
  <button id="cerrar">Cerrar</button>
</div>

</body>

</html>