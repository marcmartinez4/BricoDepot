<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/añadirProducto.css">
    <title>Añadir Pedido</title>
</head>
<body>
    <div class="panel">
        <div class="div-panel">
            <h1 class="h1-sesion">Añadir Pedido</h1>    
            <form action="?controlador=pedidosAdmin&action=añadirPedido" method="post">
                <h3>Producto</h3>
                <select class="input" name="Producto">
                    <?php
                        foreach ($productos as $producto) {
                    ?>
                        <option value="<?php echo $producto->getProducto_id() ?>"><?php echo $producto->getNombre_producto() ?></option>
                    <?php
                        }
                    ?>
                </select>

                <h3>Cantidad</h3>
                <input class="input" type="number" name="Cantidad" placeholder="1">

                <h3>ID Cliente</h3>
                <select class="input" name="IDCliente">
                    <?php
                        foreach ($clientes as $cliente) {
                    ?>
                        <option value="<?php echo $cliente->getCliente_id() ?>"><?php echo $cliente->getNombre() ?></option>
                    <?php
                        }
                    ?>
                </select>

                <input class="input-boton-sesion" type="submit" name="Añadir" value="Añadir Producto">
            </form>
        </div>
    </div>
</body>
</html>