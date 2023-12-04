<?php
    include_once '../modelo/ClienteDAO.php';
    
    class clienteControlador {
        public static function iniciarSesion($mail, $contra) {
            ClienteDAO::iniciarSesion($mail, $contra);
        }
        
        public static function crearCuenta($nombre, $apellido, $mail, $contra1) {
            ClienteDAO::crearCuenta($nombre, $apellido, $mail, $contra1);
        }

        public static function cerrarSesion(){
            ClienteDAO::cerrarSesion();
        }
    }
?>