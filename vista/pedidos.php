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
    
    <div class="div-navegacion">
        <form action="../vista/añadirProducto.php" method="post">
            <input class="btnAñadir" type="submit" value="Añadir Productos">
        </form>
        <a href="<?= url ?>?controlador=tablaProductos" class="btnPedidos">Productos</a>
    </div>
    
    <div class="div-tablas">
        <table>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Fecha Pedido</th>
                <th>ID Cliente</th>
                <th></th>
                <th></th>
            </tr>
            <?php 
                $pedidos = ProductoDAO::getAllPedidos();
                foreach ($pedidos as $pedido) {
            ?>
            <tr>
                <td><?php echo $pedido->getPedido_id() ?></td>
                <td><?php echo $pedido->getEstado() ?></td>
                <td><?php echo $pedido->getFecha_pedido() ?></td>
                <td><?php echo $pedido->getCliente_id() ?></td>
                <form action="" method="post">
                    <td>
                        <form action="../controlador/modificarProducto.php" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $pedido->getPedido_id(); ?>">
                            <input type="submit" name="Modificar" value="Modificar">
                        </form>
                    </td>
            
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $pedido->getPedido_id (); ?>">
                            <input type="submit" name="Eliminar" value="Eliminar">
                        </form>
                    </td>
                </form>
            </tr>
            <?php } ?>
        </table>

        <table>
            <tr>
                <th>Pedido ID</th>
                <th>Producto ID</th>
                <th>Cantidad</th>
                <th>Precio por unidad</th>
                <th></th>
                <th></th>
            </tr>
            <?php 
                $pedido_productos = ProductoDAO::getAllPedidoProductos();
                foreach ($pedido_productos as $pedido_producto) {
            ?>

            <tr>
                <td><?php echo $pedido_producto->getPedido_id() ?></td>
                <td><?php echo $pedido_producto->getProducto_id() ?></td>
                <td><?php echo $pedido_producto->getCantidad() ?></td>
                <td><?php echo $pedido_producto->getPrecio_unidad() ?></td>
                <form action="" method="post">
                    <td>
                        <form action="../controlador/modificarProducto.php" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $pedido_producto->getPedido_id(); ?>">
                            <input type="submit" name="Modificar" value="Modificar">
                        </form>
                    </td>
            
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $pedido_producto->getPedido_id (); ?>">
                            <input type="submit" name="Eliminar" value="Eliminar">
                        </form>
                    </td>
                </form>
            </tr>

            <?php } ?>
        </table>
    </div>
    
    <?php
        if(isset($_POST['Eliminar'])) {
            $id = $_POST['producto_id'];
            productoControlador::eliminarProducto($id);
        }
    ?>
</body>
</html>