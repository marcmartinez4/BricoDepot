<?php
    include_once 'modelo/reviewDAO.php';
    include_once 'controlador/APIControlador.php';

    class APIControlador {    
        public static function api() {
            $reviews = ReviewDAO::getAllReviews();
            $reviews = json_encode($reviews, JSON_UNESCAPED_UNICODE);
            header('Content-Type: application/json');
            echo $reviews;
            return;
        }
    }
?>