<?php
    // Se define la clase
    class pedidosUsuarioControlador {
        
        // Método para la página de pedidos de usuario (index)
        public static function index() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else {
                // Obtiene todos los clientes, pedidos, productos de pedidos y productos
                $clientes = ClienteDAO::getAllClientes();
                $pedidos = ProductoDAO::getAllPedidos();
                $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
                $productos = ProductoDAO::getAllProducts();
                
                // Obtiene el ID del cliente actual desde la sesión
                $id_cliente = $_SESSION['Cliente']->getCliente_id();  
                $lista = headerControlador::mostrarHeader();
                // Incluye la vista 'pedidos-usuario.php'
                include_once 'vista/header.php';
                include_once 'vista/pedidos-usuario.php';
            }
        }

        // Método para la página de añadir pedidos de usuario
        public static function añadir() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            } else {
                // Incluye la vista 'añadirPedido.php'
                include_once 'vista/añadirPedido.php';
            }
        }

        // Método para añadir un pedido desde la página de usuario
        public static function añadirPedido() {
            // Obtiene datos del formulario
            $Producto = $_POST['Producto'];
            $Cantidad = $_POST['Cantidad'];
            $IDCliente = $_POST['IDCliente']; 

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Añadir'])) {
                // Llama al método en la clase 'PedidoProductosDAO' para añadir un pedido
                PedidoProductosDAO::añadirPedido($Producto, $Cantidad, $IDCliente);
                
                // Incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            }
        }

        // Método para eliminar un pedido desde la página de usuario
        public static function eliminar() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['producto_id'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                // Llama al método en la clase 'PedidoProductosDAO' para eliminar un pedido
                PedidoProductosDAO::eliminar($id);
                
                // Incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            }
        }
    }
?>
