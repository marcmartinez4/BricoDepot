let añadirReseña = document.getElementById('submit');

añadirReseña.addEventListener("click", () => {
    let nombre = document.getElementById("nombre").value;
    let cliente_id = document.getElementById("cliente_id").value;
    let pedido_id = document.getElementById("pedido_id").value;
    let apellido = document.getElementById("apellido").value;
    let titulo = document.getElementById("titulo").value;
    let review = document.getElementById("review").value;
    let puntuacion = document.getElementById("puntuacion").value;
    
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
    });
    window.location.href = '?controlador=home';
});
