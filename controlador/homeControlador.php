<?php
    class homeControlador {
        public function index() {
            $productos = productoDAO::getAllProducts();
            include_once 'vista/home.php';
        }
    }
?>