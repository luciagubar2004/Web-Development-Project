<?php
//Definimos los datos básicos que necesitamos para saber dia, mes y año actual,
// y el número de días que tiene el mes. No es necesario que le digamos nosotros el número de días con un switch o un array, 
//como se hace pensando en otros lenguajes, pq PHP ya nos lo dice
$dia_actual=date('d');
$mes=date('m');
$anio=date('Y');
$dias_mes=date('t');

//Establecemos un contador con el que vamos a escribir los días del mes
$dia=1;

//Para cuando empecemos a escribir los días del calendario, el problema inicial es dónde ponemos el día 1 (lunes, martes, miércoles...)
//Primero averiguamos la cantidad de segundos transcurridos desde el 1 de enero de 1970 hasta el día 1 de este mes y año.
// Cuidado que en esta función mktime se meten los parámetros como horas, minutos, segundos, MES, día y año (no año, mes y día que
// es en otras ocasiones, como por ejemplo en la BD)
$seg_dia1=mktime(0,0,0,$mes, 1, $anio);
//Le pasamos esos datos a getdate y genera un array asociativo con un montón de información. Mucha la conocemos ya: día, mes, año... 
//pero no sabemos a qué día de la semana corresponde. Esta info en particular, está en la posición wday. Pero nos devuelve un número
// de 0 a 6, donde 0 es domingo y 6 es sábado (pq los americanos empiezan sus semanas en domingo, para empezar bien ;-) ). 
//Nosotros empezamos en lunes, así que pasamos el domingo hacia atrás, poniendo que si es domingo, que sea 7, y nos movemos
// de 1 a 7 en lugar de 0 a 6 al hacer los bucles.
$array_dia1=getdate($seg_dia1);
$dia_semana=$array_dia1['wday'];
if($dia_semana==0)
	$dia_semana=7;


//Construimos la estructura de la tabla.
//Como aquí, de momento, sólo tengo el mes numérico, pongo mes - año en la cabecera de la tabla. Si hacéis un switch o un array..., 
//podéis utilizar el nombre del mes en español (o utilizar el nombre completo en inglés o las 3 primeras letras en inglés, 
//que hay otras letras de date para ello: F y M respectivamente, pero estas no necesitáis saberlas de memoria, las de arriba del fichero sí)
echo "<table border='1'>";
echo "<tr>";
echo "<td colspan='7'>" . $mes . " - " . $anio . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>L</td><td>M</td><td>X</td><td>J</td><td>V</td><td>S</td><td>D</td>";
echo "</tr>";

//Construimos la primera semana aparte, para entenderlo mejor (dentro del mismo tr)
//Primero escribimos las celdas en blanco que hay desde el comienzo de la primera semana, hasta el primer día del mes. Por eso vamos
// desde $i=1 hasta el ánterior al que se encuentra el día 1 (de 1 a 7 habíamos dicho). Si es lunes, pues nada.
echo "<tr>";
for($i=1;$i<$dia_semana;$i++)
{
	echo "<td>&nbsp;</td>";
}
//Y el resto de la semana ya vamos pintando el día, incialmente en 1, y vamos incrementando. Cuidado, que el valor de la variable siempre
// es 1 mayor a lo pintando
for($i=$dia_semana;$i<8;$i++)
{
	echo "<td>".$dia."</td>";
	$dia++;
}
echo "</tr>";

//A veriguamos cuántas semanas nos faltan por escribir: el total de días del mes menos los días ya pintados más 1 (por lo que decíamos
// de que lo tenemos incrementado en 1 sobre lo escrito): menos por menos, más, de ahí el -día +1. Lo dividimos entre 7 y redondeamos 
//por encima (ceil)
$num_semanas=ceil(($dias_mes - $dia+1)/7);

//Ahora ya, podemos hacer un bucle para semanas para todas las que hemos calculado que quedan, y todos los días de cada una. 
//Eso sí, hay que poner un tope para no seguir pintando 32, 33, 34... hasta que termine el mes, de ahí la condición. Si ya hemos superado 
//el tope, pintamos huecos blancos, y si no, seguimos pintando días.
//Ahí dentro, donde se van pintando los días, podéis detectar si ese día que pintáis es igual al actual (calculado arriba), y 
// podéis pintar el texto o el fondo en otro color para resaltarlo
for($i=1;$i<=$num_semanas;$i++)
{
	echo "<tr>";
	for($j=1;$j<8;$j++)
	{
		if($dia>$dias_mes)
		{
			echo "<td>&nbsp;</td>";
		}
		else
		{
			echo "<td>".$dia."</td>";
			$dia++;
		}
}
echo "</tr>";

}

echo "</table>";



?>
