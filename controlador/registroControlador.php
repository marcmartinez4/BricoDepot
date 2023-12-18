<?php
    class registroControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/crear-cuenta.php';
            }
        }
        
        public static function crearCuenta($nombre, $apellido, $mail, $contra) {
            ClienteDAO::crearCuenta($nombre, $apellido, $mail, $contra);
        }
    }
?>