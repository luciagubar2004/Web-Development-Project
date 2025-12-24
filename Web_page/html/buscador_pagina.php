<?php
session_start();
include('ConexBD_tienda.php');

?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VINTAGE SOUND</title>	
	<link rel="stylesheet" href="../css/style_header.css"> <!--enlace al CSS-->
	<link rel="stylesheet" href="../css/style_reg.css"> 
	<link rel="stylesheet" href="../css/style_buscador.css"> 

</head>
<body>

<!-- Misma cabecera que en el documento raiz -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>
  <a href="registro_inicio_sesion.php" target="_blank">
    <img id="persona" src="../images/pers.jpg" alt="icono persona">
  </a>
</header>

<!-- Menú de navegación -->
<section>
	<nav id="regreso">
		<a href="../raiz.php">HOME</a>
	</nav>
	
</section>

<h1 style="text-align:center;">BUSCADOR</h1>

<div class="search-container">
    
    <form action="buscador.php" method="post" style="background-color: #EFEDF3;">

        <div class="section-title">Palabra clave</div>
        
        <div class="keyword-row" >
            <label for="keyword" class="keyword-label">Palabra clave:</label>
            <input type="text" id="keyword" name="clave" class="keyword-input">
            <button type="submit" name="search_type" value="simple">Buscar</button>
            <button type="reset">Borrar</button>
        </div>

        <div class="section-title">Por campos</div>

        <div class="fields-container">
            <label class="field-label">Nombre del producto:</label>
            <input type="text" name="bnombre" class="field-input">

            <label class="field-label">Tipo de producto:</label>
            <input type="text" name="btipo" class="field-input">

            <label class="field-label">Precio del producto:</label>
            <input type="text" name="bprecio" class="field-input">

            <div class="buttons-row">
                <button type="submit" name="search_type" value="advanced">Buscar</button>
                <button type="reset">Borrar</button>
            </div>
        </div>

        <div class="keyword-row">
            <button type="submit" name="search_type" value="all">Ver todos los productos</button>
        </div>

    </form>

</div>



</body>
</html>