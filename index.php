<?php
    include_once 'modelo/ProductoDAO.php';
    include_once 'controlador/productoControlador.php';
    $accion = "";
            if(isset($_POST['Modificar'])) {
                $accion = "<h2>"."Se ha modificado un producto"."</h2>";
                echo $accion;
            } else if(isset($_POST['Eliminar'])) {
                $accion = "<h2>"."Se ha eliminado un producto"."</h2>";
                echo $accion;
            }
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
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio por unidad</th>
            <th>Categoría</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
            $productos = ProductoDAO::getAllProducts();
            foreach ($productos as $producto) {
        ?>
        <tr>
            <td><?php echo $nombres_productos[] = $producto->getProducto_id() ?></td>
            <td><?php echo $nombres_productos[] = $producto->getNombre_producto() ?></td>
            <td><?php echo $nombres_productos[] = $producto->getDescripcion() ?></td>
            <td><?php echo $nombres_productos[] = $producto->getPrecio_unidad() ?> €</td>
            <td><?php echo $nombres_productos[] = $producto->getCategoria_id() ?></td>
            <td><input type='submit' name='Modificar' value='Modificar'></td>
            <td><input type='submit' name='Eliminar' value='Eliminar'></td>
        </tr>
        <?php } ?>
    </table>
    <?php return $nombres_productos; ?>

    <form action="" method="post">
    <?php
            productoControlador::index();
            $accion = "";
            if(isset($_POST['Modificar'])) {
                $accion = "<h2>"."Se ha modificado un producto"."</h2>";
                echo $accion;
            } else if(isset($_POST['Eliminar'])) {
                $accion = "<h2>"."Se ha eliminado un producto"."</h2>";
                echo $accion;
            }
        ?>
    </form>
</body>
</html>