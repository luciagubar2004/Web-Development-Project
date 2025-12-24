<?php
session_start();
include('html/ConexBD_tienda.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="css/style1.css"> <!--enlace al CSS-->
 <link rel="stylesheet" href="css/style_galeria.css"> <!--enlace al CSS-->
 <link rel="stylesheet" href="css/style_header.css"> <!--enlace al CSS-->
 <title>VINTAGE SOUND</title> <!--titulo que aparece en la pestaña del navegador-->
 <meta charset="utf-8"> <!--establecemos la codificación de caracteres-->
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
  
 <!-- Meta descripción y palabras clave -->
  <meta name="description" content="Vintage Sounds - Tienda online de vinilos, discos y posters exclusivos. Explora la música de Olivia Rodrigo y sus ediciones limitadas.">
  <meta name="keywords" content="vinilos, música, discos, posters, tienda vintage, Olivia Rodrigo, guts, sour, cd, colección, tienda Madrid, vinilos exclusivos">
  <meta name="author" content="Vintage Sounds">


</head>
<body>

 <!-- CABECERA -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>
  
  <div id="iconos">
   <a href="html/registro_inicio_sesion.php"> <!-- Al hacer clic en la imagen de la persona saltamos a otro doc HTML -->
   <img id="persona" src="images/pers.jpg" alt="icono persona">
	</a>
  <a href="html/buscador_pagina.php"> 
  <img id="lupa" type="button" src="images/lupa.jpg" alt="icono lupa"> <!-- Al hacer clic en la imagen aparece el buscador -->
	</a>
	
	<a href="html/compra.php"> <!-- Al hacer clic en la imagen de la persona saltamos a otro doc HTML -->
  <img id="imcarrito" type="button" src="images/carrito.jpg" alt="icono carrito"> <!-- Al hacer clic en la imagen aparece el buscador -->
	</a>
   </div>
</header>

<!-- Menú de navegación -->
<section>
	<nav id="menu">
		<ul>
			<li><a href="#home">Inicio</a></li> <!-- Enlazado profundo -->
			<li><a href="#Vinilos">Vinilos</a></li>
			<li><a href="#discos">CDs</a></li>
			<li><a href="#posters">Posters</a></li>
			<li><a href="#pie">Contacto</a></li>
		</ul>
	</nav>
	
</section>

<!-- video que se puede pausar y reanudar -->
<section id="videos">
	<div id="video-background-container">
		<video id="video-background" type="button" autoplay loop muted><!-- el video está en bucle, se inicia solo y esta muteado -->
			<source src="video/video.mp4" type="video/mp4">
		</video>	
    </div>
</section>


<!-- GALERÍA DE PRODUCTOS -->
<section id="Vinilos">
	<h1 class= "categorias">VINILOS</h1>
	<div class="products">
	
	<?php
			$tipo='Vinilo';
			$query="select * from vinilos where tipo='" . $tipo . "'";
			$resultado = mysqli_query($db, $query);
			$num=mysqli_num_rows($resultado);
			
			for($i=0;$i<$num;$i++){
				$fila=mysqli_fetch_array($resultado);
	?>
		<a href="html/anadirAlCarrito.php?id_vinilo=<?php echo $fila['id_vinilo']; ?>">
		<div class="product"> 
			<img id="gif" src="images/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>"> <!-- Imagen del producto -->
			<h3><?php echo $fila['nombre']; ?> </h3> <!-- Nombre del producto -->
			<p class="price"><?php echo $fila['precio']; ?> €</p> <!-- Precio del producto -->
		
		</div>
		</a>
<?php
}
?>
</div>
</section>

<section id="discos">
	<h1 class= "categorias">CDs</h1>
	<div class="products">
	
	<?php
				$tipo='cd';
				$query="select * from vinilos where tipo='" . $tipo . "'";
			$resultado = mysqli_query($db, $query);
			$num=mysqli_num_rows($resultado);
			
			for($i=0;$i<$num;$i++){
				$fila=mysqli_fetch_array($resultado);
	?>
		<a href="html/anadirAlCarrito.php?id_vinilo=<?php echo $fila['id_vinilo']; ?>">
		<div class="product">
			<img id="gif" src="images/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>"> <!-- Imagen del producto -->
			<h3><?php echo $fila['nombre']; ?> </h3> <!-- Nombre del producto -->
			<p class="price"><?php echo $fila['precio']; ?> €</p> <!-- Precio del producto -->
		</div>
		</a>
<?php
}
?>
</div>
</section>

<section id="posters">
	<h1 class= "categorias">POSTERS</h1>
	<div class="products">
	
	<?php
				$tipo='poster';
				$query="select * from vinilos where tipo='" . $tipo . "'";
			$resultado = mysqli_query($db, $query);
			$num=mysqli_num_rows($resultado);
			
			for($i=0;$i<$num;$i++){
				$fila=mysqli_fetch_array($resultado);
	?>
		<a href="html/anadirAlCarrito.php?id_vinilo=<?php echo $fila['id_vinilo']; ?>">
		<div class="product">
			<img id="gif" src="images/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>"> <!-- Imagen del producto -->
			<h3><?php echo $fila['nombre']; ?> </h3> <!-- Nombre del producto -->
			<p class="price"><?php echo $fila['precio']; ?> €</p> <!-- Precio del producto -->
		</div>
		</a>
<?php
}
?>
</div>
</section>


<!-- FOOTER con información de contacto -->
<footer id="pie">

  <div class="footer-content">
    <p>&copy; 2025 VINTAGE SOUNDS — Todos los derechos reservados.</p>
	<p>vintagesounds@gmail.com   |   +34 689 67 52 32   |   @vintagesounds</p> 
	<p>Calle Gran Vía, 45 – 28013 Madrid, España</p>
    
  </div>
</footer>
<script src="js/java.js"></script> <!-- Enlace al documento con el JavaScript -->
</body>
</html>
