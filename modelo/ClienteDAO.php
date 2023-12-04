<?php

    include_once '../config/dataBase.php';

    class ClienteDAO {
        public static function iniciarSesion($mail, $contra) {
            $con = database::connect();

            $result = $con->query("SELECT count(*) as cantidad FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
            $row = mysqli_fetch_assoc($result);
            $cantidad = $row['cantidad'];

            if ($cantidad == 1) {
                $result = $con->query("SELECT * FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
                $cliente = $result->fetch_object('Cliente');
                $_SESSION['Cliente'] = $cliente;
            }
        }   

        public static function crearCuenta($nombre, $apellido, $mail, $contra1) {
            $con = dataBase::connect();

            $result = $con->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `mail`, `rol`, `contra`) VALUES ('$nombre','$apellido','$mail','Cliente','$contra1')");
        }

        public static function cerrarSesion() {
            session_destroy();
        }
    }
?>