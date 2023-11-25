<?php
    session_start();
    if (!isset($_SESSION['pedido'])) {
        $_SESSION['pedido']  = array(array());
        array_pop($_SESSION['pedido']);
    }
?>