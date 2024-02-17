<?php
    // Se incluyen los archivos necesarios
    include_once 'config/dataBase.php';
    include_once 'modelo/Cliente.php';
    include_once 'modelo/Usuario.php';
    include_once 'modelo/Admin.php';

    // Se desclara la clase
    class ClienteDAO {
        
        // Método para obtener todos los clientes de la base de datos
        public static function getAllClientes() {
            $con = dataBase::connect();
                
            // Ejecuta la consulta SQL para obtener todos los clientes
            if ($result = $con->query("SELECT * FROM usuarios")) {    
                $clientes = array();
                    
                // Itera sobre los resultados y crea objetos Cliente
                while ($cliente = $result->fetch_object('Cliente')) {
                    $clientes[] = $cliente;
                }
                return $clientes;
            }
        }

        // Método para obtener un cliente por su ID
        public static function getClientById($id) {
            $con = database::connect();
            
            // Ejecuta la consulta SQL para obtener un cliente por su ID
            $result = $con->query("SELECT * FROM `usuarios` WHERE `cliente_id` = $id;");
            $cliente = $result->fetch_object('Cliente');
            return $cliente;
        }

        // Método para iniciar sesión
        public static function iniciarSesion($mail, $contra) {
            $con = database::connect();

            $result = $con->query("SELECT rol FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
            $row = $result->fetch_assoc();
            $_SESSION['rolUsuario'] = $row['rol'];

            $result = $con->query("SELECT * FROM usuarios WHERE mail = '$mail' AND contra = '$contra' LIMIT 1;");
            if ($_SESSION['rolUsuario'] == 'Cliente') {
                $cliente = $result->fetch_object('Usuario');
            } else if ($_SESSION['rolUsuario'] == 'Administrador') {
                $cliente = $result->fetch_object('Admin');
            }

            $_SESSION['Cliente'] = $cliente;
        }   

        // Método para crear una cuenta de usuario
        public static function crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña) {
            $con = dataBase::connect();
            
            // Consulta SQL para insertar un nuevo usuario en la base de datos
            $con->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `mail`, `rol`, `contra`) VALUES ('$nombre','$apellido','$correo','$Rol','$contraseña')");
        }

        // Método para modificar un usuario administrativo
        public static function modificarAdmin($Nombre, $Apellido, $Correo, $Rol, $Contraseña, $id) {
            $con = dataBase::connect();
            
            // Consulta SQL para actualizar los datos de un usuario administrativo
            $con->query("UPDATE usuarios SET `nombre` = '$Nombre', `apellido` = '$Apellido', `mail` = '$Correo', `rol` = '$Rol', `contra` = '$Contraseña' WHERE `cliente_id` = '$id'");
        }

        // Método para modificar los datos principales de un cliente
        public static function modificarDatosPrincipales($nuevo_nombre, $nuevo_apellido, $nuevo_correo, $id_cliente) {
            $con = dataBase::connect();
            
            // Consulta SQL para actualizar los datos principales de un cliente
            $con->query("UPDATE usuarios SET `nombre` = '$nuevo_nombre', `apellido` = '$nuevo_apellido', `mail` = '$nuevo_correo' WHERE cliente_id = '$id_cliente'");
        }

        // Método para modificar la contraseña de un cliente
        public static function modificarContraseña($contraseña_nueva_1, $id_cliente) {
            $con = dataBase::connect();
            
            // Consulta SQL para actualizar la contraseña de un cliente
            $con->query("UPDATE usuarios SET `contra` = '$contraseña_nueva_1' WHERE cliente_id = '$id_cliente'");
        }

        // Método para eliminar un usuario y sus pedidos asociados
        public static function eliminarUsuario($id){
            $con = dataBase::connect();
            
            // Consultas SQL para eliminar los pedidos y productos asociados a un usuario
            $con->query("DELETE FROM pedido_productos WHERE pedido_id IN (SELECT pedido_id FROM pedidos WHERE cliente_id = '$id');");
            $con->query("DELETE FROM `pedidos` WHERE cliente_id = '$id';");
            
            // Consulta SQL para eliminar el usuario
            $con->query("DELETE FROM `usuarios` WHERE cliente_id = '$id';");
        }

        // Método para modificar los puntos de un cliente en la base de datos
        public static function modificarPuntos($id_cliente, $puntosFinalizar) {
            $con = dataBase::connect();

            // Ejecutar una consulta SQL para actualizar los puntos del cliente
            $con->query("UPDATE `usuarios` SET `puntos` = `puntos` - $puntosFinalizar WHERE cliente_id = $id_cliente");
        }
    }
?>
