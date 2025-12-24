<style>
* {
  box-sizing: border-box;
  background-color: #EFEDF3; /*morado clarito*/
}



body {
  font-family: Arial, Helvetica, sans-serif;
}

h1 {
 font-family: oswald;
 font-size: 25px;
 background-color: #372E4B;
 color: white;
 margin-left: 30px;
 
}


/* ======== FORMULARIO ======== */	
#rectangulo {
  background-color: #372E4B;      /* Morado claro */
  color: white;                
  width: 500px;                  /* Ancho del rectángulo */
  height: 700px;
  margin: 20px auto;            /* Centrado horizontal y separado del borde superior */
  padding: 30px;                 /* Espacio interno */
  border-radius: 15px;           /* Bordes redondeados */
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Sombra suave */
  text-align: center;            /* Centra el texto */
  font-family: 'Oswald', sans-serif;
}

/* Ajustes del formulario dentro */

form{
	background-color: #372E4B;      /* Morado claro */
}	

#rectangulo fieldset {

  border-radius: 10px;
  background-color: #372E4B;      
  padding: 10px;
}

#rectangulo legend {
text-align: center;	/*Titulo*/
  color: white;
  background-color: #372E4B;      
  font-weight: bold;
  font-size: 18px;
}


#rectangulo input {
	text-align: center;
  background-color: #372E4B;      /* Morado claro */
  margin: 8px 0;
  padding: 8px;
  width: 80%;
  border: 1px solid #241D2F;
  border-radius: 5px;
  color: white;
  font-size: 14px;


}

.radious {
	display: flex;
	background-color: #372E4B;      /* Morado claro */
	justify-content: left;

}

/* ======== Botón aceptar formulario ======== */
#rectangulo button {
  background-color: #241D2F;     /* Botón oscuro */
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  margin-top: 15px;
  cursor: pointer;
  font-weight: bold;				/* negrita */
  transition: 0.3s;
  text-align:center;
}

#rectangulo button:hover {
  background-color: #A2482D;     /* Naranja al pasar el ratón */
}

/* ======== MENSAJE EMERGENTE ======== */
#mensaje {
  background-color: white;
  color: #241D2F; /* texto morado oscuro */
             
  width: 500px;                  /* Ancho del rectángulo */
  height: 380px;
  padding: 30px;                 /* Espacio interno */
  padding-top: 0px;
  border-radius: 15px;           /* Bordes redondeados */
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Sombra suave */
  position:absolute;
  top:40%;
  left:50%;
  transform: translateX(-50%);   /* Ajuste para centrar con precisión */
    
border: 5px solid #A2482D;    /* Borde sólido de 5px con color */

  text-align: center;
  
  z-index: 1000;
}

#mensaje.oculto {
  display: none; /* Oculto por defecto */
}

#mensaje p {
  font-size: 25px;
  margin-bottom: 15px;
  background-color: white;
  font-family: 'Cinzel', serif; /* fuente estilizada tipo rock */
  color: #241D2F;
}

#mensaje button {
  background-color: #A2482D; /* Naranja */
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
  font-weight: bold;
  transition: 0.3s;
  margin-top: 10px;
}

#mensaje button:hover {
  background-color: #241D2F;
}

	
#regreso{
  margin-right: 10px;
  position:fixed;
  height: 5%;
  width: 100%; /* Ocupa todo el ancho de la página */
  top:0;
  display: flex;
  background-color: #241D2F; /* Color de fondo del menú oscuro*/

  z-index: 1000; /* Asegura que el menú esté encima de otros elementos */
  
 padding: 0 10px;  
}

#regreso a{
  color: #E5DBF5;
  text-decoration: none; 
  background-color: #241D2F; /* Color de fondo del menú oscuro*/
  color: #A2482D;
  margin: 8px;
  
}
#regreso a:hover {
  color: #fff; /* Cambia el color al pasar el mouse */
  text-decoration: none; 
}

#news{

  width: 100%;
  aspect-ratio: 16 / 9; 
  border-radius: 12px;
}
</style>