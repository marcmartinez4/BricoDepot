let añadirReseña = document.getElementById('submit');

añadirReseña.addEventListener("click", () => {
    let nombre = document.getElementById("nombre").value;
    let cliente_id = document.getElementById("cliente_id").value;
    let pedido_id = document.getElementById("pedido_id").value;
    let apellido = document.getElementById("apellido").value;
    let titulo = document.getElementById("titulo").value;
    let review = document.getElementById("review").value;
    let puntuacion = document.getElementById("puntuacion").value;
    console.log("Variables recogidas")

    let fecha = new Date();
    let año = fecha.getFullYear();
    let mes = String(fecha.getMonth() + 1).padStart(2, '0');
    let dia = String(fecha.getDate()).padStart(2, '0');
    let fecha_final = año + "-" + mes + "-" + dia;

    fetch("http://localhost/BricoDepot/?controlador=API&action=añadirReseña", {
        method: 'POST',
        body: JSON.stringify({
            cliente_id: cliente_id,
            pedido_id: pedido_id,
            nombre: nombre,
            apellido: apellido,
            titulo: titulo,
            review: review,
            fecha: fecha_final,
            puntuacion: puntuacion
        }),
        headers: {
            'Content-Type': 'application/json; charset=UTF-8',
        }
    });
});
