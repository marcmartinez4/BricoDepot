<?php
    include_once 'modelo/ProductoDAO.php';
    
    class productoControlador {
        public static function index() {
            $productos = ProductoDAO::getAllProducts();
            $nombres_productos = array();
            foreach ($productos as $producto) {
                $nombres_productos[] = $producto->getNombre_producto();
            }
            return $nombres_productos;
        }
    }
?>