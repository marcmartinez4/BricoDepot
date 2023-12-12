<?php
    include_once '../config/functions.php';
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    include_once '../modelo/PedidoDAO.php';
    include ('../controlador/botonSesion.php');
    
    $prodCarrito = productoDAO::getAllProducts();

    $total = 0;

    $count_array = count($_SESSION['carrito']);

    if (isset($_SESSION['carrito'])) {
        foreach($_SESSION['carrito'] as $p) {
            $prodCarrito = productoDAO::getProductById($p[0]);
            $cantidad = $p[1];

            $precioTotalProducto = $prodCarrito->getPrecio_unidad() * $cantidad;
            $total += $precioTotalProducto;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/css/header.css">
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
                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.5 10a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zm8 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3zM9 3c.889 0 1.687.386 2.236 1H12a4 4 0 0 1 4 4v3a1 1 0 0 1-1 1l-1.563.001A2.004 2.004 0 0 0 11.5 9.5a2 2 0 0 0-1.937 2.501H5.437A2.004 2.004 0 0 0 3.5 9.5a2 2 0 0 0-1.937 2.501L1 12a1 1 0 0 1-1-1V5a2 2 0 0 1 2-2h7zm3.5 2H11v3h4v-.5A2.5 2.5 0 0 0 12.5 5z" fill="#222221" fill-rule="evenodd"></path>
                    </svg>
                    <span class="peninsula">España península</span>
                </div>

                <div>
                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 7h12v7h-4v-2.909H5.995V14H2V7zM1 4.406l1.026 2.061 6.133-2.902 5.746 2.98L15 4.52 8.212 1 1 4.406z" fill="#222221" fill-rule="evenodd"></path>
                    </svg>
                    <span class="tienda">Seleccionar tienda</span>
                </div>

                <a class="btn-a-toolbar2">
                    <svg class="btn-ubicacion" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 20 20" focusable="false">
                        <path fill-rule="evenodd" d="M10,1.375c-3.17,0-5.75,2.548-5.75,5.682c0,6.685,5.259,11.276,5.483,11.469c0.152,0.132,0.382,0.132,0.534,0c0.224-0.193,5.481-4.784,5.483-11.469C15.75,3.923,13.171,1.375,10,1.375 M10,17.653c-1.064-1.024-4.929-5.127-4.929-10.596c0-2.68,2.212-4.861,4.929-4.861s4.929,2.181,4.929,4.861C14.927,12.518,11.063,16.627,10,17.653 M10,3.839c-1.815,0-3.286,1.47-3.286,3.286s1.47,3.286,3.286,3.286s3.286-1.47,3.286-3.286S11.815,3.839,10,3.839 M10,9.589c-1.359,0-2.464-1.105-2.464-2.464S8.641,4.661,10,4.661s2.464,1.105,2.464,2.464S11.359,9.589,10,9.589"></path>
                    </svg>
                    <span>
                      <strong class="dos-ultimos">Ver todas las tiendas</strong>
                    </span>
                </a>

                <a class="btn-a-toolbar2">
                    <span>
                      <strong class="dos-ultimos">Ideas & Inspiración</strong>
                    </span>
                </a>

                <a class="btn-a-toolbar2" href="/servicios">
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
                <a href="../vista/index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="118" height="48" viewBox="0 0 775.2 337.65" aria-label="BricoDepot" role="img">
                        <title>BricoDepot</title>
                        <style type="text/css">
                            .st0Logo{fill:#FFFFFF;}
                            .st1Logo{fill:#E30B17;}
                            .st2Logo{fill:#010202;}
                        </style>
                        <g>
                            <g>
                                <rect x="236.68" y="0" class="st0Logo" width="538.52" height="337.65"></rect>
                                <rect x="247.23" y="11.15" class="st1Logo" width="517.1" height="152.69"></rect>
                                <polygon class="st2Logo" points="247.23,174.73 602.42,174.73 603.22,174.35 603.94,174.73 764.34,174.73 764.34,327.46247.23,327.46"></polygon>
                                <g>
                                    <g>
                                        <path class="st0Logo" d="M309.46,204.07h-35.3c-6.32,0-8.1,0.87-8.1,3.78c0,1.89,0.97,3.05,3.24,3.78c4.37,1.31,4.86,1.74,4.86,5.38v71.06c0,3.63-0.49,4.07-4.86,5.38c-2.27,0.73-3.24,1.89-3.24,3.78c0,2.91,1.78,3.78,8.1,3.78h35.3V204.07z"></path>
                                        <path class="st0Logo" d="M325.17,280.8c0,8.72-1.62,11.05-9.23,12.5v7.7c9.23,0,12.95-0.73,18.94-3.49c16.84-7.99,26.56-24.41,26.56-45.34c0-20.78-8.9-36.33-25.42-44.18c-6.31-3.05-10.85-3.92-20.08-3.92v7.85c6.8,1.02,9.23,4.51,9.23,12.79V280.8z"></path>
                                        <path class="st0Logo" d="M407.6,204.07h-35.3c-6.32,0-8.1,0.87-8.1,3.78c0,1.89,0.97,3.05,3.24,3.78c4.37,1.31,4.86,1.74,4.86,5.38v71.06c0,3.63-0.49,4.07-4.86,5.38c-2.27,0.73-3.24,1.89-3.24,3.78c0,2.91,1.78,3.78,8.1,3.78h35.3V204.07z"></path>
                                        <path class="st0Logo" d="M414.24,204.07v8.43c12.47,1.16,19.92,6.68,23.96,17.87c0.97,2.62,1.78,3.2,4.21,3.2c2.75,0,3.89-1.31,3.89-4.22v-25.28H414.24z"></path>
                                        <path class="st0Logo" d="M414.24,255.81c5.18,1.16,8.42,4.51,10.2,10.9c0.81,3.2,2.11,4.36,4.37,4.36c2.91,0,3.88-1.45,3.88-5.81v-27.03c0-4.65-0.81-5.96-4.05-5.96c-2.43,0-3.56,1.16-4.53,4.79c-1.3,5.23-3.73,7.85-9.88,10.46V255.81z"></path>
                                        <path class="st0Logo" d="M414.24,301h33.19v-24.99c0-3.92-0.97-5.23-4.21-5.23c-1.95,0-3.08,1.02-4.21,3.92c-4.53,11.33-12.14,17-24.77,18.6V301z"></path>
                                        <path class="st0Logo" d="M498.35,204.07h-35.3c-6.32,0-8.1,0.87-8.1,3.78c0,1.89,0.97,3.05,3.24,3.78c4.37,1.31,4.86,1.74,4.86,5.38v71.06c0,3.63-0.49,4.07-4.86,5.38c-2.27,0.73-3.24,1.89-3.24,3.78c0,2.91,1.78,3.78,8.1,3.78h35.46c4.37,0,4.53,0,5.83-0.29c2.1-0.29,3.72-1.89,3.72-3.64c0-2.03-1.3-3.34-3.72-3.78c-5.34-1.16-5.99-1.89-5.99-5.81V204.07z"></path>
                                        <path class="st0Logo" d="M504.83,263.8c6.31,0,11.98-0.29,16.68-1.02c17-2.76,26.72-13.66,26.72-29.64c0-14.39-10.04-25.29-25.42-27.9c-4.86-0.73-11.01-1.16-17.97-1.16v7.7c6.48,0.87,8.91,3.63,8.91,10.32v22.81c0,7.27-1.94,9.88-8.91,11.34V263.8z"></path>
                                        <path class="st0Logo" d="M600.47,202.18c-26.72,1.16-44.85,21.51-44.85,50.43c0,28.77,17.33,48.25,44.85,50.28v-7.7c-5.51-1.3-7.28-4.21-7.28-11.91v-63.5c0-5.67,1.94-8.28,7.28-9.88V202.18z"></path>
                                        <path class="st0Logo" d="M606.94,209.89c5.34,1.6,7.28,4.21,7.28,9.88v63.51c0,7.41-2.1,10.61-7.28,11.91v7.7c27.53-2.03,44.85-21.5,44.85-50.28c0-28.92-18.13-49.27-44.85-50.43V209.89z"></path>
                                        <path class="st0Logo" d="M718.77,204.07h-35.3v83.41c0,4.07-0.65,4.65-5.99,5.81c-2.43,0.44-3.73,1.74-3.73,3.78c0,1.74,1.62,3.34,3.73,3.64c1.29,0.29,1.46,0.29,5.99,0.29h35.46c4.37,0,4.53,0,5.83-0.29c2.1-0.29,3.72-1.89,3.72-3.64c0-2.03-1.3-3.34-3.72-3.78c-5.34-1.16-5.99-1.89-5.99-5.81V204.07z"></path>
                                        <path class="st0Logo" d="M745.97,204.07h-20.73v8.72c5.35,2.76,8.75,8.29,10.37,16.42c1.45,7.99,1.94,8.86,5.67,8.86c2.75,0,4.69-1.89,4.69-4.65V204.07z"></path>
                                        <path class="st0Logo" d="M656.27,204.07v29.35c0,2.76,1.94,4.65,4.69,4.65c2.59,0,4.37-1.6,4.86-4.51c2.42-13.08,4.86-17.58,11.17-20.78v-8.72H656.27z"></path>
                                        <path class="st0Logo" d="M309.66,41.85v96.94h-39.93c0,0-4.15-0.31-4.44-3.9c-0.3-3.59,4.01-3.92,4.01-3.92s4.45-0.2,4.45-5.42V54.65c0,0,0.45-2.68-1.86-3.99c-2.3-1.3-6.6-1.24-6.6-5.22c0-3.98,4.97-3.59,6.42-3.59H309.66z"></path>
                                        <path class="st0Logo" d="M315.59,41.85v7.51c0,0,10.64-0.33,10.97,10.38c0.09,3,0,16.85,0,16.85s0.15,5.09-5.33,7.05c-2.62,0.94-5.78,1.14-5.78,1.14v7.48c0,0,10.59,0.13,11.11,9.5c0.43,7.77,0,20.01,0,20.01s-0.07,6.85-6.22,8.75c-1.45,0.45-4.74,0.62-4.74,0.62v7.74h13.42c0,0,27.94-0.13,33.35-18.02c1.06-3.49,5-20.73-14.27-28.89c-4.08-1.72-13.68-3.59-13.68-3.59s28.31-3.04,27.57-23.5c-0.08-2.12,0.37-24.71-41.95-23.15C319.19,41.75,315.59,41.85,315.59,41.85"></path>
                                        <path class="st0Logo" d="M539.1,138.78h-42.45c0,0-4.14-0.31-4.43-3.9c-0.3-3.59,4-3.92,4-3.92s4.44-0.2,4.44-5.42V54.64c0,0,0.44-2.68-1.85-3.99c-2.3-1.3-6.19-1.17-6.19-5.16c0-3.98,5.52-3.66,6.96-3.66h40.56c0,0,5.03,0.13,5.03,3.66c0,3.53-3.4,3.79-4.59,4.31c-1.18,0.52-3.53,0.65-3.53,4.44v71.3c0,0-0.47,3.39,1.46,4.31c1.93,0.91,6.44,1.31,6.66,4.57c0.27,4.05-4.59,4.18-4.59,4.18L539.1,138.78z"></path>
                                        <path class="st0Logo" d="M601.08,47.47v-7.68c0,0-38.54-1.98-46.94,41.75c-0.35,1.82-5.68,34.21,18.33,50.92c0.61,0.42,10.23,7.31,26.76,8.22c0.67,0.04,1.56,0,1.56,0v-7.66c0,0-9.64-0.7-9.34-13.88c0.27-12.01,0-60.31,0-60.31s0.15-5.87,3.56-8.62C598.41,47.47,601.08,47.47,601.08,47.47"></path>
                                        <path class="st0Logo" d="M607.01,40.03v7.11c0,0,14.01,3.63,19.98,18.97c0.76,1.97,2.24,6.06,2.83,8.03c0.6,1.98,1.49,5.27,5.97,5.53c4.47,0.26,4.62-5.53,4.62-5.53V43.72c0,0-0.45-3.71-4.18-4.04c-3.73-0.33-4.18,1.8-4.62,2.52c-0.45,0.72-1.64,3.36-4.77,2.63c-3.13-0.73-10.88-3.36-15.36-4.28C608.49,39.94,607.01,40.03,607.01,40.03"></path>
                                        <path class="st0Logo" d="M606.87,133.04v7.79c0,0,21.62-0.92,32.21-20.38c0.93-1.71,1.19-4.46,1.34-5.69c0.15-1.24-0.9-3.97-3.43-4.5c-2.54-0.53-4.62,0.53-6.11,5.03c-0.32,0.97-3.28,11.25-21.17,17.21C608.62,132.85,606.87,133.04,606.87,133.04"></path>
                                        <path class="st0Logo" d="M694.19,39.88v7.44c0,0-7.75,1.9-7.75,9.37v66.5c0,0,0,5.55,2.97,7.31c2.97,1.77,4.78,2.35,4.78,2.35v7.74c0,0-26.51-0.56-38.45-21.58c-0.64-1.12-14.83-24.78-2.52-53.02c0.95-2.19,10.08-22.04,36.34-25.73C690.74,40.1,694.19,39.88,694.19,39.88"></path>
                                        <path class="st0Logo" d="M699.9,39.88v7.44c0,0,7.75,1.9,7.75,9.37v66.5c0,0,0,5.55-2.97,7.31c-2.97,1.77-4.78,2.35-4.78,2.35v7.74c0,0,26.51-0.56,38.45-21.58c0.64-1.12,14.83-24.78,2.52-53.02c-0.95-2.19-10.08-22.04-36.34-25.73C703.35,40.1,699.9,39.88,699.9,39.88"></path>
                                        <path class="st0Logo" d="M421.69,126.54c0,3.45,3.92,4.17,3.92,4.17s4.22,0.65,4.22,4.34c0,4.44-8.1,3.73-8.1,3.73h-39.84c0,0-4.14-0.31-4.44-3.9c-0.3-3.59,4-3.92,4-3.92s4.44-0.2,4.44-5.42V54.64c0,0,0.45-2.67-1.85-3.98c-2.3-1.3-6.59-1.24-6.59-5.22c0-3.98,4.96-3.59,6.4-3.59h37.87v78.63C421.73,120.48,421.69,123.18,421.69,126.54"></path>
                                        <path class="st0Logo" d="M427.68,41.85v7.27c0,0,8.44,1.87,9.09,9.42c0.1,1.21,0,21.26,0,21.26s-0.39,5.81-4.6,7.31c-2.27,0.81-4.49,0.99-4.49,0.99v7.55c0,0,8.56,0.75,9.09,10.17c0.08,1.49,0,14.08,0,14.08s-1.9,14.83,14.26,19.68c2.37,0.71,19.11,4.48,30.2-8.67c0.52-0.62,2.24-3.08,2.55-4.57c0.32-1.49,0.21-2.98-1.9-4.19c-2.11-1.21-4.23-0.84-5.6,0.56c-0.69,0.71-1.9,2.8-3.38,2.33c-1.48-0.47-1.16-2.7-1.16-2.7v-13.89c0,0-0.63-10.26-10.78-13.9c-1.28-0.46-5.62-1.86-12.47-2.98c-0.82-0.13-2.85-0.47-2.85-0.47s26.21-3.07,26.21-24.43c0-26.3-33.71-24.9-33.71-24.9L427.68,41.85z"></path>
                                    </g>
                                    <polygon class="st0Logo" points="538.45,181.96 547.72,200.62 603.22,174.35 655.19,201.31 665.11,183.01 603.69,151.15"></polygon>
                                </g>
                            </g>
                            <g>
                                <rect class="st0Logo" width="247.22" height="337.65"></rect>
                                <polygon class="st2Logo" points="125.69,198.63 10.56,228.79 10.56,327.46 236.68,327.46 236.68,227.2"></polygon>
                                <g>
                                    <polygon class="st1Logo" points="125.69,187.72 236.68,216.28 236.68,11.15 10.56,11.15 10.56,217.88"></polygon>
                                </g>
                                <g>
                                    <path class="st0Logo" d="M65.19,301.64l-1.53-6.75c-0.05-0.2-0.18-0.31-0.38-0.31H50.32c-0.2,0-0.33,0.1-0.38,0.31l-1.53,6.75c-0.1,0.56-0.43,0.84-1,0.84H36.14c-0.67,0-0.92-0.33-0.77-1l13.72-51.9c0.15-0.51,0.51-0.77,1.07-0.77h13.42c0.56,0,0.92,0.26,1.07,0.77l13.72,51.9l0.08,0.31c0,0.46-0.28,0.69-0.84,0.69H66.19C65.63,302.48,65.3,302.2,65.19,301.64zM52.62,284.77h8.2c0.1,0,0.2-0.04,0.31-0.12c0.1-0.08,0.13-0.19,0.08-0.34l-4.29-19.01c-0.05-0.2-0.13-0.31-0.23-0.31c-0.1,0-0.18,0.1-0.23,0.31l-4.22,19.09C52.19,284.64,52.32,284.77,52.62,284.77z"></path>
                                    <path class="st0Logo" d="M112.11,249.08c0.18-0.18,0.4-0.27,0.65-0.27h10.89c0.25,0,0.47,0.09,0.65,0.27c0.18,0.18,0.27,0.4,0.27,0.65v51.82c0,0.26-0.09,0.47-0.27,0.65c-0.18,0.18-0.4,0.27-0.65,0.27H112.3c-0.51,0-0.87-0.23-1.07-0.69l-12.65-28.37c-0.1-0.15-0.2-0.22-0.31-0.19c-0.1,0.03-0.15,0.14-0.15,0.35l0.15,27.98c0,0.26-0.09,0.47-0.27,0.65c-0.18,0.18-0.4,0.27-0.65,0.27H86.54c-0.26,0-0.47-0.09-0.65-0.27c-0.18-0.18-0.27-0.4-0.27-0.65v-51.82c0-0.26,0.09-0.47,0.27-0.65c0.18-0.18,0.4-0.27,0.65-0.27h11.27c0.51,0,0.87,0.23,1.07,0.69l12.57,28.21c0.1,0.15,0.2,0.23,0.31,0.23c0.1,0,0.15-0.1,0.15-0.31l-0.08-27.91C111.84,249.48,111.93,249.26,112.11,249.08z"></path>
                                    <path class="st0Logo" d="M140.71,301.02c-2.81-1.48-5-3.58-6.55-6.29c-1.56-2.71-2.34-5.85-2.34-9.43v-19.32c0-3.53,0.78-6.63,2.34-9.31c1.56-2.68,3.74-4.77,6.55-6.25c2.81-1.48,6.06-2.22,9.74-2.22s6.92,0.74,9.74,2.22c2.81,1.48,4.99,3.57,6.55,6.25c1.56,2.68,2.34,5.79,2.34,9.31v19.32c0,3.58-0.78,6.72-2.34,9.43c-1.56,2.71-3.74,4.8-6.55,6.29c-2.81,1.48-6.06,2.22-9.74,2.22S143.52,302.51,140.71,301.02z M154.74,290.48c1.07-1.2,1.61-2.77,1.61-4.71v-20.09c0-1.94-0.55-3.53-1.65-4.75c-1.1-1.23-2.52-1.84-4.25-1.84c-1.79,0-3.22,0.6-4.29,1.8c-1.07,1.2-1.61,2.8-1.61,4.79v20.09c0,1.94,0.54,3.51,1.61,4.71c1.07,1.2,2.5,1.8,4.29,1.8C152.23,292.28,153.66,291.68,154.74,290.48z"></path>
                                    <path class="st0Logo" d="M183.95,301.18c-2.73-1.28-4.86-3.08-6.36-5.4c-1.51-2.32-2.26-5.02-2.26-8.09v-1.99c0-0.25,0.09-0.47,0.27-0.65c0.18-0.18,0.4-0.27,0.65-0.27h10.73c0.26,0,0.47,0.09,0.65,0.27c0.18,0.18,0.27,0.4,0.27,0.65v1.38c0,1.43,0.56,2.64,1.69,3.64c1.12,1,2.63,1.49,4.52,1.49c1.58,0,2.79-0.41,3.6-1.23c0.82-0.82,1.23-1.81,1.23-2.99c0-0.97-0.29-1.8-0.88-2.49c-0.59-0.69-1.39-1.32-2.41-1.88c-1.02-0.56-2.79-1.48-5.29-2.76c-2.91-1.43-5.39-2.82-7.44-4.18c-2.04-1.35-3.79-3.13-5.25-5.33c-1.46-2.2-2.18-4.83-2.18-7.9c0-3.07,0.74-5.75,2.22-8.05c1.48-2.3,3.55-4.08,6.21-5.33c2.66-1.25,5.7-1.88,9.12-1.88c3.53,0,6.67,0.68,9.43,2.03c2.76,1.36,4.92,3.25,6.48,5.67c1.56,2.43,2.34,5.23,2.34,8.39v1.46c0,0.26-0.09,0.47-0.27,0.65c-0.18,0.18-0.4,0.27-0.65,0.27h-10.73c-0.26,0-0.47-0.09-0.65-0.27c-0.18-0.18-0.27-0.4-0.27-0.65v-1.3c0-1.48-0.54-2.75-1.61-3.8c-1.07-1.05-2.53-1.57-4.37-1.57c-1.48,0-2.63,0.38-3.45,1.15c-0.82,0.77-1.23,1.81-1.23,3.14c0,0.97,0.28,1.83,0.84,2.57c0.56,0.74,1.44,1.47,2.64,2.18c1.2,0.72,3.03,1.69,5.48,2.91l2.22,1.23c2.76,1.53,4.96,2.89,6.59,4.06c1.64,1.18,3,2.68,4.1,4.52c1.1,1.84,1.65,4.06,1.65,6.67c0,4.8-1.65,8.6-4.94,11.38c-3.3,2.79-7.65,4.18-13.07,4.18C189.89,303.09,186.69,302.46,183.95,301.18z"></path>
                                    <path class="st0Logo" d="M115.9,242.99H94.28c-0.48,0-0.87-0.39-0.87-0.87v-5.63c0-0.48,0.39-0.87,0.87-0.87h21.61c0.48,0,0.87,0.39,0.87,0.87v5.63C116.77,242.6,116.38,242.99,115.9,242.99z"></path>
                                </g>
                                <g>
                                    <path class="st0Logo" d="M29.35,89.4h28.74c0.66,0,1.23-0.23,1.7-0.7c0.46-0.46,0.7-1.03,0.7-1.7v-6.79c0-3.46,1.06-6.29,3.19-8.48c2.13-2.2,4.86-3.29,8.18-3.29c3.46,0,6.22,1.1,8.28,3.29c2.06,2.2,3.09,5.16,3.09,8.88c0,3.59-1.23,7.58-3.69,11.97c-2.46,4.39-5.96,9.38-10.48,14.97c-10.11,12.38-23.49,27.48-40.12,45.31c-0.8,0.8-1.2,1.8-1.2,2.99v23.15c0,0.67,0.23,1.23,0.7,1.7c0.46,0.47,1.03,0.7,1.7,0.7h27.98c0.14,0,0.28-0.02,0.41-0.05l58.82-15.41c0.71-0.19,1.21-0.83,1.21-1.57v-8.92c0-0.66-0.23-1.23-0.7-1.7c-0.47-0.46-1.03-0.7-1.7-0.7H70.67c-0.4,0-0.67-0.13-0.8-0.4c-0.13-0.27-0.07-0.53,0.2-0.8l4.59-4.79c12.64-12.91,21.69-22.89,27.15-29.94c5.06-6.52,8.81-12.67,11.28-18.46c2.46-5.79,3.69-11.88,3.69-18.26c0-7.59-1.83-14.44-5.49-20.56c-3.66-6.12-8.82-10.94-15.47-14.47c-6.66-3.52-14.37-5.29-23.15-5.29c-8.38,0-15.97,1.53-22.75,4.59c-6.79,3.06-12.21,7.39-16.27,12.97c-4.06,5.59-6.29,12.04-6.69,19.36v9.98c0,0.67,0.23,1.23,0.7,1.7C28.12,89.17,28.68,89.4,29.35,89.4z"></path>
                                    <path class="st0Logo" d="M191.82,180.92c0.32,0.08,0.67,0.07,0.98-0.04c5.65-2.03,10.59-5.1,14.79-9.23c8.25-8.12,12.37-19.03,12.37-32.73V84.21c0-13.57-4.13-24.38-12.37-32.43c-8.25-8.05-19.3-12.07-33.13-12.07c-13.71,0-24.65,4.03-32.83,12.07c-8.18,8.05-12.28,18.86-12.28,32.43v54.69c0,10.96,2.62,20.13,7.85,27.52c0.22,0.32,0.56,0.54,0.93,0.64L191.82,180.92z M162.48,82.82c0-4.52,1.1-8.08,3.29-10.68c2.2-2.59,5.09-3.89,8.68-3.89c3.86,0,6.89,1.3,9.08,3.89c2.2,2.6,3.29,6.16,3.29,10.68v57.88c0,4.52-1.1,8.08-3.29,10.68c-2.2,2.6-5.22,3.89-9.08,3.89c-3.59,0-6.49-1.3-8.68-3.89c-2.2-2.6-3.29-6.15-3.29-10.68V82.82z"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
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
                            <a href="../vista/base-datos.php">
                                <img class="iconos-header" src="../img/base-datos.png">

                                <a href="../vista/base-datos.php" class="nav-link active boton-cuenta">Productos</a>
                            </a>
                        </li>
                    <?php
                            }
                        }
                    ?>
                    
                    <li class="nav-item">
                        <a>
                            <svg class="iconos-header" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 36 36" focusable="false">
                                <path fill-rule="evenodd" d="M24.3695651,20 C28.4597917,20 31.7983532,23.1331215 31.9912009,27.0686505 L32,27.4285715 L32,30.2857143 C32,31.2324881 31.2116318,32 30.2391304,32 C29.3360934,32 28.5918244,31.3382168 28.4901075,30.4856362 L28.4782609,30.2857143 L28.4782609,27.4285715 C28.4782609,25.3114799 26.7888354,23.578536 24.6508717,23.4377995 L24.3695651,23.4285714 L12.6304348,23.4285714 C10.4558136,23.4285714 8.67577883,25.0733032 8.53121799,27.1547069 L8.52173912,27.4285715 L8.52173912,30.2857143 C8.52173912,31.2324881 7.73337096,32 6.76086956,32 C5.85783254,32 5.11356348,31.3382168 5.01184666,30.4856362 L5,30.2857143 L5,27.4285715 C5,23.446552 8.21826067,20.1963123 12.2607333,20.0085663 L12.6304348,20 L24.3695651,20 Z M18.5,3 C22.6421356,3 26,6.35786438 26,10.5 C26,14.6421356 22.6421356,18 18.5,18 C14.3578644,18 11,14.6421356 11,10.5 C11,6.35786438 14.3578644,3 18.5,3 Z M18.5,6.46153845 C16.2696193,6.46153845 14.4615384,8.26961927 14.4615384,10.5 C14.4615384,12.7303807 16.2696193,14.5384616 18.5,14.5384616 C20.7303807,14.5384616 22.5384616,12.7303807 22.5384616,10.5 C22.5384616,8.26961927 20.7303807,6.46153845 18.5,6.46153845 Z"></path>
                            </svg>    
                    
                            <?php botonSesion::botonSesion();?> 
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="carrito.php">
                            <div class="div-cantidad">
                                <svg class="iconos-header" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 36 36" focusable="false">
                                    <path fill-rule="evenodd" d="M13.5,26 C14.8807119,26 16,27.1192881 16,28.5 C16,29.8807119 14.8807119,31 13.5,31 C12.1192881,31 11,29.8807119 11,28.5 C11,27.1192881 12.1192881,26 13.5,26 Z M26.5,26 C27.8807119,26 29,27.1192881 29,28.5 C29,29.8807119 27.8807119,31 26.5,31 C25.1192881,31 24,29.8807119 24,28.5 C24,27.1192881 25.1192881,26 26.5,26 Z M9.75400975,5 C10.3341575,5 10.8403939,5.37037019 11.0164102,5.90379226 L11.0560348,6.05315786 L11.9493858,10.4583423 L29.6717358,10.4596526 C30.4527555,10.4596526 31.05292,11.1172849 30.9963002,11.8648775 L30.9760781,12.0154273 L29.2036777,21.1865373 C28.8840541,22.7744964 27.5051889,23.9278301 25.9073553,23.9969472 L25.6881906,23.9995909 L14.9580606,23.9993504 C13.317721,24.0303706 11.8814335,22.9474274 11.467539,21.4019742 L11.4175128,21.188425 L8.66561672,7.62019652 L5.3278484,7.62063323 C4.64688015,7.62063323 4.08563671,7.11479835 4.00893341,6.46312721 L4,6.31031661 C4,5.63833929 4.51260285,5.08450604 5.17299322,5.00881546 L5.3278484,5 L9.75400975,5 Z M28.0668097,13.0789755 L12.4805252,13.0789755 L14.0219443,20.6759951 C14.0962003,21.0449148 14.3991426,21.3200005 14.7845225,21.370713 L14.9326185,21.3789577 L25.7136327,21.3791982 C26.0947216,21.3864049 26.4317564,21.1531111 26.55926,20.8165789 L26.5969289,20.6858082 L28.0668097,13.0789755 Z"></path>
                                </svg>
                                <?php
                                    if ($count_array > 0) {
                                        echo '<p class="cantidad">' . $count_array . '</p>';
                                    } else {
                                        echo '<p class="cantidad">0</p>';
                                    }
                                ?>
                            </div>
                            
                            <a class="nav-link active boton-carrito">
                                <?php 
                                    if ($total > 0) {
                                        echo number_format($total, 2, ',', '.').' €';
                                    } else {
                                        echo $total.',00 €';
                                    }
                                    
                                ?>
                            </a>    
                        </a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>



      <div class="d-flex justify-content-center fondo-menu-navegacion">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-12 menu-navegacion">
                <a class="boton-menu-navegacion" href="index.php">Home</a>
                <a class="boton-menu-navegacion" href="carta.php">Carta</a>
            </div>
        </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>