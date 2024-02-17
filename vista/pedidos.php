<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/css-bd.css">
    <title>Pedidos</title>
</head>
<body>
    <!-- Titulo de la página -->
    <h1>Tabla de pedidos</h1>
    
    <!-- Botones de navegación -->
    <div class="div-navegacion">
        <form action="?controlador=pedidosAdmin&action=añadir" method="post">
            <input class="btnAñadir" type="submit" value="Añadir Pedido">
        </form>
        <a href="?controlador=tablaProductos" class="btnPedidos">Productos</a>
        <a href="?controlador=usuariosAdmin" class="btnPedidos">Usuarios</a>
    </div>
    
    <div class="div-tablas">
        <!-- Tabla de pedidos -->
        <table>
            <tr>
                <th>ID</th>
                <th>Estado</th>
                <th>Fecha Pedido</th>
                <th>ID Cliente</th>
                <th>Propina</th>
                <th>Precio total</th>
                <th>Puntos usados</th>
                <th></th>
            </tr>
            <!-- Bucle tabla de productos -->
            <?php 
                foreach ($pedidos as $pedido) {
            ?>
            <tr>
                <td><?=$pedido->getPedido_id();?></td>
                <td><?=$pedido->getEstado();?></td>
                <td><?=$pedido->getFecha_pedido();?></td>
                <td><?=$pedido->getCliente_id();?></td>
                <td><?=$pedido->getPropina();?> %</td>
                <td><?=$pedido->getPrecioTotal()?> €</td>
                <td><?=$pedido->getPuntosUsados()?> puntos</td>
                <!-- Boton de eliminar -->
                <td>
                    <form action="?controlador=pedidosAdmin&action=eliminar" method="post">
                        <input type="hidden" name="producto_id" value="<?=$pedido->getPedido_id();?>">
                        <input type="submit" name="Eliminar" value="Eliminar">
                    </form>
                </td>
            </tr>
            <?php 
                } 
            ?>
        </table>

        <!-- Tabla de pedido_productos -->
        <table>
            <tr>
                <th>Pedido ID</th>
                <th>Producto ID</th>
                <th>Cantidad</th>
                <th>Precio por unidad</th>
            </tr>
            <!-- Bucle de pedido_productos -->
            <?php 
                foreach ($pedido_productos as $pedido_producto) {
            ?>

            <tr>
                <td><?=$pedido_producto->getPedido_id();?></td>
                <td><?=$pedido_producto->getProducto_id();?></td>
                <td><?=$pedido_producto->getCantidad();?></td>
                <td><?=$pedido_producto->getPrecio_unidad();?> €</td>
            </tr>
            <?php 
                } 
            ?>
        </table>
    </div>
</body>
</html>