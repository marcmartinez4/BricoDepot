<?php
    include_once '../modelo/ProductoDAO.php';
    include_once '../controlador/productoControlador.php';
    $productos = productoDAO::getAllProducts();
    $producto_id = $_POST['producto_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .col-hr {
            padding: 0;
            margin: 16px 0;
        }
        .my-4 {
            margin: 0!important;
        }
        .div-producto {
            display: flex;
            justify-content: center;
        }
        .toda-info {
            padding: 0 0 24px 24px;
            display: flex;
            flex-direction: column;
        }
        .nombre-producto {
            font-family: 'Goodhome', sans-serif;
            font-size: 25.5px;
            padding: 3px 55px 10px 0;
            margin: 0;
        }
        .info-productos {
            height: 82px;
            margin-bottom: 15px;
        }
        .precio {
            font-family: 'Barlow';
            font-weight: 900;
            font-size: 57px;
            margin: 0;
        }
        .euro {
            font-size: 22.8px;
            margin-left: 4px;
            margin: 0;
        }
        .opciones-producto {
            height: 137px;
        }
        .arriba {
            display: flex;
        }
        .boton-cantidad {
            width: 44px;
            height: 44px;
        }
        .boton-carrito {
            width: 425px;
            height: 44px;
            margin-left: 16px;
            border: none;
            border-radius: 4px;
            background-color: #E20811;
            color: white;
            font-family: 'Goodhome', sans-serif;
            font-size: 16px;
            font-weight: 900;
            padding: 0;
        }
        .texto-mini-logo {
            font-family: 'Goodhome', sans-serif;
            font-size: 16px;

        }
        .mini-logo {
            height: 13px;
        }
        .div-imagen {
            min-width: 630px;
            min-height: 630px;
            display: flex;
            justify-content: center;
        }
        .imagen-producto {
            width: 100%;
            height: 400px;
        }
        .div-envio {
            height: 74px;
            display: flex;
            font-family: 'Goodhome', sans-serif;
            font-size: 16px;
        }
        .imagen-furgo {
            margin-right: 8px;
        }
        .texto-envios1 {
            margin: 0;
            padding-top: 2px;
            font-size: 16px;
        }
        .texto-envios2 {
            margin: 0px;
            margin-top: 8px;
        }
        .texto-envios3 {
            margin: 0;
            margin-top: 4px;
            color: #6F767A;
        }
        .icono-recogida {
            width: 24px;
            height: 24px;
            margin-right: 8px;
        }
        .div-recogida {
            min-height: 46px;
            margin-top: 30.4px;
            display: flex;
            font-family: 'Goodhome', sans-serif;
            font-size: 16px;
        }
        .descripcion {
            background-color: #F7F7F7;
            padding: 24px;
            margin: 0 56px;
        }
    </style>
