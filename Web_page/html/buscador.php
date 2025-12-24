<?php
	session_start();

	include('ConexBD_tienda.php');
	
	$tipoBusqueda = isset($_REQUEST['search_type']) ? $_REQUEST['search_type'] : '';	
	// Inicializamos la query vacía por seguridad
	$query = "";
	$mensaje_error="";
	if ($tipoBusqueda == 'simple') {
		// CASO 1: Búsqueda por palabra clave (Buscador simple)
		$clave = isset($_POST['clave']) ? trim($_POST['clave']) : '';
		
		if (empty($clave)) {
        $mensaje_error = "Por favor, introduce una palabra clave para buscar.";
		} else {
		$query = "SELECT * FROM vinilos WHERE 
              nombre LIKE '%$clave%' OR 
              tipo LIKE '%$clave%' OR 
              precio LIKE '%$clave%'";
		}
	}elseif ($tipoBusqueda == 'advanced') {
		// CASO 2: Búsqueda por campos (Buscador avanzado)
		//Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
		@$bnombre=$_POST['bnombre'];
		@$btipo=$_POST['btipo'];
		@$bprecio=$_POST['bprecio'];
				
		//Recortamos caracteres en blanco al principio y final de la cadena con trim
    	$bnombre = trim($bnombre);
		$btipo = trim($btipo);
		$bprecio = trim($bprecio);
			
		$bnombre = addslashes($bnombre);
		$btipo = addslashes($btipo);
		$bprecio = addslashes($bprecio);
		
		if (empty($bnombre) || empty($btipo) || empty($bprecio)) {
        $mensaje_error = "Por favor, rellena los campos del buscador avanzado.";
		} else {
		$query = "SELECT * FROM vinilos WHERE 
              nombre LIKE '%$bnombre%' AND 
              tipo LIKE '%$btipo%' AND 
              precio LIKE '%$bprecio%'";
		}
		
	} elseif ($tipoBusqueda == 'all') {
		// CASO 3: Ver todos los resultados
		$query = "SELECT * FROM vinilos";
	}
	$num=0;
    if ($query != "" && $mensaje_error == "") {
		$resultado = mysqli_query($db, $query);
		$num = mysqli_num_rows($resultado);
	}
			
	
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style_header.css">
	<link rel="stylesheet" href="../css/style_tabla_buscador.css">

    <title>BUSCADOR | VINTAGE SOUND</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <style>
		
    </style>
</head>
<body>

 <!-- CABECERA -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>
  
<!-- Menú de navegación -->
<section>
	<nav id="menu">
		<ul>
			<li><a href="../raiz.php">HOME</a></li> 

		</ul>
	</nav>

</section>
  
</header>
<h1 style="text-align:center;">RESULTADOS BUSQUEDA</h1>
<?php
	if ($mensaje_error != ""){?>
    <div style="text-align:center; color: red; margin: 20px; font-weight: bold;">
        <?php echo $mensaje_error; ?>
    </div>
<?php
	}elseif($num==0){
		echo "No hay datos";
        
	}
	else{
?>
<table class="buscador-tabla">
    <thead>
		<tr>
            <th></th>
            <th>Producto</th>
            <th>Precio</th>
		</tr>

    </thead>
    <tbody>
	<?php
		for($i=0;$i<$num;$i++){
		$fila=mysqli_fetch_array($resultado);
		echo '<tr>';
				echo '<td><img src="../images/'.$fila['imagen'].'" alt="'.$fila['nombre'].'"></td>';
				echo '<td>'.$fila['nombre'].'</td>';
				echo '<td>'.$fila['precio'].'</td>';
					
		echo '</tr>';
		}
	?>
	
	<tbody>

</table>

</body>
</html>

<?php
	//cierro el else (num==0)    
	}
?>