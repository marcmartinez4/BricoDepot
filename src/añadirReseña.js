let añadirReseña = document.getElementById('submit');

añadirReseña.addEventListener("click", () => {
    let nombre = document.getElementById("nombre").value;
    let cliente_id = document.getElementById("cliente_id").value;
    let pedido_id = document.getElementById("pedido_id").value;
    let apellido = document.getElementById("apellido").value;
    let titulo = document.getElementById("titulo").value;
    let review = document.getElementById("review").value;
    let puntuacion = document.getElementById("puntuacion").value;

    if (nombre === '' || cliente_id === '' || pedido_id === '' || apellido === '' || titulo === '' || review === '' || puntuacion === '') {
        notie.alert({
            type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
            text: "Error al insertar la reseña.",
            stay: false, // optional, default = false
            time: 3, // optional, default = 3, minimum = 1,
            position: "top" // optional, default = 'top', enum: ['top', 'bottom']
        });
        return; // Si hay campos vacíos, se detiene la función
    }

    let date = new Date();
    let year = date.getFullYear();
    let month = String(date.getMonth() + 1).padStart(2, '0');
    let day = String(date.getDate()).padStart(2, '0');
    let fecha = year + "-" + month + "-" + day;

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
        if (response.ok) {
            notie.alert({
                type: 'success',
                text: "Reseña insertada correctamente.",
                stay: false,
                time: 3,
                position: "top"
            });
        } else {
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
        console.error('Error al realizar la solicitud:', error);
    });
});
