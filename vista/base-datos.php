<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/css-bd.css">
    <title>Productos</title>
</head>
<body>
    <!-- Titulo de la página -->
    <h1>Tabla de productos</h1>
    
    <!-- Botones de navegación -->
    <div class="div-navegacion">
        <form action="?controlador=tablaProductos&action=añadir" method="post">
            <input class="btnAñadir" type="submit" value="Añadir Producto">
        </form>
        <a href="?controlador=pedidosAdmin" class="btnPedidos">Pedidos</a>
        <a href="?controlador=usuariosAdmin" class="btnPedidos">Usuarios</a>
    </div>
    
    <!-- Tabla de productos -->
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
        <!-- Bucle tabla de productos -->
        <?php 
            foreach ($productos as $producto) {
        ?>
        <tr>
            <td><?= $producto->getProducto_id() ?></td>
            <td><?= $producto->getNombre_producto() ?></td>
            <td><?= $producto->getDescripcion() ?></td>
            <td><?= $producto->getPrecio_unidad() ?> €</td>
            <td><?= $producto->getCategoria_id() ?></td>
            <!-- Botones modificar y eliminar -->
            <td>
                <form action="?controlador=tablaProductos&action=modificar" method="post">
                    <input type="hidden" name="producto_id" value="<?= $producto->getProducto_id(); ?>">
                    <input type="submit" name="Modificar" value="Modificar">
                </form>
            </td>
        
            <td>
                <form action="?controlador=tablaProductos&action=eliminar" method="post">
                    <input type="hidden" name="producto_id" value="<?= $producto->getProducto_id(); ?>">
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