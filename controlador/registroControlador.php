<?php
    class registroControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/crear-cuenta.php';
            }
        }
        
        public static function crearCuenta() {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $Rol = $_POST['Cliente'];
            $contraseña = $_POST['contraseña'];

            if(!isset($_GET['controlador'])) {
                include_once 'vista/crear-cuenta.php';
            } else if (isset($nombre, $apellido, $correo, $contraseña)) {
                ClienteDAO::crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña);
                include_once 'vista/inicio-sesion.php';
            }
        }
    }
?>