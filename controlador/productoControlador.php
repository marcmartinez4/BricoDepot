<?php
    include_once '../modelo/productoDAO.php';
    include_once '../config/functions.php';
    
    class productoControlador {
        public static function index() {
            productoDAO::getAllProducts();
        }

        public static function añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id){
            productoDAO::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
        }

        public static function eliminarProducto($id){
            productoDAO::eliminarProducto($id);
        }

        public static function modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            productoDAO::modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);
        }
    }
?>