fetch(`http://localhost/BricoDepot/?controlador=API&action=mostrarProductos`)
    .then(data => data.json())
    .then(productos => {
        let div_productos = document.getElementById("div_productos");
        let productosOriginal = productos;
        let checkboxes = document.querySelectorAll("input[type='checkbox']");
        let btnFiltrar = document.getElementById("btnFiltrar");
        let btnMostrarTodos = document.getElementById("btnMostrarTodos");

        mostrarProductos(productos, div_productos);

        btnFiltrar.addEventListener('click', function() {
            productos = productosOriginal;
            let arrayCategorias = Array.from(checkboxes).map(checkbox => checkbox.checked);

            console.log('Categorías seleccionadas:', arrayCategorias);

            if (arrayCategorias.includes(true)) {
                productos = productos.filter(producto => {
                    return arrayCategorias[producto.categoria_id - 1];
                });
                mostrarProductos(productos, div_productos);
            } else {
                mostrarProductos(productosOriginal, div_productos);
            }
        });

        btnMostrarTodos.addEventListener('click', function() {
            productos = productosOriginal;
            mostrarProductos(productos, div_productos);
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
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
    });
