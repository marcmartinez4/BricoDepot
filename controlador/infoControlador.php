<?php
    $producto_id = $_GET['producto_id'];

    class infoControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/informacion-producto.php';
            }
        }
        public static function añadirCarrito() {
            if (!isset($_SESSION['cantidad_añadir'])) {
                $_SESSION['cantidad_añadir'] = 1; 
            }

            $id = $_POST['producto_id'];

            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else if (isset($_POST['AñadirCarrito'])) {
                PedidoDAO::añadirCarrito($id, $_SESSION['cantidad_añadir']);
                $_SESSION['cantidad_añadir'] = 1;
                include_once 'vista/informacion-producto.php';
            }
        }
    }
?>