<?php
    class ReviewDAO {
        public static function getAllReviews() {
            $con = dataBase::connect();

            if ($result = $con->query("SELECT * FROM reviews")) {
                $reviews = array();
                while ($review = $result->fetch_assoc()) {
                    $reviews[] = $review;
                }
                return $reviews;
            }
        }

        public static function añadirReseña($cliente_id, $pedido_id, $nombre, $apellido, $titulo, $review, $fecha, $puntuacion) {
            $con = dataBase::connect();
            $stmt = $con->prepare("INSERT INTO reviews (cliente_id, pedido_id, nombre, apellido, titulo, review, fecha, puntuacion) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
            $stmt->bind_parameter("iissssii", $cliente_id, $pedido_id, $nombre, $apellido, $titulo, $review, $fecha, $puntuacion);
            $stmt->execute();
            $con->close();
        }
    }
?>