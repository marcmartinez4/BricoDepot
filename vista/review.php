<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/reseñas.css">
    <title>Reseñas</title>
    <script src="src/reseñas.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center div-completo">
                <div class="col-sm-9 col-md-6 col-lg-12">
                    <h2>Filtrar reseñas</h2>
                    <div class="filtro-top">
                        <input type="text" placeholder="Buscar en reseñas de clientes">
                        <select class="select">
                            <option>5 estrellas</option>
                            <option>4 estrellas</option>
                            <option>3 estrellas</option>
                            <option>2 estrellas</option>
                            <option>1 estrellas</option>
                        </select>
                    </div>
                    <hr>
                    <div class="div-top-reseñas">
                        <div id="cantidad-reseñas">
                            <span id="numeroReseñas"></span> 
                            Opiniones
                        </div>
                        <select>
                            <option>Calificación más alta</option>
                            <option>Calificación más baja</option>
                        </select>
                    </div>

                    <div id="container">
                        
                    </div>          
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>