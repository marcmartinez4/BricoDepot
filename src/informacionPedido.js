// Obtener el ID del pedido de los parámetros de la URL
let url = new URLSearchParams(window.location.search);
let pedido_id = url.get("pedido_id");
// Mostrar el ID del pedido en la consola
console.log(pedido_id);

// Realizar una solicitud para obtener la información del pedido
fetch(`http://localhost/BricoDepot/?controlador=API&action=informacionPedido&pedido_id=${pedido_id}`)
    .then( data => data.json())
    .then( info => {
        // Obtener el contenedor de la información del pedido del DOM
        let informacionPedido = document.getElementById("div-informacion");
        // Crear un elemento div para mostrar la información del pedido
        let informacion = document.createElement("div");

        // Agregar la información básica del pedido al elemento div
        informacion.innerHTML = `
            <div class="top-pedido">
                <p>ID del pedido: ${info[0].pedido_id}</p>
                <p>Fecha del pedido: ${info[0].fecha_pedido}</p>
            </div>
        `;
        // Agregar el elemento div al contenedor de la información del pedido
        informacionPedido.appendChild(informacion);

        // Crear una tabla para mostrar los detalles de los productos del pedido
        let tabla = document.createElement("table");
        // Agregar encabezados a la tabla
        tabla.innerHTML = `
            <tr>
                <th>Imagen del producto</th>
                <th>Nombre del producto</th>
                <th>Cantidad</th>
                <th>Precio por unidad</th>
                <th>Precio total</th>
            </tr>
        `;
        // Agregar la tabla al contenedor de la información del pedido
        informacionPedido.appendChild(tabla);

        // Agregar los productos del pedido como una fila en la tabla
        info.forEach(informacionProductos => {
            let fila = document.createElement("tr");
            fila.innerHTML = `
                <td><img class="img-td" src="${informacionProductos.img}"></td>
                <td>${informacionProductos.nombre_producto}</td>
                <td>${informacionProductos.cantidad}</td>
                <td>${informacionProductos.precio_unidad} €</td>
                <td>${informacionProductos.precio_unidad * informacionProductos.cantidad} €</td>
            `;
            // Agregar la fila a la tabla
            tabla.appendChild(fila);
        });
    });
