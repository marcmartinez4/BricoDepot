<?php
    $productos = productoDAO::getAllProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link rel="stylesheet" href="vista/css/index.css">
    <title>Brico Depôt | Bricolaje, jardín, construcción y climatización</title>
</head>
<body>
    <main class="container-fluid">
        <div class="d-flex justify-content-center banner">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6"> 
                    <a href="vista/carta.php">    
                        <img src="img/Hamburguesa queso fundido.png" class="img-fluid Hamburguesa" alt="Imagen hamburguesa queso fundido">
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <a href="vista/carta.php">
                        <img src="img/Bocata1.png" class="img-fluid Bocata" alt="Imagen bocadillo vegetal">
                    </a>    
                    <a href="vista/carta.php">
                        <img src="img/Bocata2.png" class="img-fluid Bocata" alt="Imagen bocadillo vegetal">
                    </a>
                </div>
            </div> 
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col col-hr">
                    <hr class="my-4">
                </div>
            </div>
        </div>

        <p class="h2">DESTACADO</p>

        <div class="d-flex justify-content-center img-destacado">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-11">
                    <a href="../vista/carta.php">
                        <img src="img/DESTACADO.png" class="img-fluid" alt="Imagen banner destacado">
                    </a>
                </div>
            </div> 
        </div>

        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <?php
                    $contador = 0;
                    foreach ($productos as $producto) {
                        if ($producto->getCategoria_ID() == 1) {
                ?>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 productos">
                        <a class="form-productos" href="../vista/informacion-producto.php?producto_id=<?php echo $producto->getProducto_id(); ?>">
                            <img class="imagen-producto" src="<?php echo $producto->getImg() ?>">
                            <a><?php echo $producto->getNombre_producto(); ?></a>
                            <p><?php echo $producto->getPrecio_unidad(); ?><span>€</span></p>
                        </a>
                    </div>
                <?php
                        $contador++;
                        if ($contador == 5) {
                            break; 
                        }
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

        <p class="h2">EL MEJOR PRECIO</p>

        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 imagenes-verticales">
                    <a href="../vista/carta.php">
                        <img src="img/Hot Dog.png" class="img-fluid" alt="...">
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 imagenes-verticales">
                    <a href="../vista/carta.php">    
                        <img src="img/Tacos.png" class="img-fluid" alt="...">
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 imagenes-verticales">
                    <a href="../vista/carta.php">
                        <img src="img/Cola.png" class="img-fluid" alt="...">
                    </a>
                </div>
            </div> 
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col col-hr">
                    <hr class="my-4">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6">
                    <h3 class="h3-paneles"><strong>¿Que ofrecemos en nuestro restaurante?</strong></h3>
                    <div class="izquierda">
                        <p>En nuestro establecimiento, ofrecemos una deliciosa variedad de comidas rápidas
                            que satisfarán todos tus antojos. Desde hamburguesas y hot dogs sabrosos hasta
                            tacos auténticos y nachos cargados de sabor, te garantizamos una experiencia
                            gastronómica inolvidable. Nuestros ingredientes frescos y de alta calidad se
                            combinan con un servicio amable para brindarte una comida rápida que realmente
                            vale la pena. ¡Ven y disfruta de la mejor comida rápida en nuestro restaurante!</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <h3 class="h3-paneles"><strong>Opiniones de nuestros clientes</strong></h3>
                    <div class="derecha">
                        <h4><strong>Alfonso Gutiérrez</strong></h4>
                        <p>Me encantó la amplia variedad de opciones en el menú. Las hamburguesas
                            son deliciosas y las porciones son generosas. Los nachos son un imperdible.
                            El ambiente es relajado y perfecto para pasar un rato agradable con amigos.</p>
                    </div>
                </div>
            </div> 
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>