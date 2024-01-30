const url = new URLSearchParams(window.location.search);
const pedidoid = url.get("pedidoid");

fetch(`http://localhost/BricoDepot/?controlador=API&action=informacionPedido&pedidoid=244`)
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
                    <td class="img-td"><img src="${informacionProductos.img}"></td>
                    <td>${informacionProductos.nombre_producto}</td>
                    <td>${informacionProductos.cantidad}</td>
                    <td>${informacionProductos.precio_unidad} €</td>
                    <td>${informacionProductos.precio_unidad * informacionProductos.cantidad} €</td>
                `;
                tabla.appendChild(fila);
            });
        });