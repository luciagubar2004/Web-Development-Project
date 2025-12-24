<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="../css/estilo_tabla.css">
 </head>
<?php
			session_start();
            include('ConexBD_tienda.php');
			include('cabecera.php');
			//para que solo permita el acceso al administrador
			if(!isset($_SESSION['privilegio']) || $_SESSION['privilegio'] != 1){
				header('Location: ../raiz.php');
				exit;
			}
			//comprueba si el id_vinilo ya esta en la base de datos
			$query="select * from vinilos";
			$resultado = mysqli_query($db, $query);
			$num=mysqli_num_rows($resultado);
			if($num==0){
				echo "No hay productos registrados <br>";
				exit;
			}
			
			echo "El numero de productos registrados es: " . $num . "<br>";
			
			echo "<table class='admin-table'>";
			echo "<tr>";
			echo "<td>Id vinilo</td><td>Nombre</td><td>Tipo</td><td>Imagen</td><td>Precio</td><td>Modificar</td><td>Eliminar</td>";
			echo "</tr>";
			
			for($i=0;$i<$num;$i++){
				$fila=mysqli_fetch_array($resultado);
				echo "<tr>";
				echo "<td>".$fila['id_vinilo']."</td>";
				echo "<td>".$fila['nombre']."</td>";
				echo "<td>".$fila['tipo']."</td>";
				echo "<td class='img-col'><img src='../images/" . $fila['imagen'] . "' ></td>";
				echo "<td>".$fila['precio']."</td>";
				echo "<td><a href='modificar_producto1.php?id_vinilo=".$fila['id_vinilo']."'>Modificar</a></td>";
				echo "<td><a href='eliminar_producto.php?id_vinilo=".$fila['id_vinilo']."'>Eliminar</a></td>";	
				echo "</tr>";
			}
			echo "</table>";
			?>
			
		