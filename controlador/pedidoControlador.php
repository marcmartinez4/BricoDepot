<?php
    include_once '../modelo/pedidoDAO.php';

    class pedidoControlador {
        public static function finalizarPedido(){
            PedidoDao::finalizarPedido();
        }
    }
?>