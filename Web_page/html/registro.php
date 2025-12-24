<?php
session_start();
include('ConexBD_tienda.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="../css/style1.css"> <!--enlace al CSS-->
  <link rel="stylesheet" href="../css/style_header.css"> <!--enlace al CSS-->

 <link rel="stylesheet" href="../css/style_reg.css"> <!--tiene mayor prioridad-->
 <!-- <script src="../js/js_reg.js"></script> <!--enlace al JavaScript--> -->
 <title>VINTAGE SOUND</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>




<!-- Misma cabecera que en el documento raiz -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>
  <a href="registro.php">
    <img id="persona" src="../images/pers.jpg" alt="icono persona">
  </a>
</header>

<!-- Menú de navegación -->
<section>
	<nav id="regreso">
		<a href="../raiz.php">HOME</a>
	</nav>
	
</section>


<section id="rectangulo"> 
	<h1>Formulario de registro</h1>

	<form id="formulario" action="registros_clientes.php" method="post"> <!--formulario de inscripcion-->
	<br/><br/>
		<fieldset>
		<legend>Introduzca sus datos</legend>
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