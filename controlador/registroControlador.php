<?php
    // Se define la clase
    class registroControlador {
        // Método para el index
        public static function index() {
            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista home.php
                include_once 'vista/home.php';
            } else {
                // Se define la variable lista la cual será utilzada en el header
                $lista = headerControlador::mostrarHeader();

                // Incluye la vista crear-cuenta.php y el header
                include_once 'vista/header.php';
                include_once 'vista/crear-cuenta.php';
            }
        }
        
        // Método para crear una nueva cuenta de cliente
        public static function crearCuenta() {
            // Obtiene datos del formulario y  se convierten en variables
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $Rol = 'Cliente';
            $contraseña = $_POST['contraseña'];

            // Verifica si no se ha establecido el parámetro controlador en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista crear-cuenta.php
                include_once 'vista/crear-cuenta.php';
            } else if (isset($nombre, $apellido, $correo, $contraseña)) {
                // Llama al método en la clase ClienteDAO para crear una nueva cuenta de cliente
                ClienteDAO::crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña);
                
                // Se redirige al inicio de sesión
                header('Location: '.url.'?controlador=cliente');
            }
        }
    }
?>
