<?php
    include_once 'config/functions.php';
    include_once 'config/parametros.php';
    include_once 'vista/header.php';
    include_once 'controlador/pedidoControlador.php';
    include_once 'controlador/productoControlador.php';
    include_once 'controlador/clienteControlador.php';
    include_once 'controlador/homeControlador.php';
    include_once 'controlador/botonSesion.php';

    if(!isset($_GET['controller'])) {
        header("Location:" . url . "?controller=home");
    } else {
        $nombre_controller = $_GET['controller'] . "Controller";

        if(class_exists($nombre_controller)) {
            $controller = new $nombre_controller;

            if(isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = action_default;
            }

            $controller->$action();

        } else {
            header("Location:" . url . "?controller=home");
        }
    }

?>