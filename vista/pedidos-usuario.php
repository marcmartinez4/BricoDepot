<?php
    $clientes = ClienteDAO::getAllClientes();
    $pedidos = ProductoDAO::getAllPedidos();
    $pedido_productos = PedidoProductosDAO::getAllPedidoProductos();
    $productos = ProductoDAO::getAllProducts();
    $id_cliente = $_SESSION['Cliente']->getCliente_id();                          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/cliente.css">
    <title>Cesta Brico Depôt</title>
</head>
<body>
    <?php
        foreach ($clientes as $cliente) {
            if ($cliente->getCliente_id() == $id_cliente) {
    ?>
    <div class="container-fluid main">
        <h1>Mi cuenta</h1>
        <div class="d-flex justify-content-start">
            <div class="row justify-content-start">
                <div class="col-12 col-md-6 col-lg-3 izquierda">
                    <div class="saludo">
                        <h2>Hola <?php echo $cliente->getNombre() ?></h2>
                    </div>
                    <ul class="pestañas">
                        <a href="?controlador=cliente&action=cuenta">
                            <li>
                                <img class="imagen-izquierda" src="img/panel-control.svg">
                                <a href="?controlador=cliente&action=cuenta">Panel de control</a>
                                <img class="flecha" src="img/flecha-derecha.svg">
                            </li>
                        </a>
                        <a href="?controlador=pedidosUsuario">
                            <li  class="activa">
                                <img class="imagen-izquierda" src="img/carrito.svg">
                                <a href="?controlador=pedidosUsuario">Mis pedidos</a>
                                <img class="flecha" src="img/flecha-derecha.svg">
                            </li>
                        </a>
                        <a href="?controlador=cliente&action=modificar">
                            <li>
                                <img class="imagen-izquierda" src="img/informacion.svg">
                                <a href="?controlador=cliente&action=modificar">Información personal</a>
                                <img class="flecha" src="img/flecha-derecha.svg">
                            </li>
                        </a>
                        <a href="#">
                            <li>
                                <img class="imagen-izquierda" src="img/cerrar-sesion.svg">
                                <a href="controlador/cerrarSesion.php">Cerrar sesión</a>
                                <img class="flecha" src="img/flecha-derecha.svg">
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-9 derecha">
                    <div class="panel">
                        <h2 class="txt-info">Pedidos</h2>
                        <?php 
                            mostrarPedidoUsuario::mostrarPedidos();
                        ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
    ?>
</body>
</html>