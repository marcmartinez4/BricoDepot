<?php
    include_once 'modelo/reviewDAO.php';
    include_once 'controlador/APIControlador.php';
?>
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
                

                <div class="col-sm-9 col-md-6 col-lg-7">
                    
                </div>
            </div>
        </div>
    </div>

    <div id="reseñasContainer"></div>

    <script>
        fetch("http://localhost/BricoDepot/?controlador=API&action=api")
            .then(response => response.json())
            .then(reseñasData => {
                let reseñasContainer = document.getElementById('reseñasContainer');
                reseñasData.forEach((reseña) => {
                    let reseñaElemento = document.createElement('div');
                    reseñaElemento.innerHTML = `
                        <p>${reseña.review_id}</p>
                        <p>${reseña.cliente_id}</p>
                        <p>${reseña.pedido_id}</p>
                        <p>${reseña.titulo}</p>
                        <p>${reseña.review}</p>
                        <p>${reseña.fecha}</p>
                        <p>${reseña.puntuacion}</p>
                    `;
                    reseñasContainer.appendChild(reseñaElemento);
                });
            });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>