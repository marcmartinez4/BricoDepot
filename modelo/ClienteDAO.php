<?php
    include_once 'config/dataBase.php';
    include_once 'modelo/Cliente.php';

    class ClienteDAO {
        public static function getAllClientes() {
            $con = dataBase::connect();
                
            if ($result = $con->query("SELECT * FROM usuarios")) {    
                $clientes = array();
                    
                while ($cliente = $result->fetch_object('Cliente')) {
                    $clientes[] = $cliente;
                }
                return $clientes;
            }
        }

        public static function getClientById($id) {
            $con = database::connect();
            $result = $con->query("SELECT * FROM `usuarios` WHERE `cliente_id` = $id;");
            $cliente = $result->fetch_object('Cliente');
            return $cliente;
        }

        public static function iniciarSesion($mail, $contra) {
            $con = database::connect();

            $result = $con->query("SELECT * FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
            $cliente = $result->fetch_object('Cliente');
            $_SESSION['Cliente'] = $cliente;

            $result = $con->query("SELECT rol FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
            $row = $result->fetch_assoc();
            $_SESSION['rolUsuario'] = $row['rol'];
        }   

        public static function crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña) {
            $con = dataBase::connect();
            $con->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `mail`, `rol`, `contra`) VALUES ('$nombre','$apellido','$correo','$Rol','$contraseña')");
        }

        public static function modificarAdmin($Nombre, $Apellido, $Correo, $Rol, $Contraseña, $id) {
            $con = dataBase::connect();
            $con->query("UPDATE usuarios SET `nombre` = '$Nombre', `apellido` = '$Apellido', `mail` = '$Correo', `rol` = '$Rol', `contra` = '$Contraseña' WHERE `cliente_id` = '$id'");
        }

        public static function modificarDatosPrincipales($nuevo_nombre, $nuevo_apellido, $nuevo_correo, $id_cliente) {
            $con = dataBase::connect();
            $con->query("UPDATE usuarios SET `nombre` = '$nuevo_nombre', `apellido` = '$nuevo_apellido', `mail` = '$nuevo_correo' WHERE cliente_id = '$id_cliente'");
        }

        public static function modificarContraseña($contraseña_nueva_1, $id_cliente) {
            $con = dataBase::connect();
            $con->query("UPDATE usuarios SET `contra` = '$contraseña_nueva_1' WHERE cliente_id = '$id_cliente'");
        }

        public static function eliminarUsuario($id){
            $con = dataBase::connect();
            $con->query("DELETE FROM pedido_productos WHERE pedido_id IN (SELECT pedido_id FROM pedidos WHERE cliente_id = '$id');");
            $con->query("DELETE FROM `pedidos` WHERE cliente_id = '$id';");
            $con->query("DELETE FROM `usuarios` WHERE cliente_id = '$id';");
        }
    }
?>