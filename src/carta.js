fetch(`http://localhost/BricoDepot/?controlador=API&action=mostrarProductos`)
    .then(data => data.json())
    .then(productos => {
        let div_productos = document.getElementById("div_productos");
        mostrarProductos(productos, div_productos);
    });

function mostrarProductos(productos, div_productos) {
    div_productos.innerHTML = "";

    let row = document.createElement("div");
    row.classList.add("row", "justify-content-center");

    productos.forEach(producto => {
        let div = document.createElement("div");
        div.classList.add("col-3", "col-sm-3", "col-md-3", "col-lg-3", "productos");
        div.innerHTML = `
            <a class="form-productos" href="?controlador=info&producto_id=${producto.producto_id}">
                <img class="imagen-producto" src="${producto.img}" alt="Imagen producto">
                <a>${producto.nombre_producto}</a>
                <div class="precio-añadir">
                    <p>${producto.precio_unidad}<span>€</span></p>
                </div>
            </a>
        `;
        row.appendChild(div);
    });

    div_productos.appendChild(row);
}