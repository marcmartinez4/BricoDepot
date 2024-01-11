<?php
    include_once 'modelo/ReviewDAO.php';
    include_once 'modelo/Review.php';

    class reviewControlador {
        public static function index() {
            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $lista = headerControlador::mostrarHeader();
                $reviews = ReviewDAO::getAllReviews();
                $clientes = ClienteDAO::getAllClientes();

                include_once 'vista/header.php';
                include_once 'vista/review.php';
            }
        }

        public static function info() {
            if (!isset($_GET['controlador'])) {
                include_once 'vista/home.php';
            } else {
                $lista = headerControlador::mostrarHeader();

                include_once 'vista/header.php';
                include_once 'vista/informacionPagina.php';
            }
        }
    }
?>