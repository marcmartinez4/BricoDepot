<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/cliente.css">
    <title>Panel de control</title>
</head>
<body>
    <!-- Bucle que solo muestra si la info del cliente es la del mismo que inició sesión -->
    <?php
        foreach ($clientes as $cliente) {
            if ($cliente->getCliente_id() == $id_cliente) {
    ?>
    <div class="container-fluid main">
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <div class="d-flex justify-content-start">
                    <!-- Título de la página -->
                    <div class="row justify-content-start">
                        <h1>Mi cuenta</h1>
                    </div>
                </div>
                <!-- Panel de navegación con accceso a las diferentes partes de la página de cliente -->
                <div class="col-12 col-md-12 col-lg-3 izquierda">
                    <div class="saludo">
                        <h2>Hola <?=$cliente->getNombre();?></h2>
                    </div>
                    <ul class="pestañas">
                        <a href="?controlador=cliente&action=cuenta">
                            <li>
                                <img class="imagen-izquierda" src="img/panel-control.svg" alt="Panel de control">
                                <a href="?controlador=cliente&action=cuenta">Panel de control</a>
                                <img class="flecha" src="img/flecha-derecha.svg" alt="Flecha">
                            </li>
                        </a>
                        <a href="?controlador=pedidosUsuario">
                            <li class="activa">
                                <img class="imagen-izquierda" src="img/carrito.svg" alt="Mis pedidos">
                                <a href="?controlador=pedidosUsuario">Mis pedidos</a>
                                <img class="flecha" src="img/flecha-derecha.svg" alt="Flecha">
                            </li>
                        </a>
                        <a href="?controlador=cliente&action=modificar">
                            <li>
                                <img class="imagen-izquierda" src="img/informacion.svg" alt="Información personal">
                                <a href="?controlador=cliente&action=modificar">Información personal</a>
                                <img class="flecha" src="img/flecha-derecha.svg" alt="Flecha">
                            </li>
                        </a>
                        <a href="controlador/cerrarSesion.php">
                            <li>
                                <img class="imagen-izquierda" src="img/cerrar-sesion.svg" alt="Cerrar sesión">
                                <a href="controlador/cerrarSesion.php">Cerrar sesión</a>
                                <img class="flecha" src="img/flecha-derecha.svg" alt="Flecha">
                            </li>
                        </a>
                    </ul>
                </div>
                <div class="col-12 col-md-12 col-lg-7 derecha">
                    <div class="panel">
                        <!-- Titulo del apartado -->
                        <h2 class="txt-info">Pedidos</h2>
                        
                        <!-- Se muestra el nombre y correo del usuario además de un botón el cual manda a la página de modificar datos -->
                        <div class="primer-panel">
                            <?= mostrarPedidoUsuario::mostrarPedidos(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>