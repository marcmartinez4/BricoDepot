<?php
    // Se incluyen los archivos necesarios
    include_once 'modelo/Cliente.php';
    
    session_start();// Se inicia la sesión
    // Se verifica si la variable de sesión 'carrito' no está definida
    if (!isset($_SESSION['carrito'])) {
        // Si no está definida, se inicializa como un array multidimensional
        $_SESSION['carrito']  = array(array());
        
        // Se elimina el último elemento del array 
        array_pop($_SESSION['carrito']);
    }
?>
