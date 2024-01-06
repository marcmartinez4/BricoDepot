<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="vista/css/header.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary c-fluid container-fluid">
        <div class="container-fluid c-fluid">
            <div class="tool-bar1">
                <p>Envios gratis en miles de productos</p>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-body-tertiary c-fluid content-fluid">
        <div class="container-fluid c-fluid">
            <div class="tool-bar2">
                <div class="region u-mr-medium icon-align icon-align--left icon-align--center">
                    <img src="img/transporte.svg" alt="Imagen transporte">
                    <span class="peninsula">España península</span>
                </div>

                <div>
                    <img src="img/tienda.svg" alt="Tienda">
                    <span class="tienda">Seleccionar tienda</span>
                </div>

                <a class="btn-a-toolbar2">
                    <img class="btn-ubicacion" src="img/ubicacion.svg" alt="Ubicación">
                    <span>
                      <strong class="dos-ultimos">Ver todas las tiendas</strong>
                    </span>
                </a>

                <a class="btn-a-toolbar2">
                    <span>
                      <strong class="dos-ultimos">Ideas & Inspiración</strong>
                    </span>
                </a>

                <a class="btn-a-toolbar2">
                    <span>
                      <strong class="botones-toolbar2-derecha">Servicios</strong>
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg bg-body-tertiary header">
        <div class="container-fluid div-header">
            <div class="logo-busqueda">
                <a href="?controlador=home">
                    <img class="logo" src="img/logoBD.svg" alt="Logo BricoDepot">
                </a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 barra-busqueda" type="search" placeholder="¿Qué estas buscando? " aria-label="Search">
                </form>
            </div>
          
            <div class="collapse navbar-collapse juntar-derecha" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ul-juntar-derecha">
                    <?php
                        if (isset($_SESSION['Cliente'])) {
                            if ($_SESSION['rolUsuario'] == 'Administrador') {
                    ?>
                        <li class="nav-item">
                            <a href="?controlador=tablaProductos">
                                <img class="iconos-header" src="img/base-datos.png" alt="Menú admin">

                                <a href="?controlador=tablaProductos" class="nav-link active boton-cuenta">Productos</a>
                            </a>
                        </li>
                    <?php
                            }
                        }
                        if (isset($_SESSION['Cliente'])) {
                    ?>
                        <li class="nav-item">
                            <a href="?controlador=cliente&action=cuenta">
                                <img class="iconos-header" src="img/mi_cuenta.svg" alt="Mi cuenta">    
                                <a href="?controlador=cliente&action=cuenta" class="nav-link active boton-cuenta">Mi Cuenta</a> 
                            </a>
                        </li>
                    <?php
                        } else {
                    ?>
                        <li class="nav-item">
                            <a href="?controlador=cliente">
                                <img class="iconos-header" src="img/mi_cuenta.svg" alt="Mi cuenta">    
                                <a href="?controlador=cliente" class="nav-link active boton-cuenta">Mi Cuenta</a> 
                            </a>
                        </li>
                    <?php    
                        }
                    ?>
                    <li class="nav-item">
                        <a href="?controlador=pedido">
                            <div class="div-cantidad">
                                <img class="iconos-header" src="img/carrito.svg" alt="Carrito">
                                <p class="cantidad"><?=$lista[1]?></p>
                            </div>
                            
                            <a class="nav-link active boton-carrito"><?=number_format($lista[0], 2, ',', '.').' €'?></a>    
                        </a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>



      <div class="d-flex justify-content-center fondo-menu-navegacion">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-12 menu-navegacion">
                <a class="boton-menu-navegacion" href="?controlador=home">Home</a>
                <a class="boton-menu-navegacion" href="?controlador=producto">Carta</a>
            </div>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
