let resultado = fetch("http://localhost/BricoDepot/?controlador=API&action=api")
.then( data => data.json())
.then(reseñas => {
    contenedorNombre.innerHTML += "<p>" + reseñas.titulo + "</p>"
});