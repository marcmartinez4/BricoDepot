<?php    
    class infoControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/informacion-producto.php';
            }
        }

        public static function reducirCantidad() {
            if (!isset($_SESSION['cantidad_añadir'])) {
                $_SESSION['cantidad_añadir'] = 1;
            }
            
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                if ($_SESSION['cantidad_añadir'] > 1) {
                    $_SESSION['cantidad_añadir']--;
                }

                include_once 'vista/informacion-producto.php';
            }
        }
    
        public static function añadirCantidad() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $_SESSION['cantidad_añadir']++;
                include_once 'vista/informacion-producto.php';
            }
            
        }

        public static function añadirAlCarrito() {
            if (isset($_POST['AñadirCarrito'])) {
                $id = $_POST['producto_id'];
            }
            
            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                PedidoDAO::añadirCarrito($id, $_SESSION['cantidad_añadir']);
                $_SESSION['cantidad_añadir'] = 1;
                include_once 'vista/informacion-producto.php';
            }
        }
    }
?>