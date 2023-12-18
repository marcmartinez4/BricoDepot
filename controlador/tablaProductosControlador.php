<?php
    class tablaProductosControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/base-datos.php';
            }
        }

        public static function añadir() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/añadirProducto.php';
            }
        }

        public static function modificar() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $id = $_POST['producto_id'];
                $producto = productoDAO::getProductById($id);
                include_once 'vista/modificarProducto.php';
            }
        }
    }
?>