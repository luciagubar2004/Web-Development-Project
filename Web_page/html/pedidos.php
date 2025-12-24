<?php
session_start();

?>
<html>
    <head>
        <title>Conexion a la BD: Pedidos (php)</title>
    </head>
    <body>
        <h3>Conexion a la BD: Registro de pedidos (php)</h3>
        <?php

            //Recogemos las variables de formulario por el método de envío. CUIDADO: los nombre tienen que coincidir con los NAME del formulario (SIN caracteres especiales)
            // @ $id_pedido=$_POST['id_pedido'];
			@ $correo=$_SESSION['correo'];
            @ $coste_total=$_POST['coste_total'];
	
            @ $fecha_hora=date('Y-m-d h:i:s');
				
            $query = "insert into pedidos values 
            (null, '". $correo ."', ". $coste_total .", '". $fecha_hora ."')"; 
            
            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            echo "<br>" . $query . "<br>";
			
            //Recortamos caracteres en blanco al principio y final de la cadena con trim
        
			$correo = trim($correo);
            $coste_total = trim($coste_total);
            $fecha_hora = trim($fecha_hora);
						
			if(!$correo){
				header('location: registro_inicio_sesion.php');
			}
			
            //Comprobamos que tenemos datos en todos los campos que sean obligatorios, si no es así, no podemos seguir adelante, así que hacemos exit, que termina el script completo
            if ( !$correo || !$coste_total || !$fecha_hora)
            {
                echo 'No ha introducido toda la informaci&oacute;n requerida para el cliente.<br>'
                .'Por favor, vuelva a la p&aacute;gina anterior e int&eacute;ntelo de nuevo.';
                exit;
            }

			//comprobacion precio
			
			$patron_precio="#[0-9]{1,6}\.{0,1}[0-9]{0,2}#";
			
			if(!preg_match($patron_precio,$coste_total)){
				echo "<script>alert('coste mal');history.back();</script>";
				exit;				
			}
		
            //Escapamos caracteres especiales de BD con addslashes (la función mysqli real_escape_string() actualmente se utiliza más y es más segura, aunque me vale cualquiera de las dos en clase)
        
			$correo = addslashes($correo);
            $coste_total = addslashes($coste_total);
            $fecha_hora = addslashes($fecha_hora);
						

            //Llamamos a la conexión a la base de datos hecha en el fichero que se cita
            //Es mucho mejor así que copiar y pegar en cada fichero, ya que si hay que hacer algún cambio o hay alguna errata, habría que ir por todos los ficheros cambiando lo que sea
            include('ConexBD_tienda.php');
			
            //Definimos una cadena con la consulta que queremos hacer. Es recomendable sacar las variables de las comillas. Cuidado con el juego de comillas, es donde se suelen producir los errores.
            $query = "insert into pedidos values 
            (null, '". $correo ."', ". $coste_total .", '". $fecha_hora ."')"; 
            
            
            //La primera vez que escribimos la consulta, es mejor que la imprimamos por pantalla para ver si estamos enviando lo que de verdad queremos enviar
            // echo "<br>" . $query . "<br>";
            
            //Enviamos la consulta para su ejecución en la BD con mysqli_query
            $resultado = mysqli_query($db, $query);
			
			if ($resultado){
				//devuelve el ID autoincremental que acaba de crear
				$id_pedido = mysqli_insert_id($db);
				foreach ($_SESSION['carrito'] as $id_vinilo => $cantidad){
					$query_pedidos = "insert into pedido_vinilos values 
            ('". $id_pedido ."', '". $id_vinilo ."', '". $cantidad ."')";
				mysqli_query($db, $query_pedidos);
				}
				
				// Una vez guardado todo, borramos el carrito de la sesión
				unset($_SESSION['carrito']);
				echo  "<script>alert('Compra realizada correctamente');window.location.href='../raiz.php';</script>" ;
			}else
                echo "<script>alert('Se ha producido un error y no se ha podido llevar a cabo la compra');window.location.href='../raiz.php';</script>" ;
			
			//En las consultas de inserción, modificación o borrado, sólo se informa de si se ha hecho correctamente o no, no hay datos que volcar, por lo que son más fáciles.
            //La función mysqli_affected_rows devuelve el número de registros que se han visto afectados con la operación.
            //Si siempre va a ser 1 como en este caso, no sería necesario/conveniente utilizarla y con decir que se ha llevado a cabo correctamente la operación valdría.
            //Si quisiéramos mostrarle los datos insertados, o tomamos los que envió el usuario (que pueden no haberse insertado tal cual) o hacemos una selección para mostrárselos
		
            
	
            //Cerramos la conexión a la BD. No es obligatorio.
            mysqli_close($db);

        ?>

    </body>
</html>
