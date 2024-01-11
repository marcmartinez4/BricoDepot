<?php
    class reseñaControlador {
        public static function index() {
            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $lista = headerControlador::mostrarHeader();
                
                include_once 'vista/header.php';
                include_once 'vista/reseñas.php';
            }
        }
    }
?>