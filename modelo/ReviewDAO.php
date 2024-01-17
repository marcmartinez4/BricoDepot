<?php
    class ReviewDAO {
        public static function getAllReviews() {
            $listaReviews = [];
            $con = dataBase::connect();
            
            if (!$con) {
                return $listaReviews;
            }

            $result = $con->query("SELECT * FROM reviews");
            if (!$result) {
                    $con->close();
                    return $listaReviews;
            }

            while ($reviewData = $result->fetch_assoc()) {
                $listaReviews[] = [
                    'review_id' => $reviewData['review_id'],
                    'cliente_id' => $reviewData['cliente_id'],
                    'pedido_id' => $reviewData['pedido_id'],
                    'titulo' => $reviewData['titulo'],
                    'review' => $reviewData['review'],
                    'fecha' => $reviewData['fecha'],
                    'puntuacion' => $reviewData['puntuacion']
                ];
            }

            $result->close();
            $con->close();

            return $listaReviews;
        }
    }
?>