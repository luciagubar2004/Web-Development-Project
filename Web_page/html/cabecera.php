<!DOCTYPE html>
<html lang="en">
<head>
 <title>VINTAGE SOUND</title> <!--titulo que aparece en la pestaña del navegador-->
 <meta charset="utf-8"> <!--establecemos la codificación de caracteres-->
 <link rel="stylesheet" href="../css/style1.css"> <!--enlace al CSS-->
  <link rel="stylesheet" href="../css/style_header.css"> <!--enlace al CSS-->

 <link rel="stylesheet" href="../css/style_reg.css"> <!--tiene mayor prioridad-->
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <style>
		
/* Estilo de la cabecera header */
header {
  
  font-family: oswald;
  background-color: #372E4B; /*morado claro*/
  padding: 20px;
  height: 200px;
  color: #A2482D; /*naranja*/
  
  text-transform: uppercase;    /* Mayúsculas */
  margin: 0 0 2%;             /* Espacio debajo */
  font-weight: bold;            /* Negrita */  
  position: relative; /* Para que los elementos flotantes estén relativos a este contenedor */
  
}


h1#vinsou {
 font-size: 65px;
 background-color: #372E4B;
 color: #A2482D; /*naranja*/
 margin-left: 20px;
}

h2#disvinpos {
 font-size: 25px;
 background-color: #372E4B;
 color: white;
 margin-top:-40px;
 margin-left: 235px;
}


 /*adaptamos las letras en la cabecera para que sea adaptativa*/
@media only screen and (max-width: 770px) {
 /*disminuimos el tamaño de la letra y cambiamos el margen*/
 h1#vinsou {
 font-size: 55px;
}
 h2#disvinpos{
  font-size: 20px;
  margin-left: 20px;
 }
}
/*cuando la pantalla es menor a 580px*/
@media only screen and (max-width: 580px) {
 header#home {
 height: 220px;;
 }
}




 </style>
</head>
<body>


 <!-- CABECERA -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>

</header>
<!-- Menú de navegación -->
<section>
	<nav id="regreso">
		<a href="pagina_admin.php">HOME ADMINISTRADOR</a>
	</nav>
	
</section>

</body>

</html>