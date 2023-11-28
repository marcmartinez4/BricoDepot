<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.bricodepot.es/media/favicon/default/favicon-32x32.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../vista/css/inicio-sesion.css">
    <title>Customer Login Brico Depôt</title>
</head>
<body>
    <?php include ('../vista/header.html'); ?>
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <div class="row justify-content-center fondo-panel-sesion">
                <div class="col-12 col-md-6 col-lg-6 panel-inicio-sesion">
                    
                    <h1 class="h1-sesion">Mi cuenta</h1>
                    
                    <div class="div-pestañas">
                        <a class="pestaña-activa" href="../vista/inicio-sesion.php">
                            <div>
                                <p class="pestañas">Identificación</p>
                            </div>
                        </a>
                        
                        <a class="pestaña-no-activa" href="../vista/crear-cuenta.php">
                            <div>
                                <p class="pestañas">Crear una cuenta</p>
                            </div>
                        </a>
                    </div>

                    <form class="form-inicio-sesion">
                        <div class="primer-div-form">
                            <div class="segundo-div-form">
                                <h3>Email</h3>
                                <input class="input-sesion">
                            </div>
                            
                            <div>
                                <h3>Contraseña</h3>
                                <input class="input-sesion">
                            </div>
                        </div>

                        <div class="boton-inicio">
                            <a class="a-olv-contra" href="">¿Olvidaste tu contraseña?</a>

                            <input type="submit" class="input-boton-sesion" value="Entrar">
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <?php include ('../vista/footer.html'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>