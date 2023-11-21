<?php
    include ("../config/dataBase.php");
    include ('../modelo/productoDAO.php');
    include ('../controlador/productoControlador.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Productos</title>
</head>
<body>
<h1>Añadir Productos</h1>
        <form action="" method="post">
            <label>Nombre del producto </label><br>
            <input type="text" name="nombre_producto"><br><br>

            <label>Descripción </label><br>
            <input type="text" name="descripcion"><br><br>

            <label>Precio </label><br>
            <input type="text" name="precio_unidad">
            <br><br>

            <label>ID de la categoría </label><br>
            <input type="text" name="categoria_id">
            <br><br>

            <input class="enviar" type="submit" value="Enviar">
        </form>
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