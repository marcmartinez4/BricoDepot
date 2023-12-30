<?php
    class pedidosAdminControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $pedidos = ProductoDAO::getAllPedidos();
                $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
                include_once 'vista/pedidos.php';
            }
        }

        public static function añadir() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else {
                $productos = ProductoDAO::getAllProducts();
                $clientes = ClienteDAO::getAllClientes();
                include_once 'vista/añadirPedido.php';
            }
        }

        public static function añadirUsuario() {
            $Producto = $_POST['Producto'];
            $Cantidad = $_POST['Cantidad'];
            $IDCliente = $_POST['IDCliente']; 

            if (!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Añadir'])) {
                PedidoProductosDAO::añadirPedido($Producto, $Cantidad, $IDCliente);
                $pedidos = ProductoDAO::getAllPedidos();
                $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
                include_once 'vista/pedidos.php';
            }
        }

        public static function eliminar() {
            $id = $_POST['producto_id'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                PedidoProductosDAO::eliminar($id);
                $pedidos = ProductoDAO::getAllPedidos();
                $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
                include_once 'vista/pedidos.php';
            }
        }
    }
?>