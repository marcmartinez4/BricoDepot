<?php
    class pedidosUsuarioControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/pedidos-usuario.php';
            }
        }

        public static function añadir() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else {
                include_once 'vista/añadirPedido.php';
            }
        }

        public static function añadirPedido() {
            $Producto = $_POST['Producto'];
            $Cantidad = $_POST['Cantidad'];
            $IDCliente = $_POST['IDCliente']; 

            if (!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Añadir'])) {
                PedidoProductosDAO::añadirPedido($Producto, $Cantidad, $IDCliente);
                include_once 'vista/pedidos.php';
            }
        }

        public static function eliminar() {
            $id = $_POST['producto_id'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                PedidoProductosDAO::eliminar($id);
                include_once 'vista/pedidos.php';
            }
        }
    }
?>