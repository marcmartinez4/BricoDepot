<?php
    include_once 'modelo/ProductoDAO.php';
    
    class productoControlador {
        public static function index() {
            /*$producto = ProductoDAO::getAllProducts();
            
            foreach ($producto as $productos) {
                return $productos->getNombre_producto();
            }
            var_dump($producto);*/
            $productos = ProductoDAO::getAllProducts();
            $nombres_productos = array();
            foreach ($productos as $producto) {
                $nombres_productos[] = $producto->getNombre_producto();
            }
            return $nombres_productos;
        }
    }
?>