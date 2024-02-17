// Realizar una solicitud para obtener la lista de productos del servidor
fetch(`http://localhost/BricoDepot/?controlador=API&action=mostrarProductos`)
    .then(data => data.json())
    .then(productos => {
        // Obtener el contenedor de productos
        let div_productos = document.getElementById("div_productos");
        // Guardar una copia de los productos originales
        let productosOriginal = productos;
        // Obtener todos los checkboxes del formulario
        let checkboxes = document.querySelectorAll("input[type='checkbox']");
        // Obtener los botones de filtrar y mostrar todos
        let btnFiltrar = document.getElementById("btnFiltrar");
        let btnMostrarTodos = document.getElementById("btnMostrarTodos");
        // Obtener las categorías únicas de los productos
        let categorias = obtenerCategorias(productos);

        // Mostrar todos los productos al cargar la página
        mostrarProductos(productos, div_productos);

        // Agregar un evento de escucha para el botón de filtrar
        btnFiltrar.addEventListener('click', function() {
            // Restaurar la lista de productos a la original
            productos = productosOriginal;
            // Obtener un array con las categorías que están seleccionadas
            let arrayCategorias = Array.from(checkboxes).map(checkbox => checkbox.checked);

            // Filtrar los productos según las categorías seleccionadas
            if (arrayCategorias.includes(true)) {
                productos = productos.filter(producto => {
                    let categoriaPosicion = buscarCategoria(categorias);
                    return arrayCategorias[categoriaPosicion[producto.categoria_id]];
                });
                // Mostrar los productos filtrados
                mostrarProductos(productos, div_productos);
            } else {
                // Si no se selecciona ninguna categoría, mostrar todos los productos
                mostrarProductos(productosOriginal, div_productos);
            }
        });

        // Agregar un evento de escucha para el botón de mostrar todos
        btnMostrarTodos.addEventListener('click', function() {
            // Restaurar la lista de productos a la original
            productos = productosOriginal;
            // Mostrar todos los productos
            mostrarProductos(productos, div_productos);
            // Desmarcar todos los checkboxes
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });
        });

        // Función para mostrar los productos
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

        // Función para obtener las categorías únicas de los productos
        function obtenerCategorias(productos) {
            let categorias = new Set();
            productos.forEach(producto => {
                categorias.add(producto.categoria_id);
            });
            return Array.from(categorias);
        }

        // Función para asignar un índice a cada categoría
        function buscarCategoria(categorias) {
            let categoriaPosicion = {};
            categorias.forEach((categoria, index) => {
                categoriaPosicion[categoria] = index;
            });
            return categoriaPosicion;
        }
    });
