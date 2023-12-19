<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/css-bd.css">
    <title>Base de Datos Productos</title>
</head>
<body>
    <h1>Tabla de productos</h1>
    
    <div class="div-navegacion">
        <form action="<?php url ?>?controlador=tablaProductos&action=añadir" method="post">
            <input class="btnAñadir" type="submit" value="Añadir Producto">
        </form>
        <a href="<?= url ?>?controlador=pedidosAdmin" class="btnPedidos">Pedidos</a>
    </div>
    
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
            <td>
                <form action="<?php url ?>?controlador=tablaProductos&action=modificar" method="post">
                    <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                    <input type="submit" name="Modificar" value="Modificar">
                </form>
            </td>
        
            <td>
                <form action="<?php url ?>?controlador=tablaProductos&action=eliminar" method="post">
                    <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                    <input type="submit" name="Eliminar" value="Eliminar">
                </form>
            </td>
        </tr>
        <?php 
            } 
        ?>
    </table>
</body>
</html>