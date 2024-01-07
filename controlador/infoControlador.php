<?php    
    // Se define la clase
    class infoControlador {
        
        // Método para el index
        public static function index() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if(!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Obtiene el ID del producto desde la URL y todos los productos
                $producto_id = $_GET['producto_id'];
                $productos = productoDAO::getAllProducts();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Se establece la cantidad para añadir al carrito
                $_SESSION['cantidad_añadir'] = 1;
                
                // Incluye la vista informacion-producto.php y el header
                include_once 'vista/header.php';
                include_once 'vista/informacion-producto.php';
            }
        }

        // Método para reducir la cantidad de productos a añadir al carrito
        public static function reducirCantidad() {           
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if(!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Reduce la cantidad a añadir si es mayor que 1
                if ($_SESSION['cantidad_añadir'] > 1) {
                    $_SESSION['cantidad_añadir']--;
                }
                // Obtiene el ID del producto desde la URL y todos los productos
                $producto_id = $_GET['producto_id'];
                $productos = productoDAO::getAllProducts();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Incluye la vista informacion-producto.php y el header
                include_once 'vista/header.php';
                include_once 'vista/informacion-producto.php';
            }
        }
    
        // Método para aumentar la cantidad de productos a añadir al carrito
        public static function añadirCantidad() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if(!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Aumenta la cantidad a añadir
                $_SESSION['cantidad_añadir']++;
                // Obtiene el ID del producto desde la URL y todos los productos
                $producto_id = $_GET['producto_id'];
                $productos = productoDAO::getAllProducts();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Incluye la vista informacion-producto.php y el header
                include_once 'vista/header.php';
                include_once 'vista/informacion-producto.php';
            }
        }

        // Método para añadir productos al carrito
        public static function añadirAlCarrito() {
            // Verifica si se ha enviado el formulario de añadir al carrito
            if (isset($_POST['AñadirCarrito'])) {
                // Obtiene el ID del producto desde el formulario
                $id = $_POST['producto_id'];
            }
            
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Llama al método en la clase PedidoDAO para añadir productos al carrito
                PedidoDAO::añadirCarrito($id, $_SESSION['cantidad_añadir']);
                
                // Se redirige a la carta
                header('Location: '. url .'?controlador=producto');
            }
        }
    }
?>
