<?php
    include_once '../config/dataBase.php';
    include ('../modelo/Cliente.php');

    class ClienteDAO {
        public static function iniciarSesion($mail, $contra) {
            $con = database::connect();

            $result = $con->query("SELECT * FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
            $cliente = $result->fetch_object('Cliente');
            $_SESSION['Cliente'] = $cliente;
            $_SESSION['nombreCliente'] = $_SESSION['Cliente']->getNombre();          
        }   

        public static function crearCuenta($nombre, $apellido, $mail, $contra) {
            $con = dataBase::connect();

            $result = $con->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `mail`, `rol`, `contra`) VALUES ('$nombre','$apellido','$mail','Cliente','$contra')");
        }
    }
?>