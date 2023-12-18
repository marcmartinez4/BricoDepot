<?php
    include_once '../config/parametros.php';

    session_start();
    session_destroy();
    header("Location:" . url . "?controlador=home");
?>