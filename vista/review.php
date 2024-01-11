<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/reseñas.css">
    <title>Reseñas</title>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center div-completo">
                <div class="col-sm-9 col-md-6 col-lg-3">
                    <ul>
                        <a class="a-menu" href="?controlador=review&action=info">
                            <li>
                                <p class="p-menu">Sobre nosotros</p>
                            </li>
                        </a>
                        <hr>
                        <a class="a-menu" href="?controlador=review">
                            <li class="activa">
                                <p class="p-menu">Reseñas</p>
                                </li>
                        </a>
                    </ul>
                </div>

                <div class="col-sm-9 col-md-6 col-lg-7">
                    <div class="col-sm-9 col-md-6 col-lg-12">
                        <h1>Reseñas</h1>
                    </div>
                    <div class="col-sm-9 col-md-6 col-lg-12 rating-principal">
                        <h2>4</h2>
                        <div class="div-estrellita">
                            <img class="estrellita" src="img/estrella_llena.svg">
                            <img class="estrellita" src="img/estrella_llena.svg">
                            <img class="estrellita" src="img/estrella_llena.svg">
                            <img class="estrellita" src="img/estrella_llena.svg">
                            <img class="estrellita" src="img/estrella_vacia.svg">
                        </div>
                        <p class="p-rating">8 Opiniones</p>
                    </div>
                    <hr>
                    <div class="col-sm-9 col-md-6 col-lg-12 filtro">
                        <h3>Filtrar reseñas</h3>
                        <form class="d-flex search-bar" role="search">
                            <input class="form-control me-2 input-search-bar" type="search" placeholder="Buscar en reseñas de clientes" aria-label="Search">
                        </form>
    
                        <select class="primer-select">
                            <option>Todas</option>
                            <option>5 estrellas</option>
                            <option>4 estrellas</option>
                            <option>3 estrellas</option>
                            <option>2 estrellas</option>
                            <option>1 estrellas</option>
                        </select>
                    </div>
                    <hr>
                    <div class="col-sm-9 col-md-6 col-lg-12 clasificacion">
                        <p class="p-select">8 Opiniones</p>
                                
                        <select class="select-orden">
                            <option>Más reciente</option>
                            <option>Clasificación más alta</option>
                            <option>Clasificación más baja</option>
                            <option>Con más votos</option>
                            <option>Con menos votos</option>
                        </select>
                    </div>
                    <?php
                        foreach ($reviews as $review) {
                    ?>
                    <div class="col-sm-9 col-md-6 col-lg-12 reseña">
                        <div class="top">
                            <div class="fondo-perfil">
                                <?php 
                                    foreach ($clientes as $cliente) {
                                        if ($cliente->getCliente_id() == $review->getCliente_id()) {
                                ?>
                                <p class="foto-perfil"><?= $cliente->getNombre()[0] ?></p>
                                <?php 
                                        }
                                    }
                                ?>
                            </div>
                            <div class="top-reseña">
                                <div class="info">
                                    <?php
                                        foreach ($clientes as $cliente) {
                                            if ($cliente->getCliente_id() == $review->getCliente_id()) {
                                    ?>
                                    <p class="nombre"><?= $cliente->getNombre().' '.$cliente->getApellido()?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                    <div class="div-estrella-reseña">
                                        <?php
                                            if ($review->getPuntuacion() == 0) {
                                        ?>
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                        <?php
                                            } else if ($review->getPuntuacion() == 1) {
                                        ?>
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                        <?php
                                            } else if ($review->getPuntuacion() == 2) {
                                        ?>
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                        <?php
                                            } else if ($review->getPuntuacion() == 3) {
                                        ?>
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                        <?php
                                            } else if ($review->getPuntuacion() == 4) {
                                        ?>
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_vacia.svg">
                                        <?php
                                            } else if ($review->getPuntuacion() == 5) {
                                        ?>
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                            <img class="estrella-reseña" src="img/estrella_llena.svg">
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <p class="fecha"><?= $review->getFecha() ?></p>
                            </div>
                        </div>
                        <div class="bottom-reseña">
                            <p class="titulo-reseña"><?= $review->getTitulo() ?></p>
                            <p class="texto-reseña"><?= $review->getReview() ?></p>
                        </div>
                        <hr>
                    </div>
                    <?php    
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>