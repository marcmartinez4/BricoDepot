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
    <link rel="stylesheet" href="#">
    <title>Brico Depôt | Bricolaje, jardín, construcción y climatización</title>
    <style>
        body {
            overflow-x: hidden;
        }
        .h2 {
            text-align: center;
            font-family: 'Barlow';
            font-size: 38px;
            font-weight: 900;
            margin: 0;
            padding: 10px 12px 10px 12px;
        }    
        .col-hr {
            height: 70px;
            padding: 10px 12px 10px 12px;
        }
        .imagen-producto {
            width: 100%;
            height: 205px;
        }
        .productos {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 272px;
            height: 380px;
        }
        .productos a {
            font-family: 'Goodhome', sans-serif;
            font-size: 14px;
            padding: 6px 0;
        }
        .productos span {
            font-family: 'Barlow';
            font-size: 37px;
            font-weight: 900;
            margin: 23px 0 0 0;
        }
        .productos p {
            font-size: 14.8px;
            margin: 0 0 0 4px;
            width: 14.35px
        }
    </style>
</head>
<body>
    <p class="h2">LA CARTA</p>

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
                <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                    <img class="imagen-producto" src="<?php echo $producto->getImg() ?>">
                    <a><?php echo $producto->getNombre_producto(); ?></a>
                    <span><?php echo $producto->getPrecio_unidad(); ?><p>€</p></span>
                </div>
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
                <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                    <img class="imagen-producto" src="<?php echo $producto->getImg() ?>">
                    <a><?php echo $producto->getNombre_producto(); ?></a>
                    <span><?php echo $producto->getPrecio_unidad(); ?><p>€</p></span>
                </div>
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
                <form action="../vista/informacion-producto.php" method="get">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 productos">
                        <img class="imagen-producto" src="<?php echo $producto->getImg() ?>">
                        <a><?php echo $producto->getNombre_producto(); ?></a>
                        <span><?php echo $producto->getPrecio_unidad(); ?><p>€</p></span>
                    </div>
                    
                    <a href="..vista/informacion-producto.php">
                        <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                        <input type="submit" name="AñadirCarrito" value="Añadir al carrito">
                    </a>
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
</body>
</html>