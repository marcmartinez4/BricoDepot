fetch (`http://localhost/BricoDepot/?controlador=API&action=mostrarReseñas`)
    .then ( data => data.json())
    .then ( reseñas => {
        let div_reseñas = document.getElementById("div_reseñas");
        let numeroReseñas = document.getElementById("numeroReseñas");
        numeroReseñas.textContent = reseñas.length;
        let filtrosEstrellas = document.getElementById("filtroEstrellas");
        let filtroClasificacion = document.getElementById("filtroClasificacion");
        let reseñasOriginal = reseñas;
        let orden = 'normal';

        mostrarReseñas(reseñas, div_reseñas);

        filtroClasificacion.addEventListener('change', function() {
            reseñas = reseñasOriginal;
            orden = this.value;
                
            if (orden == 'asc') {
                reseñas.sort((a, b) => b.puntuacion - a.puntuacion);
            } else if (orden == 'desc') {
                reseñas.sort((a, b) => a.puntuacion - b.puntuacion);
            }

            mostrarReseñas(reseñas, div_reseñas);
        });

        filtrosEstrellas.addEventListener('change', function() {
            reseñas = reseñasOriginal;
            orden = this.value;

            if (orden >= 1 && orden <= 5) {
                reseñas = reseñas.filter(reseña => reseña.puntuacion == parseInt(orden));
            }

            mostrarReseñas(reseñas, div_reseñas);
        });

        function mostrarReseñas(reseñas, div_reseñas) {
            div_reseñas.innerHTML = "";
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
                            <h3 class="titulo-reseña">${reseña.titulo}</h3>
                            <h4 class="reseña">${reseña.review}</h4>
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
                div_reseñas.appendChild(div);
            });
        }
    });