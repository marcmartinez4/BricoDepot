<?php
    include ('../config/dataBase.php');
    include ("../config/parametros.php");
    include ("../modelo/ProductoDAO.php");
    include ("../controlador/productoControlador.php");
    include ('../vista/header.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link rel="stylesheet" href="../vista/css/css-bd.css">
    <title>Base de Datos Productos</title>
</head>
<body>
    <h1>Tabla de productos</h1>
    <form action="../controlador/añadirProducto.php" method="post">
        <input class="btnAñadir" type="submit" value="Añadir Productos">
    </form>
    
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
                    <form action="../controlador/modificarProducto.php" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                        <input type="submit" name="Modificar" value="Modificar">
                    </form>
                </td>
        
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                        <input type="submit" name="Eliminar" value="Eliminar">
                    </form>
                </td>
            </form>
        </tr>
        <?php } ?>
    </table>
    <?php
        if(isset($_POST['Eliminar'])) {
            $id = $_POST['producto_id'];
            productoControlador::eliminarProducto($id);
        }

        include ('../vista/footer.html');
    ?>
</body>
</html>