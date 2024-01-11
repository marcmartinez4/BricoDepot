<?php
    class ReviewDAO {
        public static function getAllReseñas() {
            $con = dataBase::connect();
                
            if ($result = $con->query("SELECT * FROM reviews")) {    
                $reviews = array();
                    
                while ($review = $result->fetch_object('Review')) {
                    $reviews[] = $review;
                }
                return $reviews;
            }
        }
    }
?>