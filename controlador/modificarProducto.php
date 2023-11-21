<?php
    include ("../config/dataBase.php");
    include ('../controlador/productoControlador.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>
<body>
    <h1>Modificar Producto</h1>
    <form action="" method="post">
        <input type="text" name="nombre_producto" placeholder="Nombre"><br><br>

        <input type="text" name="descripcion" placeholder="Descripción"><br><br>

        <input type="text" name="precio_unidad" placeholder="Precio unitario"><br><br>

        <input type="text" name="categoria_id" placeholder="Categoría"><br><br>

        <input type="submit" name="Enviar" value="Enviar">
    </form>
    <?php
        $id = $_POST['producto_id'];
        echo "Estas editando el producto con el ID: " . $id;

        if (!empty($_POST['nombre_producto']) && !empty($_POST['descripcion']) && !empty($_POST['precio_unidad']) && !empty($_POST['categoria_id'])){
            $nombre_producto = $_POST['nombre_producto'];
            $descripcion = $_POST['descripcion']; 
            $precio_unidad = $_POST['precio_unidad']; 
            $categoria_id = $_POST['categoria_id'];
        } else {
            echo 'Campos vacíos!';
        }
        echo $id; 
        productoControlador::modificarProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id, $id);    
    ?>
</body>
</html>