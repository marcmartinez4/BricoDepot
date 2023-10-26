<?php
    include_once 'modelo/ProductoDAO.php';
    
    class productoControlador {
        public static function index() {
            $productos = ProductoDAO::getAllProducts();
            
        }
        public function eliminar() {
            echo 'Producto a eliminar.';
        }
    }
?>
