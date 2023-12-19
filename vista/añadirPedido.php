<?php
    include_once 'config/dataBase.php';
    include_once 'modelo/productoDAO.php';
    include_once 'controlador/productoControlador.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Añadir Productos</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <h1 class="h1-sesion">Añadir Pedido</h1>    
            <form action="" method="post">
                <h3>Estado</h3>
                <input class="input" type="text" name="nombre_producto">

                <h3>Fecha Pedido</h3>
                <input class="input" type="text" name="descripcion">

                <h3>ID Cliente</h3>
                <input class="input" type="text" name="precio_unidad">

                <input class="input-boton-sesion" type="submit" value="Añadir Producto">
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['nombre_producto'], $_POST['descripcion'], $_POST['precio_unidad'], $_POST['categoria_id'])) {
            
            $nombre_producto = $_POST['nombre_producto'];
            $descripcion = $_POST['descripcion'];
            $precio_unidad = $_POST['precio_unidad']; 
            $categoria_id = $_POST['categoria_id'];

            productoControlador::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
        }
    ?>
</body>
</html>