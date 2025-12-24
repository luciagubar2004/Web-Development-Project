<?php
session_start();
include('ConexBD_tienda.php');
$coste_total = 0;
// Si el carrito está vacío, inicializamos la sesión si no existe, o simplemente no iteramos

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="../css/style_header.css">
    <title>CARRITO | VINTAGE SOUND</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <style>
        .carrito-container {
            max-width: 1000px;
            margin: 120px auto 50px auto; /* Espacio para el menú fijo */
            padding: 20px;
            background-color: #EFEDF3;
        }
        .carrito-tabla {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .carrito-tabla th, .carrito-tabla td {
            border: 1px solid #372E4B;
            padding: 15px 10px;
            text-align: center;
            background-color: #fff; /* Fondo blanco para celdas */
        }
        .carrito-tabla th {
            background-color: #372E4B; /* Morado claro */
            color: white;
            text-transform: uppercase;
        }
        .carrito-img {
            width: 80px; /* Tamaño más visible */
            height: auto;
            border-radius: 5px;
        }
        /* Estilos de Botones */
        .btn-accion {
            padding: 8px 15px;
            background-color: #A2482D; /* Naranja */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-accion:hover {
             background-color: #cc5c3e;
        }
        .btn-eliminar {
            background-color: #900; /* Rojo */
        }
        .btn-eliminar:hover {
            background-color: #c00;
        }
        .total-container {
            text-align: right;
            margin-top: 20px;
            padding: 15px;
            font-size: 1.5em;
            font-weight: bold;
            background-color: #E5DBF5; /* Morado clarito para destacar */
        }
        #formulario-compra {
            text-align: center;
            margin-top: 30px;
        }
        #formulario-compra .btn-accion {
            font-size: 1.4em;
            padding: 12px 25px;
        }
		span {
			display: inline-block; width: 30px; text-align: center; font-weight: bold;
		
		}


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




<section class="carrito-container">
<?php
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo '<p style="text-align: center;">Tu carrito de compras está vacío.</p>';
	exit();
} else {
    $carrito_vacio = false;
}
?>
	<h1 class= "categorias">CARRITO DE LA COMPRA</h1>
	
	<!--CAMBIAR FICHERO----------------------------------------------------->
	<form action="actualizarCarrito.php" method="POST">
            <table class="carrito-tabla">
                <thead>
                    <tr>
                        <th></th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
	<?php
		
		$coste_total=0;	
		foreach($_SESSION['carrito'] as $id_vinilo => $cantidad){
		
		$query="select * from vinilos where id_vinilo =" . $id_vinilo;
		$resultado = mysqli_query($db, $query);
		$fila=mysqli_fetch_array($resultado);
		
		
		$subtotal=$cantidad*$fila['precio'];
		$coste_total+=$subtotal;
		
		
		
	?>
	<tr>
     <td>

			<img class="carrito-img" src="../images/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['nombre']; ?>" > <!-- Imagen del producto -->
			</td>
			<td><?php echo $fila['nombre']; ?> </td>
			<td><?php echo $fila['precio']; ?> €</td>
			
		
			<td>
                <div class="cantidades" style="display: flex; align-items: center; justify-content: center; ">
				<a href="actualizar_carrito.php?id_vinilo=<?php echo $id_vinilo; ?>&accion=restar" class="btn-accion" style="padding: 5px 10px;  font-size: 1.2em;" title="Restar cantidad">-</a>
           
				<span>
					<?php echo $cantidad; ?>
				</span>
        
				<a href="actualizar_carrito.php?id_vinilo=<?php echo $id_vinilo; ?>&accion=sumar" class="btn-accion" style="padding: 5px 10px; margin-left: 5px; font-size: 1.2em;" title="Sumar cantidad">+</a>
    </div>
            </td>
            <td><?php echo number_format($subtotal, 2); ?> €</td>
			<td>
            <a href="eliminarDelCarrito.php?id_vinilo=<?php echo $id_vinilo; ?>" class="btn-accion btn-eliminar" title="Eliminar Producto">Eliminar</a>
            </td>
            </tr>
<?php
}

?>
                </tbody>
            </table>
        </form>

        <div class="total-container">
            Total a Pagar: <?php echo number_format($coste_total, 2); ?> €
        </div>

	  <form id="formulario-compra" action="pedidos.php" method="post">
            <input name="coste_total" type="hidden" value="<?php echo $coste_total;?>">
            <button type="submit" class="btn-accion">Finalizar Pedido</button>
        </form>

</div>
</section>


<!-- FOOTER con información de contacto -->
<footer id="pie">
  <div class="footer-content">
    <p>&copy; 2025 VINTAGE SOUNDS — Todos los derechos reservados.</p>
	<p>vintagesounds@gmail.com   |   +34 689 67 52 32   |   @vintagesounds</p> 
	<p>Calle Gran Vía, 45 – 28013 Madrid, España</p>
    </div>
  </div>
</footer>
<script src="js/java.js"></script> <!-- Enlace al documento con el JavaScript -->
</body>
</html>