let url = new URLSearchParams(window.location.search);
let pedido_id = url.get("pedido_id");
console.log(pedido_id);

fetch(`http://localhost/BricoDepot/?controlador=API&action=informacionPedido&pedido_id=${pedido_id}`)
        .then( data => data.json())
        .then( info => {
            let informacionPedido = document.getElementById("div-informacion");
            let informacion = document.createElement("div");

            informacion.innerHTML = `
            <div class="top-pedido">
                <p>ID del pedido: ${info[0].pedido_id}</p>
                <p>Fecha del pedido: ${info[0].fecha_pedido}</p>
            </div>
                `;
            informacionPedido.appendChild(informacion);

            let tabla = document.createElement("table");
            tabla.innerHTML = `
                <tr>
                    <th>Imagen del producto</th>
                    <th>Nombre del producto</th>
                    <th>Cantidad</th>
                    <th>Precio por unidad</th>
                    <th>Precio total</th>
                </tr>
            `;
            informacionPedido.appendChild(tabla);

            info.forEach(informacionProductos => {
                let fila = document.createElement("tr");
                fila.innerHTML = `
                    <td><img class="img-td" src="${informacionProductos.img}"></td>
                    <td>${informacionProductos.nombre_producto}</td>
                    <td>${informacionProductos.cantidad}</td>
                    <td>${informacionProductos.precio_unidad} €</td>
                    <td>${informacionProductos.precio_unidad * informacionProductos.cantidad} €</td>
                `;
                tabla.appendChild(fila);
            });
        });