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


<section id="rectangulo" style="height: 500px;"> 
	<h1>Añade Producto</h1>

	<form id="formulario" action="registros_productos.php" method="post"> <!--formulario de inscripcion-->
	<br/><br/>
		<fieldset>
		<legend>Introduzca datos</legend>
			Nombre: <input name="nombre" type="text" maxlength="20" required><br> 
			Tipo: <input name="tipo" type="text" maxlength="100" required><br>
			Imagen: <input name="imagen" type="text" maxlength="255" required><br>
			Precio: <input name="precio" type="text" maxlength="7" required><br>
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