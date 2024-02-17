<?php
    // Incluir los archivos necesarios
    include_once 'modelo/reviewDAO.php';
    include_once 'modelo/pedidoDAO.php';
    include_once 'modelo/ProductoDAO.php';

    class APIControlador {    
        // Método para mostrar las reseñas
        public static function mostrarReseñas() {
            // Obtener todas las reseñas
            $reviews = ReviewDAO::getAllReviews();
            
            // Convertir las reseñas a formato JSON
            $reviews = json_encode($reviews, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');
            
            // Imprimir las reseñas en formato JSON
            echo $reviews;
            return;
        }

        // Método para mostrar los productos
        public static function mostrarProductos() {
            // Obtener todos los productos en formato JS
            $productos = ProductoDAO::getAllProductsJS();
            
            // Convertir los productos a formato JSON
            $productos = json_encode($productos, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');
            
            // Imprimir los productos en formato JSON
            echo $productos;
            return;
        }

        // Método para añadir una reseña
        public static function añadirReseña() {
            // Obtener los datos de la solicitud POST en formato JSON
            $data = json_decode(file_get_contents('php://input'), true);

            // Extraer los datos de la reseña de la solicitud
            $cliente_id = $data['cliente_id'];
            $pedido_id = $data['pedido_id'];
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $titulo = $data['titulo'];
            $review = $data['review'];
            $fecha = $data['fecha'];
            $puntuacion = $data['puntuacion'];

            // Añadir la reseña utilizando añadirReseña en ReviewDAO
            ReviewDAO::añadirReseña($cliente_id, $pedido_id, $nombre, $apellido, $titulo, $review, $fecha, $puntuacion);
        }

        // Método para obtener información de un pedido
        public static function informacionPedido() {
            // Obtener el ID del pedido de la solicitud GET
            $id = $_GET['pedido_id'];
            // Obtener la información del pedido utilizando el DAO
            $informacionPedido = pedidoDAO::informacionPedido($id);
            
            // Convertir la información del pedido a formato JSON
            $informacionPedido = json_encode($informacionPedido, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');
            
            // Imprimir la información del pedido en formato JSON
            echo $informacionPedido;
            return;
        }
        
        // Método para modificar los puntos del cliente
        public function modificarPuntos() {
            // Obtener los datos de la solicitud POST en formato JSON
            $data = json_decode(file_get_contents('php://input'), true);
            
            // Obtener el ID del cliente de la sesión actual
            $id_cliente = $_SESSION['Cliente']->getCliente_id();
            // Obtener los puntos a modificar de la solicitud
            $puntosFinalizar =  $data['puntosFinalizar'];

            // Modificar los puntos del cliente utilizando el DAO correspondiente
            ClienteDAO::modificarPuntos($id_cliente, $puntosFinalizar);
        }
    }
?>
