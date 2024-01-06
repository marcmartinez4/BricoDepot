<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/info.css">
    <title></title>
</head>
<body>
    <?php
        foreach ($productos as $producto) {
            if ($producto->getProducto_ID() == $producto_id) {
    ?>

    <div class="d-flex justify-content-center main">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <img class="imagen-producto" src="<?= $producto->getImg() ?>" alt="Imagen producto">
            </div>

            <div class="col-md-6 col-lg-6 toda-info">
                <h1 class="nombre-producto"><?= $producto->getNombre_producto(); ?> </h1>
                <div>
                    <p class="precio"><?=$producto->getPrecio_unidad();?><span>€</span></p>
                </div>
                
                <div class="opciones-producto">
                    <div class="arriba">
                        <div class="botones">
                            <form class="boton-cantidad" action="?controlador=info&action=reducirCantidad&producto_id=<?=$producto->getProducto_id();?>" method="post">
                                <input type="hidden" name="reducirCantidad">
                                <input class="boton-svg" type="image" src="img/menos-cantidad.png" alt="Restar cantidad">
                            </form>
                            
                            <button class="boton-cantidad" type="button">
                                <p class="precio-boton"><?=$_SESSION['cantidad_añadir'] ?></p>
                            </button>

                            <form class="boton-cantidad" action="?controlador=info&action=añadirCantidad&producto_id=<?=$producto->getProducto_id();?>" method="post">
                                <input type="hidden" name="añadirCantidad">
                                <input class="boton-svg" type="image" src="img/aumentar-cantidad.png" alt="Aumentar cantidad">
                            </form>
                        </div>

                        <div>
                            <form action="?controlador=info&action=añadirAlCarrito&producto_id=<?=$producto->getProducto_id();?>" method="post">
                                <input type="hidden" name="producto_id" value="<?=$producto->getProducto_id(); ?>">
                                <input class="boton-carrito1" type="submit" name="AñadirCarrito" value="Añadir al carrito">
                            </form>    
                        </div>
                    </div>
                        
                    <hr>

                    <span class="texto-mini-logo">Vendido por <img class="mini-logo" src="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png"> <strong>Brico Depôt</strong></span>
                </div>

                <div class="div-envio">
                    <img class="imagen-furgo" src="img/furgo-info.svg" alt="Envio a domicilio">
                    <span>
                        <h3 class="texto-envios1"><strong>Envío a domicilio</strong></h3>
                        <p class="texto-envios3">A la puerta de tu casa!</p>
                    </span>
                </div>
                
                <div class="div-recogida">
                    <img class="icono-recogida" src="img/bolsa-compra.svg" alt="Recogida en tienda">
                    <span>
                        <h3 class="texto-envios1"><strong>Recogida en tienda</strong></h3>
                        <p class="texto-envios3">Recógelo en 30 minutos</p>
                    </span>
                </div>

                <hr>
            </div>
        </div> 
    </div>

    
    <div class="d-flex justify-content-center descripcion">
        <div class="row justify-content-center">
            <div class="col-6 col-md-6 col-lg-10">
                <h3 class="titulo-descripcion"><strong>Información del producto</strong></h3>
                <hr class="hr-descripcion">
                <div>
                    <p><?=$producto->getDescripcion() ?> </p>
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