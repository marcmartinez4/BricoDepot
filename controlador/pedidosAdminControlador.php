<?php
    // Se define la clase
    class pedidosAdminControlador {
        
        // Método para el index
        public static function index() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Obtiene todos los pedidos y productos de pedidos
                $pedidos = ProductoDAO::getAllPedidos();
                $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Incluye la vista pedidos.php y el header
                include_once 'vista/header.php';
                include_once 'vista/pedidos.php';
            }
        }

        // Método para la página de añadir pedidos
        public static function añadir() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista pedidos.php
                include_once 'vista/pedidos.php';
            } else {
                // Obtiene todos los productos y clientes
                $productos = ProductoDAO::getAllProducts();
                $clientes = ClienteDAO::getAllClientes();
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();
                
                // Incluye la vista añadirPedido.php
                include_once 'vista/header.php';
                include_once 'vista/añadirPedido.php';
            }
        }

        // Método para añadir un pedido de un usuario
        public static function añadirPedido() {
            // Obtiene datos del formulario
            $Producto = $_POST['Producto'];
            $Cantidad = $_POST['Cantidad'];
            $IDCliente = $_POST['IDCliente']; 

            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista pedidos.php
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Añadir'])) {
                // Llama al método en la clase PedidoProductosDAO para añadir un pedido
                PedidoProductosDAO::añadirPedido($Producto, $Cantidad, $IDCliente);
                
                // Se redirige a la tabla de pedidos
                header('Location: '.url.'?controlador=pedidosAdmin');
            }
        }

        // Método para eliminar un pedido
        public static function eliminar() {
            // Obtiene el ID del producto desde el formulario
            $id = $_POST['producto_id'];

            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista pedidos.php
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                // Llama al método en la clase PedidoProductosDAO para eliminar un pedido
                PedidoProductosDAO::eliminar($id);
                
                // Obtiene todos los pedidos y productos de pedidos
                $pedidos = ProductoDAO::getAllPedidos();
                $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
                
                // Se redirige a la tabla de pedidos
                header('Location: '.url.'?controlador=pedidosAdmin');
            }
        }
    }
?>
