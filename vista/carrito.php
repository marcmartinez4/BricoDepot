<?php
    include_once '../config/functions.php';
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    include_once '../config/functions.php';

    print_r($_SESSION['array_carrito']);
    for ($i = 0; $i <= sizeof($_SESSION['array_carrito']); $i++) {
        if ($_SESSION['array_carrito'] != null) {
            print_r($_SESSION['array_carrito'][$i]);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta Brico Depôt</title>
</head>
<body>
    
</body>
</html>