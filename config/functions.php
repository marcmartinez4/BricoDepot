<?php
    session_start();
    
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito']  = array(array());
        array_pop($_SESSION['carrito']);
    }

    setcookie('carrito', json_encode($_SESSION['carrito']), time() + 3600, '/');
?>