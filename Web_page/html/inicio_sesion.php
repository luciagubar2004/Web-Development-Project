<?php
session_start();
?>
<html>
    <head>
        <title>Conexion a la BD: Inicio sesión de Clientes (php)</title>
    </head>
    <body>
        <h3>Conexion a la BD: Inicio sesión de Clientes (php)</h3>
        <?php

            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
            @ $correo=$_POST['correo'];
           	@ $contrasena=$_POST['contrasena'];

            //Recortamos caracteres en blanco al principio y final de la cadena con trim
            $correo = trim($correo);
           	$contrasena = trim($contrasena);

            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if (!$correo|| !$contrasena)
            {
                echo 'No ha introducido toda la informaci&oacute;n requerida para el cliente.<br>'
                .'Por favor, vuelva a la p&aacute;gina anterior e int&eacute;ntelo de nuevo.';
                exit;
            }

			
            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
            $correo = addslashes($correo);
            $contrasena = addslashes($contrasena);

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD_tienda.php');
			
			//comprueba si el correo ya esta en la base de datos
			$query1="select * from usuarios where correo ='" . $correo . "' and contrasena='" . $contrasena . "'";
			$resultado1 = mysqli_query($db, $query1);
			$num=mysqli_num_rows($resultado1);
			if($num==0){
				echo "<script>alert('No estas registrado');history.back();</script>";
				header('location: registro.php');
				exit;
			}
			
			$fila=mysqli_fetch_array($resultado1);
		
			
			$_SESSION['correo']=$correo;
			$_SESSION['privilegio']=$fila['privilegio'];
			
			//comprobar si es admin o cliente
			$privilegio = $fila['privilegio'];
			if($privilegio==1){
				header('location: pagina_admin.php');
			}else{
				header('location: ../raiz.php');
			}
            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);

        ?>

    </body>
</html>
