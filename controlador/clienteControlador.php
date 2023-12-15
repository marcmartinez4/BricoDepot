<?php
    include_once 'C:\xampp\htdocs\dashboard\Base de datos\modelo\ClienteDAO.php';
    
    class clienteControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/inicio-sesion.php';
            }
        }

        public static function vistaCrear() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/crear-cuenta.php';
            }
        }

        public static function iniciarSesion($mail, $contra) {
            ClienteDAO::iniciarSesion($mail, $contra);
        }
        
        public static function crearCuenta($nombre, $apellido, $mail, $contra) {
            ClienteDAO::crearCuenta($nombre, $apellido, $mail, $contra);
        }
    }
?>