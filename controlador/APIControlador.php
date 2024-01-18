<?php
    include_once 'modelo/ReviewDAO.php';

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