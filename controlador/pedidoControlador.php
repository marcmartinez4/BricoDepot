<?php
    include_once 'modelo/pedidoDAO.php';

    class pedidoControlador {
        public static function index() {
            if(!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                include_once 'vista/carrito.php';
            }
        }
        
        public static function finalizarPedido(){
            PedidoDao::finalizarPedido();
        }
    }
?>