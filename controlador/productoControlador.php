<?php
    // Se incluyen los archivos necesarios
    include_once 'modelo/productoDAO.php';
    include_once 'config/functions.php';
    
    // Se define la clase
    class productoControlador {
        // Método para la página principal de productos (index)
        public static function index() {
            // Verifica si no se ha establecido el parámetro 'controlador' en la URL
            if(!isset($_GET['controlador'])) {
                // Si no está definido, incluye la vista 'home.php'
                include_once 'vista/home.php';
            } else {
                // Obtiene todos los productos y la variable lista la cual será utilzada en el header
                $productos = productoDAO::getAllProducts();
                $lista = headerControlador::mostrarHeader();
                
                // Incluye la vista carta.php y el header
                include_once 'vista/header.php';
                include_once 'vista/carta.php';
                include_once 'vista/footer.html';
            }
        }
    }
?>
