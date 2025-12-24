
document.addEventListener("DOMContentLoaded", function () { //Asegura que el HTML esté cargado y haya sido procesado 
	const myVideo = document.getElementById("video-background"); 
	//Asignación de eventos 
	document.getElementById("video-background").addEventListener("click", playPause); //escucha cuando se hace click

	//Pausar y reanudar video
	function playPause() { 
		if (myVideo.paused) { 
			myVideo.play(); 
		} else {
			myVideo.pause();
		} 

	}
	
	//Efecto al pasar el raton por cada imagen
	const img = document.getElementById("gif");

	img.addEventListener("mouseover", () => { //cuando el raton pasa por encima de la imagen
		img.src = "images/descarga.gif"; //cambiamos la imagen
	});

	img.addEventListener("mouseout", () => {
		img.src = "images/guts.jpg";
	});

	const img2 = document.getElementById("gif2");

	img2.addEventListener("mouseover", () => {
		img2.src = "images/OR_4.webp";
	});

	img2.addEventListener("mouseout", () => {
		img2.src = "images/guts_spilled.jpg";
	});

	const img3 = document.getElementById("gif3");

	img3.addEventListener("mouseover", () => {
		img3.src = "images/sourb.webp";
	});

	img3.addEventListener("mouseout", () => {
		img3.src = "images/sour.jpg";
	});

	const img4 = document.getElementById("gif4");

	img4.addEventListener("mouseover", () => {
		img4.src = "images/exclusivo.webp";
	});

	img4.addEventListener("mouseout", () => {
		img4.src = "images/exclusivo1.jpg";
	});

	const cd1 = document.getElementById("cd1");

	cd1.addEventListener("mouseover", () => {
		cd1.src = "images/cd_sour.webp";
	});

	cd1.addEventListener("mouseout", () => {
		cd1.src = "images/cd_sourb.webp";
	});

	const cd2 = document.getElementById("cd2");

	cd2.addEventListener("mouseover", () => {
		cd2.src = "images/cd_guts.png";
	});

	cd2.addEventListener("mouseout", () => {
		cd2.src = "images/cd_gutsb.webp";
	});
	
  
  const post1 = document.getElementById("poster1"); //guardamos en la constante post1 el primer poster
//codigo con el que la imagen de los posters cambia cuando el cursor se encuentra sobre el elemento con id="poster1"
post1.addEventListener("mouseover", () => {
  post1.src = "images/poster12.jpg";
});
//cuando el cursor sale, la imagen vuelve a ser la inicial
post1.addEventListener("mouseout", () => {
  post1.src = "images/poster1.jpg";
});

const post2 = document.getElementById("poster2");

post2.addEventListener("mouseover", () => {
  post2.src = "images/poster22.jpg";
});

post2.addEventListener("mouseout", () => {
  post2.src = "images/poster2.jpg";
});

const post3 = document.getElementById("poster3");

post3.addEventListener("mouseover", () => {
  post3.src = "images/poster32.jpg";
});

post3.addEventListener("mouseout", () => {
  post3.src = "images/poster3.jpg";
});

const post4 = document.getElementById("poster4");

post4.addEventListener("mouseover", () => {
  post4.src = "images/poster42.jpg";
});

post4.addEventListener("mouseout", () => {
  post4.src = "images/poster4.jpg";
});
  
  
  const lupa = document.getElementById("lupa"); //boton de la lupa
  const campo = document.getElementById("input-busqueda"); //campo de busqueda que esetaba oculto

  // Mostrar u ocultar el input al hacer clic en la lupa
  lupa.addEventListener("click", () => {
    if (campo.style.display === "none" || campo.style.display === "") {
      campo.style.display = "block";
      campo.focus(); // enfocar directamente el input
    } else {
      campo.style.display = "none";
    }
  }); 
 
});

