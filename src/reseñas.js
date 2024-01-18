fetch("http://localhost/BricoDepot/?controlador=API&action=api")
    .then( data => data.json())
    .then(reseñas => {
        let contenedornombre = document.getElementById("container-nombre");
        reseñas.forEach(reseña => {
            let contenido = document.createElement("div");
            contenido.innerHTML = `
                <div class="col-sm-9 col-md-6 col-lg-12 reseña">
                    <div class="top">
                        <div class="foto-perfil">
                            <span>${reseña.nombre[0]}</span>
                        </div>

                        <div class="info">
                            <div class="nombre-puntuacion">
                                <p>${reseña.nombre + ' ' + reseña.apellido}</p>
                                <div class="estrellas"></div>
                            </div>
                            <p class="fecha">${reseña.fecha}</p>
                        </div>
                    </div>
                    <div class="bottom">
                        <h3>${reseña.titulo}</h3>
                        <h4>${reseña.review}</h4>
                    </div>
                </div>
                <hr>
            `;

            let estrellas = contenido.querySelector('.estrellas');
            for (let i = 0; i < 5; i++) {
                if (i < reseña.puntuacion) {
                    estrellas.innerHTML += `<img class="svg-estrella" src="img/estrella_llena.svg"></img>`;
                } else {
                    estrellas.innerHTML += `<img class="svg-estrella" src="img/estrella_vacia.svg"></img>`;
                }
            }
            contenedornombre.appendChild(contenido);
        })
    });