<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/carrito.css">
    <title>Cesta Brico Depôt</title>
</head>
<body>
    <div class="container-fluid">
        <?php
            if ($count_array > 0) {
        ?>
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center div-centro">
                <div class="d-flex justify-content-start div-titulo">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12">
                            <h1 class="h1">Mi carrito <span class="span-h1"><?= $count_array.' '.$top?></span></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 panel-carrito">
                    <?php
                        $preciototal = 0;

                        if (isset($_SESSION['carrito'])) {
                            foreach($_SESSION['carrito'] as $p) {
                                $prodCarrito = productoDAO::getProductById($p[0]);
                                $cantidad = $p[1];

                                $precioTotalProducto = $prodCarrito->getPrecio_unidad() * $cantidad;
                                $preciototal += $precioTotalProducto;
                    ?>
                    <div class="item-carrito">
                        <div class="imagen-item-carrito">
                            <img class="imagen-pedido" src="<?= $prodCarrito->getImg() ?>" alt="imagen-pedido">
                        </div>
                        
                        <div class="div-carrito-principal">
                            <div class="nombre-producto">
                            <?= $prodCarrito->getNombre_producto();?>
                            </div>
                        
                            <div class="modificar-cantidad">
                                <div class="botones">
                                    <div class="botones-cantidad">
                                        <form class="boton-cantidad" action="?controlador=pedido&action=restarCantidad" method="post">
                                            <input type="hidden" name="restarCantidad" value="<?= $prodCarrito->getProducto_id(); ?>">
                                            <input class="boton-svg" type="image" src="img/menos-cantidad.png" alt="Restar cantidad">        
                                        </form>
                                        
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
                        <div class="precios">
                            <p class="p-arriba">Subtotal</p>
                            <?= $precioConIVA.' €'; ?>
                        </div>
                        <div class="precios">
                            <p class="p-arriba">IVA</p>
                            <?= $montoIVA.' €';?>
                        </div>
                        <hr>
                        <div class="precios-1">
                            <p class="total"><strong>Total</strong></p>
                            <?= '<strong>'.$precioConIVA.' €</strong>';?>
                        </div>
                        <div class="precios-2">
                            <p class="total-iva">Total sin IVA</p>
                            <?= $preciototal.' €'?>
                        </div>
                    </div>

                    <form action="?controlador=pedido&action=finalizarPedido" method="post">
                        <input type="hidden" name="preciototal" value="<?= $preciototal ?>">
                        <input class="boton-carrito1" type="submit" name="finalizarPedido" value="Continuar con el pedido">
                    </form>
                </div>
            </div> 
        </div>
        <?php
            } else {
        ?>
        
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
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>