<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/carrito.css">
    <title>Cesta Brico Depôt</title>
</head>
<body>
    <div class="container-fluid">
        <!-- Condición para mostrar el carrito o mostrar el mensaje de que no hay pedidos -->
        <?php
            if ($count_array > 0) {
        ?>
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center div-centro">
                <div class="d-flex justify-content-start div-titulo">
                    <!-- Div texto con la cuenta de los productos que hay en el carrito -->
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12">
                            <h1 class="h1">Mi carrito <span class="span-h1"><?= $count_array.' '.$top?></span></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 panel-carrito">
                    <!-- Calcular el precio total que hay en el carrito -->
                    <?php
                        $preciototal = 0;

                        if (isset($_SESSION['carrito'])) {
                            foreach($_SESSION['carrito'] as $productos) {
                                $prodCarrito = productoDAO::getProductById($productos[0]);
                                $cantidad = $productos[1];

                                $precioTotalProducto = $prodCarrito->getPrecio_unidad() * $cantidad;
                                $preciototal += $precioTotalProducto;
                    ?>
                    <div class="item-carrito">
                        <!-- Mostrar la imagen del producto que hay en el carrito -->
                        <div class="imagen-item-carrito">
                            <img class="imagen-pedido" src="<?= $prodCarrito->getImg() ?>" alt="imagen-pedido">
                        </div>
                        
                        <div class="div-carrito-principal">
                            <div class="nombre-producto">
                                <!-- Mostrar el nombre del producto en el carrito -->
                                <?= $prodCarrito->getNombre_producto();?>
                            </div>
                        
                            <div class="modificar-cantidad">
                                <div class="botones">
                                    <!-- Botones con las operaciones de restar cantidad, sumar cantidad y eliminar el producto del carrito -->
                                    <div class="botones-cantidad">
                                        <form class="boton-cantidad" action="?controlador=pedido&action=restarCantidad" method="post">
                                            <input type="hidden" name="restarCantidad" value="<?= $prodCarrito->getProducto_id(); ?>">
                                            <input class="boton-svg" type="image" src="img/menos-cantidad.png" alt="Restar cantidad">        
                                        </form>
                                        
                                        <!-- Muestra la cantidad del producto que hay en el carrito -->
                                        <button class="boton-cantidad" type="button">
                                            <p class="precio-boton"><?= $cantidad; ?></p>
                                        </button>

                                        <form class="boton-cantidad" action="?controlador=pedido&action=sumarCantidad" method="post">
                                            <input type="hidden" name="sumarCantidad" value="<?= $prodCarrito->getProducto_id(); ?>">
                                            <input class="boton-svg" type="image" src="img/aumentar-cantidad.png" alt="Sumar cantidad">    
                                        </form>

                                        <form class="boton-eliminar" action="?controlador=pedido&action=eliminarProducto" method="post">
                                            <input type="hidden" name="eliminarProducto" value="<?= $prodCarrito->getProducto_id(); ?>">
                                            <input class="icon-eliminar" type="image" src="img/eliminar-cantidad.png" alt="Eliminar producto">
                                        </form>
                                    </div>
 
                                    <!-- Muestra el precio por unidad del producto en el carrito -->
                                    <div class="div-precio">
                                        <p class="precio"><?= $prodCarrito->getPrecio_unidad(); ?><span> €</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <?php
                            }
                        }
                    ?>
                    <div class="div-hr">
                        <span class="texto-mini-logo">Vendido por <img class="mini-logo" src="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png" alt="Logo BricoDepot"><strong>Brico Depôt</strong></span>
                    </div>
                    
                </div>

                <!-- Panel con la información sobre el precio total -->
                <div class="col-12 col-md-6 col-lg-5 panel-finalizar">
                    <h2 class="txt-resumen">Resumen del pedido</h2>
                    <hr>
                    <div class="txt-estimacion">
                        <p>Estimación de envío e impuestos</p>            
                        <img src="img/flechita.svg" alt="Reducir menú">
                    </div>
                    <hr>
                    <div class="numeros">
                        <?php
                            $tasaIVA = 10;
                            
                            $montoIVA = $preciototal * ($tasaIVA / 100);
                            
                            $precioConIVA = $preciototal + $montoIVA;                           
                        ?>
                        <input type="hidden" id="precioConIva" value="<?= $precioConIVA ?>">
                        <div class="precios">
                            <p class="p-arriba">Subtotal</p>
                            <?= number_format($precioConIVA, 2, ',', '.').' €'; ?>
                        </div>
                        <div class="precios">
                            <p class="p-arriba">IVA</p>
                            <?= number_format($montoIVA, 2, ',', '.').' €';?>
                        </div>
                        <div class="precios">
                            <div class="div-propina-puntos">
                                <input type="checkbox" id="btnPropina" checked>
                                <p class="p-arriba">Propina</p>
                            </div>
                            <input type="number" id="inputPropina" value="3" min="1" max="100">
                        </div>
                        <div class="precios">
                            <div class="div-propina-puntos">
                                <input type="checkbox" id="btnPuntos">
                                <p class="p-arriba">Puntos</p>
                            </div>
                            <input readonly type="number" id="inputPuntos" value="0" step="100" min="0">
                        </div>
                        <hr>
                        <div class="precios-1">
                            <p class="total"><strong>Total</strong></p>
                            <strong id="total"><?= number_format($precioConIVA, 2, ',', '.') ?> €</strong>
                        </div>
                        <div class="precios-2">
                            <p class="total-iva">Total sin IVA</p>
                            <?= $preciototal.' €'?>
                        </div>
                    </div>
                    
                    <!-- Botón para finalizar el pedido -->
                    <form action="?controlador=pedido&action=finalizarPedido" method="post">
                        <input type="hidden" name="precioConIVA" id="inputPrecioConIva" value="<?= $precioConIVA ?>">
                        <input type="hidden" name="inputPropinaFinalizar" id="inputPropinaFinalizar" value="">
                        <input class="boton-carrito1" type="submit" name="finalizarPedido" value="Continuar con el pedido">
                    </form>
                </div>
            </div> 
        </div>
        <?php
            } else {
        ?>

        <!-- Mensaje que se muestra si no hay productos en el carrito -->
        <div class="d-flex justify-content-center div-vacio">
            <div class="row justify-content-center">
                <div class="d-flex justify-content-start">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12 carrito-vacio">
                        <img class="img-vacio" src="img/carrito-vacio.svg" alt="Carrito vacío">
                            <h1 class="h1-vacio">Tu carrito está vacío</h1>
                            <p class="p-vacio">Inicie sesión para poder realizar pedidos.</p>
                            <a class="boton-vacio" href="?controlador=cliente">
                                <p>Inicio de sesión</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
        ?>
    </div>
    
    <script src="src/propina.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>