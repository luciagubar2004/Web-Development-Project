
document.addEventListener("DOMContentLoaded", function () { //Asegura que el HTML esté cargado y haya sido procesado 
const form = document.getElementById('formulario'); //guarda el formulario en la constante form
  const mensaje = document.getElementById('mensaje'); //tambien obtenemos el mensaje y el boton para cerrar
  const cerrar = document.getElementById('cerrar');
  
  // Al pulsar el boton de tipo submit
  form.addEventListener('submit', (event) => {
    event.preventDefault(); //no se envia el formulario a otro sitio, se procesa en la misma web
    //mostramos el mensaje
	mensaje.classList.remove('oculto');
  });
  // Cuando se pulsa "Cerrar"
  cerrar.addEventListener('click', () => {
    mensaje.style.display = 'none'; // o classList.add('oculto');
    form.reset();
  });
});