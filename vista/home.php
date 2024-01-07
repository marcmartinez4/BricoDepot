<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/index.css">
    <title>Brico Depôt Home</title>
</head>
<body>
    <main class="container-fluid">
        <!-- Un banner de imagenes -->
        <div class="d-flex justify-content-center banner">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-6"> 
                    <a href="?controlador=producto">    
                        <img src="img/Hamburguesa queso fundido.png" class="img-fluid Hamburguesa" alt="Imagen hamburguesa queso fundido">
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <a href="?controlador=producto">
                        <img src="img/Bocata1.png" class="img-fluid Bocata" alt="Imagen bocadillo vegetal">
                    </a>    
                    <a href="?controlador=producto">
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

        <!-- Muestra un mensaje de destacado con una imagen que lleva a la carta -->
        <p class="h2">DESTACADO</p>

        <div class="d-flex justify-content-center img-destacado">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-11">
                    <a href="?controlador=producto">
                        <img src="img/DESTACADO.png" class="img-fluid" alt="Imagen banner destacado">
                    </a>
                </div>
            </div> 
        </div>

        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <?php
                    // Muestra 5 productos los cuales llevan a la info de este producto si se hace click en ellos
                    $contador = 0;
                    // Bucle que va por todos los productos
                    foreach ($productos as $producto) {
                        // Solo se muestran los de la categoria 1
                        if ($producto->getCategoria_ID() == 1) {
                ?>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-2 productos">
                        <!-- Href que redirige a la página de info con los datos de estes produto en especifico si se hace click encoima  -->
                        <a class="form-productos" href="?controlador=info&producto_id=<?=$producto->getProducto_id(); ?>">
                            <!-- Muestra la imagen del producto el nombre y el precio por unidad -->
                            <img class="imagen-producto" src="<?= $producto->getImg() ?>" alt="Imagen producto">
                            <a><?= $producto->getNombre_producto(); ?></a>
                            <p><?= $producto->getPrecio_unidad(); ?><span>€</span></p>
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

        <!-- Muestra 3 imagenes verticales sobre productos del restaurante -->
        <p class="h2">EL MEJOR PRECIO</p>

        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 imagenes-verticales">
                    <a href="?controlador=producto">
                        <img src="img/Hot Dog.png" class="img-fluid" alt="Hot Dog">
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 imagenes-verticales">
                    <a href="?controlador=producto">    
                        <img src="img/Tacos.png" class="img-fluid" alt="Tacos">
                    </a>
                </div>
                <div class="col-12 col-md-6 col-lg-4 imagenes-verticales">
                    <a href="?controlador=producto">
                        <img src="img/Cola.png" class="img-fluid" alt="Cola">
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

        <!-- Dos paneles con texto. Uno con una descripción del restaurante y otro con una opinion de un cliente -->
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