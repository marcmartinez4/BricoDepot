<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/reseñas.css">
    <title>Información de la práctica</title>
    <script src="src/acciones.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center div-completo">
                <div class="col-sm-9 col-md-6 col-lg-12">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="titulo">¡MUCHAS GRACIAS POR TU COMPRA!</h1>
                        <hr>
                        <p class="texto-info">Puedes escanear el código QR adjunto para acceder a tu pedidoy. 
                            Además, nos encantaría conocer tu opinión. Si tienes un momento, ¡deja una reseña! 
                            Tu feedback es valioso para nosotros.</p>
                        
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="d-flex justify-content-center">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <a href="?controlador=home">
                                            <button class="botones-primarios">Volver a Inicio</button>
                                        </a>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-6">
                                        <button class="botones-primarios" onclick="mostrarFormulario()">Escribir una reseña</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="row d-flex justify-content-center">
                                <div id="formulario" class="col-sm-12 col-md-12 col-lg-12">
                                    <form>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h3 class="label-reseña">Puntuación</h3>
                                            <select class="texto-reseña">
                                                <option>5 estrellas</option>
                                                <option>4 estrellas</option>
                                                <option>3 estrellas</option>
                                                <option>2 estrellas</option>
                                                <option>1 estrellas</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h3 class="label-reseña">Titulo</h3>
                                            <input class="texto-reseña" type="text">
                                        </div>
                                        
                                            
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h3 class="label-reseña">Reseña</h3>
                                            <input class="texto-reseña" type="text">
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <input class="submit-reseña" type="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
