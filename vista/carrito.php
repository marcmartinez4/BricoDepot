<?php
    include_once '../config/functions.php';
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    include_once '../modelo/PedidoDAO.php';

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
    
    $count_array = count($_SESSION['carrito']);
    
    if ($count_array > 1) {
        $top = 'Productos';
    } else {
        $top = 'Producto';
    }

    $prodCarrito = productoDAO::getAllProducts();
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
    <style>        
        .precios {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Goodhome', sans-serif;
            font-size: 16px;
        }
        .precios-1 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Goodhome', sans-serif;
            font-size: 18px;
            padding: 11px 0;
        }
        .precios-2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Goodhome', sans-serif;
            font-size: 14px;
        }
        .total {
            padding: 3px 0 0;
            font-family: 'Goodhome', sans-serif;
            font-size: 18px;
            margin: 0;
        }
        .total-iva {
            margin: 0 0 10px 0;
            padding: 0 10px 11px 0;
            font-family: 'Goodhome', sans-serif;
            font-size: 14px;
        }
    </style>
</head>
<body> 
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center  div-centro">
                <div class="d-flex justify-content-start div-titulo">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12">
                            <h1>Mi carrito <span class="span-h1"><?php echo $count_array.' '.$top?></span></h1>
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
                                        
                                        <button class="boton-cantidad" type="button" data-input-id="qty-cart-8435483843882">
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
                    
                    <hr class="hr-panel">
                    
                    <?php
                            }
                        }
                    ?>
                    <span class="texto-mini-logo">Vendido por <img class="mini-logo" src="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png"><strong>Brico Depôt</strong></span>
                    
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
                            <p class="total">Total sin IVA</p>
                            <?php echo $total.' €';?>
                        </div>
                    </div>

                    <form class="" action="" method="post">
                        <input type="hidden" name="producto_id" value="">
                        <input class="boton-carrito" type="submit" name="AñadirCarrito" value="Añadir al carrito">
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>