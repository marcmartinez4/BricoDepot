<?php
    include_once '../modelo/productoDAO.php';
    
    class productoControlador {
        public static function index() {
            productoDAO::getAllProducts();
        }

        public static function añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id){
            productoDAO::añadir($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
        }

        public static function eliminarProducto($id){
            productoDAO::eliminar($id);
        }

        public static function modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id){
            productoDAO::modificar($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);
        }     
    }
?>