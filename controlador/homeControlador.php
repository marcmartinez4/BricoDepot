<?php
    // Se define la clase
    class homeControlador {
        
        // Método para la página principal (index)
        public function index() {
            // Obtiene todos los productos llamando al método en la clase 'productoDAO'
            $productos = productoDAO::getAllProducts();
            
            // Incluye la vista 'home.php', probablemente para mostrar la lista de productos en la página principal
            include_once 'vista/home.php';
        }
    }
?>
