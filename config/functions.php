<?php
    session_start();
    if (!isset($_SESSION['pedido'])) {
        $_SESSION['pedido'][$i] = array(array());
        array_pop($_SESSION['pedido']);
    }
?>