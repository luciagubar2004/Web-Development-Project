<html>
    <head>
        <title>Conexion a la BD: Registro de Administradores (php)</title>
    </head>
    <body>
        <h3>Conexion a la BD: Registro de Administradores (php)</h3>
        <?php

            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
            @ $nombre=$_POST['nombre'];
			@ $apellido=$_POST['apellido'];
            @ $correo=$_POST['correo'];
            @ $ciudad=$_POST['ciudad'];
			@ $fechnac=$_POST['fechnac'];
			@ $contrasena=$_POST['contrasena'];
			@ $privilegio=$_POST['privilegio'];

            //Recortamos caracteres en blanco al principio y final de la cadena con trim
            $nombre = trim($nombre);
			$apellido = trim($apellido);
            $correo = trim($correo);
            $ciudad = trim($ciudad);
			$fechnac = trim($fechnac);
			$contrasena = trim($contrasena);
			

            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if (!$nombre || !$correo || !$apellido || !$fechnac || !$ciudad || !$contrasena || !$privilegio)
            {
                echo 'No ha introducido toda la informaci&oacute;n requerida para el cliente.<br>'
                .'Por favor, vuelva a la p&aacute;gina anterior e int&eacute;ntelo de nuevo.';
                exit;
            }

			//comprobacion fecha
			
			$patron_fecha_my="#[0-9]{4}[-][0-9]{1,2}[-][0-9]{1,2}#";
			$patron_fecha="#[0-9]{1,2}[/][0-9]{1,2}[/][0-9]{4}#";
			if(!preg_match($patron_fecha_my,$fechnac) && !preg_match($patron_fecha,$fechnac)){
				echo "<script>alert('fecha mal');history.back();</script>";
				exit;				
			}
			if(preg_match($patron_fecha,$fechnac)){
				$fecha_array=explode('/',$fechnac);
				$fecha_array=array_reverse($fecha_array);
				$fechnac=implode('-',$fecha_array);
				
			}

            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
            $nombre = addslashes($nombre);
			$apellido = addslashes($apellido);
            $correo = addslashes($correo);
            $ciudad = addslashes($ciudad);
			$fechnac = addslashes($fechnac);
			$contrasena = addslashes($contrasena);

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD_tienda.php');
			
			//comprueba si el correo ya esta en la base de datos
			$query1="select * from usuarios where correo ='" . $correo . "'";
			$resultado1 = mysqli_query($db, $query1);
			$num=mysqli_num_rows($resultado1);
			if($num>0){
				echo "<script>alert('correo pillado');history.back();</script>";
				exit;
			}


            //Definimos una cadena con la consulta que queremos hacer. Es recomendable sacar las variables de las comillas. Cuidado con el juego de comillas, es donde se suelen producir los errores.
            $query = "insert into usuarios values 
            ('". $correo ."', '". $nombre ."', '". $apellido ."', '". $contrasena ."', '" . $ciudad ."', '" . $fechnac ."', " . $privilegio .")"; 
            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            //echo "<br>" . $query . "<br>";
            
            //Enviamos la consulta para su ejecución en la BD con mysqli_query
            $resultado = mysqli_query($db, $query);

            //En las consultas de inserción, modificación o borrado, sólo se informa de si se ha hecho correctamente o no, no hay datos que volcar, por lo que son más fáciles.
            //La función mysqli_affected_rows devuelve el número de registros que se han visto afectados con la operación.
            //Si siempre va a ser 1 como en este caso, no sería necesario/conveniente utilizarla y con decir que se ha llevado a cabo correctamente la operación valdría.
            //Si quisiéramos mostrarle los datos insertados, o tomamos los que envió el usuario (que pueden no haberse insertado tal cual) o hacemos una selección para mostrárselos
            if ($resultado){
               echo "<script>
				alert('Administrador introducido correctamente');
				window.location.href = 'pagina_admin.php';
				</script>";
			}
			else
                echo "Se ha producido un error y no se ha podido llevar a cabo la operaci&oacute;n.";

            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);

        ?>

    </body>
</html>
