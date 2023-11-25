<?php
    include_once '../config/functions.php';
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    include_once '../config/functions.php';
    include_once '../modelo/PedidoDAO.php';

    /*if(isset($_POST['vaciarArray'])) {
        $_SESSION['pedido'] = null;
        print_r($_SESSION['pedido']);
        header('carrito.php');
    }*/

    $productos = productoDAO::getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/css/carrito.css">
    <title>Document</title>
    <style>
        h1 {
            font-family: 'Goodhome', sans-serif;
            font-size: 32px;
            font-weight: 900;
        }
        .span-h1 {
            font-family: 'Goodhome', sans-serif;
            font-size: 16px;
        }
        .div-titulo {
            max-width: 1363px;
            padding: 0;
        }
    </style>
</head>
<body>
    
    <!--<form action="" method="post">
        <input type="submit" name="vaciarArray" value="Vaciar Array">
    </form>-->


    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center">
                <div class="d-flex justify-content-start div-titulo">
                    <div class="row justify-content-start">
                        <div class="col-12 col-md-6 col-lg-12">
                            <h1>Mi carrito <span class="span-h1">Suma productos Producto</span></h1>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 panel-carrito">
                    <div class="item-carrito">
                        <?php 
                            for ($i = 0; $i < sizeof($_SESSION['pedido']); $i++) {
                                if ($_SESSION['pedido'] != null) {
                                    
                                    print_r($_SESSION['pedido'][$i]);
                                }
                            } 
                        ?>
                    </div>
                    <hr>
                    <span class="texto-mini-logo">Vendido por <img class="mini-logo" src="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png"> <strong>Brico Depôt</strong></span>
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
                        <div>
                            <p class="p-arriba">Subtotal</p>
                            <!--Aquí va el total-->
                        </div>
                        <div>
                            <p class="p-arriba">IVA</p>
                            <!--Aquí va el IVA-->
                        </div>
                        <hr>
                        <div>
                            <p class="total"><strong>Total</strong></p>
                            <!--Aquí va el total-->
                        </div>
                        <div>
                            <p class="total-iva">Total sin IVA</p>
                            <!--Aquí va el IVA-->
                        </div>
                    </div>

                    <form action="" method="post">
                        <input type="hidden" name="producto_id" value="<?php echo $producto->getProducto_id(); ?>">
                        <input class="boton-carrito" type="submit" name="AñadirCarrito" value="Añadir al carrito">
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>