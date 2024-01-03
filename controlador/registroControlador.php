<?php
    // Se define la clase
    class registroControlador {
        
        // Método para la página principal de registro (index)
        public static function index() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else {
                // Incluye la vista 'crear-cuenta.php'
                include_once 'vista/header.php';
                include_once 'vista/crear-cuenta.php';
            }
        }
        
        // Método para crear una nueva cuenta de cliente
        public static function crearCuenta() {
            // Obtiene datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $Rol = $_POST['Cliente'];
            $contraseña = $_POST['contraseña'];

            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if (!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'crear-cuenta.php'
                include_once 'vista/crear-cuenta.php';
            } else if (isset($nombre, $apellido, $correo, $contraseña)) {
                // Llama al método en la clase 'ClienteDAO' para crear una nueva cuenta de cliente
                ClienteDAO::crearCuenta($nombre, $apellido, $correo, $Rol, $contraseña);
                
                // Incluye la vista 'inicio-sesion.php'
                include_once 'vista/inicio-sesion.php';
            }
        }
    }
?>
