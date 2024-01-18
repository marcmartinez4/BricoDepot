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
    }
?>