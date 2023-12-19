<?php
    class pedidosAdminControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/pedidos.php';
            }
        }

        public static function añadir() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else {
                include_once 'vista/añadirPedido.php';
            }
        }

        public static function eliminar() {
            $id = $_POST['producto_id'];

            if(!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                PedidoProductosDAO::eliminar($id);
                include_once 'vista/pedidos.php';
            }
        }
    }
?>