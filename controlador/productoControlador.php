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
    }
?>