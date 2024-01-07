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
            <!-- Título de la página -->
            <h1 class="h1-sesion">Añadir Pedido</h1>    
            <!-- Form con los datos a rellenar para añadir un pedido -->
            <form action="?controlador=pedidosAdmin&action=añadirPedido" method="post">
                <h3>Producto</h3>
                <!-- Bucle que muestra todos los productos disponibles -->
                <select class="input" name="Producto">
                    <?php
                        foreach ($productos as $producto) {
                    ?>
                        <option value="<?= $producto->getProducto_id() ?>"><?= $producto->getNombre_producto() ?></option>
                    <?php
                        }
                    ?>
                </select>

                <h3>Cantidad</h3>
                <input class="input" type="number" name="Cantidad" placeholder="1">

                <h3>ID Cliente</h3>
                <!-- Bucle que muestra el id del cliente al que le queremos asociar el pedido añadido -->
                <select class="input" name="IDCliente">
                    <?php
                        foreach ($clientes as $cliente) {
                    ?>
                        <option value="<?= $cliente->getCliente_id() ?>"><?= $cliente->getNombre() ?></option>
                    <?php
                        }
                    ?>
                </select>

                <!-- Input para crear el pedido -->
                <input class="input-boton-sesion" type="submit" name="Añadir" value="Añadir Pedido">
            </form>
        </div>
    </div>
</body>
</html>