<?php
    //include_once 'modelo/ProductoDAO.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Productos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
        }
        h1 {
            font-size: 40px;
        }
        div {
            width: 400px;
            margin-top: 10%;
            text-align: center;
            border: 1px solid transparent;
            border-radius: 10px;
            background-color: white;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;  
        }
        div label {
            font-size: 20px;
        }
        input {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.152);
            outline: none;
            text-align: center;
            margin-top: 10px;
            padding-bottom: 5px;
        }
        .enviar {
            color: #4CAF50;
            background-color: white;
            padding: 15px 50px 15px 50px;
            font-size: 20px;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            margin-bottom: 10px;

        }
        .enviar:hover {
            color: white;
            border: 2px solid #72e277;
            background-color: #72e277;
            transition: background-color 0.3s;
        }
    </style>
</head>
<body>
    <div>
        <h1>Añadir Productos</h1>
        <form action="" method="post">
            <label>Nombre del producto </label><br>
            <input type="text" name="nombre_producto">
            <br><br>

            <label>Descripción </label><br>
            <input type="text" name="descripcion">
            <br><br>

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

            ProductoDAO::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
        }
    ?>
</body>
</html>