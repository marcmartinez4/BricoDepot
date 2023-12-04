<?php
    include_once '../config/functions.php';
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    include_once '../modelo/PedidoDAO.php';

    $prodCarrito = productoDAO::getAllProducts();

    if (isset($_POST['sumarCantidad'])) {
        $id = $_POST['sumarCantidad'];
        PedidoDAO::sumarCantidad($id);
        header('Location: ../vista/carrito.php');
    }

    if (isset($_POST['restarCantidad'])) {
        $id = $_POST['restarCantidad'];
        PedidoDAO::restarCantidad($id);
        header('Location: ../vista/carrito.php');
    }
    
    if (isset($_POST['eliminarProducto'])) {
        $id = $_POST['eliminarProducto'];
        PedidoDAO::eliminarProducto($id);
        header('Location: ../vista/carrito.php');
    }

    if (isset($_POST['finalizarPedido'])) {
        PedidoDAO::finalizarPedido();
    }
    
    $count_array = count($_SESSION['carrito']);
    
    if ($count_array > 1) {
        $top = 'Productos';
    } else {
        $top = 'Producto';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/css/carrito.css">
    <title>Cesta Brico Depôt</title>
</head>
<body> 
    <?php
        include('../vista/header.php');
    ?>

    <div class="container-fluid">
        <?php
            if ($count_array > 0) {
        ?>
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center div-centro">
                <div class="d-flex justify-content-start div-titulo">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12">
                            <h1 class="h1">Mi carrito <span class="span-h1"><?php echo $count_array.' '.$top?></span></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 panel-carrito">
                    <?php
                        $total = 0;

                        if (isset($_SESSION['carrito'])) {
                            foreach($_SESSION['carrito'] as $p) {
                                $prodCarrito = productoDAO::getProductById($p[0]);
                                $cantidad = $p[1];

                                $precioTotalProducto = $prodCarrito->getPrecio_unidad() * $cantidad;
                                $total += $precioTotalProducto;

                    ?>
                    <div class="item-carrito">
                        <div class="imagen-item-carrito">
                            <img class="imagen-pedido" src="<?php echo $prodCarrito->getImg() ?>">
                        </div>
                        
                        <div class="div-carrito-principal">
                            <div class="nombre-producto">
                            <?php
                                echo $prodCarrito->getNombre_producto();     
                            ?>
                            </div>
                        
                            <div class="modificar-cantidad">
                                <div class="botones">
                                    <div class="botones-cantidad">
                                        <form class="boton-cantidad" action="" method="post">
                                            <input type="hidden" name="restarCantidad" value="<?php echo $prodCarrito->getProducto_id(); ?>">
                                            <input class="boton-svg" type="image" src="../img/menos-cantidad.png">        
                                        </form>
                                        
                                        <button class="boton-cantidad" type="button">
                                            <p class="precio-boton"><?php echo $cantidad; ?></p>
                                        </button>

                                        <form class="boton-cantidad" action="" method="post">
                                            <input type="hidden" name="sumarCantidad" value="<?php echo $prodCarrito->getProducto_id(); ?>">
                                            <input class="boton-svg" type="image" src="../img/aumentar-cantidad.png">    
                                        </form>

                                        <form class="boton-eliminar" action="" method="post">
                                            <input type="hidden" name="eliminarProducto" value="<?php echo $prodCarrito->getProducto_id(); ?>">
                                            <input class="icon-eliminar" type="image" src="../img/eliminar-cantidad.png">
                                        </form>
                                    </div>
                                
                                    <div class="div-precio">
                                        <p class="precio"><?php echo $prodCarrito->getPrecio_unidad(); ?><span> €</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <?php
                            }
                        }
                    ?>
                    <div class="div-hr">
                        <span class="texto-mini-logo">Vendido por <img class="mini-logo" src="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png"><strong>Brico Depôt</strong></span>
                    </div>
                    
                </div>

                <div class="col-12 col-md-6 col-lg-5 panel-finalizar">
                    <h2 class="txt-resumen">Resumen del pedido</h2>
                    <hr>
                    <div class="txt-estimacion">
                        <p>Estimación de envío e impuestos</p>            
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                            <path fill-rule="evenodd" d="M17.6562,9.29298 C17.2652,8.90198 16.6332,8.90198 16.2422,9.29298 L11.9742,13.56098 L7.7072,9.29298 C7.3162,8.90198 6.6832,8.90198 6.2932,9.29298 C5.9022,9.68398 5.9022,10.31698 6.2932,10.70698 L11.2422,15.65698 C11.4442,15.85898 11.7102,15.95198 11.9742,15.94498 C12.2392,15.95198 12.5052,15.85898 12.7072,15.65698 L17.6562,10.70698 C18.0472,10.31698 18.0472,9.68398 17.6562,9.29298" transform="rotate(-90 11.975 12.473)"></path>
                        </svg>
                    </div>
                    <hr>
                    <div class="numeros">
                        <?php
                            $tasaIVA = 10;
                            
                            $montoIVA = $total * ($tasaIVA / 100);
                            
                            $precioConIVA = $total + $montoIVA;                           
                        ?>
                        <div class="precios">
                            <p class="p-arriba">Subtotal</p>
                            <?php echo $precioConIVA.' €'; ?>
                        </div>
                        <div class="precios">
                            <p class="p-arriba">IVA</p>
                            <?php echo $montoIVA.' €';?>
                        </div>
                        <hr>
                        <div class="precios-1">
                            <p class="total"><strong>Total</strong></p>
                            <?php echo '<strong>'.$precioConIVA.' €</strong>';?>
                        </div>
                        <div class="precios-2">
                            <p class="total-iva">Total sin IVA</p>
                            <?php echo $total.' €';?>
                        </div>
                    </div>

                    <form class="" action="" method="post">
                        <input type="hidden" name="producto_id" value="">
                        <input class="boton-carrito1" type="submit" name="finalizarPedido" value="Continuar con el pedido">
                    </form>
                </div>
            </div> 
        </div>
        <?php
            } else {
        ?>
        
        <div class="d-flex justify-content-center div-vacio">
            <div class="row justify-content-center">
                <div class="d-flex justify-content-start">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12 carrito-vacio">
                        <svg class="svg-vacio" xmlns="http://www.w3.org/2000/svg" width="120" height="120" viewBox="0 0 120 120" aria-label="Vaciar carrito" role="img">
                            <title>No tiene productos en su Carrito de la Compra</title>
                            <g fill="none" fill-rule="evenodd">
                                <path fill="#F60" d="M99.8980892,42.8025478 L99.8980892,96 C99.8980892,109.254834 89.1529232,120 75.8980892,120 L44.4076433,120 C31.1528093,120 20.4076433,109.254834 20.4076433,96 L20.4076433,42.8025478 L99.8980892,42.8025478 Z M87.6687898,65.7324841 L82.4968153,65.7324841 C80.2876763,65.7324841 78.4968153,67.5233451 78.4968153,69.7324841 L78.4968153,69.7324841 L78.4968153,98.4203822 C78.4968153,100.629521 80.2876763,102.420382 82.4968153,102.420382 L82.4968153,102.420382 L83.6687898,102.420382 C85.8779288,102.420382 87.6687898,100.629521 87.6687898,98.4203822 L87.6687898,98.4203822 L87.6687898,65.7324841 Z M72.3821656,65.7324841 L67.2101911,65.7324841 C65.0010521,65.7324841 63.2101911,67.5233451 63.2101911,69.7324841 L63.2101911,69.7324841 L63.2101911,98.4203822 C63.2101911,100.629521 65.0010521,102.420382 67.2101911,102.420382 L67.2101911,102.420382 L68.3821656,102.420382 C70.5913046,102.420382 72.3821656,100.629521 72.3821656,98.4203822 L72.3821656,98.4203822 L72.3821656,65.7324841 Z M57.0955414,65.7324841 L51.9235669,65.7324841 C49.7144279,65.7324841 47.9235669,67.5233451 47.9235669,69.7324841 L47.9235669,69.7324841 L47.9235669,98.4203822 C47.9235669,100.629521 49.7144279,102.420382 51.9235669,102.420382 L51.9235669,102.420382 L53.0955414,102.420382 C55.3046804,102.420382 57.0955414,100.629521 57.0955414,98.4203822 L57.0955414,98.4203822 L57.0955414,65.7324841 Z M41.8089172,65.7324841 L36.6369427,65.7324841 C34.4278037,65.7324841 32.6369427,67.5233451 32.6369427,69.7324841 L32.6369427,69.7324841 L32.6369427,98.4203822 C32.6369427,100.629521 34.4278037,102.420382 36.6369427,102.420382 L36.6369427,102.420382 L37.8089172,102.420382 C40.0180562,102.420382 41.8089172,100.629521 41.8089172,98.4203822 L41.8089172,98.4203822 L41.8089172,65.7324841 Z"></path>
                                <path fill="#EF4900" d="M72.5231108,113.899994 C75.7473152,113.899994 78.3749236,116.454325 78.492695,119.649746 L78.4968153,119.873698 C77.6781247,119.964753 76.8902166,120.011735 76.133091,120.014644 C75.4107713,120.017419 64.8809124,120.102686 44.709569,120.014644 C44.0615821,120.011815 43.0946982,119.964834 41.8089172,119.873698 C41.8089172,116.574512 44.4834358,113.899994 47.7826216,113.899994 L72.5231108,113.899994 Z M87.6719745,65.7324841 L87.6719745,99.3630573 C87.6719745,101.051571 86.3031636,102.420382 84.6146497,102.420382 L81.5573248,102.420382 C79.868811,102.420382 78.5,101.051571 78.5,99.3630573 L82.3216561,99.3630573 C83.5880415,99.3630573 84.6146497,98.3364491 84.6146497,97.0700637 L84.6146497,65.7324841 L87.6719745,65.7324841 Z M72.3819736,65.7324841 L72.3819736,99.3630573 C72.3819736,101.051571 71.0131627,102.420382 69.3246488,102.420382 L66.2673239,102.420382 C64.57881,102.420382 63.2099991,101.051571 63.2099991,99.3630573 L67.0316551,99.3630573 C68.2980405,99.3630573 69.3246488,98.3364491 69.3246488,97.0700637 L69.3246488,65.7324841 L72.3819736,65.7324841 Z M57.0919727,65.7324841 L57.0919727,99.3630573 C57.0919727,101.051571 55.7231617,102.420382 54.0346479,102.420382 L50.977323,102.420382 C49.2888091,102.420382 47.9199982,101.051571 47.9199982,99.3630573 L51.7416542,99.3630573 C53.0080396,99.3630573 54.0346479,98.3364491 54.0346479,97.0700637 L54.0346479,65.7324841 L57.0919727,65.7324841 Z M41.8089172,65.7324841 L41.8089172,99.3630573 C41.8089172,101.051571 40.4401062,102.420382 38.7515924,102.420382 L35.6942675,102.420382 C34.0057536,102.420382 32.6369427,101.051571 32.6369427,99.3630573 L36.4585987,99.3630573 C37.7249841,99.3630573 38.7515924,98.3364491 38.7515924,97.0700637 L38.7515924,65.7324841 L41.8089172,65.7324841 Z M106.012739,52.7388535 L106.012212,54.1751606 C102.357157,56.3692568 99.8980892,60.4418031 99.8980892,64.9681529 L99.8939936,64.9678535 L99.8946485,71.0828025 L97.7799988,71.0828025 C95.5708598,71.0828025 93.7799988,69.2919415 93.7799988,67.0828025 L93.7799936,64.9678535 L26.5339936,64.9678535 L26.5346498,67.0828025 C26.5346498,69.2919415 24.7437888,71.0828025 22.5346498,71.0828025 L20.4200001,71.0828025 L20.4199936,64.9678535 L20.4076433,64.9681529 C20.4076433,60.5224506 17.9199581,56.7035209 14.2933534,54.6124043 L14.2929936,52.7388535 L106.012739,52.7388535 Z"></path>
                                <path fill="#F60" d="M32.6369427,59.6178344 L87.6687898,59.6178344 C91.0458176,59.6178344 93.7834395,62.3554563 93.7834395,65.7324841 L93.7834395,65.7324841 L93.7834395,65.7324841 L26.522293,65.7324841 C26.522293,62.3554563 29.2599149,59.6178344 32.6369427,59.6178344 Z"></path>
                                <rect width="95.541" height="12.229" x="12" y="42.803" fill="#F60" rx="4"></rect>
                                <path fill="#323C41" d="M20.9936306 101.656051C23.2027696 101.656051 24.9936306 103.446912 24.9936306 105.656051L24.9936306 116C24.9936306 118.209139 23.2027696 120 20.9936306 120L19.8216561 120C17.6125171 120 15.8216561 118.209139 15.8216561 116L15.8216561 105.656051C15.8216561 103.446912 17.6125171 101.656051 19.8216561 101.656051L20.9936306 101.656051zM100.484076 101.656051C102.693215 101.656051 104.484076 103.446912 104.484076 105.656051L104.484076 116C104.484076 118.209139 102.693215 120 100.484076 120L99.3121019 120C97.1029629 120 95.3121019 118.209139 95.3121019 116L95.3121019 105.656051C95.3121019 103.446912 97.1029629 101.656051 99.3121019 101.656051L100.484076 101.656051zM41.8089172 12.2292994L41.8089172 42.8025478 35.6942675 42.8025478 35.6942675 12.2292994 41.8089172 12.2292994zM84.611465 12.2292994L84.611465 42.8025478 78.4968153 42.8025478 78.4968153 12.2292994 84.611465 12.2292994z"></path>
                                <path fill="#989DA0" d="M84.611465,12.2292994 L78.4968153,12.2292994 L78.4968153,6.11464968 L41.8089172,6.11464968 L41.8089172,12.2292994 L35.6942675,12.2292994 L35.6942675,4 C35.6942675,1.790861 37.4851285,4.05812251e-16 39.6942675,0 L80.611465,0 C82.820604,-4.05812251e-16 84.611465,1.790861 84.611465,4 L84.611465,12.2292994 Z"></path>
                            </g>
                        </svg>
                            <h1 class="h1-vacio">Tu carrito está vacío</h1>
                            <p class="p-vacio">Loguéese para recuperar sus productos guardados.</p>
                            <a class="boton-vacio" href="../vista/inicio-sesion.php">
                                <p>Inicio de sesión</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            }
        ?>
    </div>
    <?php
        include('../vista/footer.html');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>