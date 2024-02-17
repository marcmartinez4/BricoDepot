// Realizar una solicitud para obtener la lista de reseñas del servidor
fetch (`http://localhost/BricoDepot/?controlador=API&action=mostrarReseñas`)
    .then ( data => data.json())
    .then ( reseñas => {
        // Obtener el contenedor de las reseñas del DOM
        let div_reseñas = document.getElementById("div_reseñas");
        // Obtener el elemento que muestra el número de reseñas
        let numeroReseñas = document.getElementById("numeroReseñas");
        // Actualizar el número de reseñas mostrado
        numeroReseñas.textContent = reseñas.length;
        // Obtener los elementos de los filtros por estrellas y clasificación
        let filtrosEstrellas = document.getElementById("filtroEstrellas");
        let filtroClasificacion = document.getElementById("filtroClasificacion");
        // Guardar una copia de las reseñas originales
        let reseñasOriginal = reseñas;
        // Variable para almacenar el orden de las reseñas
        let orden = 'normal';

        // Mostrar las reseñas en la página al cargar
        mostrarReseñas(reseñas, div_reseñas);

        // Agregar un evento de escucha para el filtro de clasificación
        filtroClasificacion.addEventListener('change', function() {
            // Restaurar las reseñas a la lista original
            reseñas = reseñasOriginal;
            // Obtener el valor seleccionado en el filtro de clasificación
            orden = this.value;
                
            // Ordenar las reseñas según el criterio seleccionado
            if (orden == 'asc') {
                reseñas.sort((a, b) => b.puntuacion - a.puntuacion);
            } else if (orden == 'desc') {
                reseñas.sort((a, b) => a.puntuacion - b.puntuacion);
            }

            // Mostrar las reseñas ordenadas en la página
            mostrarReseñas(reseñas, div_reseñas);
        });

        // Agregar un evento de escucha para el filtro por estrellas
        filtrosEstrellas.addEventListener('change', function() {
            // Restaurar las reseñas a la lista original
            reseñas = reseñasOriginal;
            // Obtener el valor seleccionado en el filtro por estrellas
            orden = this.value;

            // Filtrar las reseñas según la cantidad de estrellas seleccionadas
            if (orden >= 1 && orden <= 5) {
                reseñas = reseñas.filter(reseña => reseña.puntuacion == parseInt(orden));
            }

            // Mostrar las reseñas filtradas en la página
            mostrarReseñas(reseñas, div_reseñas);
        });

        // Función para mostrar las reseñas en la página
        function mostrarReseñas(reseñas, div_reseñas) {
            // Limpiar el contenedor de reseñas
            div_reseñas.innerHTML = "";
            // Iterar sobre cada reseña y agregarla al DOM
            reseñas.forEach(reseña => {
                let div = document.createElement("div");
                div.innerHTML = `
                    <div class="col-sm-12 col-md-12 col-lg-12 reseña">
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
                // Agregar imágenes de estrellas llenas o vacías según la puntuación de la reseña
                for (let i = 0; i < 5; i++) {
                    if (i < reseña.puntuacion) {
                        estrellas.innerHTML += `<img class="svg-estrella" src="img/estrella_llena.svg"></img>`;
                    } else {
                        estrellas.innerHTML += `<img class="svg-estrella" src="img/estrella_vacia.svg"></img>`;
                    }
                }
                // Agregar la reseña al contenedor de reseñas
                div_reseñas.appendChild(div);
            });
        }
    });
