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
    <link rel="stylesheet" href="estiloAñadir.css">
    <title>Añadir Productos</title>
</head>
<body>
    <h1>Añadir Productos</h1>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nombre"><br><br>

        <input type="text" name="descripcion" placeholder="Descripción"><br><br>

        <input type="text" name="precioUnitario" placeholder="Precio unitario"><br><br>

        <input type="text" name="categoria" placeholder="Categoría"><br><br>

        <input type="submit" name="btnEnviar" value="Enviar">
    </form>
    <?php
        if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precioUnitario"]) && isset($_POST["categoria"]) && isset($_POST["btnEnviar"])){
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion']; 
            $precio = $_POST['precioUnitario']; 
            $categoria = $_POST['categoria'];

            productoControlador::añadirProducto($nombre_producto, $descripcion, $precio_unidad, $categoria_id);
        }
    ?>
</body>
</html>