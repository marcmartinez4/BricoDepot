<?php
    session_start();
    if (!isset($_SESSION['array_carrito'])) {
        $_SESSION['array_carrito'] = array();
    }
?>