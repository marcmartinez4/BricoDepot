<?php
    class usuariosAdminControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $clientes = ClienteDAO::getAllClientes();
                include_once 'vista/usuarios.php';
            }
        }

        public static function añadir() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else {
                $clientes = ClienteDAO::getAllClientes();
                include_once 'vista/añadirUsuario.php';
            }
        }

        public static function añadirCliente() {
            $nombre = $_POST['Nombre'];
            $apellido = $_POST['Apellido']; 
            $correo = $_POST['Correo'];
            $Rol = $_POST['Rol'];
            $contraseña = $_POST['Contraseña'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Añadir'])) {
                ClienteDAO::crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña);
                $clientes = ClienteDAO::getAllClientes();
                include_once 'vista/usuarios.php';
            }
        }

        public static function eliminar() {
            $id = $_POST['cliente_id'];
            
            if (!isset($_GET['controlador'])) {
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                ClienteDAO::eliminarUsuario($id);
                $clientes = ClienteDAO::getAllClientes();
                include_once 'vista/usuarios.php';
            }
        }

        public static function modificar() {
            $id = $_POST['cliente_id'];

            $con = dataBase::connect();
            $result = $con->query("SELECT `nombre` FROM `usuarios` WHERE cliente_id = $id;");
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];

            if(!isset($_GET['controlador'])) {
                include_once 'vista/usuarios.php';
            } else {
                $cliente = ClienteDAO::getClientById($id);
                include_once 'vista/modificarUsuario.php';
            }
        }

        public static function modificarUsuario(){
            $Nombre = $_POST['Nombre']; 
            $Apellido = $_POST['Apellido'];
            $Correo = $_POST['Correo'];
            $Rol = $_POST['Rol'];
            $Contraseña = $_POST['Contraseña'];
            $id = $_POST['cliente_id'];
            
            ClienteDAO::modificarAdmin($Nombre, $Apellido, $Correo, $Rol, $Contraseña, $id);
            $clientes = ClienteDAO::getAllClientes();
            include_once 'vista/usuarios.php';
        }
    }
?>