</head>
<body>
    <?php
        foreach ($productos as $producto) {
            if ($producto->getProducto_ID() == $producto_id) {
    ?>

    <div class="d-flex justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6">
                <img class="imagen-producto" src=" <?php echo $producto->getImg() ?> ">
            </div>

            <div class="col-md-6 col-lg-6 toda-info">
                <h1 class="nombre-producto"> <?php echo $producto->getNombre_producto(); ?> </h1>
                <div>
                    <p class="precio"> <?php echo $producto->getPrecio_unidad(); ?> <span>€</span></p>
                </div>

                <div class="opciones-producto">
                    <div class="arriba">
                        <div class="botones">
                            <button class="boton-cantidad" type="button" data-input-id="qty-cart-8435483843882">
                                <svg class="icon icon--size-24 icon--dark" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                                    <rect width="16" height="2" x="4" y="11" fill-rule="evenodd"></rect>
                                </svg>
                            </button>
                            
                            <button class="boton-cantidad" type="button" data-input-id="qty-cart-8435483843882">
                                <svg class="icon icon--size-24 icon--dark" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                                    <rect width="16" height="2" x="4" y="11" fill-rule="evenodd"></rect>
                                </svg>
                            </button>

                            <button class="boton-cantidad" type="button" data-input-id="qty-cart-8435483843882">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                                    <path fill-rule="evenodd" d="M13,4 L13,11 L20,11 L20,13 L13,13 L13,20 L11,20 L11,13 L4,13 L4,11 L11,11 L11,4 L13,4 Z"></path>
                                </svg>
                            </button>
                        </div>

                        <div>
                            <button class="boton-carrito">Añadir al carrito</button>
                        </div>
                    </div>
                        
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col col-hr">
                                <hr class="my-4">
                            </div>
                        </div>
                    </div>

                    <span class="texto-mini-logo">Vendido por <img class="mini-logo" src="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png"> <strong>Brico Depôt</strong></span>
                </div>

                <div class="div-envio">
                    <svg class="imagen-furgo" width="24" height="24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                        <path fill-rule="evenodd" d="M6.59642334,14.7849875 C7.61279202,14.7849875 8.43475122,15.6163118 8.43475122,16.641985 C8.43475122,17.6686756 7.61279202,18.5 6.59642334,18.5 C5.58106197,18.5 4.75809547,17.6686756 4.75809547,16.641985 C4.75809547,15.6163118 5.58106197,14.7849875 6.59642334,14.7849875 Z M16.7087376,14.7849875 C17.724099,14.7849875 18.5470655,15.6163118 18.5470655,16.641985 C18.5470655,17.6686756 17.724099,18.5 16.7087376,18.5 C15.6933763,18.5 14.8704097,17.6686756 14.8704097,16.641985 C14.8704097,15.6163118 15.6933763,14.7849875 16.7087376,14.7849875 Z M13.0320819,5.5 C14.1350786,5.5 15.2642652,6.20413275 15.78907,7.27864746 L15.9824722,7.27864746 C18.9308479,7.33155917 21.305061,9.63932373 21.305061,12.6176425 L21.305061,15.2388071 C21.6888434,15.2388071 22.0001,15.5532248 22.0001,15.9409048 L21.9930489,16.0446932 C21.9426837,16.3825141 21.6535878,16.6430025 21.305061,16.6430025 L19.4667331,16.6430025 C19.4667331,15.1034753 18.2317797,13.8569975 16.7087376,13.8569975 C15.1856956,13.8569975 13.9507422,15.1034753 13.9507422,16.6430025 L9.35441881,16.6430025 C9.35441881,15.1034753 8.1194654,13.8569975 6.59642334,13.8569975 C5.07338129,13.8569975 3.83842788,15.1034753 3.83842788,16.6430025 C2.82709572,16.6430025 2.0001,15.807608 2.0001,14.786005 L2.0001,8.28498748 C2.0001,6.75258297 3.24109723,5.5 4.75809547,5.5 L13.0320819,5.5 Z M15.78907,8.28498748 L15.78907,11.6631966 C15.78907,12.1597527 16.1728525,12.6176425 16.7087376,12.6176425 L20.3853934,12.6176425 C20.3853934,10.1603006 18.2237213,8.28498748 15.78907,8.28498748 Z"></path>
                    </svg>
                    <span>
                        <h3 class="texto-envios1"><strong>Envío a domicilio</strong></h3>
                        <p class="texto-envios2">65 unidades online</p>
                        <p class="texto-envios3">Envío de 4 a 8 días hábiles.</p>
                    </span>
                </div>
                
                <div class="div-recogida">
                    <svg class="icono-recogida" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24" focusable="false">
                        <path fill-rule="evenodd" d="M18.4421,8.5917 C18.4971,8.6477 18.5431,8.7117 18.5811,8.7807 C19.3511,8.8577 19.9541,9.5067 19.9541,10.2937 L19.9541,11.3897 L21.9371,11.3897 L21.9371,17.6527 C21.9371,18.0257 21.6301,18.3317 21.2541,18.3317 L15.6021,18.3317 C15.2271,18.3317 14.9201,18.0257 14.9201,17.6527 L14.9201,11.3897 L16.9011,11.3897 L16.9011,10.2937 C16.9011,10.2487 16.9041,10.2027 16.9081,10.1597 L11.0341,11.4027 L11.0341,18.3107 L6.0501,18.3107 L6.0501,13.4637 L3.4761,17.9227 C3.3281,18.1727 3.0631,18.3107 2.7921,18.3107 C2.6541,18.3107 2.5171,18.2767 2.3891,18.2007 C2.0121,17.9797 1.8871,17.4957 2.1111,17.1197 C4.5991,12.9277 5.8451,10.8277 5.8491,10.8217 C6.4231,9.7327 7.6541,9.7107 7.8101,9.7107 C7.8101,9.7107 9.6981,9.6337 10.5341,9.4807 L17.6831,8.3847 C17.9651,8.3127 18.2501,8.4007 18.4421,8.5917 Z M8.3851,3.9997 C9.6761,3.9997 10.7221,5.0437 10.7221,6.3367 C10.7221,7.6237 9.6761,8.6707 8.3851,8.6707 C7.0971,8.6707 6.0501,7.6237 6.0501,6.3367 C6.0501,5.0437 7.0971,3.9997 8.3851,3.9997 Z"></path>
                    </svg>
                    <span>
                        <h3 class="texto-envios1"><strong>Recogida en tienda</strong></h3>
                        <p class="texto-envios3">Recógelo en 30 minutos</p>
                    </span>
                </div>

                <div class="container-fluid hr">
                    <div class="row">
                        <div class="col col-hr">
                            <hr class="my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    
    <div class="d-flex justify-content-center descripcion">
        <div class="row justify-content-center">
            <div class="col-6 col-md-6 col-lg-10">
                <h3><strong>¿Que ofrecemos en nuestro restaurante?</strong></h3>
                <div>
                    <p>En nuestro establecimiento, ofrecemos una deliciosa variedad de comidas rápidas
                        que satisfarán todos tus antojos. Desde hamburguesas y hot dogs sabrosos hasta
                        tacos auténticos y nachos cargados de sabor, te garantizamos una experiencia
                        gastronómica inolvidable. Nuestros ingredientes frescos y de alta calidad se
                        combinan con un servicio amable para brindarte una comida rápida que realmente
                        vale la pena. ¡Ven y disfruta de la mejor comida rápida en nuestro restaurante!</p>
                </div>
            </div>
        </div> 
    </div>
    <?php
            }
        } 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>