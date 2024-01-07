<?php
    // Se define la clase
    class homeControlador {
        // Método para el index
        public function index() {
            // Obtiene todos los productos llamando al método en la clase productoDAO y se define la variable lista la cual será utilizada para el header
            $productos = productoDAO::getAllProducts();
            $lista = headerControlador::mostrarHeader();

            // Incluye la vista home.php y el header
            include_once 'vista/header.php';
            include_once 'vista/home.php';
        }
    }
?>
