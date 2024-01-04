<?php
    // Se define la clase
    class usuariosAdminControlador {
        
        // Método para la página principal de usuarios administrativos (index)
        public static function index() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else {
                // Obtiene todos los clientes
                $clientes = ClienteDAO::getAllClientes();
                $lista = headerControlador::mostrarHeader();
                // Incluye la vista 'usuarios.php'
                include_once 'vista/header.php';
                include_once 'vista/usuarios.php';
            }
        }

        // Método para la página de añadir usuario administrativo
        public static function añadir() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            } else {
                // Obtiene todos los clientes
                $clientes = ClienteDAO::getAllClientes();
                $lista = headerControlador::mostrarHeader();
                
                // Incluye la vista 'añadirUsuario.php'
                include_once 'vista/header.php';
                include_once 'vista/añadirUsuario.php';
            }
        }

        // Método para añadir un nuevo usuario administrativo
        public static function añadirCliente() {
            // Obtiene datos del formulario
            $nombre = $_POST['Nombre'];
            $apellido = $_POST['Apellido']; 
            $correo = $_POST['Correo'];
            $Rol = $_POST['Rol'];
            $contraseña = $_POST['Contraseña'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Añadir'])) {
                // Llama al método en la clase 'ClienteDAO' para crear un nuevo usuario
                ClienteDAO::crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña);
                
                // Obtiene todos los clientes
                $clientes = ClienteDAO::getAllClientes();
                
                // Incluye la vista 'usuarios.php'
                header('Location: '.url.'?controlador=usuariosAdmin');
            }
        }

        // Método para la página de eliminar usuario administrativo
        public static function eliminar() {
            // Obtiene el ID del cliente desde el formulario
            $id = $_POST['cliente_id'];
            
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'pedidos.php'
                include_once 'vista/pedidos.php';
            } else if (isset($_POST['Eliminar'])) {
                // Llama al método en la clase 'ClienteDAO' para eliminar el usuario
                ClienteDAO::eliminarUsuario($id);
                
                // Obtiene todos los clientes
                $clientes = ClienteDAO::getAllClientes();
                
                // Incluye la vista 'usuarios.php'
                header('Location: '.url.'?controlador=usuariosAdmin');
            }
        }

        // Método para la página de modificar usuario administrativo
        public static function modificar() {
            // Obtiene el ID del cliente desde el formulario
            $id = $_POST['cliente_id'];

            // Obtiene el nombre del cliente
            $con = dataBase::connect();
            $result = $con->query("SELECT `nombre` FROM `usuarios` WHERE cliente_id = $id;");
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'usuarios.php'
                include_once 'vista/usuarios.php';
            } else {
                // Obtiene información del cliente para modificar
                $cliente = ClienteDAO::getClientById($id);
                $lista = headerControlador::mostrarHeader();
                // Incluye la vista 'modificarUsuario.php'
                include_once 'vista/header.php';
                include_once 'vista/modificarUsuario.php';
            }
        }

        // Método para modificar un usuario administrativo existente
        public static function modificarUsuario(){
            // Obtiene datos del formulario
            $Nombre = $_POST['Nombre']; 
            $Apellido = $_POST['Apellido'];
            $Correo = $_POST['Correo'];
            $Rol = $_POST['Rol'];
            $Contraseña = $_POST['Contraseña'];
            $id = $_POST['cliente_id'];
            
            // Llama al método en la clase 'ClienteDAO' para modificar el usuario administrativo
            ClienteDAO::modificarAdmin($Nombre, $Apellido, $Correo, $Rol, $Contraseña, $id);
            
            // Obtiene todos los clientes
            $clientes = ClienteDAO::getAllClientes();
            
            // Incluye la vista 'usuarios.php'
            header('Location: '.url.'?controlador=usuariosAdmin');
        }
    }
?>
