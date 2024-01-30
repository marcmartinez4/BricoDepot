<?php
    include_once 'modelo/reviewDAO.php';
    include_once 'modelo/pedidoDAO.php';

    class APIControlador {    
        public static function api() {
            $reviews = ReviewDAO::getAllReviews();
            $reviews = json_encode($reviews, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');
            echo $reviews;
            return;
        }

        public static function añadirReseña() {
            $data = json_decode(file_get_contents('php://input'), true);

            $cliente_id = $data['cliente_id'];
            $pedido_id = $data['pedido_id'];
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $titulo = $data['titulo'];
            $review = $data['review'];
            $fecha = $data['fecha'];
            $puntuacion = $data['puntuacion'];

            ReviewDAO::añadirReseña($cliente_id, $pedido_id, $nombre, $apellido, $titulo, $review, $fecha, $puntuacion);
        }

        public static function informacionPedido() {
            $id = $_GET['pedidoid'];
            $infopedido = pedidoDAO::informacionPedido($id);
            $infopedido = json_encode($infopedido, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');
            echo $infopedido;
            return;
        }
    }
?>