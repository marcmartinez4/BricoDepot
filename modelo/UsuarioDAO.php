<?php
    include_once '../config/dataBase.php';

    class UsuarioDAO {
        public static function iniciarSesion($mail, $contra) {
            $con = dataBase::connect();

            $result = $con->query("SELECT nombre, mail, contra FROM usuarios WHERE mail = '$mail' AND contra = '$contra'");
            $row = mysqli_fetch_assoc($result);
            $nombre = $row['nombre'];
            echo $nombre;
        }

        public static function crearCuenta($nombre, $apellido, $mail, $contra1) {
            $con = dataBase::connect();

            $result = $con->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `mail`, `rol`, `contra`) VALUES ('$nombre','$apellido','$mail','Cliente','$contra1')");
        }
    }
?>