<?php
    class infoControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/informacion-producto.php';
            }
        }
    }
?>