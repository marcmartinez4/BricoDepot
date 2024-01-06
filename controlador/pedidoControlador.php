<?php
    // Se incluye los archivos necesarios
    include_once 'modelo/pedidoDAO.php';

    // Definición de la clase 'pedidoControlador'
    class pedidoControlador {
        // Método para el index
        public static function index() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else {
                // Obtiene todos los productos del carrito y cuenta la cantidad de elementos
                $prodCarrito = productoDAO::getAllProducts();
                $count_array = count($_SESSION['carrito']);
                $lista = headerControlador::mostrarHeader();
                // Determina si se debe utilizar la palabra 'Producto' o 'Productos' en la vista
                if ($count_array > 1) {
                    $top = 'Productos';
                } else {
                    $top = 'Producto';
                }
                // Incluye la vista 'carrito.php'
                include_once 'vista/header.php';
                include_once 'vista/carrito.php';
            }
        }
        
        // Método para sumar la cantidad de un producto en el carrito
        public static function sumarCantidad() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['sumarCantidad'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else if (isset($_POST['sumarCantidad'])) {
                // Llama al método en la clase 'PedidoDAO' para sumar la cantidad del producto en el carrito
                PedidoDAO::sumarCantidad($id);
                // Obtiene todos los productos del carrito y cuenta la cantidad de elementos
                $prodCarrito = productoDAO::getAllProducts();
                $count_array = count($_SESSION['carrito']);
                
                // Determina si se debe utilizar la palabra 'Producto' o 'Productos' en la vista
                if ($count_array > 1) {
                    $top = 'Productos';
                } else {
                    $top = 'Producto';
                }
                // Incluye la vista 'carrito.php'
                header('Location:'.url.'?controlador=pedido');
            }
        }

        // Método para restar la cantidad de un producto en el carrito
        public static function restarCantidad() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['restarCantidad'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else if (isset($_POST['restarCantidad'])) {
                // Llama al método en la clase 'PedidoDAO' para restar la cantidad del producto en el carrito
                PedidoDAO::restarCantidad($id);
                // Obtiene todos los productos del carrito y cuenta la cantidad de elementos
                $prodCarrito = productoDAO::getAllProducts();
                $count_array = count($_SESSION['carrito']);
                
                // Determina si se debe utilizar la palabra 'Producto' o 'Productos' en la vista
                if ($count_array > 1) {
                    $top = 'Productos';
                } else {
                    $top = 'Producto';
                }
                // Incluye la vista 'carrito.php'
                header('Location:'.url.'?controlador=pedido');
            }
        }

        // Método para eliminar un producto del carrito
        public static function eliminarProducto() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['eliminarProducto'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else if (isset($_POST['eliminarProducto'])) {
                // Llama al método en la clase 'PedidoDAO' para eliminar el producto del carrito
                PedidoDAO::eliminarProducto($id);
                // Obtiene todos los productos del carrito y cuenta la cantidad de elementos
                $prodCarrito = productoDAO::getAllProducts();
                $count_array = count($_SESSION['carrito']);
                
                // Determina si se debe utilizar la palabra 'Producto' o 'Productos' en la vista
                if ($count_array > 1) {
                    $top = 'Productos';
                } else {
                    $top = 'Producto';
                }
                // Incluye la vista 'carrito.php'
                header('Location:'.url.'?controlador=pedido');
            }
        }

        // Método para finalizar el pedido
        public static function finalizarPedido() {
            $preciototal = $_POST['preciototal'];
            // Llama al método en la clase 'PedidoDAO' para finalizar el pedido
            PedidoDAO::finalizarPedido($preciototal);
            // Reinicia el carrito en la sesión
            $_SESSION['carrito'] = [];
            
            header('Location:'.url.'?controlador=home');
        }
    }
?>
