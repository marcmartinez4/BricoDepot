<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/carta.css">
    <title>Carta Brico Depôt</title>
    <style>
        
    </style>
</head>
<body>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-menu-lateral" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Filtrar</button>
    </div>
    
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">FILTRAR PRODUCTOS</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="hr-menu-lateral">
        <div class="offcanvas-body">
            <div>
                <input class="checkbox" type="checkbox">
                <p>Complementos</p>
            </div>
                
            <div>
                <input class="checkbox" type="checkbox">
                <p>Hamburguesas</p>
            </div>

            <div>
                <input class="checkbox" type="checkbox">
                <p>Bebidas</p>
            </div>

            <button id="btnFiltrar">Filtrar</button>
            <button id="btnMostrarTodos">Borrar filtros</button>
        </div>
    </div>

    <p class="h2-principal">LA CARTA</p>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col col-hr">
                <hr class="my-4 hr-carta">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="row justify-content-center" id="div_productos">

        </div>
    </div>

    <script src="src/carta.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>