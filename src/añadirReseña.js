// Obtener el botón de añadir reseña por su ID
let añadirReseña = document.getElementById('submit');

// Agregar un evento de escucha para el clic en el botón
añadirReseña.addEventListener("click", () => {
    // Obtener los valores de los campos del formulario
    let nombre = document.getElementById("nombre").value;
    let cliente_id = document.getElementById("cliente_id").value;
    let pedido_id = document.getElementById("pedido_id").value;
    let apellido = document.getElementById("apellido").value;
    let titulo = document.getElementById("titulo").value;
    let review = document.getElementById("review").value;
    let puntuacion = document.getElementById("puntuacion").value;

    // Verificar si algún campo está vacío
    if (nombre === '' || cliente_id === '' || pedido_id === '' || apellido === '' || titulo === '' || review === '' || puntuacion === '') {
        // Mostrar una alerta de error si algún campo está vacío
        notie.alert({
            type: 3,
            text: "Error al insertar la reseña.",
            stay: false,
            time: 3,
            position: "top"
        });
        return;
    }

    // Obtener la fecha actual
    let date = new Date();
    let year = date.getFullYear();
    let month = String(date.getMonth() + 1).padStart(2, '0');
    let day = String(date.getDate()).padStart(2, '0');
    let fecha = year + "-" + month + "-" + day;

    // Enviar la solicitud de inserción de la reseña al servidor
    fetch("http://localhost/BricoDepot/?controlador=API&action=añadirReseña", {
        method: 'POST',
        body: JSON.stringify({
            cliente_id: cliente_id,
            pedido_id: pedido_id,
            nombre: nombre,
            apellido: apellido,
            titulo: titulo,
            review: review,
            fecha: fecha,
            puntuacion: puntuacion
        }),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        }
    })
    .then(response => {
        // Mostrar una alerta de éxito si la solicitud es exitosa
        if (response.ok) {
            notie.alert({
                type: 'success',
                text: "Reseña insertada correctamente.",
                stay: false,
                time: 3,
                position: "top"
            });
        } else {
            // Mostrar una alerta de error si la solicitud falla
            notie.alert({
                type: 'error',
                text: "Error al insertar la reseña.",
                stay: false,
                time: 3,
                position: "top"
            });
        }
    })
    .catch(error => {
        // Mostrar un mensaje de error en la consola si hay algún error en la solicitud
        console.error('Error al insertar la reseña:', error);
    });
});
