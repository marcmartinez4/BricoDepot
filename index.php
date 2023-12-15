<?php
    include_once 'config/functions.php';
    include_once 'config/parametros.php';
    include_once 'vista/header.php';
    include_once 'controlador/pedidoControlador.php';
    include_once 'controlador/productoControlador.php';
    include_once 'controlador/clienteControlador.php';
    include_once 'controlador/homeControlador.php';
    include_once 'controlador/botonSesion.php';

    if(!isset($_GET['controlador'])) {
        header("Location:" . url . "?controlador=home");
    } else {
        $nombre_controlador = $_GET['controlador'] . "Controlador";

        if(class_exists($nombre_controlador)) {
            $controlador = new $nombre_controlador;

            if(isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = action_default;
            }

            $controlador->$action();

        } else {
            header("Location:" . url . "?controlador=home");
        }
    }

    include_once 'vista/footer.html';
?>