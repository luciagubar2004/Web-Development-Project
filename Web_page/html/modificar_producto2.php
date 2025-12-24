<html>
    <head>
        <title>Conexion a la BD: Registro de productos (php)</title>
    </head>
    <body>
        <h3>Conexion a la BD: Registro de productos (php)</h3>
        <?php

            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
            @ $id_vinilo=$_POST['id_vinilo'];
			@ $nombre=$_POST['nombre'];
            @ $tipo=$_POST['tipo'];
            @ $imagen=$_POST['imagen'];
			@ $precio=$_POST['precio'];
		

            //Recortamos caracteres en blanco al principio y final de la cadena con trim
            $id_vinilo = trim($id_vinilo);
			$nombre = trim($nombre);
            $tipo = trim($tipo);
            $imagen = trim($imagen);
			$precio = trim($precio);
			

            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if (!$nombre || !$tipo || !$imagen || !$precio)
            {
                echo 'No ha introducido toda la informaci&oacute;n requerida para el cliente.<br>'
                .'Por favor, vuelva a la p&aacute;gina anterior e int&eacute;ntelo de nuevo.';
                exit;
            }

			//comprobacion precio
			
			$patron_precio="#[0-9]{1,6}\.{0,1}[0-9]{0,2}#";
			
			if(!preg_match($patron_precio,$precio)){
				echo "<script>alert('precio mal');history.back();</script>";
				exit;				
			}
		
            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
            $id_vinilo = addslashes($id_vinilo);
			$nombre = addslashes($nombre);
            $tipo = addslashes($tipo);
            $imagen = addslashes($imagen);
			$precio = addslashes($precio);
			

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD_tienda.php');
			
            //Definimos una cadena con la consulta que queremos hacer. Es recomendable sacar las variables de las comillas. Cuidado con el juego de comillas, es donde se suelen producir los errores.
            $query = "UPDATE vinilos SET 
			nombre='".$nombre."',
			tipo='".$tipo."',
			imagen='".$imagen."',
			precio=".$precio." 
			WHERE id_vinilo=".$id_vinilo;
            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            // echo "<br>" . $query . "<br>";
            
            //Enviamos la consulta para su ejecución en la BD con mysqli_query
            $resultado = mysqli_query($db, $query);

          
            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);
	header('location: mostrar_productos.php');

        ?>

    </body>
</html>
