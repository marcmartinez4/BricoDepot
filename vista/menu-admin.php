<?php
    include ("../config/dataBase.php");
    include ("../config/parametros.php");
    include ("../modelo/ProductoDAO.php");
    include ("../controlador/productoControlador.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="custom.css">
    <title>Productos</title>
</head>
<body>
    <h1>Tabla de productos</h1>
    <a href="../controlador/añadirProducto.php">Añadir</a>
    <a href="../controlador/modificarProducto.php">Modificar</a>
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
            <td><?php echo $producto->getProducto_id() ?></td>
            <td><?php echo $producto->getNombre_producto() ?></td>
            <td><?php echo $producto->getDescripcion() ?></td>
            <td><?php echo $producto->getPrecio_unidad() ?> €</td>
            <td><?php echo $producto->getCategoria_id() ?></td>
            <form action="" method="post">
                <td>
                    <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                    <input type="submit" name="Modificar" value="Modificar">
                </td>
        
                <td>
                    <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                    <input type="submit" name="Eliminar" value="Eliminar">
                </td>
            </form>
        </tr>
        <?php } ?>
    </table>
    <?php 
        $accion;
        if(isset($_POST['Modificar'])) {
            $producto_id = $_POST['producto_id'];
            $accion = "<h2 style='font-family: Arial, Helvetica, sans-serif;'>Se ha modificado el producto " . $producto_id . "</h2>";
            echo $accion;
        } else if(isset($_POST['Eliminar'])) {
            productoDAO::deleteProducts();
            header("Location: index.php");
        }
        
    ?>
    <!-- commit -->
</body>
</html>