<?php
//Conexion a la BD

//$host = 'PONER_HOST';
//$DBUser = 'PONER_USER';
//$DBPass = 'PONER_PASS';
//$DBName = 'PONER_NOMBRE_BD';

$host = 'localhost';
$DBUser = 'root';
$DBPass = '';
$DBName = 'ldst006';

	// Hacemos la conexión a la BD indicando el host, usuario, password y nombre de la BD.
	// Omitimos el error que se pueda dar si hubiera cualquier problema (servidor caído, error en alguno de los datos de acceso...) para mostrar posteriormente uno más amigable para el usuario.
 	@ $db = mysqli_connect($host, $DBUser, $DBPass, $DBName);

	// Generamos un error más amigable en caso de que no se haya podido realizar la coneción.
	// El número y nombre del error, suele ser sólo para desarrollo y no producción.
	if (!$db)
	{
 		echo "Error: No se pudo conectar a la base de datos. Por favor, int&eacute;ntelo de nuevo m&aacute;s tarde.";
 		echo "Número de error de depuración: " . mysqli_connect_errno() . "<br>";
 		echo "Error de depuración: [" . mysqli_connect_errno() . "] ". mysqli_connect_error() . "<br>";
 		exit;
	}
  
?>