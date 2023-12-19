<?php
    include_once 'modelo/productoDAO.php';
    include_once 'config/functions.php';
    
    class productoControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $productos = productoDAO::getAllProducts();
                include_once 'vista/carta.php';
            }
        }

        public static function añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id){
            productoDAO::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
        }

        public static function modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            productoDAO::modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);
        }
    }
?>