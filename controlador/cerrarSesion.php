<?php
    // Se incluyen los archivos necesarios
    include_once '../config/parametros.php';

    session_start(); // Inicia sesión para poder destruir los datos
    session_destroy(); // Destruye los datos de una sesión cerrando esta
    header("Location:" . url . "?controlador=home"); // Redirige al usuario a la página de inicio
?>
