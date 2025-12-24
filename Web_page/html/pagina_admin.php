<?php
session_start();
include('ConexBD_tienda.php');
			//para que solo permita el acceso al administrador
			if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 1){
				header('Location: ../raiz.php');
				exit;
			}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="../css/style1.css"> <!--enlace al CSS-->
  <link rel="stylesheet" href="../css/style_header.css"> <!--enlace al CSS-->
 <link rel="stylesheet" href="../css/style_reg.css"> <!--tiene mayor prioridad-->
 <!-- <script src="../js/js_reg.js"></script> <!--enlace al JavaScript--> 
 <title>VINTAGE SOUND</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.categorias{
	color: #372E4B; /* Color principal (Morado oscuro) */
	background-color: #EFEDF3;
	text-align:center;
}
#opciones {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #EFEDF3; /* Fondo claro */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Estilo para los enlaces de cada opción */
#opciones a {
    display: block; /* Ocupa todo el ancho */
    text-decoration: none; /* Quitar el subrayado */
    color: #372E4B; /* Color principal (Morado oscuro) */
    font-size: 1.2em;
    padding: 15px 20px;
    margin-bottom: 8px; /* Espacio entre opciones */
    background-color: #FFFFFF; /* Fondo blanco para las cajas de opciones */
    border-left: 5px solid #A2482D; /* Borde de color Naranja/Rojo para destacar */
    border-radius: 4px;
    transition: all 0.3s ease; /* Transición suave para hover */
	
    font-weight: bold;
    text-transform: uppercase;
	
}


/* Efecto al pasar el ratón (Hover) */
#opciones a:hover {
    background-color: #E5DBF5; /* Fondo Morado claro al pasar el ratón */
    border-left: 5px solid #A2482D; /* Mantiene el color del borde */
    color: #000;
}
</style>
</head>
<body>

<!-- Misma cabecera que en el documento raiz -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>
	<a href="registro_inicio_sesion.php">
    <img id="persona" src="../images/pers.jpg" alt="icono persona">
	</a>
</header>




  <h1 class="categorias">OPCIONES ADMINISTRADOR</h1>
  <div id="opciones">
  
  <a href="mostrar_productos.php">
    Ver productos
  </a>
  <a href="registro_productos.php">
    Añadir productos
  </a>
  <a href="mostrar_usuarios.php">
    Ver usuarios
  </a>
  <a href="registro_admins.php" >
    Añadir usuarios
  </a>
  </div>
	
</body>

</html>