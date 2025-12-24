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
			
			//comprueba si el correo ya esta en la base de datos
			$query="select * from usuarios";
			$resultado = mysqli_query($db, $query);
			$num=mysqli_num_rows($resultado);
			if($num==0){
				echo "No hay usuarios registrados <br>";
				exit;
			}
			
			echo "El numero de usuarios registrados es: " . $num . "<br>";
			
			echo "<table class='admin-table'>";
			echo "<tr>";
			echo "<td>Correo</td><td>Nombre</td><td>Apellido</td><td>Ciudad</td><td>Fecha de nacimiento</td><td>Privilegio</td><td>Modificar</td><td>Eliminar</td>";
			echo "</tr>";
			
			for($i=0;$i<$num;$i++){
				$fila=mysqli_fetch_array($resultado);
				echo "<tr>";
				echo "<td>".$fila['correo']."</td>";
				echo "<td>".$fila['nombre']."</td>";
				echo "<td>".$fila['apellido']."</td>";
				echo "<td>".$fila['ciudad']."</td>";
				echo "<td>".$fila['fechnac']."</td>";
				echo "<td>".$fila['privilegio']."</td>";
				echo "<td><a href='modificar_usuario1.php?correo=".$fila['correo']."'>Modificar</a></td>";
				echo "<td><a href='eliminar_usuario.php?correo=".$fila['correo']."'>Eliminar</a></td>";	
				echo "</tr>";
			}
			echo "</table>";
			?>
			