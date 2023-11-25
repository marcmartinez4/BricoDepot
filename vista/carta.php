<?php
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    $productos = productoDAO::getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/css/carta.css">
    <title>Brico Depôt | Bricolaje, jardín, construcción y climatización</title>
</head>
<body>

    <?php
        include ('../vista/header.html');
    ?>

    <p class="h2-principal">LA CARTA</p>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col col-hr">
                <hr class="my-4">
            </div>
        </div>
    </div>

    <p class="h2">DESTACADOS</p>
    
    <div class="d-flex justify-content-center">
        <div class="row justify-content-center">
            <?php
                foreach ($productos as $producto) {
                    if ($producto->getCategoria_ID() == 1) {
            ?>
                <form class="form-productos" action="../vista/informacion-producto.php" method="get">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                        <img class="imagen-producto-carta" src="<?php echo $producto->getImg() ?>">
                        <a><?php echo $producto->getNombre_producto(); ?></a>
                        <div class="precio-añadir">
                            <p><?php echo $producto->getPrecio_unidad(); ?><span>€</span></p>
                            <a class="a-input" href="..vista/informacion-producto.php">
                                <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                                <input type="image" value="" src="../img/carrito.png">
                            </a>
                        </div>
                    </div>
                </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col col-hr">
                <hr class="my-4">
            </div>
        </div>
    </div>

    <p class="h2">HAMBURGUESAS</p>

    <div class="d-flex justify-content-center">
        <div class="row justify-content-center">
            <?php
                foreach ($productos as $producto) {
                    if ($producto->getCategoria_ID() == 5) {
            ?>
                <form class="form-productos" action="../vista/informacion-producto.php" method="get">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                        <img class="imagen-producto-carta" src="<?php echo $producto->getImg() ?>">
                        <a><?php echo $producto->getNombre_producto(); ?></a>
                        <div class="precio-añadir">
                            <p><?php echo $producto->getPrecio_unidad(); ?><span>€</span></p>
                            <a class="a-input" href="..vista/informacion-producto.php">
                                <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                                <input type="image" value="" src="../img/carrito.png">
                            </a>
                        </div>
                    </div>
                </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col col-hr">
                <hr class="my-4">
            </div>
        </div>
    </div>

    <p class="h2">COMPLEMENTOS</p>
    
    <div class="d-flex justify-content-center">
        <div class="row justify-content-center">
            <?php
                foreach ($productos as $producto) {
                    if ($producto->getCategoria_ID() == 1) {
            ?>
                <form class="form-productos" action="../vista/informacion-producto.php" method="get">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                        <img class="imagen-producto-carta" src="<?php echo $producto->getImg() ?>">
                        <a><?php echo $producto->getNombre_producto(); ?></a>
                        <div class="precio-añadir">
                            <p><?php echo $producto->getPrecio_unidad(); ?><span>€</span></p>
                            <a class="a-input" href="..vista/informacion-producto.php">
                                <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                                <input type="image" value="" src="../img/carrito.png">
                            </a>
                        </div>
                    </div>
                </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col col-hr">
                <hr class="my-4">
            </div>
        </div>
    </div>

    <p class="h2">BEBIDAS</p>

    <div class="d-flex justify-content-center">
        <div class="row justify-content-center">
            <?php
                foreach ($productos as $producto) {
                    if ($producto->getCategoria_ID() == 3) {
            ?>
                <form class="form-productos" action="../vista/informacion-producto.php" method="get">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                        <img class="imagen-producto-carta" src="<?php echo $producto->getImg() ?>">
                        <a><?php echo $producto->getNombre_producto(); ?></a>
                        <div class="precio-añadir">
                            <p><?php echo $producto->getPrecio_unidad(); ?><span>€</span></p>
                            <a class="a-input" href="..vista/informacion-producto.php">
                                <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                                <input type="image" value="" src="../img/carrito.png">
                            </a>
                        </div>
                    </div>
                </form>
            <?php
                    }
                }
            ?>
        </div>
    </div>

    <?php
        include ('../vista/footer.html');
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>