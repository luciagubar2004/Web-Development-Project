<!DOCTYPE html>
<html lang="en">
<head>
 <title>VINTAGE SOUND</title> <!--titulo que aparece en la pestaña del navegador-->
 <meta charset="utf-8"> <!--establecemos la codificación de caracteres-->
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <style>
		
/* Estilo de la cabecera header */
header {
  
  font-family: oswald;
  background-color: #372E4B; /*morado claro*/
  padding: 20px;
  height: 160px;
  color: #A2482D; /*naranja*/
  
  text-transform: uppercase;    /* Mayúsculas */
  margin: 0 0 2%;             /* Espacio debajo */
  font-weight: bold;            /* Negrita */  
  position: relative; /* Para que los elementos flotantes estén relativos a este contenedor */
  
}


h1#vinsou {
 font-size: 65px;
 background-color: #372E4B;
 color: #A2482D; /*naranja*/
 margin-left: 20px;
}

h2#disvinpos {
 font-size: 25px;
 background-color: #372E4B;
 color: white;
 margin-top:-40px;
 margin-left: 235px;
}

#iconos {
	display:inline; /*no actuan como bloques*/
	justify-content: right;	
}

/*estilo de los iconos*/
#persona{
  width: 3em;
  height: 3em;
 
 position: absolute;
  bottom: 10px;
  right: 10px;
}

#lupa{
  width: 3em;
  height: 3em;
   
  position: absolute;
  bottom: 9px;
  right: 65px;
}


/*BUSCADOR*/
#buscador {
  display:block;
  position: absolute;
  bottom: 10px;
  right: 120px;
  border: 1px solid #241D2F;
  border-radius: 5px;
  color: white;
  font-size: 14px;
  background-color: #241D2F;      /* Morado claro */
  margin: 10px 0;
  padding: 8px;
  width: 30%;
}

 /*adaptamos las letras en la cabecera para que sea adaptativa*/
@media only screen and (max-width: 770px) {
 /*disminuimos el tamaño de la letra y cambiamos el margen*/
 h1#vinsou {
 font-size: 55px;
}
 h2#disvinpos{
  font-size: 20px;
  margin-left: 20px;
 }
}
/*cuando la pantalla es menor a 580px*/
@media only screen and (max-width: 580px) {
 header#home {
 height: 220px;;
 }
}




 </style>
</head>
<body>


 <!-- CABECERA -->
<header id="home">
  <h1 id="vinsou">VINTAGE SOUNDS</h1>
  <h2 id="disvinpos">Vinilos, discos y posters</h2>
  
  <div id="iconos">
   <img id="persona" src="images/pers.jpg" alt="icono persona">
 
  <img id="lupa" src="images/lupa.jpg" alt="icono lupa"> <!-- Al hacer clic en la imagen aparece el buscador -->
  </div> 
   <input type="text" id="buscador" placeholder="Buscar vinilos">

</header>

</body>

</html>