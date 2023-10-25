<?php
    include_once 'modelo/ProductoDAO.php';
    include_once 'controlador/productoControlador.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <title>Productos</title>
</head>
<body>
    <h1>Tabla de productos</h1>
    <form action="" method="post">
        <?php
            productoControlador::index();
            $accion = "";
            if(isset($_POST['Añadir'])) {
                $accion = "<h2>"."Se ha añadido un producto"."</h2>";
                echo $accion;
            } else if(isset($_POST['Eliminar'])) {
                $accion = "<h2>"."Se ha eliminado un producto"."</h2>";
                echo $accion;
            }
        ?>
    </form>
</body>
</html>