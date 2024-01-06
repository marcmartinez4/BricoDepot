<?php
    // Se define la clase
    class tablaProductosControlador {
        // Método para el index
        public static function index() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Obtiene todos los productos
                $productos = ProductoDAO::getAllProducts();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Incluye la vista base-datos.php y el header
                include_once 'vista/header.php';
                include_once 'vista/base-datos.php';
            }
        }

        // Método para la página de añadir producto
        public static function añadir() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista base-datos.php
                include_once 'vista/base-datos.php';
            } else {
                // Se obtienen todas las categorias
                $categorias = CategoriaDAO::getAllCategorias();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Incluye la vista añadirProducto.php y el header
                include_once 'vista/header.php';
                include_once 'vista/añadirProducto.php';
            }
        }

        // Método para añadir un nuevo producto
        public static function añadirProducto() {
            // Verifica si se han recibido datos del formulario
            if (isset($_POST['nombre_producto'], $_POST['descripcion'], $_POST['precio_unidad'], $_POST['categoria_id'])) {
                // Obtiene datos del formulario y se convierten en variables
                $nombre_producto = $_POST['nombre_producto'];
                $descripcion = $_POST['descripcion'];
                $precio_unidad = $_POST['precio_unidad']; 
                $categoria_id = $_POST['categoria_id'];
    
                // Llama al método en la clase ProductoDAO para añadir un nuevo producto
                ProductoDAO::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
                
                // Se redirige a la tabla de productos
                header('Location: '.url.'?controlador=tablaProductos');
            }
        }

        // Método para la página de modificar producto
        public static function modificar() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['producto_id'];

            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista base-datos.php
                include_once 'vista/base-datos.php';
            } else if (isset($_POST['producto_id'])) {    
                // Obtiene información del producto para modificar
                $producto = ProductoDAO::getProductById($id);
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();
                
                // Incluye la vista modificarProducto.php y el header
                include_once 'vista/header.php';
                include_once 'vista/modificarProducto.php';
            }
        }

        // Método para modificar un producto existente
        public static function modificarProducto() {
            // Obtiene datos del formulario y se convierten en variables
            $nombre_producto = $_POST['nombre_producto']; 
            $descripcion = $_POST['descripcion'];
            $precio_unidad = $_POST['precio_unidad'];
            $categoria_id = $_POST['categoria_id'];
            $id = $_POST['producto_id'];    
                
            // Llama al método en la clase ProductoDAO para modificar el producto
            ProductoDAO::modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);
            
            // Se redirige a la tabla de productos
            header('Location: '. url .'?controlador=tablaProductos');
        }

        // Método para la página de eliminar producto
        public static function eliminar() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['producto_id'];

            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista base-datos.php
                include_once 'vista/base-datos.php';
            } else if (isset($_POST['Eliminar'])) {
                // Llama al método en la clase ProductoDAO para eliminar el producto
                ProductoDAO::eliminarProducto($id);
                
                // Se redirige a la tabla de productos
                header('Location: '. url .'?controlador=tablaProductos');
            }
        }
    }
?>
