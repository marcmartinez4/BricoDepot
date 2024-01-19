fetch("http://localhost/BricoDepot/?controlador=API&action=api")
    .then( data => data.json())
    .then(reseñas => {
        let container = document.getElementById("container");
        let numeroReseñas = document.getElementById("numeroReseñas");
        numeroReseñas.textContent = reseñas.length;

        reseñas.forEach(reseña => {
            let div = document.createElement("div");
            div.innerHTML = `
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

            let estrellas = div.querySelector('.estrellas');
            for (let i = 0; i < 5; i++) {
                if (i < reseña.puntuacion) {
                    estrellas.innerHTML += `<img class="svg-estrella" src="img/estrella_llena.svg"></img>`;
                } else {
                    estrellas.innerHTML += `<img class="svg-estrella" src="img/estrella_vacia.svg"></img>`;
                }
            }
            container.appendChild(div);
        })
    });