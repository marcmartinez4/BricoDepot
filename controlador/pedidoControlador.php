<?php
    include_once 'modelo/pedidoDAO.php';

    class pedidoControlador {
        public static function index() {
            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $prodCarrito = productoDAO::getAllProducts();
                $count_array = count($_SESSION['carrito']);
                
                if ($count_array > 1) {
                    $top = 'Productos';
                } else {
                    $top = 'Producto';
                }
                include_once 'vista/carrito.php';
            }
        }
        
        public static function sumarCantidad() {
            $id = $_POST['sumarCantidad'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else if (isset($_POST['sumarCantidad'])) {
                PedidoDAO::sumarCantidad($id);
                include_once 'vista/carrito.php';
            }
        }

        public static function restarCantidad() {
            $id = $_POST['restarCantidad'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else if (isset($_POST['restarCantidad'])) {
                PedidoDAO::restarCantidad($id);
                include_once 'vista/carrito.php';
            }
        }

        public static function eliminarProducto() {
            $id = $_POST['eliminarProducto'];

            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else if (isset($_POST['eliminarProducto'])) {
                PedidoDAO::eliminarProducto($id);
                include_once 'vista/carrito.php';
            }
        }

        public static function finalizarPedido(){
            PedidoDAO::finalizarPedido();
            include_once 'vista/home.php';
        }
    }
?>