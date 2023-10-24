<?php
    include_once 'modelo/ProductoDAO.php';
    include_once 'controlador/productoControlador.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Tabla de productos</h1>
    <?php
        productoControlador::index();
    ?>
</body>
</html>